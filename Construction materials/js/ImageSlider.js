

// JavaScript Document
//alert('hi');
var width=1080;
var i=1;
var img=document.getElementsByTagName('img');
var inner=document.getElementById('slideinner');
var id;
function init()
{

id=window.setInterval('sliderup()',2000);
}
//alert(img.length);
function sliderup()
{	
//	simg(i);
		document.getElementById('slideinner').style.left=-width*i+'px';
	i++;
	//alert(i);
	if(i==4)
	{
		window.clearInterval(id);
		//i=0;
		 id=window.setInterval(sliderdown,2000);
	}
}
function sliderdown()
{
	
//	simg(i);

	document.getElementById('slideinner').style.left=-width*i+'px';
		i--;
	if(i==0)
		{	
			window.clearInterval(id);
			id=window.setInterval(sliderup,2000);
		}	
}
/*function simg(i)
{
		alert(i);
		inner.style.left=-width*i+'px';
}*/