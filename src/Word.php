<?php
namespace Saaiful\NumberToWord;

/**
 * Number to Word Bangla
 * @author Saiful Islam
 * @version 0.0.1
 * @license MIT
 */
class Word
{
    private $conjunction = ' এবং ';
    private $negative = 'ঋণাত্মক ';
    private $decimal = ' দশমিক ';
    private $dictionary = [0 => "শূন্য", 1 => "এক", 2 => "দুই", 3 => "তিন", 4 => "চার", 5 => "পাঁচ", 6 => "ছয়", 7 => "সাত", 8 => "আট", 9 => "নয়টি", 10 => "দশ", 11 => "এগারো", 12 => "বারো", 13 => "তেরো", 14 => "চৌদ্দ", 15 => "পনের", 16 => "ষোল", 17 => "সতের", 18 => "আঠার", 19 => "উনিশ", 20 => "বিশ", 21 => "একুশ", 22 => "বাইশ", 23 => "তেইশ", 24 => "চব্বিশ", 25 => "পঁচিশ", 26 => "ছাব্বিশ", 27 => "সাতাশ", 28 => "আটাশ", 29 => "ঊনত্রিশ", 30 => "ত্রিশ", 31 => "একত্রিশ", 32 => "বত্রিশ", 33 => "তেত্রিশ", 34 => "চৌত্রিশ", 35 => "পঁয়ত্রিশ", 36 => "ছত্রিশ", 37 => "সাইত্রিশ", 38 => "আটত্রিশ", 39 => "ঊনচল্লিশ", 40 => "চল্লিশ", 41 => "একচল্লিশ", 42 => "বিয়াল্লিশ", 43 => "তেতাল্লিশ", 44 => "চুয়াল্লিশ", 45 => "পঁয়তাল্লিশ", 46 => "ছিচল্লিশ", 47 => "সাতচল্লিশ", 48 => "আটচল্লিশ", 49 => "ঊনপঞ্চাশ", 50 => "পঞ্চাশ", 51 => "একান্ন", 52 => "বাহান্ন", 53 => "তেপ্পান্ন", 54 => "চুয়ান্ন", 55 => "পঞ্চান্ন", 56 => "ছাপ্পান্ন", 57 => "সাতান্ন", 58 => "আটান্ন", 59 => "ঊনষাট", 60 => "ষাট", 61 => "একষট্টি", 62 => "বাষট্টি", 63 => "তেষট্টি", 64 => "চৌষট্টি", 65 => "পঁয়ষট্টি", 66 => "ছেষট্টি", 67 => "সাতষট্টি", 68 => "আটষট্টি", 69 => "উনসত্তুর", 70 => "সত্তর", 71 => "একাত্তর", 72 => "বাহাত্তর", 73 => "তেহাত্তুর", 74 => "চুয়াত্তর", 75 => "পচাত্তর", 76 => "সত্তর ছয়", 77 => "সাতাত্তর", 78 => "আটাত্তর", 79 => "উনাশি", 80 => "আশি", 81 => "একাশি", 82 => "বিরাশি", 83 => "তিরাশি", 84 => "চুরাশি", 85 => "পঁচাশি", 86 => "ছিয়াশি", 87 => "সাতাশি", 88 => "আটাশি", 89 => "ঊনানব্বুই", 90 => "নব্বই", 91 => "একানব্বই", 92 => "বিরানব্বই", 93 => "তিরানব্বই", 94 => "চুরানব্বই", 95 => "পঁচানব্বই", 96 => "নব্বই ছয়", 97 => "সাতানব্বই", 98 => "আটানব্বই", 99 => "নিরানব্বই", 100 => "শত", 1000 => "হাজার", 100000 => "লক্ষ", 10000000 => "কোটি"];
    public $number = 0;

    public function __construct($number)
    {
        $this->number = $this->b2e(str_replace([' ', ','], '', $number));
    }

    private function b2e($number)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        return str_replace($bn, $en, $number);
    }

    private function separator($number)
    {
        $string = '';
        if ($number < 100) {
            $string = $this->dictionary[$number];
        } elseif ($number < 1000) {
            $units = explode('.', sprintf('%0.2f', $number / 100));
            $left = $number % 100;
            if ($left > 0) {
                $string = $this->separator($units[0]) . '' . $this->dictionary[100] . ' ' . $this->separator($left);
            } else {
                $string = $this->separator($units[0]) . '' . $this->dictionary[100];
            }
        } elseif ($number < 100000) {
            $units = explode('.', sprintf('%0.2f', $number / 1000));
            $left = $number % 1000;
            if ($left > 0) {
                $string = $this->separator($units[0]) . ' ' . $this->dictionary[1000] . ' ' . $this->separator($left);
            } else {
                $string = $this->separator($units[0]) . ' ' . $this->dictionary[1000];
            }
        } elseif ($number < 10000000) {
            $units = explode('.', sprintf('%0.2f', $number / 100000));
            $left = $number % 100000;
            if ($left > 0) {
                $string = $this->separator($units[0]) . ' ' . $this->dictionary[100000] . ' ' . $this->separator($left);
            } else {
                $string = $this->separator($units[0]) . ' ' . $this->dictionary[100000];
            }
        } elseif ($number > 1) {
            $units = explode('.', sprintf('%0.2f', $number / 10000000));
            $left = $number % 10000000;
            if ($left > 0) {
                $string = $this->separator($units[0]) . ' ' . $this->dictionary[10000000] . ' ' . $this->separator($left);
            } else {
                $string = $this->separator($units[0]) . ' ' . $this->dictionary[10000000];
            }
        }
        return $string;
    }

    public function word()
    {
        $string = '';
        if ($this->number < 0) {
            $string = $this->negative;
            $this->number = abs($this->number);
        }
        $number = explode('.', $this->number);
        if (count($number) == 1) {
            $string .= $this->separator($number[0]);
        } elseif (count($number) == 2) {
            $string .= $this->separator($number[0]) . $this->decimal . $this->separator($number[1]);
        }
        if (preg_match("/^ (লক্ষ|কোটি|শত|হাজার)/", $string)) {
            $string = 'এক' . $string;
        }
        return $string;
    }
}
