<pre><?php
    /*
      step 1 - rotary dial cipher
      --> 0 translates to 'q' and 'z'
      https://en.wikipedia.org/wiki/Rotary_dial#/media/File:Rotarydial.JPG

      step 2 - vigenère cipher
      --> use keyword 'heinz'
      https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher
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

    $orig = '7\3|2\9|3\5|4/0/8/2|6\7/0/4\4\5/6/6\5/7/8/9|7\8/7|9\5/9\2\3\5\7/8|2/0/8|2/6|6|2|7\7\0\4\9|';

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




    echo '

step 2 - vigenère cipher
';
    $alphabet2 = 'abcdefghijklmnopqrstuvwxyz';

    $keyword = 'heinz';

    for($i=0; $i<count($step1); $i++) {
        $targetPos = strpos($alphabet2, $step1[$i][1]) - strpos($alphabet2, $keyword[($i%5)]);

        if($targetPos>=strlen($alphabet2)) {
            $targetPos = $targetPos - strlen($alphabet2);
        } elseif($targetPos<0) {
            $targetPos = $targetPos + strlen($alphabet2);
        }
        $output .= $alphabet2[$targetPos];
    }

    echo $output;

    ?></pre>
