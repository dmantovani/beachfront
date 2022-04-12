$(document).ready(function(){
	 $('#list').DataTable({"bSort": true});
	
 
	
	/*CAMPOS A VALIDAR*/
	jsonDatos=eval('({"campos":['+
		'{"campo":"titulo","validacion":"B"}'+
		']})');
	
	/*UPLOAD CONFIG*/
	var w=1440;
	var h=810;
	var path='../../../../asset/img/uploads/';
	var maxWidth=1440;
	var thWidth=1440;
	var thHeight=810;		
	var tipo='unica';
	var allowedTypes='jpg,png,gif'
	var callback=function(){console.log('upload complete');}
    
    uploaderNoCrop('8',path,maxWidth,thHeight,thWidth,tipo,5,allowedTypes,true,callback);
    uploaderMulti('7',path,maxWidth,thHeight,thWidth,tipo,5,allowedTypes,true,callback);
});


