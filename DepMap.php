<?php
/*
 *  Copyright (c) 2018 Arturs Plisko <https://github.com/blizko http://www.blizko.lv>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE at the top level of
 * the source code distribution for details.
 */

class DepMap
{

    /**
     * Create menu item
     */
    public function menu()
    {
        echo('<li><a href="plugin/?p='.get_class().'">Dependency Map</a></li>');
        self::load();
    }

    /**
     * Add PSR-4 path to composer
     * @global type $config
     */
    private static function load(){
        global $config;

        /* @var $loader \Composer\Autoload\ClassLoader */
        $loader = require $config['install_dir'].'/vendor/autoload.php';
        $loader->addPsr4("LibreNMS\Plugin\DepMap\\", dirname(__FILE__));
    }
}