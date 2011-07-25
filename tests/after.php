<?php

echo "\n";
echo "peak_mem: " . round(memory_get_peak_usage() / 1000, 2) . "kb";
echo "\n";
echo "time: " . round(microtime(true) - $start, 5);
echo "\n";
