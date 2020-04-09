<?php
require_once( dirname(__FILE__) . '/wp-load.php' );
require_once( dirname(__FILE__) . '/wp-admin/includes/admin.php');
switch($_POST[sTip]){
    case 1 : $tip="офис"; break;
    case 2 : $tip="квартира";break;
    case 4 : $tip="частный дом";break;
    case 3 : $tip="участок земли";break;
}
$post_data = array(
  'post_title'    => $_POST[iName],
  'post_content'  => '',
  'post_status'   => 'publish',
  'post_author'   => 1,
  'post_type' => 'nedvizhimost',
  'tax_input' => array( 'tip_nedvijimost' => $tip  )
  );

// Вставляем запись в базу данных
$post_id = wp_insert_post($post_data, true);
update_post_meta($post_id , 'город', $_POST[iGorod]); 
update_post_meta($post_id , 'адрес', $_POST[iAdres]);
update_post_meta($post_id , 'площадь', $_POST[iS]);
update_post_meta($post_id , 'жилая площадь', $_POST[iSLive]);
update_post_meta($post_id , 'стоимость', $_POST[iCost]);
update_post_meta($post_id , 'этаж', $_POST[iEtaj]);
