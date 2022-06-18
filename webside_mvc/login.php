<?php 
    include 'inc/header.php';
    // include 'inc/slider.php';
?>
<?php
	$login_check = Session::get('customer_login');
	if($login_check){
		header('Location:order.php');
	}
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
    {

        $insertCustomer = $cs->insert_customer($_POST); 
    }
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
    {

        $loginCustomer = $cs->login_customer($_POST); 
    }
?>
 <div class="main">
    <div class="content">
    	<div class="login_panel">
        	<h3>ĐĂNG NHẬP</h3>
        	<p>Lạc Thanh Quan xin chào, mời bạn đăng nhập bằng biểu mẫu bên dưới.</p>
        	<?php
        	if(isset($loginCustomer)){
    			echo $loginCustomer;
    		}
        	?>
        	<form action="" method="POST">
                	<input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" class="field" placeholder="Mật khẩu">
                	<p class="note">Nếu bạn quên mật khẩu mình hãy nhập gmail và nhấp vào <a href="#">đây</a></p>
                    <div class="buttons"><div><input type="submit" style="background: #fff; font-size: 19px" name="login" class="grey" value="Đăng nhập"></div></div>
            </form>        
        </div>
        <?php?>
    	<div class="register_account">
    		<h3>ĐĂNG KÝ TÀI KHOẢN MỚI</h3>
    		<?php
    			if(isset($insertCustomer)){
    				echo $insertCustomer;
    			}
    		?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Tên đăng nhập">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Quận">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Ngày/Tháng/Năm sinh">
							</div>
							<div>
								<input type="text" name="email" placeholder="E-Mail">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Địa chỉ (Phường/Số nhà)">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Lựa chọn thành phố</option>   
							<option value="An Giang">An Giang</option>
							<option value="Bà Rịa">Bà Rịa</option>
							<option value="Bạc Liêu">Bạc Liêu</option>
							<option value="Bắc Giang">Bắc Giang</option>
							<option value="Bắc Kạn">Bắc Kạn</option>
							<option value="Bắc Ninh">Bắc Ninh </option>
							<option value="Bến Tre">Bến Tre</option>
							<option value="Bình Dương">Bình Dương</option>
							<option value="Bình Định">Bình Định</option>
							<option value="Bình Phước">Bình Phước</option>
							<option value="Bình Thuận">Bình Thuận</option>
							<option value="Cà Mau">Cà Mau </option>
							<option value="Cao Bằng">Cao Bằng</option>
							<option value="Cần Thơ">Cần Thơ</option>
							<option value="Đà Nẵng">Đà Nẵng</option>
							<option value="Đắk Lắk">Đắk Lắk</option>
							<option value="Điện Biên">Điện Biên</option>
							<option value="Đắk Nông">Đắk Nông</option>
							<option value="Đông Hà">Đông Hà</option>
							<option value="Đồng Nai">Đồng Nai</option>
							<option value="Đồng Tháp">Đồng Tháp</option>
							<option value="Gia Lai">Gia Lai</option>
							<option value="Hà Giang">Hà Giang</option>
							<option value="Hà Nam">Hà Nam</option>
							<option value="Hà Nội">Hà Nội</option>
							<option value="Hà Tĩnh">Hà Tĩnh</option>
							<option value="Hải Dương">Hải Dương</option>
							<option value="Hậu Giang">Hậu Giang</option>
							<option value="Hòa Bình">Hòa Bình</option>
							<option value="Thành Phố Hồ Chí Minh">Thành Phố Hồ Chí Minh</option>
							<option value="Hưng Yên">Hưng Yên</option>
							<option value="Khánh Hòa">Khánh Hòa</option>
							<option value="Kiên Giang">Kiên Giang</option>
							<option value="Kon Tum">Kon Tum</option>
							<option value="Lai Châu">Lai Châu</option>
		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Số điện thoại">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Mật khẩu">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input type="submit" style="background: #fff; font-size: 19px" name="submit" class="grey" value="Tạo tài khoản"></div></div>
		    <p class="terms" style="font-size:15px">Bằng cách nhấp vào 'Tạo Tài khoản', bạn đồng ý với <a href="#">Điều khoản &amp; Điều kiện</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
    include 'inc/footer.php';
?>