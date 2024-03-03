

<?php

include_once "../component/header.php";

?>


<h4 style="text-align:center;"> Welcome <span style= "color:tomato;" >
 <?php 
    if(isset($_REQUEST['user'])){
        echo $_REQUEST['user'];
    }
 ?>
 </span> </h4>
 <p> <?php $fetch= mysqli_fetch_assoc($_REQUEST['email']); echo $fetch['email'] ?> </p>

 <form style="display:flex; flex-direction:column ; width: 300px; float:center" action="" method="post" >
    <input type="file" name="profile">
    <button name="upload" > Upload </button>
</form>


<?php
include "../component/footer.php"; 
?>