# Performs a relevance search that match the closest item on an array

Configurable percentage and the "not found" result version with examples.


JavaScript + JQuery version
-

```javascript
function closestof(needle,haystack) {
  //criteria 
  var percentage = 50;
  var strnotfound = "None";

  if(haystack.length < 1) return;
  function inArray(ne, ha) { var length = ha.length;
    for(var i = 0; i < length; i++) 
      if(ha[i].toLowerCase() == ne.toLowerCase()) return true;
    return false; }
  var hist = []; var points = 0; var a2 = null;
  var a1 = needle.replace('-',' ').split(' ');
  $(haystack).each(function(x1,l){
    points = 0;
    a2 = l.replace('-',' ').split(' ');
    $(a2).each(function(x2,a){
      if(inArray(a,a1)) if(a.length > 1) points++; });
    hist.push([l,points]);
  }); var choose = [strnotfound,-1];
  $(hist).each(function(x3,h){
    if(h[1] > parseInt( ((a1.length + h[0].split(' ').length) / 2) * percentage / 100 ))
      if(h[1] > choose[1]) choose = h;
  }); return choose[0];
}
```


PHP version
-

```php
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
