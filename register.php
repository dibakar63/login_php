<?php

session_start();
header('location:login.php');

$con =mysqli_connect('localhost','root',"123456");

mysqli_select_db($con,'userregistration');
if($conn == false){
    dir('Error: Cannot connect');
}


$name=$_POST['user'];
$email=$_POST['email'];
$password=$_POST['password'];

$s= " select * from usertable where user='$name'";

$result=mysqli_query($con,$s);
$num=mysqli_num_rows($result);

if($num == 1){
    echo "Username Already Taken";
}else{
    $reg="insert into usertable(user,email,password) values ('$name','$email','$password')";
    mysqli_query($con,$reg);
    echo "Registration Successful";
    }

?>