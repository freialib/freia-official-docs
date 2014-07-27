<?php
	$srcpath  = realpath(__DIR__.'/..');
	$docspath = realpath("$srcpath/documentation");
 ?>
<!DOCTYPE html>
<meta charset="UTF-8"/>
<title>freia - the PHP library</title>
<meta rel="description"
      content="Tome of php server magic that you can add to any project"/>

<style type="text/css">
<?php include "$srcpath/staging/web/main.critical.css" ?>
</style>

<body>

<?php include "$docspath/main.php" ?>

<style type="text/css"> @import 'web/main.css'; </style>
<script async src="web/main.js"></script>
