<?php

class User
{
        public int $id;
        public string $email;
        public string $password;
        public string $role;

    public function __construct($id,$email,$password,$role){
        $this->id = $id;
        $this->email = $email;
        $this-> password = $password;
        $this-> role = $role;

    }

    public function getId(){
        return $this->id ;
    }

     public function getEmail(){
        return $this->email ;
    }

     public function getPassword(){
        return $this->password ;
    }

     public function getRole(){
        return $this->role ;
    }
    
     public function setId($id){
           $this->id = $id;
    }

     public function setEmail($email){
       $this->email = $email;
    }

     public function setPassword($password){
        $this->password = $password;
    }
     public function setRole($role){
       $this->role = $role;
    }
     
    
}
