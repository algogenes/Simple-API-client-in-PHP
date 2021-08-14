<?php
        function post_request(){
                $url = "http://localhost/api/product/create.php";
        $posting_data = array(
    'name' => 'PS5',
    'price' => '350',
    'description' => 'The best game box for avid gamers',
    'category_id' => 2,
    'created' => '2018-06-01 00:35:07');

        $post_data = json_encode($posting_data);
        $CONNECTION_TIMEOUT = "10";
        $READ_TIMEOUT = "15";

        $headers = array("Content-type: application/json");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $CONNECTION_TIMEOUT);
        curl_setopt($ch, CURLOPT_TIMEOUT, $READ_TIMEOUT);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data); // the JSON request
        $response = curl_exec($ch);

        echo curl_error($ch);
        curl_close($ch);
        echo $response;
        }

        function get_request(){
                echo "Starting function get_request"."<br>";
                $curl = curl_init();
                curl_setopt ($curl, CURLOPT_URL, "http://localhost/api/product/read_one.php?id=60");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

                $new_response = curl_exec ($curl);
                echo curl_error($curl);
                curl_close ($curl);
                echo $new_response;
        }

        get_request();
?>
