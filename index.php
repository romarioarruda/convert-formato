<?php

if(!isset($argv[1])) {
	exit("\n\n\nphp index.php formatoAtual formatoNovo prefixo \n\n Prefixo ´e opcional\n\n");
}

$formatoAtual = $argv[1];

$formatoNovo = $argv[2];

$prefixo = "";

if(isset($argv[3])){
	$prefixo = $argv[3];
}

$arquivos = glob("{*.png,*.jpg,*.jpeg,*.gif,*.pdf}", GLOB_BRACE);
foreach($arquivos as $img){
	$nome = str_replace(".{$formatoAtual}", "", $img);
	
	exec("convert $img $prefixo.$nome.".".{$formatoNovo}");

	echo $img." => ". $prefixo.$nome.".".$formatoNovo \n";
}

