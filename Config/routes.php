<?php

Router::parseExtensions();
Router::setExtensions(array('json', 'xml', 'rss', 'pdf'));
Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'home'));
CakePlugin::routes();
require CAKE . 'Config' . DS . 'routes.php';
