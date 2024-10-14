
<?php 

require_once "Controllers/Controller.php";
$Controller = new Controller();
// Xu li
// tra phong
if(isset($_POST['trap']))
	$Controller->doTraP();
// dk phong
if(isset($_POST['dangkyphong'])){
	$Controller->DKPhong();
}
if(isset($_POST['dangkychuyenphong'])){
	$Controller->DKChuyenPhong();
}
if(isset($_POST['sv_capnhaptt'])){
	$Controller->capnhattt();
  }

if(isset($_GET['tb'])){
	$tb = $_GET['tb'];
	switch ($tb) {
		case 'ok':
			 echo '<script>alert("success!!!")</script>';
			break;
		case 'loi':
			 echo '<script>alert("Lỗi!!!")</script>';
			break;	
		case 'ok1':
			 echo '<script>alert("Đăng ký thành công. Nhân viên sẽ thông báo sau!!!")</script>';
			break;
		case 'ok2':
			 echo '<script>alert("Đăng ký trả phòng thành công. Nhân viên sẽ kiểm tra và thông báo sau!!!")</script>';
			break;	
		case 'loi1':
			 echo '<script>alert("Vui lòng trả phòng đang ở trước khi đăng ký... Nếu bạn đã đăng ký trước đó vui lòng đợi, nhân viên sẽ thông báo sau !!!")</script>';
			break;
			
		case 'loi2':
			 echo '<script>alert("Lỗi!!!")</script>';
			break;
		case 'loi3':
				$sn=$_GET['sn'];
			 echo '<script>alert("Phòng ('.$sn.' người) đã hết. Vui lòng chọn phòng khác !!!")</script>';
			break;									
		default:
		 
		break;
}
}
// controller

	if(isset($_GET['action'])){
		$action = $_GET['action'];
		switch ($action) {
			case 'login':
			    include_once('Template/login.php');
				break;
			case 'capnhapthongtin':
			    $Controller->capnhatthongtin();
				break;
			case 'dkphong':
			    $Controller->dangkyphong();
				break;
			case 'dangkychuyenphong':
			    $Controller->dangkychuyenphong();
				break;
			case 'traphong':
			    $Controller->traphong();
				break;
			case 'tracucphong':
			    include_once('Template/tracuuphong.php');
				break;
			case 'phongdango':
			    $Controller->phongdango();
				break;
			case 'xemthongbao':
			    $Controller->xemthongbao();
				break;
			case 'logout':
			    include_once('Template/logout.php');
				break;
			default:
				$Controller->getPageHome();
				break;
		}
	}
	else
	{
		include_once('Template/main.php');
	}
	
	
?>