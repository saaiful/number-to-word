# number-to-word
এটি একটি পিএইচপি ক্লাস যা সংখ্যাকে কথায় পরিনত করে। 

[Live Demo/এখানে ডেমো দেখুন](https://saiful.im/n2w.php)

## Installation

```
composer require saaiful/bangla-number-word
```
or
```
{
    "require": {
        "saaiful/bangla-number-word": "0.*"
    }
}
```

## Usage
```php
...
require 'vendor/autoload.php';
use Saaiful\NumberToWord\Word;

$bangla = new Word(324650);

echo $bangla->word();
```
or
```php
...
require 'vendor/autoload.php';
use Saaiful\NumberToWord\Word;

$bangla = new Word('-১২৩');

echo $bangla->word();
```
or

```php
...
require 'vendor/autoload.php';
echo n2w($number);
```

## Without Composer
Download `Word.php` and `helper.php` from the repo and save the file into your project path somewhere.
```php
<?php
require 'path/to/Word.php';
require 'path/to/helper.php';

use Saaiful\NumberToWord\Word;

$bangla = new Word('-১২৩');

echo $bangla->word();
```