<?php start_toc() ?>
	<div class="toc-Title"><a href="#doc-using">Installing</a></div>
<?php end_toc(); ?>

<h2 id="doc-using">Installing</h2>

<h3>Existing Codebase</h3>
<p>If you have an existing codebase the way you include freia is hugely
dependent on your circumstances. We recomend reading the
<a href="#freia">freia Module</a> docs. After you understand the
requirements for <a href="#doc-freia-autoloading">autoloading</a> and
<a href="#doc-freia-init">initialization</a> you should have a good idea
what you need to do in your project to integrate freia.</p>

<h3>Fresh Start</h3>

<p>The recomended method to get the freia library is via
<a href="https://getcomposer.org/">composer</a>. We recomend keeping the
<code>composer.lock</code> file and also commiting all the files to your
version control system rather then rely on re-downloading each time. It is much
more reliable to rely on the servers your code base is on then several servers
all over the internet, any of which can go down and break your project.</p>

<p>It is prefered to not rely on composer on the server side, which isn't a
problem even if you want to clone to your server if you simply commit all your
dependencies into your revision control system.</p>

<h4>Minimal version</h4>

<pre><code class="json">{
	"autoload": {
		"freia": {
			"load": [ "system", "linker", "vendor" ]
		}
	},
	"require": {
		"php": ">=5.4.10",
		"freia": "~1.0",
		"hlin/archetype": "~1.0",
		"hlin/attribute": "~1.0",
		"hlin/tools": "~1.0"
	}
}</code></pre>

<h4>All modules</h4>

<pre><code class="json">{
	"autoload": {
		"freia": {
			"load": [ "system", "linker", "vendor" ]
		}
	},
	"require": {
		"php": ">=5.4.10",
		"freia": "~1.0",
		"hlin/archetype": "~1.0",
		"hlin/attribute": "~1.0",
		"hlin/tools": "~1.0",
		"fenrir/system": "~1.0",
		"fenrir/tools": "~1.0"
	}
}</code></pre>

<h4>Basic framework for getting started</h4>

<p>We provide a basic framework if you start from a completely blank
slate to help you get going. We do recomend people make their own project
structure from scratch to get the most benefit by avoiding any unncesary
clutter that a generic structure might impose, but if you're in a hurry or need
a reference point here you go:</p>

<pre><code class="vdr / no-highlight">composer create-project --prefer-dist freialib/framework YOUR_PROJECT/ "~1.0"
cd YOUR_PROJECT/1.0
git init
git add -A
git commit -m "base"</code></pre>

<p>If you don't have the composer command run the following to get it:</p>

<pre><code class="vdr / no-highlight">curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer</code></pre>
