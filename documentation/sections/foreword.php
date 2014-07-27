<?php start_toc() ?>
	<div class="toc-Title"><a href="#doc-foreword">Foreword</a></div>
<?php end_toc(); ?>

<h2 id="doc-foreword">Foreword</h2>

<p>This document is the entire freia documentation, the official documention,
and the main and only format of the docs.</p>

<p>We are intentionally avoiding a printable and automatically generated
versions due to the complexity that introduces both to maintaining the docs,
writing the docs, contributing to the docs, the organization of the docs, as
well as the complexity it adds to the code. We don't believe extremly long
blocks of documentation in code to be all that useful to
inline auto-complete.</p>

<p>If you wish to correct or add anything to this document simply go to the
<a href="https://github.com/freialib/freialib.github.io/blob/master/index.html">file
of this document on the site's github repo</a> and press the <code>Edit</code>
button. You will need a <a href="https://github.com/">free Github account</a>.
Github will magically create a copy of the repo and file (fork), and allow you
put your changes into a patch which you can send back to us to integrate (pull
request).</p>

<p>The documentation is organized into topics and modules. Modules have
have concepts and classes organized in sub-namespaces. Sub-namespaces may be
organized into categories when relevant (the category will be in
paranthesis).</p>

<div class="toc">
	<div class="toc-Title"><a href="#">Topic 1</a></div>
	<div class="toc-Title"><a href="#">Topic 2</a></div>
	<div class="toc-Title"><a href="#">namespace Module</a></div>
	<ol>
		<li><a class="toc-Entry" href="#">Concept 1</a></li>
		<li>
			<a class="toc-Entry" href="#">Concept 2</a>
			<ul>
				<li><a class="toc-Entry" href="#">Concept 2.1</a></li>
				<li><a class="toc-Entry" href="#">Concept 2.2</a></li>
				<li><a class="toc-Entry" href="#">Concept 2.3</a></li>
			</ul>
		</li>
		<li><a class="toc-Entry" href="#">Concept 3</a></li>
	</ol>
	<p class="toc-Subtitle">subnamespace</p>
	<ul>
		<li><a class="toc-Entry" href="#">Class 1</a></li>
		<li><a class="toc-Entry" href="#">Class 2</a></li>
	</ul>
	<p class="toc-Subtitle">subnamespace (category)</p>
	<ul>
		<li><a class="toc-Entry" href="#">Class 3</a></li>
		<li><a class="toc-Entry" href="#">Class 4</a></li>
	</ul>
</div>

<p>We try to conver everything, but we do not try to cover everything
systematically. This may seem strange, but we have a lot of details in the way
things are implemented, convering things one by one is actually a lot more
confusing then presenting the concept, ie. the problem space it was designed
to solve.</p>

<p>In this document we use universal namespace notation to refer both classes
and namespaces and combinations there of. As an example
<code>\hlin\archetype\Context</code> is written as
<code>hlin.archetype.Context</code> which is also the format that's used and
recomended for configuration files since it avoids confusing escaping of the
<code>\</code> character.</p>
