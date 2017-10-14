<pre><?php
    /*
      morse code
      https://en.wikipedia.org/wiki/Morse_code

      decipher it twice (once where '.' = '0' and '-' = '1' and once the other way around)
      read the final message in zigzag
     */

    $orig = '010 1 0001 101 0 111 000 100001 01 101 001 00 111 00 00 1111 000 01 111 1 10 000 0000 1001 000 11 0000 0 111 0 0 0101 010 110 111 111 0 1111 1 101 111 1101 110 01 00 010 111 000 0100 111 01 100 00';

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


    ?>


<hr /><hr />
solution:
    i was looking for the source to this phone on shimomura's server

answer to the solution:
    OKI 900 and OKI 1150
</pre>