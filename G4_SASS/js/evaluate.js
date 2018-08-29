var star = document.getElementsByTagName("li");
for(var i=0; i<star.length; i++){
	star[i].addEventListener('click',changecolor,false);
}

function changecolor(e){
	var star_content = document.getElementById('star');

	switch(e.target){
		case star[0]:
		if(star[1].style.color=="blue" && star[0].style.color=="yellow"){
			star[0].style.color="blue";
			star_content.innerHTML="";
		}else{
			star[0].style.color="yellow";
			star[1].style.color="blue";
			star[2].style.color="blue";
			star[3].style.color="blue";
			star[4].style.color="blue";
			star_content.innerHTML="一星";
		}
		break;

		case star[1]:
		if(star[2].style.color=="blue" && star[1].style.color=="yellow"){
			star[1].style.color="blue";
			star_content.innerHTML="一星";
		}else{
			star[0].style.color="yellow";
			star[1].style.color="yellow";
			star[2].style.color="blue";
			star[3].style.color="blue";
			star[4].style.color="blue";
			star_content.innerHTML="二星";
		}
		break;

		case star[2]:
		if(star[3].style.color=="blue" && star[2].style.color=="yellow"){
			star[2].style.color="blue";
			star_content.innerHTML="二星";
		}else{
			star[0].style.color="yellow";
			star[1].style.color="yellow";
			star[2].style.color="yellow";
			star[3].style.color="blue";
			star[4].style.color="blue";
			star_content.innerHTML="三星";
		}
		break;

		case star[3]:
		if(star[4].style.color=="blue" && star[3].style.color=="yellow"){
			star[3].style.color="blue";
			star_content.innerHTML="三星";
		}else{
			star[0].style.color="yellow";
			star[1].style.color="yellow";
			star[2].style.color="yellow";
			star[3].style.color="yellow";
			star[4].style.color="blue";
			star_content.innerHTML="四星";
		}
		break;

		case star[4]:
		if(star[4].style.color=="yellow"){
			star[4].style.color="blue";
			star_content.innerHTML="四星";
		}else{
			star[0].style.color="yellow";
			star[1].style.color="yellow";
			star[2].style.color="yellow";
			star[3].style.color="yellow";
			star[4].style.color="yellow";
			star_content.innerHTML="五星";
		}












	}

}


 
