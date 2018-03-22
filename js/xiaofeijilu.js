
window.onclick=function(){
	var chaxun=document.getElementById("chaxun");
	chaxun.onclick=function(){
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
		var kaishiriqi=document.getElementById("kaishiriqi").value;
		var jiesuriqi=document.getElementById("jiesuriqi").value;
		var huiyuankahao=document.getElementById("huiyuankahao").value;
		var url="server/huoquxiaofeijilu.php?kaishiriqi="+kaishiriqi+"&jiesuriqi="+jiesuriqi+"&huiyuankahao="+huiyuankahao+"&page_num="+page_num; 

		var ajax=Ajax();
		ajax.get(url,function(data){
			eval("var result="+data);
			/*给页面赋值*/
			var jieguoji=document.getElementById("jieguoji");
			jieguoji.innerHTML=result["table"];
			var dangqianyeshu=document.getElementById("dangqianyeshu");
			dangqianyeshu.innerText=result["dangqianyeshu"];
			var zongyeshu=document.getElementById("zongyeshu");
			zongyeshu.innerText=result["zongyeshu"];
			var zongtiaoshu=document.getElementById("zongtiaoshu");
			zongtiaoshu.innerText=result["zongtiaoshu"];
			/*重新加载CSS*/
			jiazaiCSS("css/xiaofeijilu.css");
		});
	}
}
