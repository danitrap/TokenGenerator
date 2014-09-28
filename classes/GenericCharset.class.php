<?php
interface iCharset
{
  public function getCharset();
}

abstract class GenericCharset implements iCharset
{  
  public function getCharset()
  {
    return str_split($this->charset);
  }
}