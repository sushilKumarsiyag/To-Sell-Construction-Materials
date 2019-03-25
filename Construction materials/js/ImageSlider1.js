// JavaScript Document
var images=new Array(5);
images[0]="js/../pictures/Camera Roll/images (1).jpeg";
images[1]="js/../pictures/Camera Roll/bangur-cement.png";
images[2]="js/../pictures/Camera Roll/images.jpeg";
images[3]="js/../pictures/Camera Roll/tiles1.png";
images[4]="js/../pictures/Camera Roll/bajri-sand-500x500.jpg";
var i=0;
var k=1;
function init()
{
	window.setInterval("change()",3000);
	
}
function change()
{
	document.getElementById('img1').style.transition="all 5s";
	document.getElementById('img1').src=images[i];
	
	i++;
	if(i==images.length)
		i=0;
}
<script src="js/imageSlider1.js" type="application/javascript"></script>


/*

*/


