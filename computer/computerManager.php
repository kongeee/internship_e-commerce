<?php
include_once("../server.php");
include_once("../admin_panel/sessionAdmin.php");


class ComputerManager implements ComputerService{

    public function add($computer){
        
        global $DBconn;

        $name = $computer->getName();
        $cpu = $computer->getCpu();
        $cpu_bench = $computer->getCpuBench();
        $gpu = $computer->getGpu();
        $gpu_bench = $computer->getGpuBench();
        $ram = $computer->getRam();
        $storage = $computer->getStorage();
        $price = $computer->getPrice();
        $description = $computer->getDescription();
        $type = $computer->getType();
        
        //check the computer has not been added before by using its name
        $sql = "SELECT C.name
                FROM computer C
                WHERE C.name = '$name'";
        $result = $DBconn->query($sql);

        if($result->num_rows == 0){ //this computer is added to DB for the first time
            $sql = "INSERT INTO computer (name, cpu, cpu_bench, gpu, gpu_bench, ram, storage, price, type, description)
            VALUES('$name', '$cpu', '$cpu_bench', '$gpu', '$gpu_bench' , '$ram', '$storage', '$price', '$type', '$description')";

            if($DBconn->query($sql) === TRUE){
                return "Added successfully!!";
                header("Refresh: 3; url=../admin_panel/adminHomePage.php");
            }
            
        }
        
        return "Error this computer already exists in DB";
        header("Refresh: 3; url=../admin_panel/adminHomePage.php");
        

        
    }
    public function delete($computer){
        ;
    }

    //CPU EDITLERKEN BENCHMARK PUANINI DEGİSTİRMEYİ UNUTMA  !!!!!!!!!!!!!!!!!!!
    public function edit($computer, $name, $cpu, $gpu, $ram, $storage, $type, $description){
        ;
    }
}


?>