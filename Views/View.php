<?php
class View
{
    public function getPageHome()
    {
        include_once "Template/home.php";
    }
    public function capnhatthongtin($row)
    {
        include_once('Template/capnhapthongtin.php');
    }
    public function dangkyphong($row)
    {
        include_once('Template/dangkyphong.php');
    }
    public function dangkychuyenphong($row, $row2)
    {
        include_once('Template/dangkychuyenphong.php');
    }
    public function traphong($row, $row2)
    {
        include_once('Template/traphong.php');
    }
    public function xemthongbao($row, $rs2)
    {
        include_once('Template/thongbao.php');
    }
    public function phongdango($row, $row12, $row23, $row123)
    {
        include_once('Template/phongdango.php');
    }
    public function getPageAdmin()
    {
        //include_once('QTV/admin/login.php');
    }
}
?>