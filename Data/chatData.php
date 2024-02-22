<?php

include_once '../Connection/dbConfiguration.php';

Class chatData{
    
    //constructor
    function __construct() {
        $this->dbConfiguration = new dbConfiguration();
    }//end constructor
    
    //Método para insertar el msj en la BD
    function insertMsjDB($message) {
        $insertMsj = 0;
        session_start();
        $user =  $_SESSION['username'];
        if ($this->dbConfiguration->connected()) {
            //echo "INSERT INTO message values(0, '', '".$message."', now())";exit();
            $insertMsj = mysqli_query($this->dbConfiguration->getConn(), "INSERT INTO message values(0, '".$user."', '".$message."', now())");
            
        }else{
            echo "No se estableció conexión con la BD";
        }
        echo $insertMsj;
    }//end insertMsjDB
    
    //Método para mostra todos los msj de la BD
    function selectAllMsjsDB() {
        $chat = '';
        if ($this->dbConfiguration->connected()) {
            $selectMsjs = mysqli_query($this->dbConfiguration->getConn(), "Select * from message");
            if($selectMsjs->num_rows > 0){
                while($row = mysqli_fetch_array($selectMsjs)){
                    //$chat .= $row['dataMessage'] . "<br>";
                    $chat .= '<div class="single-message"> '
                            . '<strong>' . $row['userMessage'].': </strong>'   . $row['dataMessage'] 
                            . '<span>' . date('h:i a', strtotime($row['dateMessage'])). '<span>'//'d-m-Y h:i a'
                            . '</div>';
                }//end while
            }//end if exists data
        }else{
            echo "No se estableció conexión con la BD";
        }
        echo $chat;
    }//end selectAllMsjsDB
    
    
    //Método para establecer conexión con la BD
    function connectionSQL() {
        if ($this->dbConfiguration->connected()) {
            echo "Conexión establecida correctamente con el servidor MYSQL";
            exit();
        } else {
            echo "Falló conexión con el servidor MYSQL";
            exit();
        }     
    }//end connectionSQL
}//end class