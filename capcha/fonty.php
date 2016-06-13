<?php
$HEX='0123456789ABCDEF';
$R1=rand(0,4);$R2=$R1;
while($R2==$R1)$R2=rand(0,4);
$L[]='000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
$L[]='01110 11110 01110 11110 11111 11111 01111 10001 01110 11111 10001 10000 01110 01110 01110 11110 01110 11110 01111 11111 10001 10001 10001 10001 10001 11111 ';
if($R1==0||$R2==0)$L[]=$L[count($L)-1];
$L[]='10001 01001 10001 01001 10000 10000 10000 10001 00100 00100 10010 10000 10101 10001 10001 10001 10001 10001 10000 00100 10001 10001 10101 01010 10001 00010 ';
if($R1==1||$R2==1)$L[]=$L[count($L)-1];
$L[]='11111 01110 10000 01001 11110 11110 10111 11111 00100 00100 11100 10000 10101 10001 10001 11110 10001 11110 01110 00100 10001 01010 10101 00100 01110 00100 ';
if($R1==2||$R2==2)$L[]=$L[count($L)-1];
$L[]='10001 01001 10001 01001 10000 10000 10001 10001 00100 00100 10010 10000 10101 10001 10001 10000 10010 10100 00001 00100 10001 01010 10101 01010 00100 01000 ';
if($R1==3||$R2==3)$L[]=$L[count($L)-1];
$L[]='10001 11110 01110 11110 11111 10000 01110 10001 01110 11100 10001 11111 10001 10001 01110 10000 01101 10010 11110 00100 01110 00100 01110 10001 00100 11111 ';
if($R1==4||$R2==4)$L[]=$L[count($L)-1];
$L[]='000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000';
$CHAR_CHOICE=round(strlen($L[0])/6);
$MAX_CHARS=$_GET['n']; if($MAX_CHARS<2)$MAX_CHARS=4;
for($aa=0; $aa<$MAX_CHARS; $aa++) $WORD.=chr(rand(65,90));
if(strlen($_GET['c'])>2) $WORD=strtoupper($_GET['c']);
$W=str_split($WORD);$MAX_CHARS=count($W);
for($ii=0;$ii<$MAX_CHARS;$ii++)$W[$ii]=(ord($W[$ii])-65)%26;
//echo('<div>"c" ['.$_GET['c'].'] :: "n" ['.$_GET['n'].']</div>');
echo('<div>Word:'.$WORD.' Length:'.$MAX_CHARS.'</div>');

// Build a random column index to expand for each letter
for($ii=0;$ii<$MAX_CHARS;$ii++)$R3[]=rand(0,4);
$C1=substr($HEX,rand(5,15),1).'FF';
$C2=substr($HEX,rand(0,10),1);
$C2='0'.$C2.$C2;
if(rand(0,1)==0){ $ID1='CAPCHAX'; $ID2='CAPCHAY'; }
else            { $ID1='CAPCHAY'; $ID2='CAPCHAX'; }
//echo('R1['.$R1.'] R2['.$R2.'] C1['.$C1.'] C2['.$C2.'] ID1['.$ID1.' ID2['.$ID2.'] WORD['.$WORD.']');

echo('<style type="text/css">#CAPCHAX{background-color:#'.$C1.';line-height:8px;}');
echo('#CAPCHAY{background-color:#'.$C2.';line-height:8px;}</style>'.Chr(13).Chr(10));
echo('<table cellpadding="0" cellspacing="0" border="0"><tbody>'.Chr(13).Chr(10));
for($r=0; $r<(9); $r++) {
  echo('<tr><td id="'.$ID1.'">&nbsp;</td>'); // Leading space.
  for($aa=0; $aa<$MAX_CHARS; $aa++) {
    $R4=$R3[$aa];
    for($c=0; $c<6; $c++) {
      if(substr($L[$r],$W[$aa]*6+$c,1)=='1')
        echo('<td id="'.$ID2.'">&nbsp;</td>'); else echo('<td id="'.$ID1.'">&nbsp;</td>');
      if($c==$R4) // Repeat line for extra character distortion.
        if(substr($L[$r],$W[$aa]*6+$c,1)=='1')
          echo('<td id="'.$ID2.'">&nbsp;</td>'); else echo('<td id="'.$ID1.'">&nbsp;</td>');
  } } 
  echo('</tr>');
} 
echo('</tbody></table><span id="xxcapchaxx" style="display:none;">'.md5($WORD).'</span>'.Chr(13).Chr(10)); 
?>
