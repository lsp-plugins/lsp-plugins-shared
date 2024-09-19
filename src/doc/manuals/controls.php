<?php
	$CTL = $RES_ROOT . "/img/controls/";
?>
<div class="grid-2col-man">
	<div class="thc-descr">
	<p>The following picture demonstrates typical Graphical User Interface (GUI) of plugin:</p>
	<img class="plugin" style="max-width: 100%;" src="<?= $RES_ROOT ?>/img/plugins/phase_detector.png">
	</div>
<div class="thc-descr">
<p>Each plugin consists of the following elements:</p>
<ul>
	<li><a href="#AudioFile"><b>Audio File</b></a> &ndash; audio file chooser and editor.</li>
	<li><a href="#Button"><b>Button</b></a> &ndash; button control.</li>
	<li><a href="#Combo"><b>Combo</b></a> &ndash; combo box control.</li>
	<li><a href="#ComboGroup"><b>Combo Group</b></a> &ndash; combo group control.</li>
	<li><a href="#Fader"><b>Fader</b></a> &ndash; fader control.</li>
	<li><a href="#FileSaver"><b>File Saver</b></a> &ndash; file saving control.</li>
	<li><a href="#Footer"><b>Footer</b></a> &ndash; plugin footer.</li>
	<li><a href="#Fraction"><b>Fraction</b></a> &ndash; control for setting musical time signature.</li>
	<li><a href="#Graph"><b>Graph</b></a> &ndash; graphical output area.</li>
	<li><a href="#Group"><b>Group</b></a> &ndash; group control.</li>
	<li><a href="#Header"><b>Header</b></a> &ndash; plugin header.</li>
	<li><a href="#Indicator"><b>Indicator</b></a> &ndash; digital LED indicator.</li>
	<li><a href="#InlineDisplay"><b>Inline Display</b></a> &ndash; inline display.</li>
	<li><a href="#Knob"><b>Knob</b></a> &ndash; rotating knob control.</li>
	<li><a href="#Label"><b>Label</b></a> &ndash; label with text information.</li>
	<li><a href="#Led"><b>Led</b></a> &ndash; LED.</li>
	<li><a href="#Meter"><b>Meter</b></a> &ndash; metering control.</li>
	<li><a href="#Parameter"><b>Parameter</b></a> &ndash; the value of controllable parameter.</li>
	<li><a href="#ProgressBar"><b>Progress Bar</b></a> &ndash; progress control.</li>
	<li><a href="#SampleEditor"><b>Sample Editor</b></a> &ndash; sample editor.</li>
	<li><a href="#SharedMemoryLink"><b>Shared Memory Link</b></a> &ndash; sample editor.</li>
	<li><a href="#TabControl"><b>Tab Control</b></a> &ndash; tab control.</li>
</ul>
</div>
</div>

<p>Colors of widgets may vary but the color scheme of widgets often follows these rules:</p>
<ul>
	<li>Widgets that adjust parameters of similar objects are consolidated into one common group.</li>
	<li>Widgets that control parameters of one object often have similar colors.</li>
	<li>Widgets associated with audio channels often use the following color scheme:</li>
	<ul>
		<li><b style="color:#c344d3">Moderate magenta</b> &ndash; for thresholds.</li>
		<li><b style="color:#bf6455">Moderate red</b> &ndash; for mono channel and stereo channel (when both left and right channels are controlled at same time).</li>
		<li><b style="color:#d8412a">Strong red</b> and <b style="color:#5072f4">Soft blue</b> &ndash; for left and right channels in stereo pair, direct output channel.</li>
		<li><b style="color:#0090a1">Dark cyan</b> and <b style="color:#009700">Dark lime green</b> &ndash; for middle and side channels.</li>
		<li><b style="color:#d8412a">Strong red</b> &ndash; for left channel in stero pair.</li>
		<li><b style="color:#5072f4">Soft blue</b> &ndash; for right channel </li>
		<li><b style="color:#da404a"/>Bright red</b> &ndash; for velocity.</li>
		<li><b style="color:#b07000"/>Dark orange</b> &ndash; for balance.</li>
		<li><b style="color:#9e60ee"/>Soft violet</b> &ndash; for envelopes.</li>
		<li><b style="color:#c65219"/>Strong orange</b> &ndash; for sidechain.</li>
		<li><b style="color:#c2487b"/>Moderate pink</b> and <b style="color:#009555"/>Lime green</b>&ndash; for attack and release.</li>
		<li><b style="color:#8c8700"/>Olive tone</b> and <b style="color:#368ccc"/>Moderate blue</b> &ndash; for dry and wet.</li>
	</ul>
	<li>
		Each widget that allows to set continuous parameters has corresponding label displaying it's current value and,
		optionally, units.
	</li>
