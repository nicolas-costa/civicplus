<?php

namespace App\Services;

use Jenssegers\Blade\Blade;

class BladeServiceProvider
{
    public function register(): Blade
    {
        $viewsPath = __DIR__ . '/../Views';
        $cachePath = __DIR__ . '/../Views/cache';
        return new Blade([$viewsPath], $cachePath);
    }
}