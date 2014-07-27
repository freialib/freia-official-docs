<p>The <code>Time</code> class contains date and time manipulation
functions.</p>

<h4><code>Time::timezoneOffset</code></h4>

<p>This helper simply returns the numeric offset of the timezone given; DST will
affect the result.</p>

<pre><code class="php">\hlin\Time::timezoneOffset('America/New_York'); // => -4:00
\hlin\Time::timezoneOffset('Etc/Universal'); // => +0:00
\hlin\Time::timezoneOffset('Europe/London'); // => +1:00</code></pre>

<p><i>function is primarly meant to be used internally</i></p>
