<?php
include_once("../server.php");



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
        $discount = $computer->getDiscount();
        $description = $computer->getDescription();
        $type = $computer->getType();
        
        $result = $this->nameCheck($computer->getName());

        if($result){ //this computer is added to DB for the first time
            $sql = "INSERT INTO computer (name, cpu, cpu_bench, gpu, gpu_bench, ram, storage, price, discount, type, description)
            VALUES('$name', '$cpu', '$cpu_bench', '$gpu', '$gpu_bench' , '$ram', '$storage', '$price', '$discount', '$type', '$description')";

            if($DBconn->query($sql) === TRUE){
                return "Added successfully!!";
                
            }
            
        }
        
        return "Error this computer already exists in DB";
    }



    public function delete($id){
        global $DBconn;

        $sql = "DELETE FROM computer WHERE computer_id='$id'";

        if($DBconn->query($sql) === TRUE){
            return "Delete Successfully";
        }
        return "Delete Error";
    }


    public function connectionWithDBorForm($computer, $row){
        if(!strstr($row['cpu'], '|')){
            $row['cpu'] = $row['cpu']."|".$row['cpu_bench'];
            $row['gpu'] = $row['gpu']."|".$row['gpu_bench'];
        }
        
        $cpu = explode("|",$row['cpu']);
        $gpu = explode("|", $row['gpu']);
        

        if(isset($row['computer_id'])){ //for forms
            $computer->setID($row['computer_id']);
        }
        $computer->setName($row['name']);
        $computer->setCpu($cpu[0]);
        $computer->setCpuBench($cpu[1]);
        $computer->setGpu($gpu[0]);
        $computer->setGpuBench($gpu[1]);
        $computer->setRam($row['ram']);
        $computer->setStorage($row['storage']);
        $computer->setPrice($row['price']);
        $computer->setDiscount($row['discount']);
        $computer->setType($row['type']);
        $computer->setDescription($row['description']);

        return $computer;
        
    }


    //CPU EDITLERKEN BENCHMARK PUANINI DEGİSTİRMEYİ UNUTMA  !!!!!!!!!!!!!!!!!!!
    public function edit($computer, $id, $name, $cpu, $gpu, $ram, $storage, $price, $discount, $type, $description){
        global $DBconn;

        

        
        $cpu = explode("|", $cpu);
        $gpu = explode("|", $gpu);

        $sql = "UPDATE computer SET name='$name', cpu='$cpu[0]', cpu_bench='$cpu[1]', gpu='$gpu[0]', gpu_bench='$gpu[1]', ram='$ram', storage='$storage', price='$price', discount='$discount', type='$type', description='$description' WHERE computer_id='$id'";
        if($DBconn->query($sql) === TRUE){
            return "Edit completed<br>";
        }
        
        return "Edit NOT completed (There may already be a computer with this name)<br>";
        
    }


    public function nameCheck($name){

        global $DBconn;
        //check the computer has not been added before by using its name
        

        $sql = "SELECT C.name
                FROM computer C
                WHERE C.name = '$name'";
        $result = $DBconn->query($sql);

        if($result->num_rows == 0){
            return true;
        }

        return false;

        
    }
}


?>