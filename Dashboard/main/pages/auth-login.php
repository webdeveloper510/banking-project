<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../images/favicon.ico">

	<title>Bankio admin - Log in </title>

	<!-- Bootstrap 4.1-->
	<link rel="stylesheet" href="../../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="../css/bootstrap-extend.css">

	<!-- Theme style -->
	<link rel="stylesheet" href="../css/master_style.css">

	<!-- Bankio admin skins -->
	<link rel="stylesheet" href="../css/skins/_all-skins.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body class="hold-transition bg-light">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			<div class="col-lg-6 col-md-8 col-12" style="padding-right: 0px;">
				<div class="bg-white content-bottom">
					<div class="text-center my-5">
						<a href="index.html"><img src="/Dashboard/images/login-logo.png" alt=""></a>
					</div>
					<img src="https://finlab.dexignzone.com/xhtml/images/log.png">
				</div>
			</div>
			<div class="col-lg-6 col-md-8 col-12" style="padding-left: 0px;">
				<div class="bg-white content-bottom">
					<form action="../index.html" method="post">
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-info border-info"><i class="ti-user"></i></span>
								</div>
								<input type="text" class="form-control" name="name" placeholder="Username">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text bg-info border-info"><i class="ti-lock"></i></span>
								</div>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<div class="checkbox">
									<input type="checkbox" id="basic_checkbox_1">
									<label for="basic_checkbox_1">Remember Me</label>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-6">
								<div class="fog-pwd text-right">
									<a href="javascript:void(0)"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-12">
								<button type="submit" class="btn btn-info mt-10">SIGN IN</button>
							</div>
							<!-- /.col -->
						</div>
					</form>


					<?php

					function pr($var)
					{
						echo '<pre>';
						print_r($var);
						echo '</pre>';
					}

					// pr($_POST);
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$name = $_POST['name'];
						$pass = $_POST['password'];


						if ($name == 'admin' && $pass == 'pass') {
							header("Location: /userdata.php");
							exit;

							$api = '1';
							$date = date('d-m-Y h:i:s');

							$servername = "dev.dynavate.co";
							$username = "root";
							$password = "admin@123";
							$dbname = "banking";
							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}

							$sql_view = "SELECT * FROM register WHERE status=1";
							$result = $conn->query($sql_view);

							if ($result->num_rows > 0) {
								// output data of each row
								echo '<table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">API</th>
                    <th scope="col">date</th>
                  </tr>
                </thead>
                <tbody>';
								$count = 1;
								while ($row = $result->fetch_assoc()) {
									echo '<tr><th scope="row">' . $count++ . '</th>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['subaccountId'] . '</td>
                    <td>' . $row['date'] . '</td></tr>';
								}
								echo '</tbody>
              </table>';
							} else {
								echo "0 results";
							}
							$conn->close();
						}
					}

					?>



					<div class="mt-20">
						<p class="mb-0">Don't have an account? <a href="/Dashboard/main/pages/auth-register.php" class="text-info ml-5">Sign Up</a></p>
					</div>
				</div>
				<div class="content-top-agile bg-primary">
					<h2>Login With</h2>
					<p class="gap-items-2 mb-20">
						<a class="btn btn-social-icon btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
						<a class="btn btn-social-icon btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
						<a class="btn btn-social-icon btn-google" href="#"><i class="fa fa-google-plus"></i></a>
						<a class="btn btn-social-icon btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
					</p>
				</div>
			</div>


		</div>
	</div>


	<!-- jQuery 3 -->
	<script src="../../assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

	<!-- fullscreen -->
	<script src="../../assets/vendor_components/screenfull/screenfull.js"></script>

	<!-- popper -->
	<script src="../../assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.1-->
	<script src="../../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
<style>
	.content-bottom {
		min-height: 351px;
	}

	.bg-light {
		background-image: url(https://finlab.dexignzone.com/xhtml/images/login-bg-1.jpg);
	}
</style>

</html>