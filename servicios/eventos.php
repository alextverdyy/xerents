
<?php

if ($_REQUEST['coordenadas']) {
    require 'Eventful.php';

    // Enter your application key here. (See http://api.eventful.com/keys/)
    $app_key = 'rCR5P3ZZGndrHvpR';

    // Authentication is required for some API methods.
    // $user     = $_REQUEST['user'];
    // $password = $_REQUEST['password'];

    $ev = &new Services_Eventful($app_key);


    // All method calls other than login() go through call().
    $args = array(
        'where' => $_REQUEST['coordenadas'],
        'within' => "25", // Radio de escaneo de eventos
        'page_size' => "100", // Numero de registros que devuelve la api
        'page_number' => $_REQUEST['pagina'], // Pagina 

    );
    $event = $ev->call('events/search', $args);

    if ( PEAR::isError($event) )
    {
        print("An error occurred: " . $event->getMessage() . "\n");
        print_r( $ev );
    }


    echo json_encode($event, JSON_PRETTY_PRINT); //  IMPRIMIR EN FORMA DE JSON 'BONITO' LA RESPUESTA


}

?>
