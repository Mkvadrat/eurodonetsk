function show_gwu()
{
    var obj = getElementsByClass('gwu_image',null,'img');
	for(i=0;i<obj.length;i++){
            obj[i].style.visibility = "visible";
	}
    var obj = getElementsByClass('panel-overlay-block',null,'div');
	for(i=0;i<obj.length;i++){
            obj[i].style.visibility = "visible";
	}
}