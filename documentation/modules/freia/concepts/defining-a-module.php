<h3 id="doc-freia-defining-a-module">Defining a Module</h3>

<p>A freia module is defined by prividing a namespace (we recomend always
providing a subnamespace as well) and setting the type to
<code>freia-module</code> in the <code>composer.json</code> of the module.</p>

<pre><code class="json">{
	"name": "yournamespace/subnamespace",
	"type": "freia-module"
}</code></pre>

<p>The above is the minimum requirement and will work fine if you maintain
the module only in your version control but if you wish to create a
distributable module you'll need to add a few more fields to the file, please
refer to the <a href="https://getcomposer.org/doc/04-schema.md">composer
schema documentation</a> for all requirements.</p>

<p>There is no mandatory directories in the module structure. Of the directories
freia only requires <code>src</code> and <code>confs</code>; anything else
is considered specialized functionality (this includes tests). Here is a module
example:</p>

<pre><code class="no-highlight">your_module/
	confs/
	src/
	composer.json
</code></pre>
