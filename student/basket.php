<?php require 'include/header.php';?>


    <!-- Breadcrumb Start -->
    
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" dir=rtl >
                    <thead class="thead-dark" style="align:center;text-align:right">
                        <tr>
                            <th>مەلزەمە</th>
                            <th>نرخ</th>
                            <th>ژمارە</th>
                            <th>کۆی گشتی</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" style="align:center;text-align:right">
                        <?php
						$check="select * from basket,malzama,teacher where malzama_teacher=teacher_id and malzama=malzama_id and  `mobile`='$mob'";
						$check_r=$conn->query($check);
						$sum=0;
						while($row=mysqli_fetch_array($check_r))
							
						{?>
						
						
						<tr>
                            <td style="font-size:9pt" class="align-middle"><img src="../image/malzama_image/<?php echo $row['malzama_image'];?>" alt="" style="width: 50px;"><br> <?php echo $row['malzama_title'];?>(<?php echo $row['teacher_name'];?>)</td>
                            <td class="align-middle"><?php echo $row['sell_price'];?></td>
                            <td class="align-middle">
							<form action="change_num.php" method="post" name="minus">
								<input type="hidden" name="basket_id" value="<?php echo $row['basket_id'];?>">
								<input type="hidden" name="number" value="<?php echo $row['number'];?>">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
					
                                        <button name="minus" class="btn btn-sm btn-primary btn-minus"onchange="this.form.submit()" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="number" name="new_num" disabled class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $row['number'];?>">
                                    <div class="input-group-btn">
                                        <button name="plus" class="btn btn-sm btn-primary btn-plus" onchange="this.form.submit()">
                                            <i class="fa fa-plus"></i>
                                        </button>
										
                                    </div>
                                </div>
							</form>
                            </td>
                            <td class="align-middle"><?php echo $total=$row['sell_price']*$row['number'];?></td>
                        </tr>
                      
                        <?php $sum+=$total;} ?>
						
						
						
						
						
                    </tbody>
                </table>
            </div>
           
		   <div class="col-lg-4">
               <tbody class="align-middle" style="text-align:right;">
    <?php
    $check = "SELECT * FROM `student`, `schools` WHERE `school_id` = `st_school_id` AND `st_mobile` = '$mob'";
    $check_r = $conn->query($check);
    $row = mysqli_fetch_array($check_r);
	
	$basket_mobile = $row['st_mobile'];
	$check_basket = "SELECT * FROM `basket` WHERE `mobile` = '$basket_mobile'";
	$check_basket_r = $conn -> query($check_basket);
	
	if(isset($_POST['submit']))
		{
			$n=$_POST['n'];
			$a=$_POST['a'];
			$m=$_POST['m'];
			$s=$_POST['s'];
			$conn->query("update `student` set `st_name`='$n',`st_address`='$a',`st_mobile2`='$m',`st_school_id`='$s' where `st_mobile`='$mob'");
			
			   echo "<script type='text/javascript'>window.location.href ='basket.php'</script>";
		}
	
	?>
    <form action="" method="post">
        <tr>
            <td style="font-size:9pt" class="align-middle">ناو</td>
            <td class="align-middle">
                <input type="text"id="name" name="n" value="<?php echo $row['st_name']; ?>" class="form-control">
            </td>
        </tr>
        
        <tr>
            <td style="font-size:9pt" class="align-middle">ناونیشان</td>
            <td class="align-middle">
                <input type="text" id="address" name="a" value="<?php echo $row['st_address']; ?>" class="form-control">
            </td>
        </tr>
        
        <tr>
            <td style="font-size:9pt" class="align-middle">ژمارە مۆبایلی دووەم</td>
            <td class="align-middle">
                <input type="number" name="m" value="<?php echo $row['st_mobile2']; ?>" class="form-control">
            </td>
        </tr>
        
        <tr>
            <td style="font-size:9pt" class="align-middle">قوتابخانە</td>
            <td class="align-middle">
                <select name="s" class="form-control">
                    <option value="<?php echo $st_id = $row['st_school_id']; ?>"><?php echo $row['school_name']; ?></option>
                    <?php
                    $s = "SELECT * FROM `schools` WHERE `school_id` != $st_id";
                    $s_r = $conn->query($s);
                    while ($s_row = mysqli_fetch_array($s_r)) {
                    ?>
                    <option value="<?php echo $s_row['school_id']; ?>"><?php echo $s_row['school_name']; ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        
        <tr>
            <td style="font-size:9pt" class="align-middle"></td>
            <td class="align-middle">
			<br>
                <input type="submit" name="submit" value="گۆڕین" class="btn btn-primary"> 
            </td>
        </tr>
    </form>
</tbody>

                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Summary</span></h5>
		<div class="bg-light p-30 mb-5">
			<div class="border-bottom pb-2">
				<div class="d-flex justify-content-between mb-3">
					<h6>نرخی مەلزەمە</h6>
					<h6><?php echo $sum; ?></h6>
				</div>
				
				<div class="d-flex justify-content-between">
				<h6 class="font-weight-medium">گەیاندن</h6>
				<h6 class="font-weight-medium">3000</h6>
				</div>
			</div>
			<div class="pt-2">
				<div class="d-flex justify-content-between mt-2">
					<h5>کۆی گشتی</h5>
					<h5><?php echo $sum + 3000; ?></h5>
					</div>
					<?php if($row['st_name'] == null || $row['st_address'] == null ) { ?>
				<a href="#" id="orderBtn" class="btn btn-block btn-secondary font-weight-bold my-3 py-3" >ناو و ناونیشانت داخل بکە </a>
					<?php }  else if(!$check_basket_r || $check_basket_r->num_rows == 0) { ?><a href="#" id="orderBtn" class="btn btn-block btn-secondary font-weight-bold my-3 py-3" > هیچ مەلزەمەیەک دیاری نەکراوە</a>
					<?php } else{ ?>
				<a href="ordering.php" id="orderBtn" class="btn btn-block btn-primary font-weight-bold my-3 py-3" >داواکردن</a>
					<?php } ?>

					
				</div>
		</div>

		   
		   
        </div>
    </div>
    <!-- Cart End -->


    <?php require'include/footer.php';?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>