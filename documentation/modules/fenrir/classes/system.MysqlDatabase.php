<p>Wrapper around <a href="http://php.net/manual/en/book.pdo.php">PDO</a>,
alters defeaults and enhances system to be more fluent and easier to write by
adding shorters methods, and a whole bunch of helpers (including mass
assignment helpers).</p>

<pre><code class="php">$entry = $db->prepare
	(
		'
			SELECT entry.*
			  FROM `[table]` entry
			 WHERE entry_id = :id
			 LIMIT 1
		',
		$this->constants()
	)
	->num(':id', $id)
	->execute()
	->fetch_entry();
</code></pre>
