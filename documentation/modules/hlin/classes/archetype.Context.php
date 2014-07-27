<p>A context is an archetype that's used to encapsulate system classes, such as
a <a href="#hlin-archetype-Filesystem">Filesystem</a>,
<a href="#hlin-archetype-Configs">Configs</a> handlers,
<a href="#hlin-archetype-Web">Web</a> handlers, etc. To facilitate access
the traits for the archetype used public attributes. The archetype doesn't
contain much outside of setters and getters to system classes.</p>

<p>The class also serves to maintain paths, versions and other
misc functionality.</p>

<p>You can easily create classes that accept a context via the
<a href="#hlin-attribute-Contextual">Contextual</a> attribute.</p>

<pre><code class="php">$context->confs // => \hlin\archetype\Configs
$context->cli // => \hlin\archetype\CLI
$context->fs // => \hlin\archetype\Filesystem
$context->web // => \hlin\archetype\Web
$context->logger // => \hlin\archetype\Logger
// etc
</code></pre>
<pre><code class="php">$context->cli_is($cli)
$context->fs_is($fs)
$context->web_is($web)
$context->logger_is($logger)</code></pre>
<pre><code class="php">$context->addpath('example', '/example/path');
$context->path('example'); // => /example/path</code></pre>
