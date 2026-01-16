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
    
     public function setId(){
           $this->id = $id;
    }

     public function setEmail(){
       $this->email = $email;
    }

     public function setPassword(){
        $this->password = $password;
    }
     public function setRole(){
       $this->role = $role;
    }
     
    
}
