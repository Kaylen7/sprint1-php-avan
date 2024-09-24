<?php
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