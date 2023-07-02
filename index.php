<?php 
$tanggal=date("Y");
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="tema/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="tema/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="pic03.jpg" alt="" /></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
          }else if($_GET['alert'] == "logout"){
            echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
          }else if($_GET['alert'] == "belum_login"){
            echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
          }
        }
        ?>
							</div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">BIBIT NANAS</h1>
                                    </div>
                                    <form class="user" method="post" action="periksa_login.php">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                placeholder="Enter username">
                                        </div>
                                        <input  type="hidden"   name="sebagai" value="administrator"/>
                                        <div class="form-group">
                                            <input type="password"  name="password"  class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>

                                        <input type="submit" value="login"  class="btn btn-primary btn-user btn-block">
                                       
                                    </form>
                                    <hr>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="tema/vendor/jquery/jquery.min.js"></script>
    <script src="tema/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="tema/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="tema/js/sb-admin-2.min.js"></script>

</body>

</html>