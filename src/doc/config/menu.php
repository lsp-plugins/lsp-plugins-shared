<?php
	// Define menu
	def_menu_item('', 'overview', 'Overview', null);
	def_menu_item('', 'licensing', 'Licensing', null);
	def_menu_item('', 'requirements', 'System Requirements', null);
	def_menu_item('', 'installation', 'Installation', null);
	def_menu_item('', 'controls', 'Basic Controls', null);
	def_menu_item('', 'plugins', 'Plugin Documentation', 'manual_plugin_list');
	
	foreach ($PLUGINS as $plugin)
	{
		// Remove _xN, _mono, _stereo, _midi, _do, _ls, _ms postfixes from plugin name
		$page_id = preg_replace('/(?:_x\d+)?(?:_midi)?(?:_mono|_stereo|_do|_lr|_ms)?$/', '', $plugin['id']);
		def_menu_item('plugins', $plugin['id'], $plugin['description'], null, $page_id);
	}
	
	def_menu_item('', 'tutorials', 'Tutorials and Tips', null);
		def_menu_item('tutorials', 'sampler_import_hydrogen_kit', 'Import a Hydrogen Drumkit into Multi-Sampler', null);
	def_menu_item('', 'video', 'Video Tutorials', null);
	def_menu_item('', 'development', 'Development Notes', null);
		def_menu_item('development', 'versioning', 'Versioning', null);
		def_menu_item('development', 'building', 'Building', null);
		def_menu_item('development', 'testing', 'Testing', null);
		def_menu_item('development', 'eclipse', 'Eclipse IDE Integration', null);
		def_menu_item('development', 'ui_guidelines', 'UI Development Guidelines', null);
	def_menu_item('', 'troubleshooting', 'Troubleshooting', null);
	
?>
