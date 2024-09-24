<?php 
    
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

    if($username){
        echo "<h2>👋 Hola, " . $_SESSION['username'] . "!</h2>";
    }
?>

<form action="./src/form.php" method="post">
    <fieldset>
        <legend>Informació personal</legend>
        <label for="username">Àlias</label>
        <input type="text" id="username" name="username" value="<?php echo $username ?>" required/>
        <label for="email">Adreça electrònica</label>
        <input type="email" name="email" id="email" value="<?php echo $email ?>" required/>
        <button type="submit">Enviar</button>
    </fieldset>
    
</form>