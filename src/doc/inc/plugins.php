<?php
	
	// Sort plugins by name
	function plugin_cmp($a, $b)
	{
		$a = $a['description'];
		$b = $b['description'];
		return ($a == $b) ? 0 : (($a > $b) ? 1 : -1);
	}
	
	function sort_plugins()
	{
		global $PLUGINS;
		usort($PLUGINS, 'plugin_cmp');
	}
	
	function plugin_header()
	{
		global $PACKAGE, $PLUGINS, $PAGE, $DOCROOT;

		// Output plugin
		foreach ($PLUGINS as $plugin)
		{
			if ($plugin['id'] != $PAGE)
				continue;
			
			echo "<h1>" . htmlspecialchars($plugin['description']) . "</h1>\n";
			
			$fmt = array();
			if (isset($plugin['ladspa_label']) && (strlen($plugin['ladspa_label']) > 0))
				array_push($fmt, 'LADSPA');
			if ((isset($plugin['lv2_uri'])) && (strlen($plugin['lv2_uri']) > 0))
				array_push($fmt, 'LV2');
			if ((isset($plugin['vst2_uid'])) && (strlen($plugin['vst2_uid']) > 0))
				array_push($fmt, 'VST2');
			if (isset($plugin['jack']) && ($plugin['jack']))
				array_push($fmt, 'JACK');
		
			$full_name = htmlspecialchars("{$PACKAGE['short']} {$plugin['description']} ({$plugin['acronym']})");
			$author = htmlspecialchars($plugin['author']);
			
			echo "<img class=\"plugin\" src=\"${DOCROOT}img/plugins/{$plugin['id']}.png\" alt=\"{$plugin['name']}\">\n";
			echo "<p><b>Detailed:&nbsp;</b>{$full_name}</p>\n";
			echo "<p><b>Formats:&nbsp;</b>" . implode(',&nbsp;', $fmt) . "</p>\n";
			echo "<p><b>Categories:&nbsp;</b>" . implode(',&nbsp;', $plugin['groups']) . "</p>\n";
			echo "<p><b>Developer:&nbsp;</b>{$author}</p>\n";
			echo "<p><b>Description:&nbsp;</b></p>\n";
			break;
		}
	}
	
	function out_image($id, $alt)
	{
		global $DOCROOT;
		echo "<img src=\"${DOCROOT}/img/{$id}.png\" alt=\"{$alt}\">\n";
	}
	
	function plugin_ref($id)
	{
		global $DOCROOT, $PACKAGE;
		$page       = find_menu_item($id);
		if (!isset($page))
			return;
		
		$header = htmlspecialchars("{$PACKAGE['short']} {$page['text']}");
		print("<b><a href=\"${DOCROOT}html/plugins/${page['id']}.html\">{$header}</a></b>");
	}

?>
