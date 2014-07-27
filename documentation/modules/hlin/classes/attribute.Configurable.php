<p>The attribute helps creating classes that accept configurable objects. The
attribute allows you to create classes that can read configurations but can't
do much else (presumably intentionally as a constraint on the implementation)</p>

<p>The interface/trait provides the <code>confs_are</code> method along
with <code>$confs</code> easily accessible attribute in the class.</p>

<pre><code class="php">&lt;?php namespace yourmodule\system;

use \hlin\attribute\Configurable;

class Example implements Configurable {

	use \hlin\ConfigurableTriat;

	// ...

} # class</code></pre>
