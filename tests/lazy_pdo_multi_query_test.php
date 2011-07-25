<?php

require dirname(__FILE__) . '/before.php';
require dirname(__FILE__) . '/../library/LazyPdoStatementIterator.php';


$stmt = $pdo->prepare('SELECT * FROM test1');

$it1 = new LazyPdoStatementIterator($stmt);
$it2 = new LazyPdoStatementIterator($stmt);

$it1->next();
$it2->next();

var_dump($it1->current());
var_dump($it2->current());
$it2->next();
var_dump($it2->current());
var_dump($it1->current());

require dirname(__FILE__) . '/after.php';
