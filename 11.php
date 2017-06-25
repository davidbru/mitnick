<pre><?php
    /*
      playfair cipher
      --> shift letters according to the rules in the predefined alphabet table
      --> the letter 'j' was ommitted in the alphabet table
      https://en.wikipedia.org/wiki/Playfair_cipher
     */
    $alphabet = array(
        array('a','b','c','d','e'),
        array('f','g','h','i','k'),
        array('l','m','n','o','p'),
        array('q','r','s','t','u'),
        array('v','w','x','y','z')
    );

    $orig = 'ow gw ty kc qb eb nm ht ud pc iy ty ik tu zo dp gl qt hd';
    $wordArray = explode(' ', $orig);
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
            $output[] = 1;
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

    echo implode(' ', $output);


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

    ?></pre>
