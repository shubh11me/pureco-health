<?php
include './conn.php';
$test=$_GET['test_id'];
$res=mysqli_query($conn,"SELECT * FROM tests WHERE test_id='$test' LIMIT 1");
$row=mysqli_fetch_assoc($res);
echo json_encode($row);

?>