<?php
	$CTL = $RES_ROOT . "/img/ui_guidlines/";
?>

<h2>Foreword</h2>
<p>Before introducing any changes to the user interface, it is very important to carefully consider their necessity and possible side effects. It is important to understand how these changes will affect end users and ensure that they won’t complicate
	or disimprove the user experience.</p>
<p>It is also important to count that any changes in the user interface may require additional time spendings for development and testing. Also it is very important to estimate how these changes can make the final product better.</p>

<h2>Common terms</h2>
<p>The main principle of the LSP Plugins’ user interface creation is the compactness. </p>
<p>Althroug plugins are present as standalone applications and built-in plugins for DAW, it is important to make the plugin window as compact as possible. It is needed to make the end user possible to simultaneously work with multiple plugins on the
	same screen.</p>
<p>The main complexity of creation of the UI is that LSP Plugins, as usual, provide many controllable parameters available to the user. That gives wide tuning possibilities, higher precision and flexibility to the workflow, so all these controls
	should be displayed in the plugin’s window.</p>
<p>In other words, it is important to find compromises between the compactness and the comfortability of the use.</p>

<h2>Block and table system</h2>

<p>We use the mix of block and table system while developing the UI - this is a markup plinciple based on usage of tables and nested elements - widgets.<br />
	Widget is a small interactive element which can provide different functions and act as some view of some information or some control which allows to modify some information.
</p>

<p>Widgets can be grouped into blocks and placed at some position of the table — such mmix of block and table markup allows to define the position and the structure of widgets in the plugin’s window.</p>

<h2>Basic principles</h2>

<ul>
	<li>The plugin’s window becomes split into separate blocks, each of them can contain it’s own properties: the color of the background, the padding, the minimal width, etc. The size of paddings, minimal size, etc is counted in nominal pixels.</li>
	<li>Also block can be built-in into another block. This allows to create more complicated strutures.</li>
	<li>Blocks can inherit some features of parent blocks. For example, the color of the background.</li>
	<li>We use tags for the definition of the window structure and location of the blocks.</li>
</ul>
<p>The example below demonstrates the markup of very simple interface for some plugin.</p>
<div class="grid-2col-man">
	<div class="thc-descr">
		<pre style="margin-top: 0px;">
&lt;plugin resizable=&quot;true&quot;&gt;
&nbsp; &lt;hbox bg.color=&quot;bg_schema&quot; pad.v=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp; &lt;vbox spacing=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.dry&quot;/&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;dry&quot; scale.color=&quot;dry&quot;/&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;value id=&quot;dry&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;/vbox&gt;
&nbsp;&nbsp;&nbsp; &lt;vbox spacing=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.wet&quot;/&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;wet&quot; scale.color=&quot;wet&quot;/&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;value id=&quot;wet&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;/vbox&gt;
&nbsp;&nbsp;&nbsp; &lt;vbox spacing=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.output&quot;/&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;g_out&quot;/&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;value id=&quot;g_out&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;/vbox&gt;
&nbsp; &lt;/hbox&gt;
&lt;/plugin&gt;</pre>
	</div>
	<div class="thc-descr">
		<img class="plugin" style="max-width: 100%;" src="<?= $CTL ?>/simple_interface.png">
		<p>And this is how this interface looks out.</p>
	</div>
</div>
<ul>
	<li>If the structure is more complicated than set of several blocks placed into one single horisontal or vertical line, it is recommended to use grid and place blocks and widgets into separate cells of the grid.</li>
</ul>
<div class="grid-2col-man">
	<div class="thc-descr">
		<pre style="margin-top: 0px;">&lt;plugin resizable=&quot;true&quot;&gt;
