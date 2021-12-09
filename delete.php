<?php 
    session_start() ;
    require_once "base.php" ;
    require_once "function.php" ;

    $id = $_GET['id'] ;

    $sql = "SELECT * FROM users WHERE id = $id" ;
    
    
        unlink(fetch($sql)['photo']) ;
    

    if(!contactDelete($id)){        

        linkTo("index.php") ;

    };

