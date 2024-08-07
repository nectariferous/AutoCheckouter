<?php

require_once 'parse_link.php';
require_once 'httpnaoki_api_client.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $checkoutLink = $_POST['checkoutlink'];

    // Create a new HttpnaokiApiClient instance and call the sendRequest method with the provided checkoutlink
    $client = new HttpnaokiApiClient();
    $jsonResponse = $client->sendRequest(['checkoutlink' => $checkoutLink]);

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($jsonResponse);
}
