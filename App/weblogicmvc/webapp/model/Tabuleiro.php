<?php


class Tabuleiro
{
    private $dado;
    public $resultadoDado1, $resultadoDado2;
    public $numeroBloqueioP1, $numeroBloqueioP2;

    public function __construct() {
        $this->numeroBloqueioP1 = new NumerosBloqueio();
        $this->numeroBloqueioP2 = new NumerosBloqueio();

        $this->dado = new Dado();
    }

    public function rolarDados() {
        $this->resultadoDado1 = $this->dado->rolarDado();
        $this->resultadoDado2 = $this->dado->rolarDado();
    }

    public function checkFinalJogadaP1($soma) {

    }

    public function checkFinalJogadaP2($soma) {

    }

    public function checkFinalJogo($soma) {

    }

    public function getVencedor() {

    }

    public function getPointsVencedor() {

    }
}