<p><code>Temp</code> is used for easily creating placeholder content.</p>

<pre><code class="html">&lt;?php namespace ran; ?&gt;

&lt;div class=&quot;person&quot;&gt;
	&lt;div class=&quot;person-Avatar&quot;&gt;
		&lt;img src=&quot;&lt;?= Temp::img(100, 100) ?&gt;&quot;/&gt;
	&lt;/div&gt;
	&lt;div class=&quot;person-Meta&quot;&gt;
		&lt;p&gt;name: &lt;?= Temp::name() ?&gt;&lt;/p&gt;
		&lt;p&gt;signup: &lt;?= date('Y-m-d', Temp::time()) ?&gt;&lt;/p&gt;
		&lt;p&gt;tel: &lt;?= Temp::telephone() ?&gt;&lt;/p&gt;
	&lt;/div&gt;
&lt;/div&gt;</code></pre>

<p>While you can use it like the above example the real magic of Temp is that
when you call (almost all) the methods you get an instance that resolves to a
random version of what you requested. Here is a simple example of
the concept:</p>

<pre><code class="php">$name = \ran\Temp::given_name();
echo $name;
echo $name;
echo $name;
echo $name;
</code></pre>
<p>The above may render to...</p>
<pre><code class="text">Ana
Bob
Eve
Henry</code></pre>
<p>Of course what it renders to is random, your results may vary.</p>

<p>Most methods of <code>Temp</code> are self explainatory: <code>name</code>,
<code>given_name</code>, <code>family_name</code>, <code>word</code>,
<code>words</code>, <code>paragraph</code>, <code>city</code>,
<code>address</code>, <code>ssn</code>, <code>email</code>,
<code>telephone</code>, <code>title</code>, <code>fullurl</code>,
<code>counter</code>.</p>

<p>You can use <code>copies</code> to generate arrays of random things. This
method takes an array of data and creates an array of copies from it. In
additin to that you can pass in a 3rd parameter that specifies which of the
values in your original array are counters and it will increment or randomize
based on what you specify.</p>

<pre><code class="php">// create random number of copies of entry with random number for viewcount
// and random number for comments, and incrementing value for id
$entries = Temp::copies($entry, rand(-20, 10), [
	'viewcount' => [0, 1000],
	'comments' => [0, 1000],
	'id' => 1,
]);</code></pre>
<p>When the count is lower then 0 it's interpreted as 0. The reason for
negative values is so you can specify how often you want to get an
empty state.</p>
