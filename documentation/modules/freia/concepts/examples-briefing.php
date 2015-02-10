<h3 id="doc-freia-examples-briefing">Examples Briefing</h3>

<p>In the following we'll be using basing code on the structure "complete"
<code>composer.json</code> example in the <a href="#doc-using">Installing</a>
chapter. To avoid confusion we'll quickly go though the basic scaffold you may
need to build a project to easily follow the examples while writing them out,
should you wish to. Feel free to diverge from waht we're about to show.</p>

<pre><code class="sh">$ mkdir PROJECT/
$ <a href="http://unixhelp.ed.ac.uk/CGI/man-cgi?cd">cd</a> PROJECT/
$ <a href="http://unixhelp.ed.ac.uk/CGI/man-cgi?mkdir+1">mkdir</a> -p src public files/cache files/logs
$ edit composer.json</code></pre>

<p><code>edit</code> is <a href="https://atom.io/">whatever</a> <a href="http://www.sublimetext.com/">editor</a> meets <a href="http://www.gnu.org/software/emacs/">your</a> <a href="http://www.openvim.com/">fancy</a>; we recomend using a
universal one.</p>

<pre><code class="json">{
    "name": "Awesome",
    "version": "1.0.0",

    "authors": [ { "name": "Awesome", "role": "Developer" } ],

    "extra": {
        "freia": {
            "cache.dir": "files/cache",
            "load": [ "packagist", "src" ]
        }
    },

    "config": {
        "preferred-install": "dist",
        "vendor-dir": "<a href="https://packagist.org/">packagist</a>",
        "bin-dir": "packagist/.bin",
        "cache-files-ttl": 0
    },

    "require": {
        "php": ">=5.4.10",
        "freialib/bundle": "1.*"
    }
}</code></pre>
<pre><code class="sh">$ <a href="https://getcomposer.org/">composer</a> install
$ edit public/index.php</code></pre>
<pre><code class="php">&lt;?php namespace appname\main;

	error_reporting(-1);

	// public directory
	$wwwpath = realpath(__DIR__);

	// system path; the root of the file system context
	// it's essentially the virtual equivalent of unix /
	// ideally there would never be access outside the syspath
	$syspath = realpath("$wwwpath/..");

	// the context in which "your" source files can can be easiest
	// accessed from; generally this is where your main source files is
	$srcpath = realpath("$syspath/src");

	// instead of declaring the above as special variables we simply
	// include the context of the main file in this context and gain
	// access to them we can always dismiss them via unset($varname)
	include "$srcpath/main.php";</code></pre>
<pre><code class="sh">$ edit src/main.php</code></pre>

<p>You can start a server by opening a console and running,</p>

<pre><code class="sh">$ cd public
$ php -S localhost:3000</code></pre>