<p>The <code>Arr</code> class contains array utilities. The name is shortened
due to limitations in the language ("Array" is reserved). The class contains
only static helpers.</p>

<h4><code>Arr::join</code></h4>

<p><code>Arr::join($glue, array $list, callable $manipulator)</code> is used
as an advanced version of PHP standard <code>implode</code> that allows for
manipulation of the value. The <code>Arr::join</code> also has a convenient
"if <code>false</code> the value from the list is ignored" so it works in both
filtering and joinging at the same time.</p>

<pre><code class="php">$list = [ 'x' => 10, 'y' => 20, 'z' => 30 ];
$res = \hlin\Arr::join(";\n", $list, function ($key, $val) {
	if ($val == 20) return false;
	return "$key -> $val";
});</code></pre>
<pre><code class="php">x -> 10;
z -> 30;</code></pre>

<p>The manipulator signature is always <code>($key, $value)</code> (parameter
names are not important), if you wish to simply "implode on value" please
consider just using <code>implode</code> with <code>array_map</code>, this will
save the <code>Arr</code> class needing to be autoloaded; or the
<code>hlin.tools</code> module as a dependency in general.</p>

<pre><code class="php">$res = implode($glue, array_map(function ($val) {
	// your code
}, $list);</code></pre>

<p>If you simply need to implode booleans (as rare as that is) you can
just use:</p>

<pre><code class="php">$res = implode($glue, array_map(function ($key, $val) {
	// your code
}, array_keys($list), $list));</code></pre>
