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
table td{
    padding-left:100px;
    padding-right:100px
}
   </style>
   <?php include ("../header.php"); ?>
    
<?php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$no=$_POST["no"];

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

$s1="SELECT count(username) FROM inspect where no='$no' and score<20 and score>=0";
$r1=$conn->query($s1);
  while ($ro1 = mysqli_fetch_assoc($r1)) {
      $c1=$ro1["count(username)"];
  }
$s2="SELECT count(username) FROM inspect where no='$no' and score<40 and score>=20";
$r2=$conn->query($s2);
  while ($ro2 = mysqli_fetch_assoc($r2)) {
      $c2=$ro2["count(username)"];
  }
$s3="SELECT count(username) FROM inspect where no='$no' and score<60 and score>=40";
$r3=$conn->query($s3);
  while ($ro3 = mysqli_fetch_assoc($r3)) {
      $c3=$ro3["count(username)"];
  }
$s4="SELECT count(username) FROM inspect where no='$no' and score<80 and score>=60";
$r4=$conn->query($s4);
  while ($ro4 = mysqli_fetch_assoc($r4)) {
      $c4=$ro4["count(username)"];
  }
$s5="SELECT count(username) FROM inspect where no='$no' and score<=100 and score>=80";
$r5=$conn->query($s5);
  while ($ro5 = mysqli_fetch_assoc($r5)) {
      $c5=$ro5["count(username)"];
  }

  ?>
  


<div style="margin:0; margin-bottom: 0 !important;">
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width:50%;height:400px;margin: 0 auto"></div>
	 <!-- ;margin-top:80px;控制距离顶部距离 -->
  
    <!-- ECharts单文件引入 -->
    <script src="http://echarts.baidu.com/build/dist/echarts.js"></script>
    <script type="text/javascript">
        // 路径配置
        require.config({
            paths: {
                echarts: 'http://echarts.baidu.com/build/dist'
            }
        });    
        // 使用
        require(
            [ 'echarts', 'echarts/chart/bar', 'echarts/chart/line' ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main')); 			
                var option = {
				title: {text: '成绩分布图',textStyle: { //主标题文本样式{"fontSize": 18,"fontWeight": "bolder","color": "#333"}
				fontSize: 14,fontStyle: 'normal',fontWeight: 'bold',}, },
				tooltip: {trigger: 'axis'},
				toolbox: {
				show: true,feature: {dataView: {show: true,readOnly: false},
				magicType: {
				 show: true,type: ['line', 'bar'] },
				restore: {show: true},
				saveAsImage: {
				show: true}}},
				calculable: true,
				xAxis: [{
				type: 'category',data: ['[0,20)', '[20,40)', '[40,60)', '[60,80)','[80,100]'],name: '成绩区间',position: 'left' }],
				 yAxis: [{
				type: 'value',name: '人数',position: 'left' }],
				series: [{
				name: '人数',type: 'bar',data: [<?php echo $c1?>,<?php echo $c2?>,<?php echo $c3?>,<?php echo $c4?>,<?php echo $c5?>],color: '#CC0066' },   ]};							
                // 为echarts对象加载数据 
                myChart.setOption(option); 			    });
    </script>

  </div>
  

  
<?php
// Get the correct answers from the database
$sql = "SELECT * FROM inspect where no='$no'";
$result = mysqli_query($conn, $sql);
    
// Check if there are any results
if (mysqli_num_rows($result) > 0) {
?>
  <div style="display: flex; justify-content: center;">
      <table >
         <thead >
               <tr>
                    <td >试卷编号</td>
                    <td>用户名</td>
                    <td>答题时间</td>   
                    <td>成绩</td> 
                </tr>
             </thead>
        
 <?php

    while ($row = mysqli_fetch_assoc($result)) {
      
       //在此进行题目详解
      ?>   
  
                <tr>
                    <td style="text-align:center"><?php echo  $row["no"]; ?></td>
                    <td style="text-align:center"><?php echo  $row["username"]; ?></td>
                    <td style="text-align:center"><?php echo $row["time"].'秒'; ?></td>   
                    <td style="text-align:center"><?php if($row["score"]>=60){ ?>
                     <p style="color:green"><?php echo $row["score"] ?></p><?php
                     }else{ ?> <p style="color:#ff6633"><?php echo $row["score"] ?></p>  <?php } ?></td> 
                </tr>   
       
     
     <?php
    }
    ?>
   </table>
    </div> 
       <div style="display:flex; justify-content:center; align-items:center; height:100%;">
       <span style="border: 1px solid gray; padding: 10px;background-color: lightgray;color: black;">记录已保存</span>
       </div>
    <?php
   
     
    

     
    // Save the score in the session

    mysqli_close($conn);
    // Redirect to the score page
   
  } else {
    ?>
   <div style="display:flex; justify-content:center; align-items:center; height:100%;">
       <span style="border: 1px solid gray; padding: 10px;background-color: lightgray;color: black;">未有人答题，数据为空</span>
   </div>
   <?php
  }
}
?>
