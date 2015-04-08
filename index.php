<?php

require 'mvc/system/ClassLoader.php';

ClassLoader::register();

$app = WebApplication::getInstance();

$app->start();
