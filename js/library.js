function swapImgOnOff(obj){
	imgUrl=obj.src.split('/');
	imgName=imgUrl[imgUrl.length-1];
	imgNameSplit=imgName.split('_');
	imgState=imgNameSplit[0];
	if(imgState=='off'){
		newState='on';
	} else if(imgState=='on'){
		newState='off';
	} else {
		newState=imgState;
	}
	newImgName=newState+'_'+imgNameSplit[1];
	newImgUrl='';
	for(i=0;i<(imgUrl.length-1);i++){
		newImgUrl=newImgUrl+imgUrl[i];
		if(i!=imgUrl.length-1){
			newImgUrl=newImgUrl+'/';
		}
	}
	obj.src=newImgUrl+newImgName;
}