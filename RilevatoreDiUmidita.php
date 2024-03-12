<?php

class RilevatoreDiUmidita extends Rilevatore implements JsonSerializable
{
    protected $tipologia;

    function __construct($id, $sogliaDiAllarme, $codiceSeriale, $tipologia)
    {
        parent::__construct($id, "%", $sogliaDiAllarme, $codiceSeriale);
        $this->tipologia = $tipologia;
        for ($i = 4; $i < 7; $i++) {
            $this->misurazioni[] = new Misurazione("2024-03-" . $i, $i);
        }
    }

    public function jsonSerialize(){
        return [
            "Identificativo" => $this->id,
            "Unita Di Misura" => $this->unitaDiMisura,
            "Soglia Di Allarme" => $this->sogliaDiAllarme,
            "Codice Seriale" => $this->codiceSeriale,
            "Tipologia" => $this->tipologia,
            "Misurazioni" => $this->misurazioni
        ];
    }

}
