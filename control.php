<?php
include('./daerah.db.php');
function get_propinsi(){
	global $daerah;
	$propinsi = array();
	if(is_array($daerah)){
	foreach($daerah as $prop=>$kota){
	$propinsi[]=$prop; //Array berisi nama propinsi
	}
	}
	$html = '';
	$html.='<select name="sel_propinsi" id="sel_propinsi" onchange="show_kota(this.value);">'."\n";
	$html.='<option value="0" selected="selected">-- Pilih provinsi tujuan pengiriman --</option>'."\n";
	foreach($propinsi as $prop){
	$html.='<option value="'.$prop.'">'.$prop.'</option>'."\n";
	}
	$html.='</select><small class="wpe-credit"><a href="http://balitechy.com" target="_blank" title="Indonesian shipping plugin by Balitechy.com">WPE Indoshipping</a></small>';
	return $html;
}


if(isset($_POST['action'])){
	switch($_POST['action']){
		case 'get_propinsi':
		echo get_propinsi();
		break;
	}
}
?>
