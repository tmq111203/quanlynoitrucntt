
    <div class="cart">
      <div class="col-sm-9  mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="" method="POST">
              <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" placeholder="Mã sinh viên" name="masv" required autofocus>
              </div>
              <br>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
              </div><br>
              <input class="btn btn-lg btn-primary btn-block text-uppercase" name="dangnhap" type="submit" value=" Sign in">
              <hr class="my-4">
              <p class="p1" style="text-align: right;"><a class="a1" name="goadmin" href="http://localhost/QLNoitru/QTV/admin"> Tới website quản trị!</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php 
  //xử lý login
  #code...
  if (isset($_SESSION['sv_login'])) {
     header('location:index.php');
  }
  
?>