</ul>

<p>Below the detailed description of controls is present.</p>

<section id="AudioFile">
	<h2>Audio File</h2>
	
	<div class="grid-2col-man">
		<div class="thc-descr">
			<p>File widget &ndash; initial condition:</p>
			<img class="plugin" style="max-width: 100%;" src="<?= $CTL ?>file_unloaded.png">
			<p>File widget &ndash; error message:</p>
			<img class="plugin" style="max-width: 100%;" src="<?= $CTL ?>file_error.png">
			<p>File widget &ndash; file loaded:</p>
			<img class="plugin" style="max-width: 100%;" src="<?= $CTL ?>file_loaded.png">
		</div>
	
		<div class="thc-descr">
			<p>
				AudioFile widget is used for loading and editing audio files. It tells to the plugin the actual location of file on
				file system.
			</p>
			<p>
				By default there is no file associated with plugin, so the file widget displays
				<b style="color: #00909e">'Click or drug to load'</b> text.
			</p>
			<br>
			<p>
				By clicking left mouse button on the widget you may open file choosing dialog and select the file to use by plugin.
			</p>
			<p>
				After the path to the file will be passed to plugin, the plugin starts to load the file, and the status
				displayed by the file widget changes. If file was successfully loaded, file widget will display
				the corresponding content of the file and it's name (without path). On error, error message is displayed
				with red color.
			</p>
			<br>
			<p>
				By clicking right mouse button, popup dialog appears that allows to cut, copy, paste and clear contents of widget
			</p>
			<p>
				There is also the way to force plugin to unload file. For this purpose simply double-click by right
				mouse button on widget's area if popup menu does not appear.
			</p>
		</div>
	</div>
</section>

<section id="Button">
	<h2>Button</h2>
	
	<p>
		Buttons are mostly used to turn on/turn off some binary parameter. Rarely they are also used for switching between
		different processing modes (See <?php plugin_ref('comp_delay_mono'); ?> plugin for example). There are two different
		types of buttons:
	</p>
	<ul>
		<li><b>push/pop</b> - these buttons allow to change the state of parameter and keep it until next button push occurs.</li>
		<li><b>trigger</b> - these buttons allow to trigger some event while the button is pressed and return to initial state when the button is released.</li>
	</ul>
	<p>
		Push/pop buttons may be pressed by left mouse button click and do not affect
		any parameter changes until the left mouse button is released over the button widget.
		It is possible to cancel button press by moving mouse cursor out of the widget's area
		or by additionally pressing right mouse button.
	</p>
	<p>
		Trigger buttons have radically different behaviour. They trigger event on left mouse
		button click and every time they fall into pushed state. So there is possible to trigger
		sequence of events by pressing left mouse button over the button and repeatedly moving
		mouse cursor outside widget's area and back.
	</p>
	
	<p>For space economy and clarity improving purposes buttons may be combined with LEDs.</p>
	
	<p style="text-align:center">Here is example of different button widgets:</p>
	<div class="images">
		<img src="<?= $CTL ?>button_tap.png">
		<img src="<?= $CTL ?>button_active.png">
		<img src="<?= $CTL ?>button_blank.png">
		<img src="<?= $CTL ?>button_lcf.png">
		<img src="<?= $CTL ?>button_l_r.png">
		<img src="<?= $CTL ?>button_l_r_sm.png">
		<img src="<?= $CTL ?>button_mag_sm.png">
		<img src="<?= $CTL ?>button_on_s_m.png">
		<img src="<?= $CTL ?>button_on_s_m_2.png">
		<img src="<?= $CTL ?>button_on_s_m_3.png">
		<img src="<?= $CTL ?>button_sc_sm.png">
		<img src="<?= $CTL ?>button_side_on.png">
	</div>
</section>