&nbsp; &lt;grid rows=&quot;3&quot; cols=&quot;3&quot; spacing=&quot;4&quot;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; bg.color=&quot;bg_schema&quot; pad.v=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 1 --&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.dry&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.wet&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.output&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 2 --&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;dry&quot; scale.color=&quot;dry&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;wet&quot; scale.color=&quot;wet&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;g_out&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 3 --&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;dry&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;wet&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;g_out&quot;/&gt;
&nbsp; &lt;/grid&gt;
&lt;/plugin&gt;</pre>
	</div>
	<div class="thc-descr">
		<img class="plugin" style="max-width: 100%;" src="<?= $CTL ?>/simple_interface_grid.png">
		<p>At the first glance, the UI looks the same to the previous example. But actually the grid is much better dealing with the space allocation between widgets and their placing.</p>
	</div>
</div>
<ul>
	<li>We use schemas to define styles for block’s elements <b><em>(located in the following project’s relative path: lsp-plugins/modules/lsp-plugins-shared/res/main/schema)</em></b>, which contain predefined colors, widget properties and their
		behavior. It is also possible to set widget attributes using tag’s attributes as we saw it in the example above with knob widgets: <b><em>&lt;knob id=&quot;dry&quot; scale.color=&quot;dry&quot; /&gt;</em></b>. <br /> Such markup allows to have
		more flexible control over the location of elements within plugin’s window and make the overall UI design adaptive.</li>
	<li>For better understanding of how does it all work together, it is better to perform the one’s own analysis of one of already designed plugins.</li>
</ul>

<h2>Color and style schemes</h2>
<p>The style scheme includes all the information about what colors, paddings, sizes etc will be utilized by widgets.</p>
<div class="grid-2col-man">
	<div class="thc-descr">
		<p style="text-align:center">Preconfigured style in the Modern.xml schema:</p>
		<span><img class="border" style="float: right; margin-left: 10px;" src="<?= $CTL ?>/modern_group.png">
			<pre style="margin-top: 0px; max-width: 270px;">
&lt;style class=&quot;Group&quot; parents=&quot;root&quot;&gt;
&nbsp;&nbsp; &nbsp;&lt;color value=&quot;bg_name&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;border.size value=&quot;0&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;text.color value=&quot;text_group&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;text.radius value=&quot;0&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;ipadding value=&quot;6&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;padding value=&quot;0&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;border.radius value=&quot;0&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;bg.color value=&quot;bg_light&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;heading value=&quot;-1 1&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;text.padding.left value=&quot;6&quot;/&gt;
&lt;/style&gt;</pre>
		</span>

	</div>

	<div class="thc-descr">
		<p style="text-align:center">Preconfigured style in the Legacy.xml schema:</p>
		<span><img class="border" style="float: right; margin-left: 10px;" src="<?= $CTL ?>/legacy_group.png">
			<pre style="margin-top: 0px; max-width: 260px;">
&lt;style class=&quot;Group&quot; parents=&quot;root&quot;&gt;
&nbsp;&nbsp; &nbsp;&lt;color value=&quot;bg_name&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;border.size value=&quot;2&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;text.color value=&quot;text_group&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;text.radius value=&quot;10&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;ipadding value=&quot;12&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;padding value=&quot;0&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;border.radius value=&quot;10&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;bg.color value=&quot;bg&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;heading value=&quot;-1 0&quot;/&gt;
&nbsp;&nbsp; &nbsp;&lt;text.padding.left value=&quot;6&quot;/&gt;
&lt;/style&gt;</pre>
		</span>

	</div>
</div>
<p>The user interface of LSP Plugins allows to use multiple schemas which can be switched in runtime (without need to reload) by using one of the menu items listed in the menu→visual schema menu.</p>
<p style="text-align:center">Scheme "Modern":</p>
<div class="images" style="margin: -10px auto 15px auto;">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/scheme_modern.png">
</div>
<p style="text-align:center">Scheme "Legacy":</p>
<div class="images" style="margin: -10px auto 15px auto;">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/scheme_legacy.png">
</div>
<p style="text-align:center">Scheme "Legacy Dark":</p>
<div class="images" style="margin: -10px auto 15px auto;">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/scheme_legacy_dark.png">
</div>
<p>One important rule: if some color was added to one shema, it should also be added to other schemas. It is also imporant to check how new added color affects the look of related widgets for these schemas.</p>

