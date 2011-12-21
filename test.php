<?php
include 'header.php';
 
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $pdo->prepare('SELECT u.username, s.score FROM user u LEFT JOIN score s ON s.id_user = u.id WHERE u.id = ?');
$query->execute(array($_GET['id']));
$result = $query->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);

echo '<ul>';

foreach ($result as $user => $scores) {
	echo '<li>', $user, '<ul>';
	foreach ($scores as $score) {
		echo '<li>', $score['score'], '</li>';
	}
	echo '</ul></li>';
}

include 'footer.php';