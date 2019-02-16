<?php

/*

Encryption
https://www.hackerrank.com/challenges/encryption/problem

*/

$sentence = 'haveaniceday';

function encryption($s) {
    $s = str_replace(' ','',$s); // Remove Spaces
    $len = strlen($s);
    $rows = floor(sqrt($len));
    $cols = ceil(sqrt($len));
    if($rows*$cols < $len){
        $rows += 1;
    }
    $array = str_split($s,$cols);

    for($c=0;$c<$cols;$c++){
        for($r=0;$r<$rows;$r++){
            if(!empty($array[$r][$c])){
                $final.= $array[$r][$c];
            }
        }
        if($c<$cols){
            $final.=" ";
        }
    }

    return $final;
}

echo encryption($sentence);

?>