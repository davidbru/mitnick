<pre><?php
    /*
      step 1 - rotary dial cipher *JUST A GUESS*
      --> 0 translates to 'q' and 'z'
      https://en.wikipedia.org/wiki/Rotary_dial#/media/File:Rotarydial.JPG

      step 2 - ?
     */

    $alphabet1 = array(
        0 => array('q', '.', 'z'),
        2 => array('a', 'b', 'c'),
        3 => array('d', 'e', 'f'),
        4 => array('g', 'h', 'i'),
        5 => array('j', 'k', 'l'),
        6 => array('m', 'n', 'o'),
        7 => array('p', 'r', 's'),
        8 => array('t', 'u', 'v'),
        9 => array('w', 'x', 'y'),
    );

    $orig = '0\6\2/7\4/2\4\8\2|8|6|7\0\4\3/2|8/7/3\2/2/5|6/4|8\7\6\6\3\2|3/3\7/4|6/0/3|7/0\6|8|9/4\4/6/5/3|5|0\8\9\7/4|4/4|8|5/3/3|5|8|4/0\5|8/2/';

    $step1 = array();
    for($i=0; $i<strlen($orig); $i+=2) {
        if($orig[$i+1] == '\\') {
            $tmp = 0;
        } elseif($orig[$i+1] == '|') {
            $tmp = 1;
        } elseif($orig[$i+1] == '/') {
            $tmp = 2;
        }
        $step1[] = array(
            $orig[$i].$orig[$i+1],
            $alphabet1[$orig[$i]][$tmp]
        );
    }



    echo 'step 1 - rotary dial cipher:
';
    foreach($step1 as $value) {
        echo strtoupper($value[0]).' ';
    }
    echo '
';
    foreach($step1 as $value) {
        echo strtoupper($value[1]).'  ';
    }

    ?></pre>