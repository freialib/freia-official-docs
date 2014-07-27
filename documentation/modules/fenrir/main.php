<?php start_toc() ?>

	<div class="toc-Title"><a href="#fenrir">fenrir Module</a></div>
	<ol>
		<li>
			<a class="toc-Entry" href="#doc-fenrir-console">Using the Console</a>
			<ul>
				<li><a class="toc-Entry" href="#doc-fenrir-command">Creating Commands</a></li>
				<li><a class="toc-Entry" href="#doc-fenrir-help-commands">Help Commands</a></li>
				<li><a class="toc-Entry" href="#doc-fenrir-honeypot">Honeypot Command</a></li>
				<li><a class="toc-Entry" href="#doc-fenrir-make">Make Command</a></li>
				<li><a class="toc-Entry" href="#doc-fenrir-other-commands">Other Commands</a></li>
			</ul>
		</li>
		<li><a class="toc-Entry" href="#doc-fenrir-pdx">Paradox Migrations</a></li>
		<li><a class="toc-Entry" href="#doc-fenrir-routing">Routing</a></li>
	</ol>
	<p class="toc-Subtitle">system</p>
	<ul>
		<li><a class="toc-Entry" href="#fenrir-system-MysqlDatabase">MysqlDatabase</a></li>
	</ul>
	<p class="toc-Subtitle">tools</p>
	<ul>
		<li><a class="toc-Entry" href="#fenrir-tools-Console">Console</a></li>
		<li><a class="toc-Entry" href="#fenrir-tools-Console">Pdx</a></li>
	</ul>

<?php end_toc() ?>

<h2 id="fenrir"><code>fenrir</code> Module</h2>

<?php include __DIR__."/concepts/using_console/main.php" ?>
<?php include __DIR__."/concepts/paradox-migrations.php" ?>
<?php include __DIR__."/concepts/routing.php" ?>

<?php
	$classes = [
		'system.MysqlDatabase',
		'tools.Console',
		'tools.Pdx',
	];
 ?>

<?php foreach ($classes as $class): ?>
	<h3 id="fenrir-<?= str_replace('.', '-', $class) ?>">
		<code>fenrir.<?= $class ?></code> class
	</h3>
	<?php include __DIR__."/classes/$class.php" ?>
<?php endforeach; ?>
