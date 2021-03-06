<h3 id="doc-freia-init">Initialization</h3>

<p>Settings up the autoloader allows you to use modules, however in freia most
modules require a context to work with. Things such as logs, file system
functions, cli functions, web functions, paths are all part of the context
passed into classes that require them.</p>

<p>Here is a minimalistic initialization block:</p>

<pre><code class="php">&lt;?php namespace appname\main;

use \hlin\archetype\Autoloader;

/**
 * @return \hlin\archetype\Context
 */
function context($syspath, $logspath, Autoloader $autoloader) {

	// php settings
	date_default_timezone_set('Europe/London');

	// filesystem wrapper
	$fs = \fenrir\Filesystem::instance();

	// logger setup
	$secpaths = ['syspath' => $syspath]; // paths to obscure
	$logger = \hlin\FileLogger::instance($fs, $logspath, $secpaths);

	// configuration reader
	$filemap = \freia\Filemap::instance($autoloader);
	$configs = \freia\Configs::instance($fs, [ $filemap ]);

	// main context
	$context = \fenrir\Context::instance($fs, $logger, $configs);

	// paths
	$context->addpath('syspath', $syspath);
	$context->addpath('logspath', $logspath);
	$context->addpath('cachepath', realpath("$syspath/cache"));

	return $context;
}

// ...

$logspath = "$syspath/files/logs";
$context = context($syspath, $logspath, $autoloader);</code></pre>

<p>99% of modules will require just the above to function. In some cases
you may need to add to the above to satisfy the special needs of specialized
modules; be it extra path constants or just diffrent classes for the
initialization altogheter.</p>

<p>Here are a few "extra" configuration values as an example:</p>

<pre><code class="php">&lt;?php namespace appname\main;

/**
 * @return \hlin\archetype\Context
 */
function context($syspath, $logspath, Autoloader $autoloader) {

	// ...

	// versions
	$pkg = json_decode(file_get_contents("$syspath/composer.json"), true);
	$mainauthor = $pkg['authors'][0]['name'];
	$context->addversion($pkg['name'], $pkg['version'], $mainauthor);
	$context->setmainversion($pkg['name']);
	$context->addversion('PHP', phpversion(), 'The PHP Group');

	// special handlers
	$context->filemap_is($filemap);
	$context->autoloader_is($autoloader);

	return $context;
}
</code></pre>

<h4>Putting it all togheter</h4>

<p>So far we've gone into what code you need for initialization but not really
how you use it. Let's assume the <code>appname.main.context</code> function
defined above is in <code>context.php</code> and the code illustrated
in the Autoloader section is in <code>autoloader.php</code>.</p>

<p><i>Hint: move them there if you're coding along with the docs.</i></p>

<p>We recomend you always use <code>main</code> for the filename of your entry
point, and place your entry point on the root of the project.</p>

<p>Assuming all files mentioned so far are on the root of your project, here's
a minimal example of how your entry point might look for a web app:</p>

<h5>src/main.php</h5>
<pre><code class="php">&lt;?php namespace appname\main;

use \fenrir\MysqlDatabasel;
use \fenrir\HttpDispatcher;

/**
 * ...
 */
function main($syspath, $srcpath, $wwwconf) {

	$logspath = realpath("$syspath/files/logs");

	require "$srcpath/autoloader.php";
	require "$srcpath/context.php";

	// init autoloader
	$autoloader = autoloader($syspath);

	if ($autoloader === null) {
		error_log("Failed loading autoloader.");
		return 500;
	}

	// init main context
	$context = context($syspath, $logspath, $autoloader);

	try {

		// Example Main Logic
		// ------------------

		$dbconf = $context->confs->read('freia/databases');
		$mysql  = MysqlDatabase::instance($dbconf['appname.mysql']);
		$http   = HttpDispatcher::instance($context);

		require "$syspath/routes/main.php"; # => router function
		\appname\routes\router($http, $context, $mysql);

		return 0; # success
	}
	catch (\Exception $exception) {
		$context->logger->logexception($exception);
		return 500;
	}
}
</code></pre>
<h5>public/index.php</h5>
<pre><code class="php">&lt;?php namespace appname\main;

	$wwwpath = realpath(__DIR__);
	$syspath = realpath("$wwwpath/..");
	$srcpath = realpath("$syspath/src");

	// ignore existing files in PHP build-in server
	$uri = $_SERVER['REQUEST_URI'];
	if (strpos($uri, '..') == false) {
		$req = "$wwwpath/$uri";
		if (file_exists($req) &amp;&amp; is_file($req)) {
			return false;
		}
	}

	// private keys, server settings and sensitive information
	$wwwconf = include "SECURE/PATH/TO/wwwconf.php";
	$wwwconf['wwwpath'] = $wwwpath;

	require "$srcpath/main.php";

	// invoke main
	$exitcode = main($syspath, $srcpath, $wwwconf);

	// handle system failure
	if ($exitcode != 0) {
		$errpage = "$wwwpath/$exitcode.html";
		if (file_exists($errpage)) {
			http_response_code($exitcode);
			include $errpage;
		}
	}
</code></pre>

<h5>console</h5>

<p>To setup a specialized entry point it's fairly easy:</p>

<pre><code class="php">#!/usr/bin/env php
&lt;?php namespace appname\main;

	date_default_timezone_set('Europe/London');

	$syspath  = realpath(__DIR__);
	$srcpath  = realpath("$syspath/src");
	$logspath = realpath("$syspath/files/logs");

	require "$srcpath/autoloader.php";
	require "$srcpath/context.php";

	// init autoloader
	$autoloader = autoloader($syspath);
	$autoloader !== null or die(" Err: Missing dependencies.\n");

	// init context
	$context = context($syspath, $logspath, $autoloader);

	// create console
	$console = \hlin\Console::instance($context);

	// invoke main
	$commands = $context->confs->read('freia/commands');
	exit($console->main($commands));

</code></pre>