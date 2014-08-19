<h3 id="doc-freia-autoloading">Autoloading</h3>

<p><code>fenrir.SymbolLoader</code> is the class you should be looking when
trying to initialized the autoloader. The class <code>fenrir.Autoloader</code>
is intended for use in contexts where the archetype is required. You can not
initialize it with out having <code>fenrir.SymbolLoader</code> already
initialized.</p>

<p>Simple autoloader initialization:</p>

<pre><code class="php">&lt;?php namespace appname\main;

/**
 * @return \hlin\archetype\Autoloader
 */
function autoloader($syspath) {

	// paths where to search for freia modules (relative to $syspath)
	$paths = ['system', 'vendor'];

	// include composer autoloader
	require "$syspath/vendor/autoload.php";

	// initialize
	$autoloader = \freia\SymbolLoader::instance($syspath, $paths);

	// add as main autoloader
	$is_registered = $autoloader->register(true);

	// fulfill archetype contract before returning
	return \freia\Autoloader::wrap($autoloader);
}</code></pre>

<p>We recomend storing the paths configuration in your
<code>composer.json</code>. Building on the above example you can just change
<code>$paths</code> as follows to configure modules via your
<code>composer.json</code> configuration:</p>

<pre><code class="php">&lt;?php namespace appname\main;

	// ...

	$composerjson = "$syspath/composer.json";
	file_exists($composerjson) or die(" Err: missing composer.json\n");
	$env = json_decode(file_get_contents($composerjson), true);
	$paths = $env['autoload']['freia'];

	// ...

</code></pre>

<h4>Class Name Conventions</h4>

<p>Classes written in freia modules follow the following conventions:</p>
<ul>
	<li>given multiple words in a CamelCase classname the last word, and last
	    word only, is converted to a directory and the classname with out the
	    last word in it is used as the file name</li>
	<li>in resolution, if only the first segment of a namespace is provided the
	    class will resolve to the top class with the segment as the main
	    namespace or the first subnamespace in cases of foreign namespaces</li>
	<li>whenever a namespace ends with <code>next\&lt;namespace&gt;</code> the
	    class will resolve to the first class in the namespace after the
	    current module in the stack that has the class in the namespace after
	    <code>next</code></li>
	<li>we recognize php is case insensitive but calling classes from freia
	    modules using the wrong case will result in undefined behavior (will
	    work if it was previously loaded, or on window, fail otherwise due to
	    file mapping)</li>
</ul>

<p>As an optional requirement, which we do not impose, we recomend namespaces
be lowercase letters (using <code>\</code> to seperate words) and not be used
as an extention of class names (eg. <code>appname.Controllers.Home</code> would
be incorect under the recomendation). Please keep all the information within
the class name and use the namespace purely as a "name workspace."</p>

<p>With regard to class names being case sensitive, in part this is a
restriction inherited from compatibility with composer, but that aside in
practice we find it's fairly easy and desirable to keep classes case sensitive.
Code is more consistent and as a bonus file names of classes using camel case
are readable, as opposed to the being a amalgam of lowercase words which would
happen if we had made it case insensitive.</p>

<h5>Examples of the first rule</h5>
<pre><code class="php">// Controller_Home.php
class Controller_Home</code></pre>
<pre><code class="php">// Controller/Home.php
class HomeController</code></pre>
<pre><code class="php">// Command/Example.php
class ExampleCommand</code></pre>
<pre><code class="php">// Trait/Example.php
class ExampleTrait</code></pre>
<pre><code class="php">// Signature/Example.php
interface ExampleSignature</code></pre>
<pre><code class="php">// Database/ReallyLongName.php
class ReallyLongNameDatabase</code></pre>

<h5>Examples of resolution</h5>
<p>We'll assume the following stack of modules and classes. Remember you can
use the command line helpers to diagnose the class resolution if you need it;
in practice it's rarely as complex as the example bellow.</p>
<pre><code class="vdr / no-highlight">module0.module2
	class Example1

module1.system.legacysupport
	class Example1
module1.system.core
	class Example1
	class Example2 extends next\module1\Example1
module1.tools
	class Example1

module2.system
	class Example1

module3.system
	class Example1
	class Example3 extends \module1\system\core\Example1
</code></pre>
<p><small>In the examples bellow <code>A &lt;- B</code> means <code>A</code>
extends <code>B</code></small></p>
<pre><code class="php"># simple resolution (absolute and dynamic)
# --------------------------------------------------------------------------
\module1\system\core\Example1 // => module1.system.core.Example1
\module1\system\Example1 // => module1.system.legacysupport.Example1
\module1\tools\Example1 // => module1.tools.Example1
\module1\Example1 // => module1.system.legacysupport.Example1</code></pre>

<pre><code class="php"># overwriting from foreign namespace
# --------------------------------------------------------------------------
\module2\system\Example1 // => module2.system.Example1
\module2\Example1 // => module0.module2.Example1</code></pre>

<pre><code class="php"># infinite blind extention via the "next" keyword
# --------------------------------------------------------------------------
\module1\Example2 // => module1.system.Example2 &lt;- module1.tools.Example1</code></pre>

<pre><code class="php"># explicit inheritance
# --------------------------------------------------------------------------
\module3\Example3 // => module3.system.Example3 &lt;- module1.system.core.Example1</code></pre>
