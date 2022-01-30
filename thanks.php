<?php
include './process/conn.php';
$pay_id=$_GET['pay_id'];
$res=mysqli_query($conn,"SELECT * FROM appointments,tests where payment_id='$pay_id' AND payment_status=1 AND tests.test_id=appointments.test");
if (mysqli_num_rows($res)>0) {
    $row=mysqli_fetch_assoc($res);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="book.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>confirm-Pureco Healthcare Services</title>
  </head>
  <body>
    <!----------------nav start-->
    <?php
include './process/nav.php';

?>
    <!----------nav end -->
    <body>
      <!--------confrim page start------->
        <div class=" row inner-layer">
            <div class="container">
                <div class="text">
                  <i class=" fa-6x fas fa-check-circle"></i>
                    <h1>Hello <?php echo $row['name'] ?></h1>
                    <h4>Your <?php echo $row['test_name'] ?> Test Appointment is Now Confirm</h5>
                   <h4><i class=" fa-1x far fa-calendar-alt"></i>  ON <?php echo $row['apt_date'] ?> </h4>
                   <p>Please Check Your Registered Email Address For Updates </p>
                    
                  <a href="./index.php"class="btn btn-primary">OK</a>
             </div>
            </div>
</div>
<!--------confrim page end------->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </html>
