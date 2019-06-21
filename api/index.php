<?php
namespace Backend;
spl_autoload_register(function ($class) {
    require '../'.$class . '.php';
});

$request = $_SERVER['REQUEST_URI'];
$parts = explode('/', $request);
$resource = $parts[3];
if(isset($parts[4]))
$id = $parts[4];

// Se l'utente inserisce un url del tipo /api/risorsa/id/altro non lo permetto!
if(!isset($parts[5]) && !isset($id)){

    switch($_SERVER['REQUEST_METHOD']){
        case "GET": 
        switch($resource){
            case "contenuti": ContenutoController::index(); break;
            case "multimedia": MultimediaController::index(); break;
            case "utenti": UtenteController::index(); break;
            case "raccolte": RaccoltaController::index(); break;
        }
        break;
        case "POST": 
        // switch($resource){
        //     case "contenuti": ContenutoController::index(); break;
        //     case "multimedia": MultimediaController::index(); break;
        //     case "utenti": UtenteController::index(); break;
        //     case "raccolte": RaccoltaController::index(); break;
        // }
        break;
        case "PATCH": break;
        case "PUT": break;
    }

}
elseif(!isset($parts[5]) && isset($id)){
    // switch($resource){
    //     case "contenuti": ContenutoController::index($id); break;
    //     case "multimedia": MultimediaController::index(); break;
    //     case "utenti": UtenteController::index(); break;
    //     case "raccolte": RaccoltaController::index(); break;
    // }
}
else{
    $resp = array(
        'status' => 'formato non corretto'
    );
    echo json_encode($resp);
}
?>