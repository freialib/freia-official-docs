<h3 id="doc-hlin-contexts">Using Contexts</h3>

<p>To make all classes easy to test, self container, including classes in other
modules not just <code>hlin</code> modules, we employ contexts. What contexts
do is isolate actions that would have consequences via proxy methods.</p>

<p>In freia you'll generally have to deal with the
<a href="#hlin-archetype-Filesystem">Filesystem</a> context,
<a href="#hlin-archetype-CLI">CLI</a> context,
<a href="#hlin-archetype-Web">Web</a> context, and so on. Since dealing with
them individually is such a giant pain, and generally tends to just take too
much implementation time, we recomend you deal with them via the
all-encompasing master <a href="#hlin-archetype-Context">Context</a> class and
<a href="#hlin-attribute-Contextual">Contextual attribute</a>, which provide
you with a single object that contains all the contexts you'll ever need for
most cases.</p>

<p>Classes that use just the master context are also fairly easy to work with,
since the master context object is easy to work with in general.</p>

<pre><code class="php">$console = \fenrir\Console::instance($context);
$commands = $context->confs->read('freia/commands');
return $console->main($commands);</code></pre>

<p>We believe in the value of terse code. Easier to read is easier to maintain.</p>
