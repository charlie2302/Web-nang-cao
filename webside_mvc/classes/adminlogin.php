<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath.'/../lib/session.php');
    Session::checkLogin(); //Gọi được session.php thì trong đó có class Session, trong class Session có sẵn hàm checkLogin
    include ($filepath.'/../lib/database.php');
    include ($filepath.'/../helpers/format.php');
?>

<?php
     /**
      * 
      */
     class adminlogin
     {
        private $db;
        private $fm;
     	
     	public function __construct()
     	{
     		$this->db = new Database(); 
            $this->fm = new Format(); 
     	}

     	public function login_admin($adminUser, $adminPass)
     	{
     		$adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);
            //Kiểm tra có hợp lệ không

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            // mysql thì có 1 biến, mysqli thì có 2 biến
            //$this->db->link: kết nối csdl
            //$adminUser: dữ liệu
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            //Nếu người dùng không nhập user hoặc pass
            if(empty($adminUser) || empty($adminPass)){
                $alert = "Username và Password không được để trống";
                return $alert;
            }
            else
            {
                $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
                $result = $this->db->select($query);

                if($result != false){ //Khác sai là đúng
                    $value = $result->fetch_assoc(); //Lấy kết quả
                    Session::set('adminlogin', true);
                    Session::set('adminId', $value['adminId']);
                    Session::set('adminUser', $value['adminUser']);
                    Session::set('adminName', $value['adminName']);
                    header('Location:index.php'); //Đúng thì quay về admin
                }
                else
                {
                    $alert = "Username hoặc Password không chính xác";
                    return $alert;
                }
            }
     	}
     }
?> 