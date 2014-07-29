<h3 id="doc-ran-html-context">HTML Context</h3>

<p>The HTML context is a very simple wrapper for automatically configuring more
complex objects.</p>

<pre><code class="php">$html = \ran\HTML::instance($context->confs);
$form = $html->form('/example/action');</code></pre>
