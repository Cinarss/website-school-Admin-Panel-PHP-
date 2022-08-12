<?php
ob_start();
session_start();

include "connect.php";

$adminReq=$db->prepare("SELECT * FROM admin WHERE admin_username=:username");
$adminReq->execute(array(
   "username" => $_SESSION["admin_username"]
));

$say=$adminReq->rowCount();
$adminGet=$adminReq->fetch(PDO::FETCH_ASSOC);

if($say==0){
   Header("Location:login.php?access=no");
}


?>


<nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
                        <div class="user_info">
                           <h6>John David</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Tema</span></a>
                        
                     </li>
                     <li><a href="general-settings.php"><i class="fa fa-gear orange_color"></i> <span>Genel Ayarlar</span></a></li>

                     <li><a href="news.php"><i class="fa fa-diamond blue_color"></i> <span>Haberler</span></a></li>
                     <li><a href="school-info.php"><i class="fa fa-table purple_color2"></i> <span>Okul Bilgileri</span></a></li>
                     <li><a href="index-connect.php"><i class="fa fa-object-group purple_color2"></i> <span>Bağlantılar</span></a></li>
                     
                     <li><a href="contact.php"><i class="fa fa-map blue1_color"></i> <span>İletişim Adres</span></a></li>
                     <li>
                        <a href="idari.php">
                        <i class="fa fa-paper-plane red_color"></i> <span>İdari Kadro Ayarlar</span></a>
                     </li>
                     
                     <li><a href="teachers.php"><i class="fa fa-clone yellow_color"></i> <span>Öğretmenler</span></a></li>
                     <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                     <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li>
                  </ul>
               </div>
            </nav>