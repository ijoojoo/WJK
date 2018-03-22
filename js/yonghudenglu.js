window.onload=function(){
	var denglu=document.getElementById("denglu");
	
	denglu.onclick=function(){
		var yonghuming=document.getElementById("yonghuming").value;
		var mima=document.getElementById("mima").value;
		if(yonghuming.length<=0){
			alert("请输入用户名！");
			exit();
		}
		if(mima.length<=0){
			alert("请输入密码！");
			exit();
		}
	}
	/*自动获取姓名,用户名失去焦点时激活*/
	yonghuming.onkeyup=function(){
		var yonghuming=document.getElementById("yonghuming").value;
		var url="server/huoquxingming.php?yonghuming="+yonghuming;
		var xingmig=document.getElementById("xingming");
		//ajax(url,"xingming","GET");
		var ajax=Ajax();
		ajax.get(url,function(result){
			xingming.innerHTML=result;
		});
	}
}
