<?php
/*
 Plugin Name: WPE Indoshipping
 Plugin URI: http://balitechy.com/wp-plugins/wp-ecommerce-indoshipping/
 Description: Indonesian typical Shipping Module For WP E-Commerce
 Version: 1.2.0
 Author: Putu Eka Putra
 Author URI: http://balitechy.com/
*/

/*
 This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, version 2.

 This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 */
wp_enqueue_style('indoshipping_css',plugin_dir_url(__FILE__).'indoshipping.css');
wp_enqueue_script('indoshipping_js',plugin_dir_url(__FILE__).'indoshipping.js',array('jquery'));
wp_localize_script('indoshipping_js','indoshipping',array('ajaxurl'=>admin_url('admin-ajax.php'),'pluginurl'=>plugin_dir_url(__FILE__)));

class wpe_indoshipping {

	var $internal_name;
	var $name;
	var $is_external;

	function wpe_indoshipping () {

		$this->internal_name = "wpe_indoshipping";

		$wpe_shippingname = get_option('wpe_shippingname');

		if(!$wpe_shippingname){
		    $this->name = 'WPE Indoshipping';
		    }else{
		    $this->name = $wpe_shippingname;
            }

		$this->is_external = true;

		return true;
	}

	function getName() {
		return $this->name;
	}

	function getInternalName() {
		return $this->internal_name;
	}

	function getForm() {

		$wpe_shippingname = get_option('wpe_shippingname');

		$output .= '<tr>';
		$output .= '	<td>';
		$output .= '		Shipping Name:<br/>';
		$output .= '		<input type="text" name="wpe_indoshipping_name" value="'.$wpe_shippingname.'"><input type="hidden" name="indoshipping" value="1"/><br/>';
		$output .= '	</td>';
		$output .= '</tr>';

		return $output;
	}

	function submit_form() {

		if($_POST['indoshipping'] == 1) {
			$shipping_name = $_POST['wpe_indoshipping_name'];
			update_option('wpe_shippingname',$shipping_name);
		}

		return true;
	}

	function get_item_shipping(&$cart_item) {
	}

	function getQuote() {

		if (isset($_POST['country'])) {
			$country = $_POST['country'];
			$_SESSION['wpsc_delivery_country'] = $country;
		} else {
			$country = $_SESSION['wpsc_delivery_country'];
		}

		if($country == 'ID'):
		    $weight_in_pound = wpsc_cart_weight_total();
		    $weight_in_kgs_float = (float)$weight_in_pound / 2.205;
		    $weight_in_kgs_round = round((float)$weight_in_pound / 2.205);
		    if($weight_in_kgs_round < $weight_in_kgs_float){
		        $weight_in_kgs = $weight_in_kgs_round + 1;
		        }else{
		        $weight_in_kgs = $weight_in_kgs_round;
		        }
        return $this->load_all_kota($weight_in_kgs);
        else:
        return array($this->name.'Shipping for only in Indonesia'=>0);
        endif;
	}

    function load_all_kota($weight){
        include 'daerah.db.php';
        $listkota = array();
        foreach($daerah as $prov=>$kotas){
                foreach($kotas as $kota=>$ongkir){
                    $listkota[$prov.' &raquo; <strong>'.$kota.'</strong> ('.$weight.' Kg)'] = $ongkir*$weight;
                    }
            }
        return $listkota;
    }
}

$wpe_indoshipping = new wpe_indoshipping();
$wpsc_shipping_modules[$wpe_indoshipping->getInternalName()] = $wpe_indoshipping;
?>
