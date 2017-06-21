/* Atribui ao evento click do formulário a função de validação de dados */
var form = document.getElementById("botao_login");
if (form.addEventListener){
	form.addEventListener("click", validaLogin);
} else if (form.attachEvent){
	form.attachEvent("onclick", validaLogin);
}

/* Função para validar os dados antes da submissão dos dados */
function validaLogin(evt){
	
	var email = document.getElementById('email-login');
	var password = document.getElementById('password-login');
	var filtro_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var contErro = 0;

	/* Validação do campo email */
	caixa_email = document.querySelector('.msg-email-login');
	if(email.value == ""){
		formataErro(caixa_email," Favor preencher o E-mail.");
		contErro += 1;
	}else if(!filtro_email.test(email.value)){
		formataErro(caixa_email," E-mail no formato inválido.");
		contErro += 1;
	}else{
		caixa_email.style.display = 'none';
	}

	/* Validação do campo password*/
	caixa_password = document.querySelector('.msg-password-login');
	if(password.value == ""){
		formataErro(caixa_password," Favor preencher a senha.");
		contErro += 1;
	}else if(password.value.length < 6){
		formataErro(caixa_password," Senha deve ter no mínimo 6 caracteres.");
		contErro += 1;
	}else{
		caixa_password.style.display = 'none';
	}
	
	caixa_login = document.getElementById('msg-login');
	caixa_login.style.display = 'none';
	
	if(contErro > 0){
		evt.preventDefault();
	}else{
		$(document).ready( function(){

			$.ajax({
				url: '../controllers/login-controller.php',
				method: 'post',
				data: $('#form-login').serialize(),
				success: function(data){
					if(data == 'logado'){
						window.location.replace("http://localhost/UnetB/views/home-login-view.php");
					}
					else{
						caixa_login = document.getElementById('msg-login');
						caixa_login.className = 'msg-erro';
						formataErro(caixa_login,' Usuário ou senha inválido');
					}
				},
				beforeSend: function(){
					$('#botao_login').prop("disabled",true);
					$('#gif_login').show();
					
				},

				complete: function(){
					$('#botao_login').prop("disabled",false);
					$('#gif_login').hide();
				}
			});
		});
	}
}

/* Função para formatar as mansagens de erro*/
function formataErro(elemento,texto){
	elemento.innerHTML = "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" + texto;
	elemento.style.display = 'block';
}

/* Função para formatar as mansagens de sucesso*/
function formataSuccess(elemento,texto){	
	elemento.innerHTML = "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" + texto;
	elemento.style.display = 'block';
}