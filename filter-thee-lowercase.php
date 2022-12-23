<?php

class threeLowerCase
{
    function __construct(string $sentence)
    {
        $this->sentence = $sentence;
    }
    function filterThreeLowerCase()
    {
        $upperCase = strtoupper($this->sentence);
        $str = substr($upperCase,0,1);
        $str .= strtolower(substr($upperCase,1,3));
        $str .= substr($upperCase,4,strlen($upperCase));
        return $str;
    }
}

$test = new threeLowerCase("transisi");
echo "".$test->filterThreeLowerCase();