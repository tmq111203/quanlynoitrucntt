 <?php 
//?>
    <div class="cart">
      <div class="col-sm-12  mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
          <h5 class="card-title text-center">Trả Phòng KÝ TÚC XÁ</h5><hr>
            <form class="col-md-12 m-auto" action="" method="POST">
              <div class="form-row">
                 <div class="form-group col-sm-4">
                    <label for="masv">Mã sinh viên</label>
                    <label class="form-control" > <?php echo $row['MaSV']; ?></label>
                    <input hidden name="masv" value="<?php echo $row['MaSV'] ?>">
                 </div>
                 <div class="form-group col-sm-4">
                    <label for="hoten">Họ và tên</label>
                    <label class="form-control" ><?php echo $row['HoTen']; ?> </label>
                 </div>
                  <div class="form-group col-sm-4">
                    <label for="phong">Phòng Đang Ở</label>
                    <label class="form-control"><?php if(isset($row2['MaPhong'])) echo $row2['MaPhong']; else echo "Bạn chưa đăng ký phòng!"; ?></label>
                 </div> 
               </div>

               <div class="form-group">
                
                 <label> <span style="color: red;font-size: 25px;">*</span>Lưu ý : Bạn sẽ không được nhận lại tiền dư khi trả phòng trước thời hạn. Nhân viên ký túc xá sẽ kiểm tra lại tài sản trước khi cho bạn trả phòng. Hệ thống sẽ gửi thông báo sau !</label>
              </div>
        <hr>
              <button type="submit" name="trap" class="btn btn-lg btn-primary btn-block text-uppercase ">Trả Phòng</button>
           </form></div>
         </div>
       </div>
     </div>
<?php ?>