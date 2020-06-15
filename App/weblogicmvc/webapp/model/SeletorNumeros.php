<?php


class SeletorNumeros
{
    private $numerosSelecionados = array ();


    public function validadeNumber($userNumber, $numerosBloqueio)
    {
        if ($numerosBloqueio[$userNumber] == true){
            return false;

        }else
        {
            return true;
        }
    }
    public function  getNumeroSelecionado(){

    }

    public function updateSelection($userNumber){
        if(in_array($userNumber,$this->numerosSelecionados)==true){

        }else
        {
            array_push($this->numerosSelecionados,$userNumber);
        }
    }

    public function checkSeletionTotal($totalDados){
    $soma = 0;
    foreach ($this->numerosSelecionados as $numero){
        $soma+=$numero;

    }
    if ($soma == $totalDados){
        return true;

    }
    }

    public function clearSelection(){

    }

    public function selectionHasNumber($number) {
        return in_array($number,$this->numerosSelecionados);
    }
}