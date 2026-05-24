<?php session_start();

 require'include/header2.php';?>

<?php 

	
		if( isset($_POST['login']) ) {
				
				
				
				$mobile=($_POST['mobile']);
				$_SESSION['std_mobile']=$mobile;
				
				
				echo $check = "SELECT * FROM student WHERE st_mobile='$mobile'";
				$check_r = $conn->query($check);
				
				
					if($row=mysqli_fetch_array($check_r)){
						
						echo "<script type='text/javascript'> window.location.href='index.php' </script>";
		
					}
					else{
						echo $add=" insert into `student` (`st_mobile`) values ('$mobile')";
						$conn->query($add);
						echo "<script type='text/javascript'> window.location.href='index.php' </script>";
						
					}
		}
	
	?>




    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">چوونەژوورەوە</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form action="" method="post">
                   <div class="control-group">
					  <p class="text-muted text-center mb-4" style="font-size: 14px;font-weight: bold;">
        ژمارەی مۆبایل بە ووردی داخل بکە چونکە داواکاریەکانت لە ڕێگەی هەمان ژمارە پێدەگات
    </p>
		<p class="text-muted text-center mb-4" style="font-size: 14px;font-weight: bold;">
     سفری پێش ژمارەکە مەنووسە نموونە<span style="color: red; font-weight: bold;">7502486060</span>
</p>
					
	<div class="input-group mb-3">
		<span class="input-group-text">+964</span>
		<input type="text" class="form-control" id="mobile" name="mobile" placeholder="ژمارەی مۆبایل"
			required="required" pattern="\d{10}" data-validation-required-message="ژمارەی مۆبایل داخل بکە" />
	</div>
	<script>
		document.getElementById('mobile').oninput = function() {
			var mobileInput = document.getElementById('mobile');
    
			if (!mobileInput.value.match(/^\d{10}$/)) {
					mobileInput.setCustomValidity('تکایە 10 ژمارەی تەواو داخل بکە');
				} else {
				mobileInput.setCustomValidity(''); 
			}
				};
		</script>
					</div>
					
		
<p class="help-block text-danger"></p>
					

                        
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton" name="login">چوونەژوورەوە</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <iframe style="width: 100%; height: 250px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="bg-light p-30 mb-3">
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>100m Street, Hawler, Kurdistan</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@malzama.krd</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>+964 750 248 6060</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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