<h2>Basic color rules and solutions</h2>

<p>In the &quot;MODERN&quot; schema all colors are organized according to the LCH (or HCL) color space which is based on LAB color space. In such color space all colors have perceptual uniformity. That means, that in LCH color space all colors that
	have the same lighness are perceived as colors that have the same lightness, and all colors that have the same chromaticity are percieved as colors with the same chromaticity.</p>

<p>Such decision was made for the purpose of making the interface soft and not too motely, and also to make the individual elements not changing the brightness depending on the color tone (as a counterversive part to HSL color space in the
	&quot;Legacy&quot; schema).</p>

<p style="text-align:center">It is much easier to understand if we grayscale the pictures for &quot;Modern&quot; and &quot;Legacy&quot; schemas.</p>
<div class="grid-2col-man">
	<div class="thc-descr" style="margin: 0 auto;">
		<img class="border" src="<?= $CTL ?>/lch_color.png">
		<img class="border" src="<?= $CTL ?>/lch_gray.png">
	</div>
	<div class="thc-descr" style="margin: 0 auto;">
		<img class="border" src="<?= $CTL ?>/hsl_color.png">
		<img class="border" src="<?= $CTL ?>/hsl_gray.png">
	</div>
</div>

<p style="text-align:center">Anyway, it is much easier to add the color to the «Modern» schema just by choosing one of colors from the palette below.</p>
<div class="images" style="margin: -10px auto 15px auto;">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/palette 256.png">
</div>

<p style="text-align:center">In schemas many parameters already have their colors, here are some of them:</p>

<div class="grid-2col-man">
	<div class="thc-descr">
		<pre style="margin-top: 0px; margin-bottom: 0px;">
&lt;!-- Knob and meshes colors --&gt;
&lt;mono_in value=&quot;#bf6455&quot;/&gt;
&lt;mono value=&quot;#d8412a&quot;/&gt;
&lt;left_in value=&quot;#bf6455&quot;/&gt;
&lt;right_in value=&quot;#717eae&quot;/&gt;
&lt;left value=&quot;#d8412a&quot;/&gt;
&lt;right value=&quot;#5072f4&quot;/&gt;
&lt;mid_in value=&quot;#52888e&quot;/&gt;
&lt;side_in value=&quot;#538c50&quot;/&gt;
&lt;mid value=&quot;#0090a1&quot;/&gt;
&lt;side value=&quot;#009700&quot;/&gt;
&lt;velocity value=&quot;#da404a&quot;/&gt;
&lt;balance value=&quot;#b07000&quot;/&gt;
&lt;fader_balance value=&quot;#b07000&quot;/&gt;
&lt;balance_l value=&quot;#b07000&quot;/&gt;
&lt;balance_r value=&quot;#868200&quot;/&gt;
&lt;envelope value=&quot;#9e60ee&quot;/&gt;
&lt;envelope_1 value=&quot;#9e60ee&quot;/&gt;</pre>
	</div>
	<div class="thc-descr">
		<pre style="margin-top: 0px; margin-bottom: 0px;">
&lt;envelope_2 value=&quot;#8d76aa&quot;/&gt;
&lt;sidechain value=&quot;#c65219&quot;/&gt;
&lt;sidechain_1 value=&quot;#c65219&quot;/&gt;
&lt;sidechain_2 value=&quot;#b36c49&quot;/&gt;
&lt;threshold value=&quot;#c344d3&quot;/&gt;
&lt;threshold_1 value=&quot;#c344d3&quot;/&gt;
&lt;threshold_2 value=&quot;#c344d3&quot;/&gt;
&lt;attack value=&quot;#c2487b&quot;/&gt;
&lt;attack_1 value=&quot;#c2487b&quot;/&gt;
&lt;attack_2 value=&quot;#c2487b&quot;/&gt;
&lt;release value=&quot;#009555&quot;/&gt;
&lt;release_1 value=&quot;#009555&quot;/&gt;
&lt;release_2 value=&quot;#009555&quot;/&gt;
&lt;dry value=&quot;#8c8700&quot;/&gt;
&lt;wet value=&quot;#368ccc&quot;/&gt;
&lt;lufs value=&quot;#8ab252&quot;/&gt;
&lt;bright_lufs value=&quot;#bee784&quot;/&gt;
&lt;dark_lufs value=&quot;#557c1e&quot;/&gt;</pre>
	</div>
