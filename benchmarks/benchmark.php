<?php
$cpu_array = array();
if (($handle = fopen("../benchmarks/CPU_UserBenchmarks.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        
       array_push($cpu_array, $data[2]." ".$data[3]."|".$data[5]);
     }
    fclose($handle);
 }



 $gpu_array = array();
if (($handle = fopen("../benchmarks/GPU_UserBenchmarks.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        
       array_push($gpu_array, $data[2]." ".$data[3]."|".$data[5]);
     }
    fclose($handle);
 }

?>