<section id="Combo">
	<h2>Combo</h2>
	
	<p>Combo is a drop-down list that in normal state displays only currently selected item. When clicking
	by left mouse button, it shows drop-down list with all possible variants for choosing. Only one list item
	may be selected at the same time.</p>
	
	<p>It is very useful for defining controls that use enumerations or for switching between different
	control groups.</p>
	
	<p style="text-align:center">Here is example of combo box widgets:</p>
	<div class="images">
		<img src="<?= $CTL ?>combo.png">
	</div>
</section>

<section id="ComboGroup">
	<h2>Combo Group</h2>
	
	<p>Combo group is a <b>Group</b> control that allows to select the displayed content by calling a drop-down list.
	The drop-down list is accessible by clicking with left mouse button the header header of the group.</p>
	
	<p style="text-align:center">Here is example of combo group widget:</p>
	<div class="images">
		<img class="border" src="<?= $CTL ?>combo_group.png">
	</div>
	
	<p style="text-align:center">When clicking the group header, we get all possible variants for choosing widget groups for displaying:</p>
	<div class="images">
		<img class="border" src="<?= $CTL ?>combo_group_select.png">
	</div>
</section>

<section id="Fader">
	<h2>Fader</h2>
	<p>The Fader widget allows to adjust value for continuous parameters in the pre-defined range.</p>
	<p>It is possible to achieve more precision by using the right mouse button instead of left when changing fader's value.</p>
	<p>To cancel editing, the opposite mouse button should be pressed (right if used left and vice verse).</p>
	<p>To reset parameter to it's default value, issue double click by the left mouse button.</p>
	<div class="images">
		<img src="<?= $CTL ?>fader.png">
	</div>
</section>

<section id="FileSaver">
	<h2>File Saver</h2>
	<p>
		This widget allows to choose the file and tell plugin to save some data to it. It also allows to display progress
		and status of operation.
	</p>
	<div class="images">
		<img src="<?= $CTL ?>save_v1.png">
		<img src="<?= $CTL ?>save_v2.png">
		<img src="<?= $CTL ?>save_v3.png">
	</div>
</section>

<section id="Footer">
	<h2>Footer</h2>
	<p>The footer is located at the bottom of plugin and allows to adjust some parameters available in the main menu:</p>
	<ul>
		<li>Show manual for the plugin.</li>
		<li>Adjust the UI scaling for high-DPI displays.</li>
		<li>Adjust the font scaling for people with disabled vision.</li>
	</ul>
	
	<div class="images">
		<img class="border" src="<?= $CTL ?>footer.png">
	</div>
</section>

<section id="Fraction">
	<h2>Fraction</h2>
	<p>
		This widget allows to set-up time signature of the audio that is present as a fraction where top and bottom parts are
		integer values. Both numerator and denominator of fraction is adjustable by mouse wheel. Also, when clicking numerator
		or denominator with left mouse button, popup list box appears that allows to quickly set the required value.
	</p>
	<div class="images">
		<img src="<?= $CTL ?>fraction.png">
	</div>
</section>

<section id="Graph">
	<h2>Graph</h2>
	<p>
		Graph is special widget for displaying graphical information about processes that flow
		in the DSP core of plugin. It may contain lines, text labels, different curves (meshes),
		markers and dots.
	</p>
	
	<p style="text-align:center">Example of graph widget:</p>
	<div class="grid-2col-man">
	<div class="images">
		<img src="<?= $CTL ?>graph.png">
	</div>
	<div class="images">
		<img src="<?= $CTL ?>graph_osc.png">
	</div>
	</div>
	
	<p>
		All elements of graph except dots can not change input parameters of plugin. Dots may control
		simultaneously up to three parameters by the following events:
	</p>
	<ul>
		<li>moving dot horizontally;</li>
		<li>moving dot vertically;</li>
		<li>scrolling mouse wheel over the dot.</li>
	</ul>
	<p>By moving dot over the graph widget two parameters may be changed simultaneously. This can be
	done by left-clicking on the dot, holding mouse button and moving mouse cursor over the graph
	widget's area. Also, additional tolerance may be reached by right-clicking the dot instead of
	left-clicking, this makes the change of parameters more accurate. The movement may be cancelled
	by pressing the opposite button of the mouse.</p>
	<p>Additional tolerance for mouse scroll may be achieved by pressing shift key on keyboard</p>
	
	<p style="text-align:center">Example showing dot controls:</p>
	<div class="images">
		<img src="<?= $CTL ?>dots.png">
	</div>
