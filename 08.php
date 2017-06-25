<pre><?php
    /*
      columnar transposition
      --> write text in columns
      https://en.wikipedia.org/wiki/Transposition_cipher#Columnar_transposition
     */
    $orig = '\'siass nuhmil sowsra amnapi waagoc ifinti dscisf iiiesf ahgbao staetn itmlro';

    $step1 = str_replace(' ', '', $orig);
    echo $step1;
    echo '<br />';

    for($i=2; $i<strlen($step1); $i++) {
        if(strlen($step1)%$i == 0) {
            echo 'string is dividable by '.$i.' with 0 remainder<br />';
            $tmpBreakpoint = $i-1;
            $step2 = array();

            for($j=0; $j<strlen($step1); $j++) {
                $step2[$j%$i][] = $step1[$j];
                echo $step1[$j];
                if($j%$i == $tmpBreakpoint) {
                    echo '<br />';
                }
            }
            echo '<br />';

            for($j=0; $j<=sizeof($step2); $j++) {
                for($k=sizeof($step2[$j]); $k>=0; $k--) {
                    echo $step2[$j][$k];
                }
            }
            echo '<hr />';
        }
    }
    ?></pre>
