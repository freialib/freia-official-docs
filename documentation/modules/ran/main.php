<?php start_toc() ?>
	<div class="toc-Title"><a href="#ran">ran Module</a></div>
	<ol>
		<li><a class="toc-Entry" href="#doc-ran-html-context">HTML Context</a></li>
		<li><a class="toc-Entry" href="#doc-ran-forms">Forms</a></li>
	</ol>
	<p class="toc-Subtitle">tools</p>
	<ul>
		<li><a class="toc-Entry" href="#ran-tools-Temp">Temp</a></li>
		<li><a class="toc-Entry" href="#ran-tools-HH">HH</a></li>
	</ul>
<?php end_toc() ?>

<h2 id="ran"><code>ran</code> Module</h2>

<p>The <code>ran</code> module specialises in theme and view helpers; the
module is seperated primarily to facilitate static analysis.</p>

<?php include __DIR__.'/concepts/html-context.php' ?>
<?php include __DIR__.'/concepts/forms.php' ?>

<?php
	$classes = [
		'tools.Temp',
		'tools.HH',
	];
 ?>

<?php foreach ($classes as $class): ?>
	<h3 id="ran-<?= str_replace('.', '-', $class) ?>">
		<code>ran.<?= $class ?></code>
	</h3>
	<?php include __DIR__."/classes/$class.php" ?>
<?php endforeach; ?>
