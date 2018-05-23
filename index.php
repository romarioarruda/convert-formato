<?php

if(!isset($argv[1])) {
	exit("\n\n\nphp index.php formatoAtual formatoNovo prefixo \n\n Prefixo ´e opcional\n\n");
}

$formatoAtual = $argv[1];

$formatoNovo = $argv[2];

if(isset($argv[3])){
	$prefixo = $argv[3];
}
else{
	$prefixo = "";
}

$arquivos = glob("{*.png,*.jpg,*.jpeg,*.gif,*.pdf}", GLOB_BRACE);
foreach($arquivos as $img){
	$nome = str_replace(".{$formatoAtual}", "", $img);
	// $convert = "convert -quality 100 -density 300 ".$img." convertidas/".$prefixo.$nome.".{$formatoNovo}";
	 $convert = "convert ".$img." ".$prefixo.$nome.".{$formatoNovo}";
	// $convert='pngtopnm  -background "#FFFFFF" -mix  "'.$img.'" | pnmtojpeg > "convertidas/'.$prefixo.$nome.'.'.$formatoNovo.'"';
	`$convert`;
	echo $img." => ".$prefixo.$nome.".".$formatoNovo."\n";
}

?>
