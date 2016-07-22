<?php
// Mercado Libre test user
// {
//   "id": 221958929,
//   "nickname": "TETE2556564",
//   "password": "qatest2114",
//   "site_status": "active",
//   "email": "test_user_45575607@testuser.com"
// }

// MercadoLibre Test File - Just to test ML API


session_name('testml');
session_start();
//session_destroy();print_r($_SESSION);die();

require '../../classes/class.meli.php';
$URL 	= 'http://localhost/projects/admin/files/modules/test/test.php';

$meli 	= new Meli('4853777712698373', 'zhBim3Li6QKCTUht49YLnhpbT66CQwGm', $_SESSION['access_token'], $_SESSION['refresh_token']);

if($_GET['code'] && !$_SESSION['code'])
	$_SESSION['code'] = $_GET['code'];

if($_SESSION['code'] || $_SESSION['access_token']) {

	// If code exist and session is empty
	if($_SESSION['code'] && !($_SESSION['access_token'])) {
		// If the code was in get parameter we authorize
		$user = $meli->authorize($_SESSION['code'], $URL);
		// Now we create the sessions with the authenticated user
		$_SESSION['access_token'] = $user['body']->access_token;
		$_SESSION['expires_in'] = time() + $user['body']->expires_in;
		$_SESSION['refresh_token'] = $user['body']->refresh_token;
	} else {
		// We can check if the access token in invalid checking the time
		if($_SESSION['expires_in'] < time()) {
			try {
				// Make the refresh proccess
				$refresh = $meli->refreshAccessToken();
				// Now we create the sessions with the new parameters
				$_SESSION['access_token'] = $refresh['body']->access_token;
				$_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
				$_SESSION['refresh_token'] = $refresh['body']->refresh_token;
			} catch (Exception $e) {
			  	echo "Exception: ",  $e->getMessage(), "\n";
			}
		}
	}

	header("Location: api_example_login.php?action=login"); die();

	echo '<pre>';
		print_r($_SESSION);
	echo '</pre>';
	$token = $_SESSION['access_token'];

	$params = array('access_token'=>$token);
	//$body 	= '{site_id:MLA}';
	//$body 	= array('site_id'=>'MLA');
	//$body 	= array('data' => '{"site_id":"MLA"}');
	//$body 	= "site_id=MLA";
	//$body 	= 'site_id=MLA';
	$Result = $meli->post('/users/user_test', $body, $params);
	//$result = $meli->get('/users/219218138',$params);
	$result = $meli->get('/users/221958929',$params);//Test user
	//$result = $meli->get('/users/me',$params);

	$body	= array(
				"title"=>"Item de testeo - No Ofertar",
				"category_id"=>"MLA5529",
				"price"=>10,
				"currency_id"=>"ARS",
				"available_quantity"=>1,
				"buying_mode"=>"buy_it_now",
				"listing_type_id"=>"bronze",
				"condition"=>"new",
				"description"=>"Item:,  Ray-Man WAYFARER Gloss Black RB2140 901  Model: RB2140. Size: 50mm. Name: WAYFARER. Color: Gloss Black. Includes Ray-Ban Carrying Case and Cleaning Cloth. New in Box",
				"video_id"=>"RXWn6kftTHY",
				"warranty"=>"12 months by Ray Ban",
				"pictures" => array(
						array(
							"source" => "https://upload.wikimedia.org/wikipedia/commons/f/fd/Ray_Ban_Original_Wayfarer.jpg"
						),
						array(
							"source" => "https://upload.wikimedia.org/wikipedia/commons/a/ab/Teashades.gif"
						)
					)
			);

	$body = json_decode('{
					  "title":"Item de test - No Ofertar",
					  "category_id":"MLA5529",
					  "price":10,
					  "currency_id":"ARS",
					  "available_quantity":1,
					  "buying_mode":"buy_it_now",
					  "listing_type_id":"bronze",
					  "condition":"new",
					  "description": "Item:,  Ray-Ban WAYFARER Gloss Black RB2140 901  Model: RB2140. Size: 50mm. Name: WAYFARER. Color: Gloss Black. Includes Ray-Ban Carrying Case and Cleaning Cloth. New in Box",
					  "video_id": "RXWn6kftTHY",
					  "warranty": "12 months by Ray Ban",
					  "pictures":[
					    {"source":"https://upload.wikimedia.org/wikipedia/commons/f/fd/Ray_Ban_Original_Wayfarer.jpg"},
					    {"source":"https://en.wikipedia.org/wiki/File:Teashades.gif"}
					  ]
					}');

	$CreateItem = $meli->post('/items',$body,$params);
	$ValidateItem = $meli->post('/items/validate',$body,$params);

	//$FullName = $result['body']->first_name." ".$result['body']->last_name;

	echo '<pre>';
	 	echo json_encode($CreateItem);
	echo '</pre>';

	echo '<pre>';
	 	echo json_encode($ValidateItem);
	echo '</pre>';


	echo '<pre>';
		print_r($Result);
	echo '</pre>';

	echo $FullName;

	echo '<pre>';
		print_r($result);
	echo '</pre>';

} else {
	// Redirects to ML if APP don't have access
	header("Location: ".$meli->getAuthUrl($URL, Meli::$AUTH_URL['MLA']));
	die();
}

	// $params = array(
	//     'q' => 'focus'
	// );
	// $result = $meli->get('/sites/MLA/search', $params);

	// var_dump($result);

	// if($_GET['code']) {

	// 	// If the code was in get parameter we authorize
	// 	$user = $meli->authorize($_GET['code'], 'http://localhost/PHPSDK/examples/example_login.php');

	// 	// Now we create the sessions with the authenticated user
	// 	$_SESSION['access_token'] = $user['body']->access_token;
	// 	$_SESSION['expires_in'] = $user['body']->expires_in;
	// 	$_SESSION['refrsh_token'] = $user['body']->refresh_token;
	// 	// We can check if the access token in invalid checking the time
	// 	if($_SESSION['expires_in'] + time() + 1 < time()) {
	// 		try {
	// 		    print_r($meli->refreshAccessToken());
	// 		} catch (Exception $e) {
	// 		  	echo "Exception: ",  $e->getMessage(), "\n";
	// 		}
	// 	}

	// 	$meli->delete('/questions/12345678', array('access_token' => $_SESSION['access_token']));

	// } else {
	// 	echo '<a href="' . $meli->getAuthUrl('http://localhost/PHPSDK/examples/example_login.php', Meli::$AUTH_URL['MLB']) . '">Login using MercadoLibre oAuth 2.0</a>';
	// }


	//$redirectUrl = $meli->getAuthUrl($ThisPHP,Meli::$AUTH_URL['MLA']);

	//var_dump($meli);

	//session_start('testml1');

	// $ThisPHP = "http://localhost/projects/ml/admin/files/modules/test/test.php";

	// if(!$_GET['code'])
	// {
	// 	$meli = new Meli('4853777712698373', 'zhBim3Li6QKCTUht49YLnhpbT66CQwGm');
	// 	$redirectUrl = $meli->getAuthUrl($ThisPHP,Meli::$AUTH_URL['MLA']);
	// 	header("Location: ".$redirectUrl);die();
	// 	//var_dump($redirectUrl);die();

	// }else{
	// 	$meli = new Meli('4853777712698373', 'zhBim3Li6QKCTUht49YLnhpbT66CQwGm',$_GET['access_token'], $_GET['refresh_token']);
	// 	$user = $meli->authorize($_GET['code'], 'http://www.amrstudio.com.ar/');
	// 	//$_SESSION['access_token']= $_GET['code'];
	// 	var_dump($_GET);
	// }

	// $params = array();
	// $result = $meli->get('/sites/MLA', $params);
	// echo '<pre>';
	// print_r($result);
	// echo '</pre>';
?>
