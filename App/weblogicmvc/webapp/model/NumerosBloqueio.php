<?php


class NumerosBloqueio
{
    public $numerosBloqueio;
    public $seletorNumeros;

    public function __construct()
    {
        $this->selecionarNumeros = new SeletorNumeros();
    }

    public function iniciar() {
        for ($i =1; $i < 10; $i++){
           $this->numerosBloqueio[$i] = false;
        }
    }

    public function bloquearNumeros($numeros, $somaDados) {
        for ($i =1; $i < 10; $i++){
            for ($j =1; $j < 10; $j++){
                if($this->numerosBloqueio[$i] = $numeros[$j]){
                    $this->numerosBloqueio[$i] = true;
                }
                else {
                    echo "Numero ja existe!";
                }
            }

        }
    }

    public function getNumerosBloqueio(){
        return $this->numerosBloqueio;
    }

    public function checkFinalJogada($numeros, $somaDados) {

    }

    public function getFinalPointSum() {

    }
}