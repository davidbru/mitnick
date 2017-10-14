<pre><?php
    /*
      caesar cipher – key 15
      --> shift letters in alphabet by key
      https://en.wikipedia.org/wiki/Caesar_cipher
     */

    $alphabet = 'abcdefghijklmnopqrstuvwxyz';

    $orig = 'Estd mzzv esle elfrse xp szh ez ncplep yph topyetetpd hspy T hld l acp-eppy';
    $step1 = strtolower($orig);

    for($i=0; $i<strlen($alphabet); $i++) {
        $output = $i.': ';
        for($j=0; $j<strlen($step1); $j++) {
            if(strpos($alphabet, $step1[$j]) !== FALSE) {
                $targetPos = strpos($alphabet, $step1[$j]) + $i;

                if($targetPos>=strlen($alphabet)) {
                    $targetPos = $targetPos - strlen($alphabet);
                }
                $output .= $alphabet[$targetPos];
            } else {
                $output .= $step1[$j];
            }
        }
        echo $output;
        echo '<hr />';
    }
    ?>

<hr /><hr />
solution:
    this book that taught me how to create new identities when i was a pre-teen

answer to the solution:
    The Paper Trip by Barry Reid
</pre>