<?php 
$adminsEmail =array("moh@gmail.com","ahmad@gmail.com");
$emails=$_GET['email'];

if(in_array($emails,$adminsEmail)){
    echo "welcome " . $emails . '</br>';
} else{
    echo "this email dosnt exist";
} ?>

