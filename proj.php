<?php
echo("<h1>Proj </h1>");
var_dump($_GET['id']);
if (isset($_GET['id'])){
//execute .R file sample
exec('Rscript r_file/proj_'.$_GET['id'].'.R', $output, $return_var);

var_dump( $output);
var_dump( $return_var);

if($return_var !== 0){ 
// exec is successful only if the $return_var was set to 0. !== means equal and identical, that is it is an integer and it also is zero.
    echo "Rscript was not executed";
}
else{
    
	echo "Rscript Executed Successfully<br/>";
	echo "<a href='r_json/proj_".$_GET['id'].".json' target='_blank' >json link</a>";
}
}else{
	echo "No ID.";
}

?>