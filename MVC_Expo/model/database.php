<?php
    $dsn='mysql:host=127.0.0.1;dbname=assignment_tracker';
    $username='root';
    $password='bryanpb12';


    try{
        $db=new PDO($dsn,$username,$password);

    }catch(PDOException $e){
        $error="Database Error: ";
        $error.=$e->getMessage();
        include('view/error.php');
        exit();
    }

?>