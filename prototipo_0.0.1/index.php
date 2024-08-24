<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index</title>
</head>
<body>
	<?php require_once('links.php'); ?>
	<pre><?php var_dump($_SESSION)?></pre>
</body>
</html>