<pre><?php
    /*
      vigenère cipher
      --> use keyword 'nunley'
      --> from character 6 onwards use the result - autokey
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
     */

    $orig = 'eyiyibemhemijixvpyiocjkxdwwxdazvtkaazrvl';
    $step1 = str_split($orig);

    echo 'step1: '.implode(' ', $step1).'
';
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $keyword  = 'nunley';

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
    the reason i was fired from the law firm in denver

answer to the solution:
    consulting
</pre>