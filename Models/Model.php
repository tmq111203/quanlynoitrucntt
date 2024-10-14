<?php
class Model
{
    public function __construct()
    {
        $conn = mysqli_connect("localhost", "root","","qlktx");
        mysqli_set_charset($conn, "utf8");
        $this->conn = $conn;
    }
    public function dologin()
    {
        $tk=$_POST['masv'];
        $mk=$_POST['pass'];
        $sql="select * from sinhvien where MaSV='$tk' and MatKhau='$mk'";
        $rs=mysqli_query($this->conn,$sql);
          $dem=mysqli_num_rows($rs);
          if($dem==0){
            echo '<script>alert("Sai tài khoản hoặc mật khẩu ! Xin mời nhập lại .")</script>';
          }else{
            $row=mysqli_fetch_array($rs);
            $_SESSION['sv_login']=$row;
    
            header('location:index.php');
          }
    }
    public function kiemtra()
    {
        if (isset($_SESSION['sv_login'])) {
            $sv=$_SESSION['sv_login'];
         $masv=$sv['MaSV'];
         $sql="select * from sinhvien where MaSV=$masv";
         $rs=mysqli_query($this->conn,$sql);
         $row=mysqli_fetch_array($rs);
         
         return $row;
       }
       else{
        header('location:index.php?action=login');
       }
    }
    public function kiemtra2()
    {
        if (isset($_SESSION['sv_login'])) {
            $sv=$_SESSION['sv_login'];
            $masv=$sv['MaSV'];
            $sql2="select * from chitietdangky where MaSV=$masv and NgayTraPhong is null";
            $rs2=mysqli_query($this->conn,$sql2);
            $row2=mysqli_fetch_array($rs2);
        return $row2;
        }
        else{
            header('location:index.php?action=login');
        }
    }
    public function kiemtrathongbao()
    {
        if (isset($_SESSION['sv_login'])) {
            $sv=$_SESSION['sv_login'];
            $masv=$sv['MaSV'];
            $sql="select * from sinhvien where MaSV=$masv";
            $rs=mysqli_query($this->conn,$sql);
            $row=mysqli_fetch_array($rs);
            $sql2="select * from thongbao where MaSV=$masv order by NgayTB DESC , MaTB DESC";
            $rs2=mysqli_query($this->conn,$sql2);
            return $rs2;
        }
    }
    
