<?php 
    include 'inc/header.php';
    // include 'inc/slider.php';
?>
<?php
	  	$login_check = Session::get('customer_login');
	  	if($login_check == false){
	  		header('Location:login.php');
	  	}
	  ?>
<?php
    // if(!isset($_GET['proid']) || $_GET['proid']==NULL){
    // 	echo "<script>window.location ='404.php'</script>";
    // }else{
    // 	$id = $_GET['proid'];
    // }
    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    // {
    // 	$quantity = $_POST['quantity'];
    //  $AddtoCart = $ct->add_to_cart($quantity, $id); 
    // }

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    			<h3>Phương thức thanh toán</h3>
	    		</div>
    		<div class="clear"></div>
    	</div>
 		</div>
            <h3 class="payment" style="text-align: center; font-size: 20px; font-weight: bold; text-decoration: underline; margin: 15px; color: green">Chọn phương thức thanh toán</h3>
            <div class="wrapper_method" style="width: 550px; margin: 0 auto; border: 1px solid #666; padding: 20px; text-align: center; background: cornsilk;">
                <a class="payment_href" href="offlinepayment.php" style="font-size: 16px; color: green; font-weight: bold">Thanh toán khi nhận hàng</a>
                <a style="font-size: 20px; padding: 10px">|</a>
                <a class="payment_href" href="onllinepayment.php" style="font-size: 16px; color: green; font-weight: bold;">Thanh toán trực tuyến</a>
            </div>
            <div class="wrapper_method" style="width: 100px; margin: 0 auto; padding: 5px; text-align: center; margin-top: 10px;">
                <a href="cart.php" style="text-align: center; font-size: 16px; font-weight: bold; color: green"><<< Quay lại</a>
            </div>
            
 	</div>

<?php 
    include 'inc/footer.php';
?>

