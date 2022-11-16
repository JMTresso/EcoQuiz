<?php

	$servername = "localhost";
	$database = "banco_quiz";
	$username = "root";
	$password = "";


/* FUNÇÃO SALVAR */ 

    $pontos	= $_POST["aux"];
    $nome = $_POST["nick"];
	$icola = $_POST["escola"];

	$conn = mysqli_connect($servername, $username, $password, $database);
	
	// Check connection
	if (!$conn) {
      	die("Connection failed: " . mysqli_connect_error());
	}
	
 	if($nome != "")
 	{
		$sql = "INSERT INTO ranking (nome, pontos, instituicao) VALUES ('{$nome}', '{$pontos}', '{$icola}')";
		if (mysqli_query($conn, $sql)) {
			header("Location: index.php");
		} else {
      		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}  
 	} 
 	else {echo "ERRO, CAMPO DE NICK VAZIO <br />";} 

?>