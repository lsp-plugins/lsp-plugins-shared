<?php
	// Define menu
	def_menu_item('', 'overview', 'Overview');
	def_menu_item('', 'licensing', 'Licensing');
	def_menu_item('', 'requirements', 'System Requirements');
	def_menu_item('', 'installation', 'Installation');
	def_menu_item('', 'controls', 'Basic Controls');
	def_menu_item('', 'plugins', 'Plugin Documentation');
	
	foreach ($PLUGINS as $plugin)
	{
		// Remove _xN, _mono, _stereo, _midi, _do, _ls, _ms postfixes from plugin name
		$page_id = preg_replace('/(?:_x\d+)?(?:_midi)?(?:_mono|_stereo|_do|_lr|_ms)?$/', '', $plugin['id']);
		def_menu_item('plugins', $plugin['id'], $plugin['description'], $page_id);
	}
	
	def_menu_item('', 'tutorials', 'Tutorials and Tips');
	   def_menu_item('tutorials', 'sampler_import_hydrogen_kit', 'Import a Hydrogen Drumkit into Multi-Sampler');
	def_menu_item('', 'video', 'Video Tutorials');
	def_menu_item('', 'development', 'Development Notes');
	   def_menu_item('development', 'versioning', 'Versioning');
	   def_menu_item('development', 'building', 'Building');
	   def_menu_item('development', 'testing', 'Testing');
	   def_menu_item('development', 'eclipse', 'Eclipse IDE Integration');
	   def_menu_item('development', 'ui_guidelines', 'UI Development Guidelines');
	def_menu_item('', 'troubleshooting', 'Troubleshooting');
	
?>
