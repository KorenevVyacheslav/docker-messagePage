<?php

namespace App;
use App\core\Route;

// инициализация приложения. Загрузка всех необходимых классов и конфигурации
session_start();

// подключаем файлы ядра
require_once 'vendor' . DIRECTORY_SEPARATOR. 'autoload.php';

require_once 'models'. DIRECTORY_SEPARATOR . 'DB.php';
require_once 'core'. DIRECTORY_SEPARATOR . 'Controller.php';
require_once 'core'. DIRECTORY_SEPARATOR . 'CSRF.php';
require_once 'core'. DIRECTORY_SEPARATOR . 'Model.php';
require_once 'core'. DIRECTORY_SEPARATOR . 'Route.php';
require_once 'core'. DIRECTORY_SEPARATOR . 'View.php';
require_once 'ajax.php';

Route::start();   // запускаем маршрутизатор

