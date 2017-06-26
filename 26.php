<pre><?php
    /*
      morse code
      https://en.wikipedia.org/wiki/Morse_code

      decipher it twice (once where '.' = '0' and '-' = '1' and once the other way around)
      read the final message in zigzag

      NOTE: there seems to be a mistake in the book
      at index 64 there is a '00' instead of a '11'
      that's why it spells "n e w (M) d e n t i t i e s"
      instead of           "n e w (I) d e n t i t i e s"
     */

    $orig = '11 0100 000 111 010 0 011 0010 000 010 11 10 1101 01 01 1 000 1 1111 01 0 011 1 010 1 1000 000 010 01 00 01 01 011 00 1101 0010 1 010 1 10 0 001101 110010 001101 110010 001101 100 0000 1 10 101 0 111 0 10 010 0101 0000 11 10 001 10 1 011 00 100 1 10 0 00 0 00 1 000';

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
        array('1', '0'),
        array('0', '1')
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
    echo 'step4: '.implode(' ', $step4);


    ?></pre>
