<!DOCTYPE html>
<html>

<head>
    <link rel = "stylesheet" href="styles.css">
    <h1>
        String Inspector
    </h1>
    <div id="centered">
        <form action="/">
            Try a string:
            <input type="text" name="q" value="">
            <input type="submit" value="Go">
        </form>
    </div>
</head>

<body>

    <div class="outer">



    <?php
        $string = $_GET['q'];
        $estr = htmlspecialchars($string);

        $isNumeric = ctype_digit($string);
        $isAlphabetic = ctype_alpha($string);
        $isAlphanumeric = ctype_alnum($string); 

        echo title("String") . $estr; br();
        hr();

        echo "<h3>General string information</h3>";
        echo title("Character count") . strlen($string); br();
        echo title("Word count") . str_word_count($string); br();
        echo title("Number count") . num_count($string); br();
        echo title("Letter count") . let_count($string); br();
        echo title("Special character count") . spec_char_count($string); br();
        echo title("Numeric only");
        echo $isNumeric ? "Yes" : "No"; br();
        echo title("Alphabetic only");
        echo $isAlphabetic ? "Yes" : "No"; br();
        echo title("Alphanumeric only");
        echo $isAlphanumeric ? "Yes" : "No"; br();

        if ($isNumeric) {
            hr();
            echo "<h3>Number information</h3>";
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

       echo "<h3>Other representations</h3>";
       echo title("Uppercase") . strtoupper($estr); br();
       echo title("Lowercase") . strtolower($estr); br();
       echo title("Reversed")  . htmlspecialchars(strrev($string)); br();
       echo title("ROT-13") . htmlspecialchars(str_rot13($string)); br();
       echo title("String to hex") . bin2hex($string); br();

       hr();

       print_hash_algorithms($string);

       hr();

       function print_hash_algorithms($input) {
           echo "<h3>Hashes</h3>";
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

       function num_count($input) {
           $num_count = 0;
           $len = strlen($input);
           for ($i = 0; $i < $len; $i++) {
               if (is_numeric($input[$i]))
               {
                   $num_count++;
               }
           }
           return $num_count;
       }

       function let_count($input) {
           $let_count = 0;
           $len = strlen($input);
           for ($i = 0; $i < $len; $i++) {
               if (ctype_alpha($input[$i]))
               {
                   $let_count++;
               }
           }
           return $let_count;
       }

       function spec_char_count($input) {
           $spec_count = 0;
           $len = strlen($input);
           for ($i = 0; $i < $len; $i++) {
               if (!is_numeric($input[$i]) && !ctype_alpha($input[$i]))
               {
                   $spec_count++;
               }
           }
           return $spec_count;

       }

    ?>

</body>
</html>
