function Conferesenha(senha){
	var nova = $("#senhaatual").val();
	if(nova != senha){
		return false;
	}else{
		return true;
	}
}
function Conferenovasenha(){
	var repetida = $("#passwordNova").val();
	var nova = $("#repeti").val();
	if(repetida != nova){
		return false;
	}else{
		return true;
	}
}