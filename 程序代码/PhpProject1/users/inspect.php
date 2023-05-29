
<style>
    .kaoshi{font-size: 18px;color: white; margin-right: 10px; border: 1px solid green; background-color: green; padding: 5px 10px; float: right;}
    .kaoshi:hover {font-size: 20px;color: white; margin-right: 8px; border: 1px solid green; background-color: green; padding: 5px 10px; float: right;}
</style>
<?php
session_start();
// Check if the form was submitted

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
  
$sql=" select distinct no from paper  order by end desc";
$result=$conn->query($sql);
$username=$_SESSION["username"];
                                                                            
while ($row = mysqli_fetch_assoc($result)) {
$no=$row["no"];
$sqll=" select * from paper where $no=no  ";
//查看是否做完试卷
$sqlll="select * from inspect where no=$no and username='$username'";
$re=$conn->query($sqlll);
$sc=NULL;
if (mysqli_num_rows($re) >= 1){
$ro=mysqli_fetch_assoc($re);
$sc=$ro["score"];
}
//查看是否做完试卷        
$res=$conn->query($sqll);
$slicedArray = array();
while ($ro = mysqli_fetch_assoc($res)) {
    $key = $ro["num"];
    $slicedArray[$key] = $key;
    $startDateTime=$ro["start"];
    $endDateTime=$ro["end"];
}
$time= date('Y-m-d H:i:s', strtotime('+6 hours'));


echo '<div style="background-color: white; padding: 20px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">';
if($time<=$endDateTime && $time>=$startDateTime){
    if(isset($sc)==FALSE)    
    {         
    $_SESSION["time"]=$time; 
    ?>
   <form action="paper.php" method="post" >
    <input type="hidden" name="no"  value="<?php echo $no; ?>">
    <button type="submit" class="kaoshi">进入考试</button>
   </form>
  
<?php
    }else {
      echo '<span style="font-size: 18px; color: white; margin-right: 10px; border: 1px solid green; background-color: green; padding: 5px 10px; float: right;">已完成考试</span>';
     }
}  else {
    echo '<span style="font-size: 18px; color: white; margin-right: 10px; border: 1px solid green; background-color: darkred; padding: 5px 10px; float: right;">已结束</span>';
}
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
if(isset($sc)){
    echo '<span style="font-size: 18px; color: white; margin-right: 10px; border: 1px solid green; background-color: green; padding: 5px 10px; float: right;">'.$sc.'</span>';
}  else {
    echo '<span style="font-size: 18px; color: white; border: 1px solid green; background-color: darkred; padding: 5px 10px; float: right;">未作答</span>';
}
echo '</div>';
echo '</div>';
}
?>