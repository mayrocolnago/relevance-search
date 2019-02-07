# Performs a relevance search that match the closest item on an array

PHP configurable percentage and the "not found" result version with examples.

```
function closestof($needle,$haystack) {
  //criteria
  $percentage = 50; //match how much in %
  $strnotfound = "None";

  $hist = array();
  $a1 = explode(' ',str_replace('-',' ',strtolower($needle)));
  foreach($haystack as $l) {
    $points = 0;
    $a2 = explode(' ',str_replace('-',' ',$l));
    foreach($a2 as $a) if(in_array(strtolower($a),$a1)) 
    if(strlen($a) > 1) $points++;
    array_push($hist,array($l,$points));
  } $choose = array($strnotfound,-1);
  foreach($hist as $h) 
    if($h[1] > ((int) ((count($a1)+count(explode(' ',$h[0])))/2) * $percentage / 100))
      if($h[1] > $choose[1]) $choose = $h;
  return $choose[0];
}
```


Looking for the JavaScript + Jquery version? <a href="https://github.com/mayrocolnago/relevancesearch-js">click here</a>.
