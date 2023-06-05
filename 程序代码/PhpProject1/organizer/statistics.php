<?php
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



// 执行查询语句
$sql = "SELECT login, learn, time FROM statistics ORDER BY time DESC";
$result = $conn->query($sql);

// 提取数据
$loginData = [];
$learnData = [];
$timeData = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $loginData[] = $row['login'];
        $learnData[] = $row['learn'];
        $timeData[] = $row['time'];
    }
}

// 关闭数据库连接
$conn->close();

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>ECharts</title>
</head>
<body>
    <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div id="main" style="margin-top: 300px;width:80%;height:400px;margin: 0 auto;background-color: white"></div>
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
                                        text: '最近登录/学习统计表',
                                        textStyle: { //主标题文本样式{"fontSize": 18,"fontWeight": "bolder","color": "#333"}
                                            fontSize: 14,
                                            fontStyle: 'normal',
                                            fontWeight: 'bold',
                                        },
                                    },
                                    tooltip: {
                                        trigger: 'axis'
                                    },
                                    legend: {
                                        data: ['登录次数', '学习次数']
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
                                        data: ['<?php echo $timeData[0]  ?>', '<?php echo $timeData[1]  ?>', '<?php echo $timeData[2]  ?>', '<?php echo $timeData[3]  ?>','<?php echo $timeData[4]  ?>','<?php echo $timeData[5]  ?>','<?php echo $timeData[6]  ?>'],
										name: '日期',
										position: 'left'
                                    }],
                                    yAxis: [{
                                        type: 'value',
										name: '登录/学习人数',
										position: 'left'
                                    }],
                                    series: [{
                                            name: '登录人数',
                                            type: 'line',// bar
                                            data: [<?php echo $loginData[0]  ?>, <?php echo $loginData[1]  ?>, <?php echo $loginData[2]  ?>, <?php echo $loginData[3]  ?>,<?php echo $loginData[4]  ?>,<?php echo $loginData[5]  ?>,<?php echo $loginData[6]  ?>],
                                            color: '#CC0066'
                                        },
                                        {
                                            name: '学习人数',
                                            type: 'line',//bar
                                            data: [<?php echo $learnData[0]  ?>, <?php echo $learnData[1]  ?>, <?php echo $learnData[2]  ?>, <?php echo $learnData[3]  ?>,<?php echo $learnData[4]  ?>,<?php echo $learnData[5]  ?>,<?php echo $learnData[6]  ?>],
                                            color: '#009999'
                                        }
                                    ]
                                };
								
							
				
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
		
            }
        );
    </script>
</body>