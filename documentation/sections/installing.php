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
	"extra": {
		"freia": {
			"load": [ "vendor" ]
		}
	},

	"require": {
		"freia/autoloader": "~1.0.0",
		"hlin/archetype": "~1.0.0",
		"hlin/attribute": "~1.0.0",
		"hlin/tools": "~1.0.0"
	}
}</code></pre>

<p>Add paths to <code>load</code> (ie. your own paths) to have them recognized
by freia's autoloader.</p>

<h4>Raw Autoloader</h4>

<p>All out coding hermit mode,</p>

<pre><code class="json">{
	"extra": {
		"freia": {
			"load": [ "vendor" ]
		}
	},

	"require": {
		"freia/autoloader": "~1.0.0"
	}
}</code></pre>

<h4>Don't care for filtering though modules?</h4>

<p>The bundle module is completely empty and won't get picked up by freia's
autoloader, it just requires all the official modules in the freia library.</p>


<p>For a list of bundled in modules please refer to the
<a href="https://github.com/freialib/freialib-bundle/blob/master/composer.json">freialib-bundle/composer.json</a></p>

<pre><code class="json">{
	"extra": {
		"freia": {
			"load": [ "vendor" ]
		}
	},

	"require": {
		"freialib/bundle": "~1.0.0"
	}
}</code></pre>

<p>As before add paths to <code>load</code> (ie. your own paths) to have them
recognized by freia's autoloader.</p>

<h4>A more complete composer.json for completeness</h4>

<p>Just in case you want to customize rather then build up
your <code>composer.json</code>.</p>

<pre><code class="json">{
	"name": "Awesome",
	"version": "1.0.0",

	"authors": [
		{
			"name": "Awesome",
			"role": "Developer"
		}
	],

	"extra": {
		"freia": {
			"load": [
				"src/server/system",
				"src/server/theme",
				"packagist"
			]
		}
	},

	"config": {
		"preferred-install": "dist",
		"vendor-dir": "packagist",
		"bin-dir": "packagist/.bin",
		"cache-files-ttl": 0
	},

	"require": {
		"php": ">=5.4.10",
		"freialib/bundle": "1.*"
	}
}</code></pre>

<p><small>The above is used as-is in the example application. See next section for
more details.</small></p>

<h4>Basic framework for getting started</h4>

<p>We provide a basic framework if you start from a completely blank
slate to help you get going. We do recomend people make their own project
structure from scratch to get the most benefit by avoiding any unncesary
clutter that a generic structure might impose, but if you're in a hurry or need
a reference point here you go:</p>

<pre><code class="vdr / no-highlight">git clone --depth=1 https://github.com/freialib/framework YOUR_PROJECT/
cd YOUR_PROJECT/
rm -rf .git
cd 1.x/
git init
git add -A
git commit -m "1.0"</code></pre>
<p><small>Above <code>1.0</code> and <code>1.x</code> refer to your own project; not freia.</small></p>
<p>If you don't have the <code>git</code> please go to
<a href="http://git-scm.com/">http://git-scm.com/</a>, it's a great tool <i class="icon-emo-wink2"></i></p>
