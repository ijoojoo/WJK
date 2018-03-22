
window.onclick=function(){
	var chaxunanniu=document.getElementById("chaxunanniu");
	var shangpinxinxi=document.getElementById("shangpinxinxi").value;
	if(shangpinxinxi==""||shangpinxinxi==null){return;}
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
		var shangpinxinxi=document.getElementById("shangpinxinxi").value;
		var url="server/huoqushangpinxinxi.php"+"?&shangpinxinxi="+shangpinxinxi+"&page_num="+page_num; 

		var ajax=Ajax();
		ajax.get(url,function(data){
			eval("var result="+data);
			/*给页面赋值*/
			var jieguodiv=document.getElementById("jieguodiv");
			jieguodiv.innerHTML=result["table"];
			/*页码部分*/
			var dangqianyeshu=document.getElementById("dangqianyeshu");
			dangqianyeshu.innerText=result["dangqianyeshu"];
			var zongyeshu=document.getElementById("zongyeshu");
			zongyeshu.innerText=result["zongyeshu"];
			var zongtiaoshu=document.getElementById("zongtiaoshu");
			zongtiaoshu.innerText=result["zongtiaoshu"];
			/*重新加载CSS*/
			jiazaiCSS("css/shangpinxinxi.css");
		});
	}
}
