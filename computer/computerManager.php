<?php
include_once("../server.php");




class ComputerManager implements ComputerService{

    public function add($computer){
        
        global $DBconn;

        $name = $computer->getName();
        $stock = $computer->getStock();
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
        
        $namecheck = $this->nameCheck($computer->getName());

        if($namecheck){ //this computer is added to DB for the first time
            $sql = "INSERT INTO computer (name,stock, cpu, cpu_bench, gpu, gpu_bench, ram, storage, price, discount, type, description)
            VALUES('$name', '$stock', '$cpu', '$cpu_bench', '$gpu', '$gpu_bench' , '$ram', '$storage', '$price', '$discount', '$type', '$description')";

            if($DBconn->query($sql) === TRUE){
                header("location:../state/confirm.php");
                
            }
            
        }
        
        header("location:../state/reject.php");
    }



    public function delete($id){
        global $DBconn;
        $this->deleteAllImages($id);
        $sql = "DELETE FROM computer WHERE computer_id='$id'";
        
        
        if($DBconn->query($sql) === TRUE){
            
            header("location:../state/confirm.php");
        }
        else{
            header("location:../state/reject.php");
        }
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
        $computer->setStock($row['stock']);
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
    public function edit($computer, $id, $name, $stock, $cpu, $gpu, $ram, $storage, $price, $discount, $type, $description){
        global $DBconn;

        

        
        $cpu = explode("|", $cpu);
        $gpu = explode("|", $gpu);

        $sql = "UPDATE computer SET name='$name', stock='$stock', cpu='$cpu[0]', cpu_bench='$cpu[1]', gpu='$gpu[0]', gpu_bench='$gpu[1]', ram='$ram', storage='$storage', price='$price', discount='$discount', type='$type', description='$description' WHERE computer_id='$id'";
        if($DBconn->query($sql) === TRUE || $this->nameCheck($name)){
            header("location:../state/confirm.php");
        }
        
       else{
        header("location:../state/reject.php");
       }
        
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

    public function getImages($id){
        global $DBconn;
        $sql2 = "SELECT * FROM image WHERE computer_id='$id'";
        $result2 = $DBconn->query($sql2);
        $paths = array();
        while($row2 = mysqli_fetch_assoc($result2)){
            array_push($paths, $row2['path']);
        }

        return $paths;
        
    }

    public function deleteAllImages($id){

        global $DBconn;

        $sql = "SELECT * FROM image WHERE computer_id='$id'";
        $result = $DBconn->query($sql);
        while($row = mysqli_fetch_assoc($result)){

            $path = $row['path'];
            $img_id = $row['img_id'];
            unlink("..".$path);
            $sql2 = "DELETE FROM image WHERE img_id='$img_id'";
            $DBconn->query($sql2);

        }
        
    }
}


?>