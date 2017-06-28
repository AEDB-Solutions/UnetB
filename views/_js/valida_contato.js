/* Atribui ao evento click do formulário a função de validação de dados */
var form = document.getElementById("botao_contato");
if (form.addEventListener){
	form.addEventListener("click", validaLogin);
} else if (form.attachEvent){
	form.attachEvent("onclick", validaLogin);
}

/* Função para validar os dados antes da submissão dos dados */
function validaLogin(evt){

	var name    = document.getElementById('name-contato');
	var email   = document.getElementById('email-contato');
	var assunto = document.getElementById('assunto-contato');
	var texto   = document.getElementById('texto-contato');
	
	
	var filtro_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var filtro_name = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ' ]+$/;
	var contErro = 0;

	/* Validação do campo name */
	caixa_name = document.querySelector('#msg-name-contato');
	if(name.value == ""){
		formataErro(caixa_name," Favor preencher o nome.");
		contErro += 1;
	}else if(name.value.length < 3){
		formataErro(caixa_name," O nome deve conter no mínimo 3 letras.");
		contErro += 1;
	}else if(!filtro_name.test(name.value)){
		formataErro(caixa_name," O nome deve conter apenas letras.");
		caixa_name.style.display = 'block';
		contErro += 1;
	}else{
		caixa_name.style.display = 'none';
	}

	/* Validação do campo email */
	caixa_email = document.querySelector('#msg-email-contato');
	if(email.value == ""){
		formataErro(caixa_email," Favor preencher o E-mail.");
		contErro += 1;
	}else if(!filtro_email.test(email.value)){
		formataErro(caixa_email," E-mail no formato inválido.");
		contErro += 1;
	}else{
		caixa_email.style.display = 'none';
	}

	/* Validação do campo assunto*/
	caixa_assunto = document.getElementById('msg-assunto-contato');
	if(assunto.value == ""){
		formataErro(caixa_assunto," Favor preencher o assunto.");
		contErro += 1;
	}else{
		caixa_assunto.style.display = 'none';
	}

	/* Validação do campo texto*/
	caixa_texto = document.querySelector('#msg-texto-contato');
	if(texto.value == ""){
		formataErro(caixa_texto," Favor preencher o texto.");
		contErro += 1;
	}else{
		caixa_texto.style.display = 'none';
	}

	caixa_login = document.getElementById('msg-contato');
	caixa_login.style.display = 'none';

	if(contErro > 0){
		evt.preventDefault();
	}
}

/* Função para formatar as mansagens de erro*/
function formataErro(elemento,texto){
	$(elemento).removeClass();
	$(elemento).addClass('msg-erro');
	elemento.innerHTML = "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" + texto;
	elemento.style.display = 'block';
}