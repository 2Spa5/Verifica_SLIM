<?php

class DispositivoDiAllarme implements JsonSerializable
{

    protected $id;
    protected $numTel;

    function __construct($id, $numTel)
    {
        $this->id = $id;
        $this->numTel = $numTel;
    }

    public function jsonSerialize(){
        return [
            "Identificativo" => $this->id,
            "Numero Di Telefono" => $this->numTel
        ];
    }

    public function getId(){
        return $this->id;
    }
}
