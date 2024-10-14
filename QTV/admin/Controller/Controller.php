<?php
require_once "Model/Model.php";
require_once "View/View.php";

class Controller
{
    var $model, $view;
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model();
    }
    public function doLoginAdmin()
    {
        $this->model->doLoginAdmin();
    }
}
?>