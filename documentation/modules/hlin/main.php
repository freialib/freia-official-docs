<?php start_toc() ?>

	<div class="toc-Title"><a href="#hlin">hlin Module</a></div>
	<ol>
		<li><a class="toc-Entry" href="#doc-hlin-interfaces">Interfaces</a></li>
		<li><a class="toc-Entry" href="#doc-hlin-contexts">Using Contexts</a></li>
		<li><a class="toc-Entry" href="#doc-hlin-errors">Exceptions &amp; Errors</a></li>
		<li><a class="toc-Entry" href="#doc-hlin-protocols">Authorizer &amp; Protocols</a></li>
		<li>
			<a class="toc-Entry" href="#doc-hlin-console">Using the Console</a>
			<ul>
				<li><a class="toc-Entry" href="#doc-hlin-creating-commands">Creating Commands</a></li>
				<li><a class="toc-Entry" href="#doc-hlin-help-commands">Help Commands</a></li>
				<li><a class="toc-Entry" href="#doc-hlin-honeypot">Honeypot Command</a></li>
			</ul>
		</li>
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
	<p class="toc-Subtitle">archetype (freia)</p>
	<ul>
		<li><a class="toc-Entry" href="#hlin-archetype-Autoloader">Autoloader</a></li>
		<li><a class="toc-Entry" href="#hlin-archetype-Filemap">Filemap</a></li>
	</ul>

	<p class="toc-Subtitle">attribute</p>
	<ul>
		<li><a class="toc-Entry" href="#hlin-attribute-Contextual">Contextual</a></li>
		<li><a class="toc-Entry" href="#hlin-attribute-Configurable">Configurable</a></li>
	</ul>
	<p class="toc-Subtitle">tools (logging)</p>
	<ul>
		<li><a class="toc-Entry" href="#hlin-tools-FileLogger">FileLogger</a></li>
		<li><a class="toc-Entry" href="#hlin-tools-NoopLogger">NoopLogger</a></li>
	</ul>
	<p class="toc-Subtitle">tools (routing)</p>
	<ul>
		<li><a class="toc-Entry" href="#hlin-tools-Request">Request</a></li>
		<li><a class="toc-Entry" href="#hlin-tools-Response">Response</a></li>
	</ul>
	<p class="toc-Subtitle">tools (utils)</p>
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
<?php include __DIR__.'/concepts/protocols.php' ?>
<?php include __DIR__.'/concepts/using_console/main.php' ?>

<?php
	$classes = [
		// context
		'archetype.Context',
		'archetype.Filesystem',
		'archetype.Configs',
		'archetype.CLI',
		'archetype.Web',
		'archetype.Logger',
		// freia
		'archetype.Autoloader',
		'archetype.Filemap',
		// attributes
		'attribute.Contextual',
		'attribute.Configurable',
		// tools (logging)
		'tools.FileLogger',
		'tools.NoopLogger',
		// tools (routing)
		'tools.Request',
		'tools.Response',
		// tools (utils)
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
