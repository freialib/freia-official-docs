<p>The archetype is used for cli related functions. You'll generally almost
always use it via a <code>Context</code> object. See
<a href="#hlin-attribute-Contextual">Contextual</a> archetype for help
on using contexts.</p>

<pre><code class="php">$cli->passthru($command);
$cli->system($command);
$cli->exec($command);
$cli->printf($message);
$input = $cli->fgets();</code></pre>

<p>There are a few specialized methods to assist in creating console
applications. All fairly explainatory.</p>

<pre><code class="php">$answer = $cli->ask('Continue?', ['Y', 'n']);
// user answers: Y&lt;EnterKey&gt; => 'Y'
// user answers: n&lt;EnterKey&gt; => 'n'
// question will be re-asked until a valid answer is given</code></pre>
<pre><code class="php">// given: php script.php do:something --flag1 abc flag2
$cli->args(); // => [ 'php script.php', 'do:something', ... ]
$cli->syscall(); // => php script.php
$cli->command(); // => do:something
$cli->flags(); // => [ '--flag1', 'abc', 'flag2' ]
</code></pre>
