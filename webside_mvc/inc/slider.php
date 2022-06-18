<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
					$Puer = $product->Puer();
					if($Puer){
						while($resultpuer = $Puer->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultpuer['productId'] ?>"> <img src="admin/uploads/<?php echo $resultpuer['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>PHỔ NHĨ</h2>
						<p><?php echo $resultpuer['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultpuer['productId'] ?>">Mua hàng</a></span></div>
				   </div>
			   </div>
			   <?php
			            }
			        }
			   ?>
			   <?php
					$GreenTea = $product->GreenTea();
					if($GreenTea){
						while($resultgreentea = $GreenTea->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/uploads/<?php echo $resultgreentea['image'] ?>" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>THANH TRÀ</h2>
						  <p><?php echo $resultgreentea['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultgreentea['productId'] ?>">Mua hàng</a></span></div>
					</div>
				</div>
				<?php
			            }
			        }
			   ?>
			</div>
			<?php
					$Oolong = $product->Oolong();
					if($Oolong){
						while($resultoolong = $Oolong->fetch_assoc()){
				?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php"> <img src="admin/uploads/<?php echo $resultoolong['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Ô LONG</h2>
						<p><?php echo $resultoolong['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultoolong['productId'] ?>">Mua hàng</a></span></div>
				   </div>
			   </div>
			   	<?php
			            }
			        }
			   ?>
			   <?php
					$DarkTea = $product->DarkTea();
					if($DarkTea){
						while($resultdarktea = $DarkTea->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php"><img src="admin/uploads/<?php echo $resultdarktea['image'] ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>HỒNG TRÀ</h2>
						  <p><?php echo $resultdarktea['productName'] ?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultdarktea['productId'] ?>">Mua hàng</a></span></div>
					</div>
				</div>
				<?php
			            }
			        }
			   ?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/banner1.jpg" alt=""/></li>
						<li><img src="images/banner2.jpg" alt=""/></li>
						<li><img src="images/banner4.jpg" alt=""/></li>
						<li><img src="images/banner5.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
</div>