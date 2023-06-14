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
  transition-duration: 0.5s;
}
.register:hover{
    padding: 10px 25px;
    font-size: 23px;
    margin-left: 55px;
    margin-right: 55px;
}
* {

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



/* 表单样式 */
form {
    margin-top: 10px;
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
   width: 93%;
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
    <div>

<div style="display:flex; flex-direction:column; position:fixed; background-image: url('../image/lin.png');border-left: 0px;  border-radius: 20px;margin-bottom:60px;margin-left: 30px">
    
 <div style="margin-top: 20px;margin-bottom: 20px;border: 10px;background: linear-gradient(to bottom,#FFFFE0	, #E0FFFF);;border-radius: 20px;">
  <img src="../image/po.png" style="border-radius: 80px;height: 100px;width: 100px;float:left;margin-left: 5px;">
   <?php
   session_start();
   $user=$_SESSION['username'];
   $role=$_SESSION['role'];
   if($role=='admin'){
  echo '<div style="border: 1px;background: linear-gradient(to bottom, #E6E6FA,#E0FFFF	);margin-left:28px;padding-top:10px;padding-bottom:0.5px;border-radius: 20px;">';
  echo '<p style="position:relative;left:10px;top:10px;bottom:10px;color:black;">用户名：'.$user.'</p>';
  echo '<p style="position:relative;left:10px;top:10px;color:black;">身份：'.$role.'</p>';
     echo '</div>';     
    ?>
</div>


     <a href="../rigister_login.php"class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;">添加用户</a>
      <a href="../manage/news.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;" >发布公告</a> 
      <a href="../question/question.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;">题库列表</a>
      <a href="../learning_record/record-manage.php"class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;">积极分子学习记录</a> 
      <a href="../organizer/paper.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 50px;">考察记录表</a> 

 
 
</div>
        </div>
    
    <div style="margin-left: 300px; ">
         <?php include ('../users/header.php'); ?>  
    </div>
    <?php
   }elseif($role=='organizer'){
       echo '<div style="border: 1px;background: linear-gradient(to bottom, #E6E6FA,#E0FFFF	);margin-left:28px;padding-top:10px;padding-bottom:0.5px;border-radius: 20px;">';
  echo '<p style="position:relative;left:10px;top:10px;bottom:10px;color:black;">用户名：'.$user.'</p>';
  echo '<p style="position:relative;left:10px;top:10px;color:black;">身份：'.$role.'</p>';
     echo '</div>';      
    ?>
</div>

    <a href="../users/modify_profile.php" class="register"  style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom:30px;">修改个人信息</a>
    <a href="../organizer/generate_quiz.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 30px;">生成试卷</a>
    <a href="../organizer/paper.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 30px;">查看发布试卷</a>
    
    <a href="../question/question.php"class="register"  style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 30px;">题库列表</a>
    <a href="../learning_record/record-organizer.php"class="register"  style="font-size: 20px; margin-bottom: 10px;margin-top: 30px;margin-bottom: 30px;">积极分子学习记录</a>
    <a href="../manage/news.php" class="register" style="font-size: 20px; margin-bottom: 10px;margin-top: 20px;margin-bottom: 50px;" >发布公告</a> 

 
    

 
</div>
    </div>
    
    <div style="margin-left: 300px; ">
         <?php include ('../users/header.php'); ?>  
    </div>
    <?php
   }
  
   ?>
    <div style="margin-top: 10px;margin-left: 700px;">
        
    <form  method="POST">
        <h2>发布公告</h2>
        <label for="title">标题</label>
        <input type="text" name="title" required>

        <label for="content">内容</label>
        <input type="text" name="content" style="height: 100px;" required>

        <!-- 其他需要修改的字段的输入框 -->

        <input type="submit" value="发布">
    </form>
    </div>
  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 连接到数据库
    $servername = "localhost";
    $dbname = "sgm";
    $username = "root";
    $password = "";
    
    // 创建数据库连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // 检查连接是否成功
    if ($conn->connect_error) {
        die("数据库连接失败: " . $conn->connect_error);
    }
    $username=$_SESSION["username"];
    $role=$_SESSION["role"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $currentDateTime = date('Y-m-d H:i:s', strtotime('+6 hours'));
    // 更新数据库中的用户信息
    $sql = "insert into news values('$username','$role','$title','$content','$currentDateTime')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<span> </span>";
   echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
   echo "<script>swal('发布成功');</script>";
    } else {
       echo "<span> </span>";
   echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
   echo "<script>swal('发布失败');</script>";
    }
    
    // 关闭数据库连接
    $conn->close();
}
?>


    
    
    
    
    
      
    
</body>
</html>
