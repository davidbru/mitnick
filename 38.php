<pre><?php
    /*
      morse code *JUST A GUESS*
      https://en.wikipedia.org/wiki/Morse_code

      decipher it twice (once where '.' = '0' and '-' = '1' and once the other way around)
      read the final message in zigzag
     */

    $orig = '001101 110010 001101 110010 001101 110010 001101 110010 111 00 011 00 10 110 0000 11 00 1001 110 0100 111 10 11 00 1101 1001 0100 10 100 11 01 101 0010 11 101 011 111 000 100 010 1001 001 1 101 01 010 1010 01 0 1110 10 0111 010 010';

    $morseAlphabet = array(
        array('a', '.-'),
        array('b', '-...'),
        array('c', '-.-.'),
        array('d', '-..'),
        array('e', '.'),
        array('f', '..-.'),
        array('g', '--.'),
        array('h', '....'),
        array('i', '..'),
        array('j', '.---'),
        array('k', '-.-'),
        array('l', '.-..'),
        array('m', '--'),
        array('n', '-.'),
        array('o', '---'),
        array('p', '.--.'),
        array('q', '--.-'),
        array('r', '.-.'),
        array('s', '...'),
        array('t', '-'),
        array('u', '..-'),
        array('v', '...-'),
        array('w', '.--'),
        array('x', '-..-'),
        array('y', '-.--'),
        array('z', '--..'),
        array('1', '.----'),
        array('2', '..---'),
        array('3', '...--'),
        array('4', '....-'),
        array('5', '.....'),
        array('6', '-....'),
        array('7', '--...'),
        array('8', '---..'),
        array('9', '----.'),
        array('0', '-----')
    );

    $morseTranslation = array(
        array('0', '1'),
        array('1', '0')
    );

    echo 'orig:  '.$orig.'

';

    $step1 = explode(' ', $orig);

    $step2 = array();
    foreach($morseTranslation AS $translationKey => $translationValue) {
        echo 'step2: ';
        foreach ($step1 AS $characterKey => $characterValue) {
            $step2[$translationKey][] = str_replace($translationValue, array('.', '-'), $characterValue);
            echo $characterKey.str_replace($translationValue, array('.', '-'), $characterValue).' ';
        }
        echo '
';
    }


    echo '
';


    $step3 = array();
    foreach($step2 AS $lineKey => $lineValue) {
        echo 'step3: ';
        foreach($lineValue AS $characterKey => $characterValue) {
            $keyFound = false;
            foreach($morseAlphabet AS $alphabetKey => $alphabetValue) {
                if($characterValue == $alphabetValue[1]) {
                    $step3[$lineKey][] = $alphabetValue[0];

                    echo $characterKey.$alphabetValue[0].' ';
                    $keyFound = true;
                }
            }
            if($keyFound == false) {
                $step3[$lineKey][] = '_';
                echo $characterKey.'_ ';
            }

        }
        echo '
';
    }


    echo '
';


    $step4 = array();
    for($i=0; $i<sizeof($step3[0]); $i++) {
        $step4[] = $step3[$i%2][$i];
    }
    $step4out = implode(' ', $step4);
    echo 'step4: '.$step4out.'
step4: '.strrev($step4out);

    ?></pre>