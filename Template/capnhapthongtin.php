  <?php 
  ?>
  <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Website Quản Lý Nội Trụ - ĐH-CNTT&TT</title>
	<link rel="stylesheet" href="Template/bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="Template/css.css">
    <script src="jquery/jquery.js"></script>
    <script src="bootstrap4/js/bootstrap.js"> </script>
	

</head>
<body>
	<?php 
	  ob_start();
		//include_once('config/database.php');
		include_once('include/header.php');
		include_once('include/main.php');
	?>
</body>
    <div class="cart">
      <div class="col-sm-10  mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Cập nhập thông tin cá nhân</h5>
            <form class="form-signin" action="" method="POST">
              <div class="form-label-group">
                <span>Mã sinh viên </span>
                <input type="text" id="inputText" class="form-control"  value="<?php echo $row['MaSV'] ?>"  disabled >
                <input hidden id="inputText" class="form-control" name="masv" value="<?php echo $row['MaSV'] ?>"  >
              </div>
              <hr>
              <span>Họ và tên </span>
              <div class="form-label-group">
              <input type="text" id="inputText" class="form-control" placeholder="Họ và Tên" value="<?php echo $row['HoTen'] ?>" disabled required >
              </div>
              <hr>
              <span>Giới Tính </span>
              <div class="form-label-group">
              <input type="text" id="inputText" class="form-control" placeholder="Họ và Tên" value="<?php echo $row['GioiTinh']?>" disabled required >
              </div>
              <hr>
              <span>Ngày sinh </span>
              <div class="form-label-group">
                <input type="date" name="ns" max="3000-12-31" min="1000-01-01" class="form-control" value="<?php echo $row['NgaySinh']?>">
              </div>
              <hr>
              <span>Quê quán </span>
              <div class="form-label-group">
                <input type="text" id="inputText" class="form-control" name="dc" value="<?php echo $row['DiaChi']?>" required  >
              </div>
              <hr>
             
              <span>Số điện thoại </span>
              <div class="form-label-group">
                <input type="text" id="inputText" class="form-control" name="sdt" value="<?php echo $row['SDT']?>" required  >
              </div>
              <hr>
              <span>Password </span>
              <div class="form-label-group">
                <input type="password"  class="form-control" name="pass" placeholder="Password" >
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
              </div>
                <button class="" name ="capnhat" type="submit">Cập Nhập</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php 
      
    
    
//định dạng ngày
//      $date=date_create($ns);
//     echo date_format($date,"d/m/Y ");
    ?>

</html>
