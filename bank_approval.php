<?php

function curl_get_contents($url)
{
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($curl);
  curl_close($curl);
  return $data;
}
echo "HERE:" . $_GET['shule'];
if (!empty($_GET['shule'])) {
    /**
     * Here we build the url we'll be using to access the google maps api
     */
    $schoools_url = 'https://nefas.herokuapp.com/public/api/v1/fas/approvedList?schoolID=' . urlencode($_GET['shule'])
					.'&period=' . urlencode($_GET['mwaka']);
    $schools_json = file_get_contents($schoools_url);
	//$schools_json = curl_get_contents($url);
    $schools_array = json_decode($schools_json, true);

	if (!empty($schools_array)) {
        foreach ($schools_array['data'] as $key => $item) {
            //echo '<img id="' . $item['id'] . '" src="' . $item['images']['low_resolution']['url'] . '" alt=""/><br/>';
			echo $schools_array;
        }
    }

    /**
     * Time to make our Instagram api request. We'll build the url using the
     * coordinate values returned by the google maps api
     */
    $url = 'https://' .
        'api.instagram.com/v1/media/search' .
        '?lat=' . $lat .
        '&lng=' . $lng .
        '&client_id=CLIENT-ID'; //replace "CLIENT-ID"

    //$json = file_get_contents($url);
	$json = curl_get_contents($url);
    $array = json_decode($json, true);
}
?>


<!doctype html>
<html lang="en" id="html">
<head>
	<meta charset="utf-8">
	<title>Banking Confirm Data</title>
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript">
		//auto expand textarea
		function adjust_textarea(h) {
			h.style.height = "50px";
			h.style.height = (h.scrollHeight+100)+"px";
		}
	</script>
</head>
<body id="body">

<div class="form-style-8" width=600 height=900 center>
  <h2>Login and download </h2>
  <form action ="" method="get" name="bank_approval">
    <select id="cars" xmultiple name="shule" >
	  <option value="000000">Kenya High Secondary School</option>
	  <option value="111111">Lang'ata Secondary School</option>
	  <option value="222222">Starehe Secondary School</option>
	  <option value="333333">Maranda Boys Secondary School</option>
	  <option value="123456">Thika High Secondary School</option>
	</select>
    <input type="text" name="mwaka" placeholder="Period" />
    <button type="submit">Get School Data</button>
  </form>
</div>
</body>
</html>
