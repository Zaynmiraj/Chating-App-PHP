<?php


$error = array("fnameErr" => "","lnameErr" => "","emailErr" => "","passErr" => "", "fileErr"=>"");

if(isset($_POST['signup'])){

        $firstName=$_POST['firstName'];
        $lastName= $_POST['lastName'];
        $email= $_POST['email'];
        $pass = $_POST['pass'];



    if(empty($firstName)){
       header("location:../index.php?firstName= $error['NameErr']");
    }
    else{
        if(!preg_match("/^[a-zA-Z-' ]*$/",$firstName)){
            $error['fnameErr'] = "Only letter allowed";
        }
    }
    if(empty($lastName)){
        $error['lnameErr'] = "Required"; 
    }
    else{
        if(!preg_match("/^[a-zA-Z-' ]*$/",$lastName)){
            $error['lnameErr'] = "Only letter allowed";
        }
    }
    if(empty($email)){
      $error['emailErr']="Required";
    }
    if(empty($pass)){
      $error['passErr']= "Required";
    }



}

?>