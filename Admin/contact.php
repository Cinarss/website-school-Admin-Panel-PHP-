<?php


include "connect.php";
include "contacy.php";


$contactReq=$db->prepare("SELECT * from contact WHERE contact_id=:id");
$contactReq->execute(array(
    "id" => 1
));

$contactGet=$contactReq->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include "sidebar.php"; ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include "navbar.php"; ?>
               <!-- end topbar -->

                
               <div class="container mt-5">
                <form action="process.php" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="contact_id" value="<?php echo $contactGet["contact_id"]; ?>" id="">              
                     <div class="mb-3">
                        <label for="Site Başlığı" class="form-label">Adres</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $contactGet["contact_adres"]; ?>" name="contact_adres" placeholder="Haber Başlık">
                     </div>

                     <div class="mb-3">
                        <label for="Site Açıklaması" class="form-label">Telefon</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $contactGet["contact_tel"]; ?>" name="contact_tel" placeholder="Haber Açıklama">
                     </div>

                     <div class="mb-3">
                        <label for="Site Anahtar Kelime" class="form-label">Google Harita Bağlantısı(url)</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $contactGet["contact_url"]; ?>" name="contact_url" placeholder="Haber Seourl">
                     </div>

                     
                     <button class="mb-3 btn btn-primary" name="contactUpdate">Güncelle</button>
                     </div>
            </form>

               <!-- dashboard inner -->
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/chart_custom_style1.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>