<?php function window($doc, $toc) { ?>

<div class="window">

	<div class="window-Body">
		<h1 class="window--logo" id="doc-intro">
			<span class="window--logo-Text">Freia - the PHP library</span>
		</h1>

		<p class="window-NavJump"><a href="#toc">Jump to Table of Contents</a></p>

		<div class="doc">
			<?= $doc ?>
		</div>

	</div>

	<div class="window-Nav" id="toc">
		<div class="window-Navhead">
			Table of Contents
		</div>
		<div class="window-Navbody">
			<div class="keyinfo">
				<span class="keyinfo-Lead">
					<i class="icon-download"></i> <a href="https://github.com/freialib/framework/archive/draft.zip">Get Freia</a> <span class="keyinfo-Version">v1.0.0</span>
				</span>
				<ul>
					<li><i class="icon-hammer"></i> <a href="/license.txt">BSD 2-clause License</a></li>
					<li><i class="icon-github"></i> <a href="https://github.com/freialib">Github Repository</a></li>
					<li><i class="icon-twitter"></i> <a href="https://twitter.com/search?f=realtime&amp;q=%23freialib">Twitter <code>#freialib</code></a></li>
					<li><i class="icon-stackexchange"></i> <a href="http://stackoverflow.com/search?q=%23freialib">Ask the community</a></li>
				</ul>
			</div>
			<div class="toc">
				<?= $toc ?>
			</div>
		</div>
	</div>

</div>

<?php } # end func ?>
