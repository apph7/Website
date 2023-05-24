

<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<title>党的知识测试</title>
        <style>
   
            
 .register {
display: inline-block;
  background-color: #ff6633;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
  text-align: right; /* 将注册按钮靠右对齐 */
  margin-top: 20px; /* 添加顶部外边距，以与表单分隔 */
}
* {

}
a {
  text-decoration: none;
  color: #666;
  float: right;
}
body {      
    
    background-color: #fff;
    font-family: "Microsoft YaHei", sans-serif;
    font-size: 16px;
    
    padding: 0;
    background-color: #f2f2f2;
}



/* 表单样式 */
form {
    margin-top: 110px;
    margin-bottom:0px;  
  height: 440px;
  display: inline-block;
  max-width: 300px;
  background-color: #fff; 
  padding: 80px;
  
}

form h2 {
  font-size: 30px;
  color: black;
  margin-bottom: 20px;
  font-weight: normal;
  text-align: center;
}

form label {
  display: block;

  font-size: 18px;
  margin-bottom: 10px;
  color: #333;
}

form input[type="text"],
form input[type="password"],
form input[type="email"]{
   width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  color: #333;
}

form select{
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  color: #333;
}



form input[type="submit"] {
 display: flex;
  flex-direction: column;
  align-items: center;
  background-color:rgb(32,178,170);
  color: #fff;
  border: 10px;
  padding: 10px 40px 10px 40px;
  margin: 50px 111px 10px 80px;
  border-radius: 20px;
  font-size: 18px;
  cursor: pointer;
  align-content: center;
  margin-left: 100px
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
    <div style="background-image: url('../PhpProject1/image/R.jfif');background-size:100% 100%;background-attachment:fixed;margin-top:30px">
    <div style="margin-left:140px;">
        <div>
            <img src="../PhpProject1/image/lin2.png"  style="width: 800px;margin-top: 110px;margin-left: 100px;height: 600px;display: inline-block;float: left;">
        </div>
        <div  >
            <form name="myForm" onsubmit="return validateForm()" action="login.php" method="post" style="margin-bottom:68px;">
                            <h2 >党的知识测试系统登陆</h2>
				
				<input type="text" name="username" placeholder="用户名">                           
				
				<input type="password" name="password" placeholder="密码">                            
                                <select name="role" id ="role">
                                   <option value="admin">管理员</option>
                                   <option value="organizer">组织员</option>
                                   <option value="user">入党积极分子</option>
                                 </select>   
                                <a href="password.php">&nbsp;忘记密码？ </a>
                                <a href="rigister_login.php">注册&nbsp; </a>
                                
                                <input type="submit"style=" " value="登陆" >   
                                
			</form>
                    
	</div>
    </div> 
       </div>
</body>
</html>
<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Get user input from form
$username = $_POST["username"];
$role=$_POST["role"];

// 读取session中的用户名信息
session_start();
$_SESSION['username'] = $username;
$_SESSION['role'] = $role;
$password = $_POST["password"];

// Check if user exists in database
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows ==1) {
    // User found, start session and set session variables
    
    
    $_SESSION["loggedin"] = true;
    
    while($ro = mysqli_fetch_assoc($result)) {
    $confirm_role=$ro["role"];}
    if($role=="admin"&& $role==$confirm_role)
    {header("Location: manage\manage.php");
    exit();}
    elseif($role=="organizer"&& $role==$confirm_role)
    {header("Location: organizer\organizer.php");
    exit();}
    elseif($role=="user"&& $role==$confirm_role)
    {header("Location: users\user.php");
    exit();}
    else{
       echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
   echo "<script>swal('身份错误');</script>";
    }
        
} else {
    // User not found, show error message
   echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
   echo "<script>swal('用户名或密码错误');</script>";
}
}
$conn->close();
?>