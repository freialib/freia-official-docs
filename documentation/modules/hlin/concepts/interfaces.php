<h3 id="doc-hlin-interfaces">Interfaces</h3>

<p>Interfaces in freia are refered to as "interfaces" only in the writing of
the implementation, in all other cases interfaces fall under one of
three categories:</p>

<ul>

	<li><code>archetypes</code> &mdash; concepts intended to be either re-used
	a lot, or otherwise very useful to standardize to ensure implementations
	that make use of them are easier to conceptualize by conceptualizing the
	sum of its parts rather then the whole. In almost all cases, archetypes are
	located in a specialized namespace, usually
	<code>&lt;module&gt;/archetype</code>. Archtypes ALWAYS provide traits, and
	it MANDATORY to use the main trait given, since it allows for dynamic
	extention. They also <i>sometimes</i> provide <code>Mocks</code>, and
	<i>sometimes</i> provide <code>TestTraits</code>; in other words all the
	little building blocks you would need for speedy implementation.</li>

	<li><code>attributes</code> &mdash; a specialized light weight form of
	archetypes, in general used to denote a class accepts a certain archetype
	or otherwise has some very minor enhancement to functionality, eg.
	<code>Contextual</code>, <code>Configurable</code>, etc. Attributes also
	may provide traits but the traits are not mandatory, unlike archetype
	traits.</li>

	<li><code>signatures</code> &mdash; are purely method signatures, they
	serve only to allow different implementations to avoid extending the
	initial class which is painful most of the time (using adaptors is much
	more reliable and clean). Signatures are generally just a interface with
	the <code>ClassName</code> followed by a <code>Signature</code> suffix,
	eg. <code>ResponseSignature</code>, <code>FlagparserSignature</code>,
	<code>MysqlDatabseSignature</code>, etc. Signatures generally dont have
	traits or the traits are not directly tied to the signatures in name.</li>

</ul>

<p>There are of course some minor "DO NOTs"</p>

<ul>

	<li>DO NOT use relative namespaces (interface namespaces are always
	absolute!), usage of relative namespaces in the context of freia modules
	is considered "undefined behavior"</li>

	<li>DO NOT have namespaces that only hold signatures, you should
	have your signatures next to your implementations, if you think of it
	appropriate to have them in a seperate namespace treat them as attributes
	or archetypes and implement them as such.</li>

</ul>

<p>And of course a few optional usage recomendations:</p>

<ul>
	<li>predeclare all namespaces</li>
	<li>order namespaces and traits as follows: attributes, archetypes, signatures</li>
</ul>

<h4>usage example</h4>

<pre><code class="php">&lt;?php namespace yourmodule\system;

use \yourmodule\archetype\Example;
use \hlin\attribute\Contextual;
use \fenrir\tools\ResponseSignature;

class SimpleExample implements Contextual, Example, ResponseSignature {

	use \hlin\ContextualTrait;
	use \yourmodule\ExampleTrait;

	// ...

} # class</code></pre>

<h4>declaration example</h4>

<pre><code class="php">&lt;?php namespace yourmodule\archetype;

interface Example</code></pre>

<pre><code class="php">&lt;?php namespace yourmodule\attribute;

interface Example</code></pre>

<pre><code class="php">&lt;?php namespace yourmodule\system;

interface ExampleSignature</code></pre>
