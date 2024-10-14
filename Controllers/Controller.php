<?php
require_once "Models/Model.php";
require_once "Views/View.php";

class Controller
{
    var $model, $view;
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }
    public function dologin()
    {
        $this->model->dologin();
    }
    public function getPageHome(){
        $this->view->getPageHome();
    }
    public function capnhatthongtin(){
        $row = $this->model->kiemtra();
        $this->view->capnhatthongtin($row);
    }
    public function dangkyphong(){
        $row = $this->model->kiemtra();
        $this->view->dangkyphong($row);
    }
    public function dangkychuyenphong(){
        $row = $this->model->kiemtra();
        $row2 = $this->model->kiemtra2();
        $this->view->dangkychuyenphong($row, $row2);
    }
    public function traphong(){
        $row = $this->model->kiemtra();
        $row2 = $this->model->kiemtra2();
        $this->view->traphong($row, $row2);
    }
    public function xemthongbao()
    {
        $row = $this->model->kiemtra();
        $rs2 = $this->model->kiemtrathongbao();
        $this->view->xemthongbao($row, $rs2);
    }
    public function phongdango()
    {
        $row = $this->model->kiemtra();
        $row12 = $this->model->phongdango2();
        $row23 = $this->model->phongdango3();
        $row123 = $this->model->phongdango4();
        $this->view->phongdango($row, $row12, $row23, $row123);
    }
    public function doTraP()
    {
        $this->model->doTraP();
    }
    public function DKPhong()
    {
        $this->model->DKPhong();
    }
    public function DKChuyenPhong()
    {
        $this->model->DKChuyenPhong();
    }
    public function capnhattt()
    {
        $this->model->capnhattt();
    }
    public function getPageAdmin()
    {
        $this->view->getPageAdmin();
    }
}
?>