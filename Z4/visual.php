<?php
require_once('../database/connection.php');
$result = mysqli_query($connection, "SELECT * FROM measurements order by id desc") or die ("DB error: $dbname");
$count=1;
foreach($result as $row){
    $x1[$count]=$row['X1'];
    $x2[$count]=$row['X2'];
    $x3[$count]=$row['X3'];
    $x4[$count]=$row['X4'];
    $x5[$count]=$row['X5'];
    $time[$count]=$row['datetime'];
    $count+=1;
    if($count==6){
        break;
    }
    
}
$data = array( 
    array($time[5],$x1[5],$x2[5],$x3[5],$x4[5],$x5[5]),
    array($time[4],$x1[4],$x2[4],$x3[4],$x4[4],$x5[4]),
    array($time[3],$x1[3],$x2[3],$x3[3],$x4[3],$x5[3]),
    array($time[2],$x1[2],$x2[2],$x3[2],$x4[2],$x5[2]),
    array($time[1],$x1[1],$x2[1],$x3[1],$x4[1],$x5[1]),);
    
/*$data = array( 
    array('X1',$x1[1],$x1[2],$x1[3],$x1[4],$x1[5]),
    array('X2',$x2[1],$x2[2],$x2[3],$x2[4],$x2[5]),
    array('X3',$x3[1],$x3[2],$x3[3],$x3[4],$x3[5]),
    array('X4',$x4[1],$x4[2],$x4[3],$x4[4],$x4[5]),
    array('X5',$x5[1],$x5[2],$x5[3],$x5[4],$x5[5]),);
*/
/*while ($row = mysqli_fetch_array ($result)) {
    $id=$row[0];
$X1 = $row[1];
$X2 = $row[2];
$X3 = $row[3];
$X4 = $row[4];
$X5 = $row[5];
$time = $row[6]; */

//foreach($result as $key=> $row){
 //   $data[]=$row;
//$dat=[('X1',$row['X1']),('X2',$row['X2']),('X3',$row['X3']),('X4',$row['X4']),('X5',$row['X5'])];
//}
require_once 'phplot.php';
$plot = new PHPlot();
$plot->SetXTitle('Input Data');
$plot->SetYTitle('Degree Celcius');
/*$data = array( 
    array('X1',$X1,2,5),
    array('X2',$X2,4,7),
    array('X3',$X3,6,3),
    array('X4',$X4,3,5),
    array('X5',$X5,2,6),);*/
//$data = array(array('14:30',0,5), array('14:35',1,2), array('14:40',2,7), array('14:45',3,3), array('14:50',4,1));
$plot->SetDataValues($data);
$plot->SetXTickLabelPos('none');
$plot->SetXTickPos('plotdown');
$plot->SetDataType('text-data');
$plot->SetLegend('X1');
$plot->SetLegend('X2');
$plot->SetLegend('X3');
$plot->SetLegend('X4');
$plot->SetLegend('X5');
$plot->SetTitle('Temperature of building');       // optional title of the graph
$plot->DrawGraph();


mysqli_close($connection);
?>