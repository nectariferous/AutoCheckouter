<?php

function getJsonResponse($data) {
    $url = "https://httpnaoki.com/process_form.php";
    $headers = [
        'authority: httpnaoki.com',
        'accept: */*',
        'accept-language: ru-RU,ru;q=0.5',
        'content-type: application/x-www-form-urlencoded',
        'origin: https://httpnaoki.com',
        'referer: https://httpnaoki.com/',
        'sec-ch-ua: "Brave";v="113", "Chromium";v="113", "Not-A.Brand";v="24"',
        'sec-ch-ua-mobile: ?0',
        'sec-ch-ua-platform: "Windows"',
        'sec-fetch-dest: empty',
        'sec-fetch-mode: cors',
        'sec-fetch-site: same-origin',
        'sec-gpc: 1',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36',
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
        return null;
    }

    curl_close($ch);

    return json_decode($response, true);
}


// $jsonResponse = getJsonResponse($data);

// echo "JSON Response: \n";
// echo json_encode($jsonResponse);

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $checkoutLink = $_POST['checkoutlink'];

//     // Call the getJsonResponse function with the provided checkoutlink
//     $jsonResponse = getJsonResponse(['checkoutlink' => $checkoutLink]);

//     // Return the JSON response
//     header('Content-Type: application/json');
//     echo json_encode($jsonResponse);
// }

