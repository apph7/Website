<button id="popupButton">点击弹出内容</button>

<script type="text/javascript">
    document.getElementById('popupButton').addEventListener('click', function() {
        var popupDiv = document.createElement('div');
        popupDiv.style.position = "fixed";
        popupDiv.style.top = "0";
        popupDiv.style.left = "0";
        popupDiv.style.width = "100%";
        popupDiv.style.height = "100%";
        popupDiv.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
        popupDiv.style.zIndex = "999";
        popupDiv.style.display = "flex";
        popupDiv.style.justifyContent = "center";
        popupDiv.style.alignItems = "center";
        
        var contentDiv = document.createElement('div');
        contentDiv.style.backgroundColor = "rgba(255, 255, 255, 0.5)";
        contentDiv.style.marginLeft = "80px";
        contentDiv.style.marginRight = "80px";
        contentDiv.style.marginTop = "150px";
        contentDiv.style.backdropFilter = "blur(5px)";
        
        // 使用PHP嵌入的方式将统计内容放入弹出框中
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
        $sql = "SELECT login, learn, time FROM statistics";
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

        echo "contentDiv.innerHTML = '<div id=\"main\" style=\"margin-top: 300px;width:80%;height:400px;margin: 0 auto;background-color: white\"></div>';\n";
        echo "contentDiv.innerHTML += '<div id=\"main2\"></div>';\n";
        echo "contentDiv.innerHTML += '<script src=\"http://echarts.baidu.com/build/dist/echarts.js\"></script>';\n";
        echo "contentDiv.innerHTML += '<script type=\"text/javascript\">';\n";
        echo "contentDiv.innerHTML += 'require.config({ paths: { echarts: \"http://echarts.baidu.com/build/dist\" }});';\n";
        echo "contentDiv.innerHTML += 'require([\"echarts\",\"echarts/chart/bar\",\"echarts/chart/line\"],function(ec){';\n";
        echo "contentDiv.innerHTML += 'var myChart = ec.init(document.getElementById(\"main\"));';\n";
        echo "contentDiv.innerHTML += 'var myChart2 = ec.init(document.getElementById(\"main2\"));';\n";
        echo "contentDiv.innerHTML += 'var option = { ... }';\n";
        echo "contentDiv.innerHTML += 'myChart.setOption(option);';\n";
        echo "contentDiv.innerHTML += '});';\n";
        echo "contentDiv.innerHTML += '</script>';\n";
        ?>
        
        popupDiv.appendChild(contentDiv);
        document.body.appendChild(popupDiv);
    });
</script>
