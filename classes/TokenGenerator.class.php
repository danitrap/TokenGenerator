<?php
class TokenGenerator
{
  private $charsetArray;
  private $charsetSize;
  
  public function __construct()
  {
    $this->prepareCharset(new AlphanumericCharset());
  }
  
  public function generate($max = 3)
  {
    $result = array();
    for ($i = 0; $i < $max; $i++)
    {
      $result[] = $this->randomChar();
    }
    return join($result);
  }
  
  public function setCharset(iCharset $charset)
  {
	$this->prepareCharset($charset);
  }
  
  private function prepareCharset(iCharset $charset)
  {
    $this->charsetArray = $charset->getCharset();
    $this->charsetSize = count($this->charsetArray);
  }
  
  private function randomChar()
  {
    $index = rand(0, $this->charsetSize - 1);
    return $this->charsetArray[$index];
  }
}