</div>

<p>That&rsquo;s why before adding new color to the widget&rsquo;s property it is important to ensure that it is not already defined in the schema.<br />
	The color in color schema should reflect the meaning of the entity it is operating or the process it is responsible for. In other words, &quot;button_green&quot; is a bad name for the color because even if it is green in current schema, it can
	suprisingly become of another color in another schema. By the other side, &quot;button_threshold&quot; is a good color name because it tells about the function of the element it is associated with.</p>

<p>The value of the color can be defined in multiple ways (capital letters mean hexadecimal digits while lower-case letters mean floating-point values often normalized to range 0.0 to 1.0):</p>

<ul>
	<li>RGB: #RGB, #RRGGBB, #RRRGGGBBB, rgb(r, g, b); </li>
	<li>RGBA: #ARGB, #AARRGGBB, #AAARRRGGGBBB, rgba(R, G, B, A); </li>
	<li>HSL: @HSL, @HHSSLL, @HHHSSSLLL, hsl(H, S, L) </li>
	<li>HSLA: @AHSL, @AAHHSSLL, @AAAHHHSSSLLL, hsla(H, S, L, A); </li>
	<li>HCL: hcl(h, c, l); </li>
	<li>HCLA: hcla(h, c, l, a); </li>
	<li>LAB: lab(l, a, b); </li>
	<li>LABA: laba(l, a, b, a); </li>
	<li>CMYK: cmyk(c, m, y, k); </li>
	<li>CMYKA: cmyka(c, m, y, k, a). </li>
</ul>

<p>The color is considered fully transparent when the normalized value of the alpha component (a, A) is 1.0, and fully opaque when the normalized value of the alpha component is 0.0. That allows to omit the alpha value for definition of fully opaque
	colors.</p>

<p>It is strongly not recommended to explicitly define the value of the color in plugin&rsquo;s UI markup file. Otherwise switching schemas will yield to unexpected results caused by hard-coded colors not blending together with other elements. To
	prevent such problem, it is strongly recommented to define all colors in schema files.</p>

<p>If widgets are of the different kind but carry the same meaning, it is important to make them of the same color. It helps to preserve the common style and provide the consistency of the interface.</p>

<p>Gray tones are used only for inactive (disabled) elements and we don&rsquo;t use it for any plugin&rsquo;s parameter.</p>

<p style="text-align:center">In the example below the selected filter does not provide band width nor gain controls, that&rsquo;s why corresponsing widgets were of the gray color.</p>
<div class="images" style="margin: -10px auto 15px auto;">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/inactive.png">
</div>

<p>The markup language allows to use loops for building multiple blocks of the same pattern.<br />
	In the example below we can color widgets by setting the base color and altering it&rsquo;s tone by setting different values to the &laquo;hue&raquo; attribute proportionally to the value of the iterator variable:</p>

<pre>
&lt;plugin resizable=&quot;true&quot;&gt;
&nbsp; &lt;grid rows=&quot;3&quot; cols=&quot;8&quot; bg.color=&quot;bg_schema&quot; spacing=&quot;4&quot; transpose=&quot;true&quot;&gt;
&nbsp;&nbsp;&nbsp; &lt;ui:for id=&quot;i&quot; first=&quot;0&quot; count=&quot;8&quot;&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.dry&quot;/&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;dry&quot; scolor=&quot;cycle&quot; scolor.hue=&quot;${:i * 0.125}&quot;/&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;value id=&quot;dry&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;/ui:for&gt;
&nbsp; &lt;/grid&gt;
&lt;/plugin&gt;</pre>

