<?php

return function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/events', 'App\Controllers\EventController@index');
    $r->addRoute('GET', '/events/create', 'App\Controllers\EventController@create');
    $r->addRoute('POST', '/events', 'App\Controllers\EventController@store');
    $r->addRoute('GET', '/events/{id:[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}}', 'App\Controllers\EventController@show');
};