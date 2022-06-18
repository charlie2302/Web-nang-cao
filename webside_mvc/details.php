<?php 
    include 'inc/header.php';
    // include 'inc/slider.php';
?>
<?php

    if(!isset($_GET['proid']) || $_GET['proid']==NULL){
    	echo "<script>window.location ='404.php'</script>";
    }else{
    	$id = $_GET['proid'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {
    	$quantity = $_POST['quantity'];
        $AddtoCart = $ct->add_to_cart($quantity, $id); 
    }

?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php

    		    $get_product_details = $product->get_details($id);
    		    if($get_product_details){
    		    	while($result_details = $get_product_details->fetch_assoc()){


    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?></h2>
					<p><?php echo $fm->textShorten($result_details['product_desc'], 200) ?></p>					
					<div class="price">
						<p>Giá bán: <span><?php echo $result_details['price']." VNĐ" ?></span></p>
						<p>Danh mục: <span><?php echo $result_details['catName'] ?></span></p>
						<p>Thương hiệu:<span><?php echo $result_details['brandName'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1" />
						<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
					</form>	
					<?php
					if(isset($AddtoCart)){
						echo '<span style="color:red; font-size:18px">Sản phẩm đã có trong giỏ hàng của bạn</span>';
					}
					?>			
				</div>
				
			</div>
			<div class="product-desc">
			<h2>Chi tiết mô tả sản phẩm</h2>
			<p><?php echo $result_details['product_desc'] ?></p>
	    </div>
	</div>
	<?php
	}}
	?>

				<div class="rightsidebar span_3_of_1">
					<h2>DANH MỤC SẢN PHẨM</h2>
					<ul>
						<?php
						$getall_category = $cat->show_category_frontend();
						if($getall_category){
							while($result_allcat = $getall_category->fetch_assoc()){
						?>
						<li><a href="productbycat.php?catid=<?php echo $result_allcat['catId']?>"><?php echo $result_allcat['catName']?></a></li>
						<?php
						}}
						?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>

<?php 
    include 'inc/footer.php';
?>

