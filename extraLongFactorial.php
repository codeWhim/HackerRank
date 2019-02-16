<?php

/*

Extra Long Factorials
https://www.hackerrank.com/challenges/extra-long-factorials/problem

*/

// Complete the extraLongFactorials function below.
function extraLongFactorials($n) {
    if($n>1){
        return gmp_mul($n,extraLongFactorials($n-1));
    }
    return 1;
}

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%d\n", $n);

echo gmp_strval(extraLongFactorials($n));

fclose($stdin);

?>