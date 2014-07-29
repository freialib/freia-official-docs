<p>Make command helps in creating classes. The command will try to figure out
what you want to make and fill in the gaps, so you dont have to. You can
explicitly teach it patterns though the <code>freia/make/class-patterns</code>
configuration.</p>

<pre><code class="unix"># Get available domains
server/console make ?</code></pre>

<pre><code class="unix"># Create class FooCommand (that implements \hlin\archetype\Command) with
# namespace example; place it in the file /Command/Foo.php located in the
# class path for the module specific to namespace example
server/console make example.FooCommand</code></pre>

<pre><code class="unix"># Same as above only we ensure that the problem example.FooCommand is
# interpreted as a class
server/console make class:example.FooCommand</code></pre>
