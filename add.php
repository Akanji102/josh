<?php

include('config/db_connect.php');
//check connection



$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninja_pizza');
//check connection

 if(!$conn){
   echo 'connection error: ' . mysqli_connect_error();
 }



$title = $email = $ingredients = '';
$errors = array('email' =>'', 'title' =>'', 'ingredients' =>'');
 if(isset($_POST['submit'])){
  //echo htmlspecialchars($_POST['email']);
    //echo htmlspecialchars($_POST['title']);
     //echo htmlspecialchars($_POST['ingredients']);
   }
   //check email
   if(empty($_POST['email'])){
     $errors['email'] = 'an email is required <br />';
   }
   else{
     $email = $_POST['email'];
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $errors['email'] = 'email must be a valid email address';
     }
   }

   //check title
 if(empty($_POST['title'])){
    $errors['title'] = 'a title is required <br />';
 } else {
 $title = $_POST['title'];
 if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
   $errors['title'] =  'title must be letter and spaces only';
  }
}

 //check ingredients
 if(empty($_POST['ingredients'])){
    $errors['ingredients'] = 'an ingredient is required <br />';
 } else {
 $ingredients = $_POST['title'];
 if(!preg_match('/^[a-zA-Z\s]+$/', $ingredients)){
   $errors['ingredients'] =  'ingredients must be letter and spaces only';
  }
}
if(array_filter($errors)){

    header('Location: index.php');

}
//echo 'form is valid'



 ?>

<!DOCTYPE html>
<html
     <?php include('templates/header.php'); ?>

<section class="container grey-text">
<h4 class="center">Add a pizza</h4>
<form class="white" action="add.php" method="POST"><!--post and get has only little differences but they work in the same way-->
  <label>Your email:</label>
    <div class="red-text"><?php echo $errors['email']; ?></div>
  <input type="text" name="email">
  <label>Pizza title:</label>
    <div class="red-text"><?php echo $errors['title']; ?></div>
  <input type="text" name="title">
  <label>ingredients:</label>
    <div class="red-text"><?php echo $errors['ingredients']; ?></div>
  <input type="text" name="ingredients">
  <div class="center">
    <input type="submit" name="submit" class="btn brand z-depth-0">
  </div>
</section>


</section>

     <?php  include('templates/footer.php'); ?>

</html>
