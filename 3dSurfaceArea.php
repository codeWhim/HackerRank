<?php

/*

3D Surface Area
https://www.hackerrank.com/challenges/3d-surface-area/problem

*/

$A = "3 3
1 3 4
2 2 3
1 2 4";

function surfaceArea($A) {
    $rows = explode(PHP_EOL,$A);
    $hw = explode(' ',$rows[0]);
    $h = $hw[0];
    $w = $hw[1];

    $dim1 = 0;
    $dim2 = 0;
    $dim3 = 0;
    
    $array = array();
    for($i=1;$i<sizeof($rows);$i++){
        $val = explode(' ',$rows[$i]);
        $dim1 += max($val);
        if($i==1){
            foreach($val as $k=>$v){
            $array[$k] = array();
            }
        }
        foreach($val as $k=>$v){
            array_push($array[$k],$v);
        }
    }

    foreach($array as $a){
        $dim2 += max($a);
        array_push($hw,max($a));
        $dim3 += max($hw);
    }

    return 2*($dim1+$dim2+$dim3);

}

echo surfaceArea($A);

?>