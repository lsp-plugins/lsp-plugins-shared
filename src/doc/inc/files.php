<?php
	function process_http_refs($text)
	{
		$match = array();
		
		if (preg_match('/^(.*)\[([^\]]+)\]\s*\(([^\)]+)\)(.*)$/', $text, $match))
		{
			$text = process_http_refs($match[1]) .
				'<a href="' . htmlspecialchars($match[3]) . '">' .
					htmlspecialchars($match[2]) .
				'</a>' .
				process_http_refs($match[4]);
		}
		else {
			$text = htmlspecialchars($text);
		}
		return $text;
	}

	function file_emit_line(&$state, $line = '', $tag = null)
	{
		$s     = &$state['state'];
		if (count($s) <= 0)
			return;
		
		if (!isset($tag))
			$tag = end($s);
		
		print('<' . $tag . '>');
		print(process_http_refs($state['line'] . $line));
		$state['line'] = '';
		print('</' . $tag . ">\n");
		
		array_pop($s);
	}
	
	function file_append_line(&$state, $line = '', $tag = null)
	{
		$s     = &$state['state'];
		if (isset($tag))
			array_push($s, $tag);
		$state['line'] .= $line;
	}

	function file_process_string(&$state, $line)
	{
		$match = array();
		$s     = &$state['state'];
		$last  = end($s);
		
		if (($last == 'ul') || ($last == 'li'))
		{
			if (preg_match('/^\s*$/', $line))
			{
				file_emit_line($state);
				$last  = end($s);
				if ($last == 'ul')
				{
					array_pop($s);
					print("</ul>\n");
				}
			}
			elseif (preg_match('/^\s*\*\s(.*)\s*$/', $line, $match))
			{
				file_emit_line($state);
				file_append_line($state, $match[1], 'li');
			}
			else
				file_append_line($state, $line);
		}
		elseif ($last == 'p')
		{
			if (preg_match('/^\s*$/', $line))
				file_emit_line($state);
			elseif (preg_match('/^\s*\*\s(.*)\s*$/', $line, $match))
			{
				file_emit_line($state);
				$state['unget'] = $line;
			}
			elseif (preg_match('/^ {2}(.*)$/', $line, $match))
			{
				file_emit_line($state);
				$state['unget'] = $line;
			}
			else
				file_append_line($state, $line);
		}
		elseif ($last == 'pre')
		{
			if (!preg_match('/^ {2}(.*)$/', $line, $match))
			{
				file_emit_line($state);
				$state['unget'] = $line;
			}
			else
				file_append_line($state, rtrim($match[1]) . "\n");
		}
		elseif ($last == 'pre-q')
		{
			if (preg_match('/^```.*$/', $line, $match))
			{
				file_emit_line($state, "", "pre");
			}
			else
				file_append_line($state, rtrim($line) . "\n");
		}
		else
		{
			if (preg_match('/^\s*\*\s(.*)\s*$/', $line, $match))
			{
				array_push($s, 'ul');
				print("<ul>\n");
				file_append_line($state, $match[1], 'li');
			}
			elseif (preg_match('/^ {2}(.*)$/', $line, $match))
				file_append_line($state, $match[1] . "\n", 'pre');
			elseif (preg_match('/^```.*$/', $line, $match))
				file_append_line($state, "\n", 'pre-q');
			else
				file_append_line($state, $line, 'p');
		}
	}

	function file_content($file, $section = null)
	{
		// Open file
		$fd = fopen($file, 'r');
		if (!$fd)
			return;
		
		if (!isset($section))
		{
			while (!feof($fd))
			{
				$line = fgets($fd);
				print htmlspecialchars($line);
			}
		}
		else
		{
			$pattern = '/^\={1,}\s*' . $section . '\s*\={1,}\s*$/i';
			$pattern2 = '/^\#{1,}\s*' . $section . '\s*$/i';
			$search  = true;
			$state   = array(
				'line' => '',
				'state' => array(''),
				'unget' => null
			);
			
			while ((isset($state['unget'])) || (!feof($fd)))
			{
				$line = isset($state['unget']) ? $state['unget'] : fgets($fd);
				$state['unget'] = null;
				
				if ($search)
				{
					if (preg_match($pattern, $line))
						$search = false;
					elseif (preg_match($pattern2, $line))
						$search = false;
				}
				else
				{
					if (preg_match('/^\={1,}\s*.+\s*\={1,}\s*$/', $line))
						break;
					if (preg_match('/^\#{1,}\s*.+$/', $line))
						break;

					file_process_string($state, $line);
				}
			}
		}
		
		// Close file
		fclose($fd);
	}

?>
