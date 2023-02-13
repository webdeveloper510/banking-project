<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../images/favicon.ico">
    <title>Bankio admin - Registration </title>

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

            <div class="col-lg-5 col-md-8 col-12">
                <div class="p-40 bg-white content-bottom">
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success border-success"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?= $_POST['name']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success border-success"><i class="ti-email"></i></span>
                                </div>
                                <!-- <input type="email" class="form-control" name="email" placeholder="Email"> -->
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $_POST['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success border-success"><i class="ti-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?= $_POST['password']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success border-success"><i class="ti-lock"></i></span>
                                </div>
                                <input type="password" class="form-control" name="rpassword" placeholder="Retype Password" value="<?= $_POST['rpassword']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="checkbox">
                                    <input type="checkbox" id="basic_checkbox_1">
                                    <label for="basic_checkbox_1">I agree to the <a href="#" class="text-success"><b>Terms</b></a></label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-success mt-10">SIGN IN</button>
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
                    function get_client_ip()
                    {
                        $ipaddress = '';
                        if (getenv('HTTP_CLIENT_IP'))
                            $ipaddress = getenv('HTTP_CLIENT_IP');
                        else if (getenv('HTTP_X_FORWARDED_FOR'))
                            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                        else if (getenv('HTTP_X_FORWARDED'))
                            $ipaddress = getenv('HTTP_X_FORWARDED');
                        else if (getenv('HTTP_FORWARDED_FOR'))
                            $ipaddress = getenv('HTTP_FORWARDED_FOR');
                        else if (getenv('HTTP_FORWARDED'))
                            $ipaddress = getenv('HTTP_FORWARDED');
                        else if (getenv('REMOTE_ADDR'))
                            $ipaddress = getenv('REMOTE_ADDR');
                        else
                            $ipaddress = 'UNKNOWN';
                        return $ipaddress;
                    }


                    pr($_POST);
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $pass = $_POST['password'];
                    $rpass = $_POST['rpassword'];
                    // $api = $_POST['api'];
                    $api = rand(1, 999);
                    $date = date('d-m-Y h:i:s');


                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "banking";
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $status = 1;

                    if ($pass == $rpass) {

                        $sql_insert = "INSERT INTO register (status, name, email, password,subaccountId,date)
                        VALUES ($status, '$name', '$email', '$pass',$api,'$date')";


                        if ($conn->query($sql_insert) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql_insert . "<br>" . $conn->error;
                        }
                        $sql_view = "SELECT * FROM register";
                        $result = $conn->query($sql_view);

                        /* if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo 'get';
                            }
                        } else {
                            echo "0 results";
                        } */
                        $conn->close();
                    } else {
                        echo 'please match the password';
                    }



                    ?>
                    <div class="mt-20">
                        <p class="mb-0">Already have an account?<a href="auth-login.html" class="text-danger ml-5"> Sign
                                In</a></p>
                    </div>
                </div>
                <div class="content-top-agile bg-primary">
                    <h2>Register a new membership</h2>
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

</html>