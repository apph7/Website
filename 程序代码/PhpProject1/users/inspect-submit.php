<?php session_start();   ?>
<!DOCTYPE html>
    <title>题目详情</title>
    <?php include '../js/love.php';?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style>
body {
    background-image: url("../image/木白.png");
    background-size: 100%;
   
}
.but{
    display: inline-block;
  background-color: #ff6633;
  color: #fff;
  border: none;
  padding: 20px;
  margin-left: 100px;
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
  text-align: right; /* 将注册按钮靠右对齐 */
  margin-top: 20px; /* 添加顶部外边距，以与表单分隔 */
}
   </style>
   <?php include ("../header.php"); ?>
    
<?php
// Start a session

$time=$_SESSION["time"];
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Get the answers from the form
$results = array();

foreach($_POST as $key=>$value) {
    
    if(is_array($value)){
        // for multiple answers
        $s=  implode($value);
        $results[$key] = $s;
    }else{
        // for single answer
        $results[$key] = $value; 
    }
}
$numm=count($results)-1;
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
//获取试题信息
$no=$_POST["no"];
$sqll=" select * from paper where $no=no  ";
$res=$conn->query($sqll);
$slice = array();
while ($ro = mysqli_fetch_assoc($res)) {
    $key = $ro["num"];
    $slice[$key] = $key;
}
//获取试题信息

// Get the correct answers from the database
  $sql = "SELECT * FROM question_bank";
  $result = mysqli_query($conn, $sql);
    
  // Check if there are any results
  if (mysqli_num_rows($result) > 0) {
    // Initialize the score to 0
    $score = 0;
    // Loop through each question
    foreach ($results as $key => $value) {
        
    
    while ($row = mysqli_fetch_assoc($result)) {
      // Check if the user's answer matches the correct answer
     
      $num = 'answer-' . $row["no"];
      if($key==$num){
      $user_answer=$value;
      $correct_answer = $row["answer"];

       //在此进行题目详解
      ?>
     <div style="text-align: center;margin-left: 100px;">
       <table  style="text-align: center">
      
        <tbody>      
                <tr>
                    <td><?php echo  $row["content"]; ?></td>
                    <td><?php echo  '所选:'.$user_answer; ?></td>
                    <td><?php echo '答案：'.$correct_answer; ?></td>   
                    <td><?php if($user_answer==$correct_answer){ ?>
                     <p style="color:green">&#10003;</p><?php
                     }else{ ?> <p style="color:#ff6633">&#10007;</p>  <?php } ?></td> 
                </tr>
     
        </tbody>
    </table>
    </div>    
     
     <?php
      if ($user_answer == $correct_answer) {
        // Increment the score if the answer is correct
        $score += 1;
      }

      // Move on to the next question     
    }
   
    }
    $sql = "SELECT * FROM question_bank";
    $result = mysqli_query($conn, $sql);
    
  }
    //将答题情况上传至数据库，有答题人、成绩等等
     $score=round(($score / $numm) * 100);
     $username = $_SESSION['username'];    
     $currentDateTime = date('Y-m-d H:i:s', strtotime('+6 hours'));
     $cha=strtotime($currentDateTime)-strtotime($time);
     $learning = "insert into inspect  values('$no','$username','$score','$cha','$currentDateTime')";
     if(trim($username)!=NULL)
     {$result = mysqli_query($conn, $learning);}
    
    if (mysqli_affected_rows($conn) == 1) {
    ?>
       <div style="display:flex; justify-content:center; align-items:center; height:100%;">
    <span style="border: 1px solid gray; padding: 10px;background-color: lightgray;color: black;">考试记录保存成功</span>
       </div>
    <?php
    } else {
     ?>
   <div style="display:flex; justify-content:center; align-items:center; height:100%;">
    <span style="border: 1px solid gray; padding: 10px;background-color: lightgray;color: black;">考试记录保存失败，出现错误！</span>
       </div>
   
    <?php
     }
     
    

     
    // Save the score in the session
    $_SESSION["score"] = $score;
   
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
   echo "<script>swal('分数为$score');</script>";
    exit;
    // Close the database connection
    mysqli_close($conn);
    // Redirect to the score page
   
  } else {
    echo "No questions found in the database.";
  }
}
?>
