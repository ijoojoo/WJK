/*引用公共函数*/
/*document.write('<script type="text/javascript" src="js/common.js"></script>');*/
window.onload=function(){
	var daohanganniu=document.getElementById("daohanganniu");
	/*设置的按钮div的透明属性*/
	daohanganniu.onclick=function(){
		var daohangcaidan=document.getElementById("daohangcaidan");
		if(daohangcaidan.style.opacity<1){
			daohanganniu.style.opacity=1;
			daohangcaidan.style.cssText="opacity:1;z-index:9999";
		}else{
			daohanganniu.style.opacity=0.5;
			daohangcaidan.style.cssText="opacity:0.0;z-index:-9999";
		}
		/*
		daohangcaidan.className="daohangcaidan-huodong";
		daohangcaidan.setAttribute("class","daohangcaidan-huodong");
		*/
	}
}

