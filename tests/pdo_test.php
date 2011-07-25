<?php

require dirname(__FILE__) . '/before.php';

$stmt = $pdo->prepare('SELECT * FROM test1');
$stmt->execute();
$rows = array();
foreach($stmt->fetchAll() as $row) {
	$row['name'] = strtoupper($row['name']);
	$rows[] = $row;
}

require dirname(__FILE__) . '/after.php';
