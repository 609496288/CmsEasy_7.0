<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>选择音频</title>
<link href="js/upimg/dialog.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/upimg/jquery.js"></script>
<script type="text/javascript" src="js/upimg/dialog.js"></script>
<script type="text/javascript" language="JavaScript">
	var mangerlist_filecheck_js_filedirok = "文件夹正常";
	var mangerlist_filecheck_js_filedirno = "无可写权限，请检查文件夹权限或者该文件夹不存在";
	var iframename = "";
	var checkfrom="{front::get('checkfrom')}";
	var getbyid="{front::get('getbyid')}";
	var editiframename="";
	var fileinputid="{front::get('fileinputid')}";
	var digheight="440";
	var rootDIR="";
	var fileview="index.php?case=file&act=netfile3";
	$(document).ready(function(){
		var h = parseInt(digheight);
		var w = $(window).width();
		//console.log('aaaa'+w);
		$('#mainwindowstr').css({height:h-0,width: w-12});
		$('.upfilewindow').css({height:h-0});
	})

	function resetwindow(){
		parent.closeModel('audioModel');
	}

	function fnUpdate(){
		$("#floatBoxBg").hide();
		$("#floatBox").hide();
	}

	function refile(filename,iswidth,alt,width,height){
		if (checkfrom=='edit'){
			checkimageinput(filename,fileinputid,alt,width,height);
		}else if(checkfrom=='input'){
			checkinput(filename,fileinputid);
		}else if(checkfrom=='function'){
			functionpic(filename,fileinputid,getbyid,iswidth);
		}else if(checkfrom=='picshow'){
			picshow(filename,fileinputid,getbyid,iswidth,width,height);
		}else if(checkfrom=='divshow'){
            refilediv(filename,alt,width,height);
        }else if(checkfrom=='videoshow'){
            refileVideo(filename,alt,width,height);
		}else if(checkfrom=='audioshow'){
            refileAudio(filename,alt,width,height);
        }else if(checkfrom=='editwin'){
			checkimageeditor(filename,fileinputid);
		}
        resetwindow();
	}

    function refileVideo(filename,alt,width,height){
        parent.refileVideo(filename,alt,width,height);
    }

    function refileAudio(filename,alt,width,height){
        parent.refileAudio(filename,alt,width,height);
    }
	
	function refileswf(filename,iswidth,alt,width,height){
		//console.log(filename);
		if (checkfrom=='edit'){
			checkimageinput(filename,fileinputid,alt,width,height);
		}else if(checkfrom=='input'){
			checkinput(filename,fileinputid);
		}else if(checkfrom=='function'){
			functionpic(filename,fileinputid,getbyid,iswidth);
		}else if(checkfrom=='picshow'){
			picshow(filename,fileinputid,getbyid,iswidth,width,height);
		}else if(checkfrom=='piclistshow'){
			piclistshow(filename,fileinputid,getbyid,iswidth,alt);
		}else if(checkfrom=='editwin'){
			checkimageeditor(filename,fileinputid);
		}
	}

	function checkimageeditor(filename,inputnameID){
		var win = parent.frames[iframename].frames[editiframename];
		filename=rootDIR+filename;
		win.document.getElementById(inputnameID).value = filename;
		if (typeof(win.ImageDialog) != "undefined") {
			if (win.ImageDialog.getImageData) win.ImageDialog.getImageData();
			if (win.ImageDialog.showPreviewImage) win.ImageDialog.showPreviewImage(filename);
		}
		parent.closeifram();
	}

	function checkimageinput(filename,inputnameID,alt,width,height){
		var filenames = filename.split('|');
                var str = '';
                if(width){str = str + " width='"+width+"'";}
                if(height){str = str + " height='"+height+"'";}
		var src_tex='';
		for (var i = 0; i < filenames.length; i++){
			if(filenames[i].substr(0,7).toLowerCase() == 'http://'){
				src_tex+='<img src="'+filenames[i]+'" alt="'+alt+'" '+str+' /><br />';
			}else{
				src_tex+='<img src="'+rootDIR+filenames[i]+'" alt="'+alt+'" '+str+' /><br />';
			}
		}
		parent.getEditor(inputnameID).InsertHtml(src_tex);
		//parent.closeifram();
	}

	function checkinput(filename,inputnameID){
		//alert(filename);
		parent.frames[iframename].document.getElementById(inputnameID).value = filename;
		parent.closeifram();
	}

	function picshow(filename,inputnameID,getbyid,iswidth,width,height){
		if(filename.substr(0,7).toLowerCase() == 'http://'){
			parent.document.getElementById(inputnameID).value = filename;
		}else{
			parent.document.getElementById(inputnameID).value = rootDIR+filename;
		}
		parent.addpicshow(filename,getbyid,iswidth,width,height);
		//parent.closeifram();
	}
	
	function piclistshow(filename,inputnameID,getbyid,iswidth,alt){
		var filenames = filename.split('|');
		var src_tex='';
		var j = parseInt(parent.document.getElementById("ic").value)+1;
		for (var i = 0; i < filenames.length; i++){
			if(filenames[i].substr(0,7).toLowerCase() != 'http://'){
				filenames[i] = rootDIR+filenames[i];
			}
			parent.document.getElementById(getbyid).innerHTML = parent.document.getElementById(getbyid).innerHTML+'<div id="pics'+j+'_up" style="clear:both;"><span id="'+inputnameID+j+'_preview"><img width="150" style="width:150px;" src="'+filenames[i]+'" border="0" /></span><div class="blank10"></div><div class="row"><div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 text-right"><input id="'+inputnameID+j+'" value="'+filenames[i]+'" class="form-control" name="'+inputnameID+'['+j+'][url]" /></div><div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-left"><input class="btn btn-primary" id="'+inputnameID+j+'_del" onclick="pics_delete(\''+j+'\',\''+inputnameID+'\');" value="删除" type="button" name="delbutton" /></div></div><div class="blank10"></div><div class="row"><div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 text-right"><input id="'+inputnameID+'alt'+j+'" value="'+alt+'" class="form-control" name="'+inputnameID+'['+j+'][alt]" /></div><div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-left">文字说明</div></div><div class="blank20"></div></div>';
			parent.document.getElementById("ic").value = j;
			j = j + 1;
		}	   
		//parent.closeifram();
	}

	function functionpic(filename,inputnameID,getbyid,iswidth){
		parent.frames[iframename].addpicipnput(filename,inputnameID,getbyid,iswidth,iframename);
		parent.closeifram();
	}

	function selectfile(){
		var filename=$('.pp_description').html();
		var fileinputid="pic";
		if (checkfrom=='edit'){
			checkimageinput(filename);
		}else if(checkfrom=='input'){
			checkinput(filename,fileinputid);
		}else if(checkfrom=='function'){
			functionpic(filename,fileinputid);
		}
	}
	function flushiframe(getid){
		var url = (getid=='piclist') ? picview : fileview;
		document.getElementById(getid).src = url;
	}



