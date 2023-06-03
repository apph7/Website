
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
while ($row = mysqli_fetch_assoc($result)) {
$no=$row["no"];
$sqll=" select * from paper where $no=no  ";
$res=$conn->query($sqll);
$slicedArray = array();
while ($ro = mysqli_fetch_assoc($res)) {
    $key = $ro["num"];
    $slicedArray[$key] = $key;
    $startDateTime=$ro["start"];
    $endDateTime=$ro["end"];
}
$time= date('Y-m-d H:i:s', strtotime('+6 hours'));
//查看做题合格率，做题人数
$sq="select * from inspect where no=$no";
$re=$conn->query($sq);
$num=0;
$pass=0;
if(mysqli_num_rows($re)>0){
    while ($row = mysqli_fetch_assoc($re)) {
        $num+=1;
        if($row["score"]>=60){
            $pass+=1;
        }
    }
}


//查看做题合格率，做题人数
if($time<=$endDateTime && $time>=$startDateTime){
    echo '<span style="font-size: 18px; color: white; margin-right: 10px; border: 1px solid green; background-color: green; padding: 5px 10px; float: right;">正在进行</span>';
}  else {
    echo '<span style="font-size: 18px; color: white; margin-right: 10px; border: 1px solid green; background-color: darkred; padding: 5px 10px; float: right;">已结束</span>';
}
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

echo '<div style="margin-bottom: 40px;">';
?>
<div style="float: left;">
    <?php
        echo '<span style="font-size: 18px; color: #666; margin-right: 10px;">结束时间：</span>';
        echo '<span style="font-size: 18px; color: #333;">' . $endDateTime . '</span>';
    ?>
</div>
<div style="float: right;margin-bottom: 20px;">
<form  action="../organizer/paper-detail.php" method="post">
       <input name="no" value="<?php echo $no; ?>" type="hidden">
<button  style="float: right;padding: 0;margin-bottom: 0px;background-color: white;">
<span style="font-size: 18px; color: white; border: 1px solid green; background-color: silver; padding: 5px 10px; float: right;">做题人数：<?php echo $num ?></span>
<span style="font-size: 18px; color: white; border: 1px solid green; background-color: silver; padding: 5px 10px; float: right;">合格率：<?php 

if($num!=0)
echo round(($pass/$num)*100)."%";
else
echo '0';
?>
</span>
</button>
</form>
</div>
<?php
echo '</div>';
echo '</div>';

}

?>