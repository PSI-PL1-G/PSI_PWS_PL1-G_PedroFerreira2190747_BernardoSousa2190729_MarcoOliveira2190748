<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName@methodActionName
 ****************************************************************************/

/* home controller */
Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/start',	'HomeController/start');
Router::get('home/login', 'HomeController/login');
//Router::get('home/shutthebox', 'HomeController/shutthebox');
Router::get('home/about','HomeController/about');
Router::get('user/login',	'HomeController/login');
Router::get('user/register',	'HomeController/register');

/************************** USER ***************************************************/
Router::post('user/register', 'UserController/register');
Router::post('user/login', 'UserController/login');
Router::get('home/logout', 'UserController/logout');

/************************** JOGO ***************************************************/
Router::get('home/shutthebox', 'GameController/home');
Router::get('jogo/iniciarjogo', 'GameController/iniciarJogo');
Router::get('jogo/rolardados','GameController/rolarDados');
//Router::get('home/shutthebox',    'GameController/shutthebox');
Router::get('jogo/seleciona',    'GameController/selecionarNumero');

/************** End of URLEncoder Routing Rules ************************************/