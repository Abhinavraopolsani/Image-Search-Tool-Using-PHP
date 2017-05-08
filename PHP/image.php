<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset='utf-8'/>
	<script src='jquery-1.8.3.min.js'></script>
	<script src='jquery.elevatezoom.js'></script>
<title></title>

	<link rel="stylesheet" href="css/jquery-ui-1.7.1.custom.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/jquery.gzoom.css" type="text/css" media="screen" />
<script type ="text/javascript">


var pic=[400,440,480,520,560,600,640,680,720,760,800,840,880,920,960,1000,1040,1080,1120,1160,1200];

function zoomPicture(newValue)
{

var index=newValue/10;

if(index>=0 && index<1){

if(newValue=="0"){
document.getElementById("pic").width="400";
document.getElementById("pic").height = "400";
	}
	else {
	document.getElementById("pic").width=pic[1];
document.getElementById("pic").height = pic[1];

	}
}
else if(index>=1 && index<2){
if(newValue=="10"){
document.getElementById("pic").width=pic[2];
document.getElementById("pic").height = pic[2];

	}
	else{
	document.getElementById("pic").width=pic[3];
document.getElementById("pic").height = pic[3];

	}

}
else if(index>=2 && index<3){
if(newValue=="20"){
document.getElementById("pic").width=pic[4];
document.getElementById("pic").height = pic[4];
	}
	else{
	document.getElementById("pic").width=pic[5];
document.getElementById("pic").height = pic[5];
	}

}
else if(index>=3 && index<4){
if(newValue=="30"){
document.getElementById("pic").width=pic[6];
document.getElementById("pic").height = pic[6];
	}
	else{
	document.getElementById("pic").width=pic[7];
document.getElementById("pic").height = pic[7];
	}

}
else if(index>=4 && index<5){
if(newValue=="40"){
document.getElementById("pic").width=pic[8];
document.getElementById("pic").height = pic[8];
	}
	else{
	document.getElementById("pic").width=pic[9];
document.getElementById("pic").height = pic[9];
	}

}
else if(index>=5 && index<6){

if(newValue=="50"){
document.getElementById("pic").width=pic[10];
document.getElementById("pic").height = pic[10];
	}
	else{
	document.getElementById("pic").width=pic[11];
document.getElementById("pic").height = pic[11];
	}
}
else if(index>=6 && index<7){

if(newValue=="60"){
document.getElementById("pic").width=pic[12];
document.getElementById("pic").height = pic[12];
	}
	else{
	document.getElementById("pic").width=pic[13];
document.getElementById("pic").height = pic[13];
	}
}
else if(index>=7 && index<8){
if(newValue=="70"){
document.getElementById("pic").width=pic[14];
document.getElementById("pic").height = pic[14];
	}
	else{
	document.getElementById("pic").width=pic[15];
document.getElementById("pic").height = pic[15];
	}

}
else if(index>=8 && index<9){
if(newValue=="80"){
document.getElementById("pic").width=pic[16];
document.getElementById("pic").height = pic[16];
	}
	else{
	document.getElementById("pic").width=pic[17];
document.getElementById("pic").height = pic[17];
	}

}
else if(index>=9 && index<10){

if(newValue=="90"){
document.getElementById("pic").width=pic[18];
document.getElementById("pic").height = pic[18];
	}
	else{
	document.getElementById("pic").width=pic[19];
document.getElementById("pic").height = pic[19];
	}
}
else if(index>=10){

	document.getElementById("pic").width=pic[20];
document.getElementById("pic").height = pic[20];
	

}
else{
}


	



}
</script>
<script type="text/javascript">

</script>
</head>

<body>

<?php
$imagesrc1=htmlspecialchars($_GET['imagesrc']);
?>
<table>
<tr><td><img id="pic" width="400" height="400" src="<?php print $imagesrc1;?>"/></td>
<td><input type="range" style={color:blue;} min="0" max="100" value="0" step="5" onchange="zoomPicture(this.value)"/></td>
</tr></table>





</body>
</html>
