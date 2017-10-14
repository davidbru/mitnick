<pre><?php
    /*
      caesar cipher – key 13 - reverse string first
      --> shift letters in alphabet by key
      https://en.wikipedia.org/wiki/Caesar_cipher
     */

    $alphabet = 'abcdefghijklmnopqrstuvwxyz';

    $orig = 'pbzfsobp dkfobtpkx lq pbkfi ppbkfpry aoxtolc iixz lq abpr bobt pbzfsba cl bmvq obail bpbeQ';
    $step1 = strtolower(strrev($orig));

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
    these older type of devices were used to call forward business lines to answering services

answer to the solution:
    "diverters"
</pre>