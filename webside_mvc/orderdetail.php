<?php 
    include 'inc/header.php';
    // include 'inc/slider.php';
?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check == false){
	  	header('Location:login.php');
	}
	$ct = new cart();
	if(isset($_GET['confirmid'])){
        $id = $_GET['confirmid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2 style="width: 250px;">Chi tiết đơn hàng</h2>
						<table class="tblone">
							<tr>
								<th width="5%">ID</th>
								<th width="20%">Sản phẩm</th>
								<th width="10%">Ảnh</th>
								<th width="10%">Số lượng</th>
								<th width="10%">Tổng giá</th>
								<th width="20%">Ngày đặt</th>
								<th width="15%">Tình trạng</th>
								<th width="10%">Chọn</th>
							</tr>
							<?php
							$customer_id = Session::get('customer_id');
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i = 0;
								$qty = 0;
								while($result = $get_cart_ordered->fetch_assoc()){
									$i++;
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $result['productName'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></td>
								<td><?php echo $result['quantity']?></td>
								<td><?php echo $result['price'].' Đ' ?></td>
								<td><?php echo $fm->formatDate($result['date_order'])?></td>
								<td>
									<?php
										if($result['status'] == '0'){
											echo '<span>Đang xử lý</span>';
										}elseif($result['status']==1){
									?>
									<a style="color: #FD5F12" href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Đã nhận?</a>
									<?php 
										}else{
											echo '<span style="color: green">Đã nhận</span>';
										}
									?>
								</td>
								<?php
								if($result['status'] == '0'){
								?>
								<td><?php echo 'Chờ'; ?></td>
								<?php
								
								}else{

								
								?>
								<td><a href="?cartid=<?php echo $result['cartId'] ?>">Xoá</a></td>
								<?php
								}
								?>
							</tr>
							<?php
							}}
							?>
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
    include 'inc/footer.php';
?>