</section>

<section id="Group">
	<h2>Group</h2>
	
	<p>Group widget is a special widget that allows to visually distinguish set of widgets that
	control parameters of some device or set of similar devices.</p>
	
	<p style="text-align:center">Example showing controls consolidated into group:</p>
	<div class="images">
		<img class="border" src="<?= $CTL ?>group.png">
	</div>
</section>

<section id="Header">
	<h2>Header</h2>
	<p>
		Header delivers the basic information about the plugin and allow to perform primary control over the plugin settings.
		It consists of the following elements:
	</p>
	<ul>
		<li><b>LSP Logo</b> at the left</li>
		<li><b>Plugin name</b> at the top</li>
		<li><b>Plugin model</b> code near to the plugin name.</li>
		<li><b>Bypass button</b> at ther right of the plugin name.</li>
		<li><b>Main menu bar</b> that consists of the following elements:</li>
		<ul>
			<li><b>Menu</b> &ndash; triggers the main plugin menu.</li>
			<li><b>Save</b> &ndash; launches the dialog that allows to save the configuration of plugin to confiruation file.</li>
			<li><b>Load</b> &ndash; launches the dialog that allows to load the configuration of plugin from confiruation file.</li>
			<li><b>Reset</b> &ndash; resets the state of plugin to the default. Requires a confirmation as a protection from accidental click.</li>
			<li><b>About</b> &ndash; shows the dialog which displays all necessary information about the plugin</li>
		</ul>
	</ul>
	<p>The main menu allows to peform the following actions on plugin instance:</p>
	<ul>
		<li>Show manual for the plugin and for the controls.</li>
		<li>Export plugin settings to file and clipboard.</li>
		<li>Import plugin settings from file or clipboard or some special file format (like Hydrogen drumkits or RoomEqWizard filters).</li>
		<li>Create an internal state dump of plugin for shipping an issue report to developers.</li>
		<li>Select the default lanuguage of the user interface.</li>
		<li>Adjust the UI scaling for high-DPI displays.</li>
		<li>Adjust the font scaling for people with disabled vision.</li>
		<li>Change the visual schema for widgets.</li>
		<li>Select the 3D rendering backend if plugin requires 3D rendering.</li>
		<li>Apply different built-in presets if they are present and supported by the plugin.</li>
	</ul>
	
	<p>Plugins typically use the folowing model code format: <b>XXXX&nbsp;MM&nbsp;NN&nbsp;CC</b>, where:</p>
	<ul>
		<li><b>XXXX</b> &ndash; arconym from the full name of plugin, for example <b>GE</b> for <b>Grafischer Entzerrer</b>.</li>
		<li><b>MM</b> &ndash; modifiers that show additional facilities of plugin like <b>M</b> (MIDI) or <b>SC</b> (Side chain)</li>
		<li><b>NN</b> &ndash; number of devices that work simultaneously. For example, <b>16</b> filters for the equalizer.</li>
		<li><b>CC</b> &ndash; channels that plugin operates:</li>
		<ul>
			<li><b>M</b> &ndash; mono;</li>
			<li><b>S</b> &ndash; stereo;</li>
			<li><b>D</b> &ndash; stereo with additional direct output channel;</li>
			<li><b>LR</b> &ndash; stereo, but separately left and right channels;</li>
			<li><b>MS</b> &ndash; middle and side channels.</li>
		</ul>
	</ul>
	
	<div class="images">
		<img class="border" src="<?= $CTL ?>menu_bar.png">
	</div>
	
	<p>
		The content of the exported/imported text file can be manually edited.
		Each parameter has detailed description. Below an example of the configuration file is present:
	</p>
	<pre>
	#-------------------------------------------------------------------------------
	#
	# This file contains configuration of the audio plugin.
	#   Plugin name:         Verzögerungsausgleicher Mono (Delay Compensator Mono)
	#   Plugin version:      1.0.0
	#   LV2 URI:             http://lsp-plug.in/plugins/lv2/comp_delay_mono
	#   VST identifier:      jav8
	#   LADSPA identifier:   5002065
	#
	# (C) Linux Studio Plugins Project
	#   https://lsp-plug.in/
	#
	#-------------------------------------------------------------------------------
	
	# Bypass: true/false
	bypass = false
	
	# Mode: 0..2
	#   0: Samples
	#   1: Distance
	#   2: Time
	mode = 2
	
	# Samples [samp]: 0..10000
	samp = 0
	
	# Meters [m]: 0..200
	m = 0
	
	# Centimeters [cm]: 0.000000..100.000000
	cm = 0.000000
	
	# Temperature [°C]: -60.000000..60.000000
	t = 20.000000
	
	# Time [ms]: 0.000000..1000.000000
	time = 3.349236
	
	# Dry amount [G]: 0.000000..10.000000
	dry = 0.000000
	
	# Wet amount [G]: 0.000000..10.000000
	wet = 1.000000
	
	# Output gain [G]: 0.000000..10.000000
	g_out = 1.000000
	
	#-------------------------------------------------------------------------------
	</pre>
