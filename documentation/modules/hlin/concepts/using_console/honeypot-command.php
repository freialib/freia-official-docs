<h4 id="doc-hlin-honeypot">Honeypot Command</h4>

<p>The <code>HoneypotCommand</code> allows you to generate autocomplete files
IDEs can use to "get the correct idea" of what extends what. This both helps
in providing accurate autocomplete information as well as avoiding annoying
"this class must be declared abstract" false positives.</p>

<pre><code class="unix"># regenerate all honeypots
$ ./console honeypot</code></pre>

<p>Some IDEs (notably netbeans) are slow to process. You may need to both
wait a few seconds and/or open the honeypot files.</p>

<p>If you have improper implementation honeypot generation will throw errors
on the console; please fix those errors; there is no bypassing. Generally
these are 99% of the time: missing method implementation on non-abstract
classes, bad class declarations, etc. You can think of honeypots as a light
mini-linter since they force all your files though the pipe.</p>
