<?php 
    session_start();
    $stylesheet='../css/form.css';
    include("../src/head.php");
    

function validateUsername(string $usr): bool{
    $pattern = "/^[\w,\d\-_]+$/";
    return preg_match($pattern, $usr);
}
function validateEmail(string $email): bool{
    $pattern = "/^[\w\d.!#$%&'*+\/=?^_`{|}~-]+@[\w\d\-_]+(?:\.[\w\d\-_]+)+$/";
    return preg_match($pattern, $email);
}

?>
<main>
    <div class='info'>
        <?php 
            if (empty($_POST['username']) || empty($_POST['email'])){
                echo "<h2>Ups, falta contingut</h2>";
            } else {
                extract($_POST);
                
                if(validateUsername($username) && validateEmail($email)){
                    echo "<h3>Dades</h3>" . "<p><b>Àlias</b>: $username</p><p><b>Email</b>: $email</p>";
            
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;

                    echo "<pre>" . var_export($_SESSION, true) . "</pre>";
             
                } else {
                    echo "<h2>⚠️ Error en el formulari</h2><p>Algun dels camps conté un format incorrecte.</p>";
                }
            }
            if (isset($_SERVER['HTTP_REFERER'])){
                echo "<p class='centrat'><a href='" . $_SERVER['HTTP_REFERER'] . "'>← Tornar al formulari</a></p>";
            }
        ?>  
    </div>
</main>