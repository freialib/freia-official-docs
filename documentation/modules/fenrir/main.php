<?php start_toc() ?>

	<div class="toc-Title"><a href="#fenrir">fenrir Module</a></div>
	<ol>
		<li><a class="toc-Entry" href="#doc-fenrir-pdx">Paradox Migrations</a></li>
		<li><a class="toc-Entry" href="#doc-fenrir-routing">Routing</a></li>
	</ol>
	<p class="toc-Subtitle">system</p>
	<ul>
		<li><a class="toc-Entry" href="#fenrir-system-MysqlDatabase">MysqlDatabase</a></li>
	</ul>
	<p></p>
	<ul>
		<li><a class="toc-Entry" href="#doc-fenrir-MakeCommand">MakeCommand</a></li>
	</ul>

<?php end_toc() ?>

<h2 id="fenrir"><code>fenrir</code> Module</h2>

<p>The <code>fenrir</code> module specilizes in coupled code, either literally
(explicit language such as SQL, explicit dependencies such as PHP or vendor
libraries) or in the abstract sense (explicit technologies, explicit use cases,
non-portable techniques).</p>

<?php include __DIR__."/concepts/paradox-migrations.php" ?>
<?php include __DIR__."/concepts/routing.php" ?>

<?php
	$classes = [
		'system.MysqlDatabase',
		'tools.MakeCommand'
	];
 ?>

<?php foreach ($classes as $class): ?>
	<h3 id="fenrir-<?= str_replace('.', '-', $class) ?>">
		<code>fenrir.<?= $class ?></code> class
	</h3>
	<?php include __DIR__."/classes/$class.php" ?>
<?php endforeach; ?>
