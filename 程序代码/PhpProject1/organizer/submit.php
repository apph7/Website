<?php include '../js/love.php';?>
 <?php
// Start a session
session_start();
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
  
$results = array();
foreach ($_POST as $name => $value) {
  $results[$name] = $value;
}
$count = count($results);
// 截取数组的前 n-2 个键值对
$slicedArray = array_slice($results, 0, $count - 2, true);

// 遍历截取后的数组并输出键值对

$start = $_POST['start-time'];
$end = $_POST['end-time'];

// 将日期时间格式转换为所需的格式
$startDateTime = date('Y-m-d H:i:s', strtotime($start));
$endDateTime = date('Y-m-d H:i:s', strtotime($end));
////////////
$num="SELECT COUNT(DISTINCT no) FROM paper;";
$res=$conn->query($num);    

$ro = mysqli_fetch_assoc($res) ;
$no=$ro["COUNT(DISTINCT no)"] +1 ;
foreach ($slicedArray as $key => $value) {
    $sql="insert into paper values('$no','$key','$startDateTime','$endDateTime')";
    $conn->query($sql);
}
// 输出转换后的日期时间格式
echo '<div style="background-color: white; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">';
echo '<h2 style="font-size: 24px; color: #333; margin-bottom: 10px;">试卷信息</h2>';

echo '<div style="margin-bottom: 10px;">';
echo '<span style="font-size: 18px; color: #666; margin-right: 10px;">试题编号：</span>';
echo '<span style="font-size: 18px; color: #333;">' . $no . '</span>';
echo '</div>';

echo '<div style="margin-bottom: 10px;">';
echo '<span style="font-size: 18px; color: #666; margin-right: 10px;">题号：</span>';
echo '<span style="font-size: 18px; color: #333;">';

foreach ($slicedArray as $key => $value) {
    echo $value . '  ';
}

echo '</span>';
echo '</div>';

echo '<div style="margin-bottom: 10px;">';
echo '<span style="font-size: 18px; color: #666; margin-right: 10px;">起始时间：</span>';
echo '<span style="font-size: 18px; color: #333;">' . $startDateTime . '</span>';
echo '</div>';

echo '<div>';
echo '<span style="font-size: 18px; color: #666; margin-right: 10px;">结束时间：</span>';
echo '<span style="font-size: 18px; color: #333;">' . $endDateTime . '</span>';
echo '</div>';

echo '</div>';


}
?>
