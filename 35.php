<pre><?php
    /*
      bifid cipher - key 'marty'
      https://en.wikipedia.org/wiki/Bifid_cipher

      create key square
      calculate character positions
      cut in two parts
      reverse the whole thing
     */

    $alphabet = 'abcdefghiklmnopqrstuvwxyz'; // without 'j'
    $key = 'marty';
    $orig = 'ifdmnbbnqitnsobmmmtthdkhqbqzpo\'nduqz\'zhnemccxhyaninaxanf';

    $keyArray = str_split($key);
    $alphabetRaw = $key.str_replace($keyArray, '', $alphabet);

    $alphabetRawArray = str_split($alphabetRaw);

    $alphabet = array();
    $rawCounter = 0;
    echo '
key square: 
';
    for($i=1; $i<6; $i++) {
        for($j=1; $j<6; $j++) {
            if($i==1 && $j==1) {
                echo '  1 2 3 4 5
';
            }
            if($j==1) {
                echo $i.' ';
            }

            $alphabet[$i][$j] = $alphabetRawArray[$rawCounter];
            echo $alphabetRawArray[$rawCounter].' ';
            $rawCounter++;
        }
        echo '
';
    }
    echo '
';



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



    echo 'step1: '.implode(' ', $step1).'
step2: ';

    $step2 = array();
    foreach($step1 AS $value) {
        $row = '_';
        $col = '_';
        foreach($alphabet AS $aRowKey => $aRowVal) {
            foreach($aRowVal AS $aColKey => $aColVal) {
                if($value == $aColVal) {
                    $row = $aRowKey;
                    $col = $aColKey;
                    break;
                }
            }
        }
        $step2[] = array($value, $row, $col);
        echo $row.$col.' ';
    }



    $step3 = '';
    foreach($step2 AS $value) {
        $step3 .= $value[1].$value[2];
    }
    echo '
step3: '.$step3.'
';


    // cut the whole string into two pieces
    $step4 = array(
        substr($step3, 0, strlen($step3)/2),
        substr($step3, strlen($step3)/2)
    );


    $step5 = array();
    for($i=0; $i<strlen($step4[0]); $i++) {
        $step5[] = $alphabet[$step4[0][$i]][$step4[1][$i]];
    }

    echo 'step5: '.implode(' ', $step5).'
rev:   '.strrev(implode(' ', $step5)).'
';





    $outputTMP = '';
    $counter = 0;
    foreach($step5 AS $key => $value) {
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

    echo 'out:   '.$outputTMP.'
rev:   '.strrev($outputTMP);



    ?>


<hr /><hr />
solution:
    someone logged into my 'marty' account on this system from the well

answer to the solution:
    Neill Clift - is not really mentioned in the chapter
</pre>