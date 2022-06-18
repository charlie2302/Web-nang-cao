<?php 
    include 'inc/header.php';
    include 'inc/slider.php';
?>
<div class="main">
	<!-- <?php
 	echo session_id(); //Mỗi phiên giao dịch sẽ có 1 mã riêng, và đây là mã giao dịch
 	?> -->
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	    $product_noibat = $product->getproduct_noibat();
	      	    if($product_noibat){
	      	    	while($result = $product_noibat->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']?>"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 80) ?></p>
					 <p><span class="price"><?php echo $result['price']." VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php
			}}
			?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
	      	    $product_new = $product->getproduct_new();
	      	    if($product_new){
	      	    	while($result_new = $product_new->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'], 80) ?></p>
					 <p><span class="price"><?php echo $result_new['price']." VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId']?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php
			}}
			?>
			</div>
    </div>
 </div>

<?php 
    include 'inc/footer.php';
?>