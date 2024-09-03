<?php
defined('BASEPATH') or exit('No direct script access allowed');
$CI = &get_instance();
// Create the `ads_MCMVendor` table if it doesn't exist
if (!$CI->db->table_exists(db_prefix() . 'ads_MCMVendor')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "ads_MCMVendor` (
        `id` INT AUTO_INCREMENT,
        `Date` DATETIME NOT NULL,
        `GoogleAdManagerID` VARCHAR(255) NOT NULL,
        `Name` VARCHAR(255) NOT NULL,
        `Email` VARCHAR(255) NOT NULL,
        `Website` VARCHAR(255) NOT NULL,
        `status` VARCHAR(50) IS NULL,
        `DemandPartners` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
} 
// Table for verification 
if (!$CI->db->table_exists(db_prefix() . 'ads_MCMVerification')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "ads_MCMVerification` (
        `MCMVendorID` INT(11) NOT NULL AUTO_INCREMENT,
        `DemandPartnerID` VARCHAR(255) NOT NULL,
        `Date` DATETIME NOT NULL,
        `Status` VARCHAR(50) NULL,
        PRIMARY KEY (`MCMVendorID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}

// Table for sites
if (!$CI->db->table_exists(db_prefix() . 'ads_MCMSites')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "ads_MCMSites` (
        `site_id` INT(11) NOT NULL AUTO_INCREMENT,
        `site_name` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`site_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}

// Table for status
if (!$CI->db->table_exists(db_prefix() . 'ads_MCMStatus')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "ads_MCMStatus` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `StatusName` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}
?>
