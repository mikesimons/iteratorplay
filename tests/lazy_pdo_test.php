<?php

require dirname(__FILE__) . '/before.php';
require dirname(__FILE__) . '/../library/LazyPdoStatementIterator.php';
require dirname(__FILE__) . '/../library/LazyCallbackOuterIterator.php';


$stmt = $pdo->prepare('SELECT * FROM test1');

$it = new LazyPdoStatementIterator($stmt);
$oit = new LazyCallbackOuterIterator($it);

$oit->applyEach(function($row) {
	$row['name'] = strtoupper($row['name']);
	return $row;
});

$rows = array();
foreach($oit as $row) {
	$rows[] = $row;
}

require dirname(__FILE__) . '/after.php';
