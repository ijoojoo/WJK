function Ajax(recvType){
    var aj=new Object();
    aj.recvType=recvType ? recvType.toUpperCase() : 'HTML' //HTML XML
    aj.targetUrl='';
    aj.sendString='';
    aj.resultHandle=null;
    aj.createXMLHttpRequest=function(){
    var request=false;  
    //window对象中有XMLHttpRequest存在就是非IE，包括（IE7，IE8）
    if(window.XMLHttpRequest){
        request=new XMLHttpRequest();
        if(request.overrideMimeType){
            request.overrideMimeType("text/xml");
        }
    //window对象中有ActiveXObject属性存在就是IE
    }else if(window.ActiveXObject){
        var versions=['Microsoft.XMLHTTP', 'MSXML.XMLHTTP', 'Msxml2.XMLHTTP.7.0','Msxml2.XMLHTTP.6.0','Msxml2.XMLHTTP.5.0', 'Msxml2.XMLHTTP.4.0', 'MSXML2.XMLHTTP.3.0', 'MSXML2.XMLHTTP'];
        for(var i=0; i<versions.length; i++){
            try{
                request=new ActiveXObject(versions[i]);
                if(request){
                    return request;
                }
            }catch(e){
                request=false;
            }
        }
    }
        return request;
    }
    aj.XMLHttpRequest=aj.createXMLHttpRequest();
    aj.processHandle=function(){
        if(aj.XMLHttpRequest.readyState == 4){
            if(aj.XMLHttpRequest.status == 200){
                if(aj.recvType=="HTML")
                    aj.resultHandle(aj.XMLHttpRequest.responseText);
                else if(aj.recvType=="XML")
                    aj.resultHandle(aj.XMLHttpRequest.responseXML);
            }
        }
    }

    aj.get=function(targetUrl, resultHandle){
        aj.targetUrl=targetUrl; 
        
        if(resultHandle!=null){
            aj.XMLHttpRequest.onreadystatechange=aj.processHandle;  
            aj.resultHandle=resultHandle;   
        }
        if(window.XMLHttpRequest){
            aj.XMLHttpRequest.open("get", aj.targetUrl);
            aj.XMLHttpRequest.send(null);
        }else{
            aj.XMLHttpRequest.open("get", aj.targetUrl, true);
            aj.XMLHttpRequest.send();
        }
    }

    aj.post=function(targetUrl, sendString, resultHandle){
        aj.targetUrl=targetUrl;
        if(typeof(sendString)=="object"){
            var str="";
            for(var pro in sendString){
                str+=pro+"="+sendString[pro]+"&";   
            }
            aj.sendString=str.substr(0, str.length-1);
        }else{
            aj.sendString=sendString;
        }
        if(resultHandle!=null){
            aj.XMLHttpRequest.onreadystatechange=aj.processHandle;  
            aj.resultHandle=resultHandle;   
        }
        aj.XMLHttpRequest.open("post", targetUrl);
        aj.XMLHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        aj.XMLHttpRequest.send(aj.sendString);
    }
    return aj;
}

function jiazaiCSS(path){
	var head = document.getElementsByTagName('head')[0];
    var link = document.createElement('link');
    link.href = path;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    head.appendChild(link);
}

function changeStyle(idName,className){
	var obj = document.getElementById(idName);
	obj.setAttribute("class", className);
}

function tuichudenglu(){
	var a=confirm("确定要退出吗，退出后下次访问必须输入账号密码？");
	if(a==true){
		window.location.href="tuichudenglu.php";
	}
}
/*
function ajax(url,elementId,method){
	//先声明一个异步请求对象
	var xmlHttpReq = null;
	if (window.ActiveXObject) {//如果是IE低版本
		xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
	}else if (window.XMLHttpRequest) {
		xmlHttpReq = new XMLHttpRequest(); //实例化一个xmlHttpReq
	}
	//如果实例化成功,就调用open()方法,就开始准备向服务器发送请求
	if (xmlHttpReq != null) {
		xmlHttpReq.open(method, url, true);
		xmlHttpReq.send();
		//xmlHttpReq.send(null);
		xmlHttpReq.onreadystatechange = doResult; //设置回调函数
	}
	//回调函数
	//readyState的值改变,将会调用这个函数
	//设定函数doResult()
	function doResult() {
		if (xmlHttpReq.readyState == 4) {//4代表执行完成
	      if (xmlHttpReq.status == 200) {//200代表执行成功
	          //将xmlHttpReq.responseText的值赋给ID为elementId元素
	          document.getElementById(elementId).innerHTML = xmlHttpReq.responseText;
	      }
	  }
	}
}
*/
//设为首页 www.ecmoban.com
function SetHome(obj,url){
    try{
        obj.style.behavior='url(#default#homepage)';
       obj.setHomePage(url);
   }catch(e){
       if(window.netscape){
          try{
              netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
         }catch(e){
              alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
          }
       }else{
        alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【"+url+"】设置为首页。");
       }
  }
}
 
