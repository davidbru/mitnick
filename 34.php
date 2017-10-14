<pre><?php
    /*
      bifid cipher - key 'oki'
      https://en.wikipedia.org/wiki/Bifid_cipher

      create key square
      calculate character positions
      cut in two parts
      reverse the whole thing
     */

    $alphabet = 'abcdefghiklmnopqrstuvwxyz'; // without 'j'
    $key = 'oki';
    $orig = 'eqfeihchqqlndcinrarnfhqdvmlqnmcrlphaccqmaefkzhlslnstmqgmma';


    $keyArray = str_split($key);
    $alphabetRaw = $key.str_replace($keyArray, '', $alphabet);

    $alphabetRawArray = str_split($alphabetRaw);

    $alphabet = array();
    $rawCounter = 0;
    echo 'key square: 
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


    $step1 = str_split($orig);
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
rev:   '.strrev(implode(' ', $step5));


    ?>


<hr /><hr />
solution:
    this employee at intermetrics uploaded the motorola compiler for me

answer to the solution:
    Marty Stolz
</pre>