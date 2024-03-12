<?php

class Misurazione implements JsonSerializable
{

    protected $data;
    protected $valore;

    function __construct($data, $valore)
    {
        $this->data = $data;
        $this->valore = $valore;
    }

    public function jsonSerialize(){
        return [
            "Data" => $this->data,
            "Valore" => $this->valore
        ];
    }

    public function getData(){
        return $this->data;
    }

    public function getValore(){
        return $this->valore;
    }
}
