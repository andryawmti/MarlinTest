<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 1/26/19
 * Time: 12:34 PM
 */

namespace App\Classes;


class FirstTest
{
    public function __construct()
    {
    }

    public static function loopGame($length)
    {
        $marlinBookingPrintedCount = 0;
        $isMarlinPrinted = false;
        $isBookingPrinted = false;
        $result = '';
        for ($i = 1; $i <= $length;  $i++) {
            if ($marlinBookingPrintedCount >= 2) {
                if (!fmod($i,3) && !fmod($i,5)) {
                    $result .= 'Marlin Booking ';
                    $marlinBookingPrintedCount += 1;
                } else if (!fmod($i,3)) {
                    $result .= 'Booking ';
                    if ($isMarlinPrinted) {
                        $isBookingPrinted = true;
                    }
                } else if (!fmod($i, 5)) {
                    $result .= 'Marlin ';
                    $isMarlinPrinted = true;
                }
            } else {
                if (!fmod($i,3) && !fmod($i,5)) {
                    $result .= 'Marlin Booking ';
                    $marlinBookingPrintedCount += 1;
                } else if (!fmod($i,3)) {
                    $result .= 'Marlin ';
                    $isMarlinPrinted = true;
                } else if (!fmod($i, 5)) {
                    $result .= 'Booking ';
                    if ($isMarlinPrinted) {
                        $isBookingPrinted = true;
                    }
                }
            }

            if ($isBookingPrinted && $isMarlinPrinted) {
                $marlinBookingPrintedCount += 1;
                $isBookingPrinted = false;
                $isMarlinPrinted = false;
            }

            if ($marlinBookingPrintedCount == 5) {
                break;
            }
        }

        return $result;
    }
}