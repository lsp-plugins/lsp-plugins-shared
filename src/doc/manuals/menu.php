<div class="container">
	<a href="<?= $DOCROOT ?>index.html"><div class="logo smooth"></div></a>
	<div class="inner-container">
		<a href="<?= $DOCROOT ?>index.html">
			<div class="logo-text"></div>
		</a>

		<div class="container-menu" style="float: right !important;">
			<div class="m-cover"></div>
			<div class="menu">
				<ul class="menu-ul" style="display: table !important;">
					<?php if (isset($MENUITEM)) {?>
						<li class="sel menu-li manuals_class"><?php echo htmlspecialchars($HEADER); ?></li>
						<li class="sel menu-li home_class"><a href="<?= $DOCROOT ?>index.html">Home</a></li>
					<?php } else {?>
						<li class="sel menu-li home_class">Home</li>
					<?php }?>
				</ul>
			</div>
		</div>
	</div>
</div>
