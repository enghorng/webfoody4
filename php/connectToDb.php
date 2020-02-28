<?php
    class DB{
        public function conDb(){
            // Create connection
            $con = new mysqli('localhost', 'root', '', 'webfoody4');
            // Check connection
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            //support khmer unicode
            $con->query('SET character_set_results=utf8');
            return $con;
        }      
        
    }
    
    

?>