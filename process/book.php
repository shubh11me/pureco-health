<?php

include('./conn.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['mnum'])) {

    $sname = $_POST['name'];
    $email = $_POST['email'];
    $add = $_POST['add'];
    $city = $_POST['city'];
    $test = $_POST['test'];
    $mnum = $_POST['mnum'];
    $nos = $_POST['nos'];
    // echo $mnum;
    $apt_date = $_POST['apt_date'];

    // echo "select * from where appointments `mob_no`='$mnum' OR `email`='$email'";
    $exist = mysqli_query($conn, "select * from  appointments where (`mob_no`='$mnum' OR `email`='$email') AND `test`='$test'");
    if (mysqli_num_rows($exist) == 0) {
        $maxsize = 5242880; // 5MB
        if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
            // $name = $_FILES['file']['name'];
            $name=$_FILES['file']['name'].rand(10,100).date("d") . date("m") . date("y");
            echo $name;
            $target_dir = "id_proofs/";
            $target_file = $target_dir . $_FILES['file']['name'];
            echo "<br>" . $target_file;
            // Select file type
            $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "pdf");

            // Check extension
            if (in_array($extension, $extensions_arr)) {

                // Check file size
                if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                    alert("File too large. File must be less than 5MB.");
                } else {
                    // Upload
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$name.'.'.$extension)) {
                        // Insert record
                        //    $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

                        //    mysqli_query($con,$query);
                        // echo "INSERT INTO `appointments` (`name`, `email`, `city`,`apt_date`, `address`, `id_proof`,`test`, `mob_no`, `aapt_by`) VALUES ( '$sname', '$email', '$city','$apt_date', '$add','$target_file', '$test', '$mnum','SELF');";
                        $insert = mysqli_query($conn, "INSERT INTO `appointments` (`name`, `email`, `city`,`apt_date`, `address`, `id_proof`,`test`,`no_of_peop`, `mob_no`, `aapt_by`, `apt_status`) VALUES ( '$sname', '$email', '$city','$apt_date', '$add','$target_dir.$name.$extension', '$test','$nos', '$mnum','SELF','Requested');");
                        //   echo  "INSERT INTO `appointments` (`name`, `email`, `city`, `address`, `id_proof`,`test`, `mob_no`, `aapt_by`) VALUES ( '$sname', '$email', '$city', '$add','$target_file', '$test', '$mnum','SELF');";
                        if ($insert) {
                            $lastid = mysqli_insert_id($conn);
                            $aptid = "APPOINT" . $lastid . date("d") . date("m") . date("y");
                            mysqli_query($conn, "update appointments set appointment_id='$aptid' where appointments.id='$lastid'");
                            $_SESSION['apid'] = $aptid;
                            include './mailer.php';
                            alert("Appointment successfully.");
                            // header("Location:payment.php?apt_id=" . $_SESSION['apid']);
                            echo "<script>window.location.href='../payment.php?apt_id=" . $_SESSION['apid'] . "';</script>";

                        }
                    }
                }
            } else {
                alert("Invalid file extension.");
                echo "<script>window.location.href='../index.php';</script>";
            }
        } else {
            alert("Please select a file.");
            echo "<script>window.location.href='../index.php';</script>";
        }
    } else {
        alert("Your Appointment already exists please complete the payment");
        echo "<script>window.location.href='../index.php';</script>";
    }
}
