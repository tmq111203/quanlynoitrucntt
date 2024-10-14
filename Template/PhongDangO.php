<?php 
?> 
    <div class="cart">
      <div class="col-sm-12  mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
          <h5 class="card-title text-center">Thông tin phòng đang ở</h5><hr>

           <form class="col-md-12 m-auto" action="" method="">
              <div class="form-row m-auto">
                <div class="form-group col-sm-2"></div>
                 <div class="form-group col-sm-4">
                    <label for="masv">Mã sinh viên</label>
                    <input type="text" class="form-control" id="masv" value="<?php echo $row['MaSV'] ?>" disabled>
                 </div>
                 <div class="form-group col-sm-4">
                    <label for="hoten">Họ và tên</label>
                    <input type="text" class="form-control" id="hoten" value="<?php echo $row['HoTen'] ?>" disabled>
                 </div>
              </div>
              <div class="form-row"><div class="form-group col-sm-2"></div>
                 <div class="form-group col-sm-4">
                    <label for="masv">Phòng</label>
                    <input type="text" class="form-control" id="masv" value="<?php if(isset($row12['MaPhong'])) echo $row12['MaPhong']; else echo "Bạn chưa đăng ký phòng!"; ?>" disabled>
                 </div>
                 <div class="form-group col-sm-4">
                    <label for="hoten">Khu</label>
                    <input type="text" class="form-control" id="hoten" value="<?php if(isset($row12['MaKhu'])) echo $row12['MaKhu']; else echo "Bạn chưa đăng ký phòng!"; ?>" disabled>
                 </div>
              </div><hr>
                  
              <div class="form-group">
                <hr> <h6>Sinh viên trong phòng </h6>
                <table class="table text-center badge-light table-hover">
                  <thead class="badge-info">
                    <tr>
                      <th>#</th><th>Họ và tên</th><th>Số điện thoại</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i=0;
                  $conn = mysqli_connect("localhost", "root","","qlktx");
                  mysqli_set_charset($conn, "utf8");
                  $this->conn = $conn;
                  $sv=$_SESSION['sv_login'];
                  $masv=$sv['MaSV'];
                  $sql="select * from chitietdangky where MaSV=$masv";
                  $rs=mysqli_query($this->conn,$sql);
                  $row=mysqli_fetch_array($rs);
                  if(isset($row['MaPhong'])) $mapp=$row['MaPhong']; else $mapp="Bạn chưa đăng ký phòng!";
                  $sql23="select MaSV from chitietdangky where MaPhong ='$mapp'";
                  $rs23=mysqli_query($this->conn,$sql23);
                   while ($row23=mysqli_fetch_array($rs23)) {
                    
                        $masv1=$row23['MaSV'];
                        $sql="select * from sinhvien where MaSV=$masv1";
                        $rs=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_array($rs);
                    ?>
                      <tr>
                       <td><?php echo $i+1;$i=$i+1; ?> </td><td> <?php echo $row['HoTen'] ?> </td><td><?php echo $row['SDT'] ?></td>
                    </tr>
                    
                 <?php   } ?>
                    
                  </tbody>
                </table>
              </div><hr><br>

              <div class="form-group">
                <hr class="badge-danger"> <h6>Tiền điện nước của phòng </h6>
                <table class="table text-center badge-light table-hover">
                  <thead class="badge-info">
                    <tr>
                      <th>Tháng</th><th>Tiền Điện</th><th>Tiền Nước</th><th>Tổng Tiền</th><th>Tình Trạng</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                   while ($row123) {
                        
                    ?>
                      <tr >
                       <td><?php echo $row123['Thang']; ?> </td><td> <?php echo number_format($row123['TienDien']).' đ' ?> </td><td><?php echo number_format($row123['TienNuoc']).' đ' ?></td>
                       <td><?php echo number_format(($row123['TienNuoc']+$row123['TienDien'])).' đ' ?></td>
                       <td><?php if($row123['TinhTrang']=='chưa thu'){echo '<span class="text-danger"> Chưa Nộp</span>';}
                       else{ echo 'Đã Nộp';} ?></td>
                    </tr>
                    
                 <?php   } ?>
                    
                  </tbody>
                </table>
              </div><hr>
            
           </form></div>
         </div>
       </div>
     </div>
<?php ?>