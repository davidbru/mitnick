<pre><?php
    /*
      hex to ascii
      --> reverse output
      --> vigenère cipher
      --> use keyword 'ibfal' (reverse shortened version of previous answer 'lafbi')
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
     */

    $orig = '6365696a647a727573697775716d6e736e69627a74736a6f7969706469737967647163656c6f71776c66646d63656d78626c6879746d796f6d71747765686a6a71656d756c70696b6a627965696a71';
    echo 'orig:  '.$orig.'<br />';


    $step1 = hex2bin($orig);
    echo 'step1: '.$step1.'<br />';


    $step2 = strrev($step1);
    echo 'step2: '.$step2.'<br />';


    $step3 = array();
    for($i=0; $i<strlen($step2); $i++) {
        $step3[] = $step2[$i];
    }


    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $keyword = 'ibfal';

    $step4 = array();
    for($i=0; $i<count($step3); $i++) {
        $targetPos = strpos($alphabet, $step3[$i]) - strpos($alphabet, $keyword[($i%5)]);

        if($targetPos>=strlen($alphabet)) {
            $targetPos = $targetPos - strlen($alphabet);
        } elseif($targetPos<0) {
            $targetPos = $targetPos + strlen($alphabet);
        }
        $step4[] = $alphabet[$targetPos];
    }

    echo 'step4: '.implode('', $step4);

?></pre>
