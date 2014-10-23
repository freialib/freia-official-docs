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

<pre><code class="vdr / no-highlight">your_module/
	confs/
	src/
	composer.json
</code></pre>

<p>Ocassionally you'll need to have modules that are loaded in a specific order,
or follow certain rules, on such module type are debug modules. Debug modules
are only loaded if in debug mode, otherwise they are ignored. To specify a
debug module specify it in the freia rules section:</p>

<pre><code class="json">{
	"name": "yournamespace/subnamespace",
	"type": "freia-module",
	"extra": {
		"freia": {
			"rules": {
				"identity": [ "debug" ],
			}
		}
	},
}</code></pre>

<p>If you just need to specify a module should precede another module use
the <code>matches-before</code> rule:</p>

<pre><code class="json">{
	"name": "yournamespace/subnamespace",
	"type": "freia-module",
	"extra": {
		"freia": {
			"rules": {
				"matches-before": [
					"hlin.security",
					"hlin.archetype",
					"hlin.attribute",
					"hlin.tools"
				]
			}
		}
	},
}</code></pre>

<p>As in the example you can specify multiple other modules. You may also use
both the <code>debug</code> module <code>identity</code> and the
<code>matches-before</code> rule simultaniously on a single module.</p>