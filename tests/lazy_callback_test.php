<?php

require dirname(__FILE__) . '/../library/LazyCallbackOuterIterator.php';

$it = new ArrayIterator(array('miKE', 'dAVe' ,'BOB', 'bILL', 'niAmh'));
$lazyIt = new LazyCallbackOuterIterator($it);
$lazyIt->applyEach(function($tmp) {
	echo "lazy1\n";
	return strtolower($tmp);
});

$lazyIt->applyEach(function($tmp) {
	echo "lazy2\n";
	return ucfirst($tmp);
});

foreach ($lazyIt as $k => $v) {
	echo "$k => $v\n";
}

echo json_encode($lazyIt);
