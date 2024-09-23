<style>
    body {
        width: 100vw;
        height: 100vh;

        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: 'Nunito', sans-serif;

    }

    h1 {
        margin-top: 5vh;
        border-bottom: 5px solid green;
    }

    form {
        width: 80%;
        max-width: 600px;
    }

    fieldset {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        align-content: center;
        align-items: center;
        gap: 15px;
        padding: 1em;
    }

    input {
        width: 80%;
        padding: 5px;

        &:focus {
            border: 2px solid transparent;
            outline: 2px solid orange;
        }
    }

    label {
        width: 15%;
        text-align: right;
        margin-right: 5px;
    }

    button{
        background-color: green;
        color: white;
        font-weight: 600;
        width: 100px;
        padding: 5px;
        border: 0px solid transparent;
        border-radius: 5px;

        &:hover {
            background-color: darkgreen;
        }
    }

    section {
        width: 80%;
    }

</style>
<?php
session_start();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    <title>PHP Avançat</title>
</head>
<body>
<h1>Formulari molt important</h1>

<?php
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";

if($username){
    echo "<h2>👋 Hola, " . $_SESSION['username'] . "!</h2>";
}
?>

<form action="./form.php" method="post">
    <fieldset>
        <legend>Informació personal</legend>
        <label for="username">Àlias</label>
        <input type="text" id="username" name="username" value="<?php echo $username ?>" required/>
        <label for="email">Adreça electrònica</label>
        <input type="email" name="email" id="email" value="<?php echo $email ?>" required/>
        <button type="submit">Enviar</button>
    </fieldset>
    
</form>
<section>
<?php
echo "<h2>Exercici 2</h2>";

echo "Path: " . __DIR__ . "<br/>";
echo "Debug: " . (PHP_DEBUG ? "Sí" : "No") . "<br/>";
echo "Versió de PHP: " . PHP_VERSION . "<br/><br/>";

echo "<hr><h2>Exercici 3</h2>";

class Configuracio {

    public function __construct(
        private array $conf = []
    ){}

    public function __set($name, $value){
        $this->conf[$name] = $value;
    }

    public function __get($name){
        return $this->conf[$name] ?? null;
    }

    public function __toString(){
        return "<b>Configuració</b><br/><pre>" . var_export($this->conf, true) . "</pre>" . "<p>La classe <code>Configuracio()</code> sobreescriu els mètodes màgics: <code>__set()</code>, <code>__get()</code> i <code>__toString()</code></p>";
    }
}

$config = new Configuracio();
$config->path = __DIR__;
$config->debug = PHP_DEBUG;
$config->version = PHP_VERSION;
echo "$config";
?>

</section>
</body>
</html>