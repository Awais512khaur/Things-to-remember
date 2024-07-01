<?php

   print "<pre>";
   print_r($_POST);
   print "</pre>";

   $error =[];
   if(isset($_POST['first_name']) && $_POST['first_name'] == "" ){
       $error[] = "firstname is required before submitting";
    //    $error[] = "last_name is required before submitting";
   }
   elseif(isset($_POST['last_name'])&& $_POST['last_name'] ==""){
     $error[] = "last_name is required before submitting";
   }
   else{
    echo "values are successfully added to the database";
   }

?>
    <h1>Registration Form</h1>
    <ul>
        <?php 
        foreach($error as $err){
        echo "<li> $err </li>";
        }
        ?>
