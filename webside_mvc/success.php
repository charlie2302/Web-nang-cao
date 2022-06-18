<?php 
    include 'inc/header.php';
    // include 'inc/slider.php';
?>
<?php

    if(isset($_GET['orderid']) AND $_GET['orderid']=='order'){
    	$customer_id = Session::get('customer_id');
    	$insertOrder = $ct->insertOrder($customer_id);
    	$delCart =$ct->del_all_data_cart();
    	header('Location:success.php');
    }
?>
<style type="text/css">
	.box_left {
    width: 60%;
    border: 1px solid #666;
    float: left;
    padding: 7px;
    }
    .box_right {
    width: 36%;
    border: 1px solid #666;
    float: right;
    padding: 7px;
	}
</style>
<form action="" method="POST">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<h2 class="success_order" style="color: #FD5F12; font-weight: bold;">ĐÃ ĐẶT HÀNG THÀNH CÔNG !!!</h2>
    		<?php
    		$customer_id = Session::get('customer_id');
    		$get_amount = $ct->getAmountPrice($customer_id);
    		if($get_amount)
    		{
    			$amount = 0;
    			while($result = $get_amount->fetch_assoc()){
    				$price = $result['price'];
    				$amount += $price;
    			}
    		}
    		?>
    		<p class="success_note" style="padding-top: 7px;">Tổng tiền bạn cần thanh toán là: 
    			<?php $vat = $amount * 0.1; 
    				$total = $vat + $amount; 
    				echo $total.' VNĐ';
    			?>
    		</p>
    		<p class="success_note" style="padding-top: 7px;">Đơn hàng của bạn đang được xử lý, chúng tôi sẽ gửi sản phẩm đến sớm nhất có thể</p>
    		<center style="padding-top: 20px;"><a href="orderdetail.php" style="padding: 10px 40px; border: none; background: #FD5F12; font-size: 20px; color: #fff; border-radius: 10px; cursor: pointer;">Theo dõi đơn hàng</a></center>
    	</div>
 	</div>
 </div>
</form>
<?php 
    include 'inc/footer.php';
?>

