<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<!-- INCLUE O HEAD NA PÁGINA -->
		<?php include "_includes/head.php";?>

    <style>
    #sobre:before{
    padding-top:60px;display:block;content:"";
    }
    #perg:before{
    padding-top:60px;display:block;content:"";
    }
    #med:before{
    padding-top:60px;display:block;content:"";
    }
    #prob:before{
    padding-top:60px;display:block;content:"";
    }
    </style>

	</head>

	<body>

		<!-- INCLUE O HEADER NA PÁGINA -->
		<?php include "_includes/header.php";?>
		
    <div class="row-fluid" style="margin-top: 60px; margin-left: 60px">
    <div class="span12">
        <div style="overflow:hidden;width:90%;">
            <div style="display:inline-block">  <h1>Sobre e Ajuda</h1>  </div>
            <div style="display:inline-block; margin-left: 30px">  <a href="#sobre">SOBRE</a>  </div>
            <div style="display:inline-block; margin-left: 7px">  <a href="#perg">PERGUNTAS FREQUENTES</a>  </div>
            <div style="display:inline-block; margin-left: 7px">  <a href="#med">NOSSAS MEDIDAS</a>  </div>
            <div style="display:inline-block; margin-left: 7px">  <a href="#prob">PROBLEMAS?</a>  </div>
        </div>
    </div>
    </div>