</section>

<section id="Indicator">
	<h2>Indicator</h2>
	
	<p>Indicators are widgets that display measured or computed value by the plugin.</p>
	
	<p style="text-align:center">Example of indicator widget:</p>
	<div class="images">
		<img src="<?= $CTL ?>indicator.png">
	</div>
</section>

<section id="InlineDisplay">
	<h2>Inline display</h2>
	
	<p>Inline displays are not widgets or elements of plugin's UI at all. Instead of this, they're part of
	the host UI since the <a href="https://ardour.org/">Ardour DAW</a> implemented Inline Display extension for
	LV2 format.</p>
	<p>So they're available in the Ardour's mixer strip even if UI is not shown. Inline displays also are
	available in <a href="https://harrisonconsoles.com/">Mixbus DAW</a> as the relative to Ardour product.</p>
	<p>Because inline display is an LV2-specific exension, it is available only for LV2 version of LSP plugins.
	But standalone JACK versions of plugins that support inline displays in LV2, draw them on window's icon.</p>
	
	<p style="text-align:center">Example of inline displays:</p>
	<div class="images">
		<img src="<?= $CTL ?>inline_display1.png">
		<img src="<?= $CTL ?>inline_display2.png">
	</div>
</section>

<section id="Knob">
	<h2>Knob</h2>
	<p>Knobs are the mostly used controls by plugin GUIs. They allow to adjust value for continuous parameters
	in the pre-defined range. Higlighted part of the knob's scale shows deviation from it's zero position.
	There are many ways to adjust the controlled parameter.<p>
	<p>The first way to change the parameter is performing left mouse click on the knob's cap, holding mouse
	button and moving cursor up and down. To apply more accurate adjustment, right button of mouse may be pressed
	while moving cursor.</p>
	<p>The second way to change parameter's value may be reached by using mouse scroll. To perform more accurate
	adjustment, shift key may be pressed on keyboard. To accelerate the adjustment, control key may be pressed on keyboard.</p>
	<p>For all knobs (especially when they are stiff) quick adjustment of parameter may be achived by left-clicking
	knob's scale. Also, additionally mouse button may be hold and parameter will be adjusted by moving mouse
	clockwise/counter-clockwise.</p>
	<p>Note, that knob scale actions can be enabled or disabled by the additional 'UI behavior' &rarr; 'Editable knob scale' option.</p>
	<p>To reset parameter to it's default value, left mouse button double click may be issued.</p>
	<p>Note that in most cases additional 'Parameter' widget that displays the actual value of the parameteris
	located nearby the knob . While the knob widget allows to adjust the value with some step, the 'Parameter'
	widget allows to set the precise value by double-clicking the displayed value and entering the new desired
	value by the keyboard.</p>
	
	<p style="text-align:center">Example showing knob controls:</p>
	<div class="images">
		<img src="<?= $CTL ?>knob_blue.png">
		<img src="<?= $CTL ?>knob_cyan.png">
		<img src="<?= $CTL ?>knob_green.png">
		<img src="<?= $CTL ?>knob_orange.png">
		<img src="<?= $CTL ?>knob_red.png">
		<img src="<?= $CTL ?>knob_yellow.png">
	</div>
</section>

