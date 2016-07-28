<?php
 //require_once("Rest.php");
 class API extends Rest {
   const DB_SERVER      = "localhost";
   const DB_USER        = "user";
   const DB_PASSWORD    = "";
   const DB_NAME        = "autorizacion";
   private $_Connection = NULL;
   private $_Method;
   private $_Arguments;
   public function __construct() {
     parent::__construct();
     $this->DBconnect();
   }
   private function DBconnect() {
     $dsn = 'mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_SERVER;
     try {
       $this->_Connection = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
     } catch (PDOException $Error) {
       echo 'Connection Failed: ' . $Error->getMessage();
     }
   }
   private function ReturnError($ID) {
     $Errors = array(
       array('status' => "error", "msg" => "petición no encontrada"),
       array('status' => "error", "msg" => "petición no aceptada"),
       array('status' => "error", "msg" => "Empty request"),
       array('status' => "error", "msg" => "Wrong mail or password"),
       array('status' => "error", "msg" => "Error while deleteing user"),
       array('status' => "error", "msg" => "error actualizando nombre de usuario"),
       array('status' => "error", "msg" => "error buscando usuario por email"),
       array('status' => "error", "msg" => "error creando usuario"),
       array('status' => "error", "msg" => "usuario ya existe")
     );
     return $Errors[$ID];
   }
   public function ProcessCall() {
     if (isset($_REQUEST['url'])) {
       //si por ejemplo pasamos explode('/','////controller///method////args///') el resultado es un array con elem vacios;
       //Array ( [0] => [1] => [2] => [3] => [4] => controller [5] => [6] => [7] => method [8] => [9] => [10] => [11] => args [12] => [13] => [14] => )
       $url = explode('/', trim($_REQUEST['url']));
       //con array_filter() filtramos elementos de un array pasando función callback, que es opcional.
       //si no le pasamos función callback, los elementos false o vacios del array serán borrados
       //por lo tanto la entre la anterior función (explode) y esta eliminamos los '/' sobrantes de la URL
       $url = array_filter($url);
       $this->_Method = strtolower(array_shift($url));
       $this->_Arguments = $url;
       $func = $this->_Method;
       if ((int) method_exists($this, $func) > 0) {
         if (count($this->_Arguments) > 0) {
           call_user_func_array(array($this, $this->_Method), $this->_Arguments);
         } else {//si no lo llamamos sin argumentos, al metodo del controlador
           call_user_func(array($this, $this->_Method));
         }
       }
       else
         $this->ShowResponse($this->ToJSON($this->ReturnError(0)), 404);
     }
     $this->ShowResponse($this->ToJSON($this->ReturnError(0)), 404);
   }
   private function ToJSON($data) {
     return json_encode($data);
   }

   private function Users() {
     if ($_SERVER['REQUEST_METHOD'] != "GET") {
       $this->ShowResponse($this->ToJSON($this->ReturnError(1)), 405);
     }
     $Query = $this->_Connection->query("SELECT id, name, email FROM user");
     $Rows = $Query->fetchAll(PDO::FETCH_ASSOC);
     $Count = count($Rows);
     if ($Count > 0) {
       $Response['status'] = 'OK';
       $Response['users'] = $Rows;
       $this->ShowResponse($this->ToJSON($Response), 200);
     }
     $this->ShowResponse($this->ReturnError(2), 204);
   }

   private function LogIn() {
     if ($_SERVER['REQUEST_METHOD'] != "POST") {
       $this->ShowResponse($this->ToJSON($this->ReturnError(1)), 405);
     }
     if (isset($this->Request['email'], $this->Request['password'])) {
    //el constructor del padre ya se encarga de sanear los datos de entrada
       $Email = $this->Request['email'];
       $Password = $this->Request['password'];
       if (!empty($Email) and !empty($Password)) {
         if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
           //consulta preparada ya hace mysqli_real_escape()
           $Query = $this->_Connection->prepare("SELECT id, name, email, creation_date FROM user WHERE email=:email AND password=:password ");
           $Query->bindValue(":email", $Email);
           $Query->bindValue(":password", sha1($Password));
           $Query->execute();
           if ($Row = $Query->fetch(PDO::FETCH_ASSOC)) {
             $Response['status'] = 'OK';
             $Response['msg'] = 'datos pertenecen a usuario registrado';
             $Response['user']['id'] = $Row['id'];
             $Response['user']['name'] = $Row['name'];
             $Response['user']['email'] = $Row['email'];
             $this->ShowResponse($this->ToJSON($Response), 200);
           }
         }
       }
     }
     $this->ShowResponse($this->ToJSON($this->ReturnError(3)), 400);
   }

   private function UpdateName($UserID) {
     if ($_SERVER['REQUEST_METHOD'] != "PUT") {
       $this->ShowResponse($this->ToJSON($this->ReturnError(1)), 405);
     }
     //echo $UserID . "<br/>";
     if (isset($this->Request['name'])) {
       $Name = $this->Request['name'];
       $id = (int) $UserID;
       if (!empty($Name) and $id > 0) {
         $Query = $this->_Connection->prepare("update usuario set name=:name WHERE id =:id");
         $Query->bindValue(":name", $Name);
         $Query->bindValue(":id", $id);
         $Query->execute();
         $UpdatedRows = $Query->rowCount();
         if ($UpdatedRows == 1) {
           $Response = array('status' => "OK", "msg" => "Nombre de usuario actualizado correctamente.");
           $this->ShowResponse($this->ToJSON($Response), 200);
         } else {
           $this->ShowResponse($this->ToJSON($this->ReturnError(5)), 400);
         }
       }
     }
     $this->ShowResponse($this->ToJSON($this->ReturnError(5)), 400);
   }

   private function DeleteUser($UserID) {
     if ($_SERVER['REQUEST_METHOD'] != "DELETE") {
       $this->ShowResponse($this->ToJSON($this->ReturnError(1)), 405);
     }
     $ID = (int) $UserID;
     if ($ID >= 0) {
       $Query = $this->_Connection->prepare("DELETE FROM user WHERE id =:id");
       $Query->bindValue(":id", $ID);
       $Query->execute();
       //rowcount para insert, delete. update
       $DeletedRows = $Query->rowCount();
       if ($DeletedRows == 1) {
         $Response = array('status' => "OK", "msg" => "usuario borrado correctamente.");
         $this->ShowResponse($this->ToJSON($Response), 200);
       } else {
         $this->ShowResponse($this->ToJSON($this->ReturnError(4)), 400);
       }
     }
     $this->ShowResponse($this->ToJSON($this->ReturnError(4)), 400);
   }
   private function UserExists($Email) {
     if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
       $Query = $this->_Connection->prepare("SELECT email from user WHERE email = :email");
       $Query->bindValue(":email", $Email);
       $Query->execute();
       if ($Query->fetch(PDO::FETCH_ASSOC)) {
         return true;
       }
     }
     else
       return false;
   }

   private function crearUsuario() {
     if ($_SERVER['REQUEST_METHOD'] != "POST") {
       $this->ShowResponse($this->ToJSON($this->ReturnError(1)), 405);
     }
     if (isset($this->Request['name'], $this->Request['email'], $this->Request['password'])) {
       $Name = $this->Request['name'];
       $Password = $this->Request['password'];
       $Email = $this->Request['email'];
       if (!$this->UserExists($Email)) {
         $Query = $this->_Connection->prepare("INSERT into user (name,email,password,fRegistro) VALUES (:name, :email, :pwd, NOW())");
         $Query->bindValue(":name", $Name);
         $Query->bindValue(":email", $Email);
         $Query->bindValue(":password", sha1($Password));
         $Query->execute();
         if ($Query->rowCount() == 1) {
           $id = $this->_Connection->lastInsertId();
           $Response['status'] = 'OK';
           $Response['msg'] = 'usuario creado correctamente';
           $Response['user']['id'] = $id;
           $Response['user']['name'] = $Name;
           $Response['user']['email'] = $email;
           $this->ShowResponse($this->ToJSON($Response), 200);
         }
         else
           $this->ShowResponse($this->ToJSON($this->ReturnError(7)), 400);
       }
       else
         $this->ShowResponse($this->ToJSON($this->ReturnError(8)), 400);
     } else {
       $this->ShowResponse($this->ToJSON($this->ReturnError(7)), 400);
     }
   }
 }
 // $API = new API();
 // $API->ProcessCall();