<p style="text-align:center">This allows to gain the following result:</p>
<div class="images" style="margin: -10px auto 15px auto;">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/cycles.png">
</div>

<p>There are three colors defined for the background in &quot;Modern&quot; schema. Usually, the first color is used by separators and paddings, the second color is used for primary background, the third one is the primary backround for widgets in
	inactive state.</p>

<p>Instead of higlighting some active element, it is decided in LSP to darken inactive elements. In other words, the block containing widget and all widgets in this block become darken. Scales, buttons, meters and other colored widgets become
	grayscale (excluding the active ones).</p>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/inactive_2.png">
</div>

<p>In common case it can be performed by manipulating the value of bg.color, and bg.bright properties.</p>

<p>It is generally accepted to use spacing between blocks of 4 nominal pixels, sometimes additionally separators are applied. The difference between spacings and separators is that separators allow to logically separate widgets in the same block. It
	is recommended to use separators of the following kind:<em><strong> &lt;vsep pad.h=&quot;2&quot; bg.color=&quot;bg&quot; hreduce=&quot;true&quot;/&gt; </strong></em>or <em><strong>&lt;hsep pad.v=&quot;2&quot; bg.color=&quot;bg&quot;
			vreduce=&quot;true&quot;/&gt;</strong></em>.</p>

<p style="text-align:center">Such separators will be visible in other schemas where the color of the background is not altering:</p>

<pre>
&lt;plugin resizable=&quot;true&quot;&gt;
&nbsp; &lt;grid rows=&quot;4&quot; cols=&quot;5&quot; bg.color=&quot;bg_schema&quot;&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 1 --&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.dry&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;cell rows=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;vsep pad.h=&quot;2&quot; bg.color=&quot;bg&quot; hreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;/cell&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.wet&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;cell rows=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;vsep pad.h=&quot;2&quot; bg.color=&quot;bg&quot; hreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;/cell&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.output&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 2 --&gt;
&nbsp;&nbsp;&nbsp; &lt;hsep pad.v=&quot;2&quot; bg.color=&quot;bg&quot; vreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;hsep pad.v=&quot;2&quot; bg.color=&quot;bg&quot; vreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;hsep pad.v=&quot;2&quot; bg.color=&quot;bg&quot; vreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 3 --&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;dry&quot; scale.color=&quot;dry&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;wet&quot; scolor=&quot;wet&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;g_out&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 4 --&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;dry&quot; pad.b=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;wet&quot; pad.b=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;g_out&quot; pad.b=&quot;4&quot;/&gt;
&nbsp; &lt;/grid&gt;
&lt;/plugin&gt;</pre>

<div class="grid-2col-man">
	<div class="thc-descr" style="margin: 0 auto;">
		<img class="border" src="<?= $CTL ?>/separator_modern.png">
	</div>
	<div class="thc-descr" style="margin: 0 auto;">
		<img class="border" src="<?= $CTL ?>/separator_legacy.png">
	</div>
</div>

<p>Internal paddings for widgets of the same block have 6 nominal pixels in the horizontal direction and 4 nominal pixels in the vertical direction.</p>

<p>While designing the user interface, it is generally accepted to always show all possible elements like knobs, combo boxes, buttons, etc. If under certain conditions widget is useless, we don&rsquo;t hide it from the UI but make inactive (gray
	color and dark background if necessary). This allows to make the UI look more stable, no window resize nor content flickering happens.</p>

<p>It is strongly recommended to verify the maximum and minimum values of the <strong><em>&lt;value&gt;</em></strong> widget. For this pupose just put the corresponding control element into the minimum and maximum positions. If the values are
	flickering and force to flicker the neighbor widgets, it is required to explicitly specify the minimum widget width that allows to fully fit the minimum and maximum value text.</p>