<section id="Label">
	<h2>Label</h2>
	<p style="text-align:center">Labels are widgets that display static text information.<p>
	
	<p style="text-align:center">Example of label widgets:</p>
	<div class="images">
		<img class="border" src="<?= $CTL ?>labels.png">
	</div>
</section>

<section id="Led">
	<h2>Led</h2>
	<p style="text-align:center">LEDs are used to display state of binary output parameter.<p>
	<p style="text-align:center">Example of LEDs:</p>
	<div class="images">
		<img class="border" src="<?= $CTL ?>leds.png">
	</div>
</section>

<section id="Meter">
	<h2>Meter</h2>
	<p>Meters are used for metering some values (mostly, levels of the audio signal). They may contain yellow
	and red zones. They respectivelly show that signal exceeds -6dB and 0dB levels.<p>
	<p style="text-align:center">Example of meters:</p>
	<div class="images">
		<img style="margin-right:10px;" src="<?= $CTL ?>meter_mono.png">
		<img  src="<?= $CTL ?>meter_stereo.png">
	</div>
</section>

<section id="Parameter">
	<h2>Parameter</h2>
	<p>Parameters are widgets that display the actual value and measuring units of some controlled parameter.
	It is possible do double-click the parameter and enter it's value manually in the popup window.
	<div class="images">
		<img class="border" style="margin-right: 10px;" src="<?= $CTL ?>params.png">
		<img class="border" src="<?= $CTL ?>param_enter.png">
	</div>
</section>

<section id="ProgressBar">
	<h2>Progress Bar</h2>
	<p>
		Progress Bar is a widget for monitoring execution progress of offline tasks.
		It shows the actual completion percentage of the background job.
	<p>
	<p>Example of progress bar:</p>
	<div class="images">
		<img src="<?= $CTL ?>progress_bar.png">
	</div>
</section>

<section id="SampleEditor">
	<h2>Sample Editor</h2>
	
	<p>Sampe Editor widget is used for viewing and editing audio samples. It is similar to AudioFile wiget but
	unlike AudioFile widget, it does not allow to load files from file system.</p>
	
	<p>By default if there is no sample data, the file widget displays
	<b style="color: #00c000">'No data'</b> text.</p>
	<p>Example of sample editor widget:</p>
	<div class="images">
		<img class="border" src="<?= $CTL ?>sample_editor.png">
	</div>
</section>

<section id="SharedMemoryLink">
	<h2>Shared Memory Link</h2>
	
	<p>The shared memory link allows to connect plugins via a shared memory segment. This allows one set of plugins
	to allocate some named shared memory segment and submit some data (like audio stream) to it. The other set of
	plugins can connect to the shared memory segment and read data from it. Some plugins allow to work with multiple
	shared memory segments as both readers and writers.</p>
	<p>Shared memory link is a very versatile feature that allows to communicate plugins of different formats
	and of different kinds and do some cooperative work.<p>
	<p>The shared memory link control looks similar to button. By default it shows the 'Send...' or 'Link...' text
	that indicates that currently there is no connection estimated to the shared memory segment. When connected,
	it shows the name of the shared memory segment and the direction of the connection:</p>
	<ul>
		<li>the arrow at the left of the link name indicates the link being audio send (output only);</li>
		<li>the arror at the right of the link name indicates the link being audio return (input only);</li>
		<li>the equation at the left of the link name indicates the link being some unidirectional readable and writeable shared memory structure.</li>
	</ul>
	<p>When clicking the shared memory link, the popup dialog appears that allows to enter the name of new shared memory
	segment or choose the already existing one. The input field also acts as a filter for filtering all available shared
	memory segments.</p>
	<p>Example of sample editor widget:</p>
	<div class="images">
		<img class="border" src="<?= $CTL ?>shmlink_not_connected.png">
		<img class="border" src="<?= $CTL ?>shmlink_connected.png">
		<img class="border" src="<?= $CTL ?>shmlink_popup.png">
	</div>
</section>

<section id="TabControl">
	<h2>Tab Control</h2>
	
	<p>Tab control allows to group multiple elements into tabs. When a specific tab is active, the only set of
	   controls that belong to the tab becomes visible.</p>
	
	<p>Example of the tab control:</p>
	<div class="images">
		<img class="border" src="<?= $CTL ?>tab_control.png">
	</div>
</section>

