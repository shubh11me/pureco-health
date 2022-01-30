<!DOCTYPE html>
<html>

<head>
	<title>Table</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="table.css" />
</head>
<?php
include './process/nav.php';
include './process/conn.php';
?>





<div class="inner-layer">
	<form method="get">
		<h2>Please Enter Your Phone Number to check your appointment status</h2>
		<div class="row form-row">
			<label style="font-weight:bolder;font-size:xx-large;color:#fff;" for="num">Enter your phone number</label>
			<input type="number" id="num" name="phone" required class="form-control" placeholder="Enter Your Number">
		</div>
		<div class="row">
			<button type="submit" class="btn btn-lg btn-primary">Check Status</button>
		</div>
	</form>
	<?php

	if (isset($_GET['phone'])) {

		if ($_GET['phone'] != "" && $_GET['phone'] != null) {
			$phone = $_GET['phone'];
			$i = 1;
			// echo "SELECT * FROM appointments,tests WHERE mob_no='$phone' AND tests.test_id=appointments.test";
			$res = mysqli_query($conn, "SELECT * FROM appointments,tests WHERE mob_no='$phone' AND tests.test_id=appointments.test")

	?>
			<h2>Check Status</h2>

			<table class="table">
				<thead>

					<tr>
						<th>Sr No</th>
						<th>Name</th>
						<th>Email</th>
						<th>City</th>
						<th>Test Name</th>
						<th>Payment Status</th>
						<th>complete Payment</th>

					</tr>
				</thead>
				<tbody>

					<?php
					if (mysqli_num_rows($res) > 0) {
						# code...

						while ($row_apts = mysqli_fetch_assoc($res)) {
							# code...
					?>
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $row_apts['name'] ?></td>
								<td><?php echo $row_apts['email'] ?></td>
								<td><?php echo $row_apts['city'] ?></td>
								<td><?php echo $row_apts['test_name'] ?></td>
								<td><?php echo $row_apts['payment_status'] == 1 ? "completed" : "Pending" ?></td>
								<td><?php echo $row_apts['payment_status'] == 1 ? "completed" : "<a href='payment.php?apt_id=".$row_apts['appointment_id']."'>Click Here To PAY </a>" ?></td>
							</tr>

					<?php
							$i++;
						}
					}
					?>

				</tbody>
			</table>
	<?php
		}
	}

	?>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>

</body>

</html>