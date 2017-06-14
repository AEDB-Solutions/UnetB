var form = document.getElementById("edit-button");
if (form.addEventListener){
	form.addEventListener("click", validateSettings);
} else if (form.attachEvent)
	form.attachEvent("onclick", validateSettings);


function validateSettings(evt){

	var email = document.getElementById('email');
	var name = document.getElementById('name');
	var lastpass = document.getElementById('lastpassword');
	var newpass = document.getElementById('newpassword');
	var confnewpass = document.getElementById('confnewpassword');
	var course = document.getElementById('course');
	var cellphone = document.getElementById('cellphone');
	var matricula = document.getElementById('matricula');
	var filtro_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var filtro_name = /^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ' ]+$/;
	var contErro = 0;

	caixa_email = document.querySelector('.msg-email');
	if(email.value == ""){
		caixa_email.style.display = 'none';
	}else if(!filtro_email.test(email.value)){
		formataErro(caixa_email," E-mail no formato inválido.");
		contErro += 1;
	}else{
		caixa_email.style.display = 'none';
	}

	caixa_nome = document.querySelector('.msg-name');
	if(name.value == ""){
		caixa_nome.style.display= 'none';
	}else if(0 < name.value.length && name.value.length < 3){
		formataErro(caixa_nome," O nome deve conter no mínimo 3 letras.");
		contErro += 1;
	}else if(!filtro_name.test(name.value)){
		formataErro(caixa_nome," O nome deve conter apenas letras.");
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}

	caixa_lastpassw = document.querySelector('.msg-lastpassw');
	if(newpass.value != "" && lastpass.value ==""){
		formataErro(caixa_lastpassw, "Digite sua senha atual para cadastrar uma nova senha.");
		contErro += 1;
	}else{
		caixa_lastpassw.style.display = 'none';
	}

	caixa_newpass = document.querySelector('.msg-newpassw');
	if(0 < newpass.value.length && newpass.value.length < 6){
		formataErro(caixa_newpass, "A senha deve conter no mínimo 6 carácteres.");
		contErro += 1;
	}else{
		caixa_newpass.style.display = 'none';
	}

	caixa_confnewpass = document.querySelector('.msg-confnewpassw');
	if(newpass.value != confnewpass.value){
		formataErro(caixa_confnewpass, "As senhas não coincidem.");
		contErro += 1;
	}else{
		caixa_confnewpass.style.display = 'none';
	}





	caixa_settings = document.getElementById('msg-settings');
	caixa_settings.style.display = 'none';

	if(contErro > 0){
		evt.preventDefault();
	}else{
		$(document).ready( function(){

			$.ajax({
				url: '../controllers/profille-controller.php',
				method: 'post',
				data: $('#form-settings').serialize(),
				
				success: function(data){

					caixa_settings = document.getElementById('msg-settings');

					if(data == 'Atualização bem sucedida.'){
						$('#email').val('');
						$('#name').val('');
						$('#lastpassword').val('');
						$('#newpassword').val('');
						$('#confnewpassword').val('');
						$('#course').val('');
						$('#matricula').val('');
						$('#cellphone').val('');
						caixa_cadastro.className = 'msg-success';
						formataSuccess(caixa_cadastro,data);
					}
					else{
						caixa_cadastro.className = 'msg-erro';
						caixa_cadastro.style.fontSize = "20px";
						formataErro(caixa_cadastro,data);
					}
				},

				beforeSend: function(){
					$('#edit-button').prop("disabled",true);
					$('#gif_registro').show();
				},

				complete: function(){
					$('#edit-button').prop("disabled",false);
					$('#gif_registro').hide();
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