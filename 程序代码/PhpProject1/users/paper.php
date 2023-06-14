<head>
    <?php include '../js/love.php';?>
</head>
<?php
// 连接数据库
session_start();

$username=$_SESSION["username"];
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

 body {
    background-color: #fff;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .form-wrapper {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 400px;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #f7f7f7;
    border-radius: 10px;
  }

  label {
    font-size: 18px;
    color: #444;
    margin-bottom: 10px;
    display: block;
  }

  input[type="datetime-local"] {
    width: 100%;
    height: 40px;
    font-size: 16px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
  }
input[type=checkbox] {
  transform: scale(1.8);
  margin: 20px;
}
  input[type="submit"] {
    width: 100%;
    height: 40px;
    font-size: 18px;
    color: #fff;
    background-color: #337ab7;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #23527c;
  }
</style>
<form action="inspect-submit.php" method="POST" style="">
    <h1>考试题</h1>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $no=$_POST["no"];
  $sqll=" select * from paper where $no=no  ";
  $res=$conn->query($sqll);
  $slice = array();
  while ($ro = mysqli_fetch_assoc($res)) {
    $key = $ro["num"];
    $slice[$key] = $key;
}
}
// retrieve questions from database
$query = "SELECT * FROM question_bank order by no";
$result = mysqli_query($conn, $query);

$sqll = "SELECT count(no) FROM question_bank";
$res = mysqli_query($conn, $sqll);
 while ($row = mysqli_fetch_assoc($res)) {
 $num=$row["count(no)"];
 }
 //生成随机数组
$random_numbers = $slice;
    $i = 1;
    foreach ($random_numbers as $number) {     
        // display question number and content
        while ($row = mysqli_fetch_assoc($result)) {
        if($row["option1"]==NULL&&$row["option2"]==NULL&&$row["option3"]==NULL&&$row["option4"]==NULL){
            echo "<p>". "【主观题】". $i . ". " . $row["content"] . "</p>";
            echo "<input type='text' name='answer-".$row["no"] . "' ><br>";
        }  
        elseif($number==$row["no"]&& strlen($row["answer"])==1){
        if ($row["option3"]!=NULL) {        
        echo "<p>". "【单选题】". $i . ". " . $row["content"] . "</p>";}
        else {
        echo "<p>". "【判断题】". $i . ". " . $row["content"] . "</p>";}
        
        // display answer choices as radio buttons
        echo "<div>";        
       if ($row["option1"]!=NULL) { echo "<input type='radio' name='answer-" . $row["no"] . "' value='A'>" . $row["option1"] . "<br>";}
       if ($row["option2"]!=NULL) { echo "<input type='radio' name='answer-" . $row["no"] . "' value='B'>" . $row["option2"] . "<br>";}
       if ($row["option3"]!=NULL){ echo "<input type='radio' name='answer-".$row["no"] . "' value='C'>" . $row["option3"] . "<br>";}
       if ($row["option4"]!=NULL){echo "<input type='radio' name='answer-" . $row["no"] . "' value='D'>" . $row["option4"] . "<br>";}
        echo "</div>";      
            }
          elseif($number==$row["no"]&& strlen($row["answer"])>1) {
    if ($row["option1"]==NULL) {    
        echo "<p>". "【主观题】". $i . ". " . $row["content"] . "</p>";
        echo "<input style='width:200px;height:100px;'type='textarea' name='answer-".$row["no"] . "' ><br>";
    }else{ 
    echo "<p>". "【多选题】". $i . ". " . $row["content"] . "</p>";
    
    // display answer choices as checkboxes
    echo "<div>";        
    if ($row["option1"]!=NULL) { echo "<input type='checkbox' name='answer-" . $row["no"] . "[]' value='A'>" . $row["option1"] . "<br>";}
    if ($row["option2"]!=NULL) { echo "<input type='checkbox' name='answer-" . $row["no"] . "[]' value='B'>" . $row["option2"] . "<br>";}
    if ($row["option3"]!=NULL) { echo "<input type='checkbox' name='answer-" . $row["no"] . "[]' value='C'>" . $row["option3"] . "<br>";}
    if ($row["option4"]!=NULL) {echo "<input type='checkbox' name='answer-" . $row["no"] . "[]' value='D'>" . $row["option4"] . "<br>";}
    echo "</div>";  }    

        } 
        }
        $i++;
        $query = "SELECT * FROM question_bank order by no";
        $result = mysqli_query($conn, $query);   
    }
?>
    <input type="hidden" name="no"  value="<?php echo $no; ?>">
    <button type="submit" class="sub">提交</button>
</form>



<?php
$conn->close();

?>
