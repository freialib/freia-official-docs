<p>Provides basic, easily enhanced, functionality for creating a Repository,
ie. a data abstraction layer based on mysql or compatible SQL database.</p>

<p>The trait provides the following public methods:</p>

<ul>
	<li><code>find(array $logic = null) => array(\hlin\archetype\Model)</code></li>
	<li><code>entry($entry_id) => \hlin\archetype\Model</code></li>
	<li><code>store(\hlin\archetype\Model $model) => \hlin\archetype\Model</code></li>
</ul>

<p>All methods expect models and return models. Where model, in the Repository
pattern is meant to be just a wrapper around data with only basic business
logic and validation, no data binding, no persistance layer knowledge.</p>

<p>Here is a very minimalistic Repo class.</p>

<pre><code class="php">&lt;?php namespace example\linker;

/**
 * ...
 */
class TodoRepo implements \hlin\archetype\Repo {

	use \fenrir\MysqlRepoTrait;

	/**
	 * @return array
	 */
	function constants() {
		return [
			'model' => 'example.Todo',
			'table' => 'todos'
		];
	}

	/**
	 * @return static
	 */
	static function instance(\fenrir\MysqlDatabase $db) {
		$i = new static;
		$i->db = $db;
		return $i;
	}

} # class
</code></pre>

<h4><code>find</code> Method</h4>

<p>Find works similar to the mongodb data access api and always returns an
array of models. The models are specified by constraints on the Repo class.</p>

<p>Here are a few self explaintory examples:</p>

<pre><code class="php"># retrieve all entries
$all_entries = $repo->find();

# retrieve 10 entries
$entries = $repo->find([ '%limit' => 10 ]);

# retrieve 10 entries of status "active"
$entries = $repo->find([
	'status' => 'active',
	'%limit' => 10
]);

# retrieve 10 entries, starting after then 5th
$entries = $repo->find([
	'%limit' => 10,
	'%offset' => 5
]);

# all entries, but only _id and title
$entries = $repo->find([
	'%fields' => [ '_id', 'title' ]
]);

# all entries, order by title
$entries = $repo->find([
	'%order_by' => [ 'title' => 'asc' ]
]);

# all entries, some complex constraints
$entries = $repo->find([
	'title' => [ 'like' => '%Cat' ],
	'type1' => [ '&lt;=' => 1,  '&gt;' => -6],
	'type2' => 'active',
	'type3' => null,
	'type4' => [ '!=' => null ],
	'type5' => [ 'between' => ['2014-01-01', '2015-01-01'] ],
	'type6' => [ 'in' => [2, 4, 6, 8] ]
]);
</code></pre>

<h4><code>entry</code> Method</h4>

<p>Retrieves a entry or returns <code>null</code>.</p>

<pre><code class="php"># retrieve an entry
$entryModel = $repo->entry($entry_id);
</code></pre>

<p>Use find to retrieve based on criteria.</p>

<h4><code>store</code> Method</h4>

<p>Persists an entry, returns a new entry corresponding to the persisted one,
since the model provided in might not have full data (commonly missing id).</p>

<pre><code class="php"># persist entry in the repository
$persistedCat = $catRepo->store($catModel);
</code></pre>

<h4>Overwriting</h4>

<p>The class provides a bunch of protected methods that reflect intermediary
steps feel free to use them to hook in functionality such as joining tables.
We won't go over them here due to any use of these method requiring internal
knowledge, but if you need to add JOINs for example you would overwrite the
<code>sqlselect</code> method, if you need to add more constraint options
you would overwrite <code>parseconstraints</code>, etc</p>