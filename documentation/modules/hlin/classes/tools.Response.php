<p>A response object is used to delay the response until the very last seconds,
essentially it avoids working directly with, what is many cases, the
<code>Web</code> context. By doing so if any error occurs there is no nasty
errors such as "headers already sent" or similar and the system can gracefully
recover; or at least has a chance to.</p>

<pre><code class="php">$res->responseCode(200);
$res->header('Content-Type: text/plain');
$res->redirect('/login', 303);</code></pre>

<p>The class also helps with encapsulating logic. Instead of injecting your
logic in every control handler you can simply specify the logic on the
response wrapper and have all handlers just pass in input and/or configuration.</p>

<pre><code class="php">$res->logic(function ($input, $conf) { ... });

// ...

$controller = function ($req, $res) {
	$res->conf('example');
	return [ 'message' => 'hello, world' ];
};

// ...

$raw_output = $controller($req, $res);
$res->parse($raw_output);</code></pre>
