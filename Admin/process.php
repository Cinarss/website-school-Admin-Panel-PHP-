<?php
ob_start();
session_start();

include "connect.php";
include "function.php";

 /*Admin Giriş */

  if(isset($_POST["adminLogin"])){
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];

    $admin=$db->prepare("SELECT * FROM admin where admin_username=:username and admin_password=:password ");
    $admin->execute(array(
      "username" => $admin_username,
      "password" => $admin_password
    ));

    $say = $admin->rowCount();

    if($say==1){
      $_SESSION["admin_username"] = $admin_username;
      Header("Location:index.php?access=okay");

    }else{
      Header("Location:login.php?access=no");
      
    }

  }


    /*------------------------------------------------------------------------ */

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



    /*İletşiim Güncelleme */

    /*------------------------------------------------------------------------ */
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

 /*------------------------------------------------------------------------ */

  /*İdari Kadro Ekleme */

    if(isset($_POST["idariAdd"])){

      $idari=$db->prepare("INSERT into idari set
        idari_name=:idari_name,
        idari_yetki=:idari_yetki
      ");

      $insert=$idari->execute(array(
        "idari_name" => $_POST["idari_name"],
        "idari_yetki" => $_POST["idari_yetki"]
      ));

      if($insert){
        Header("Location:idari.php?status=okay");
        exit;

      }else{
        Header("Location:idariAdd.php?status=no");

      }

    }


     /*------------------------------------------------------------------------ */
     /*İdari Kadro Silme */

    if($_GET["idariDelete"] == "ok"){
      $delete=$db->prepare("DELETE FROM idari where idari_id=:id");
      $control=$delete->execute(array(
        "id" => $_GET["idari_id"]
      ));

      if($control){
        Header("Location:idari.php?delete=okay");
        exit;

      }else{
        Header("Location:idari.php?delete=no");
        exit;
      }

    }

 /*------------------------------------------------------------------------ */
/*İdari Kadro Güncelleme */



    if(isset($_POST["idariUpdate"])){
      $idari_id = $_POST["idari_id"];

      $idari=$db->prepare("UPDATE idari SET

      idari_name=:idari_name,
      idari_yetki=:idari_yetki

      WHERE idari_id = {$_POST["idari_id"]} ");

      $update=$idari->execute(array(
        "idari_name" => $_POST["idari_name"],
        "idari_yetki" => $_POST["idari_yetki"]
      ));

      if($update){
        Header("Location:idariEdit.php?idari_id=$idari_id?status=okay");
        exit;

      }else{
        Header("Location:idariEdit.php?idari_id=$idari_id?status=no");
        exit;

      }

    }




     /*------------------------------------------------------------------------ */

     /*Öğretmen Ekleme */

    if(isset($_POST["teacherAdd"])){

      $teach=$db->prepare("INSERT INTO teacher SET
        teacher_name=:teacher_name,
        teach_id=:teach_id
      ");

      $insert=$teach->execute(array(
        "teacher_name" => $_POST["teacher_name"],
        "teach_id" => $_POST["teach_id"]
      ));

      if($insert){
        Header("Location:teachers.php?status=okay");
        exit;

      }else{
        Header("Location:teachers.php?status=no");
        exit;
      }
    }




     /*------------------------------------------------------------------------ */

     /*Öğretmen Silme */

     if($_GET["teacherDelete"]== "ok"){
      $teach=$db->prepare("DELETE FROM teacher WHERE teacher_id=:id");
      $control=$teach->execute(array(
        "id" => $_GET["teacher_id"]
      ));

      if($control){
        Header("Location:teachers.php?status=okay");
        exit;

      }else{
        Header("Location:teachers.php?status=no");

      }
     }


     /*------------------------------------------------------------------------ */
     /*Öğretmen Güncelleme */

     if(isset($_POST["teacherUpdate"])){
      $teacher_id=$_POST["teacher_id"];

      $teach=$db->prepare("UPDATE teacher set
      teacher_name=:teacher_name,
      teach_id=:teach_id
      WHERE teacher_id = {$_POST["teacher_id"]} ");

      $update=$teach->execute(array(
        "teacher_name" => $_POST["teacher_name"],
        "teach_id" => $_POST["teach_id"]
      ));

      if($update){
        Header("Location:teacherEdit.php?teacher_id=$teacher_id?status=okay");
        exit;

      }else{
        Header("Location:teacherEdit.php?teacher_id=$teacher_id?status=no");
        exit;
      }

     }

     /*Okulumuz Güncellemeler */
     /*------------------------------------------------------------------------------------ */

     if(isset($_POST["usSchoolUpdate"])){
        $usSchool=$db->prepare("UPDATE usSchool SET 
            vizyon=:vizyon,
            misyon=:misyon,
            saatler=:saatler,
            isinma=:isinma,
            internet=:internet
        WHERE school_id = 1 ");

        $update=$usSchool->execute(array(
          "vizyon" => $_POST["vizyon"],
          "misyon" => $_POST["misyon"],
          "saatler" => $_POST["saatler"],
          "isinma" => $_POST["isinma"],
          "internet" => $_POST["internet"],
        ));

      if($update){
        Header("Location:usSchool.php?status=ok");
        exit;
        
      }else{
        Header("Location:usSchool.php?status=no");
        exit;
      }
     }


     if(isset($_POST["usContactUpdate"])){
      $contact=$db->prepare("UPDATE uscontact SET
      telefon=:telefon,
      belge=:belge,
      eposta=:eposta,
      web=:web,
      adres=:adres
      WHERE contact_id = 1");

      $update=$contact->execute(array(
        "telefon" => $_POST["telefon"],
        "belge" => $_POST["belge"],
        "eposta" => $_POST["eposta"],
        "web" => $_POST["web"],
        "adres" => $_POST["adres"]
      ));

      if($update){
        Header("Location:usContact.php?status=okay");
        exit;

      }else{

        Header("Location:usContact.php?status=no");
        exit;
      }

     }

     if(isset($_POST["usStatusUpdate"])){
      $status=$db->prepare("UPDATE usstatus SET
      ogretmen=:ogretmen,
      cok_amacli=:cok_amacli,
      fizik=:fizik,
      yemekhane=:yemekhane,
      ogrenci=:ogrenci,
      mesleki=:mesleki,
      kutuphane=:kutuphane,
      derslik=:derslik,
      kimya=:kimya,
      kitap=:kitap

      WHERE status_id = 1");

      $update=$status->execute(array(
        "ogretmen" => $_POST["ogretmen"],
        "cok_amacli" => $_POST["cok_amacli"],
        "fizik" => $_POST["fizik"],
        "yemekhane" => $_POST["yemekhane"],
        "ogrenci" => $_POST["ogrenci"],
        "mesleki" => $_POST["mesleki"],
        "kutuphane" => $_POST["kutuphane"],
        "derslik" => $_POST["derslik"],
        "kimya" => $_POST["kimya"],
        "kitap" => $_POST["kitap"]
      ));

      if($update){
        Header("Location:usStatus.php?status=okay");
        exit;

      }else{
        Header("Location:usStatus.php?status=no");
        exit;
      }

     }

     if(isset($_POST["usTransportUpdate"])){
      $transport=$db->prepare("UPDATE ustransport SET 
      yerlesim=:yerlesim,
      adres=:adres,
      ulasim_izban=:ulasim_izban,
      il=:il
      WHERE transport_id = 1");

      $update=$transport->execute(array(
        "yerlesim" => $_POST["yerlesim"],
        "adres" => $_POST["adres"],
        "ulasim_izban" => $_POST["ulasim_izban"],
        "il" => $_POST["il"]
      ));

      if($update){
        Header("Location:usTransport.php?status=okay");
        exit;

      }else{
        Header("Location:usTransport.php?status=no");
        exit;
      }


     }

?>


