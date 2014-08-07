<h3 id="doc-hlin-protocols">Authorizer &amp; Protocols</h3>

<p>The prefered way to handle security in freia is though an authorizer
object. An authorizer allows you to create a programatic access control system
though the use of <code>Protocol</code> classes. The system is, as mentioned,
purely programatic, so if you want/need a ACLs you'll just have to hook into
it and make a protocol that fits your needs. In most cases you don't have to,
since unless your users need to be able to dynamically change permissions
it's much much simpler to just have a static configuration for the entire
system. It's also, much faster.</p>

<p>The system is primarily designed with the following goals in mind:</p>

<ul>
	<li>extremely fast &mdash; so you can churn out as many checks as you like
	with out negatively influencing the system</li>
	<li>extremely flexible &mdash; need to give access to someone only if he's
	the cousin of one of the employees who are under the project manager that
	submitted a commit at exactly 6am on a sunday, when there was a blue moon
	outside? no problem, we got you covered</li>
	<li>easy to read &mdash; in the interest of keeping your system transparent
	your internal logic should only contain the question of if someone is able,
	not the logic of how that test is performed; we help you do that easily</li>
	<li>no nonsense &mdash; you either were explicity authorizer or the system
	assumes you don't have access; unless you were explicitly blacklisted in
	which case tough luck</li>
</ul>

<p>To get an authorizer object you just need a list of protocols that allow a
an action, a list of protocols that explicitly forbid an action, a list
of aliases for roles in the system to help you organize and avoid repeating
yourself (ie. "an admin is also a member, and therefore has the access rights
a member has, by consequence") the id of the current user, and the role of the
current user.</p>

<h4>minimalist example</h4>

<pre><code class="php">$whitelist = include __DIR__."/whitelist.php";
$blacklist = include __DIR__."/blacklist.php";
$aliaslist = include __DIR__."/aliaslist.php";

// if the current user is logged in
$auth = \hlin\Auth::instance
	(
		$whitelist, $blacklist, $aliaslist,
		$user_id, $role
	);
</code></pre>

<pre><code class="php">// ...

// guest user
$auth = \hlin\Auth::instance($whitelist, $blacklist, $aliaslist);</code></pre>

<h4>creating protocols</h4>

<p>To create protocols simply extend <code>hlin.Protocol</code> or use the
<code>hlin.Check</code> helper.</p>

<p>Here is a very simple example of the lists, note that only the whitelist
is actually implicitly mandatory, so you can just pass empty arrays for the
blacklist and aliaslist.</p>

<h5>whitelist</h5>
<pre><code class="php">&lt;?php namespace hlin; return [

	// you can use the roles as keys
	'admin' => [
		Check::entities([ 'admin_area' ])->unrestricted(),
	],

	// the guest role is specified though a constant Guest
	Auth::Guest => [
		Check::entities([ 'login' ])->unrestricted(),
	],

	// or create tag roles (see aliaslist for usefulness)
	'+members' => [
		Check::entities([ 'access_site' ])->unrestricted(),
	],

]; # conf</code></pre>
<h5>blacklist</h5>
<pre><code class="php">&lt;?php namespace hlin; return [

	// due to this rule guests can't "access_site" regardless of what
	// the whitelist specifies; blacklists are absolute
	Auth::Guest => [
		Check::entities([ 'access_site' ])->unrestricted(),
	],

	// tag roles don't work here; blacklists don't invoke aliases, you must
	// explicitly blacklist a role, inheriting from a role doesn't imply
	// you inherit it's blacklist, only it's whitelisting

]; # conf
</code></pre>
<h5>aliaslist</h5>
<pre><code class="php">&lt;?php namespace hlin; return [

	'member' => [ '+members' ],
	'admin' => [ '+members' ],

]; # conf</code></pre>
