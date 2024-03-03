<link rel='stylesheet' href='./css/style.css'>

<?php



$error = array("fnameErr" => "","lnameErr" => "","emailErr" => "","passErr" => "", "fileErr"=>"");

if(isset($_POST['signup'])){

        $firstName=$_POST['firstName'];
        $lastName= $_POST['lastName'];
        $email= $_POST['email'];
        $pass = $_POST['pass'];



    if(empty($firstName)){
        $error['fnameErr'] = "Required"; 
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
    }else{
       
      $db = mysqli_connect("localhost", "zaynmiraj", "miraj@12", "FreeChat");
      if(!$db){
        echo "<script > alert('database not connected') </script>";
      }
        
       $isEamil = "SELECT * FROM `user` WHERE email ='$email'";
       $runQuery = mysqli_query($db,$isEamil);
       $rows = mysqli_num_rows($runQuery);
       if($rows==1){
        echo "<script > alert('already email exist') </script>";
       }else{
        
          $sql = "INSERT INTO `user`(`firstName`, `lastName`, `email`, `pass`) VALUES ('$firstName','$lastName','$email','$pass')";
          $result = mysqli_query($db,$sql);
          if($result){
            echo "<script > alert('creating account succesfull') </script>";
          }else{
            echo "<script > alert('creating account fail'); </script>";
          }

       }
    
      }


          
}




?>
<?php

include './component/header.php';

?>

<div class="MyForm">
    <div class="block">
    <div class="row">
    <form class="col s12" enctype="multipart/form-data" action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" name="firstName" type="text" class="validate">
          <label for="first_name">First Name 
              <span style="color:red; margin-left:10px;" >
              <?php echo $error['fnameErr']; ?>
            </span>
          </label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" name="lastName" type="text" class="validate">
          <label for="last_name">Last Name
          <span style="color:red; margin-left:10px;" >
              <?php echo $error['lnameErr']; ?>
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Email
          <span style="color:red; margin-left:10px;" >
              <?php echo $error['emailErr']; ?>
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="pass" type="password" class="validate">
          <label for="password">Password
          <span style="color:red; margin-left:10px;" >
              <?php echo $error['passErr']; ?>
            </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <button class="btn" name="signup"> SIGNUP </button>
        </div>
        <div class="input-field col s6">
          <a href="./src/login.php" class="btn" > Login </a>
        </div>
      </div>
      </div>
    </form>
  </div>
        
</div>
</div>




<?php

include './component/footer.php'

?>