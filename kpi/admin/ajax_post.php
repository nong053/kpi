<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="ajax.js"></script>
<script language="javascript">
function doajax(mydata){
	
	
	
	
	var ajax1=createAjax(); 
	var check="";
	ajax1.onreadystatechange=function(){
		if(ajax1.readyState==4 && ajax1.status==200){
			document.getElementById('myplace').innerHTML=ajax1.responseText;
			document.form1.name.value="";
			document.form1.email.value="";
			
		}else{
			return false;
		}
	}
	ajax1.open("POST","data_post.php",true);
	ajax1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
	ajax1.send("name="+document.form1.name.value+"&email="+document.form1.email.value);
	
}
</script>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  ชื่อ
  <input name="name" type="text" id="name" />
  อีเมลล์
  <input name="email" type="text" id="email"/>
  <input type="button" name="Button" value="Send" onclick="doajax()" />
</form>
<p id="myplace"></p>