    public function phongdango1()
    {
        if (isset($_SESSION['sv_login'])) {
            $sv=$_SESSION['sv_login'];
         $masv=$sv['MaSV'];
         $sql="select * from chitietdangky where MaSV=$masv";
         $rs=mysqli_query($this->conn,$sql);
         $row=mysqli_fetch_array($rs);
         return $row;
        }
    }
    public function phongdango2()
    {
        if (isset($_SESSION['sv_login'])) 
        {
            $sv=$_SESSION['sv_login'];
            $masv=$sv['MaSV'];
            $sql="select * from chitietdangky where MaSV=$masv";
            $rs=mysqli_query($this->conn,$sql);
            $row=mysqli_fetch_array($rs);
            if(isset($row['MaPhong'])) $mapp=$row['MaPhong']; else $mapp="Bạn chưa đăng ký phòng!";
            $sql12="select * from Phong where MaPhong ='$mapp'";
            $rs12=mysqli_query($this->conn,$sql12);
            $row12=mysqli_fetch_array($rs12);
        return $row12;
        }
    }
    public function phongdango3()
    {
        if (isset($_SESSION['sv_login'])) {
            $sv=$_SESSION['sv_login'];
            $masv=$sv['MaSV'];
            $sql="select * from chitietdangky where MaSV=$masv";
            $rs=mysqli_query($this->conn,$sql);
            $row=mysqli_fetch_array($rs);
            if(isset($row['MaPhong'])) $mapp=$row['MaPhong']; else $mapp="Bạn chưa đăng ký phòng!";
            $sql23="select MaSV from chitietdangky where MaPhong ='$mapp'";
            $rs23=mysqli_query($this->conn,$sql23);
            $row23=mysqli_fetch_array($rs23);
            
        return $row23;
        }
    }
    public function phongdango4()
    {
        if (isset($_SESSION['sv_login'])) {
            if(isset($row['MaPhong'])) $mapp=$row['MaPhong']; else $mapp="Bạn chưa đăng ký phòng!";
            $sql123="select * from hoadondiennuoc where MaPhong ='$mapp'";
            $rs123=mysqli_query($this->conn,$sql123);
            $row123=mysqli_fetch_array($rs123);
        return $row123;
        }
    }
    public function doTraP()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
	    $date=getdate(); $ngay=$date['year']."-".$date['mon']."-".($date['mday']);
	    $masv=$_POST['masv'];
	    $sql="select * from chitietdangky where MaSV='$masv' and NgayTraPhong is null and TinhTrang='đã duyệt'";
	    $rs=mysqli_query($this->conn,$sql);
	    $dem=mysqli_num_rows($rs);
	    $row=mysqli_fetch_array($rs);
	    $madk=$row['MaDK'];
	    if($dem==1){
		    $sql="update chitietdangky set NgayTraPhong ='$ngay', TinhTrang=N'chưa duyệt' where MaDK='$madk'";
		    $rs=mysqli_query($this->conn,$sql);
		    if(isset($rs)){
			    header('location:./index.php?action=&tb=ok2');
		    }
		    else{
			    header('location:./index.php?action=&tb=loi2');
		    }
	    }else{
			    header('location:./index.php?action=&tb=loi2');
		}   	
    }
    public function DKPhong()
    {
        $masv=$_POST["masv"];
//check sinh viên đã đăng ký chưa.
	$sql="select MaSV from chitietdangky where MaSV=$masv   and ((NgayTraPhong is not null and TinhTrang='chưa duyệt') or (NgayTraPhong is null and (TinhTrang='đã duyệt'or TinhTrang='chưa duyệt')))";
	$rs=mysqli_query($this->conn,$sql);
    $dem=mysqli_num_rows($rs);

    if($dem ==0 ){	
    	$masv=$_POST["masv"]; 
		$sno=$_POST['sno'];
//check giới tính để tìm khu theo giới tính 
		$sql="select * from sinhvien where MaSV=$masv";
	    $rs=mysqli_query($this->conn,$sql);
	    $row=mysqli_fetch_array($rs); 
	    if($row['GioiTinh']==='Nam'){
//tìm khu theo giới tính Nam
	    	$sql1="select MaKhu from Khu where Sex='Nam'";
	    	$rs1=mysqli_query($this->conn,$sql1); $loi=0;
	    	while ($row1=mysqli_fetch_array($rs1)) {
	    		$makhu=$row1['MaKhu'];
      			echo $makhu;
      			// Tìm phòng cho sinh viên   	
				$sql2="SELECT  MaPhong  from Phong where MaKhu = '$makhu' and SoNguoiToiDa = $sno and (SoNguoiHienTai<SoNguoiToiDa ) ORDER BY SoNguoiHienTai DESC LIMIT 1";
				$rs2=mysqli_query($this->conn,$sql2);
		    	$row2=mysqli_fetch_array($rs2);
		    	$dem2=mysqli_num_rows($rs2);
		    	if($dem2 >= 1){
		    		$map=$row2['MaPhong'];
			    	echo $map;
// thêm sinh viên vào phòng
			    	$sql3="INSERT INTO `chitietdangky`(`MaSV`, `MaPhong`, `TinhTrang`) VALUES ($masv,'$map',N'chưa duyệt')";
			    	$rs3=mysqli_query($this->conn,$sql3);
			    	if($rs3){
						$sql4="UPDATE  `Phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map'";
			    		$rs4=mysqli_query($this->conn,$sql4);
			    		break;
			    		
			    	}
			    	else{$loi=1;}
		    	}
		    	
	    	}
	    	if($loi==1){
		    		header('location:./index.php?action=&tb=loi3&sn='.$sno);
		    	}
		    	else{header('location:./index.php?action=&tb=ok1');}
	    	

			
	    }elseif ($row['GioiTinh']==='Nu') {
//tìm khu theo giới tính Nữ
	    	$sql1="select MaKhu from Khu where Sex='Nu'";
	    	$rs1=mysqli_query($this->conn,$sql1); $loi=0;
	    	while ($row1=mysqli_fetch_array($rs1)) {
	    		$makhu=$row1['MaKhu'];
      			echo $makhu;
      			// Tìm phòng cho sinh viên   	
				$sql2="SELECT  MaPhong  from Phong where MaKhu = '$makhu' and SoNguoiToiDa = $sno and (SoNguoiHienTai<SoNguoiToiDa ) ORDER BY SoNguoiHienTai DESC LIMIT 1";
				$rs2=mysqli_query($this->conn,$sql2);
		    	$row2=mysqli_fetch_array($rs2);
		    	$dem2=mysqli_num_rows($rs2);
		    	if($dem2 >= 1){
		    		$map=$row2['MaPhong'];
			    	echo $map;
// thêm sinh viên vào phòng
			    	$sql3="INSERT INTO `chitietdangky`(`MaSV`, `MaPhong`, `TinhTrang`) VALUES ($masv,'$map',N'chưa duyệt')";
			    	$rs3=mysqli_query($this->conn,$sql3);
			    	if($rs3){
						$sql4="UPDATE  `Phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map'";
			    		$rs4=mysqli_query($this->conn,$sql4);
			    		break;
			    		
			    	}
			    	else{$loi=1;}
		    	}
		    	
	    	}
	    	if($loi==1){
		    		header('location:./index.php?action=&tb=loi3&sn='.$sno);
		    	}
		    	else{header('location:./index.php?action=&tb=ok1');}
	    	
	    }

    }   
    else {
	header('location:./index.php?action=&tb=loi1');
    }
    }
    public function DKChuyenPhong()
    {
        $masv=$_POST["masv"];
	$sql1="select MaSV,MaDK,MaPhong from chitietdangky where MaSV=$masv and (MaNV is not null and NgayDangKy is not null and TinhTrang='đã duyệt' and NgayTraPhong is null)";
	$rs1=mysqli_query($this->conn,$sql1);
	$row=mysqli_fetch_array($rs1);
	$madk=$row['MaDK'];
    $sql="select * from chitietchuyenphong where MaSV=$masv and  TinhTrang='đã duyệt' or TinhTrang is NULL";
	$rs=mysqli_query($this->conn,$sql);
  	$dem=mysqli_num_rows($rs);
  	$map1=$row['MaPhong'];
    if($dem>0){
		$masv=$_POST["masv"];
		$sno=$_POST['sno'];
		$lydo=$_POST['lydo'];
		$pdo=$_POST['phongdo'];
//check giới tính để tìm khu theo giới tính 
		$sql="select * from sinhvien where MaSV=$masv";
	    $rs=mysqli_query($this->conn,$sql);
	    $row=mysqli_fetch_array($rs);
	    if($row['GioiTinh']==='Nam'){
//tìm khu theo giới tính Nam
	    	$sql1="select MaKhu from Khu where Sex='Nam'";
	    	$rs1=mysqli_query($this->conn,$sql1);
	    	$row1=mysqli_fetch_array($rs1);
	    	$makhu=$row1['MaKhu'];
//      	echo $makhu;
// Tìm phòng cho sinh viên   	
			$sql2="SELECT  MaPhong  from Phong where MaKhu = '$makhu' and MaPhong !='$pdo' and SoNguoiToiDa = $sno and (SoNguoiHienTai<SoNguoiToiDa ) ORDER BY SoNguoiHienTai DESC LIMIT 1";
			$rs2=mysqli_query($this->conn,$sql2);
	    	$row2=mysqli_fetch_array($rs2);
	    
	    	$map=$row2['MaPhong'];
// thêm sinh viên vào phòng và update số người trong phòng
	    	$sql3="UPDATE chitietchuyenphong set MaPhongO='$map1', MaPhongChuyen='$map',Lydo='$lydo', TinhTrang=N'chưa duyệt', NgayDangKy='$ngay', LanChuyen=(LanChuyen+1) where MaDK='$madk'";
	    	$rs3=mysqli_query($this->conn,$sql3);
	    	if($rs3){
	    		$sql4="UPDATE  `Phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map'";
	    		$rs4=mysqli_query($this->conn,$sql4);
	    		header('location:../index.php?action=&tb=ok1');
	    	}
	    }elseif ($row['GioiTinh']==='Nu') {
//tìm khu theo giới tính Nữ
	    	$sql1="select MaKhu from Khu where Sex='Nu'";
	    	$rs1=mysqli_query($this->conn,$sql1);
	    	$row1=mysqli_fetch_array($rs1);
	    	$makhu=$row1['MaKhu'];
       	echo $makhu;
// Tìm phòng cho sinh viên   	
			$sql2="SELECT  MaPhong  from Phong where MaKhu = '$makhu'  and MaPhong !='$pdo' and SoNguoiToiDa = $sno and (SoNguoiHienTai<SoNguoiToiDa ) ORDER BY SoNguoiHienTai DESC LIMIT 1";
			$rs2=mysqli_query($this->conn,$sql2);
	    	$row2=mysqli_fetch_array($rs2);
	    	
	    	$map=$row2['MaPhong'];
// thêm sinh viên vào phòng và update số người trong phòng
	    	$sql3="UPDATE chitietchuyenphong set MaPhongO='$map1', MaPhongChuyen='$map',Lydo='$lydo', TinhTrang=N'chưa duyệt', NgayDangKy='$ngay', LanChuyen=(LanChuyen+1) where MaDK='$madk'";
	    	$rs3=mysqli_query($this->conn,$sql3);
	    	if($rs3){
				$sql4="UPDATE  `Phong` set `SoNguoiHienTai`=(`SoNguoiHienTai`+1) where MaPhong='$map' ";
	    		$rs4=mysqli_query($this->conn,$sql4);
	    		header('location:./index.php?action=&tb=ok1');
	    	}
	    }

    }   
    else {
	    header('location:./index.php?action=&tb=loi');
    }
    }
    public function capnhattt()
    {
        $masv=$_POST['masv'] ;
        $ns=$_POST['ns'];
        $dc=$_POST['dc'];
        $sdt=$_POST['sdt'];
        if(isset($_POST['pass'])){
            $sql="UPDATE `sinhvien` SET NgaySinh='$ns',DiaChi='$dc',SDT=$sdt where MaSV=$masv";
            $rs=mysqli_query($this->conn,$sql);
            if($rs){
            header('location:./index.php?action=capnhapthongtin&tb=ok');
    
            }else{
            header('location:index.php?action=capnhapthongtin&tb=loi');
            }
        }
    }

}
?>