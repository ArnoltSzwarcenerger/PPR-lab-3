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
        'suma' => $params[0] + $params[1],
    );

    $res = xmlrpc_encode_request(NULL, $array);
    error_log($array['suma']);
    #-------------------------------------------------------------------
    print $res;
    #===================================================================
?>
