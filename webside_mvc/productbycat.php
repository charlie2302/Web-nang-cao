<?php 
    include 'inc/header.php';

?>
<?php
    if(!isset($_GET['catid']) || $_GET['catid']==NULL){
    	echo "<script>window.location = '404.php'</script>";
    }else{
        $id = $_GET['catid'];
    }
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Lấy dữ liệu bằng phương thức POST (Có 1 cách nữa là lấy bằng GET)
        
    //     $catName = $_POST['catName'];
    //     $updateCat = $cat->update_category($catName, $id); 
    // }
?>
 <div class="main">
    <div class="content">
    	<?php
	    	$name_cat = $cat->get_name_by_cat($id);
	    	if($name_cat)
	    	{
	    		while($result_name = $name_cat->fetch_assoc()){
	    	?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>DANH MỤC: <?php echo $result_name['catName'] ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<?php
			}}
		?>
	    <div class="section group">
	    	<?php
	    	$productbycat = $cat->get_product_by_cat($id);
	    	if($productbycat)
	    	{
	    		while($result = $productbycat->fetch_assoc()){
	    	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'], 80) ?></p>
					 <p><span class="price"><?php echo $result['price'].' Đ' ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php
			}}
			else{
				echo '<span style="color: red; font-size: 18px; font-weight: bold">Danh mục chưa sẵn sàng, phiền bạn xem những sản phẩm khác nhé !!!</span>';
			}
			?>
		</div>
    </div>
 </div>

<?php 
    include 'inc/footer.php';
?>