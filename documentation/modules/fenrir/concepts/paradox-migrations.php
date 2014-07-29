<h3 id="doc-fenrir-pdx">Paradox Migrations</h3>

<p>Paradox is a migration systems that is designed to sync your database to
your source. It's customizable, so you can tailor it to any kind of migrations
with a little bit of work. By default it comes ready configured for sql/mysql
and compatible databases migrations.</p>

<p>The system is module-aware which is to say you can have per-module
migrations, with inter module dependencies and it will handle them properly, or
notify you if you created an impossible scenario.</p>

<p>You can access the system from anywhere but in general you'll want to access
it from the command line, all commands are fairly self explainatory, and by
default will do a dry-run until you add the <code>!</code> flag.</p>

<pre><code class="unix"># View databases known to system
$ server/console pdx list

# Show history of the demo.mysql database
$ server/console pdx log demo.mysql

# Dry-run for setup of demo.mysql for the first time
$ server/console pdx init demo.mysql

# Setup demo.mysql for the first time
$ server/console pdx init demo.mysql !

# Dry-run for deletion of demo.mysql
$ server/console pdx rm demo.mysql

# Delete demo.mysql as it's know by history
$ server/console pdx rm demo.mysql !

# Hard delete demo.mysql
$ server/console pdx rm demo.mysql --hard !

# Dry-run for syncing the demo.mysql database
$ server/console pdx sync demo.mysql

# Sync demo.mysql database
$ server/console pdx sync demo.mysql !</code></pre>

<p>Migrations are done though configuration files, most steps allow for both
arrays (ie. configuration) as well as callbacks for if you need to perform more
special handling.</p>

<h4>freia/paradox</h4>
<p>By default, and in particular if you're using the <code>pdx</code> console
command, you place the configuration of your migration in
<code>freia/paradox</code> (which you can create in any module), the first
key specifies the "migrations module" (choose anything; we recomend grouping
into one module as much as possible, easier to keep in sync), the second key
specifies the version of the migration, and the value specifies the
configuration that holds the migration logic.</p>
<pre><code class="php">&lt;?php return array
	(
		'demo-main' => array
			(
				'1.0.0' => 'timeline/demo/install',
			)

	); # conf
</code></pre>

<h4>timeline/demo/install</h4>
<p>Migrations have a lot of steps, you can customize, in general most
migrations only use one or two (since you're usually either only creating, only
updating, or only modifying structure, not everything at once).</p>
<pre><code class="php">&lt;?php return array
	(
		'description'
			=> 'Install for basic demo tables.',

		'configure' => array
			(
				'tables' => array
					(
						'forums',
						'threads',
						'posts'
					)
			),

		'create:tables' => array
			(
				'forums' =>
					'
						_id   [primaryKey],
						title [title],

						PRIMARY KEY (_id)
					',
				'threads' =>
					'
						_id   [primaryKey],
						title [title],

						PRIMARY KEY (_id)
					',
				'posts' =>
					'
						_id   [primaryKey],
						body  [block],

						PRIMARY KEY (_id)
					',
			),

	); # config</code></pre>

<p>Here's another migration:</p>

<pre><code class="php">&lt;?php return array
	(
		'description'
			=> 'Add forum and thread column.',

		'modify:tables' => array
			(
				'threads' =>
					'
						ADD COLUMN `forum` [foreignKey] AFTER `_id`
					',
				'posts' =>
					'
						ADD COLUMN `thread` [foreignKey] AFTER `_id`
					',
			),

	); # config</code></pre>

<h4>interdependence</h4>
<p>Need a migration that's dependent on some other modules? Specify the value
for the version as an array, with the 2nd component in the array an array of
modules and version they need to be at before this module can reach the
version specified by the migration.</p>

<pre><code class="php">&lt;?php return array
	(
		'demo-main' => array
			(
				'1.0.0' => 'timeline/demo/install',
				'1.1.0' =>
					[
						'timeline/demo/1.1.0', [
							'demo-access' => '1.0.0',
							'some-other-module' => '2.1.4'
						]
					]
			)

	); # conf
</code></pre>
