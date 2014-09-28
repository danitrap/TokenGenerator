<?php
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});

$token = new TokenGenerator();
print $token->generate() . "\n";
$token->setCharset(new NumericCharset());
print $token->generate() . "\n";
$token->setCharset(new AlphabeticCharset());
print $token->generate() . "\n";