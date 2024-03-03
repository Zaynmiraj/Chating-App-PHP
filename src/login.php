<?php

  $error = array("emailErr"=>"", "passErr"=>"");
  if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if(empty($email)){
      $error['emailErr']= 'required';
    }
    if(empty($pass)){
      $error['passErr']= 'required';
    }
    else{
      
      $db = mysqli_connect("localhost", "zaynmiraj","miraj@12", "FreeChat");
      if(!$db){
        echo 'database not connected';
      }else{
        $sql = "SELECT * FROM `user` WHERE email ='$email' && pass = '$pass'";
        $result = mysqli_query($db, $sql);
        $UserFound = mysqli_num_rows($result);
        if($UserFound==1){
         $getUser = mysqli_fetch_assoc($result);
         $email = $getUser['email'];
         $fullname = $getUser['firstName']." ".$getUser['lastName'];
         header("location:./profile.php?user= $fullname && email= $getUser ");


        }else{
          echo 'user not found';
        }

      }

    }
  }

?>



<?php
include '../component/header.php';


?>

<div class="MyForm">
    <div class="block">
    <form class="col s12" action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">Eamil
            <span style="color:red; margin-left:10px" > 
            <?php  echo $error['emailErr']; ?>
          </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="pass" type="password" class="validate">
          <label for="password">Password 
          <span style="color:red; margin-left:10px" > 
            <?php  echo $error['passErr']; ?>
          </span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <button class="btn" name="login"> Login </button>
        </div>
        <div class="input-field col s6">
          <a href="../index.php" class="btn" > signup </a>
        </div>
      </div>
      </div>
    </form>
  </div>
</div>

<?php

    include '../component/footer.php';

?>