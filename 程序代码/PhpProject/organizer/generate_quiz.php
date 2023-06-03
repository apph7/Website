<script>
  function getCurrentDateTime() {
    var now = new Date();
    var month = (now.getMonth() + 1).toString().padStart(2, '0');
    var day = now.getDate().toString().padStart(2, '0');
    var currentDateTime = now.getFullYear() + '-' + month + '-' + day;
    return currentDateTime;
  }
</script>
<script>
  // 设置起始时间的初始值为当前日期
  document.getElementById("start-time").value = getCurrentDateTime();

  // 设置结束时间的初始值为当前日期的后一天
  var tomorrow = new Date();
  tomorrow.setDate(tomorrow.getDate() + 1);
  document.getElementById("end-time").value = tomorrow.toISOString().slice(0, -8);
</script>

<?php
// 连接数据库
session_start();

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

    margin-top: 30px;
}
input[type=radio] {
   
  transform: scale(1.8);
  margin: 20px;
}
.form input[type="submit"]:hover {
  background-color: #ff9966;
 
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
  table {
  text-align: center;
  font-size: 16px;
  border-collapse: collapse;

 
}

table th {
  background-color: #ff6633;
  color: #fff;
  font-size: 18px;
  font-weight: bold;
  padding: 10px;
 
}

table td {
  border: 1px solid #ccc;
  padding: 5px;
  vertical-align: top;
  font-size: 18px;
  color: black;
}

table tr:nth-child(odd) {
  background-color: #f2f2f2;
}
</style>
<form action="submit.php" method="POST"  onsubmit="return validateForm();">
    <h1>试卷试题</h1>
   
<?php
// retrieve questions from database
$query = "SELECT * FROM question_bank order by no";
$result = mysqli_query($conn, $query);


$i=1;
while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <table class="ti">
        <td>
    <?php
        echo "<input type='radio'  name='".$i."' value='".$row["no"]."'>" . $row["content"] . "</p>";
        // display answer choices as radio buttons
   
        $i++;
        ?>
        </td>
    </table>
    <?php
            } 
        
    
?>
  </div>
    <div class="form-wrapper"> 
    <label for="start-time">试卷起始时间：</label>
    <input type="datetime-local" id="start-time" name="start-time" required><br>

    <label for="end-time">试卷结束时间：</label>
    <input type="datetime-local" id="end-time" name="end-time" required><br>
    
    <input type="submit" class="sub" value="发布试卷">
  </div>
</form>


<?php
$conn->close();

?>
