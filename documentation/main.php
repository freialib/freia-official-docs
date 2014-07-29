<?php

	function start_toc() {
		ob_start();
	}

	function end_toc() {
		global $toc;
		$toc .= ob_get_clean();
	}

	function toc() {
		global $toc;
		return $toc;
	}

?>

<?php ob_start() ?>
<?php include "$docspath/sections/introduction.php" ?>
<?php include "$docspath/sections/installing.php" ?>
<?php include "$docspath/sections/license.php" ?>
<?php include "$docspath/sections/foreword.php" ?>
<?php include "$docspath/modules/freia/main.php" ?>
<?php include "$docspath/modules/hlin/main.php" ?>
<?php include "$docspath/modules/fenrir/main.php" ?>
<?php include "$docspath/modules/ran/main.php" ?>
<?php include "$docspath/sections/changes.php" ?>
<?php $doc = ob_get_clean() ?>

<?php require "$docspath/window.php" ?>
<?php window($doc, toc()); ?>
