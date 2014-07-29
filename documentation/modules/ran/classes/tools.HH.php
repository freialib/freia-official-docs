<p><code>HH</code> stands for <code>HTMLHeader</code> and maintains utilities
for programatically managing html header levels. The purpose is to get
perfect header levels.</p>

<pre><code class="php">HH::next(); # => 'h1'
HH::next(); # => 'h2'

HH::raise('h2'); # => 'h3'
HH::raise('h6'); # => 'h6'</code></pre>

<p>You should always store your header units in variables and use them later;
 using the functions directly isn't practical.</p>

<pre><code class="php">$h1 = HH::next();
$h2 = HH::next();
// ...
&lt;?= "&lt;$h2&gt;My Title&lt;/$h2&gt;" ?&gt;
</code></pre>

<p>Note that <code>$h1</code> isn't necesarily <code>'h1'</code> and
<code>$h2</code> isn't necesarily <code>'h2'</code>. If the piece of code in
the example was in a partial view the headers could resolve to <code>h3</code>
and <code>h4</code>.</p>

<p>It is recomended you pass the last header to partials; by convention
<code>$h</code> in the following:</p>

<pre><code class="php">HH::base($h)
$h1 = HH::next();
$h2 = HH::next();
</code></pre>

<p>The following is equivalent to the above.</p>

<pre><code class="php">$h1 = HH::raise($h);
$h2 = HH::raise($h1);</code></pre>

<p>If you ever need to reset to <code>h1</code>, simply call
<code>HH::base(null)</code>, or you can just hard code it by doing
<code>$h1 = 'h1'</code> and move from there.</p>
