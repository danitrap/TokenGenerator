<?php
interface iCharset
{
  public function getCharset();
}

abstract class GenericCharset implements iCharset
{  
  protected $charset;
  
  public function getCharset()
  {
    return str_split($this->charset);
  }
}