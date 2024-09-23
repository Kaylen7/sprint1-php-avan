<style>
    body {
        width: 100vw;
        height: 90%;
        
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-content: flex-start;
        gap: 16px;
        margin-left: 5%;
    }

    h2 {
        width: 100%;
        height: auto;
    }
    .recurs {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-content: flex-start;
        margin: 0 auto;
        gap: 5px;

        width: 25vw;
        max-width: 300px;
        background-color: #ededed;
        padding: 10px;
        border-radius: 10px;

        & h3 {
            line-height: 0.5em;
        }
    }

    .exercici_2 {
        width: 100%;

        & h3{
            color: green;
        }
    }
</style>

<?php
echo "<h2>Exercici 1</h2>";

enum Tema :string {
    case PHP = 'PHP';
    case CSS = 'CSS';
    case HTML = 'HTML';
    case SQL = 'SQL';
    case LARAVEL = 'Laravel';
}

enum Tipus {
    case FITXER;
    case ARTICLE_WEB;
    case VIDEO;
}

class RecursDidactic{
    public function __construct(
        private string $nom,
        private Tema $tema,
        private string $url,
        private Tipus $tipus
    ){}

    public function __toString(): string{
        return (
            "<div class='recurs'>" .
            "<h3>$this->nom</h3>" .
            "<span>" . $this->tema->value . "</span>" .
            "<span>" . $this->tipus->name . "</span>" .
            "<a href='$this->url'>Veure</a>" . 
            "</div>"
        );
    }
}

$recursos = array(
    $recurs1 = new RecursDidactic(
        "PHP bàsic", 
        Tema::PHP, 
        "https://itacademy.barcelonactiva.cat/mod/page/view.php?id=10915",
        Tipus::ARTICLE_WEB
    ),
    $recurs2 = new RecursDidactic(
        "PHP avançat", 
        Tema::PHP, 
        "https://itacademy.barcelonactiva.cat/mod/page/view.php?id=11241",
        Tipus::ARTICLE_WEB
    ),
    $recurs3 = new RecursDidactic(
        "Píldoras Informáticas", 
        Tema::PHP, 
        "https://www.youtube.com/playlist?list=PLU8oAlHdN5BkinrODGXToK9oPAlnJxmW_",
        Tipus::VIDEO
    )
    );

foreach($recursos as $el){
    echo $el;
}


echo "<h2>Exercici 2</h2>";
echo "<div class='exercici_2'>";

trait Turbo {
    public function boost(){
        echo "<h3>S'ha iniciat el turbo</h3>";
        try {
            $this->activateTurbo();
        } catch(Error $e){}
    }
}

class Car{

    private bool $turbo = false;

    public function __construct(
        private string $marca,
        private string $matricula,
        private string $combustible,
        private int $max_vel,
    ){}

    public function __toString(): string{
        return(
            "<b>Cotxe: $this->marca</b><br/>" .
            "Matrícula: $this->matricula<br/>" .
            "Combustible: $this->combustible<br/>" .
            "Màx. velocitat: $this->max_vel <br/>" . 
            "Turbo activat: " . ($this->turbo ? "Sí" : "No")
        );
    }

    use Turbo;

    private function activateTurbo(): void{
        $this->turbo = true;
    }
}

$cotxe1 = new Car(
    "BYD Dolphin",
    "QWERTY",
    "Elèctric",
    160
);

echo $cotxe1;
echo $cotxe1->boost();
echo $cotxe1;

echo "</div>";

