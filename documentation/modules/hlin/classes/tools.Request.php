<p>A request object is a wrapper on the elements of a request; which is to
say it isolates the handler that accepts a <code>Request</code> object from
the current real state of, in many cases, what would be the <code>Web</code>
context.</p>

<pre><code class="php">$req->requestUri(); // => '/threads/12'
$req->param('thread') // => '12'
$req->requestMethod(); // => post
$req->input(['json'], 'array'); // => [ 'id' => '1234' ]

// etc</code></pre>
