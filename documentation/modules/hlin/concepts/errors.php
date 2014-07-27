<h3 id="doc-hlin-errors">Exceptions &amp; Errors</h3>

<p>In freia the use <code>SomethingException</code> is discouraged, largely
because of the confusion the notion of <code>Exception</code> has drawn
near it.</p>

<p>An exception in freia is defined as literally a more elegant
<code>die('application logic failed horribly')</code> any other use is
considered purely bad design. To avoid confusion exception classes are never
named Exception but instead Panic. This makes their use more intuitive
as well. Every module/namespace is should create it's own Panic class, ideally
when throwing a Panic there should be no need for a namespace qualifier since
the namespace in question has a Panic class.</p>

<h4>Advanced error handling</h4>

<p>When errors that can or "should" be handled happen, ie. errors that are not
just breaking internal assumtions, then those errors should be handled though
error codes. If you do not have a clear set of error codes already merely use
http codes, with 0 as no error (if you wish to use 200 you can have it as
no error and did something; particularly if you have a function that can
return literally anything). As far as passing the error codes we recomend the
multi-return pattern.</p>

<p>In most cases you just need two codes: success and error, and for most cases
"success" = 0, "error" = anything else (we recomend 500).</p>

<p>Somehow leveraging exceptions may seem "more convenient" but it is actually
an anti-pattern as it leads to lazily handling everything globally, ie. not
handling it, just assuming failure. You should have global handlers, however
you should strive to never have them called, since generically handling an
error is always far more poor implementation then handling it closest to it's
location. Handling though exceptions also has the issue of leading to ambigous
error handling: if X enters an error state, who is responsible for handling it?
the caller might not be, the caller's caller might not be either, we can assume
the global error handler will catch it and handle it but it can very well be
caught anywhere between; there's also no responsibility of knowing it can
happen much less mitigating it. By handling the error as a return you ensure
the error propagation is clear and every step takes responsibility leading to
much more sane and predictable system as a whole.</p>

<h5>implementation pattern I</h5>
<p>Using <code>null</code> as "no result marker."</p>
<pre><code class="php">// no result, success
return [null, 0];

// no result, success
return [$res, 0];

// no result, failure
return [null, 500];

// failure with message
return ["error message", 500];

// no result failure with complex message
return [$errorObject, 500];

// different failure
return [$error, 404];

// guess what failure this is...
return [$error, 401];

// how about this one?
return [$error, 400];
</code></pre>

<pre><code class="php">// get result and error
list($res, $err) = $example->mymethod();

// get only error
list(, $err) = $example->mymethod();</code></pre>

<h5>implementation pattern II</h5>
<p>Slight variation of above, allows for <code>null</code> as valid result.</p>
<pre><code class="php">// success (null here is just a placeholder, any value can be used)
return [null, 0];

// we got a result (it's null), success
return [null, 200];

// etc
</code></pre>

<h5>implementation pattern III</h5>
<p>No return value? You should still use the same pattern and return
<code>null</code>. By doing this you can always add a value and there won't be
any change required to existing code since the pattern will just naturally flow
into pattern I and II.</p>

<pre><code class="php">// success
return [null, 0];
// failure
return [$error, 500];</code></pre>
