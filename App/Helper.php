<?php
namespace Abiodun\App;
use Abiodun\Exception\PageNotFoundException;

trait Helper {
    static function view($filepath, $data = [])
    {
        $filepath = __DIR__.'/../pages/' . $filepath . '.php';

        if (!file_exists($filepath)) {
            throw new PageNotFoundException("Page not found");
        }
        
        require $filepath;
    } 

    static function request()
    {
        return (object) $_REQUEST;
    }
}