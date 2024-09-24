<?php 
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