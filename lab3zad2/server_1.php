<?php
    #===================================================================
    $xml  = file_get_contents('php://input');
    $params = xmlrpc_decode( $xml );
    #-------------------------------------------------------------------
    # $method = $_SERVER[ 'SCRIPT_NAME' ];
    $method = basename( $_SERVER[ 'SCRIPT_FILENAME' ] );
    $method = substr( $method, 0, -4 );
    #-------------------------------------------------------------------
    $array = array( 
        //'method' => $method,
        'hex' => dechex($params[0])
    );

    $res = xmlrpc_encode_request(NULL, $array);
    error_log($array['hex']);
    #-------------------------------------------------------------------
    print $res;
    #===================================================================
?>
