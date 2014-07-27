<p>The archetype is used for accessing filesystem related functions. Almost
all functions have the same signature as the equivalent PHP function with the
same name. You wish to use the Filesystem version to allow for testing which
is useful for overwriting and testing. You'll generally almost always use it
via a <code>Context</code> object.</p>

<pre><code class="php">$fs->file_exists($filename);
$fs->unlink($filename);
$fs->chmod($filename, $mode);
$fs->copy($source, $dest);
$fs->file_get_contents($filename);
$fs->file_put_contents($filename, $data);
$fs->file_append_contents($filename, $data);
$fs->filemtime($filename);
$fs->is_readable($filename);
$fs->mkdir($filename, $mode, $recursive);
$fs->realpath($path);
$fs->scandir($directory);
// etc
</code></pre>

<p>You may use <code>FilesystemMock</code> when writing tests.</p>

<p><small>See <a href="#hlin-attribute-Contextual">Contextual</a> archetype for
help on using contexts.</small></p>
