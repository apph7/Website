<?php
ob_start();
$servername = 'localhost';  // mysql服务器主机地址
$username = 'root';            // mysql用户名
$password = '';          // mysql用户名密码
$dbname = 'sgm';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if user exists in database
$sql = "SELECT * FROM users ";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<title>生成试卷</title>
	<style>
		/* 样式调整，可根据需要进行修改 */
	
             
.register {
  display: inline-block;
  background-color: #ff6633;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
  text-align: center; /* 将注册按钮靠右对齐 */
  margin-top: 20px; /* 添加顶部外边距，以与表单分隔 */
  margin-left: 60px;
  margin-right: 60px;
}
a {
  text-decoration: none;
  color: #666;
  float: right;
}
body {      
    background-image: url('../image/xu.png');
    background-size: 100%;
    background-color: #fff;
    font-family: "Microsoft YaHei", sans-serif;
    font-size: 16px;
    padding: 0;
    background-color: #f2f2f2;
}

.form {
 
  max-width: 500px;
  margin: 0;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 10px;
  margin-top: 10px;
}

.form h2 {
  font-size: 35px;
  color: #ff6633;
  margin-bottom: 20px;
  font-weight: bold;
  text-align: center;
}


.form input[type="text"],
.form input[type="password"],
.form input[type="email"]{
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  color: #333;
}

.form select{
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  color: #333;
}



.form input[type="submit"] {
 display: flex;
  flex-direction: column;
  align-items: center;

  background-color: #ff6633;
  color: #fff;
  border: 10px;
  padding: 10px ;
  margin: 10px ;
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
  align-content: center;
}
#table 的设计
#table 的设计
#table 的设计
/* 表格样式 */
table {
  text-align: center;
  font-size: 20px;
  border-collapse: collapse;

 
}

table th {
  background-color: #ff6633;
  color: #fff;
  font-size: 18px;
  font-weight: bold;
  padding: 10px;
 padding-left: 20px;
 padding-right: 20px;
}

table td {
  border: 1px solid #ccc;
  vertical-align: top;
  font-size: 18px;
  color: black;

}

table tr:nth-child(odd) {
  background-color: #f2f2f2;
}
form input[type="submit"] {
 display: flex;
  flex-direction: column;
  align-items: center;
  background-color:rgb(32,178,170);
  color: #fff;
  border: 10px;
  padding: 10px 40px 10px 40px;
  margin: 10px 30px 10px 0px;
  border-radius: 20px;
  font-size: 18px;
  cursor: pointer;
  align-content: left;
  margin-left: 30px
}
form input[type="submit"]:hover {
background-color:#5F9EA0;
}
form input[type="submit"]:active {
background-color:#008080;
}

	</style>
</head>

<body>
    <div>

<div style="display:flex; flex-direction:column; position:fixed; background-image: url('../image/lin.png');border-left: 0px;  border-radius: 20px;margin-left: 30px">
    
 <div style="margin-top: 20px;margin-bottom: 20px;border: 10px;background: linear-gradient(to bottom,#FFFFE0	, #E0FFFF);;border-radius: 20px;">
  <img src="../image/po.png" style="border-radius: 80px;height: 100px;width: 100px;float:left;margin-left: 5px;">
   <?php
   session_start();
   $user=$_SESSION['username'];
   $role=$_SESSION['role'];
   echo '<div style="border: 1px;background: linear-gradient(to bottom, #E6E6FA,#E0FFFF	);margin-left:28px;padding-top:10px;padding-bottom:0.5px;border-radius: 20px;">';
  echo '<p style="position:relative;left:10px;top:10px;bottom:10px;color:black;">用户名：'.$user.'</p>';
  echo '<p style="position:relative;left:10px;top:10px;color:black;">身份：'.$role.'</p>';
     echo '</div>';     
    ?>
</div>


      <a href="../rigister_login.php"class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;">添加用户</a>
      <a href="../question/add_question.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;" >添加题目</a> 
      <a href="../question/question.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;">题库列表</a>
      <a href="../learning_record/record-manage.php"class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;">积极分子学习记录</a> 
      <a href="../organizer/paper.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;">考察记录表</a> 

 
</div>
      
        
        
        
    </div>
    
    <div style="margin-left: 300px; ">
         <?php include ('../users/header.php'); ?>  
    </div>
       <!-- 管理员管理用户  -->
    <div style="margin-left: 450px; ">
        <h1 style="margin-left:500px">管理员界面</h1>
  
    <table >
        <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Email</th>
                <th>Actions</th>
                <th>删除</th>
               
            </tr>
        </thead>
        <tbody style="padding:10px;margin: 10px ">
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr style="margin: 10px;">
                <td style="padding-top:20px;text-align: center"><?php echo $row["username"]; ?></td>
                    <td style="padding-top:20px;text-align: center"><?php echo $row["password"]; ?></td>
                    <td style="padding-top:20px;text-align: center"><?php echo $row["role"]; ?></td>
                    <td style="padding-top:20px;padding-left: 30px;padding-right: 30px;"><?php echo $row["email"]; ?></td>
                    <td style="padding-left: 30px;padding-right: 30px;">
                        <form method="post" style="margin-bottom:10px;margin-top: 10px">
                            <input type="hidden" name="username" value="<?php echo $row["username"]; ?>">
                            <input type="text" name="new_password" style="font-size: 20px;padding-left: 10px;padding-right: 10px;padding-top: 5px;padding-bottom: 5px;border-radius: 20px;">
                            <button type="submit" style="padding-top:5px;font-size: 18px;text-align: center;border-radius: 20px;padding-bottom: 5px;background-color: #B0C4DE;margin-top: 5px;">修改密码</button>
                        </form>
                    </td>
                    
                    <td>
                    <form method="post" onsubmit="return confirm('确定删除该用户吗？');">
                        <input type="hidden" name="delete_user_id" value="<?php echo $row["username"]; ?>">
                        <input type="submit" value="删除">
                    </form>
                     </td>             
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>            
        </div> 

   

    
    
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
if(isset($_POST["new_password"])&& isset($_POST["username"])){       
$password=$_POST["new_password"];
$username=$_POST["username"];
if(trim($password)!=null&&trim($username)!=null){
$sq = "UPDATE users SET password='$password' WHERE username='$username'";
// Execute the query
$res = $conn->query($sq);
// Check if the query was successful and display a message
if ($res) {
  echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
  echo "<script>swal('修改成功');</script>";
  ?>
<script>
    window.location.href = '../manage/manage.php';
</script>
<?php
}else{
       echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
   echo "<script>swal('错误');</script>";
   ?>
<script>
    window.location.href = '../manage/manage.php';
</script>
<?php
 }
}else
{
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
  echo "<script>swal('请勿为空');</script>";
}
    }
    
if(isset($_POST["delete_user_id"])) {
    $username = $_POST["delete_user_id"];
    $sqll = "DELETE FROM users WHERE username='$username'";
    $re = $conn->query($sqll);
    header("Refresh:0");
    exit();
}

}
ob_end_flush();
?>

   
 
