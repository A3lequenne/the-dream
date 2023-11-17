<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./styles.css">
        <title>The Dream</title>
    </head>
    <body>
        <div class="container">
        <h1 class="title">The Dream</h1>
        <div class="center">
        <form method="post" id="convert_currencies">
            <div class="amount_to_convert">
                 <label>Amount : </label>
                <input type="text" placeholder="Amount of thunes" name="amount" id="amount"/>
            </div>
            <div class="forms">
                <div class="c_from">
                <label>From :</label>
                <select name="currency_from">
                    <option value="JPY">Japanese Yen</option>
                    <option value="USD" selected="1">US Dollar</option>
                    <option value="KRW">Korean Won</option>
                    <option value="EUR">Euro</option>
                </select>
                </div>

                <div class="c_to">
                <label>To :</label>
                <select name="currency_to">
                    <option value="JPY" selected="1">Japanese Yen</option>
                    <option value="USD">US Dollar</option>
                    <option value="KRW">Korean Won</option>
                    <option value="EUR">Euro</option>
                </select>
                </div>
            </div>
            <button type="submit" name="convert" id="convert" class="convert_button">Convert</button>    
        </form>
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $amount = $_POST['amount'];
                $currency_from = $_POST['currency_from'];
                $currency_to = $_POST['currency_to'];
                
                if (!$amount) 
                echo ('<div> <p class="result">Please enter an amount to convert</p></div>');
                else {
                    if ($currency_from == 'JPY') {
                        if ($currency_to == 'USD') {
                            $res = $amount * 0.0066;
                        }
                        if ($currency_to == 'KRW') {
                            $res = $amount * 8.55;
                        }
                        if ($currency_to == 'EUR') {
                            $res = $amount * 0.0061;
                        }
                    }
                    else if ($currency_from == 'USD') {
                        if ($currency_to == 'JPY') {
                            $res = $amount * 151.28;
                        }
                        if ($currency_to == 'KRW') {
                            $res = $amount * 1293.18;
                        }
                        if ($currency_to == 'EUR') {
                            $res = $amount * 0.92;
                        }
                    }
                    else if ($currency_from == 'KRW') {
                        if ($currency_to == 'JPY') {
                            $res = $amount * 0.12;
                        }
                        if ($currency_to == 'USD') {
                            $res = $amount * 0.00077;
                        }
                        if ($currency_to == 'EUR') {
                            $res = $amount * 0.00071;
                        }
                    }
                    else if ($currency_from == 'EUR') {
                        if ($currency_to == 'JPY') {
                            $res = $amount * 164.05;
                        }
                        if ($currency_to == 'USD') {
                            $res = $amount * 1.08;
                        }
                        if ($currency_to == 'KRW') {
                            $res = $amount * 1402.60;
                        }
                    } 
                    echo ('<div> <p class="result">' . $amount." ".$currency_from." is ".$res." ".$currency_to . "</p></div>");
                }
            }
        ?>
        </div>
        </div>
        <?php
            /* I started with an API but the conversion rates werent working all the time (some currencies work, some dont) on the one I chose so I decided to not use an API. I'm glad I got to see how it worked tho
            function getCurrencyConvert() {
	            $curl = curl_init();

	            curl_setopt_array($curl, [
		            CURLOPT_URL => "https://currency-conversion-and-exchange-rates.p.rapidapi.com/latest",
		            CURLOPT_RETURNTRANSFER => true,
		            CURLOPT_ENCODING => "",
		            CURLOPT_MAXREDIRS => 10,
		            CURLOPT_TIMEOUT => 30,
		            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		            CURLOPT_CUSTOMREQUEST => "GET",
		            CURLOPT_HTTPHEADER => [
			            "X-RapidAPI-Host: currency-conversion-and-exchange-rates.p.rapidapi.com",
			            "X-RapidAPI-Key: 30c590bc3fmshf133e6f1bb1c0fcp1a9c38jsn3b130a3c2c92"
		            ],
	            ]);

	            $response = curl_exec($curl);
	            $err = curl_error($curl);

	            curl_close($curl);

	            if ($err) {
		            echo "cURL Error #:" . $err;
	            } else {
		
	            }
	            return $response;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $from_currency = $_POST['from_currency'];
            $amount = $_POST['amount'];
            $to_currency = $_POST['to_currency'];

            $api_response = getCurrencyConvert();

            $api_data = json_decode($api_response, true);

            if ($api_data && isset($api_data['rates']) && isset($api_data['rates'][$to_currency])) {
                $converted_amount = $amount * $api_data['rates'][$to_currency];

                echo "Converted Amount: $converted_amount $to_currency";
            } else {
                if ($api_data && isset($api_data['error'])) {
                    echo "API Error: " . $api_data['error'];
                } else {
                    echo "Error in currency conversion. Please try again.";
                }
            }
        }*/
        ?>


    </body>
</html>