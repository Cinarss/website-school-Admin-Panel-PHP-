<?php

include "connect.php";


/* Genel Ayar Düzenleme */

    if(isset($_POST["settingsSave"])){

      $settingsSave=$db->prepare("UPDATE settings SET
      settings_title=:settings_title,
      settings_keywords=:settings_keywords,
      settings_description=:settings_description,
      settings_author=:settings_author
      
      WHERE settings_id=0 ");

      $update=$settingsSave->execute(array(
          "settings_title" => $_POST["settings_title"],
          "settings_keywords" => $_POST["settings_keywords"],
          "settings_description" => $_POST["settings_description"],
          "settings_author" => $_POST["settings_author"]
      ));

      if($update){
        Header("Location:general-settings.php?status=ok");
        exit;

      }else{
        Header("Location:general-settings.php?status=no");
        exit;
      }

    }

    /*--------------------------------------------------------- */
    /* Site logo düzenleme */

    if (isset($_POST['logoEdit'])) {

	

      $uploads_dir = '../dimg';
    
      @$tmp_name = $_FILES['settings_image']["tmp_name"];
      @$name = $_FILES['settings_image']["name"];
    
      $benzersizsayi4=rand(20000,32000);
      $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
    
      @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
    
      
      $duzenle=$db->prepare("UPDATE settings SET
        settings_image=:images
        WHERE settings_id=0");
      $update=$duzenle->execute(array(
        'images' => $refimgyol
        ));
    
    
    
      if ($update) {
    
        $resimsilunlink=$_POST['eski_yol'];
        unlink("../dimg/$resimsilunlink");
    
        Header("Location:general-settings.php?durum=ok");
    
      } else {
    
        Header("Location:general-settings.php?durum=no");
      }
    
    }


/*--------------------------------------------------------------------- */
    /*Haber Silme*/

if($_GET["newsDelete"] == "ok"){
  $delete=$db->prepare("DELETE from news where news_id=:id");
  $control=$delete->execute(array(
    "id" => $_GET["news_id"]
  ));

  if($control){
    Header("Location:news.php?delete=ok"); 
  } else{
    Header("Location:news.php?delete=no");
  }


}

/*--------------------------------------------------------------------- */


if(isset($_POST["newsİmageUpdate"])){

  $uploads_dir = '../dimg';
    
      @$tmp_name = $_FILES['news_image']["tmp_name"];
      @$name = $_FILES['news_image']["name"];

      $news_id= $_POST["news_id"];

      $benzersizsayi4=rand(20000,32000);
      $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
    
      @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
    
      
      $duzenle=$db->prepare("UPDATE news SET
        news_image=:images
        WHERE news_id=1
        ");
        
      $update=$duzenle->execute(array(
        'images' => $refimgyol
        ));
    
    
    
      if ($update) {
    
        $resimsilunlink=$_POST['eski_yol'];
        unlink("../dimg/$resimsilunlink");
    
        Header("Location:newsEdit.php?durum=ok");
    
      } else {
    
        Header("Location:newsEdit.php?durum=no");
      }

}



?>


