<?php
// connect to the database
$conn = mysqli_connect('localhost', 'shaun', 'test1234', 'ninja_pizza');

//check the connection. i am going to do a very brief if statement right now
if($conn){
  echo 'connection error: ' . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html
     <?php include('templates/header.php'); ?>

     <?php  include('templates/footer.php'); ?>

</html>
