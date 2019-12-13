<?php


namespace Foxit07\Admin\Models;


class Menu
{
    private static $menu;

    public static function render(array $menu)
    {
        self::$menu = $menu;

        dd(self::$menu);
    }
}