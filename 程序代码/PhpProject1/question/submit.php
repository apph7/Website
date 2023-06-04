<!DOCTYPE html>
<html>
<head>
    <?php include '../js/love.php';?>
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
  height: 525px;
  display: inline-block;
  max-width: 300px;
  background-color: #fff; 
  padding: 80px;
  padding-top: 0px;
  
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
        <div style="background-image: url('../image/R.jfif');background-size:100% 100%;background-attachment:fixed;margin-top:30px">
    <div style="margin-left:140px;">
        <div>
            <img src="../image/lin.png" style="width: 800px;margin-top: 110px;margin-left: 100px;height: 605px;display: inline-block;float: left;">
        </div>
        <div  >
            <form name="myForm" onsubmit="return validateForm()" action="submit.php" method="post" style="margin-bottom:68px;">
                            <h2 >添加题目</h2>
				<input type="textarea"  style="width: 100%;
                                       height: 100px;
                                       padding: 10px;
                                       margin-bottom: 20px;
                                       border: 1px solid #ccc;
                                       border-radius: 5px;
                                       font-size: 16px;
                                       color: #333;"name="content" placeholder="题目内容">                           				
				<input type="text" name="option1" placeholder="选项A">                            
                                <input type="text" name="option2" placeholder="选项B">  
                                <input type="text" name="option3" placeholder="选项C"> 
                                <input type="text" name="option4" placeholder="选项D"> 
                                <input type="text" name="answer" style="margin-bottom: 0px;" placeholder="答案"> 
                                <input type="submit"style=" " value="添加" >   
                                
	  </form>
                    
	</div>
    </div> 
       </div>
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sgm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$num="select count(no) from question_bank ";
$res=$conn->query($num);    

$ro = mysqli_fetch_assoc($res) ;
$no=$ro["count(no)"] +1 ;
// Get user input from for
$content= trim($_POST["content"]);
$option1 = trim($_POST["option1"]);
$option2 = trim($_POST["option2"]);
$option3 = trim($_POST["option3"]);
$option4 = trim($_POST["option4"]);
$answer=   trim($_POST["answer"]);
// Insert user data into database
$sql = "INSERT INTO question_bank (no,content,option1,option2,option3,option4,answer) VALUES ('$no', '$content','$option1','$option2','$option3','$option4','$answer')";
if(empty($no) !=TRUE  && empty($content)!=TRUE){
if ($conn->query($sql) === TRUE ) {
     echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
   echo "<script>swal('添加成功');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 }
}
else {
          echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js'></script>";
   echo "<script>swal('添加失败');</script>";
}

$conn->close();
?>



