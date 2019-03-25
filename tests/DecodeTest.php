<?php

namespace Arth\Test;

use Arth\Utils\Json5;
use PHPUnit\Framework\TestCase;

class DecodeTest extends TestCase
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
  public function testDecode($json, $expected, $assoc = false, $depth = 512, $options = 0)
  {
    $this->assertEquals($expected, $this->svc->decode($json, $assoc, $depth, $options));
  }

  public function data()
  {
    return [
      [
        '[1,2,"Str",{"key":"Folded"}]',
        [1, 2, 'Str', (object)['key' => 'Folded']],
      ],
      [
        '[1,2,"Str",{"key":"Folded"}]',
        [1, 2, 'Str', ['key' => 'Folded']],
        true,
      ],
    ];
  }
}
