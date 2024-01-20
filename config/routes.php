<?php

use core\Router;

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
//Router::add('^registration$', ['controller' => 'FormRegistration', 'action' => 'registration']);
Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?');