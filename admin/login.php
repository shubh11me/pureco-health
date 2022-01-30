<?php
session_start();
include '../process/conn.php';


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
echo "SELECT * FROM `admins` where admin_email='$email' AND admin_password ='$password'"; 
    $exist = mysqli_query($conn, "SELECT * FROM `admins` where admin_email='$email' AND admin_password ='$password'");
    if (mysqli_num_rows($exist) > 0) {
        $row = mysqli_fetch_assoc($exist);
        $_SESSION['admin_login'] =true;
        $_SESSION['admin_email'] =$row['admin_email'];
    

        echo "<script>window.location.href='index.php'</script>";
    } else {
        alert("Invalid Credentials");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Panel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pillslogin" data-bs-toggle="pill" data-bs-target="#login" type="button" role="tab" aria-controls="pills-home" aria-selected="true">SignIn</button>
                            </li>
                           

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="pillslogin">
                                <div class="card-body p-5 text-center">

                                    <h3 class="mb-5">Admin Sign in</h3>
                                    <form action="" method="POST">
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typeEmailX-2">Email</label>
                                            <input type="email" id="typeEmailX-2" name='email' class="form-control form-control-lg" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="typePasswordX-2">Password</label>
                                            <input type="password" id="typePasswordX-2" name='password' class="form-control form-control-lg" />
                                        </div>

                                     

                                        <button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>


                                    </form>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>