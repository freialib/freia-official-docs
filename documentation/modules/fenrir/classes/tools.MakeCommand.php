<p>Make command helps in creating classes. The command will try to figure out
what you want to make and fill in the gaps, so you dont have to. You can
explicitly teach it patterns though the <code>freia/make/class-patterns</code>
configuration.</p>

<pre><code class="bash"># Get available domains
server/console make ?</code></pre>

<pre><code class="bash"># Create class FooCommand (that implements \hlin\archetype\Command) with
# namespace example; place it in the file /Command/Foo.php located in the
# class path for the module specific to namespace example
server/console make example.FooCommand</code></pre>

<pre><code class="bash"># Same as above only we ensure that the problem example.FooCommand is
# interpreted as a class
server/console make class:example.FooCommand</code></pre>

<p>To create a new pattern add the following to a
<code>freia/make/class-patterns</code> configuration file:</p>

<pre><code class="php">&lt;?php return [

	'Cat' => [
		'aliases' => [
			'catkind.SmartAnimal' => 'Animal'
		],
		'extends' => 'Animal',
		'implements' => [ 'catkind.Overlord' ],
		'use' => [ 'hlin.CommandTrait' ],
		'placeholder' =>
			"\t/**\n\t * @return int\n\t */\n".
			"\tfunction main(array \$args = null) {\n".
			"\t\t// TODO implement\n".
			"\t}"
	],

];</code></pre>

<p>The key there specifies the matching pattern. In our case any class ending
with dog. So it will match when we try to create <code>something.FunnyCat</code>
or <code>example.something.InternetCat</code>, etc.</p>

<p>In the example, aliases are converted to use statements. So in our case we
are using an alias for the extends part, just to make the prezentation nicer.
There is no real difference between the way it's done in the example and simply
using <code>catkind.SmartAnimal</code> for the <code>extends</code> block and
ignoring the <code>aliases</code> block altogheter.</p>

<p>Traits are specified via the <code>use</code> block.</p>

<p>To specify PHP native or global classes you have to use the
<code>.TheClass</code> syntax, eg. <code>.Exception</code>