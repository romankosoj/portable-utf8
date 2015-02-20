<?php

use voku\helper\UTF8 as u;

class Utf8StrSplitTest extends PHPUnit_Framework_TestCase
{
  public function test_split_one_char()
  {
    $str = 'Iñtërnâtiônàlizætiøn';
    $array = array(
        'I',
        'ñ',
        't',
        'ë',
        'r',
        'n',
        'â',
        't',
        'i',
        'ô',
        'n',
        'à',
        'l',
        'i',
        'z',
        'æ',
        't',
        'i',
        'ø',
        'n',
    );

    $this->assertEquals($array, u::split($str));
  }

  public function test_split_five_chars()
  {
    $str = 'Iñtërnâtiônàlizætiøn';
    $array = array(
        'Iñtër',
        'nâtiô',
        'nàliz',
        'ætiøn',
    );

    $this->assertEquals($array, u::split($str, 5));
  }

  public function test_split_six_chars()
  {
    $str = 'Iñtërnâtiônàlizætiøn';
    $array = array(
        'Iñtërn',
        'âtiônà',
        'lizæti',
        'øn',
    );

    $this->assertEquals($array, u::split($str, 6));
  }

  public function test_split_long()
  {
    $str = 'Iñtërnâtiônàlizætiøn';
    $array = array(
        'Iñtërnâtiônàlizætiøn',
    );

    $this->assertEquals($array, u::split($str, 40));
  }

  public function test_split_newline()
  {
    $str = "\nIñtërn\nâtiônàl\nizætiøn\n\n";
    $array = array(
        "\n",
        'I',
        'ñ',
        't',
        'ë',
        'r',
        'n',
        "\n",
        'â',
        't',
        'i',
        'ô',
        'n',
        'à',
        'l',
        "\n",
        'i',
        'z',
        'æ',
        't',
        'i',
        'ø',
        'n',
        "\n",
        "\n"
    );

    $this->assertEquals($array, u::split($str));
  }
}
