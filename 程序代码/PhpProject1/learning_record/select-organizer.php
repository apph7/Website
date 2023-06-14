<?php
// Start session and check if user is logged in
session_start();
// Connect to database and retrieve user data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sgm";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username=trim($_POST["username"]);
if($username!=null)
$sql = "SELECT  * FROM learning_record where username ='$username' ";
else
$sql = "SELECT  * FROM learning_record  ";    
}
$result = $conn->query($sql);




// Display user data in HTML table
?>

<!DOCTYPE html>
<html>
<head>
    <?php include '../js/love.php';?>
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
.form {
    margin-top: 110px;
    margin-bottom:0px;  
  height: 440px;
  display: inline-block;
  max-width: 300px;
  background-color: #fff; 
  padding: 80px;
  
}

.form h2 {
  font-size: 30px;
  color: black;
  margin-bottom: 20px;
  font-weight: normal;
  text-align: center;
}

.form label {
  display: block;

  font-size: 18px;
  margin-bottom: 10px;
  color: #333;
}

.form input[type="text"],
.form input[type="password"],
.form input[type="email"]{
   width: 93%;
  padding: 10px;
  margin-bottom: 20px;
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
.form input[type="submit"]:hover {
background-color:#5F9EA0;
}
.form input[type="submit"]:active {
background-color:#008080;
}

table {
  text-align: center;
  font-size: 16px;
  border-collapse: collapse;

 
}

table th {
  background-color: #F8F8FF;
  color: #black;
  font-size: 18px;
  font-weight: bold;
  padding: 10px;
  padding-left: 60px;
 padding-right: 60px;
}

table td {
  border: 1px solid #ccc;
  padding: 10px;
  vertical-align: top;
  font-size: 18px;
  color: black;
}

table tr:nth-child(odd) {
  background-color: #f2f2f2;
}




	</style>
</head>

<body>
    <div>

<div style="display:flex; flex-direction:column; position:fixed; background-image: url('../image/lin.png');  border-radius: 20px;margin-left: 32px;">
    
 <div style="margin-top: 20px;margin-bottom: 20px;border: 10px;background: linear-gradient(to bottom,#FFFFE0	, #E0FFFF);;border-radius: 20px;">
  <img src="../image/po.png" style="border-radius: 80px;height: 100px;width: 100px;float:left;margin-left: 5px;">
   <?php
 
   $user=$_SESSION['username'];
   $role=$_SESSION['role'];
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
    
    <div style="margin-left: 291px; ">
         <?php include ('../learning_record/header.php'); ?>  
    </div>
  
    
    <div>
    <div style="display: flex; justify-content: space-between;">
  <h1 style="text-align: center;color: darkgray;margin-left:800px;">学习记录表</h1>
  <div style="margin-right: 110px;margin-top: 30px;">
      <form action="select-organizer.php" method="post" style="border: 1px solid gray; border-radius: 20px; padding: 5px; background-color: #B0C4DE;">
      <input type="text" name="username" placeholder="输入入党积极分子用户名" style="font-size: 25px; border-radius: 20px; border: none; outline: none; padding: 5px;width: 100px">
      <input type="submit" value="搜索" style="font-size: 20px; border: 1px solid black; outline: none; border-radius: 10px;padding: 5px; background-color: #ccc;">
    </form>
  </div>
</div>
    <div style="display: flex; justify-content: center; align-items: center;">
    <table  >
        <thead >
            <tr>
                <th>用户名</th>
                <th>成绩</th>
                <th style=" padding-left: 120px;padding-right: 120px;">开始时间</th>
                <th style=" padding-left: 120px;padding-right: 120px;">结束时间</th>
            </tr>
        </thead>
        <tbody >
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["score"]; ?></td>
                    <td><?php echo $row["start_time"]; ?></td>
                    <td><?php echo $row["end_time"]; ?></td>             
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
   </div>

    </div>

    
    
</body>
</html>


