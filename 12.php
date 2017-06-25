<pre><?php
/*
  rail fence cipher
  --> 'zig-zag' between the letters of all words

  see 09.php for example

  https://en.wikipedia.org/wiki/Rail_fence_cipher
 */
$orig = 'idniidhsubrseognteiuignuhrzdalrd ietfetinmeablnigorcsnuatoieclei';
$noSpaces = str_replace(' ', '', $orig);
$wordArray = explode(' ', $orig);

$numberOfWords = count($wordArray);

$currentPositionInWord = array();
for($i=0; $i<$numberOfWords; $i++) {
  $currentPositionInWord[$i] = 0;
}

$takeFromWord = 0;
$countDirection = 'up';

for($j=0; $j<strlen($noSpaces); $j++) {
  echo $wordArray[$takeFromWord][$currentPositionInWord[$takeFromWord]];
  $currentPositionInWord[$takeFromWord] ++;

  if($takeFromWord == ($numberOfWords-1)) {
    $countDirection = 'down';
  } elseif($takeFromWord == 0) {
    $countDirection = 'up';
  }

  if($countDirection == 'up') {
    $takeFromWord ++;
  } else {
    $takeFromWord --;
  }
}

?></pre>
