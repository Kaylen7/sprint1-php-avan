<?php
session_start();
?>
<style>
    main {
        width: 100vw;
        height: 85vh;

        font-family: 'Nunito', sans-serif;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .info {
        margin: 20px 0px;
        padding-left: 20px;
        border-left: 3px solid green;
    }

    .centrat {
        margin-top: 2em;
    }

    a {
        color: green;
        text-decoration: none;

        &:hover{
            color: darkgreen;
            font-weight: 600;
        }
    }

</style>

<?php

function validateUsername(string $usr): bool{
    $pattern = "/^[\w,\d\-_]+$/";
    return preg_match($pattern, $usr);
}
function validateEmail(string $email): bool{
    $pattern = "/^[\w\d.!#$%&'*+\/=?^_`{|}~-]+@[\w\d\-_]+(?:\.[\w\d\-_]+)+$/";
    return preg_match($pattern, $email);
}

echo "<main><div class='info'>";
if (empty($_POST['username']) || empty($_POST['email'])){
    echo "<h2>Ups, falta contingut</h2>";
} else {
    extract($_POST);
    
    if(validateUsername($username) && validateEmail($email)){
        echo "<h3>Dades</h3>" . "<p><b>Àlias</b>: $username</p><p><b>Email</b>: $email</p>";

        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
 
    } else {
        echo "<h2>⚠️ Error en el formulari</h2><p>Algun dels camps conté un format incorrecte.</p>";
    }
}

if (isset($_SERVER['HTTP_REFERER'])){
    echo "<p class='centrat'><a href='" . $_SERVER['HTTP_REFERER'] . "'>← Tornar al formulari</a></p>";
}


echo "</div></main>";