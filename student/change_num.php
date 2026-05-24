<?php require 'include/header.php';


$basket_id=$_POST['basket_id'];
if(isset($_POST['plus']))
{
	$num=$_POST['number']+1;
	
}
elseif(isset($_POST['minus']))
{
	$num=$_POST['number']-1;
}

if($num==0)
{
	$conn->query("delete from `basket` where `basket_id`=$basket_id");
}
	else
	{	
  $conn->query("update `basket` set `number`=$num where `basket_id`=$basket_id");
	}
   echo "<script type='text/javascript'>window.location.href ='basket.php'</script>";



 require'include/footer.php';?>


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