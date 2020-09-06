<?php
session_start();
$start = microtime(true);
$x = $_POST["Xbtn"];
$x = (float) preg_replace("/,/", ".", $x);
$y= $_POST["Ybtn"];
$y = (float) preg_replace("/,/", ".", $y);
$r = (float) $_POST["R"];
$time = date("H:i:s");
function checkCoordinates($x, $y, $r){
    if($x * $x + $y*$y <= pow($r/2,2) && $x>=0 && $y>=0){
         return true;
    }
    if($x <= 0 && $y <= 0 && $x >= -$r && $y >= -$r/2 ){
        return true;
    }
    if ($x <= 0 && $y >= 0 && $y - $x <= $r/2){
        return true;
    }
    return false;
}
$html = file_get_contents('index.html');
$end = microtime(true) - $start;
if(checkCoordinates($x,$y,$r)){
     echo $html ;
     echo "<table id='out' align='center' border='1'>";
     echo "<tbody><tr><td>$x</td>";
     echo "<td>$y</td>";
     echo "<td>$r</td>
<td>$time</td><td>$end</td></tr></tbody>";
     echo "</table>";
}else{
    echo "rot ebal";
}

