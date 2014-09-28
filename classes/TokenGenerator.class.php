<?php
class TokenGenerator
{
  private $charsetArray;
  private $charsetSize;
  private $charsetClass;
  
  public function __construct()
  {
    $this->charsetClass = new AlphanumericCharset();
    $this->prepareCharset();
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
	$this->charsetClass = $charset;
	$this->prepareCharset();
  }
  
  private function prepareCharset()
  {
    $this->charsetArray = $this->charsetClass->getCharset();
    $this->charsetSize = count($this->charsetArray) - 1;
  }
  
  private function randomChar()
  {
    $index = rand(0, $this->charsetSize);
    return $this->charsetArray[$index];
  }
}