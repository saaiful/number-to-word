<?php
use PHPUnit\Framework\TestCase;
use Saaiful\NumberToWord\Word;

class WordTest extends TestCase
{

    public function testOneToNinetyNine()
    {
        $test = new Word(10);
        $this->assertEquals('দশ', $test->word());

        $test = new Word(40);
        $this->assertEquals('চল্লিশ', $test->word());

        $test = new Word(99);
        $this->assertEquals('নিরানব্বই', $test->word());
    }

    public function testNinetyNineToManyCr()
    {

        $test = new Word(10000);
        $this->assertEquals('দশ হাজার', $test->word());

        $test = new Word(1234567890);
        $this->assertEquals('একশত তেইশ কোটি পঁয়তাল্লিশ লক্ষ সাতষট্টি হাজার আটশত নব্বই', $test->word());

        $test = new Word(100000);
        $this->assertEquals('এক লক্ষ', $test->word());

        $test = new Word(10000000);
        $this->assertEquals('এক কোটি', $test->word());
    }

    public function testBanglaUnicode()
    {
        $test = new Word('১০');
        $this->assertEquals('দশ', $test->word());
    }

    public function testNegative()
    {
        $test = new Word(-10);
        $this->assertEquals('ঋণাত্মক দশ', $test->word());
    }

    public function testDecimal()
    {
        $test = new Word(10.55);
        $this->assertEquals('দশ দশমিক পাঁচ পাঁচ', $test->word());

        $test = new Word(10.01);
        $this->assertEquals('দশ দশমিক শূন্য এক', $test->word());
    }

    public function testSeparator()
    {
        $test = new Word('10,000');
        $this->assertEquals('দশ হাজার', $test->word());

        $test = new Word('10 000');
        $this->assertEquals('দশ হাজার', $test->word());
    }

    public function testHelper()
    {
        $this->assertEquals('দশ হাজার', n2w(10000));
    }

    public function testMinMaxRange()
    {
        $this->assertEquals('শূন্য', n2w(0));
        $this->assertEquals('এই সংখ্যা কথায় প্রকাশ করা যাচ্ছে না', n2w(1000000000000000000));
    }
}
