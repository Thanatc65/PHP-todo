<?php 
    session_start();
    $conn = mysqli_connect('localhost', 'root' , '' , 'todo');

    if(!$conn){
        echo "Connecting database failed";
    }

?>