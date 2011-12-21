<?php
include 'header.php';
 
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $pdo->query('SELECT * FROM user u');

foreach ($query as $user) {
	echo sprintf('<li><a href="test.php?id=%d">%s</a></li>', $user['id'], $user['username']);
}

include 'footer.php';