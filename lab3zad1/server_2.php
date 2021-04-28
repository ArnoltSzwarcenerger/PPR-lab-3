<?php
#=======================================================================
function handler( $params ){
	print "AAAAAAAA";
	return $params;
}
#=======================================================================
$xmlrpc = xmlrpc_server_create();
xmlrpc_server_register_method( $xmlrpc, 'handler', 'handler' ); 
#=======================================================================
?>
