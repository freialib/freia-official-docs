<h4 id="doc-hlin-help-commands">Help Commands</h4>

<p>Help commands are fairly straight forward. We'll assume
<code>./console</code> is your console script, to get general help you just
invoke:

<pre><code class="bash">$ ./console help
# or just...
$ ./console
# or...
$ ./console --help
</code></pre>

<p>You can filter the commands you see by category; the commands with out
category are refered to as "application commands" and have "application" as
the category.</p>

<pre><code class="bash"># all commands
$ ./console help
# only application commands
$ ./console help application
# only fenrir.tools commands
$ ./console help fenrir.tools</code></pre>

<p>To get help on a command simply use the <code>?</code> command:</p>

<pre><code class="bash">$ ./console ? help
$ ./console ? pdx
$ ./console ? make</code></pre>
