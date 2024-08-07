<?php

class HttpnaokiApiClient {
    private $baseUrl = "https://httpnaoki.com";
    private $headers = [
        'Content-Type: application/x-www-form-urlencoded',
        'Accept: */*',
        'Accept-Language: ru-RU,ru;q=0.5',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-origin',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36',
    ];

    /**
     * Sends an HTTP POST request to the HTTPnaoki API with the given parameters.
     *
     * @param array $params the parameters to send with the request
     * @return mixed the response as a JSON object, or null if there was an error
     */
    public function sendRequest(array $params) {
        $url = "{$this->baseUrl}/process_form.php";
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            error_log('Error: ' . curl_error($ch));
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        return json_decode($response, true);
    }
}