<pre>
&lt;plugin resizable=&quot;true&quot;&gt;
&nbsp; &lt;grid rows=&quot;4&quot; cols=&quot;5&quot; bg.color=&quot;bg_schema&quot;&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 1 --&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.dry&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;cell rows=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;vsep pad.h=&quot;2&quot; bg.color=&quot;bg&quot; hreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;/cell&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.signal.wet&quot; expand=&quot;true&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;cell rows=&quot;4&quot;&gt;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;vsep pad.h=&quot;2&quot; bg.color=&quot;bg&quot; hreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;/cell&gt;
&nbsp;&nbsp;&nbsp; &lt;label text=&quot;labels.output&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 2 --&gt;
&nbsp;&nbsp;&nbsp; &lt;hsep pad.v=&quot;2&quot; bg.color=&quot;bg&quot; vreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;hsep pad.v=&quot;2&quot; bg.color=&quot;bg&quot; vreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;hsep pad.v=&quot;2&quot; bg.color=&quot;bg&quot; vreduce=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 3 --&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;dry&quot; scale.color=&quot;dry&quot; pad.v=&quot;4&quot; pad.h=&quot;6&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;wet&quot; scale.color=&quot;wet&quot; pad.v=&quot;4&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;knob id=&quot;g_out&quot; pad.v=&quot;4&quot; pad.h=&quot;6&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;!-- Row 4 --&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;dry&quot; pad.b=&quot;4&quot; same.line=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;wet&quot; pad.b=&quot;4&quot; same.line=&quot;true&quot;/&gt;
&nbsp;&nbsp;&nbsp; &lt;value id=&quot;g_out&quot; pad.b=&quot;4&quot; same.line=&quot;true&quot;/&gt;
&nbsp; &lt;/grid&gt;
&lt;/plugin&gt;</pre>
<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/shake.gif">
</div>

<p>On the picture above we observe the flickering of the UI when adjusting the value of the &quot;Dry&quot; knob. To solve this, we alterate the tag <strong><em>&lt;value id=&quot;dry&quot; pad.b=&quot;4&quot;
			same.line=&quot;true&quot;/&gt;</em></strong> and append additional property <strong><em>width.min=&quot;48&quot;</em></strong>. Finally the tag now looks like this: <strong><em>&lt;value id=&quot;dry&quot; pad.b=&quot;4&quot;
			same.line=&quot;true&quot; width.min=&quot;48&quot;/&gt;</em></strong>. The result is on the picture below:</p>


<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/no_shake.gif">
</div>

<p>The interface allows to change it&rsquo;s size on the fly: change the size of the window and scale the size of the nominal pixel. So it is important to verify how the plugin will look like when the window becomes expanded to the full screen. It is
	important to ensure that the only designed for expanding elements will take the free space while other elements will keep their sizes.</p>


<p style="text-align:center">Normal size:</p>
<div class="images" style="margin: -10px auto 15px auto;">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/gott.png">
</div>

<p style="text-align:center">Full screen size:</p>
<div class="images" style="margin: -10px auto 15px auto;">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/gott_full_screen.png">
</div>

<p>The properties expand, vexpand, hexpand are responsible for expanding the widgets. If the only one element in the grid will contain such property, then only this widget will take the maximum possible space. In the case when there are more than one
	expanding widgets, then they will share the space proportionally to their sizes. Usually these properties are applied to graphs or widgets that provide some visual information.</p>

<h2>Sections and components</h2>
<p>The interface is split into three parts: top panel, the body and the bottom panel.</p>

<p>&nbsp;</p>

<h3>Top panel</h3>

<p>At the left the logo is located. At the top right corner the name of the plugin is placed. At the right bottom corner global controls are placed which are common for all plugins.</p>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/top.png">
</div>

<h3>Body</h3>

<p>In the plugin&rsquo;s body are located wigets responsible for the plugin&rsquo;s configuration and for display of actual plugin&rsquo;s state.</p>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/middle.png">
</div>

<p>In the body of the plugin there can be such elemens as:</p>

<p>&nbsp;</p>

