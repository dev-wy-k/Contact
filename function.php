<?php 

function old($inputName){

    if(isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else{
        return "" ;
    }

}

function con(){

    return mysqli_connect("localhost", "root","", "forms") ;

}

function runQuery($sql){

    return mysqli_query(con(), $sql) ;

}


function linkTo($l){

    echo "<script>location.href = '$l' </script>" ;

};

function textFilter($text){

    $text = trim($text) ;
    $text = htmlentities($text, ENT_QUOTES) ;
    $text = stripcslashes($text);

    return $text ;

};

function fetch($sql){

    $query = mysqli_query(con(), $sql) ;
    $rows =  mysqli_fetch_assoc($query) ;
    return $rows ;

};

function fetchAll($sql){

    $query = mysqli_query(con(), $sql) ;
    $rows = [] ;

    while($row = mysqli_fetch_assoc($query)){

        array_push($rows, $row) ;

    };

    return $rows ;
};


function showData(){

    $sql = "SELECT * FROM users" ;
    return fetchAll($sql) ;    

}


function users($id){

    $sql = "SELECT * FROM users WHERE id = $id" ;

    return fetch($sql) ;

};



function setError($inputName, $message){

    $_SESSION['error'][$inputName] = $message ;

}


function contactDelete($id){    

    $sql = "DELETE FROM users WHERE id = $id" ;
    runQuery($sql) ;

}


function getError($inputName){

    if(isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "" ;
    }

}


function clearError(){

    $_SESSION['error'] = [] ;

}




function contactSave(){

    $errorStatus = 0 ;
    $name = "" ;
    $email = "" ;
    $phone = "" ;

    if(empty($_POST['name'])){
        setError('name', 'Name is Required');
        $errorStatus = 1 ;
    }else{
        if(strlen($_POST['name']) < 3 ){
            setError('name', 'Name is too Short');
            $errorStatus = 1 ;
        }else{
            if(strlen($_POST['name']) > 20){
                setError('name', 'Name is too Long');
                $errorStatus = 1 ;
            }else{
                if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) { 
                    setError('name', 'Only letters and white space allowed') ;
                    $errorStatus = 1 ;
                }else{
                    $name = textFilter($_POST['name']) ;                   
                    
                }
            }
        }
    }

    if(empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus=1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email Format Incorrect");
            $errorStatus=1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }
    

    if(empty($_POST['phone'])){
        setError("phone","Phone Number is required");
        $errorStatus=1;
    }else{
        if (!preg_match("/^[0-9-' ]*$/",$_POST['phone'])) {  
            setError('phone', 'Phone Format Incorrect') ;
            $errorStatus = 1 ;
        }else{
            $phone = $_POST['phone'] ;
        }
    }

    if(isset($_FILES['upload']['name'])){
        $fileName = $_FILES['upload']['name'] ;
        $tempFile = $_FILES['upload']['tmp_name'] ;
        $supportFileType = ["image/png","image/jpeg"] ; 

        if(in_array($_FILES['upload']['type'], $supportFileType)){

            $saveFolder = "store/" ;
            $newName = $saveFolder.uniqid()."_".$fileName ;


            move_uploaded_file($tempFile, $newName) ;

        }else{

            setError("upload","File is Incorrect");
            $errorStatus=1;
        }    

    }else{

        setError("upload","File is required");
        $errorStatus=1;

    }

    if(!$errorStatus){

        $sql = "INSERT INTO users (name,email,phone,photo) VALUE ('$name','$email','$phone','$newName')" ;
        
        runQuery($sql) ;        

        return true ;

    }


}

function contactUpdate($id){

    $errorStatus = 0 ;
    $name = "" ;
    $email = "" ;
    $phone = "" ;

    if(empty($_POST['name'])){
        setError('name', 'Name is Required');
        $errorStatus = 1 ;
    }else{
        if(strlen($_POST['name']) < 3 ){
            setError('name', 'Name is too Short');
            $errorStatus = 1 ;
        }else{
            if(strlen($_POST['name']) > 20){
                setError('name', 'Name is too Long');
                $errorStatus = 1 ;
            }else{
                if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) { 
                    setError('name', 'Only letters and white space allowed') ;
                    $errorStatus = 1 ;
                }else{
                    $name = textFilter($_POST['name']) ;                   
                    
                }
            }
        }
    }

    if(empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus=1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email Format Incorrect");
            $errorStatus=1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }
    

    if(empty($_POST['phone'])){
        setError("phone","Phone Number is required");
        $errorStatus=1;
    }else{
        if (!preg_match("/^[0-9-' ]*$/",$_POST['phone'])) {  
            setError('phone', 'Phone Format Incorrect') ;
            $errorStatus = 1 ;
        }else{
            $phone = $_POST['phone'] ;
        }
    }

    if(isset($_FILES['upload']['name'])){
        $fileName = $_FILES['upload']['name'] ;
        $tempFile = $_FILES['upload']['tmp_name'] ;
        $supportFileType = ["image/png","image/jpeg"] ; 

        if(in_array($_FILES['upload']['type'], $supportFileType)){

            $saveFolder = "store/" ;
            $newName = $saveFolder.uniqid()."_".$fileName ;


            move_uploaded_file($tempFile, $newName) ;

        }else{

            setError("upload","File is Incorrect");
            $errorStatus=1;
        }    

    }else{

        setError("upload","File is required");
        $errorStatus=1;

    }

    if(!$errorStatus){

        $sql = "UPDATE users SET name = '$name' , email = '$email', phone = '$phone', photo = '$newName' WHERE id = $id " ;
        
        runQuery($sql) ;        

        return true ;

    }

}


