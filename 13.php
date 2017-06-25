<pre><?php
/*
  caesar cipher – key 2 - reverse string first
  --> shift letters in alphabet by key
  https://en.wikipedia.org/wiki/Caesar_cipher
 */

$alphabet = 'abcdefghijklmnopqrstuvwxyz';

$orig = 'qclgjq\'acrjcrlmqnyrcpgursmzyddmbcnngrgmfupceylyk';
$step1 = strtolower(strrev($orig));

for($i=0; $i<strlen($alphabet); $i++) {
  $output = $i.': ';
  for($j=0; $j<strlen($step1); $j++) {
    if(strpos($alphabet, $step1[$j]) !== FALSE) {
      $targetPos = strpos($alphabet, $step1[$j]) + $i;

      if($targetPos>=strlen($alphabet)) {
        $targetPos = $targetPos - strlen($alphabet);
      }
      $output .= $alphabet[$targetPos];
    } else {
      $output .= $step1[$j];
    }
  }
  echo $output;
  echo '<hr />';
}
?></pre>