//收藏本站 bbs.ecmoban.com
function AddFavorite(title, url) {
  try {
      window.external.addFavorite(url, title);
  }
catch (e) {
     try {
       window.sidebar.addPanel(title, url, "");
    }
     catch (e) {
         alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
     }
  }
}

/*所有页面通用的JS*/
window.onload=function(){
	/*导航按钮*/
	var zhucaidan_caidan=document.getElementById("zhucaidan-caidan");
	var zhucaidan_shangpin=document.getElementById("zhucaidan-shangpin");
	var zhucaidan_huiyuan=document.getElementById("zhucaidan-huiyuan");
	
	/*当被点击时设置的按钮div的透明属性*/
	zhucaidan_caidan.onclick=function(){
		var zicaidan_caidan=document.getElementById("zicaidan-caidan");
		var zicaidan_shangpin=document.getElementById("zicaidan-shangpin");
		var zicaidan_huiyuan=document.getElementById("zicaidan-huiyuan");
		/*
		daohangcaidan.className="daohangcaidan-huodong";
		daohangcaidan.setAttribute("class","daohangcaidan-huodong");
		*/
		if(zicaidan_caidan.style.opacity<1){
			/*关闭其它菜单*/
			zicaidan_shangpin.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zicaidan_huiyuan.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zhucaidan_shangpin.style.cssText="background:none;";
			zhucaidan_huiyuan.style.cssText="background:none;";
			/*设置本菜单*/
			zicaidan_caidan.style.cssText="left:0;opacity:1.0;z-index:10000";
			zhucaidan_caidan.style.cssText="background: Orange;";
		}else{
			zicaidan_caidan.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zhucaidan_caidan.style.cssText="background:none;";
		}	
	}

	zhucaidan_shangpin.onclick=function(){
		var zicaidan_caidan=document.getElementById("zicaidan-caidan");
		var zicaidan_shangpin=document.getElementById("zicaidan-shangpin");
		var zicaidan_huiyuan=document.getElementById("zicaidan-huiyuan");
		/*
		daohangcaidan.className="daohangcaidan-huodong";
		daohangcaidan.setAttribute("class","daohangcaidan-huodong");
		*/
		if(zicaidan_shangpin.style.opacity<1){
			/*关闭其它菜单*/
			zicaidan_caidan.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zicaidan_huiyuan.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zhucaidan_caidan.style.cssText="background:none;";
			zhucaidan_huiyuan.style.cssText="background:none;";
			/*设置本菜单*/
			zicaidan_shangpin.style.cssText="left:0;opacity:1.0;z-index:10000";
			zhucaidan_shangpin.style.cssText="background: Orange;";
		}else{
			zicaidan_shangpin.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zhucaidan_shangpin.style.cssText="background:none;";
		}	
	}

	zhucaidan_huiyuan.onclick=function(){
		var zicaidan_caidan=document.getElementById("zicaidan-caidan");
		var zicaidan_shangpin=document.getElementById("zicaidan-shangpin");
		var zicaidan_huiyuan=document.getElementById("zicaidan-huiyuan");
		/*
		daohangcaidan.className="daohangcaidan-huodong";
		daohangcaidan.setAttribute("class","daohangcaidan-huodong");
		*/
		if(zicaidan_huiyuan.style.opacity<1){
			/*关闭其它菜单*/
			zicaidan_caidan.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zicaidan_shangpin.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zhucaidan_caidan.style.cssText="background:none;";
			zhucaidan_shangpin.style.cssText="background:none;";
			/*设置本菜单*/
			zicaidan_huiyuan.style.cssText="left:0;opacity:1.0;z-index:10000";
			zhucaidan_huiyuan.style.cssText="background: Orange;";
		}else{
			zicaidan_huiyuan.style.cssText="left:-100;opacity:0.0;z-index:-9999";
			zhucaidan_huiyuan.style.cssText="background:none;";
		}	
	}
}