<?php start_toc() ?>

	<div class="toc-Title"><a href="#hlin">hlin Module</a></div>
	<ol>
		<li><a class="toc-Entry" href="#doc-hlin-interfaces">Interfaces</a></li>
		<li><a class="toc-Entry" href="#doc-hlin-contexts">Using Contexts</a></li>
		<li><a class="toc-Entry" href="#doc-hlin-errors">Exceptions &amp; Errors</a></li>
	</ol>
	<p class="toc-Subtitle">archetype (context related)</p>
	<ul>
		<li><a class="toc-Entry" href="#hlin-archetype-Context">Context</a></li>
		<li><a class="toc-Entry" href="#hlin-archetype-Filesystem">Filesystem</a></li>
		<li><a class="toc-Entry" href="#hlin-archetype-Configs">Configs</a></li>
		<li><a class="toc-Entry" href="#hlin-archetype-CLI">CLI</a></li>
		<li><a class="toc-Entry" href="#hlin-archetype-Web">Web</a></li>
		<li><a class="toc-Entry" href="#hlin-archetype-Logger">Logger</a></li>
	</ul>
	<p class="toc-Subtitle">attribute</p>
	<ul>
		<li><a class="toc-Entry" href="#hlin-attribute-Contextual">Contextual</a></li>
		<li><a class="toc-Entry" href="#hlin-attribute-Configurable">Configurable</a></li>
	</ul>
	<p class="toc-Subtitle">archetype (freia)</p>
	<ul>
		<li><a class="toc-Entry" href="#hlin-archetype-Autoloader">Autoloader</a></li>
		<li><a class="toc-Entry" href="#hlin-archetype-Filemap">Filemap</a></li>
	</ul>

	<p class="toc-Subtitle">tools</p>
	<ul>
		<li><a class="toc-Entry" href="#hlin-tools-PHP">PHP</a></li>
		<li><a class="toc-Entry" href="#hlin-tools-Arr">Arr</a></li>
		<li><a class="toc-Entry" href="#hlin-tools-Text">Text</a></li>
		<li><a class="toc-Entry" href="#hlin-tools-Time">Time</a></li>
	</ul>

<?php end_toc() ?>

<h2 id="hlin"><code>hlin</code> Module</h2>

<p>The <code>hlin</code> module specialises in portable and completely testable
code; unlike the <a href="#fenrir"><code>fenrir</code> module</a> which
specialises on classes that require deep coupling.</p>

<?php include __DIR__.'/concepts/interfaces.php' ?>
<?php include __DIR__.'/concepts/contexts.php' ?>
<?php include __DIR__.'/concepts/errors.php' ?>

<?php
	$classes = [
		// context
		'archetype.Context',
		'archetype.Filesystem',
		'archetype.Configs',
		'archetype.CLI',
		'archetype.Web',
		'archetype.Logger',
		// attributes
		'attribute.Contextual',
		'attribute.Configurable',
		// freia
		'archetype.Autoloader',
		'archetype.Filemap',
		// tools
		'tools.PHP',
		'tools.Arr',
		'tools.Text',
		'tools.Time',
	];
 ?>

<?php foreach ($classes as $class): ?>
	<h3 id="hlin-<?= str_replace('.', '-', $class) ?>">
		<code>hlin.<?= $class ?></code>
	</h3>
	<?php include __DIR__."/classes/$class.php" ?>
<?php endforeach; ?>
