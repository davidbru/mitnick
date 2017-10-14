<pre><?php
    /*
      hex to ascii
      --> vigenère cipher
      --> ignore the "'"
      --> use keyword 'trw'
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
     */

    $orig = '77726e6b7668656a77676b6b276c6d6b6274616672656567776c6a7368697a70726f6d79656c';
    echo 'orig:  '.$orig.'<br />';


    $step1 = hex2bin($orig);
    echo 'step1: '.$step1.'<br />';


    $step2 = str_split($step1);


    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $keyword = 'trw';

    $step3 = array();

    $counter = 0;
    for($i=0; $i<count($step2); $i++) {
        if(strpos($alphabet, $step2[$i]) !== false) {
            $targetPos = strpos($alphabet, $step2[$i]) - strpos($alphabet, $keyword[($counter%strlen($keyword))]);

            if($targetPos>=strlen($alphabet)) {
                $targetPos = $targetPos - strlen($alphabet);
            } elseif($targetPos<0) {
                $targetPos = $targetPos + strlen($alphabet);
            }
            $step3[] = $alphabet[$targetPos];
            $counter ++;
        } else {
            $step3[] = $step2[$i];
        }
    }

    echo 'step3: '.implode('', $step3);

    ?>


<hr /><hr />
solution:
    darrell santo's voicemail password was this

answer to the solution:
    1313
</pre>