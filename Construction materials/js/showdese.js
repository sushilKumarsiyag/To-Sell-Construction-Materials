// JavaScript Document
function showdese(i)
	{
		var source=document.getElementsByClassName('proimg').item(i).src;
		document.getElementById('img2').src=source;
		switch(i)
		{
			case 0:document.getElementById('dese').innerHTML="<h4>Name:-Bricks</h4><h4>Description:-Plaster bricks</h4><h4>Dimensions:-222 x 106 x 72 (mm)</h4><h4>Compressive Strength:- >14MPa</h4><h3><a href='bricks.html'>View More</h4>";
			break;
			case 1:
				document.getElementById('dese').innerHTML="<h4>Name:-Gravel</h4><h4>Description:-Gravel is a loose aggregation of rock fragments.</h4><h4>Dimensions:-64-256mm</h4><h4>Compressive Strength:- >14MPa</h4><h3><a href='#'>View more</a></h3>";
			break;
			case 2:
				document.getElementById('dese').innerHTML="<h4>Name:-Tiles</h4><h4>Description:Ceramic tile is made up of sand, natural products, and clays and once</h4><h4>Dimensions:-12 x 12.in</h4><h4>Compressive Strength:- >15MPa</h4><h3><a href='#'>View more</a></h3>";
			break;
			case 3:
				document.getElementById('dese').innerHTML="<h4>Name:-Tiles</h4><h4>Description:-Ceramic tile is made up of sand, natural products, and clays and once</h4><h4>Dimensions:-10 x 10.in</h4><h4>Compressive Strength:- >14MPa</h4><h3><a href='#'>View more</a></h3>";
			break;
			case 4:
				document.getElementById('dese').innerHTML="<h4>Name:-Sands</h4><h4>Description:-Sand is a naturally occurring granular material composed of finely divided rock and mineral particles</h4><h4>Dimensions:-0.0024-0.0675(mm)</h4><h3><a href='#'>View more</a></h3>";
			break;
			case 5:
				document.getElementById('dese').innerHTML="<h4>Name:-Cements</h4><h4>Description:-This cement is made by heating limestone (calcium carbonate) with other materials</h4><h4>price:-Rs 273/Bag</h4><h3><a href='#'>View more</a></h3>";
			break;
			
			
		}
	}
