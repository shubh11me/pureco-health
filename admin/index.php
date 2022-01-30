<?php
include '../process/conn.php';
session_start();
if (!isset($_SESSION['admin_login'])) {
    echo "<script>window.location.href='login.php'</script>";
} else {
    $apoint = mysqli_query($conn, "SELECT * FROM appointments");
    $apoint_booked= mysqli_query($conn, "SELECT * FROM appointments WHERE apt_status='Booked'");
    $apoint_apr= mysqli_query($conn, "SELECT * FROM appointments WHERE apt_status='Approve'");
    $apoint_done= mysqli_query($conn, "SELECT * FROM appointments WHERE apt_status='Done'");
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
    <link rel="stylesheet" href="index.css">
    <title>Admin -pureco</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand mb-2" href="./index.php">ADMIN-PURECO HEALTH</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link mx-2" href="./index.php">HOME</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link mx-2" href="./logout.php">Logout</a>
                </li>

            </ul>

        </div>
    </nav>

    <h2 class="text-center">
       All Appointements
    </h2>
    <br>
    <table class="table table-primary table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">apt_date</th>
                <th scope="col">address</th>
                <th scope="col">test</th>
                <th scope="col">no_of_peop</th>
                <th scope="col">mob_no</th>
                <th scope="col">payment_status</th>
                <th scope="col">payment_amount</th>
                <th scope="col">payment_id</th>
                <th scope="col">aapt_by</th>
                <th scope="col">Appointment Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($apoint)) {

            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['city'] ?></td>
                    <td><?php echo $row['apt_date'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['test'] ?></td>
                    <td><?php echo $row['no_of_peop'] ?></td>
                    <td><?php echo $row['mob_no'] ?></td>
                    <td><?php echo $row['payment_status'] ?></td>
                    <td><?php echo $row['payment_amount'] ?></td>
                    <td><?php echo $row['payment_id'] ?></td>
                    <td><?php echo $row['aapt_by'] ?></td>

                    <td><select onChange="update_status(this.value,'<?php echo $row['appointment_id'] ?>')" class="form-control" id="exampleFormControlSelect1">
                            <option value="Requested" <?php echo $row['apt_status'] == 'Requested' ? 'selected' : '' ?>>Requested</option>
                            <option value="Booked" <?php echo $row['apt_status'] == 'Booked' ? 'selected' : '' ?>>Booked</option>
                            <option value="Approve" <?php echo $row['apt_status'] == 'Approve' ? 'selected' : '' ?>>Approve</option>
                            <option value="Done" <?php echo $row['apt_status'] == 'Done' ? 'selected' : '' ?>>Done</option>
                        </select></td>

                    <td></td>

                </tr>

            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>


    <h2 class="text-center">
        Booked Appointments
    </h2>
    <br>
    <table class="table table-primary table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">apt_date</th>
                <th scope="col">address</th>
                <th scope="col">test</th>
                <th scope="col">no_of_peop</th>
                <th scope="col">mob_no</th>
                <th scope="col">payment_status</th>
                <th scope="col">payment_amount</th>
                <th scope="col">payment_id</th>
                <th scope="col">aapt_by</th>
                <th scope="col">Appointment Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($apoint_booked)) {

            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['city'] ?></td>
                    <td><?php echo $row['apt_date'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['test'] ?></td>
                    <td><?php echo $row['no_of_peop'] ?></td>
                    <td><?php echo $row['mob_no'] ?></td>
                    <td><?php echo $row['payment_status'] ?></td>
                    <td><?php echo $row['payment_amount'] ?></td>
                    <td><?php echo $row['payment_id'] ?></td>
                    <td><?php echo $row['aapt_by'] ?></td>

                    <td><select onChange="update_status(this.value,'<?php echo $row['appointment_id'] ?>')" class="form-control" id="exampleFormControlSelect1">
                            <option value="Requested" <?php echo $row['apt_status'] == 'Requested' ? 'selected' : '' ?>>Requested</option>
                            <option value="Booked" <?php echo $row['apt_status'] == 'Booked' ? 'selected' : '' ?>>Booked</option>
                            <option value="Approve" <?php echo $row['apt_status'] == 'Approve' ? 'selected' : '' ?>>Approve</option>
                            <option value="Done" <?php echo $row['apt_status'] == 'Done' ? 'selected' : '' ?>>Done</option>
                        </select></td>

                    <td></td>

                </tr>

            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>


    <h2 class="text-center">
        Approved Appointments
    </h2>
    <br>
    <table class="table table-primary table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">apt_date</th>
                <th scope="col">address</th>
                <th scope="col">test</th>
                <th scope="col">no_of_peop</th>
                <th scope="col">mob_no</th>
                <th scope="col">payment_status</th>
                <th scope="col">payment_amount</th>
                <th scope="col">payment_id</th>
                <th scope="col">aapt_by</th>
                <th scope="col">Appointment Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($apoint_apr)) {

            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['city'] ?></td>
                    <td><?php echo $row['apt_date'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['test'] ?></td>
                    <td><?php echo $row['no_of_peop'] ?></td>
                    <td><?php echo $row['mob_no'] ?></td>
                    <td><?php echo $row['payment_status'] ?></td>
                    <td><?php echo $row['payment_amount'] ?></td>
                    <td><?php echo $row['payment_id'] ?></td>
                    <td><?php echo $row['aapt_by'] ?></td>

                    <td><select onChange="update_status(this.value,'<?php echo $row['appointment_id'] ?>')" class="form-control" id="exampleFormControlSelect1">
                            <option value="Requested" <?php echo $row['apt_status'] == 'Requested' ? 'selected' : '' ?>>Requested</option>
                            <option value="Booked" <?php echo $row['apt_status'] == 'Booked' ? 'selected' : '' ?>>Booked</option>
                            <option value="Approve" <?php echo $row['apt_status'] == 'Approve' ? 'selected' : '' ?>>Approve</option>
                            <option value="Done" <?php echo $row['apt_status'] == 'Done' ? 'selected' : '' ?>>Done</option>
                        </select></td>

                    <td></td>

                </tr>

            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>


    <h2 class="text-center">
        Done Appointments
    </h2>
    <br>
    <table class="table table-primary table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">City</th>
                <th scope="col">apt_date</th>
                <th scope="col">address</th>
                <th scope="col">test</th>
                <th scope="col">no_of_peop</th>
                <th scope="col">mob_no</th>
                <th scope="col">payment_status</th>
                <th scope="col">payment_amount</th>
                <th scope="col">payment_id</th>
                <th scope="col">aapt_by</th>
                <th scope="col">Appointment Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($apoint_done)) {

            ?>
                <tr>
                    <th scope="row"><?php echo $i ?></th>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['city'] ?></td>
                    <td><?php echo $row['apt_date'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['test'] ?></td>
                    <td><?php echo $row['no_of_peop'] ?></td>
                    <td><?php echo $row['mob_no'] ?></td>
                    <td><?php echo $row['payment_status'] ?></td>
                    <td><?php echo $row['payment_amount'] ?></td>
                    <td><?php echo $row['payment_id'] ?></td>
                    <td><?php echo $row['aapt_by'] ?></td>

                    <td><select onChange="update_status(this.value,'<?php echo $row['appointment_id'] ?>')" class="form-control" id="exampleFormControlSelect1">
                            <option value="Requested" <?php echo $row['apt_status'] == 'Requested' ? 'selected' : '' ?>>Requested</option>
                            <option value="Booked" <?php echo $row['apt_status'] == 'Booked' ? 'selected' : '' ?>>Booked</option>
                            <option value="Approve" <?php echo $row['apt_status'] == 'Approve' ? 'selected' : '' ?>>Approve</option>
                            <option value="Done" <?php echo $row['apt_status'] == 'Done' ? 'selected' : '' ?>>Done</option>
                        </select></td>

                    <td></td>

                </tr>

            <?php
                $i++;
            }
            ?>
        </tbody>
    </table>
    <script>
       function update_status(s,id) {
           let mydata=JSON.stringify({
               value:s,
               apt_id:id
           })
        $.ajax({
              type: "POST",
              url: "../process/update_status.php",
              data: mydata,
              success: function(result) {
                if (JSON.parse(result).status) {          
                 alert('Status updated');
                 window.location.reload();
                }
              }
            });
        }
    </script>

</body>

</html>