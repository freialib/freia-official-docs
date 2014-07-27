<p>The <code>PHP</code> class contains php language utilities.</p>

<h4><code>PHP::unn</code></h4>

<p>Convert from PHP Namespace Name to Universal Namespace Name.</p>

<pre><code class="php">\hlin\PHP::unn('\hlin\tools\Text'); // => hlin.tools.Text</code></pre>

<p>In general you'll want to use the <code>PHP::unn</code> when displaying
signatures as it's a lot clearer to read.</p>

<h4><code>PHP::pnn</code></h4>

<p>Convert from Universal Namespace Name to PHP Namespace Name.</p>

<pre><code class="php">\hlin\PHP::pnn('hlin.tools.Text'); // => \hlin\tools\Text</code></pre>

<p>It's recomended to use universal names in configuration files. Simply use
this function to convert to PHP namespaces that can be invoked.</p>
