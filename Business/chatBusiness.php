<?php

ini_set('max_execution_time', 0);
require(dirname(__FILE__).'/../Data/chatData.php');

Class chatBusiness{
    //variables
    private $chatData;

    //constructor
    function __construct() {
        $this->chatData = new chatData();
    }//end constructor        
                   	
    //Método para insertar el msj en la BD
    function insertMsjDB($message) {
        $list = $this->chatData->insertMsjDB($message);
        return $list;
    }//end insertMsjDB
   
    //Método para establecer conexión con la BD
    function connectionSQL() {
        $list = $this->chatData->connectionSQL();
        echo $list;
    }//end connectionSQL
    
    //Método para mostra todos los msj de la BD
    function selectAllMsjsDB() {
        $list = $this->chatData->selectAllMsjsDB();
        return $list;
    }//end selectAllMsjsDB
   
    
}//end class

$chatBusiness = new chatBusiness();

if(empty($_REQUEST)){
	
    $chatBusiness->connectionSQL();
    
}else if($_REQUEST['action'] == 'send'){
    $message = $_REQUEST['message'];
    
    $chatBusiness->insertMsjDB($message);

}else if($_REQUEST['action'] == 'data'){
    
    $chatBusiness->selectAllMsjsDB();

}
