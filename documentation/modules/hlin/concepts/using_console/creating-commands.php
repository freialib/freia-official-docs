<h4 id="doc-hlin-creating-commands">Creating Commands</h4>

<p>To create a command you simply need to do two things:</p>

<ul>
	<li>write the class that implements <code>hlin.archetype.Command</code></li>
	<li>write the configuration for the command</li>
</ul>

<p>Writing the class should be fairly straight forward. You can have any name
and place it anywhere but we do recomend ending with the Command suffix if at
all possible.</p>

<pre><code class="php">&lt;?php namespace your_namespace\tools;

class ExampleCommand implements \hlin\archetype\Command {

	use \hlin\CommandTrait;

	/**
	 * @return int
	 */
	function main(array $args = null) {

		// ...

		return 0; # success
	}

} # class</code></pre>

<p>There is no convention for where to place the configuration for commands,
but obviously if you place it somewhere else you'll have to specify it, merge
it, convert it, etc to get to the <code>$commands</code> variable we got to
in the previous section. If you just wish to keep it simple and stupid just
place it under a <code>freia/commands</code> configuration file in ANY module
of your choice; you may create a file if the module doesn't have it.</p>

<h5>verbose &amp; complete command configuration</h5>

<pre><code class="php">&lt;?php return [

	'make' => [
		'topic' => 'fenrir.tools',
		'command' => 'fenrir.MakeCommand',
		'flagparser' => 'hlin.NoopFlagparser',
		'summary' => 'make a class, or just about anything else',
		'desc' =>
			"The make command will try to figure out what you want to make and create it as apropriatly as possible. ".
			"What you pass to it is considered the 'problem' and is what the command is trying to solve. A solution will be presented before executing it.\n\n".
			"If it's a class it will try to place it in the right namespace, under the right directory structure and have it implement the right interfaces.\n\n".
			"You can skip the guessing by providing a domain to the problem using the domain:problem syntax. Please see examples for details. ".
			"Some patterns may always require the domain to work.",
		'examples' => [
			'?' => "Get available domains",
			'example.FooCommand' => "Create class FooCommand (that implements \hlin\archetype\Command) with namespace example; place it in the file /Command/Foo.php located in the class path for the module specific to namespace example",
			'class:example.FooCommand' => 'Same as above only we ensure that the problem example.FooCommand is interpreted as a class'
		],
		'help' =>
			" :invokation ?\n\n".
			"    Get all supported problem domains.\n\n".
			" :invokation [&lt;domain&gt;:]&lt;problem&gt;\n\n".
			"    Solve the given problem. Domain is optional.\n".
			"    If domain is not provided the command will try to guess."
	],

]; # conf</code></pre>

<h5>minimalistic command configuration aka. lazy</h5>

<pre><code class="php">&lt;?php return [

	'make' => [
		'topic' => 'fenrir.tools',
		'command' => 'fenrir.MakeCommand',
		'summary' => 'make a class, or just about anything else',
		'examples' => [
			'?' => "Get available domains",
			'example.FooCommand' => "Create class FooCommand (that implements \hlin\archetype\Command) with namespace example; place it in the file /Command/Foo.php located in the class path for the module specific to namespace example",
			'class:example.FooCommand' => 'Same as above only we ensure that the problem example.FooCommand is interpreted as a class'
		],
	],

]; # conf</code></pre>
