<?php

namespace Pathology\Http\Controllers;

use Pathology\User;

class PassCodeGenerator
{
    /**
     *
     * @return string
     */
    public static function generatePassCode()
    {
        do {
            $code = self::generateTempPassCode();
            $code_exists = self::testPassCode($code);
        } while ($code_exists);

        return $code;
    }

    /**
     * Tests the DB to see if this pin already exist.
     * @param $pin
     * @return bool
     */
    private static function testPassCode($code)
    {

        if (User::where('pass_code', $code)->first())
            return true;
        return false;
    }

    /**
     * Generates a 6 digit pass code
     * @return string
     */
    private static function generateTempPassCode()
    {
        $pieces = array();

        for($i=0; $i<6; $i++){
            $value = rand(1, 9);
            $pieces[$i] = $value;
        }
        $code = implode("", $pieces);
        return $code;
    }

}
