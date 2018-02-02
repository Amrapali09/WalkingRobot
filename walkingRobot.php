<?php


function main($argv) {

    define('NORTH', 0);
    define('EAST', 1);
    define('SOUTH', 2);
    define('WEST', 3);

    unset($argv[0]);
    $x = $argv[1];
    $y = $argv[2];
    $dir = constant($argv[3]);
    $path = str_split($argv[4], 1); //RW2LW4RR
    foreach ($path as $key => $move) {
        if ($move == 'R') {
            $dir = ($dir + 1) % 4;
            $direction = getDirection($dir);
        } elseif ($move == 'L') {
            $dir = (4 + $dir - 1) % 4;
             $direction = getDirection($dir);
        } else {
            $next = $key + 1;
            if ($dir == 0) {
                $y = $y + $path[$next];
            } else if ($dir == 1) {
                $x = $x + $path[$next];
            } else if ($dir == 2) {
                $y = $y - $path[$next];
            } else{ // dir == W
                $x = $x - $path[$next];
            }
            $direction = getDirection($dir);
        }
    }
    
    print_r("X - axis : " .$x);
    echo PHP_EOL;
    print_r("Y - axis : ".$y);
    echo PHP_EOL;
    print_r($direction. " direction");
}

function getDirection($dir){
    switch ($dir){
        case 0 :
            $direction = 'NORTH';
            break;
        case 1:
            $direction = 'EAST';
            break;
        case 2:
            $direction = 'SOUTH';
            break;
        case 3:
            $direction = 'WEST';
            break;
    }
    return $direction;
}
main($argv);
?>
   