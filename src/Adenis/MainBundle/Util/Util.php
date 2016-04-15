<?php

namespace Adenis\MainBundle\Util;

/**
 * Description of Util
 *
 * @author txema
 */
class Util {

    public static function correctNumber($number) {

        if (($number != null) && ($number[0] == 0)) {
        //    $number = substr($number, 1);
        }

        $aux1 = str_replace(" ", "", $number);
        $aux2 = str_replace(".", "", $aux1);
        $aux3 = str_replace("+", "", $aux2);

        return $aux3;
    }

    
    public static function secondsToTime($seconds) {
        // extract hours
        $hours = floor($seconds / (60 * 60));

        // extract minutes
        $divisor_for_minutes = $seconds % (60 * 60);
        $minutes = floor($divisor_for_minutes / 60);

        // extract the remaining seconds
        $divisor_for_seconds = $divisor_for_minutes % 60;
        $seconds = ceil($divisor_for_seconds);

        if(((int)$hours)<10){$hours = "0".$hours;}
        if(((int)$minutes)<10){$minutes = "0".$minutes;};
        if(((int)$seconds)<10){$seconds = "0".$seconds;};
        
        return $hours.':'.$minutes.':'.$seconds;
    }
    
}
