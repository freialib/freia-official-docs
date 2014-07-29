<h3 id="doc-fenrir-routing">Routing</h3>

<p>Basic <code>HTTP</code> routing is performed though
<code>HttpDispatcher</code>. The class works on the principle of matching rules,
if a rule at any point matches all subsequent rules won't match.</p>

<h4>Minimalistic example</h4>
<pre><code class="php">$http = \fenrir\HttpDispatcher::instance($context);
$routes = $context->confs->read('freia/routes');

if ($http->matches('/api/.*')) {

	$http->response()->logic(function ($response, $conf) {
		return json_encode($response);
	});

	$http->any($routes['hello'], function ($req, $res) {
		return ['say' => 'Hello'];
	});

	// 404
	if ($http->nomatch()) {
		$context->web->send(json_encode(['error' => 'no such api']), 404);
	}
}
else { // web app

	$http->response()->logic(function ($response, $conf) {
		return render("webapp:$conf", $response);
	});

	// ...

	// 404
	if ($http->nomatch()) {
		$context->web->send(render('public:404'), 404);
	}
}</code></pre>
