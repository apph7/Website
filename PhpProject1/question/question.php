<style>
    .add-user{
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color:rgb(32,178,170);
  color: #fff;
  border: 10px;
  padding: 10px 10px 10px 10px;
  margin: 10px 30px 10px 0px;
  border-radius: 20px;
  font-size: 18px;
  cursor: pointer;
  align-content: left;
  margin-left: 30px;
  width:9%;
    }
    .add-user:hover{
       background-color: #C0C0C0; 
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
form input[type="text"]{
      width: 5%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
  color: #333;
}
</style>

<?php
ob_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
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
<div >



<form action="question.php" method="post">
  <input type="text" name="delete-no" style="margin-left:40px;">
  <button type="submit" value="删除题目"></button>
</form>


</div>
<div >
    <a href="../question/add_question.php" class="add-user" style="">添加题目</a>
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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["delete-no"])&&trim($_POST["delete-no"])!=NULL){
         $no=$_POST["delete-no"];
         $sq="delete from question_bank where no=$no";
         $res=$conn->query($sq);
         //
         $sqll = "SELECT * FROM question_bank ";
         $re = $conn->query($sqll); 
         $k=1;
         while ($ro = mysqli_fetch_assoc($re)){           
                 if($k!=$ro["no"]){              
                     $ss=$ro["no"];
                     $s="update question_bank set no='$k' where no ='$ss'";
                     $r=$conn->query($s);
                  }
             $k++;
         }
        header("Refresh:0");
        exit();
        
    }
    
    
}
ob_end_flush();
?>