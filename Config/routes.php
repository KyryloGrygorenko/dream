<?php

use Library\Route;

return  array(
    // site routes

    'index' => new Route('/', 'Default', 'index'),
    'show' => new Route('/users', 'Default', 'show'),
    'delete' => new Route('/delete', 'Default', 'delete'),
    'add' => new Route('/add', 'Default', 'add'),
    'update' => new Route('/update', 'Default', 'update'),

    'login' => new Route('/login', 'Security', 'login'),
    'logout' => new Route('/logout', 'Security', 'logout'),
);