<?php
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Session;

class GameController
{
    public function home() {
        $engine= null;
        if(!Session::has('gameEngine')) {
            $engine = new GameEngine();
            Session::set('gameEngine', $engine);
        }
        $engine = new GameEngine();
        return View::make('home.shutthebox', ['ge'=> $engine]);
    }

    public function iniciarJogo() {

        if(!Session::has('gameEngine')) {
            $engine = new GameEngine();
        }
        else {
            $engine = Session::get('gameEngine');
        }
        $engine->iniciarJogo();
        $engine->updateEstadoJogo(1);
        Session::set('gameEngine', $engine);
        return View::make('home.shutthebox', ['ge'=> $engine]);
    }

    public function rolarDados() {
        $engine = Session::get('gameEngine');
        $engine->rolarDados();
        $engine->updateEstadoJogo(2);
        Session::set('gameEngine', $engine);

        return View::make('home.shutthebox', ['ge'=> $engine]);
    }
    public function selecionarNumero($number){
        $engine = Session::get('gameEngine');
        //$engine = new GameEngine();

        $somaDados= $engine->tabuleiro->resultadoDado1 + $engine->tabuleiro->resultadoDado2;

        $seletor= $engine->tabuleiro->numeroBloqueioP1->seletorNumeros;

        if($seletor->validateNumber($number,$engine->tabuleiro->numeroBloqueioP1))
        {
            $seletor->updateSelection($number);

            if ($seletor->checkSelectionTotal($somaDados))
            {
                $engine->updateEstadoJogo();

                $engine->tabuleiro->numeroBloqueioP1->bloquearNumeros($seletor->getNumerosSelecionados(),$somaDados);
                $seletor->clearSelection();
            }
        }
    }
}