<div class="container">
<div class="panel-group" id="accordion">

      <div class="container">
        <h3 id="sobre">SOBRE</h3>
      </div>

      <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Quem somos e o que fazemos?</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><p>Somos alunos do curso de Engenharia de Redes de Comunicação da Universidade de Brasília e este site é um protótipo da disciplina de Algoritmos e Estrutura de dados. Foi feito com o objetivo de medir a qualidade de redes wifi porém coletando dados apenas para conexões dentro do campus Darcy Ribeiro da Unb. Os testes foram feitos com base nos parâmetros abordados ao longo do nosso curso, são eles: jitter, velocidade de download e upload, ping, taxa de perda de pacote e latência.</p>
        <p>Você que está lendo isso provavelmente não faz a menor ideia do que esses parâmetros significam, mas eles são de suma importância na analise da conexão. Nem sempre, por exemplo, uma velocidade alta de download e upload são suficientes para julgar uma conexão como boa, caso a latência ou a perda de pacotes estejam altas também. Mas como provavelmente você não está muito interessado nisso, faça nosso teste e se oriente pelas escalas.</p></div>
      </div>
    </div>

    <div class="container">
      <h3 style="margin-top: 40px;" id="perg">PERGUNTAS FRENQUENTES</h3>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">O que é a UnetB?</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">A UnetB é um software de medição de qualidade de conexão que permite que o usuário verifique parâmetros de sua conexão de banda larga, como as velocidades de upload e download, a latência, a variação da latência (ou jitter) e a perda de pacotes. A aplicação também permite o compartilhamento das medições dos usuários em um mapa.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Quanto custa usar a UnetB?</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">A UnetB é uma aplicação gratuita.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Posso usar a UnetB comercialmente?</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">Pode! No entanto, lembramos que seu uso é restrito à UnB- Darcy Ribeiro.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Como funciona?</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Os usuários podem realizar o teste ao acessar o campo "Teste de Velocidade" no canto superior da página.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Quais fatores externos podem influenciar os resultados do teste?</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">Para garantir resultados mais precisos, é necessário que enquanto o teste estiver sendo executado, os usuários não devem usar o computador para outras funções, especialmente aplicações que usam o acesso à Internet, pois estas aplicações conflitam com o teste e podem gerar um resultado impreciso.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Como devem ser interpretados os resultados?</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">A medição mais simples que os usuários receberão é a velocidade de download de sua conexão de banda larga. Este resultado pode ser facilmente comparado com a velocidade de download contratada.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Quais dispositivos a UnetB usa para capturar os pacotes?</a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body">Somente redes wireless LAN.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Em quais plataformas a UnetB funciona?</a>
        </h4>
      </div>
      <div id="collapse9" class="panel-collapse collapse">
        <div class="panel-body">A UnetB funciona bem para todos os navegadores: Google Chrome, Mozilla Firefox, Opera e outros; porém apenas nos sistemas Linux.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse15">Que informações são coletadas para a realização do teste de conexão?</a>
        </h4>
      </div>
      <div id="collapse15" class="panel-collapse collapse">
        <div class="panel-body">
          <p>O teste de conexão pode requerer ou não dados pessoais do usuário, dependendo da sua vontade de ter um cadastro no programa, tendo certos privilegios os usuários cadastrados. No entanto, o teste sempre utilizará as informações do seu computador para classificar e avaliar as informações dos dados:</p>
          <ol>
            <li>O seu endereço de IP.</li>
            <li>O Sistema Operacional que está sendo usado no computador do usuário.</li>
            <li>Como suas interfaces de rede estavam ocupadas no momento do teste.</li>
          </ol>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse16">Quais são as informações que serão apresentadas pelo teste de conexão?</a>
        </h4>
      </div>
      <div id="collapse16" class="panel-collapse collapse">
        <div class="panel-body">
          <p>Os resultados apresentados ao usuário, após a conclusão do teste, são:</p>
            <ol>
              <li>Localização da medição(apenas para usuários cadastrados);</li>
              <li>Velocidade de download(qualquer usuário);</li>
              <li>Velocidade de upload(qualquer usuário);</li>
              <li>Latência(qualquer usuário);</li>
              <li>Perda de pacotes(qualquer usuário);</li>
              <li>Jitter(qualquer usuário);</li>
            </ol>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse17">Os meus dados serão utilizados para outros fins?</a>
        </h4>
      </div>
      <div id="collapse17" class="panel-collapse collapse">
        <div class="panel-body">Os dados são utilizados somente para classificar os resultados, apresentá-los para o usuário e posteriormente serem acrescentados ao mapa.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse18">O uso desse teste de conexão é seguro?</a>
        </h4>
      </div>
      <div id="collapse18" class="panel-collapse collapse">
        <div class="panel-body">Sim, esse é um teste de medição de qualidade de conexão muito seguro. Realiza downloads e uploads aleatoriamente, e os dados transferidos não são armazenados no computador do usuário.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse20">Quanto custa usar a UnetB?</a>
        </h4>
      </div>
      <div id="collapse20" class="panel-collapse collapse">
        <div class="panel-body">A UnetB é uma aplicação gratuita.</div>
      </div>
    </div>


    <div class="container">
      <h3 style="margin-top: 40px;" id="med">NOSSAS MEDIDAS</h3>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">O que é a velocidade de download?</a>
        </h4>
      </div>
      <div id="collapse10" class="panel-collapse collapse">
        <div class="panel-body">É a velocidade de recebimento de dados (como um arquivo, vídeo, etc) de outro computador ou servidor para um computador local através da Internet. Usuários domésticos tendem a realizar mais downloads do que uploads.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse11">O que é a velocidade de upload?</a>
        </h4>
      </div>
      <div id="collapse11" class="panel-collapse collapse">
        <div class="panel-body">É a velocidade de envio de dados (como um arquivo, e-mail, foto, etc) de um computador em um local para um computador ou servidor em outro local, através da Internet. A velocidade de upload é geralmente muito menor do que a velocidade de download. A razão para isso é que as pessoas, ao acessar a Internet, geralmente fazem mais download do que upload.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse12">O que é perda de pacotes?</a>
        </h4>
      </div>
      <div id="collapse12" class="panel-collapse collapse">
        <div class="panel-body">Um pacote é uma unidade formatada de dados e é utilizado para transmitir as informações na Internet em formato de pequenas unidades gerenciáveis. A perda de pacotes ocorre quando um dos pacotes não chega ao seu destino. Isso pode ocorrer por falha de hardware ou baixa qualidade da conexão. A perda de pacotes pode aumentar, à medida que a quantidade de tráfego na rede aumenta.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse13">O que é latência e como é medida?</a>
        </h4>
      </div>
      <div id="collapse13" class="panel-collapse collapse">
        <div class="panel-body">É o tempo que leva para um pacote de informação deixar o computador original e chegar ao seu destino. Uma maneira de medir a latência de uma conexão é um teste de ping, em que é enviado um pacote a partir do computador original para ser retransmitido de volta pelo computador de destino. O tempo de ida e volta gasto pelo pacote, é então utilizado como medida da latência.</div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse14">O que é jitter?</a>
        </h4>
      </div>
      <div id="collapse14" class="panel-collapse collapse">
        <div class="panel-body">Jitter é a variação no tempo de chegada dos pacotes, causada por congestionamento na rede. Em outras palavras, o jitter representa a variação na latência.</div>
      </div>
    </div>

    <div class="container">
      <h3 style="margin-top: 40px;" id="prob">PROBLEMAS?</h3>
    </div>

    <div class="panel panel-default" style="margin-bottom: 60px;">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse19">Por que o meu teste de conexão não funciona?</a>
        </h4>
      </div>
      <div id="collapse19" class="panel-collapse collapse" >
        <div class="panel-body">O teste de conexão pode não funcionar caso sua localização esteja desabilitada. Deste modo o usuário deve habilitar sua localização quando for solicitado.</div>
      </div>
    </div>
</div>





<!--
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Collapsible Group 2</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Collapsible Group 3</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
      </div>
    </div>
  </div> 
</div>
-->

		<script src="_js/jquery.min.js"></script> <!-- Carrega JS jquery-->
		<script src="_js/bootstrap.js"></script> <!-- Carrega JS do bootstrap-->
	</body>
</html>