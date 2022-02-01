<?php
include 'process/conn.php';
$apt_id = $_GET["apt_id"];
$get_apt = mysqli_query($conn, "SELECT * FROM appointments,tests WHERE appointment_id='$apt_id' AND tests.test_id=appointments.test");
if (mysqli_num_rows($get_apt) > 0) {
  $row_apt = mysqli_fetch_assoc($get_apt);
  if ($row_apt['payment_status'] != 0 and $row_apt['payment_amount'] != 0) {
    alert("Looks like you have completed the payment");
    echo "<script>window.location.href='./index.php';</script>";
  }
} else {
  alert("Something went wrong please try again");
  echo "<script>window.location.href='./index.php';</script>";
  // echo "SELECT * FROM appointments,tests WHERE appointment_id='$apt_id' AND tests.test_id=appointments.test";
}
$name=$row_apt['name'];
$test=$row_apt['test_name'];
$date=$row_apt['apt_date'];
$email=$row_apt['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment-Pureco Healthcare Services</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="payment.css">
  <style>

  </style>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
  <?php
  include './process/nav.php';

  ?>


  <!--------payment start-->

  <div class="bg">
    <div class="container">
      <div class="text">
        <h1>PAYMENT METHOD</h1>
        <P>You Can't Book Appointment Without Make A Payment!</P>
        <h5>Apt No: <?php echo $row_apt['appointment_id']; ?> ,Name:<?php echo $row_apt['name']; ?>, Email: <?php echo $row_apt['email']; ?>, Mobile No: <?php echo $row_apt['mob_no']; ?></h5>
        <h6>Test Name: <?php echo $row_apt['test_name']; ?> AND Amount:Rs.<?php echo $row_apt['tast_amount']; ?></h6>
        <h5>Total Amount to pay : <?php echo "Rs." . $row_apt['tast_amount'] * $row_apt['no_of_peop']; ?></h5>
        <button class="btn btn-primary" id="pat_btn" type="button" onclick="payNow()">PAYMENT METHOD</button>


      </div>
    </div>
  </div>
  <!--------payment start-->


  <script>
    let email = "<?php echo $email; ?>";
    console.log(email);
    function payNow() {
  $('#pat_btn').attr('disabled', 'disabled');
      var options = {
        
        
        "key": "rzp_test_Rk368EKyMsznoL", // Enter the Key ID generated from the Dashboard
        "amount": <?php echo $row_apt['tast_amount'] * $row_apt['no_of_peop']; ?> * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Pureco Health Services",
        'prefill': {"contact":<?php echo $row_apt['mob_no'] ?>, "email":email},
        "description": "Appointment Booking",
        "image": "https://www.pngfind.com/pngs/m/669-6692892_logo-sample-logo-designs-for-schools-hd-png.png",
        "handler": function(response) {
          if (response.razorpay_payment_id != null || response.razorpay_payment_id != "") {
            let mydata = JSON.stringify({
              payment_id: response.razorpay_payment_id,
              amount: <?php echo $row_apt['tast_amount'] * $row_apt['no_of_peop']; ?>,
              apt_id: "<?php echo $apt_id ;?>",
              name: "<?php echo $name ; ?>",
              test: "<?php echo $test ; ?>",
              email:email,
              date: "<?php echo $date ; ?>",    
            })
            $.ajax({
              type: "POST",
              url: "./process/payment_process.php",
              data: mydata,
              success: function(result) {
                console.log(result);          
                if (JSON.parse(result).payment == "complete") {          
                  console.log("payment complete");
                  window.location.href = `thanks.php?pay_id=${response.razorpay_payment_id}`;
                }
                $('#pat_btn').attr('disabled', 'false');

              },
              error: function(error){
                $('#pat_btn').attr('disabled', 'false');

              }
            });
          }

          // alert("success");
          console.log(response);





        },
        "theme": {
          "color": "#3399cc"
        }
      };
      var rzp1 = new Razorpay(options);
      rzp1.open();
    }
  </script>
</body>

</html>