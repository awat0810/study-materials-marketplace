<?php require 'include/header.php';
if(isset($_POST['submit']))
{
	$n=$_POST['n'];
	$a=$_POST['a'];
	$m=$_POST['m'];
	$s=$_POST['s'];
	$conn->query("update `student` set `st_name`='$n',`st_address`='$a',`st_mobile2`='$m',`st_school_id`='$s' where `st_mobile`='$mob'");
}

?>


    <!-- Breadcrumb Start -->
    
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0" dir=rtl >
                    <thead class="thead-dark" style="align:center;text-align:right">
                        <tr>
                            <th>ژمارەی مۆبایل</th>
                            <th>0<?php echo $mob;?></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" style="align:center;text-align:right">
                        <?php
						$check="select * from `student`,`schools` where `school_id`=`st_school_id` and `st_mobile`='$mob'";
						$check_r=$conn->query($check);
						$row=mysqli_fetch_array($check_r);?>
						
						<form action="" method="post">
						<tr>
                            <td style="font-size:9pt" class="align-middle">ناو</td>
                            <td class="align-middle"><input type="text" name="n" value="<?php echo $row['st_name'];?>"></td>
                        
                        </tr>
						<tr>
                            <td style="font-size:9pt" class="align-middle">ناونیشان</td>
                            <td class="align-middle"><input type="text" name="a" value="<?php echo $row['st_address'];?>"></td>
                        
                        </tr>
						<tr>
                            <td style="font-size:9pt" class="align-middle">ژمارە مۆبایلی دووەم</td>
                            <td class="align-middle"><input type="number" name="m" value="<?php echo $row['st_mobile2'];?>"></td>
                        
                        </tr>
						<tr>
                            <td style="font-size:9pt" class="align-middle">قوتابخانە</td>
                            <td class="align-middle">
								<select name="s">
									<option value="<?php echo $st_id=$row['st_school_id'];?>"><?php echo $row['school_name'];?></option>
									<?php
									$s="select * from `schools` where `school_id`!=$st_id";
									$s_r=$conn->query($s);
									while($s_row=mysqli_fetch_array($s_r)){
									?>
									<option value="<?php echo $s_row['school_id'];?>"><?php echo $s_row['school_name'];?></option>
									<?php } ?>
								</select>
							</td>
                        
                        </tr>
						<tr>
                            <td style="font-size:9pt" class="align-middle"></td>
                            <td class="align-middle"><input type="submit" name="submit" value="گۆڕین"></td>
                        
                        </tr>
                      </form>
                       
						
						
					
						
						
                    </tbody>
                </table>
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