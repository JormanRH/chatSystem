<?php

/**
 * Description of dbConfig 
 *
 * @author Jorman
 */
class dbConfiguration { 
    
    //constructor
    function _dbConfiguration() {
        
    }//end constructor 

    //Create conection
    function connected(){
        $con = mysqli_connect("localhost","root",'',"chatsystem");
		
        //Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
		  
	mysqli_set_charset($con,"utf8");
        $this->conn = $con;
        return true;
    }//end connected MYSQL    
    
    //get conection
    function getConn() {
        return $this->conn;
    }//end getConn
    
}//end class

