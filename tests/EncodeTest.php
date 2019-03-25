<?php

namespace Arth\Test;

use Arth\Utils\Json5;
use PHPUnit\Framework\TestCase;

class EncodeTest extends TestCase
{
  /** @var Json5 */
  private $svc;
  protected function setUp(): void
  {
    parent::setUp();
    $this->svc = new Json5();
  }

  /**
   * @dataProvider data
   */
  public function testEncode($data, $expected, $options = 0, $depth = 512)
  {
    $this->assertEquals($expected, $this->svc->encode($data, $options, $depth));
  }

  public function data()
  {
    $ppTab = '    ';
    return [
      [
        [1, 2, 'Str', ['key' => 'Folded']],
        '[1,2,"Str",{"key":"Folded"}]',
      ],
      [
        [1, 2, 'Str', ['key' => 'Folded']],
        "[\n{$ppTab}1,\n{$ppTab}2,\n{$ppTab}\"Str\",\n{$ppTab}{\n{$ppTab}{$ppTab}\"key\": \"Folded\"\n{$ppTab}}\n]",
        JSON_PRETTY_PRINT,
      ],
    ];
  }
}
