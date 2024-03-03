 <?php
 
 include '../core/config.php';

 if(isset($_POST['upload'])){
      
        $fileName= $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];

        $src = "photo/";

        $column ="SHOW COLUMNS FROM `user` LIKE 'img'";

        $result = mysqli_query($db,$column);
        $rows =mysqli_num_rows($result);
        if($rows){
            $sql = "INSERT INTO `user`(`img`) VALUES ('$fileName')";
            $run =mysqli_query($db,$sql);
            if($run){
                if(move_uploaded_file($tmp, $src.$fileName)){
                    echo 'file upload in diretory';
                }else{
                    echo 'fail';
                }
            }else{
                echo 'data not upload in database';
            }
        }

    
    }


?>

<?php 
include '../component/header.php';
?>

<div class="MyForm">
    <div class="block">
        <h4 style="color:tomato; text-align:center;"> Welcome , <?php if(isset($_REQUEST['user'])){
            echo $_REQUEST['user'];
        }
        ?>
        </h4>
        <p style="text-align:center;">Please upload profile photo </p>
        <form class="col s12" enctype="multipart/form-data" action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row">
        <div class="input-field col s12 center-align">
          <input name="file" type="file" class="validate">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 center-align ">
          <button class= "btn container center-align align-center" name="upload"> Upload </button>
        </div>
      </div>
    </form>
</div>
</div>

<?php

include '../component/footer.php';

?>