<?php
require_once "method.php";
$pgw = new Pegawai();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $pgw->getPegawai($id);
         }
         else
         {
            $pgw->getPegawais();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $pgw->updatePegawai($id);
         }
         else
         {
            $pgw->insertPegawai();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id"]);
            $pgw->deletePegawai($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      // break;
}
 
 
 
 
?>