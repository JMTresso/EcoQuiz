<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8> 

	<title>ECOquiz</title>

	<link rel="stylesheet" type="text/css" href="estilo.css"> 

	<?php
		$servername = "localhost";
		$database = "bancoaps";
		$username = "root";
		$password = "";

		$conn = mysqli_connect($servername, $username, $password, $database);
		$sql = "SELECT * FROM ranking ORDER BY pontos DESC limit 5";
		$rank = mysqli_query($conn, $sql);

		$numRegistros = mysqli_num_rows($rank);
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
					<a href="fale.html"> <li>FALE CONOSCO</li> </a>
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

					echo "<table style='color:white; text-align: center; font-size: 30px; float: top;  width: 100%;>";
					echo "<tr style=''><td  style='padding: 10px; border-bottom: solid white'> NOME </td> <td style='padding: 10px ; border-bottom: solid white'> PONTUAÇÃO </td> <td style='padding: 10px ; border-bottom: solid white'> DATA </td><tr> <br/>";

					while ($posicoes = mysqli_fetch_object($rank)) { 
						
						echo "<tr style=''><td  style='padding: 10px; border-bottom: solid white'>". $posicoes->nome . "</td><td style='padding: 10px ; border-bottom: solid white'>" .$posicoes->pontos.  "</td> <td style='padding: 10px ; border-bottom: solid white'>" .$posicoes->data. "</td><tr> ";

					}

					echo "</table>";

				} else {
					echo "Nenhum competidor foi encontrado";
				}
				mysqli_close($conn);
			?>
	
		 </div>


		 <div class="conteudo1">
		 	<img src="img/ongs/amz2.png" class="imgONG" />
		 	<img src="img/ongs/ape2.png" class="imgONG" />
		 	<img src="img/ongs/sikana2.png" class="imgONG" />
		 	<img src="img/ongs/panda2.png" class="imgONG" />
		 	<img src="img/ongs/unilivre2.png" class="imgONG" />
		</div>

	
	</main>

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

