

<?php require 'include/header.php';?>




    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
				
                
                <!-- Color Start -->
				<h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">قۆناغ</span></h5>
                <div class="bg-light p-4 mb-30">
                    <?php 
					$stages="select * from `stages`";
					$stages_r=$conn->query($stages);
					while($row_stages=mysqli_fetch_array($stages_r))
					{
						$stage_color="#F1F2F7";
						if((isset($_GET['stage_id']))&&($_GET['stage_id']==$row_stages['stage_id'])) $stage_color="#BDC1E0";
					?>
						<a href="malzama.php?stage_id=<?php echo $row_stages['stage_id'];?>" >
                        <div class="custom-control  d-flex align-items-center justify-content-between mb-3"style="background-color:<?php echo $stage_color;?>">
                            <input type="checkbox" class="custom-control-input" id="color-1" disabled>
                            <label class="custom-control-label" for="color-1"><?php echo $row_stages['stage_name'];?></label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
						</a>
					<?php } ?> 
                    
                </div>
				<?php if(isset($_GET['stage_id'])){ ?>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">بابەت</span></h5>
                <div class="bg-light p-4 mb-30">
                    <?php 
					$stage_id=$_GET['stage_id'];
					$subjects="select * from `subjects`,`stage_subject` where `subject`=`subject_id` and `stage`='$stage_id'";
					$subjects_r=$conn->query($subjects);
					while($row_subjects=mysqli_fetch_array($subjects_r))
					{
						$subject_color="#F1F2F7";
						if((isset($_GET['subject_id']))&&($_GET['subject_id']==$row_subjects['subject_id'])) $subject_color="#BDC1E0";
					?>
						<a href="malzama.php?subject_id=<?php echo $row_subjects['subject_id'];?>&&stage_id=<?php echo $stage_id;?>#s" >
                        <div class="custom-control  d-flex align-items-center justify-content-between mb-3"style="background-color:<?php echo $subject_color;?>">
                            <input type="checkbox" class="custom-control-input" id="color-1" disabled>
                            <label class="custom-control-label" for="color-1"><?php echo $row_subjects['subject_name'];?></label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
						</a>
					<?php } ?> 
                       
					   
                </div>
				<?php } ?>
                <!-- Color End -->

                
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    
					<?php 

						
					
					if(isset($_GET['teacher_id']))
					{	
						$stage = $_GET['stage_id'];
					$subject = $_GET['subject_id'];
					$get_s_s = "SELECT * FROM `stage_subject` WHERE `stage` = $stage AND `subject` = $subject";
					$r = $conn->query($get_s_s);
					$row_s_s = mysqli_fetch_array($r);
					$s_s = $row_s_s['stage_subject_id'];
				
						$get_teacher = $_GET['teacher_id'];
						$malzama = "SELECT * FROM  `malzama` WHERE `malzama_teacher` = '$get_teacher' && `malzama_stage_subject` = '$s_s' ";
						$malzama_r = $conn -> query($malzama);
						
						
						$teacher = "select ";
						
						while($row_malzama = mysqli_fetch_array($malzama_r))
					{ $malzama_id=$row_malzama['malzama_id'];?>
						<div class="col-lg-4 col-md-6 col-sm-6 pb-1" id="s">
						<div class="product-item bg-light mb-4">
						<div class="product-img position-relative overflow-hidden">
						<img class="img-fluid w-100" src="../image/malzama_image/<?php echo $row_malzama['malzama_image'];?>" style="height:500px;width:500px" alt="">
						<div class="product-action">
						<a class="btn btn-outline-dark btn-square" onclick='return confirm("دڵنیای لە زیادکردنی ئەم مەلزەمەیە بۆ لیستی داواکاریەکانت؟؟");' href="add_to_basket.php?stage_id=<?php echo $stage;?>&&subject_id=<?php echo $subject;?>&&teacher_id=<?php echo $get_teacher;?>&&malzama_id=<?php echo $malzama_id;?>"><i class="fa fa-shopping-cart"></i></a>
						</div>
						</div>
						<div class="text-center py-4">
						<a class="h6 text-decoration-none text-truncate" href=""></a>
						<div class="d-flex align-items-center justify-content-center mt-2">
						<h5><?php $row_malzama['malzama_id']; echo $row_malzama['malzama_title'];?></h5><br>
						</div>
						<div class="d-flex align-items-center justify-content-center mb-1">
						<small class="fa fa-star text-primary mr-1"></small>
						<small class="fa fa-star text-primary mr-1"></small>
						<small class="fa fa-star text-primary mr-1"></small>
						<small class="fa fa-star text-primary mr-1"></small>
						<small class="fa fa-star text-primary mr-1"></small>
						<small>(100%)</small>
						</div><?php echo $row_malzama['sell_price'];?>
						</div>
						</div> 
						</div>

					<?php } 
						
						
						
						
					}
					elseif(isset($_GET['subject_id']))
						
					{	
					$stage = $_GET['stage_id'];
					$subject = $_GET['subject_id'];
					
					$get_s_s = "SELECT * FROM `stage_subject` WHERE `stage` = $stage AND `subject` = $subject";
					$r = $conn->query($get_s_s);
					$row_s_s = mysqli_fetch_array($r);
					$s_s = $row_s_s['stage_subject_id']; 


					$select_teacher = "SELECT distinct(`malzama_teacher`),`teacher_id`,image,`teacher_name` FROM `malzama`,`teacher`  WHERE `malzama_teacher`=`teacher_id` and `malzama_stage_subject` = '$s_s' ";
					$select_teacher_r = $conn -> query($select_teacher);

					//while($row_stages=mysqli_fetch_array($stages_r))
					while($row_select_teacher = mysqli_fetch_array($select_teacher_r))
					{ ?>
						<div class="col-lg-4 col-md-6 col-sm-6 pb-1" id="s">
						<div class="product-item bg-light mb-4">
						<div class="product-img position-relative overflow-hidden">
						<img class="img-fluid w-100" src="../image/teacher_image/<?php echo $row_select_teacher['image'];?>" style="height:500px;width:500px" alt="">

				
						<div class="text-center py-4">
						<a class="h6 text-decoration-none text-truncate" href=""></a>
						<div class="d-flex align-items-center justify-content-center mt-2">
						<h5><?php $teacher_id=$row_select_teacher['teacher_id']; echo $row_select_teacher['teacher_name'];?></h5><br>
						
						<div class="product-action">
						<a class="btn btn-outline-dark btn-square" href="teacher_profile.php?id=<?php echo $row_select_teacher['teacher_id'];?>"><i class="fa fa-user"></i></a>
						<a class="btn btn-outline-dark btn-square" href="malzama.php?stage_id=<?php echo $stage;?>&subject_id=<?php echo $subject;?>&teacher_id=<?php echo $teacher_id;?>#s"><i class="fa fa-book"></i></a>
						</div>
						
						</div>
						<div class="d-flex align-items-center justify-content-center mb-1">
						<small class="fa fa-star text-primary mr-1"></small>
						<small class="fa fa-star text-primary mr-1"></small>
						<small class="fa fa-star text-primary mr-1"></small>
						<small class="fa fa-star text-primary mr-1"></small>
						<small class="fa fa-star text-primary mr-1"></small>
						<small>(100%)</small>
						</div>
						</div>
						</div> 
						</div>

					<?php } 


					}?>
                   
				   
				   
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


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