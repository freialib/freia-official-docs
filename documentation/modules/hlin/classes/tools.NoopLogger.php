<p>As the name implies a logger that does nothing. Generally invoked by normal
loggers that "do something" when they fail catestrophically due to permission
errors or otherwise, by returning a <code>NoopLogger</code> they ensure the
system itself doesn't have to enter an error state due to logging failing.</p>

<pre><code class="php">$do_nothing_logger = \hlin\NoopLogger::instance();</code></pre>
