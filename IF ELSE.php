<?php

$light = 'green';

if ($light == 'red') {
	echo "STOP";
}elseif ($light == 'yellow') {
	echo "GET READY";
}elseif ($light == 'green') {
	echo "GO";
}else{
	echo "TRAFIC LIGHT IS BROKEN";
}

#            IF             YES     NO
echo ($light == 'green') ? "GO" : "STOP";  #Теранарный оператор (для одной инструкции)