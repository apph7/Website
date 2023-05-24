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

$sql = "SELECT  * FROM question_bank order by no";
$result = $conn->query($sql);





// Display user data in HTML table
?>
<!DOCTYPE html>
<html>
<head>
    <title>题目列表</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style>
body {
    background-image: url("../image/木白.png");
    background-size: 100%;
   
}
   </style>
</head>
<body>
   

    <h1 style="text-align: center;color: darkgray;">题目列表</h1>
    <div>
                         <a href="../question/add_question.php" class="add-user" style="display: block;
 background-color: #C0C0C0;
  width: 120px; /* 设置盒子的宽度 */
  height: 40px; /* 设置盒子的高度 */
  border: 1px solid #ccc; /* 设置边框 */
  display: flex; /* 使用 flex 布局 */
  justify-content: center; /* 水平居中 */
  align-items: center; /* 垂直居中 */
  text-align: center; /* 居中对齐 */
  font-size: 24px; /* 设置字体大小 */
  line-height: 1.5; /* 设置行高 */
  border-radius: 10px; /* 设置边框圆角半径 */
  text-align: right;">添加题目</a>
    </div>  

    <div style="text-align: center">
    <table  style="text-align: center">
        <thead>
            <tr>
                <th>题目编号</th>
                <th>题目详情</th>
                <th>选项A</th>
                <th>选项B</th>
                <th>选项C</th>
                <th>选项D</th>
                <th>答案</th>
            </tr>
        </thead>
        <tbody >
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["no"]; ?></td>
                    <td><?php echo $row["content"]; ?></td>
                    <td><?php echo $row["option1"]; ?></td>
                    <td><?php echo $row["option2"]; ?></td>
                    <td><?php echo $row["option3"]; ?></td>
                    <td><?php echo $row["option4"]; ?></td>
                    <td><?php echo $row["answer"]; ?></td>
      
                    
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
        </div>
   
</body>
</html>
