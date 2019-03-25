<?php

namespace Arth\Utils;

class Json5
{
  public function encode($value, $options = 0, $depth = 512)
  {
    return json_encode($value, $options, $depth);
  }
  public function decode($json, $assoc = false, $depth = 512, $options = 0)
  {
    return json_decode($json, $assoc, $depth, $options);
  }
}
