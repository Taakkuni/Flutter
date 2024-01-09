<?php
require_once "method.php";
$psn = new Pasien();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $psn->getPasiens();
         }
         else
         {
            $psn->getPasien();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $psn->updatePasien($id);
         }
         else
         {
            $psn->insertPasien();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id"]);
            $psn->deletePasien($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      // break;
}
 
 
 
 
?>