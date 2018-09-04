<?php
/**
 * Number to Word Helper Function
 * @param  number $number
 * @return string
 */
function n2w($number)
{
    $n = new Saaiful\NumberToWord\Word($number);
    return $n->word();
}
