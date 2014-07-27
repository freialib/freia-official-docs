<?php start_toc() ?>

	<div class="toc-Title"><a href="#freia">freia Module</a></div>
	<ol>
		<li><a class="toc-Entry" href="#doc-freia-autoloading">Autoloading</a></li>
		<li><a class="toc-Entry" href="#doc-freia-init">Initialization</a></li>
		<li><a class="toc-Entry" href="#doc-freia-defining-a-module">Defining a Module</a></li>
	</ol>

<?php end_toc() ?>

<h2 id="freia"><code>freia</code> Module</h2>

<p>The freia module consists of only the main <code>freia</code> namespace. To
allow for working with composer the module is written in a
<a href="http://www.php-fig.org/psr/psr-4/">PSR-4</a> format.</p>

<p>All other modules in the library are defined as
<code>freia-cfs-module</code>s.</p>

<p>The namespace actually only really contains one class
<code>freia.SymbolLoader</code> that's independent, the other utility classes
contained within, outside of <code>freia.Panic</code> which is a conventions
requirement (see: <a href="#doc-freia-errors">exceptions &amp; errors</a>),
actually require the autoloader to be active for the dependencies to resolve
(mainly interface dependencies).</p>

<?php include __DIR__.'/concepts/autoloading.php' ?>
<?php include __DIR__.'/concepts/initialization.php' ?>
<?php include __DIR__.'/concepts/defining-a-module.php' ?>
