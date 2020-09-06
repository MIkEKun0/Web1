<?php
@session_start();
if (!isset($_SESSION["rows"])) $_SESSION["rows"] = array();
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
$answ = '';
if(checkCoordinates($x,$y,$r)){
    $answ = 'true';
}else{
    $answ = 'false';
}
$end = microtime(true) - $start;
array_push($_SESSION['rows'],"<td>$x</td><td>$y</td><td>$r</td><td>$time</td><td>$end</td><td>$answ</td>");
$html = file_get_contents('index.html');
     echo $html ;
     echo "<table id='out' align='center' border='1'>";
     echo "<thead><tr><td>X</td><td>Y</td><td>R</td><td>Time</td><td>Current time</td><td>Result</td></tr></thead>";
     echo "<tbody>";
     foreach ($_SESSION["rows"] as $row){
         echo "<tr>$row</tr>";
     }
     echo "</tbody></table>";
