<!DOCTYPE html>
<html>
<head>
<style> 
div
{
width:100px;
height:100px;
background:red;
position:relative;
animation:mymove 5s infinite;
-webkit-animation:mymove 5s infinite; /*Safari and Chrome*/
}
 
@keyframes mymove
{
from {left:0px;}
to {left:200px;}
}
 
@-webkit-keyframes mymove /*Safari and Chrome*/
{
from {left:0px;}
to {left:200px;}
}
 
</style>
</head>
<body>
 
 <p><strong>注释：</strong>Internet Explorer 9 以及更早的版本不支持 animation 属性。</p>
<div></div>
 
</body>
</html>