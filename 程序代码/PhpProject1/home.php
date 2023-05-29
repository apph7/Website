
<!DOCTYPE html>
<html>
<head>
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
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background: linear-gradient(to bottom,#FFFFE0	, #E0FFFF);
  background-color: #E0FFFF;
  margin: auto;
  padding: 20px;
  border-radius: 20px;
  border: 1px solid #888;
  width: 500px;
  height: 400px;
  margin-top: 200px;
}

.modal-content p {
    font-size:22px;
 
}

.close-button {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close-button:hover,
.close-button:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

        </style>
</head>
<body>
    <div style="background-image: url('../PhpProject1/image/R.jfif');background-size:100% 100%;background-attachment:fixed;margin-top:30px;">
    <div style="margin-left:140px;">
        <div>
            <img src="../PhpProject1/image/lin.png" style="width: 800px;margin-top: 110px;margin-left: 100px;height: 600px;display: inline-block;float: left;">
        </div>
        <div  >
            <form name="myForm" onsubmit="return validateForm()" action="login.php" method="post" style="margin-bottom:68px;">
                            <h2 >党的知识测试系统登陆</h2>
				
                            <input type="text" name="username" style="margin-bottom:40px;"placeholder="用户名">                           
				
			  <div style="position: relative;">
                               <input type="password" id="password" name="password" style="margin-bottom:40px; padding-right: 10px;" placeholder="密码">
                          <div id="toggle-password" style="position: absolute; right: 5px; top: 5px; cursor: pointer;">
                               <img id="eye-icon" src="../PhpProject1/image/close.png" alt="eye" style="margin-top: 7px;width: 16px; height: 16px;">
                          </div>
                          </div>

<script>
    const passwordInput = document.querySelector('#password');
    const togglePassword = document.querySelector('#toggle-password');
    const eyeIcon = document.querySelector('#eye-icon');
    togglePassword.addEventListener('click', () => {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.src = '../PhpProject1/image/open.png';
        } else {
            passwordInput.type = 'password';
            eyeIcon.src = '../PhpProject1/image/close.png';
        }
    });
</script>



                                <select name="role" id ="role">
                                   <option value="admin">管理员</option>
                                   <option value="organizer">组织员</option>
                                   <option value="user">入党积极分子</option>
                                 </select>   
                                <a href="password.php">&nbsp;忘记密码？ </a>
                                <a href="rigister_login.php">注册&nbsp; </a>
                                
                                <input type="submit"style="margin-bottom:40px" value="登陆" >   
                                
  <!--  注意条款 以及制作感想-->                             
 <div class="modal" id="notice-modal">
  <div class="modal-content">
    <span class="close-button">×</span>
    <div style="">
        <p style="text-align:center">前端html犹如土壤~~</p>
        <p style="text-align:center">数据是一粒粒的种子~~</p>
        <p style="text-align:center">php数据处理方法是雨水~~</p>
        <p>    没有数据支撑的前端技术华而不实，没有前端制成的网页有的只是冰冷的数据</p>
        <p>    当土壤与种子相结合，再有了雨水的浇灌，它们的杰作才是那么伟大，茂盛的丛林、欣欣向荣的自然区，无疑带来美的感受---</p>
    </div>
  </div>
</div>

<div class="modal" id="terms-modal">
  <div class="modal-content">
    <span class="close-button">×</span>
    <div style="">
        <p style="text-align:center">全民制作人们大家好~~</p>   
        <p style="text-align:center">我是个人练习时长2周半的 "个人练习生"</p>
        <p style="text-align:center">计算2101孙国铭</p><br>
      
        <p style="text-align:center">喜欢PHP、HTML、MySQL</p>  
        <p style="text-align:center">Music!!!</p> 
       <audio controls style="display:block; margin:auto;"><source src="music/1.mp3" type="audio/mpeg">您的浏览器不支持 audio 元素。</audio>



  
      
    </div>
  </div>
</div>

<a href="#" id="notice-link">制作感想</a> 
<a href="#" id="terms-link">注意条款&nbsp;&nbsp;</a>

<script>
    var noticeModal = document.querySelector("#notice-modal");
    var termsModal = document.querySelector("#terms-modal");
    var noticeLink = document.querySelector("#notice-link");
    var termsLink = document.querySelector("#terms-link");
    var closeButtons = document.querySelectorAll(".close-button");

    noticeLink.addEventListener("click", function() {
        noticeModal.style.display = "block";
    });

    termsLink.addEventListener("click", function() {
        termsModal.style.display = "block";
    });

    closeButtons.forEach(function(closeButton) {
        closeButton.addEventListener("click", function() {
            noticeModal.style.display = "none";
            termsModal.style.display = "none";
        });
    });

    window.addEventListener("click", function(event) {
        if (event.target == noticeModal || event.target == termsModal) {
            noticeModal.style.display = "none";
            termsModal.style.display = "none";
        }
    });
</script>
  <!--  注意条款 以及制作感想-->  

	</form>
           
  
	</div>
    </div> 
       </div>
</body>
</html>
