<!DOCTYPE html>
<html>
<head>
  <script src="/shoponi/jquery/jquery.js"></script>
  <script src="/shoponi/view/bootstrap4/js/bootstrap.js"> </script>
  <title>Trang Dang Nhap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style type="text/css">
    body {

    }
    .wrapper-login {
      width: 25%;
      margin: 0 auto;
    }
    .p1 {
      width: 55%;
      margin: 0 auto;

    }
    .a1 {
      text-decoration: none;
    }
  </style>
</head>
<body>
  
   <form style="margin-left: 35%; margin-right: 35%; margin-top: 8%;" action=""> 
    <h4 style="text-align: center;">ĐĂNG NHẬP ADMIN</h4>
     <!-- Email input -->
  <div class="form-outline mb-4">
    <input name="email" type="text" class="form-control" />
    <label class="form-label" for="form2Example1">Tài khoản</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input name="pass" type="password" class="form-control" />
    <label class="form-label" for="form2Example2">Mật khẩu</label>
  </div>

  <!-- Submit button -->
  <button type="submit" name="login" class="btn btn-primary btn-block mb-4">Đăng nhập</button>
   </form> 
   
<?php
 include_once('../config/database.php');
  @session_start();
   // check đăng nhập
  if (isset($_SESSION['nv_admin'])) {
     header('location:index.php');
  }
  if(isset($_GET['login'])){
    $email=$_GET['email'];
    $matkhau=$_GET['pass'];
    $sql_dangnhap="select * from NhanVien where  MaNV ='$email' and MatKhau='$matkhau'";
    $run_dangnhap=mysqli_query($conn,$sql_dangnhap);
    $dangnhap=mysqli_fetch_array($run_dangnhap);
    $count_dangnhap=mysqli_num_rows($run_dangnhap);
    if($count_dangnhap==0){
      echo '<script>alert("Sai tài khoản hoặc mật khẩu ! Xin mời nhập lại .")</script>';
    }else{
      $_SESSION['nv_admin']=$dangnhap;
      
                      
      header('location:index.php');
      
    }
                
  }
?>
</body>
</html>