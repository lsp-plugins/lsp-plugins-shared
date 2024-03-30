<?php
	$MENU = [
		'id' => '',
		'parent' => null,
		'text' => '',
		'root' => '',
		'path' => '',
		'style' => null,
		'file' => ''
	];
	
	function &find_menu_item($id, &$menu = null)
	{
		global $MENU;
		
		$result = null;
		if (!isset($id)) {
			return $result;
		}
		if (!isset($menu)) {
			$menu = &$MENU;
		}
		if (!array_key_exists('items', $menu)) {
			return $result;
		}
		
		foreach ($menu['items'] as &$item)
		{
			if (isset($item['id']) && ($item['id'] == $id)) {
				return $item;
			}

			if (array_key_exists('items', $item))
			{
				$subitem = &find_menu_item($id, $item);
				if (isset($subitem)) {
					return $subitem;
				}
			}
		}
	
		return $result;
	}

	function def_menu_item($parent, $id, $text, $css_style, $file = null)
	{
		global $MENU;
		
		$item = array(
			'id' => $id,
			'parent' => ((isset($parent)) && (strlen($parent) > 0)) ? $parent : null,
			'text' => $text,
			'root' => '',
			'path' => '',
			'style' => $css_style,
			'file' => isset($file) ? $file : $id
		);

		if ((!isset($parent)) || (strlen($parent) <= 0))
		{
			$item['root']    = '..';
			$mi = &$MENU;
		}
		else
		{
			$mi = &find_menu_item($parent);
			$item['path']   .= ((strlen($mi['path']) > 0) ? $mi['path'] . '/' : '') . $mi['id'];
			$item['root']   .= '..' . ((strlen($mi['root']) > 0) ? '/' . $mi['root'] : '');
		}
		
		if ((!array_key_exists('items', $mi)) || (!isset($mi['items'])))
			$mi['items'] = [ $item ];
		else
			array_push($mi['items'], $item);
	}
	
	function output_menu(&$menu = null)
	{
		global $MENU;
		if (!isset($menu)) {
			$menu = &$MENU;
		}
		
		$css_class = "index";
		if (isset($menu['style'])) {
			$css_class .= " " . $menu['style'];
		}
		
		print "<ul class=\"{$css_class}\">\n";
		if (array_key_exists('items', $menu)) {
			foreach ($menu['items'] as &$item)
			{
				if (array_key_exists('items', $item))
				{
					print("<li>{$item['text']}</li>\n");
					output_menu($item);
				}
				else
				{
					$path = (strlen($item['path']) > 0) ? $item['path'] . '/' : '';
					print("<li><a href=\"html/{$path}{$item['id']}.html\">{$item['text']}</a></li>\n");
				}
			}
		}
		print "</ul>\n";
	}
	
	function raw_menu_list(&$target, &$menu = null)
	{
		global $MENU;
		if (!isset($menu)) {
			$menu = &$MENU;
		}
		
		if (!array_key_exists('items', $menu)) {
			array_push($target, $menu);
			return;
		}
		
		foreach ($menu['items'] as &$item)
		{
			raw_menu_list($target, $item);
		}
	}

?>
