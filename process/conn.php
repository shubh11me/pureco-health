<?php
$conn=mysqli_connect("localhost","root","","pure_health");

function alerter($sc){
    echo "<script>alert('$sc')</script>";
    echo "<script>window.location.href='../index.php';</script>";
}
function alert($sc){
    echo "<script>alert('$sc')</script>";
}

?>