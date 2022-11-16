<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8> 

	<title>ECOquiz</title>

	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel = "shortcut icon" type = "imagem/x-icon" href = "img/icon/main.png" /> 

	<?php
		$servername = "localhost";
		$database = "banco_quiz";
		$username = "root";
		$password = "";

		$conn = mysqli_connect($servername, $username, $password, $database);
		$sql = "SELECT * FROM ranking ORDER BY pontos DESC limit 5";
		$rank = mysqli_query($conn, $sql);

		$numRegistros = mysqli_num_rows($rank);

		$cont = 1; 
	 ?>

</head>
<body>

	<header>

		<div class="engloba_head">

			<div >
				<img src="img/logo.png" class="logotipo" /> 
			</div> 

			<div class="engloba_menu">
				<ul class="menu"> 
					<a href="index.php"> <li>HOME</li> </a>
					<a href="orienta.html"> <li>ORIENTAÇÕES</li> </a>
					<a href="material.html"> <li>MATERIAL</li> </a>
					<a href="jogar.html"> <li>JOGAR</li> </a>
				</ul>
			</div>
		</div>

	</header>


	<main>

		<div class="conteudo1">
				
			<figure>
   				<span class="trs next"></span>
   				<span class="trs prev"></span>

   				<div id="slider">
      				<a href="#" class="trs"><img src="imagem1.jpg" alt="Confira o novo QUIZ ambiental!" /></a>
      				<a href="#" class="trs"><img src="imagem2.jpg" alt="ALERTA - a lista vermelha só aumenta..." /></a>
      				<a href="#" class="trs"><img src="imagem3.jpg" alt="Logo logo o novo desafio da ECOquiz chega para vocês!!!" /></a>
   				</div>

   				<figcaption></figcaption>
			</figure>

		 </div>


		 <div class="conteudo1">

		 	<a href="jogar.html"> <img src="img/home.png" class="imgconteudo" /> </a> 

		 	<p class="txtconteudo"> Seja bem vindo ao ECOquiz, saiba que ao aprender conosco você está ajudando o mundo a se tornar um lugar melhor. Vivemos em uma era de poluição e descaso com o planeta, diante desses fatos a iniciativa ECO tem como objetivo auxiliar jovens do mundo moderno a valorizar a vida que existe em sua volta e a melhor forma de atingir esse objetivo é por meio do conhecimento! Então não hesite, corra e responda nosso quiz ambiental e chegue ao topo do RANK!</p> 

		</div>



		<div class="conteudo2">

			<?php 
				if ($numRegistros != 0) {

					echo "<table class='table_rank'>";
					echo "<tr style=''> <td class='td_rank'> POSIÇÃO </td> <td class='td_rank'> NOME </td> <td class='td_rank'> PONTUAÇÃO </td><td class='td_rank'> INSTITUIÇÃO </td><tr> <br/>";

					while ($posicoes = mysqli_fetch_object($rank)) { 
						
						echo "<tr style=''><td class='td_rank'>". $cont ." </td> <td class='td_rank'>". $posicoes->Nome . "</td><td class='td_rank'>" .$posicoes->Pontos. "</td><td class='td_rank'>" .$posicoes->Instituicao. "</td><tr> ";

						$cont++; 
					}

					echo "</table>";

				} else {
					echo "Nenhum competidor foi encontrado";
				}
				mysqli_close($conn);
			?>
	
		 </div>

		 <img src="img/iniciativa.png" class="tituloONG" />

		 <div class="conteudo3">
		 <a href="https://www.amzprojects.com/"><img src="img/ongs/amz2.png" class="imgONG" /> </a>
		 <a href="https://www.ipe.org.br/"><img src="img/ongs/ape2.png" class="imgONG" /> </a>
		 <a href="https://www.sikana.tv/pt-br"><img src="img/ongs/sikana2.png" class="imgONG" /> </a>
		 <a href="https://www.wwf.org.br/"><img src="img/ongs/panda2.png" class="imgONG" /> </a>
		 <a href="https://unilivre.org.br/"><img src="img/ongs/unilivre2.png" class="imgONG" /> </a>
		</div>

	
	</main>

	<footer> 
			<p>Todos os direitos reservados </p> 
	</footer>

</body>




<script type="text/javascript">
function setaImagem(){
    var settings = {
        primeiraImg: function(){
            elemento = document.querySelector("#slider a:first-child");
            elemento.classList.add("ativo");
            this.legenda(elemento);
        },

        slide: function(){
            elemento = document.querySelector(".ativo");

            if(elemento.nextElementSibling){
                elemento.nextElementSibling.classList.add("ativo");
                settings.legenda(elemento.nextElementSibling);
                elemento.classList.remove("ativo");
            }else{
                elemento.classList.remove("ativo");
                settings.primeiraImg();
            }

        },

        proximo: function(){
            clearInterval(intervalo);
            elemento = document.querySelector(".ativo");

            if(elemento.nextElementSibling){
                elemento.nextElementSibling.classList.add("ativo");
                settings.legenda(elemento.nextElementSibling);
                elemento.classList.remove("ativo");
            }else{
                elemento.classList.remove("ativo");
                settings.primeiraImg();
            }
            intervalo = setInterval(settings.slide,5000);
        },

        anterior: function(){
            clearInterval(intervalo);
            elemento = document.querySelector(".ativo");

            if(elemento.previousElementSibling){
                elemento.previousElementSibling.classList.add("ativo");
                settings.legenda(elemento.previousElementSibling);
                elemento.classList.remove("ativo");
            }else{
                elemento.classList.remove("ativo");                     
                elemento = document.querySelector("a:last-child");
                elemento.classList.add("ativo");
                this.legenda(elemento);
            }
            intervalo = setInterval(settings.slide,5000);
        },

        legenda: function(obj){
            var legenda = obj.querySelector("img").getAttribute("alt");
            document.querySelector("figcaption").innerHTML = legenda;
        }

    }

    //chama o slide
    settings.primeiraImg();

    //chama a legenda
    settings.legenda(elemento);

    //chama o slide à um determinado tempo
    var intervalo = setInterval(settings.slide, 5000);
    document.querySelector(".next").addEventListener("click",settings.proximo,false);
    document.querySelector(".prev").addEventListener("click",settings.anterior,false);
}

window.addEventListener("load",setaImagem,false);
</script>



</html>

