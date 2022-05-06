<?php

namespace App\Helper;

class Word {
    public static function compareString($string1, $string2)
    {
        $arrString1 = str_split(str_replace(' ', '', $string1));
        $arrString2 = array_unique(str_split(str_replace(' ', '', $string2)));

        $totalEqual = 0;
        foreach ($arrString1 as $key => $user1) {
            
            foreach ($arrString2 as $key => $user2) {
                if ($user1 === $user2) {
                    $totalEqual++;
                    break;
                }
            }
        }

        
        $percentageEqual = ($totalEqual / count($arrString1)) * 100;

        $message = '';
        if (ctype_alpha($arrString1) && ctype_alpha($arrString2)) {
            if ((($totalEqual / count($arrString1)) * 100) >= 80) {
                $message = "nama user A dan user B $percentageEqual sama. Sodara nih kayanya";
            }
            else {
                $message = "persentase user A dan user B $percentageEqual%";
            }
        }
        else {
            $message = "persentase user A dan user B $percentageEqual%";
        }

        return ['message' => $message, 'percentageEqual' => $percentageEqual];
    }
}