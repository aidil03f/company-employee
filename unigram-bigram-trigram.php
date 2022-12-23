<?php

class ManipulateString
{
    function __construct(string $values)
    {
        $this->values = explode(' ', $values);
    }
    function unigram()
    {
		$unigram = '';
		foreach ($this->values as $item) {
			$unigram .= $item.', ';
		}
		return substr($unigram, 0, -2);
    }
    function bigram()
    {
        $x = 0;
		$bigram = '';
		foreach ($this->values as $item) {
			if ($x < 1) {
				$bigram .= $item.' ';
				$x++;
			} else {
				$bigram .= $item.', ';
				$x = 0;
			}
		}
		return substr($bigram, 0, -2);
    }
    function trigram()
    {
        $x = 0;
		$trigram = '';
		foreach ($this->values as $item) {
			if ($x < 2) {
				$trigram .= $item.' ';
				$x++;
			} else {
				$trigram .= $item.', ';
				$x = 0;
			}
		}
		return substr($trigram, 0, -2);
    }

}

$output = new ManipulateString("Jakarta adalah ibukota negara Republik Indonesia");
echo "unigram : ".$output->unigram();
echo "<br>";
echo "bigram : ".$output->bigram();
echo "<br>";
echo "trigram : ".$output->trigram();