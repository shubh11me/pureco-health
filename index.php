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
  <title>Pureco Healthcare Services</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <style>
    label {
      color: #fff;
    }
  </style>
</head>

<body>
  <?php
  include './process/nav.php';

  ?>
  <!----------------nav start-->

  <!----------------nav end-->
  <!------------home section start-->

  <div class="inner-layer">
    <div class="container">
      <div class="row">
        <div class="col-sm-7">
          <!-- <div class="content">
            <h1>Pureco Health Care Services</h1>
            <h2 style="color:#fff">Book Your Test Now</h2>
            <p>RNA based RT-PCR test For COVID- 19
            </p>


          </div> -->

        </div>
        <div class="col-sm-5">
          <div class="form-data"  id="div_main">
            <div class="form-head">
              <h2>Pureco Healthcare Services<br> Schedule Appointment</h2>



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

                <h6>Address Details & <span id="filename"></span></h6>


                <div class="row form-row">
                  <div class="col-md-6 col-sm-12">

                    <input type="text" name="city" class="form-control" id="city" required placeholder="Select City" required />
                  </div><br>
                  <div class="col-md-6 col-sm-12">
                    <input type="file" name="file" onchange="getFile(this)" required class="custom-file-input" id="file">
                    <label class="custom-file-label" for="customFile">ID Proof</label>
                  </div>

                  <div class="row form-row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="testsel">select the Test</label>
                        <select class="form-control" onchange="changeTest(this.value,document.getElementById('nos').value)" required name="test" id="test" id="testsel">
                          <option value="default">Select Test</option>
                          <?php
                          $result = mysqli_query($conn, "SELECT * FROM tests");
                          while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                            <option value="<?php echo $row['test_id'] ?>">
                              <?php echo $row['test_name'] ?>
                            </option>
                          <?php
                          }
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <label for="mnum">Mobile Number</label>

                      <input type="text" pattern="[7-9]{1}[0-9]{9}" name="mnum" id="mnum" required placeholder="Mobile Number" class="form-control">
                    </div>
                    <div class="col-sm-12">
                      <label for="apt_date">Select Appointment Date</label>

                      <input type="date" name="apt_date" id="apt_date" required class="form-control">
                    </div>
                    <div class="col-sm-12">
                      <label for="nos">No. of peoples</label>

                      <select class="form-control" onchange="priceHandler(this.value)" required name="nos" id="nos" id="nos">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                    <h2 style="color: #fff">Amount:- <span id="test_amt"></span> </h2>

                  </div>


                  <div class="row form-row">

                    <button class="btn btn-lg btn-primary" name="submit" id="bookapt" type="submit">Book appointment</button>
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

  <div class="container">
    <div class="text-center">
      <h1 class="display-4"> Monthly Checkups</h1>
      <hr class="w-25  mx-auto ">
      <div class="row">
        <div class="col-md-6 py-3 py-sm-0">
          <div class="card" style="width: 22rem;">
            <img class="card-img-top" src="l7.jpg" alt="Card image cap">
            <div class="card-body  box-shadow">
              <h5 class="card-title">Diabetes Checkup</h5>
              <p class="card-text">The Diabetic Package is designed to diagnose health complications related to diabetes and helps in controlling and curing the same.</p>
              <a href="#div_main" class="btn btn-lg btn-primary">BOOK NOW</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 py-3 py-sm-0">
          <div class="card" style="width: 22rem;">
            <img class="card-img-top" src="l7.jpg" alt="Card image cap">
            <div class="card-body box-shadow">
              <h5 class="card-title">Full Body Checkup</h5>
              <p class="card-text">Full Body Checkup package consists of health status like Lipid, Thyorid, Iron, Diabetic, Kidney & Complete Hemogram Profile.</p>
              <a href="#div_main" class="btn btn-lg btn-primary">BOOK NOW</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      let testDetail = "";

      function changeTest(test_id, nos = 1) {
        console.log(nos)
        $.ajax({
          url: './process/get_test.php?test_id=' + test_id,
          type: 'GET',
          success: function(data) {
            let chk = JSON.parse(data);
            if (chk != null) {
              testDetail = JSON.parse(data);
              $('#test_amt').html("Rs." + testDetail.tast_amount * nos);
            } else {
              testDetail = "";

              $('#test_amt').html(" ");
            }
          }
        });
      }

      function priceHandler(nos) {
        $('#test_amt').html("Rs." + testDetail.tast_amount * nos);
      }

      function getFile(c) {
        //  console.log(c.files[0].name);

        $('#filename').html(`File Name :- ${c.files[0].name}`);
      }
    </script>
    <!------------home section start-->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

</body>

</html>