<pre><?php
    /*
      filter the irregularities (eg numbers and apostrophes)
      remember their position
      remove before beginning
      add them in again after the cipher

      playfair cipher
      --> shift letters according to the rules in the predefined alphabet table
      --> the letter 'j' was ommitted in the alphabet table
      --> key for the playfair cipher is 'sendmail'
      --> reverse the final output
      https://en.wikipedia.org/wiki/Playfair_cipher
     */

    $alphabet = 'abcdefghiklmnopqrstuvwxyz'; // without 'j'
    $key = 'sendmail';

    $keyArray = str_split($key);
    $alphabetRaw = $key.str_replace($keyArray, '', $alphabet);

    $alphabetRawArray = str_split($alphabetRaw);

    $alphabet = array();
    $rawCounter = 0;
    for($i=0; $i<5; $i++) {
        for($j=0; $j<5; $j++) {
            $alphabet[$i][$j] = $alphabetRawArray[$rawCounter];
            $rawCounter++;
        }
    }


    $orig = 'qnxpnebielnudqqpbibecua3m\'llswhmmhrdzucclsfvqmdunepbkreezkarsnngpkgmscdnkr';

    $irregularities = array();
    $step1 = '';
    for($i=0; $i<strlen($orig); $i++) {
        if(preg_match("/^[a-z]+$/", $orig[$i]) == 1) {
            $step1 .= $orig[$i];
        } else {
            $irregularities[$i] = $orig[$i];
        }
    }


    echo 'orig:  '.$orig.'
step1: '.$step1.'

irregularities found at the following positions:
';

    foreach($irregularities AS $key => $value) {
        echo $key.': "'.$value.'"
';
    }
    echo '


';

    $wordArray = array();
    for($i=0; $i<strlen($step1); $i+=2) {
        $wordArray[] = $step1[$i].$step1[$i+1];
    }


    $output = array();

    foreach($wordArray AS $combination) {
        $row = '';
        $column = '';
        $shape = '';

        $letterPosition = array();

        echo strtoupper($combination).'
';
        $letterPosition[] = searchInMultiArray($combination[0], $alphabet);
        $letterPosition[] = searchInMultiArray($combination[1], $alphabet);

        echo '  row ('.$letterPosition[0][0].' vs '.$letterPosition[1][0].'): ';
        if($letterPosition[0][0] == $letterPosition[1][0]) {
            $row = 'same';
            echo 'same';
        } elseif($letterPosition[0][0] > $letterPosition[1][0]) {
            $row = 'first';
            echo 'first greater';
        } else {
            $row = 'last';
            echo 'last greater';
        }
        echo '
';

        echo '  column ('.$letterPosition[0][1].' vs '.$letterPosition[1][1].'): ';
        if($letterPosition[0][1] == $letterPosition[1][1]) {
            $column = 'same';
            echo 'same';
        } elseif($letterPosition[0][1] > $letterPosition[1][1]) {
            $column = 'first';
            echo 'first greater';
        } else {
            $column = 'last';
            echo 'last greater';
        }
        echo '
';


        if($row == 'same' && $column == 'same') {
            $output[] = $alphabet[$letterPosition[0][0]][$letterPosition[0][1]];
            $output[] = $alphabet[$letterPosition[1][0]][$letterPosition[1][1]];
        } elseif($row == 'same' && $column == 'first') {
            $output[] = $alphabet[$letterPosition[0][0]][targetValue($letterPosition[0][1])];
            $output[] = $alphabet[$letterPosition[1][0]][targetValue($letterPosition[1][1])];
        } elseif($row == 'same' && $column == 'last') {
            $output[] = $alphabet[$letterPosition[0][0]][targetValue($letterPosition[0][1])];
            $output[] = $alphabet[$letterPosition[1][0]][targetValue($letterPosition[1][1])];
        } elseif($row == 'first' && $column == 'same') {
            $output[] = $alphabet[targetValue($letterPosition[0][0])][$letterPosition[0][1]];
            $output[] = $alphabet[targetValue($letterPosition[1][0])][$letterPosition[1][1]];
        } elseif($row == 'last' && $column == 'same') {
            $output[] = $alphabet[targetValue($letterPosition[0][0])][$letterPosition[0][1]];
            $output[] = $alphabet[targetValue($letterPosition[1][0])][$letterPosition[1][1]];
        } elseif(
            ($row == 'first' && $column == 'first') ||
            ($row == 'first' && $column == 'last') ||
            ($row == 'last' && $column == 'first') ||
            ($row == 'last' && $column == 'last')
        ) {
            // rectangle
            $output[] = $alphabet[$letterPosition[0][0]][$letterPosition[1][1]];
            $output[] = $alphabet[$letterPosition[1][0]][$letterPosition[0][1]];
        } else {
            $output[] = 7;
            $output[] = '.';
            $output[] = '.';
        }

        echo '
';
    }

    $outputTMP = '';
    $counter = 0;
    foreach($output AS $key => $value) {
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

    echo $outputTMP.'
'.strrev($outputTMP);


    function searchInMultiArray($character, $array) {
        foreach($array as $key1 => $val1) {
            foreach($val1 as $key2 => $val2) {
                if($val2 === $character) {
                    return array($key1, $key2);
                }
            }
        }
        return null;
    }

    function targetValue($valueIn, $method = 'substract') {
        if($method == 'add') {
            $valueOut = $valueIn+1;
        } elseif($method == 'substract') {
            $valueOut = $valueIn-1;
        } else {
            $valueOut = $valueIn;
        }

        if($valueOut < 0) {
            $valueOut = 4;
        } elseif($valueOut > 4) {
            $valueOut = 0;
        }

        return $valueOut;
    }

    ?>


<hr /><hr />
solution:
    the name of the employee that set me up an account on novell's 3com dialup terminal server

answer to the solution:
    Shawn Nunley
</pre>