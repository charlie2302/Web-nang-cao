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
    		<div class="heading">
	    		<h3>Thanh toán khi nhận hàng</h3>
	    	</div>
	    	<div class="clear"></div>
	    	<div class="box_left">
	    		<div class="cartpage">
			    	<?php
			    	if(isset($update_quantity_cart)){
			    		echo $update_quantity_cart;
			    	}
			    	?>
			    	<?php
			    	if(isset($delcart)){
			    		echo $delcart;
			    	}
			    	?>
						<table class="tblone">
							<tr>
								<th width="10%">ID</th>
								<th width="30%">Tên sản phẩm</th>
								<th width="20%">Giá</th>
								<th width="20%">Số lượng</th>
								<th width="20%">Tổng cộng</th>
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								$i = 0;
								while($result = $get_product_cart->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><?php echo $result['price'].' Đ' ?></td>
								<td><?php echo $result['quantity'] ?></td>
								<td>
									<?php
									$total = $result['price'] * $result['quantity'];
									echo $total.' Đ';
									?>
								</td>
							</tr>
							<?php
							$subtotal += $total;
							$qty = $qty + $result['quantity'];
							}}
							?>
						</table>
						<?php
							$checkcart = $ct->checkcart();
							if($checkcart){
								
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th style="padding-top: 10px;">Số lượng sản phẩm </th>
								<td style="padding-top: 10px;">
									<?php
									echo $qty;;
									?>
								</td>
							</tr>
							<tr>
								<th style="padding-top: 10px;">Thành tiền   </th>
								<td style="padding-top: 10px;">
									<?php
									echo $subtotal.' Đ';
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);
									?>
								</td>
							</tr>
							<tr>
								<th style="padding-top: 10px;">Thuế VAT 10%  </th>
								<td style="padding-top: 10px;">
									<?php
									$vat = $subtotal * 0.1;
									echo $vat.' Đ';
									?>
								</td>
							</tr>
							<tr>
								<th style="padding-top: 10px;">Thanh toán  </th>
								<td style="padding-top: 10px;">
									<?php
									$thanhtoan = $subtotal + $vat;
									echo $thanhtoan.' Đ';
									?>
								</td>
							</tr>
					   </table>
					   <?php 
					   }
					   else
					   {
					   	echo '<span style="color: red; font-size: 18px">Giỏ hàng của bạn đang trống, hãy thêm sản phẩm và mua hàng ngay thôi !!!</span>';
					   }
					   ?>
					</div>

	    	</div>
	    	<div class="box_right">
	    		<table class="tblone">
    			<?php
    			$id = Session::get('customer_id');
    			$get_customer = $cs->show_customer($id);
    			if($get_customer){
    				while($result = $get_customer->fetch_assoc()){
    			?>
    			<tr>
    				<td>Tên đăng nhập</td>
    				<td>:</td>
    				<td><?php echo $result['name']?></td>
    			</tr>
    			<tr>
    				<td>Ngày tháng năm sinh</td>
    				<td>:</td>
    				<td><?php echo $result['zipcode']?></td>
    			</tr>
    			<tr>
    				<td>Số điện thoại</td>
    				<td>:</td>
    				<td><?php echo $result['phone']?></td>
    			</tr>
    			<tr>
    				<td>Email</td>
    				<td>:</td>
    				<td><?php echo $result['email']?></td>
    			</tr>
    			<tr>
    				<td>Địa chỉ nhà</td>
    				<td>:</td>
    				<td><?php echo $result['address']?></td>
    			</tr>
    			<tr>
    				<td>Quận</td>
    				<td>:</td>
    				<td><?php echo $result['city']?></td>
    			</tr>
    			<tr>
    				<td>Thành phố</td>
    				<td>:</td>
    				<td><?php echo $result['country']?></td>
    			</tr>
    			<tr>
    				<td colspan="3"><a href="editprofile.php">Chỉnh sửa thông tin</a></td>
    			</tr>
    			<?php
    				}
    			}
    			?>
    		</table>
	    	</div>
    	</div>
    	<center style="padding-top: 20px;"><a href="?orderid=order" style="padding: 10px 40px; border: none; background: #FD5F12; font-size: 20px; color: #fff; border-radius: 10px; cursor: pointer;">Đặt hàng</a></center>
 	</div>
 </div>
</form>
<?php 
    include 'inc/footer.php';
?>

