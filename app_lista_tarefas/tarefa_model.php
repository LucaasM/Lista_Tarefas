<?php

class Assignment{

    //Atributo
    private $id;
    private $id_status;
    private $assignment; // tarefa
    private $date_register;
    
    // Métodos publicos get/set
    public function __set($attr, $value){
        $this->$attr = $value;
        return $this;
    }
    
    public function __get($attr){
        return $this->$attr;
    }
}

    








?>