<?php
  class Rest {

    public $Type        = "application/json";
    public $Request     = array();
    private $StatusCode = 200;

    public function __construct() {
      $this->ProcessRequest();
    }

    public function ShowResponse($Data, $Status) {
      $this->StatusCode = ($Status) ? $Status : 200;//si no se envía $estado por defecto será 200
      $this->SetHeader();
      echo $Data;
      exit;
    }
    private function SetHeader() {
      header("HTTP/1.1 " . $this->StatusCode . " " . $this->GetStatusCode());
      header("Content-Type:" . $this->Type . ';charset=utf-8');
    }
    private function FilterData($Data) {
      $NewData = array();
      if (is_array($Data)) {
        foreach ($Data as $Key => $Value) {
          $NewData[$Key] = $this->FilterData($Value);
        }
      } else {

        //Remove quotes if magic_quotes_gpc extension is activated.
        if (get_magic_quotes_gpc()) {
          $Data = trim(stripslashes($Data));
        }

        //Remove PHP and HTML tags
        $Data = strip_tags($Data);

        //Convert all HTML characters
        $Data = htmlentities($Data);

        //Remove spaces
        $NewData = trim($Data);
      }
      return $NewData;
    }

    private function ProcessRequest() {
      $Method = $_SERVER['REQUEST_METHOD'];

      switch ($Method) {
        case "GET":
          $this->Request = $this->FilterData($_GET);
        break;
        case "POST":
          $this->Request = $this->FilterData($_POST);
        break;
        case "DELETE"://Execute next case.
        case "PUT":
          //PHP doesn't have a native method to read a PUT or DELETE petition, so we create it.
          parse_str(file_get_contents("php://input"), $this->Request);
          $this->Request = $this->FilterData($this->Request);
        break;
        default:
          //$this->response('', 404);
          $this->StatusCode = 404;
        break;
      }
    }
    private function GetStatusCode() {
      $Status = array(
      200 => 'OK',
      201 => 'Created',
      202 => 'Accepted',
      204 => 'No Content',
      301 => 'Moved Permanently',
      302 => 'Found',
      303 => 'See Other',
      304 => 'Not Modified',
      400 => 'Bad Request',
      401 => 'Unauthorized',
      403 => 'Forbidden',
      404 => 'Not Found',
      405 => 'Method Not Allowed',
      500 => 'Internal Server Error');
      $Response = ($Status[$this->StatusCode]) ? $Status[$this->StatusCode] : $Status[500];
      return $Response;
    }
  }
?>