<h4>Graph</h4>

<p>The graph widget can contain necessary curves displaying, for example, the spectrum of the signal, or control elements like dots and markers.</p>

<p>It is generally accepted to add the title to the graph. For example, the &laquo;Spectrum graph&raquo; below:</p>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/graph.png">
</div>

<h4>Group</h4>

<p>In this widgets the widgets of the same meaning or functionality are usually placed. For example, the knobs that control the levels of input and output signals. The group can contain some heading or can not contain it.</p>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/group.png">
</div>

<p>There are also widgets of the same to<strong><em> &lt;group&gt; </em></strong>meaning: <strong><em>&lt;tabs&gt; and &lt;cgroup&gt;</em></strong>. They are designed for paging purpose and paginized access to the huge amount of control elements such
	as filter parameters in the equalizer or differens sample manipulations in sampler.</p>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/tabs.png">
</div>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/cgroup.png">
</div>

<p>It is also commonly accepted to group together widgets of the similar meaning or related to the same actions. They can be not organized into groups but split with separators as it done with LUFS control in the clipper plugin. The
	<strong><em>&lt;ledmeter&gt;, &lt;button&gt; </em></strong>and<strong><em> &lt;knob&gt;</em></strong> are placed in the same block.
</p>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/lufs_group.png">
</div>

<h4>Label</h4>
<p>This widget is used to deliver some text information. It is strongly denied to hard-code the text of the label inside of the markup file if it can contain non-numeric value. All values and parameters should be added to localization files in JSON
	format. Meanwhile the associated localization key should be of the similar sense the text of the label is holding. It is required to add localization keys and localization values at least into two sub-trees: default and us. But if you&rsquo;re the
	native speaker of other languages present in the localization tree, it is a good tone to add translations for your native language, too.</p>

<h4>Value</h4>
<p>This widget is also designed to deliver some text information. The main difference to the label is that it displays the actual value of some plugin&rsquo;s parameter.</p>

<h4>Buttons</h4>
<p>Buttons are widgets that allow to turn on, turn off, switch the parameter or act as a trigger. It is allowed to place some text inside of the button related to some parameter or action the button is dealing with. The rules of adding text are the
	same to the rules of adding text to the label. There are some predefined styles in the schemas for buttons. For example, &quot;Button_stretch_8&quot;. The &quot;stretch&quot; word means that this button is related to the stretching functions and is
	associated with colors that are coding the stretching function. The number &quot;8&quot; informs about the size of the text inside of the button.</p>

<h4>Meters</h4>
<p>This type of widgets usually displays the loudness level or the level of impact. It is accepted to supply some label near the meter widget for better understanding of the entity or process it is associated with. As an exception, the clarifying
	label can be omitted when the designation of the widget is obvious even without any captions. For example, when the meter is placed in the same group with some single parameter.</p>

<h4>Fader</h4>
<p>This widget can be horizontal or vertical. The main sense of this widget is to change plugin&rsquo;s parameters. It is very often used for control over zoom on graph widgets.</p>

<h4>Knobs</h4>
<p>Same to the fader, knobs are designed for control over some plugin&rsquo;s parameter. The same way to the buttons knobs also have predefined styles in schemas. Knob allows to change many parameters like it&rsquo;s overall size or the width of the
	scale but in many cases with the purpose of the color coding the color of the knob&rsquo;s scale is altered.</p>

<h3>Bottom panel</h3>

<p>The bottom panel contains elements which are common for all plugins. The buttons for window sizing, text sizing, UI scaling. This panel is accepted for placing only of control elements shared by all plugins and rarely used.</p>

<div class="images">
	<img class="border" style="max-width: 100%;" src="<?= $CTL ?>/bottom.png">
</div>

<p>It should be noted that the overall plugin design and concept of the concrete schema should be taken into attention. The newly created widget should follow the common scheme, for example not use corner rounding for the schema where the corner
	rounding is not used.</p>

