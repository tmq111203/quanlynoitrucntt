<h1 style="font-size: 2.5rem; text-align: center;"> Trang nội trú Đại Học Công Nghệ Thông Tin và Truyền Thông </h1>
<?php if (isset($_SESSION['sv_login'])) {
		$vs=$_SESSION['sv_login'];
		echo "<h6>Xin chào sinh viên : ".$vs['HoTen']."</h6>";
} ?>