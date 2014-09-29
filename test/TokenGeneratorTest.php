<?php

spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.class.php';
});

class TokenGeneratorTest extends PHPUnit_Framework_TestCase
{

    private $tg;

    function setUp()
    {
        $this->tg = new TokenGenerator();
    }

    public function testLength()
    {
        $result = $this->tg->generate(10);
        $this->assertEquals(true, strlen($result) === 10);
    }

    public function testDefaultBehaviour()
    {
        $result = $this->tg->generate();
        $this->assertRegExp('/[a-z0-9]/', $result);
    }

    public function testNumeric()
    {
        $this->tg->setCharset(new NumericCharset());
        $result = $this->tg->generate();
        $this->assertRegExp('/\d/', $result);
    }

    public function testAlphabetic()
    {
        $this->tg->setCharset(new AlphabeticCharset());
        $result = $this->tg->generate();
        $this->assertRegExp('/[a-z]/', $result);
    }

    public function testAlphanumeric()
    {
        $this->tg->setCharset(new AlphanumericCharset());
        $result = $this->tg->generate();
        $this->assertRegExp('/[a-z0-9]/', $result);
    }
}