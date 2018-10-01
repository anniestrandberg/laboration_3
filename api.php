<?php
header("Content-Type:application/json");
require "database.php";

//Om det finns ett värde i $_GET(['name]) att kolla upp. Kör funktionen som hämtar en, flera eller alla produkter.
if(!empty($_GET['name']))
{
	$name = $_GET['name'];

	$product = DATABASE::get_products($name);
	
	if(empty($product))
	{
		response(200,"Product Not Found",NULL);
	}
	else
	{
		response(200,"Product Found",$product);
	}
	
}
else
{
	response(400,"Invalid Request",NULL);
}



function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status'] = $status;
	$response['status_message'] = $status_message;
	$response['data'] = $data;
	
	$json_response = json_encode($response);
	echo $json_response;
}