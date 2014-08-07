<h3 id="doc-hlin-console">Using the Console</h3>

<p>A simple console helper is provided by default. To create a basic
<code>console</code> script you would write the following code,
minimal example:</p>

<pre><code class="php">#!/usr/bin/env php
&lt;?php namespace your_namespace\main;

	// php settings
	date_default_timezone_set('Europe/London');

	$syspath = realpath(__DIR__);
	$logspath = realpath("$syspath/logs");

	require "$syspath/autoloader.php";
	$autoloader = autoloader($syspath);

	if ($autoloader === null) {
		die('Err: failed to initialize autoloader');
	}

	require "$syspath/context.php";
	$context = context($syspath, $logspath, $autoloader);

	$console = \hlin\Console::instance($context);
	$commands = $context->confs->read('freia/commands');
	exit($console->main($commands));</code></pre>

<p>Invoking from the command line is fairly simple.</p>

<pre><code class="bash">$ cd path/to/console
# simple invokation
$ ./console
# you can also just invoke from outside (we'll assume parent is server/)
$ cd ..
$ server/console</code></pre>

<p>It's important to note that by default the library does not provide any
sophisticated flag parsing; it's a lot more flexible that way and command
parameters tend to be both simpler and easier to implement.</p>

<?php include __DIR__."/creating-commands.php" ?>
<?php include __DIR__."/help-commands.php" ?>
<?php include __DIR__."/honeypot-command.php" ?>
