<pre><?php
    /*
      substitution cipher
      use answer of question 6 --> 'GTE'
      https://en.wikipedia.org/wiki/Substitution_cipher
     */
    $alphabet1 = 'gteabcdfhijklmnopqrsuvwxyz';
    $alphabet2 = 'abcdefghijklmnopqrstuvwxyz';

    $orig = 'multbqncannqenabrhfgacnqogehchetbkkebmsqgkncchebr';

    $output = '';
    for($i=0; $i<strlen($orig); $i++) {
        $output .= $alphabet2[strpos($alphabet1, $orig[$i])];
    }
    echo $output;
    ?></pre>
