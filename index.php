<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'bootstrap.php';


$app->get('/', function (Request $request, Response $response) use ($app) {
   
	 
});

$app->post('/novo', function(Request $request, Response $response) use ($app){


		try{
		$json = $request->getBody();
		$pessoa = json_decode($json, true);

		$con = getConnection();

		$stm = $con->prepare("INSERT INTO CLIENTES(nome,cpf,telefone) VALUES (:nome, :cpf, :telefone)");

		$stm->bindParam("nome", $pessoa[0]["Nome"]);
		$stm->bindParam("cpf", $pessoa[0]["Cpf"]);
		$stm->bindParam("telefone", $pessoa[0]["Telefone"]);


		$stm->execute();


		$return = $response->withJson($pessoa[0],201)->withHeader('Content-type', 'application/json');

		return $return;
	}catch(Excpetion $e){
		throw new Exception($ex->getMessage(), $ex->getCode());
	}



});


$app->run();