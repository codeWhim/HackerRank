<?php

define("STDIN","5 4 7
1 2 3 4
7 8 9 10
13 14 15 16
19 20 21 22
25 26 27 28");

define("DOWN",1);
define("UP",2);
define("LEFT",3);
define("RIGHT",4);
define("KEEP",5);

// Complete the matrixRotation function below.
function matrixRotation($matrix, $r) {
    $lenM = sizeof($matrix);
    $lenN = sizeof($matrix[0]);

    $maxM = $lenM-1;
    $maxN = $lenN-1;

    $half_vertically = $lenM / 2;
    $half_horizontally = $lenN / 2;

    $debug = true;

    if($debug){
        echo "
        Supplied Matrix Dimensions: ".$lenM."x".$lenN."
";
        printMatrix($matrix);
    }
    

    $newMatrix = array();
    for($rotate=1;$rotate<=$r;$rotate++){
        for($m=0;$m<$lenM;$m++){

            $upper_half = false;
            $lower_half = false;

            if(($m+1) <= $half_vertically){$upper_half = true;}
            elseif(($m+1) >= $half_vertically){$lower_half = true;}

            for($n=0;$n<$lenN;$n++){

                $left_half = false;
                $right_half = false;
    
                if(($n+1) <= $half_horizontally){$left_half = true;}
                elseif(($n+1) >= $half_horizontally){$right_half = true;}

                $matrixValue = $matrix[$m][$n];

                if($upper_half){
                    $i = $m;
                    $j = $n;
                }elseif($lower_half){
                    $i = $maxM - $m;
                    $j = $maxN - $n;
                }else{
                    // Center Part
                    $i = $m;
                    $j = $n;
                }
                
                if($debug){
                echo "
                    Moving ".($m+1)."x".($n+1)." to ";
                }

                if( $j<=$i ){
                    
                    if($left_half)$move = DOWN;
                    if($lower_half && $right_half)$move = UP;

                }elseif( ($maxN-$j)+1<=$i ){
                    // Move Up
                    if($right_half)$move = UP;
                    if($lower_half && $left_half)$move = DOWN;

                }elseif( $upper_half ){
                    // Move Left
                    $move = LEFT;

                }elseif( $lower_half ){
                    // Move Right
                    $move = RIGHT;

                }else{
                    // Keep Same
                    $move = KEEP;
                }

                switch($move){
                    
                    case DOWN:

                    $newMatrix[$m+1][$n] = $matrixValue;
                    if($debug){
                    echo ($m+1+1)."x".($n+1);
                    echo " [Down]";
                    }
                    break;

                    case UP:
                    
                    $newMatrix[$m-1][$n] = $matrixValue;
                    if($debug){
                    echo ($m-1+1)."x".($n+1);
                    echo " [Up]";
                    }
                    break;

                    case LEFT:

                    $newMatrix[$m][$n-1] = $matrixValue;

                    if($debug){
                    echo ($m+1)."x".($n-1+1);
                    echo " [Left]";
                    }
                    break;

                    case RIGHT:

                    $newMatrix[$m][$n+1] = $matrixValue;

                    if($debug){
                    echo ($m+1)."x".($n+1+1);
                    echo " [Right]";
                    }
                    break;

                    case KEEP:

                    $newMatrix[$m][$n] = $matrixValue;

                    if($debug){
                    echo ($m+1)."x".($n+1);
                    echo " [Keep]";
                    }
                    break;
                }

            }
        }

        $matrix = $newMatrix;

        if($debug){
        echo "
        ------------
        Transferring
        ------------
";
printMatrix($matrix);
echo "\n";
        }
        
        
    }    

    printMatrix($newMatrix);
    return $newMatrix;
}

function printMatrix($newMatrix){
    $lenM = sizeof($newMatrix);
    $lenN = sizeof($newMatrix[0]);

    for($m=0;$m<$lenM;$m++){
        for($n=0;$n<$lenN;$n++){
            if($newMatrix[$m][$n]==""){$newMatrix[$m][$n] = "_";}
            echo $newMatrix[$m][$n];
            if($n<$lenN-1){echo "\t";}
        }
        if($m<$lenM-1){echo "\n";}
    }
}



function matrixRotation2($matrix, $r) {
    $lenM = sizeof($matrix);
    $lenN = sizeof($matrix[0]);

    $debug = true;

    if($debug){
        echo "
        Supplied Matrix Dimensions: ".$lenM."x".$lenN."
";
        printMatrix($matrix);
    }
    

    $newMatrix = array();
    for($rotate=1;$rotate<=$r;$rotate++){
        for($m=0;$m<$lenM;$m++){
            for($n=0;$n<$lenN;$n++){

                $matrixValue = $matrix[$m][$n];
                
                if($debug){
                echo "
                    Moving ".($m+1)."x".($n+1)." to ";
                }

                if( ($lenN-$n) <= ($lenM-$m)){
                    $cannotMoveRight = true;
                }else{
                    $cannotMoveRight = false;
                }

                if( (($m+$n+2) <= $lenM) && ($m >= $n) ){
                    // Move Down
                    $newMatrix[$m+1][$n] = $matrixValue;

                    if($debug){
                    echo ($m+1+1)."x".($n+1);
                    echo " [Down]";
                    }

                }elseif( (($m+$n+2-1) > $lenN) && ($cannotMoveRight)  || ((($lenM-$m) == ($lenN-$n)) && ($n >= $lenN/2) && $cannotMoveRight) ){
                    // Move Up
                    $newMatrix[$m-1][$n] = $matrixValue;

                    if($debug){
                    echo ($m-1+1)."x".($n+1);
                    echo " [Up]";
                    }

                }elseif( ($m < $n) ){
                    // Move Left
                    $newMatrix[$m][$n-1] = $matrixValue;

                    if($debug){
                    echo ($m+1)."x".($n-1+1);
                    echo " [Left]";
                    }

                }else{
                    // Move Right
                    $newMatrix[$m][$n+1] = $matrixValue;

                    if($debug){
                    echo ($m+1)."x".($n+1+1);
                    echo " [Right]";
                    }
                }

            }
        }

        $matrix = $newMatrix;

        if($debug){
        echo "
        ------------
        Transferring
        ------------
";
printMatrix($matrix);
echo "\n";
        }
        
        
    }    

    printMatrix($newMatrix);
    return $newMatrix;
}


$options = explode("
",STDIN);

$mnr = explode(' ', $options[0]);

$m = intval($mnr[0]);

$n = intval($mnr[1]);

$r = intval($mnr[2]);

$matrix == array();

for ($i = 0; $i < $m; $i++) {
    $matrix_temp = explode(' ',$options[$i+1]);
    for($j = 0; $j < $n; $j++){
        $matrix[$i][$j] = $matrix_temp[$j];
    }
}

print("<pre>");
$rotated = (matrixRotation($matrix, $r));
print("</pre>");

?>