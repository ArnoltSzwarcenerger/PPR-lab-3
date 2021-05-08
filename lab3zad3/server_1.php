<?php
    #===================================================================
    $xml  = file_get_contents('php://input');
    $params = xmlrpc_decode( $xml );
    #-------------------------------------------------------------------
    # $method = $_SERVER[ 'SCRIPT_NAME' ];
    #$method = basename( $_SERVER[ 'SCRIPT_FILENAME' ] );
    #$method = substr( $method, 0, -4 );
    #-------------------------------------------------------------------
    $array = array( 
        //'method' => $method,
        'hex' => dechex($params[0])
    );
    error_log($array['hex']);
    $msg = $array['hex'];
    str_pad($msg, 256, " ");
    #-------------------------------------------------------------------
    #tworzenie socketa
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if(!is_resource($socket)) onSocketFailure("Failed to create socket");
    #łączenie socketa do adresu
    socket_connect($socket, "127.0.0.1", 9002);
    socket_write($socket, $msg);
?>
