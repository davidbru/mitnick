<pre><?php
    /*
      hex to ascii
      --> remove the "'"
      --> vigenère cipher
      --> use keyword 'elmer'
      --> from character 5 onwards use the result - autokey
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
     */

    $orig = '70776d61766374666f2770636d6167797a786977786f78656a7974696465737073786f65696f63726f64706a6f766b636165686573677069637a61786172';
    echo 'orig:  '.$orig.'<br />';


    $step1 = hex2bin($orig);
    echo 'step1: '.$step1.'<br />';


    // also remove the "'" to get proper solution
    $step2 = str_split(str_replace('\'', '', $step1));


    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $keyword = 'elmer';

    $step3 = array();

    for($i=0; $i<count($step2); $i++) {
        if($i < strlen($keyword)) {
            $currentKeyCharacter = $keyword[($i%strlen($keyword))];
        } else {
            $currentKeyCharacter = $step3[($i - strlen($keyword))];
        }

        $targetPos = strpos($alphabet, $step2[$i]) - strpos($alphabet, $currentKeyCharacter);

        if($targetPos>=strlen($alphabet)) {
            $targetPos = $targetPos - strlen($alphabet);
        } elseif($targetPos<0) {
            $targetPos = $targetPos + strlen($alphabet);
        }
        $step3[] = $alphabet[$targetPos];
    }

    $step4 = implode('', $step3);
    echo 'step4: '.$step4.'
';

    $step5 = strrev($step4);
    echo 'step5: '.$step5.'
';

    ?></pre>
