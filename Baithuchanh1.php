<?php
function generateFibonacci($n) {
    $fib = [];

    if ($n >= 1) $fib[] = 0;
    if ($n >= 2) $fib[] = 1;

    for ($i = 2; $i < $n; $i++) {
        $fib[] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib;
}

// Hiển thị 10 số Fibonacci đầu tiên
$n = 10;
$fibonacci = generateFibonacci($n);

echo "Dãy Fibonacci gồm $n phần tử:<br>";
echo implode(" ", $fibonacci);
?>