<?php

include "connect.php";
include "function.php";

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
      $refimgyol=substr($uploads_dir, 3)."/".$benzersizsayi4.$name;
    
      @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
    
      
      $duzenle=$db->prepare("UPDATE news SET
        news_image=:images
        WHERE news_id = {$_POST["news_id"]}
        ");
        
      $update=$duzenle->execute(array(
        'images' => $refimgyol
        ));
    
    
    
      if ($update) {
    
        $resimsilunlink=$_POST['eski_yol'];
        unlink("../$resimsilunlink");
    
        Header("Location:newsEdit.php?news_id=$news_id?durum=ok");
    
      } else {
    
        Header("Location:newsEdit.php?news_id=$news_id?durum=no");
      }

}


/*------------------------------------------------------------------- */
/*News Update */

if(isset($_POST["newsUpdate"])){

  $news_seourl=seo($_POST["news_title"]);
  $news_id = $_POST["news_id"];


  $news_get=$db->prepare("UPDATE news SET
    news_title=:news_title,
    news_description=:news_description,
    news_seourl=:news_seourl
  where news_id= {$_POST["news_id"]} ");

    $update=$news_get->execute(array(
      "news_title" => $_POST["news_title"],
      "news_description" => $_POST["news_description"],
      "news_seourl" => $news_seourl
    ));

    if($update){
      Header("Location:newsEdit.php?news_id=$news_id?status=ok");
      exit;

    } else{
      Header("Location:newsEdit.php?status=no");
      exit;
    }
    

}

/*------------------------------------------------------------------- */
/*Haber Ekleme */

  if(isset($_POST["newsAdd"])){

    $uploads_dir = '../dimg';
    @$tmp_name = $_FILES['news_image']["tmp_name"];
    @$name = $_FILES['news_image']["name"];
    //resmin isminin benzersiz olması
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);	
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol=substr($uploads_dir, 3)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


    $news_seourl=seo($_POST["news_title"]);


    $newsAdd=$db->prepare("INSERT into news set
      news_title=:news_title,
      news_description=:news_description,
      news_seourl=:news_seourl,
      news_image=:news_image
    ");

    $insert=$newsAdd->execute(array(
      "news_title" => $_POST["news_title"],
      "news_description" => $_POST["news_description"],
      "news_seourl" => $news_seourl,
      "news_image" => $refimgyol

    ));

    if($insert){
      Header("Location:news.php?status=ok");
      exit;
    }else{
      Header("Location:newsAdd.php?status=no");
      exit;
    }


  }

/*Bilgi güncelleme*/
/*---------------------------------------------------------------------- */
    if(isset($_POST["infoUpdate"])){
      $info=$db->prepare("UPDATE information set
      information_derslik=:information_derslik,
      information_ogretmen=:information_ogretmen,
      information_ogrenci=:information_ogrenci
      WHERE information_id = 1 ");

      $update=$info->execute(array(
        "information_derslik" => $_POST["information_derslik"],
        "information_ogretmen" => $_POST["information_ogretmen"],
        "information_ogrenci" => $_POST["information_ogrenci"],
      ));

      if($update){
        Header("Location:school-info.php?status=ok");
        exit;

      }else{

        Header("Location:school-info.php?status=no");
        exit;
        
      }

    }

/*Bağlantı Delete*/
/*---------------------------------------------------------------------- */


    if($_GET["connectDelete"] == "ok"){
      $delete=$db->prepare("DELETE from connect where connect_id=:id");
      $control=$delete->execute(array(
        "id" => $_GET["connect_id"]
      ));
    
      if($control){
        Header("Location:index-connect.php?delete=ok"); 
      } else{
        Header("Location:index-connect.php?delete=no");
      }
    
    
    }


    /*------------------------------------------------------------*/
    /*Bağlantı Update */


    if(isset($_POST["connectUpdate"])){
      $connect_id = $_POST["connect_id"];
      $connect=$db->prepare("UPDATE connect SET

      connect_title=:connect_title,
      connect_url=:connect_url,
      connect_text=:connect_text
      
      WHERE connect_id = {$_POST["connect_id"]}");

       $update=$connect->execute(array(
        "connect_title" => $_POST["connect_title"],
        "connect_url" => $_POST["connect_url"],
        "connect_text" => $_POST["connect_text"]
       ));

       if($update){
        Header("Location:connect-school-edit.php?connect_id=$connect_id?status=ok");
        exit;

       }else{
        Header("Location:connect-school-edit.php?connect_id=$connect_id?status=no");
        exit;

       }

    }


    /*---------------------------------------------------------------------------------- */
    /*Bağlantı Ekle */

    if(isset($_POST["connectAdd"])){
      $connect=$db->prepare("INSERT into connect SET
      connect_title=:connect_title,
      connect_url=:connect_url,
      connect_text=:connect_text
      ");

      $insert=$connect->execute(array(
        "connect_title" => $_POST["connect_title"],
        "connect_url" => $_POST["connect_url"],
        "connect_text" => $_POST["connect_text"]
      ));

      if($insert){
        Header("Location:index-connect.php?status=ok");
        exit;

      }else{

        Header("Location:index-connect.php?status=no");
        exit;
      }
    }


    if(isset($_POST["contactUpdate"])){

      $contact=$db->prepare("UPDATE contact SET
      contact_adres=:contact_adres,
      contact_tel=:contact_tel,
      contact_url=:contact_url
      WHERE contact_id=1");

      $update=$contact->execute(array(
        "contact_adres" => $_POST["contact_adres"],
        "contact_tel" => $_POST["contact_tel"],
        "contact_url" => $_POST["contact_url"]
      ));

      if($update){
        Header("Location:contact.php?status=ok");
        exit;

      }else{
        Header("Location:contact.php?status=no");
        exit;
      }




      
    }




?>


