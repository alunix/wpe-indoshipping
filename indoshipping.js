/*
 * Main JS file for WPE Indoshipping
 * jQuery required
 * author : Putu Eka Putra - Balitechy.com
 */
jQuery(document).ready(function($){
    $('td.wpsc_shipping_quote_name').parent().hide();
    $(".shipping_header").append('<div class="prov prov-label"></div>');
    $(".prov").load(indoshipping.pluginurl+'control.php',{'action':'get_propinsi'});

});

function show_kota(propinsi){
       var filter = propinsi;
       jQuery('.wpsc_shipping_quote_name').each(function(){
            if(jQuery(this).find('label').text().search(new RegExp(filter,'i')) < 0){
                  jQuery(this).parent().hide();
                }else{
                  jQuery(this).parent().show();
                }
        });
}

