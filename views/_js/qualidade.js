/* Atribui ao botão click do teste de qualidade a função de teste */
var btn = document.getElementById("botao_qualidade");
if (btn.addEventListener){
	btn.addEventListener("click", testeQualidade);
} else if (btn.attachEvent){
	btn.attachEvent("onclick", testeQualidade);
}

function testeQualidade(evt){
	alert("foi");





}