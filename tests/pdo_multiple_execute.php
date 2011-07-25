<?php

// Ensuer that a statement can be executed multiple times and results fetched

require dirname(__FILE__) . '/before.php';

$stmt = $pdo->prepare('SELECT * FROM test1');
$stmt->execute();
var_dump($stmt->fetchAll());
$stmt->execute();
var_dump($stmt->fetchAll());
