<?php

declare(strict_types=1);

use Dev\Academia\Controller\{
    Controller,
    DeleteVideoController,
    EditVideoController,
    Error404Controller,
    NewVideoController,
    VideoFormController,
    VideoListController
};

use Dev\Academia\Repository\AcademiaRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = require_once __DIR__ . '/../conexao.php';
$rifaRepository = new AcademiaRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

session_start();
session_regenerate_id();

$key = "$httpMethod|$pathInfo";

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller = new $controllerClass($rifaRepository);
} else {
    $controller = new Error404Controller();
}

/** @var Controller $controller */
$controller->processaRequisicao();
