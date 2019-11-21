



function Obj(e,funcion){
	
	if(typeof funcion=="undefined"){
		return document.querySelector(e);
	}else{
		document.querySelector(e).
		addEventListener("click", (event)=>{
			event.preventDefault();
			funcion();	
		});
		
	}

}

function ObjAll(e){
	return document.querySelectorAll(e);
}

function Asincrono(json){

	let Ajax=new XMLHttpRequest();

	Ajax.addEventListener("load",json.procedimiento);

	Ajax.open(json.method, json.url);
	Ajax.send(json.form);

}

function myToolTipText(e){

	e.classList.add("show");

	setTimeout(()=>{
		e.classList.remove("show");
	},5000);

}

function closeToolTipText(e){

	e.classList.remove("show");
	
}