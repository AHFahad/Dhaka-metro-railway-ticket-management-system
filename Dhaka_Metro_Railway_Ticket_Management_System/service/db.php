<?php
    $host="localhost";
    $user="root";
    $pass="";
    $dbname="Railway_ticket_management_system";
   
    function executeSQL($sql){
        global $host, $user, $pass, $dbname, $port;
        
        $conn=mysqli_connect($host, $user, $pass, $dbname);
        
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        
        return $result;
    }
?>