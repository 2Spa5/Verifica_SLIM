<?php

class Rilevatore implements JsonSerializable
{

    protected $id;
    protected $misurazioni = [];
    protected $unitaDiMisura;
    protected $sogliaDiAllarme;
    protected $codiceSeriale;

    function __construct($id, $unitaDiMisura, $sogliaDiAllarme, $codiceSeriale)
    {
        $this->id = $id;
        $this->unitaDiMisura = $unitaDiMisura;
        $this->sogliaDiAllarme = $sogliaDiAllarme;
        $this->codiceSeriale = $codiceSeriale;
    }

    public function jsonSerialize(){
        return [
            "Identificativo" => $this->id,
            "Unita Di Misura" => $this->unitaDiMisura,
            "Soglia Di Allarme" => $this->sogliaDiAllarme,
            "Codice Seriale" => $this->codiceSeriale,
            "Misurazioni" => $this->misurazioni
        ];
    }

    public function addMisurazione($D, $V)
    {
        $this->misurazioni[] = new Misurazione($D, $V);
    }

    public function getId()
    {
        return $this->id;
    }

    public function printMisure()
    {
        $s = [];
        foreach ($this->misurazioni as $m) {
            $s[] = $m;
        }
        return $s;
    }

    public function printMisureMaggiori($v)
    {
        $s = [];
        foreach ($this->misurazioni as $m) {
            if ($m->getValore() > $v)
                $s[] = $m;
        }
        if(empty($s))
            $s = "NESSUNA MISURAZIONE MAGGIORE DEL VALORE DATO";
        return $s;
    }
}
