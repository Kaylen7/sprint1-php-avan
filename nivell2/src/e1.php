<?php
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