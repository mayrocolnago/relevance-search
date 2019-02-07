<?php

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



$name = 'hotpoint wifi';

$list = array("HOTPOINT WIFI ROUTER","TP Link Wifi Dual Band Ac1350 Archer C60","hAP lite TC","MIKROTIK RB HEX LITE 850MHZ 64MB","TP-LINK ROUTER TL-WR840N","TP-LINK ROUTER TL-WR940N(BR) 450MBPS","UBIQUITI SWITCH US-24-BR 24P RJ45 + 2P SFP 1.25GB UNIFI");



echo '<b>Searching for:</b> '.$name;

echo '<br><br><b>Found:</b> '.closestof($name,$list);

echo '<br><br><b>List:</b><br><br>';

echo implode('<br><br>',$list);

?>
