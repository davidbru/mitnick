<pre><?php
    /*
      vigenère cipher
      --> use keyword 'consulting'
      --> from character 10 onwards use the result - autokey
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
     */

    $orig = 'usygbjmqeauidgttlcflgqmfqhyhwurqmbxzoqmnpmjhlneqsctmglahp';
    $step1 = str_split($orig);

    echo 'step1: '.implode(' ', $step1).'
';
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $keyword  = 'consulting';

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



    ?>

<hr /><hr />
solution:
    this person was tricked into sending me numerous vms security holes

answer to the solution:
    Neill Clift
</pre>