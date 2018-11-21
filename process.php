<?php
 session_start();
 $update=false;
 $id=0;
 $name="";
 $location="";
 $mobile="";
 $conn=new mysqli("localhost","root","","CRUD") or die(mysqli_error($conn));

 /// Create

 if(isset($_POST['save'])){
   $name=$_POST['name'];
   $location=$_POST['location'];
   $mobile=$_POST['mobile'];
   $conn->query("INSERT INTO data(name,location,mobile) VALUES('$name','$location','$mobile')") or
   die(mysqli_error());
   $_SESSION['message']="Record has been saved";
   $_SESSION['msg_type']="Success";
   header("location:index.php");
 }
/// Delete

 if (isset($_GET['delete'])) {
   $id=$_GET['delete'];
   $conn->query("DELETE FROM data WHERE id=$id") or die(mysqli_error());
   $_SESSION['message']="Record has been deleted";
   $_SESSION['msg_type']="Danger";
   header("location:index.php");
 }

if (isset($_GET['edit'])) {
  $update=true;
  $id=$_GET['edit'];
  $result=$conn->query("SELECT * FROM data WHERE id=$id") or die(mysqli_error());
  if (count($result)==1) {
    $row=$result->fetch_array();
    $name=$row['name'];
    $location=$row['location'];
    $mobile=$row['mobile'];
  }
}

  if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $location=$_POST['location'];
    $mobile=$_POST['mobile'];
    $conn->query("UPDATE data SET name=''$name',location='$location',mobile='$mobile' WHERE id='$id'") or
    die(mysqli_error());
    $_SESSION['message']="Record has been update";
    $_SESSION['msg_type']="warning";
    header("location:index.php");
  }
 ?>
