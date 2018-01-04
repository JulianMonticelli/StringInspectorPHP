<!DOCTYPE html>
<html>

<head>
<h1 style="margin:auto;text-align:center;">
String Inspector
</h1>
</head>

<body>

<div style="border-style:solid;border-width:1px;width:80%;position:relative;margin:auto;padding:5px;">



<?php
  $string = $_GET['q'];
  $estr = htmlspecialchars($string);

  $isNumeric = ctype_digit($string);
  $isAlphabetic = ctype_alpha($string);
  $isAlphanumeric = ctype_alnum($string); 

  echo title("String") . $estr; br();
  hr();

  echo title("Character count") . strlen($string); br();
  echo title("Word count") . str_word_count($string); br();
  echo title("Numeric only");
  echo $isNumeric ? "Yes" : "No"; br();
  echo title("Alphabetic only");
  echo $isAlphabetic ? "Yes" : "No"; br();
  echo title("Alphanumeric only");
  echo $isAlphanumeric ? "Yes" : "No"; br();

  if ($isNumeric) {
    hr();
    echo "<h3 style=\"text-align:center;margin:auto;\">Number information</h3>";
    echo title("Parity");
    echo ($string % 2) == 0 ? "Even" : "Odd";
    br();
    echo title("Primality");
    $primality = gmp_prob_prime($string);
    if ($primality == 0) {
       echo "Not prime";
    } elseif ($primality == 1) {
       echo "Probably prime";
    } else {
       echo "Prime";
    }
    br();
    echo title("Perfect Square");
    echo gmp_perfect_square($string) ? "Yes" : "No";
    br();
    echo title("Preceded by");
    echo ($string-1);
    br();
    echo title("Succeeded by");
    echo ($string+1);
    br();
    echo title("Binary");
    echo decbin($string);
    br();
    echo title("Octal");
    echo decoct($string);
    br();
    echo title("Hexadecimal");
    echo dechex($string);
    br();
  }

  hr();

  echo title("Uppercase") . strtoupper($estr); br();
  echo title("Lowercase") . strtolower($estr); br();
  echo title("Reversed")  . htmlspecialchars(strrev($string)); br();
  echo title("ROT-13") . htmlspecialchars(str_rot13($string)); br();


  hr();

  print_hash_algorithms($string);

  hr();

  function print_hash_algorithms($input) {
    echo "<h3 style=\"text-align:center;margin:auto;\">Hashes</h3>";
    foreach(hash_algos() as $hash_algorithm) {
      $hash = hash($hash_algorithm, $input, false);
      echo title($hash_algorithm) . $hash;
      br();
    }
  }

  function title($input) {
      return "<strong>" . $input . "</strong>: ";
  }

  function hr() {
      echo "<hr />";
  }

function br() {
    echo "<br />";
}

?>

</body>
</html>
