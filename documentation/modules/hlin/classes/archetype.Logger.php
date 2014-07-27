<p>The archetype is used for logging related functions. You'll generally almost
always use it via a <code>Context</code> object. See
<a href="#hlin-attribute-Contextual">Contextual</a> archetype for help
on using contexts.</p>

<pre><code class="php">$logger->logexception($exception);
$logger->log($message);
$logger->var_dump($var);</code></pre>
