<h3 id="doc-ran-forms">Forms</h3>

<p>The ran module provides a object based form builder. You will need a HTML
context to easily use them. The class is primarily oriented towards creating
complex static pages, a lot of them. The form helpers allows you to simply
declare the form and control all it's rendering, including hints, errors, and
other goodies from configuration files. You can have multiple configurations
in the same project and you can also customize fields on the spot.</p>

<h4>minimalist example</h4>
<pre><code class="php html">&lt;?= $f = $html->form('/example/action', 'your-configuration-name') ?&gt;
&lt;?= $f->select('Stuff', 'people')->options_array(['A', 'B', 'C']) ?&gt;
&lt;?= $f->text('Given Name', 'given_name') ?&gt;
&lt;button type="submit" &lt;?= $f->mark() &gt;&gt;Send&lt;/button&gt;</code></pre>

<p>The first above forces the form object to render; the form will
automatically close, if you need to support IE8 you'll need to add a polyfill
for the <code>form</code> attributes.</p>
