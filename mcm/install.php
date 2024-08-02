<?php
defined('BASEPATH') or exit('No direct script access allowed');

$CI = &get_instance();
if (!$CI->db->table_exists(db_prefix() . 'MCM_Verification')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "MCM_Verification` (
      `ID` int(11) NOT NULL AUTO_INCREMENT,
      `MCMVendorID` varchar(255) NOT NULL,
      `DemandPartnerID` varchar(255) NOT NULL,
      `Status` varchar(255) NOT NULL,
      `CreatedAt` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}
?>
