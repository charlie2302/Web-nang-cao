<?php 
    include 'inc/header.php';
    include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
	     <div class="section group">
	      	<?php
	      	    $show_product = $product->show_product();
	      	    if($show_product){
	      	    	while($result = $show_product->fetch_assoc()){
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
 </div>

<?php 
    include 'inc/footer.php';
?>