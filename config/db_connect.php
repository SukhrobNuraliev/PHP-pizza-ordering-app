<?php 

        //connect to database

        $conn = mysqli_connect('localhost', 'sukhrob', 'testing123', 'ninja_pizzas');

        // check connection
        if(!$conn){
            echo 'Connection error : ' . mysqli_connect_error();
        }

?>