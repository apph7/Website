
<?php
// 连接数据库
session_start();
if(isset($_SESSION['start_time'])==FALSE){
$_SESSION['start_time']=date('Y-m-d H:i:s', strtotime('+6 hours'));}
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

?>

<style>
body {
    background-image: url("../image/木白.png");
    background-size: 100%;
}
form{
    font-size: 25px;    
     margin: 0 auto;
    padding: 20px;
    margin-top: 30px;
}
input[type=radio] {
  transform: scale(1.8);
  margin: 20px;
}
.form input[type="submit"]:hover {
  background-color: #ff9966;
 
}
.sub {
  display: flex;
  flex-direction: column;
  background-color: #ff6633;
  color: #fff;
  border: 10px;
  padding: 10px 70px 10px 70px; 
  border-radius: 5px;
  font-size: 18px;
  cursor: pointer;
 
}
h1{
    text-align: center;
    display: flex;
    flex-direction: column;
    background-color: #ff6633;
    color: #fff;
    border: 20px;
    border-radius: 10px;  
    cursor: pointer;
}
</style>
<form action="submit.php" method="POST" style="">
    <h1>自学自考试题</h1>
<?php
// retrieve questions from database
$query = "SELECT * FROM question_bank order by no";
$result = mysqli_query($conn, $query);

$sqll = "SELECT count(no) FROM question_bank";
$res = mysqli_query($conn, $sqll);
 while ($row = mysqli_fetch_assoc($res)) {
 $num=$row["count(no)"];
 }
 //生成随机数组
$random_numbers = array();

while (count($random_numbers) < 10) {
  $random_number = rand(1, $num);
  if (!in_array($random_number, $random_numbers)) {
    $random_numbers[] = $random_number;
  }
}

    $i = 1;
    foreach ($random_numbers as $number) {
        if($i<=10){
        // display question number and content
        while ($row = mysqli_fetch_assoc($result)) {
          
            if($number==$row["no"]){
        echo "<p>" . $i . ". " . $row["content"] . "</p>";
        // display answer choices as radio buttons
        echo "<div>";        
        echo "<input type='radio' name='answer-" . $row["no"] . "' value='A'>" . $row["option1"] . "<br>";
        echo "<input type='radio' name='answer-" . $row["no"] . "' value='B'>" . $row["option2"] . "<br>";
        echo "<input type='radio' name='answer-" . $row["no"] . "' value='C'>" . $row["option3"] . "<br>";
        if ($row["option4"]!=NULL) {echo "<input type='radio' name='answer-" . $row["no"] . "' value='D'>" . $row["option4"] . "<br>";}
        echo "</div>";      
            } 
        }
        $i++;
        $query = "SELECT * FROM question_bank order by no";
        $result = mysqli_query($conn, $query);
    }
    }
?>
    <input type="submit" name="submit"  class="sub" value="提交">
</form>


<?php
$conn->close();

?>
