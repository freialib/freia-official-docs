<p>A file logger is the most basic type of logger (aside from
<a href="#hlin-tools-NoopLogger">NoopLogger</a> which does nothing). To
instantiate one you only need a
<a href="#hlin-archetype-Filesystem">Filesystem</a> context and logs path.</p>

<pre><code class="php">$logspath = realpath("$syspath/logs");
$fs = \fenrir\Filesystem::instance();
$logger = \hlin\FileLogger::instance($fs, $logspath);</code></pre>

<p>Generally this will happen in your <a href="#doc-freia-init">main context
initialization block</a>.</p>

<p>You can optionally pass a strings array for "beclouding." The strings will
be replaced inside the logs both for bravety and clarity, as well as
security concerns. In general the strings are merely frequently used paths.</p>

<pre><code class="php">$logger = \hlin\FileLogger::instance (
	$fs, $logspath, ['syspath' => $syspath] );</code></pre>


