<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'bootstrap.php';


$app->get('/cliente/{id}', function (Request $request, Response $response) use ($app) {
   
    $id = $request->getAttribute("id");
    
    $con = getConnection();
    
    $stm = $con->prepare("SELECT * FROM CLIENTES WHERE ID =:id ");
    $stm->bindParam("id", $id);
    
    try{
   $stm->execute();
    }catch(PDOException $e){
        return $e->getMessage();
    }
    
    if($cliente = $stm->fetchAll(PDO::FETCH_ASSOC)){
    
    $return = $response->withJson($cliente, 200)->withHeader('Content-type', 'application/json');
    }
    else{
        $return = $response->withJson("Not Found", 404)->withHeader('Content-type', 'application/json');
    }
	 return $return;
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