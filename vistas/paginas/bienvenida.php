
<?php
ini_set('display_errors', 0);
session_start();
?>
    
    <h1>
        <?php 
            if(isset($_SESSION['username'])){
                echo 'Bienvenido a la plataforma: <u>'.$_SESSION['username'].'</u>';
            }else{
                echo 'Error';
            }
        ?>
    </h1>
