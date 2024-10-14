<?php
class Model
{
    public function __construct()
    {
        $conn = mysqli_connect("localhost", "root","","qlktx");
        mysqli_set_charset($conn, "utf8");
        $this->conn = $conn;
    }
    public function doLoginAdmin()
    {
        $email=$_GET['MaNV'];
        $matkhau=$_GET['MatKhau'];
        $sql_dangnhap="select * from NhanVien where MaNV ='$email' and MatKhau='$matkhau'";
        $run_dangnhap=mysqli_query($this->conn,$sql_dangnhap);
        $dangnhap=mysqli_fetch_array($run_dangnhap);
        $count_dangnhap=mysqli_num_rows($run_dangnhap);
        if($count_dangnhap==0){
            echo '<script>alert("Sai tài khoản hoặc mật khẩu ! Xin mời nhập lại .")</script>';
        }else{
            $_SESSION['nv_admin']=$dangnhap;
      
                      
            header('location:index.php');
      
        }
    }
}
?>