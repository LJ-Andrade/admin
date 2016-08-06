<?php
  session_name('testml');
  session_start();

  require '../../classes/class.meli.php';
  $Meli         = new Meli('4853777712698373', 'zhBim3Li6QKCTUht49YLnhpbT66CQwGm', $_SESSION['access_token'], $_SESSION['refresh_token']);
  $AccessToken  = $_SESSION['access_token'];
  $Params       = array('access_token'=>$AccessToken);

  function RefreshToken($obj)
  {
    if($_SESSION['expires_in'] < time()) {

        // Make the refresh proccess
        $refresh = $obj->refreshAccessToken();
        // Now we create the sessions with the new parameters
        $_SESSION['access_token'] = $refresh['body']->access_token;
        $_SESSION['expires_in'] = time() + $refresh['body']->expires_in;
        $_SESSION['refresh_token'] = $refresh['body']->refresh_token;
      }
  }

  if($_GET['action']=="show"){
    RefreshToken($Meli);
    $Result       = $Meli->get('/users/me',$Params);//Test user
    $User         = $Result['body'];
  }

  if($_GET['action']=="create")
  {
    // MLA111469 categoría de pijamas para mujeres
    // $Item = json_decode('{
  	// 				  "title":"API - Item de testeo - No Ofertar",
  	// 				  "category_id":"MLA3530",
  	// 				  "price":109,
  	// 				  "currency_id":"ARS",
  	// 				  "available_quantity":1,
  	// 				  "buying_mode":"buy_it_now",
  	// 				  "listing_type_id":"bronze",
  	// 				  "condition":"new",
  	// 				  "description": "Item:,  Ray-Ban WAYFARER Gloss Black RB2140 901  Model: RB2140. Size: 50mm. Name: WAYFARER. Color: Gloss Black. Includes Ray-Ban Carrying Case and Cleaning Cloth. New in Box",
  	// 				  "video_id": "RXWn6kftTHY",
  	// 				  "warranty": "12 months by Ray Ban",
  	// 				  "pictures":[
  	// 				    {"source":"https://upload.wikimedia.org/wikipedia/commons/f/fd/Ray_Ban_Original_Wayfarer.jpg"},
  	// 				    {"source":"https://en.wikipedia.org/wiki/File:Teashades.gif"}
  	// 				  ]
  	// 				}');
    RefreshToken($Meli);
    //http://articulo.mercadolibre.com.ar/MLA-628460854-ropa-de-cama-mujer-item-de-testeo-no-ofertar-_JM
    $Item = json_decode('{
  					  "title":"Ropa de Cama Mujer - Item de testeo - No Ofertar",
  					  "category_id":"MLA111469",
  					  "price":109,
  					  "currency_id":"ARS",
  					  "buying_mode":"buy_it_now",
  					  "listing_type_id":"bronze",
  					  "condition":"new",
  					  "description": "Item de testeo. No ofertar.",
  					  "variations":[
                {
                  "attribute_combinations":[
                    {
                      "id":"93000",
                      "value_id":"101993"
                    },
                    {
                      "id":"83000",
                      "value_id":"91993"
                    }
                  ],
                  "available_quantity":1,
                  "price":109,
                  "picture_ids":[
                    "https://upload.wikimedia.org/wikipedia/commons/f/fd/Ray_Ban_Original_Wayfarer.jpg"
                  ]
                },
                {
                  "attribute_combinations":[
                    {
                      "id":"93000",
                      "value_id":"101995"
                    },
                    {
                      "id":"83000",
                      "value_id":"92013"
                    }
                  ],
                  "available_quantity":1,
                  "price":109,
                  "picture_ids":[
                    "http://www.forumsport.com/img/productos/299x299/381606.jpg"
                  ]
                }
              ]
  					}');
    $CreateItem = $Meli->post('/items',$Item,$Params);
  }

  if($_GET['action']=="logout"){
    unset($_SESSION);
    session_destroy();
    header("Location: api_example_login.php");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Api Example</title>
  </head>
  <body>
    <button type="button" name="btn" id="btn">Ver Mi Usuario</button>
    <input type="text" value="<?php echo $User->nickname; ?>">
    <br>
    <br>
    <button type="button" name="create" id="create">Crear Item</button>
    <br>
    <br>
    <button type="button" name="logout" id="logout">Log Out</button>
    <br>
    <pre>
      <?php print_r($CreateItem); ?>
    </pre>

  </body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script>
  <script type="text/javascript">
    $(function(){
      $("#btn").click(function(){
        document.location = "api_example.php?action=show";
      });
      $("#create").click(function(){
        document.location = "api_example.php?action=create";
      });
      $("#logout").click(function(){
        document.location = "api_example.php?action=logout";
      });
    });
  </script>
</html>
