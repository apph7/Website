<!DOCTYPE html>
<html>
<head>
	<title>党的知识测试系统</title>
        <style>
   
            
 .register {
display: flex;
  flex-direction: column;
  align-items: center;
 
  background-color: rgb(32,178,170);
  color: #fff;
  border: 10px;
  padding: 10px 10px 10px 10px;

  border-radius: 20px;
  font-size: 18px;
  cursor: pointer;
  align-content: center;
  float: right;
}
.register:hover {
background-color:#5F9EA0;
}
.register:active {
background-color:#008080;
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
  height: 440px;
  display: inline-block;
  max-width: 300px;
  background-color: #fff; 
  padding: 80px;
  
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

  background-color: rgb(32,178,170);
  color: #fff;
  border: 10px;
  padding: 10px 40px 10px 40px;

  border-radius: 20px;
  font-size: 18px;
  cursor: pointer;
  align-content: center;
}
form input[type="submit"]:hover {
background-color:#5F9EA0;
}
form input[type="submit"]:active {
background-color:#008080;
}
        </style>
</head>
<div style="background-image: url('../PhpProject1/image/R.jfif');background-size:100% 100%;background-attachment:fixed;margin-top:30px">
    <div style="margin-left:140px;">
        <div>
            <img src="../PhpProject1/image/lin2.png"  style="width: 800px;margin-top: 110px;margin-left: 100px;height: 600px;display: inline-block;float: left;">
        </div>
	<div class="container">
		<div class="form">
                    <form action="recover-password.php" method="post" style="margin-bottom:68px;">
                            <h2>找回密码</h2>
				<input type="text" name="username" placeholder="用户名"required>
                                <input type="email" id="email" name="email" placeholder="注册所用邮箱"><br><br>				
				<input type="password" name="password" placeholder="重置密码"required>
				<input type="password" name="confirm_password"placeholder="确认密码" required>                                               
                                <input type="submit" style=" margin-left: 100px"value="重置">
                                 <a href="home.php"class="register ">返回</a>
			</form>
		</div>
	</div>
    </div>
</div>
</body>
</html>