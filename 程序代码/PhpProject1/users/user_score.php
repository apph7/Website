<?php

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
$sessionStatus = session_status();
if ($sessionStatus == PHP_SESSION_ACTIVE) {
$username=$_SESSION["username"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST["username"])) {
    
    $username=$_POST["username"];
}
$s1="SELECT count(username) FROM inspect where username='$username' and  score<20 and score>=0";
$r1=$conn->query($s1);
  while ($ro1 = mysqli_fetch_assoc($r1)) {
      $c1=$ro1["count(username)"];
  }
$s2="SELECT count(username) FROM inspect where username='$username' and  score<40 and score>=20";
$r2=$conn->query($s2);
  while ($ro2 = mysqli_fetch_assoc($r2)) {
      $c2=$ro2["count(username)"];
  }
$s3="SELECT count(username) FROM inspect where username='$username' and  score<60 and score>=40";
$r3=$conn->query($s3);
  while ($ro3 = mysqli_fetch_assoc($r3)) {
      $c3=$ro3["count(username)"];
  }
$s4="SELECT count(username) FROM inspect where username='$username' and  score<80 and score>=60";
$r4=$conn->query($s4);
  while ($ro4 = mysqli_fetch_assoc($r4)) {
      $c4=$ro4["count(username)"];
  }
$s5="SELECT count(username) FROM inspect where username='$username' and  score<=100 and score>=80";
$r5=$conn->query($s5);
  while ($ro5 = mysqli_fetch_assoc($r5)) {
      $c5=$ro5["count(username)"];
  }

  
  
  
  $s1="SELECT count(username) FROM learning_record where username='$username' and  score<20 and score>=0";
$r1=$conn->query($s1);
  while ($ro1 = mysqli_fetch_assoc($r1)) {
      $c6=$ro1["count(username)"];
  }
$s2="SELECT count(username) FROM learning_record where username='$username' and  score<40 and score>=20";
$r2=$conn->query($s2);
  while ($ro2 = mysqli_fetch_assoc($r2)) {
      $c7=$ro2["count(username)"];
  }
$s3="SELECT count(username) FROM learning_record where username='$username' and  score<60 and score>=40";
$r3=$conn->query($s3);
  while ($ro3 = mysqli_fetch_assoc($r3)) {
      $c8=$ro3["count(username)"];
  }
$s4="SELECT count(username) FROM learning_record where username='$username' and  score<80 and score>=60";
$r4=$conn->query($s4);
  while ($ro4 = mysqli_fetch_assoc($r4)) {
      $c9=$ro4["count(username)"];
  }
$s5="SELECT count(username) FROM learning_record where username='$username' and  score<=100 and score>=80";
$r5=$conn->query($s5);
  while ($ro5 = mysqli_fetch_assoc($r5)) {
      $c10=$ro5["count(username)"];
  }
  ?>
  
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="width:80%;height:400px;margin: 0 auto"></div>
	 <!-- ;margin-top:80px;控制距离顶部距离 -->
	<div id="main2"></div>
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
            [
                'echarts',
                'echarts/chart/bar', // 使用柱状图就加载bar模块，按需加载
				'echarts/chart/line'
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main')); 
				var myChart2 = ec.init(document.getElementById('main2'));
                
                var option = { //具体细节的描述
                                    title: {
                                        text: '成绩分布图',
                                        textStyle: { //主标题文本样式{"fontSize": 18,"fontWeight": "bolder","color": "#333"}
                                            fontSize: 20,
                                            fontStyle: 'normal',
                                            fontWeight: 'bold',
                                        },
                                    },
                                    tooltip: {
                                        trigger: 'axis'
                                    },
                                    legend: {
                                        data: ['考试成绩', '自学自考']
                                    },
                                    toolbox: { //可以选择具体数据，柱状图，折线图，还原，保存图片的的切换选择
                                        show: true,
                                        feature: {
                                            dataView: {
                                                show: true,
                                                readOnly: false
                                            },
                                            magicType: {
                                                show: true,
                                                type: ['line', 'bar'] //可选折线图和柱状图
                                            },
                                            restore: {
                                                show: true  //恢复默认
                                            },
                                            saveAsImage: {
                                                show: true // 存储为图片的功能
                                            }
                                        }
                                    },
                                    calculable: true,
                                    xAxis: [{
                                        type: 'category',
										//name: 'min_sup(%)'
                                        data: ['[0,20)', '[20,40)', '[40,60)', '[60,80)','[80,100]'],
										name: '成绩区间',
										position: 'left'
                                    }],
                                    yAxis: [{
                                        type: 'value',
										name: '成绩次数',
										position: 'left'
                                    }],
                                    series: [{
                                            name: '考试成绩',
                                            type: 'bar',// bar
                                            data: [<?php echo $c1 ?>, <?php echo $c2 ?>, <?php echo $c3 ?>, <?php echo $c4 ?>,<?php echo $c5 ?>],
                                            color: '#CC0066'
                                        },
                                        {
                                            name: '自学自考',
                                            type: 'bar',//bar
                                            data: [<?php echo $c6 ?>, <?php echo $c7 ?>, <?php echo $c8 ?>, <?php echo $c9 ?>,<?php echo $c10 ?>],
                                            color: '#009999'
                                        }
                                    ]
                                };
								
						
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
				
            }
        );
    </script>
<?php
$s1="SELECT AVG(score) FROM inspect where username='".$username."'";
$r1=$conn->query($s1);
while ($ro1 = mysqli_fetch_assoc($r1)) {
    $c1=$ro1["AVG(score)"];
}
$s2="SELECT AVG(score) FROM learning_record where username='".$username."'";
$r2=$conn->query($s2);
while ($ro2 = mysqli_fetch_assoc($r2)) {
    $c2=$ro2["AVG(score)"];
}
?>
<div style="text-align: center; background-color:RGBa（230,230,250,0.5）; padding: 24px;">
    <p style="margin: 0; font-size: 36px; color: black;display:inline-block;"><?php echo number_format($c1, 2); ?></p>&nbsp;&nbsp;&nbsp;
    <p style="margin: 0; font-size: 18px; color: black;display:inline-block;">考核均分</p>&nbsp;&nbsp;&nbsp;
    <p style="margin: 0; font-size: 36px; color: black;display:inline-block;"><?php echo number_format($c2, 2); ?></p>&nbsp;&nbsp;&nbsp;
    <p style="margin: 0; font-size: 18px; color: black;display:inline-block;">学习均分</p>  
</div>