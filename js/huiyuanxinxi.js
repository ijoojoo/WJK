window.onkeydown=function(){
	var chaxunanniu=document.getElementById("chaxunanniu");
	if(event.keyCode==13){
		chaxunanniu.click();
	}
};
window.onclick=function(){
	var chaxunanniu=document.getElementById("chaxunanniu");
	var huiyuanxinxi=document.getElementById("huiyuanxinxi").value;
	if(huiyuanxinxi==""||huiyuanxinxi==null){return;}
	chaxunanniu.onclick=function(){
		get_page(1);
	}

/*页码部分*/
	var shouye=document.getElementById("shouye");
	var shangyiye=document.getElementById("shangyiye");
	var xiayiye=document.getElementById("xiayiye");
	var weiye=document.getElementById("weiye");

	shouye.onclick=function(){
		/*当前页数大于1时执行*/
		var dangqianyeshu=document.getElementById("dangqianyeshu").innerText;
		if(dangqianyeshu>1){
			get_page(1);
			document.getElementById("dangqianyeshu").innerText="1";
		}
	};
	shangyiye.onclick=function(){
		/*当前页数大于1时执行*/
		var dangqianyeshu=document.getElementById("dangqianyeshu").innerText;
		dangqianyeshu=Number(dangqianyeshu);
		if(dangqianyeshu>1){
			get_page(dangqianyeshu-1);
			document.getElementById("dangqianyeshu").innerText=Number(document.getElementById("dangqianyeshu").innerText)-1;
		}
	};
	xiayiye.onclick=function(){
		/*当前页数小于总页数时执行*/
		var dangqianyeshu=document.getElementById("dangqianyeshu").innerText;
		dangqianyeshu=Number(dangqianyeshu);
		var zongyeshu=document.getElementById("zongyeshu").innerText;
		zongyeshu=Number(zongyeshu);
		if(dangqianyeshu<zongyeshu){
			get_page(dangqianyeshu+1);
			document.getElementById("dangqianyeshu").innerText=Number(document.getElementById("dangqianyeshu").innerText)+1;
		}
	};
	weiye.onclick=function(){
		/*当前页数小于总页数时执行*/
		var dangqianyeshu=document.getElementById("dangqianyeshu").innerText;
		var zongyeshu=document.getElementById("zongyeshu").innerText;
		dangqianyeshu=Number(dangqianyeshu);
		zongyeshu=Number(zongyeshu);
		if(dangqianyeshu<zongyeshu){
			get_page(zongyeshu);
		}
		document.getElementById("dangqianyeshu").innerText=document.getElementById("zongyeshu").innerText;
	}

	function get_page(page_num){
		var huiyuanxinxi=document.getElementById("huiyuanxinxi").value;
		var url="server/huoquhuiyuanxinxi.php"+"?&huiyuanxinxi="+huiyuanxinxi+"&page_num="+page_num; 

		var ajax=Ajax();
		ajax.get(url,function(data){
			eval("var result="+data);
			/*如果有返回值给页面赋值*/
			if(result.kahao){
				set_innerText("xingming",result.xingming);
				set_innerText("kahao",result.kahao);
				set_innerText("shouji",result.shouji);
				set_innerText("xingbie",result.xingbie);
				set_innerText("zhuzhi",result.zhuzhi);
				set_innerText("dengji",result.dengji);
				set_innerText("jifen",result.jifen);
				/*头像*/
				var touxiangimg=document.getElementById("touxiang");
				touxiangimg.src=result.touxiang;
				/*标签*/
				var biaoqian_arr;
				var biaoqian_text="";
				biaoqian_arr=result.biaoqian.split("|");
				for(var i=0;i<biaoqian_arr.length;i++){
					biaoqian_text=biaoqian_text+"<span class='biaoqianspan'>"+biaoqian_arr[i]+"</span>";
				}
				var biaoqian=document.getElementById("biaoqian");
				biaoqian.innerHTML=biaoqian_text;
			}
			/*页码部分*/
			var dangqianyeshu=document.getElementById("dangqianyeshu");
			dangqianyeshu.innerText=result["dangqianyeshu"];
			var zongyeshu=document.getElementById("zongyeshu");
			zongyeshu.innerText=result["zongyeshu"];
			var zongtiaoshu=document.getElementById("zongtiaoshu");
			zongtiaoshu.innerText=result["zongtiaoshu"];
			/*重新加载CSS*/
			jiazaiCSS("css/huiyuanxinxi.css");
		});
	}
}


function set_innerText(element,inner_text){
	if(inner_text==null){
		inner_text="未填写";
	}
	var element=document.getElementById(element);
	element.innerText=inner_text;
}

/*
window.onclick=function(){
	var chaxunanniu=document.getElementById("chaxunanniu");
	chaxunanniu.onclick=function(){
		var huiyuanxinxi=document.getElementById("huiyuanxinxi").value;
		ajax=Ajax();
		var url="huoquhuiyuanxinxi.php?huiyuanxinxi="+huiyuanxinxi+"&page_num=1";
		ajax.get(url,function(data){
			eval("var huiyuan="+data);
			set_innerText("xingming",huiyuan.xingming);
			set_innerText("kahao",huiyuan.kahao);
			set_innerText("shouji",huiyuan.shouji);
			set_innerText("xingbie",huiyuan.xingbie);
			set_innerText("dizhi",huiyuan.dizhi);
			set_innerText("beizhu",huiyuan.beizhu);

			var touxiangimg=document.getElementById("touxiang");
			touxiangimg.src=touxiang;

			var biaoqian_text="";
			for(var i=0;i<huiyuan.biaoqian.length;i++){
				biaoqian_text=biaoqian_text+"<span>"+huiyuan.biaoqian[i]+"</span>";
			}
			set_innerText("biaoqian",biaoqian_text);
		});
	}
}
*/