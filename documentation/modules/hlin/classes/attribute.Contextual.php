<p>The attribute allows you to easily create classes that can accept
a context. Here is an example:</p>

<pre><code class="php">&lt;?php namespace your\module;

use \hlin\attribute\Contextual;

class Example implements Contextual {

	use \hlin\ContextualTrait;

	/**
	 * @return static
	 */
	static function instance(\hlin\archetype\Context $context) {
		$i = new static;
		$i->context_is($context);
		return $i;
	}

} # class</code></pre>
