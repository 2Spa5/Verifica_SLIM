<?php

require("Rilevatore.php");
require("RilevatoreDiPressione.php");
require("RilevatoreDiUmidita.php");
require("Misurazione.php");


class Impianto implements JsonSerializable
{
    protected $nome = "Impianto Sud";
    protected $latitudine = "40,3224°";
    protected $longitudine = "78,4973°";
    protected $dispAllarme = [];
    protected $rilevatoriPressione = [];
    protected $rilevatoriUmidita = [];

    public function __construct()
    {
        $this->rilevatoriPressione[] = new RilevatoreDiPressione(0, 100, 49302, "aria");
        $this->rilevatoriPressione[] = new RilevatoreDiPressione(1, 40, 90555, "terra");
        $this->rilevatoriUmidita[] = new RilevatoreDiUmidita(2, 68, 82357, "fluido");
        $this->rilevatoriUmidita[] = new RilevatoreDiUmidita(3, 83, 94438, "gas");
        $this->dispAllarme[] = new DispositivoDiAllarme(4, 649386249);
        $this->dispAllarme[] = new DispositivoDiAllarme(5, 324537092);

    }

    public function jsonSerialize(){
        return [
            "Nome" => $this->nome,
            "Latitudine" => $this->latitudine,
            "Longitudine" => $this->longitudine,
            "Dispoditivi Di Allarme" => $this->dispAllarme,
            "Rilevatori Di Pressione" => $this->rilevatoriPressione,
            "Rilevatori Di Umidita"=> $this->rilevatoriUmidita
        ];
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setLongitudine($longitudine)
    {
        $this->longitudine = $longitudine;
    }

    public function getLongitudine()
    {
        return $this->longitudine;
    }

    public function setLatitudine($latitudine)
    {
        $this->latitudine = $latitudine;
    }

    public function getLatitudine()
    {
        return $this->latitudine;
    }

    public function getDispAllarme(){
        return $this->dispAllarme;
    }

    public function getRilevatoriUmidita(){
        return $this->rilevatoriUmidita;
    }

    public function getRilevatoriPressione(){
        return $this->rilevatoriPressione;
    }

    public function printDispAllarme(){
        $s = [];
        foreach($this->dispAllarme as $disp){
            $s[] = $disp->getId();
        }
        return $s;
    }

    public function printRilevatorePressione(){
        $s = [];
        foreach($this->rilevatoriPressione as $riv){
            $s[] = $riv->getId();
        }
        return $s;
    }

    public function printRilevatoreUmidita(){
        $s = [];
        foreach($this->rilevatoriUmidita as $riv){
            $s[] = $riv->getId();
        }
        return $s;
    }

}
