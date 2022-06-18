<?php 
    include 'inc/header.php';
    // include 'inc/slider.php';
?>
<?php
    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid'];
        $delcart = $ct->del_product_cart($cartid); 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    	$cartId = $_POST['cartId'];
    	$quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId); 
    }
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ Hàng</h2>
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
								<th width="20%">Sản phẩm</th>
								<th width="10%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng cộng</th>
								<th width="10%">Xoá</th>
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$subtotal = 0;
								$qty = 0;
								while($result = $get_product_cart->fetch_assoc()){
							?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['price'].' Đ' ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
										<input type="number" name="quantity" min="1" value="<?php echo $result['quantity'] ?>"/>
										<input type="submit" name="submit" value="Sửa"/>
									</form>
								</td>
								<td>
									<?php
									$total = $result['price'] * $result['quantity'];
									echo $total.' Đ';
									?>
								</td>
								<td><a href="?cartid=<?php echo $result['cartId'] ?>">X</a></td>
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
								<th>Thành tiền   </th>
								<td>
									<?php

									echo $subtotal.' Đ';
									Session::set('sum',$subtotal);
									Session::set('qty',$qty);
									?>
								</td>
							</tr>
							<tr>
								<th>Thuế VAT 10%  </th>
								<td>
									<?php
									$vat = $subtotal * 0.1;
									echo $vat.' Đ';
									?>
								</td>
							</tr>
							<tr>
								<th>Thanh toán  </th>
								<td>
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
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
    include 'inc/footer.php';
?>