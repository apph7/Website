
<body  
onload = getD1()>
<script>
    var i=0;
    function myDate(){
        var now=new Date();
        var year=now.getFullYear();
        var month=now.getMonth()+1;
        var day=now.getDate();
        var hours=now.getHours();
        var minutes=now.getMinutes();
        var seconds=now.getSeconds();
 
      
        document.getElementById("dic").innerHTML="下午"+hours+"："+minutes+"："+seconds;
        
    }
    setInterval(myDate,1000);
</script>
<style type='text/css'>
   .ah { width: 90%; background-color: #eeeeee; margin: 0 auto}
   .ah img {float: left; margin: 2px 50px 2px 2px; border-style: none;}
   .ah span {float: left; font-size: 28px; font-weight: 700;margin-top: 20px}
</style>
<div class='ah' style="background: linear-gradient(to bottom, #E6E6FA,#E0FFFF	)">
    <img src="党.png"style="height:90px;">
   <span  style='color: #ff6633'>欢迎使用&nbsp&nbsp</span>
   <span style='color: #ff6633;align: center'></span>
   <span style='font-size: 31px; margin-top: 18px; color: #ff6633; text-align: center;'>党员基本知识测试系统！</span>

   
   
   <div style=' font-size:20px ;color: rgb(69, 137, 148)'align="right"  >
   <?php
   echo date("Y年m月d");
   ?>     
   </div>
   <div style='font-size:20px;color: rgb(69, 137, 148)'align="right" >
   <?php
   if(date("l")=="Friday")
       echo '星期五';
   elseif(date("l")=="Monday")
       echo '星期一';
   elseif(date("l")=="Tuesday")
       echo '星期二';
   elseif(date("l")=="Wednesday")
       echo '星期三';
   elseif(date("l")=="Thursday")
       echo '星期四';
   elseif(date("l")=="Saturday")
       echo '星期六';
   elseif(date("l")=="Sunday")
       echo '星期日';
   ?>     
   </div>
  
   <div style='font-size:20px;color: rgb(69, 137, 148)'align="right" id="dic"> </div>
   <div style='clear: both'></div> 
 
</div>
</body>