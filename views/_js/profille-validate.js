var form = document.getElementById("edit-button");
if (form.addEventListener){
	form.addEventListener("click", validateSettings);
} else if (form.attachEvent)
	form.attachEvent("onclick", validateSettings);

$('#view-edit').click(function(event){
	document.getElementById('campos').style.display = 'block';
	document.getElementById('senha').style.display = 'none';
	document.getElementById('view-edit').style.display = 'none';
	caixa_settings.style.display = 'none';
});

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
	var filtro_matricula = /^[0-9]{2}\/[0-9]{7}$/;
	var filtro_celular = /^[0-9]{2} [0-9] [0-9]{4}\-[0-9]{4}$/; 
	var contErro = 0;

	caixa_email = document.querySelector('#msg-email');
	if(email.value == ""){
		caixa_email.style.display = 'none';
	}else if(!filtro_email.test(email.value)){
		formataErro(caixa_email," E-mail no formato inválido.");
		contErro += 1;
	}else{
		caixa_email.style.display = 'none';
	}

	caixa_nome = document.querySelector('#msg-name');
	if(name.value == ""){
		formataErro(caixa_nome," O nome deve conter no mínimo 3 letras.");
		contErro += 1;
	}else if(!filtro_name.test(name.value)){
		formataErro(caixa_nome," O nome deve conter apenas letras.");
		caixa_nome.style.display = 'block';
		contErro += 1;
	}else{
		caixa_nome.style.display = 'none';
	}

	caixa_newpass = document.querySelector('#msg-newpassw');
	if(0 < newpass.value.length && newpass.value.length < 6){
		formataErro(caixa_newpass, " A nova senha deve conter no mínimo 6 carácteres.");
		contErro += 1;
	}else{
		caixa_newpass.style.display = 'none';
	}

	caixa_matricula = document.querySelector('#msg-matricula');
	if(matricula.value == ""){
		caixa_matricula.style.display = 'none';}
	else if(!filtro_matricula.test(matricula.value)){
		formataErro(caixa_matricula, " Digite somente os números");
		contErro += 1;
	}else if(0 < matricula.value,length && matricula.value.length < 10){
		formataErro(caixa_matricula, " Há algo de errado com o número de matrícula, digite somente os números");
		contErro += 1;
	}else{
		caixa_matricula.style.display= 'none';
	}

	caixa_celular = document.querySelector('#msg-cellphone');
	if(cellphone.value == ""){
		caixa_celular.style.display = 'none';
	}else if(!filtro_celular.test(cellphone.value)){
		formataErro(caixa_celular, " Digite somente os números.");
		contErro += 1;
	}else{ caixa_celular.style.display= 'none'};

	caixa_confnewpass = document.querySelector('#msg-confnewpassw');
	if(newpass.value != confnewpass.value){
		formataErro(caixa_confnewpass, " As senhas não coincidem.");
		contErro += 1;
	}else{
		caixa_confnewpass.style.display = 'none';
	}

	caixa_settings = document.getElementById('msg-settings');
	caixa_settings.style.display = 'none';

	if(contErro > 0){
		evt.preventDefault();
	}else{

		document.getElementById('campos').style.display = 'none';
		document.getElementById('senha').style.display = 'block';
		document.getElementById('view-edit').style.display = 'block';

		caixa_lastpassw = document.querySelector('#msg-lastpassw');
		if(lastpass.value == ""){
			formataErro(caixa_lastpassw, " Digite sua senha atual para salvar as alterações.");
		}else if (lastpass.value.length < 6) {
			formataErro(caixa_lastpassw, " A senha deve ter no mínimo 6 caracteres.");
		}
		else{

			caixa_lastpassw.style.display = 'none';
			$(document).ready( function(){
				
				$.ajax({
					url: '../controllers/profille-controller.php',
					method: 'post',
					data: $('#form-settings').serialize(),

					success: function(data){

						caixa_settings = document.getElementById('msg-settings');

						if(data == ' Atualização feita com sucesso.'){
							formataSuccess(caixa_settings,data);
						}
						else{
							formataErro(caixa_settings,data);
						}
					},

					beforeSend: function(){
						$('#edit-button').prop("disabled",true);
						$('#gif_registro').show();
						$('#lastpassword').val('');
					},

					complete: function(){
						$('#edit-button').prop("disabled",false);
						$('#gif_registro').hide();
					}
				});
			});
		}
	}
}

/* Função para formatar as mansagens de erro*/
function formataErro(elemento,texto){
	$(elemento).removeClass();
	$(elemento).addClass('msg-erro');
	elemento.innerHTML = "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>" + texto;
	elemento.style.display = 'block';
}

/* Função para formatar as mansagens de sucesso*/
function formataSuccess(elemento,texto){
	$(elemento).removeClass();
	$(elemento).addClass('msg-success');
	elemento.innerHTML = "<span class='glyphicon glyphicon glyphicon-ok' aria-hidden='true'></span>" + texto;
	elemento.style.display = 'block';
}

function formatar(mascara, documento){
	var i = documento.value.length;
	var saida = mascara.substring(0,1);
	var texto = mascara.substring(i)
	if (texto.substring(0,1) != saida){
		documento.value += texto.substring(0,1);
	}
}