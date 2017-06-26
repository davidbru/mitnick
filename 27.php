<pre><?php
    /*
      vigenère cipher
      --> use keyword 'state'
      --> from character 5 onwards use the result - autokey
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
     */

    $orig = 'laeaslarhawpuiolshawzadxijxkjgvvbvaxavlowyuuhdsxausmrmbulbegukseq';
    $step1 = str_split($orig);

    echo 'step1: '.implode(' ', $step1).'
';
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $keyword  = 'state';

    $step2 = array();

    for($i=0; $i<count($step1); $i++) {
        if($i < strlen($keyword)) {
            $currentKeyCharacterPosition = $keyword[($i%strlen($keyword))];
        } else {
            $currentKeyCharacterPosition = $step2[($i - strlen($keyword))];
        }

        $targetPos = strpos($alphabet, $step1[$i]) - strpos($alphabet, $currentKeyCharacterPosition);

        if($targetPos>=strlen($alphabet)) {
            $targetPos = $targetPos - strlen($alphabet);
        } elseif($targetPos<0) {
            $targetPos = $targetPos + strlen($alphabet);
        }
        $step2[] = $alphabet[$targetPos];
    }

    echo 'step2: '.implode(' ', $step2);


    ?></pre>
