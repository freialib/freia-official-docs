<p>The <code>Text</code> class contains text manipulation functions. While
specialized it doesn't not contian functions for advanced concepts such as
internationalization, only basic helpers (all static).</p>

<h4><code>Text::reindent</code></h4>

<p>The function has the following signature:</p>

<pre><code class="php">Text::reindent
	(
		$source,
		$indent = '',
		$tabs_to_spaces = 4,
		$ignore_zero_indent = true
	)
</code></pre>

<p><code>$source</code> is your input. <code>$indent</code> is what you want
as an indent after after normalization. <code>$tabs_to_spaces</code> converts
tabs to spaces before processing. <code>$ignore_zero_indent</code> specifies if
lines with no indentation should be ignored when detecting indentation for
normalization.</p>

<pre><code class="php">$res = \hlin\Text::reindent
	(
		'
			aaa
				bbb
					ccc
				ddd
			eee
		',
		' -&gt; '
	);</code></pre>
<pre><code class="no-higlight"> -&gt; aaa
 -&gt; 	bbb
 -&gt; 		ccc
 -&gt; 	ddd
 -&gt; eee
</code></pre>

<p><i>function is primarly meant to be used internally</i></p>
