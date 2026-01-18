<?php

namespace App\Models;

class Role
{
    private $id;
    private $name;

    public function __construct($id,$name){
        $this-> id = $id;
        $this->name = $name;
    
    }

    public function getId(): int{
        return $this->id;
        
    } 

    public function getName():string{
       return  $this->name;
    } 

     public function setId($id){
         $this->id = $id;
        
    } 

    public function setName($name){
        $this->name = $name;
    } 
     
}
