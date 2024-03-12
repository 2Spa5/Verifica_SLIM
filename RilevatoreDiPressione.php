<?php

class RilevatoreDiPressione extends Rilevatore implements JsonSerializable
{
    protected $posizione;

    function __construct($id, $sogliaDiAllarme, $codiceSeriale, $posizione)
    {
        parent::__construct($id, "bar", $sogliaDiAllarme, $codiceSeriale);
        $this->posizione = $posizione;
        for ($i = 1; $i < 4; $i++) {
            $this->misurazioni[] = new Misurazione("2024-03-" . $i, $i);
        }
    }

    public function jsonSerialize(){
        return [
            "Identificativo" => $this->id,
            "Unita Di Misura" => $this->unitaDiMisura,
            "Soglia Di Allarme" => $this->sogliaDiAllarme,
            "Codice Seriale" => $this->codiceSeriale,
            "Posizione" => $this->posizione,
            "Misurazioni" => $this->misurazioni
        ];
    }

}
