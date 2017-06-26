<pre><?php
    /*
      columnar transposition
      --> write text in columns
      https://en.wikipedia.org/wiki/Transposition_cipher#Columnar_transposition
     */

    $orig = 'nhyitekmnryoogmwefehocttntnoauttosumooalgei__';
    echo 'orig:  '.$orig.'<br />';


    for($i=2; $i<strlen($orig); $i++) {
        if(strlen($orig)%$i == 0) {
            echo 'string is dividable by '.$i.' with 0 remainder<br />';
            $tmpBreakpoint = $i-1;
            $step2 = array();

            for($j=0; $j<strlen($orig); $j++) {
                $step2[$j%$i][] = $orig[$j];
                echo $orig[$j];
                if($j%$i == $tmpBreakpoint) {
                    echo '<br />';
                }
            }
            echo '<br />';

            $step3 = '';
            for($j=0; $j<=sizeof($step2); $j++) {
                for($k=sizeof($step2[$j]); $k>=0; $k--) {
                    echo $step2[$j][$k];
                    $step3 .= $step2[$j][$k];
                }
            }
            echo '<br />';

            $step3reverse = strrev($step3);
            echo $step3reverse;
            echo '<hr />';
        }
    }

    ?></pre>
