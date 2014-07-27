<p>The archetype is used for web related functions. You'll generally almost
always use it via a <code>Context</code> object. See
<a href="#hlin-attribute-Contextual">Contextual</a> archetype for help
on using contexts.</p>

<pre><code class="php">$web->requestMethod();
$web->requestUri();
$web->requestBody();
$web->postData();
$web->header($header, $replace, $http_response_code);
$web->http_response_code();
$web->redirect($url, $type);
$web->send($contents, $status, $headers);</code></pre>
