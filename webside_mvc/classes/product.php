<?php
    
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
     /**
      * 
      */
     class product
     {
        private $db;
        private $fm;
     	

     	public function __construct()
     	{
     		$this->db = new Database(); 
            $this->fm = new Format(); 
     	}
     	public function insert_product($data, $files)
     	{

            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            //Kiểm tra và lấy hình ảnh vào folder uploads
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name=="" ){
                $alert = "<span class='error'>Không được để trống</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
                $result = $this->db->insert($query);

                if($result){
                    $alert = "<span class='success'>Thêm thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span class='error'>Thêm không thành công</span>";
                    return $alert;
                }
            }
     	}

        public function show_product(){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
            ORDER BY tbl_product.productId DESC";

            // $query = "SELECT * FROM tbl_product ORDER BY productId DESC";

            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$files,$id){

            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            //Kiểm tra và lấy hình ảnh vào folder uploads
            $permited = array('jpg', 'jpeg', 'png', 'gif'); //cho phép
            $file_name = $_FILES['image']['name']; //thay vì $POST thì sẽ lấy bằng $FILE
            $file_size = $_FILES['image']['size']; //lấy được size
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type==""){
                $alert = "<span class='error'>Không được để trống</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh
                if($file_size > 20480)
                {
                    $alert = "<span class='success'>Kích cỡ ảnh nên nhỏ hơn 2MB!</span>";
                    return $alert;
                }
                elseif (in_array($file_ext, $permited) === false) {
                    $alert = "<span class='success'>Bạn chỉ có thể upload ảnh:-".implode(',', $permited)."</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                image = '$unique_image',
                product_desc = '$product_desc'
                WHERE productId = '$id'";

            }else{
                //Nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                product_desc = '$product_desc'
                WHERE productId = '$id'";
            }
                $result = $this->db->update($query);

                if($result){
                    $alert = "<span class='success'>Sửa thành công</span>";
                    return $alert;
                }
                else
                {
                    $alert = "<span class='error'>Sửa không thành công</span>";
                    return $alert;
                }
            }
        }

        public function del_product($id){ 
            $query = "DELETE FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span class='success'>Xoá thành công</span>";
                return $alert;
            }
            else
            {
                $alert = "<span class='error'>Xoá không thành công</span>";
                return $alert;
            }
        }

        public function getproductbyId($id){
            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        //FRONT-END
        public function getproduct_noibat(){
            $query = "SELECT * FROM tbl_product WHERE type = '0'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_new(){
            $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id){
            $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
            WHERE tbl_product.productId = '$id'";

            

            $result = $this->db->select($query);
            return $result;
        }

        public function Puer(){
            $query = "SELECT * FROM tbl_product WHERE catId = '7' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function GreenTea(){
            $query = "SELECT * FROM tbl_product WHERE catId = '1' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function Oolong(){
            $query = "SELECT * FROM tbl_product WHERE catId = '3' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function DarkTea(){
            $query = "SELECT * FROM tbl_product WHERE catId = '4' ORDER BY productId DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }
     }
?> 