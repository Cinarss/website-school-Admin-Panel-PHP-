<?php

include "connect.php";


$contact=$db->prepare("SELECT * FROM contact WHERE contact_id=:id");
$contact->execute(array(
    "id" => 1
));

$contactGet=$contact->fetch(PDO::FETCH_ASSOC);



?>


<div class="footer">
            <div class="title">
                <h1>İletişim</h1>
            </div>
            <div class="container">
                <div class="content">
                    <p><strong>Adres:</strong></p>
                    <br>

					<?php echo $contactGet["contact_adres"]; ?>

                    <br>
                    <br>

                    <strong>Telefon</strong>
                    <br>

					<?php echo $contactGet["contact_tel"]; ?>

                    <br>
                    <br>

                </div>
                    <div class="map">
                        <div class="konum"><a href="<?php echo $contactGet["contact_url"] ?>"><img src="images/footer-map.png" alt=""></a></div>
                    </div>
                    <div class="eposta">
                        
                        <div class="posta"><a href="#" >e-Posta Göndermek İçin Tıklayın</a></div>
                    </div>
                </div>
            </div>