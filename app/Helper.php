<?php

namespace App;

class Helper
{
    const unit = ['pcs','kg','litre','packet','sack'];

    public static function getUnit()
    {
        return self::unit;
    }
}