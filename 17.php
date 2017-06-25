<pre><?php
    /*
      morse code
      --> but inverse the translation each character
      https://en.wikipedia.org/wiki/Morse_code
     */

    $orig = '100 0000 10 1 01 001 00 1000 1 010 11 000 0 0000 11 000 00011 10000 11111 11110 11000 00111 10000 11111 10000 11111';

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

    $morseTranslation = array(
        array('1', '0'),
        array('0', '1')
    );

    echo 'orig:  '.$orig.'<br />';

    $step1 = explode(' ', $orig);

    $step2 = array();
    $counter = 0;
    foreach($step1 AS $characterValue) {
        $currentTranslation = $morseTranslation[$counter%2];
        $step2[] = str_replace($currentTranslation, array('.', '-'), $characterValue);

        $counter ++;
        if($counter == 16) {
            $counter ++;
        }
    }
    echo 'step2: '.implode(' ', $step2).'<br />';


    $step3 = array();
    foreach($step2 AS $characterValue) {
        foreach($morseAlphabet AS $alphabetKey => $alphabetValue) {
            if($characterValue == $alphabetValue) {
                $step3[] = $alphabetKey;
            }
        }
    }
    echo 'step3: '.implode(' ', $step3);

    ?></pre>
