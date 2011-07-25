<?php

$start = microtime(true);

$pdo = new PDO('sqlite::memory:');
$pdo->query('CREATE TABLE IF NOT EXISTS test1 (id integer, name varchar(255))');

for($i = 0; $i < 100000; $i++) {
	$tmp = substr(md5(microtime(true)), 0, 8);
	$pdo->query("INSERT INTO test1 (id, name) VALUES ($i, '$tmp')");
}

