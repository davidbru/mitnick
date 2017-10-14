<pre><?php
    /*
      morse code
      https://en.wikipedia.org/wiki/Morse_code

      hex to ascii
      --> vigenère cipher
      --> use keyword 'ddi'
      --> from character 4 onwards use the result - autokey
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
     */

    $orig = '1001 0111 01 00 0 0 101 011 1111 1110 1011 1111 101 0110 1111 1101 110 010 100 0 0100 11 1011 1011 000 10 101 01';

    $morseAlphabet = array(
        'a' => '.-',
        'b' => '-...',
        'c' => '-.-.',
        'd' => '-..',
        'e' => '.',
        'f' => '..-.',
        'g' => '--.',
        'h' => '....',
        'i' => '..',
        'j' => '.---',
        'k' => '-.-',
        'l' => '.-..',
        'm' => '--',
        'n' => '-.',
        'o' => '---',
        'p' => '.--.',
        'q' => '--.-',
        'r' => '.-.',
        's' => '...',
        't' => '-',
        'u' => '..-',
        'v' => '...-',
        'w' => '.--',
        'x' => '-..-',
        'y' => '-.--',
        'z' => '--..',
        '1' => '.----',
        '2' => '..---',
        '3' => '...--',
        '4' => '....-',
        '5' => '.....',
        '6' => '-....',
        '7' => '--...',
        '8' => '---..',
        '9' => '----.',
        '0' => '-----',
    );

    echo 'orig:  '.$orig.'
';

    $step1 = explode(' ', $orig);

    $step2 = array();
    $counter = 0;
    foreach($step1 AS $characterValue) {
        $step2[] = str_replace(array('1', '0'), array('.', '-'), $characterValue);

        $counter ++;
        if($counter == 16) {
            $counter ++;
        }
    }
    echo 'step2: '.implode(' ', $step2).'
';



    $step3 = array();
    foreach($step2 AS $characterValue) {
        foreach($morseAlphabet AS $alphabetKey => $alphabetValue) {
            if($characterValue == $alphabetValue) {
                $step3[] = $alphabetKey;
            }
        }
    }


    echo '

step 3 - vigenère cipher with autokey
';
    echo 'step3: '.implode(' ', $step3).'
';
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $keyword  = 'ddi';

    $step4 = array();

    for($i=0; $i<count($step3); $i++) {
        if($i < strlen($keyword)) {
            $currentKeyCharacter = $keyword[($i%strlen($keyword))];
        } else {
            $currentKeyCharacter = $step4[($i - strlen($keyword))];
        }

        $targetPos = strpos($alphabet, $step3[$i]) - strpos($alphabet, $currentKeyCharacter);

        if($targetPos>=strlen($alphabet)) {
            $targetPos = $targetPos - strlen($alphabet);
        } elseif($targetPos<0) {
            $targetPos = $targetPos + strlen($alphabet);
        }
        $step4[] = $alphabet[$targetPos];
    }

    echo 'step4: '.implode(' ', $step4);


    ?>

<hr /><hr />
solution:
    my favorite donuts are these kind

answer to the solution:
    fbi donuts
</pre>