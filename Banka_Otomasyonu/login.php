<?php
require "controller/db.php"; ?>
<!--burası ana yer -->
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="manifest" href="/manifest.json">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css"> <!-- burası saat tarih -->
    <script>
        if ('serviceWorker' in navigator) {
        	window.addEventListener('load', function () {
        		navigator.serviceWorker.register('/sw.js?v=6');
        	});
        }
    </script>
    <title>OTOMOSYON LOGIN PAGE</title>

</head>

<body>
    
<h1>LOG IN</h1>
    <form class="form" action="controller/login.php" method="POST">
        <span class="title"></span>
        <input name="name" placeholder="Your Email" />
        <div class="row">
            <input type="password" name="password" placeholder="Your Password" id="gozz" /><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" id="eyess" viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
            </svg>
            <!--burası göz -->
        </div>
        

        <div class="actions">
            <div class="buttons mr-4">

                <button class="shine " type="submit" <?php $result = $_SESSION["s"] == 0 ? true : false;
                                                        if ($result) {
                                                            echo "disabled";
                                                        }

                                                        ?>> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="1px" width="14px" height="14px" viewBox="0 0 96.108 122.88" enable-background="new 0 0 96.108 122.88" xml:space="preserve">
                        <g>
                            <path fill-rule="evenodd" clip-rule="evenodd" 
                            d="M2.892,56.036h8.959v-1.075V37.117c0-10.205,4.177-19.484,10.898-26.207v-0.009 C29.473,4.177,38.754,0,48.966,0C59.17,0,68.449,4.177,75.173,10.901l0.01,0.009c6.721,6.723,10.898,16.002,10.898,26.207v17.844 v1.075h7.136c1.59,0,2.892,1.302,2.892,2.891v61.062c0,1.589-1.302,2.891-2.892,2.891H2.892c-1.59,0-2.892-1.302-2.892-2.891 V58.927C0,57.338,1.302,56.036,2.892,56.036L2.892,56.036z M26.271,56.036h45.387v-1.075V36.911c0-6.24-2.554-11.917-6.662-16.03 l-0.005,0.004c-4.111-4.114-9.787-6.669-16.025-6.669c-6.241,0-11.917,2.554-16.033,6.665c-4.109,4.113-6.662,9.79-6.662,16.03 v18.051V56.036L26.271,56.036z M49.149,89.448l4.581,21.139l-12.557,0.053l3.685-21.423c-3.431-1.1-5.918-4.315-5.918-8.111 c0-4.701,3.81-8.511,8.513-8.511c4.698,0,8.511,3.81,8.511,8.511C55.964,85.226,53.036,88.663,49.149,89.448L49.149,89.448z" />
                        </g>
                    </svg> Login <span class="btns"></span></button>
            </div>
        </div>

        <span>Limit <?= $_SESSION["s"] ?></span> <!-- limit  -->
    </form>

    <button class="shine flat" id="exxx">EXİT</button> <!-- burası kapat butonu -->
    <button id="install-app" style="display: none;" >Uygulamayı Yükle</button>
<script>
    const installButton = document.getElementById('install-app');
    let beforeInstallPromptEvent
    window.addEventListener("beforeinstallprompt", function(e) {
        e.preventDefault();
        beforeInstallPromptEvent = e
        installButton.style.display = 'block'
        installButton.addEventListener("click", function() {
            e.prompt();
        });
        installButton.hidden = false;
    });
    installButton.addEventListener("click", function() {
        beforeInstallPromptEvent.prompt();
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="assets/js/login.js"></script>
    <!--SAAT TARİH EKLEME -->
    <script src="assets/js/home.js"></script>
    <!--burası göz -->

    
    

</body>

</html>