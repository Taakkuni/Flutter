<?php
require_once "koneksi.php";
class Pegawai 
{


    // function untuk get data mahasiswa dari databases
   public  function getPegawais()
   {

      // mengambil seluruh data pegawawi
      global $mysqli;
      $query="SELECT * FROM pegawai";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Pegawai Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function getPegawai($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM pegawai";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get pegawai Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }



//    function mengisi data mahasiswa
 
public function insertPegawai()
{
   global $mysqli;
   $arrcheckpost = array('nip' => '', 'nama' => '', 'tanggal_lahir' => '', 'nomor_telpon' => '', 'email' => '', 'password' => '');
   $hitung = count(array_intersect_key($_POST, $arrcheckpost));
   if($hitung == count($arrcheckpost)){
   
      $result = mysqli_query($mysqli, "INSERT INTO pegawai SET
         nip = '$_POST[nip]',
         nama = '$_POST[nama]',
         tanggal_lahir = '$_POST[tanggal_lahir]',
         nomor_telpon = '$_POST[nomor_telpon]',
         email = '$_POST[email]',
         password = '$_POST[password]'");
         
      if($result)
      {
         $response=array(
            'status' => 1,
            'message' =>'pegawai Added Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'pegawai Addition Failed.'
         );
      }
   } else {
      $response=array(
         'status' => 0,
         'message' =>'Parameter Do Not Match'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}

public function updatePegawai($id)
{
   global $mysqli;
   $arrcheckpost = array('nip' => '', 'nama' => '', 'tanggal_lahir' => '', 'nomor_telpon' => '', 'email' => '', 'password' => '');
   $hitung = count(array_intersect_key($_POST, $arrcheckpost));
   if($hitung == count($arrcheckpost)){
   
      $result = mysqli_query($mysqli, "UPDATE pegawai SET
         nip = '$_POST[nip]',
         nama = '$_POST[nama]',
         tanggal_lahir = '$_POST[tanggal_lahir]',
         nomor_telpon = '$_POST[nomor_telpon]',
         email = '$_POST[email]',
         password = '$_POST[password]'
         WHERE id='$id'");
         
      if($result)
      {
         $response=array(
            'status' => 1,
            'message' =>'pegawai Updated Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'pegawai Updation Failed.'
         );
      }
   } else {
      $response=array(
         'status' => 0,
         'message' =>'Parameter Do Not Match'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}

 
   function deletePegawai($id)
   {
      global $mysqli;
      $query="DELETE FROM pegawai WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'pegawai Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'pegawai Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}

class Pasien 
{


    // function untuk get data mahasiswa dari databases
   public  function getPasiens()
   {

      // mengambil seluruh data pegawawi
      global $mysqli;
      $query="SELECT * FROM pasien";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List pasien Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function getPasien($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM pasien";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get pasien Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }



//    function mengisi data mahasiswa
 
public function insertPasien()
{
   global $mysqli;
   $arrcheckpost = array('nomor_rm' => '', 'nama' => '', 'tanggal_lahir' => '', 'nomor_telpon' => '', 'alamat' => '',);
   $hitung = count(array_intersect_key($_POST, $arrcheckpost));
   if($hitung == count($arrcheckpost)){
   
      $result = mysqli_query($mysqli, "INSERT INTO pasien SET
         nomor_rm = '$_POST[nomor_rm]',
         nama = '$_POST[nama]',
         tanggal_lahir = '$_POST[tanggal_lahir]',
         nomor_telpon = '$_POST[nomor_telpon]',
         alamat = '$_POST[alamat]'");
         
      if($result)
      {
         $response=array(
            'status' => 1,
            'message' =>'pasien Added Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'pasien Addition Failed.'
         );
      }
   } else {
      $response=array(
         'status' => 0,
         'message' =>'Parameter Do Not Match'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}

public function updatePasien($id)
{
   global $mysqli;
   $arrcheckpost =array('nomor_rm' => '', 'nama' => '', 'tanggal_lahir' => '', 'nomor_telpon' => '', 'alamat' => '',);
   $hitung = count(array_intersect_key($_POST, $arrcheckpost));
   if($hitung == count($arrcheckpost)){
   
      $result = mysqli_query($mysqli, "UPDATE pasien SET
          nomor_rm = '$_POST[nomor_rm]',
         nama = '$_POST[nama]',
         tanggal_lahir = '$_POST[tanggal_lahir]',
         nomor_telpon = '$_POST[nomor_telpon]',
         alamat = '$_POST[alamat]'
         WHERE id='$id'");
         
      if($result)
      {
         $response=array(
            'status' => 1,
            'message' =>'pasien Updated Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'pasien Updation Failed.'
         );
      }
   } else {
      $response=array(
         'status' => 0,
         'message' =>'Parameter Do Not Match'
      );
   }
   header('Content-Type: application/json');
   echo json_encode($response);
}

 
   function deletePasien($id)
   {
      global $mysqli;
      $query="DELETE FROM pasien WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'pasien Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'pasien Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}
 
 ?>