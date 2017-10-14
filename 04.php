<pre><?php
    /*
      atbash cipher
      --> reverse the alphabet
      https://en.wikipedia.org/wiki/Atbash
     */

    $alphabet = 'abcdefghijklmnopqrstuvwxyz';

    $orig = 'gsvmznvlugsvnzrmuiznvhrszxpvwzgfhxrmgsvzikzmvgwzbh';
    $step1 = strtolower($orig);

    $output = '';
    for($i=0; $i<strlen($step1); $i++) {
        $targetPos = strlen($alphabet)-strpos($alphabet, $step1[$i])-1;

        $output .= $alphabet[$targetPos];
    }
    echo $output;
    ?>


<hr /><hr />
solution:
    the name of the mainframes i hacked at usc in the arpanet days

answer to the solution:
    DEC TOPS-20
</pre>