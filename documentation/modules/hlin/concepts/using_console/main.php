<h3 id="doc-hlin-console">Using the Console</h3>

<p>A simple console helper is provided by default. To create a basic
<code>console</code> script you would write the following code,
minimal example:</p>

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
<pre><code class="sh">$ chmod +x console</code></pre>

<p>Invoking from the command line is fairly simple.</p>

<pre><code class="bash">$ ./console</code></pre>

<p>It's important to note that by default the library does not provide any
sophisticated flag parsing; it's a lot more flexible that way and command
parameters tend to be both simpler and easier to implement.</p>

<?php include __DIR__."/creating-commands.php" ?>
<?php include __DIR__."/help-commands.php" ?>
<?php include __DIR__."/honeypot-command.php" ?>