</script>

<script type="text/javascript">
<!--
	$(function(){
 $(document).bind("click",function(e){
  var target  = $(e.target);
  if(target.closest("#floatBox").length == 0){
   $("#floatBox").hide();
  }
 }) 
})
//-->
</script>
</head>

<body style="background-color: #FFFFFF">
<div class="centerrightwindow"  style="background-color: #FFFFFF">
	<div id="mainwindowtab">
				<ul>
			<li class="hover" id="tabbottonul1" href="#body" onmousedown="javascript:windowsclass('#tabbottonul1','#tabcontentdiv1','tabbottonul','tabcontentdiv',1,4,'hover','hover2');">上传文件</li>
            <li id="tabbottonul2" href="#body" onmousedown="javascript:windowsclass('#tabbottonul2','#tabcontentdiv2','tabbottonul','tabcontentdiv',2,4,'hover','hover2');flushiframe('netpic');">网络音频</li>
		</ul>
			</div>
	<div id="mainwindowstr">
		<div id="tabcontentdiv1" class="displaytrue"><iframe name="upfilewindow" class="upfilewindow" src="index.php?case=file&act=upfile4" width="100%" height="485" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
        <div id="tabcontentdiv2" class="displaynone"><iframe name="netpic" id="netpic" class="upfilewindow" src="#" width="100%" height="485" scrolling="no" frameborder="0" marginheight="0" marginwidth="0"></iframe></div>
	</div>
</div>
<!-- Powered by <a href="http://www.cmseasy.cn" title="CmsEasy企业网站系统" target="_blank">CmsEasy</a> -->
</body>
</html>