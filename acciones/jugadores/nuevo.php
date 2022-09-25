<?php

header('Content-Type: application/json');

require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$mayor = 'El jugador debe ser mayor de edad';

$resp = new NuevoResponse();
$resp->IsOk = true;

if ($req->Edad < 18) {
    $resp->IsOk = false;
    $resp->Mensaje[] = $mayor;
}
if ($req->Puesto != 'Delantero' && $req->Puesto != 'Defensor' && $req->Puesto != 'Arquero' && $req->Puesto != 'Mediocampista') {
    $resp->Mensaje[] = 'El puesto ' . $req->Puesto . ' no existe.';
}

echo json_encode($resp);