<pre><?php
    /*
      vigenère cipher
      --> use keyword 'clift'
      --> from character 5 onwards use the result - autokey
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
     */

    $orig = 'tpdwxjw\'viyegmzbecfvpcqtuwdinpfhzvvfadzbkfoevcnseozxffdlvrdo\'jwsjkzllxwapfrvhuaqz';

    $irregularities = array();
    $step1 = array();
    for($i=0; $i<strlen($orig); $i++) {
        if(preg_match("/^[a-z]+$/", $orig[$i]) == 1) {
            $step1[] = $orig[$i];
        } else {
            $irregularities[$i] = $orig[$i];
        }
    }

    echo 'orig:  '.$orig.'

irregularities found at the following positions:
';

    foreach($irregularities AS $key => $value) {
        echo $key.': "'.$value.'"
';
    }


    echo '
step1: '.implode(' ', $step1).'
';
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $keyword  = 'clift';

    $step2 = array();

    for($i=0; $i<count($step1); $i++) {
        if($i < strlen($keyword)) {
            $currentKeyCharacter = $keyword[($i%strlen($keyword))];
        } else {
            $currentKeyCharacter = $step2[($i - strlen($keyword))];
        }

        $targetPos = strpos($alphabet, $step1[$i]) - strpos($alphabet, $currentKeyCharacter);

        if($targetPos>=strlen($alphabet)) {
            $targetPos = $targetPos - strlen($alphabet);
        } elseif($targetPos<0) {
            $targetPos = $targetPos + strlen($alphabet);
        }
        $step2[] = $alphabet[$targetPos];
    }

    echo 'step2: '.implode(' ', $step2).'
';

    $step3 = implode(' ', $step2);
    echo 'step3: '.strrev($step3).'
';


    // Put the irregularities back in
    $outputTMP = '';
    $counter = 0;
    foreach($step2 AS $key => $value) {
        if(isset($irregularities[$counter])) {
            $outputTMP .= " ".$irregularities[$counter];
            $counter ++;
        }

        if($outputTMP != '') {
            $outputTMP .= ' ';
        }
        $outputTMP .= $value;
        $counter ++;
    }

    echo '
out:   '.$outputTMP.'
rev:   '.strrev($outputTMP);



    ?></pre>
