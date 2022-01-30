<?php
include './process/conn.php';

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <style>
    label {
      color: #fff;
    }
  </style>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <title>Hello, world!</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="ne"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><b>Book a test</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><b>Medical guides</b></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <b>Specialties</b>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><b>How to consult online</b></a>
          </li>
        </ul>

        <button class="btn btn-outline-primary" type="submit">COVID19</button>

      </div>
    </div>
  </nav>

  <section>

    <div class="inner-layer">
      <div class="container">
        <div class="row">
          <div class="col-sm-7">
            <div class="content">
              <h1>Book Your Covid 19 Test Now</h1>
              <p>RNA based RT-PCR test For COVID- 19
              </p>


            </div>

          </div>
          <div class="col-sm-5">
            <div class="form-data">
              <div class="form-head">
                <h2>Schedule COVID- 19 Sample<br> Collection</h2>

              </div>
              <form id="book_form" method="post" action="process/book.php" enctype="multipart/form-data">
                <div class="form-body">
                  <div class="row form-row">
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Enter Your Name">
                  </div>
                  <div class="row form-row">
                    <input type="text" name="email" id="email" class="form-control" required placeholder="Enter Email Id">
                  </div>
                  <div class="row form-row">
                    <input type="text" name="add" id="add" required placeholder="Enter Address" class="
                            form-control">
                  </div>

                  <h6>Address Details</h6>


                  <div class="row form-row">
                    <div class="col-sm-6">

                      <input type="text" name="city" class="form-control" id="city" required placeholder="Select City" required>
                    </div>
                    <div class="col-sm-6">
                      <input type="file" name="file" required accept="image/*" name="image" class="custom-file-input" id="file">
                      <label class="custom-file-label" for="customFile">ID Proof</label>
                    </div>
                    <div class="row form-row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="testsel">select the Test</label>
                          <select class="form-control" onchange="changeTest(this.value)" required name="test" id="test" id="testsel">
                            <option value="default">Select Test</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM tests");
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                              <option value="<?php echo $row['test_id'] ?>"><?php echo $row['test_name'] ?></option>
                            <?php
                            }
                            ?>

                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label for="mnum">Mobile Number</label>

                        <input type="number" name="mnum" id="mnum" required required placeholder="Mobile Number" class="form-control">
                      </div>
                      <h2 style="color: #fff">Amount:- <span id="test_amt"></span> </h2>

                    </div>
             
                
                    <div class="row form-row">

                        <button class="btn btn-primary" name="submit" id="bookapt" type="submit">Book appointment</button>
                        <!-- </button> -->
                      
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->


  <script>
    // $("#book_form").on('submit',function (e) {
    //   e.preventDefault();
    //   var name = $("#name").val();
    //   var email = $("#email").val();
    //   var add = $("#add").val();
    //   var city = $("#city").val();
    //   var test = $("#test").val();
    //   var mnum = $("#mnum").val();
    //   if (name == "" && email == "") {
    //     alert("Please enter name and email address");
    //   } else {
    //     $.ajax({
    //       type: "POST",
    //       url: "./process/book.php",
    //       // data: "name=" + name + "&email=" + email+ "&add=" + add+ "&city=" + city+ "&test=" + test+ "&mnum=" + mnum+ "&dataIns="+true  ,
    //       data: new FormData(this),
    //       dataType: 'json',
    //       contentType: false,
    //       cache: false,
    //       processData: false,
    //       success: function(result) {
    //         console.log(result);
    //         var options = {
    //           "key": "rzp_test_Rk368EKyMsznoL", // Enter the Key ID generated from the Dashboard
    //           "amount": 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    //           "currency": "INR",
    //           "name": "Learn Fun",
    //           "description": "Test Transaction",
    //           "image": "https://www.pngfind.com/pngs/m/669-6692892_logo-sample-logo-designs-for-schools-hd-png.png",
    //           "handler": function(response) {
    //             // $.ajax({
    //             //     type: "POST",
    //             //     url: "./api_user/payment_process_api.php",
    //             //     data: "payment_id=" + response.razorpay_payment_id,
    //             //     success: function(result) {
    //             //         window.location.href = `thanks.php?pay_id=${response.razorpay_payment_id}`;
    //             //     }
    //             // });


    //             alert("success");
    //             console.log(response);





    //           },
    //           "theme": {
    //             "color": "#3399cc"
    //           }
    //         };
    //         var rzp1 = new Razorpay(options);
    //         rzp1.open();
    //       }
    //     })
    //     // });
    //   }
    // })
  </script>

  <script>
    function changeTest(test_id) {
      $.ajax({
        url: './process/get_test.php?test_id=' + test_id,
        type: 'GET',
        success: function(data) {
         let chk= JSON.parse(data);
          if (chk != null) {
            let testDetail = JSON.parse(data);
            $('#test_amt').html("Rs."+testDetail.tast_amount);
          }else {
            let testDetail = "";

            $('#test_amt').html(" ");
          }
        }
      });
    }
  </script>
</body>

</html>