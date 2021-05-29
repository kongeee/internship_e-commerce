<?php

class Computer{
    private $id;
    private $name;
    private $cpu;
    private $cpu_bench;
    private $gpu;
    private $gpu_bench;
    private $ram;
    private $storage;
    private $price;
    private $discount;
    private $rate;
    private $description;
    private $type;

    

    

    //Getters
    function getID(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
    function getCpu(){
        return $this->cpu;
    }
    function getCpuBench(){
        return $this->cpu_bench;
    }
    function getGpu(){
        return $this->gpu;
    }
    function getGpuBench(){
        return $this->gpu_bench;
    }
    function getRam(){
        return $this->ram;
    }
    function getStorage(){
        return $this->storage;
    }
    function getPrice(){
        return $this->price;
    }
    function getDiscount(){
        return $this->discount;
    }

    function getPriceAfterDiscount(){
        return $this->price - (($this->price / $this->discount) * 100);//calculate price after discount
    }

    function getRate(){
        return $this->rate;
    }
    function getDescription(){
        return $this->description;
    }
    function getType(){
        return $this->type;
    }


    //Setters
    function setID($id){
        $this->id = $id;
    }
    function setName($name){
        $this->name = $name;
    }
    function setCpu($cpu){
        $this->cpu = $cpu;
    }
    function setCpuBench($cpu_bench){
        $this->cpu_bench = $cpu_bench;
    }
    function setGpu($gpu){
        $this->gpu = $gpu;
    }
    function setGpuBench($gpu_bench){
        $this->gpu_bench = $gpu_bench;
    }
    function setRam($ram){
        $this->ram = $ram;
    }
    function setStorage($storage){
        $this->storage = $storage;
    }
    function setPrice($price){
        $this->price = $price;
    }
    function setDiscount($discount){
        $this->discount = $discount;
    }
    function setRate($rate){
        $this->rate = $rate;
    }
    function setDescription($description){
        $this->description = $description;
    }
    function setType($type){
        $this->type = $type;
    }


}

?>