<p>It is also should be noted that the LSP toolkit contains much more widgets but their detailed description will take much more time. LSP Project&rsquo;s team will prefer to spend time for introduction new functionality. But initiative and
	contribution to the project are affordable and welcome.</p>

<p>To understand the complete set of attributes provided by the widget, it is a good reason to look inside the code of the widget placed in the lsp-tk-lib library and find it&rsquo;s style definition.</p>

<p style="text-align:center">For example, in the Knob.cpp file contains the following style definition:</p>
<pre>LSP_TK_STYLE_IMPL_BEGIN(Knob, Widget)
    // Bind
    sColor.bind("color", this);
    sScaleColor.bind("scale.color", this);
    sBalanceColor.bind("balance.color", this);
    sHoleColor.bind("hole.color", this);
    sTipColor.bind("tip.color", this);
    sBalanceTipColor.bind("balance.tip.color", this);
    sMeterColor.bind("meter.color", this);
    sSizeRange.bind("size.range", this);
    sScale.bind("scale.size", this);
    sValue.bind("value", this);
    sStep.bind("step", this);
    sBalance.bind("value.balance", this);
    sMeterMin.bind("meter.min", this);
    sMeterMax.bind("meter.max", this);
    sCycling.bind("value.cycling", this);
    sScaleMarks.bind("scale.marks", this);
    sBalanceColorCustom.bind("balance.color.custom", this);
    sFlat.bind("flat", this);
    sScaleActive.bind("scale.active", this);
    sMeterActive.bind("meter.active", this);
    sEditable.bind("editable", this);
    sHoleSize.bind("hole.size", this);
    sGapSize.bind("gap.size", this);
    sScaleBrightness.bind("scale.brightness", this);
    sBalanceTipSize.bind("balance.tip.size", this);
    sBalanceTipColorCustom.bind("balance.tip.color.custom", this);
    sInvertMouseVScroll.bind("mouse.vscroll.invert", this);
    // Configure
    sColor.set("#cccccc");
    sScaleColor.set("#00cc00");
    sBalanceColor.set("#0000cc");
    sHoleColor.set("#000000");
    sMeterColor.set("#88ff0000");
    sTipColor.set("#000000");
    sBalanceTipColor.set("#0000ff");
    sSizeRange.set(8, -1);
    sScale.set(4);
    sValue.set_all(0.5f, 0.0f, 1.0f);
    sStep.set(0.01f);
    sBalance.set(0.5f);
    sMeterMin.set(0.0f);
    sMeterMax.set(0.0f);
    sCycling.set(false);
    sScaleMarks.set(true);
    sBalanceColorCustom.set(false);
    sFlat.set(false);
    sScaleActive.set(true);
    sMeterActive.set(false);
    sEditable.set(true);
    sHoleSize.set(1);
    sGapSize.set(1);
    sScaleBrightness.set(0.75f);
    sBalanceTipSize.set(0);
    sBalanceTipColorCustom.set(false);
    sInvertMouseVScroll.set(false);
LSP_TK_STYLE_IMPL_END
LSP_TK_BUILTIN_STYLE(Knob, "Knob", "root");
</pre>

<p>Here we see that the LSP_TK_STYLE_IMPL_BEGIN macro defines new style class Knob which is derived from Widget style class (and contains it&rsquo;s own properties). Next, we seee the block of code that performs bindinf of properties to the name of
	style attributes in the XML schema file. In other words, the attribute &lt;color&gt; in the XML file will be associated with the sColor property in the source code when parsing the schema file.<br />
	A bit below one another block of code is placed &mdash; the initialization block which configures the default values for properties of this style.<br />
	The style definition is terminated by the LSP_TK_STYLE_IMPL_END macro.<br />
	But it is important not only to declare the style class but also to add a factory which will register this style class in the widget library. The macro LSP_TK_BUILTIN_STYLE is responsible for it. It also defines the name of the style in the XML
	schema file (&quot;Knob&quot;) and the name of the parent style the style is derived from (&quot;root&quot;).</p>
