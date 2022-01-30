<?php
echo("<h1>Reports </h1>");
var_dump($_GET['id']);
if (isset($_GET['id'])){
//execute .R file sample
exec('Rscript r_file/report_'.$_GET['id'].'.R 1430-01-01 1450-01-01', $output, $return_var);

var_dump( $output);
var_dump( $return_var);

if($return_var !== 0){ 
// exec is successful only if the $return_var was set to 0. !== means equal and identical, that is it is an integer and it also is zero.
    echo "Rscript was not executed";
}
else{
    
	echo "Rscript Executed Successfully<br/>";
	echo "<a href='r_json/report_".$_GET['id'].".html' target='_blank' >HTML link</a><br/>";
	echo "<a href='r_json/report_".$_GET['id'].".xlsx' target='_blank' >Excel link</a><br/>";
}
}else{
	echo "No ID.";
}

?>