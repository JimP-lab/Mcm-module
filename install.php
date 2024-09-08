<?php
defined('BASEPATH') or exit('No direct script access allowed');
$CI = &get_instance();

// Creating the ads_MCMVendor database 
if (!$CI->db->table_exists(db_prefix() . 'ads_MCMVendor')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "ads_MCMVendor` (
        `id` INT AUTO_INCREMENT,
        `Date` DATETIME NOT NULL,
        `GoogleAdManagerID` VARCHAR(255) NOT NULL,
        `Name` VARCHAR(255) NOT NULL,
        `Email` VARCHAR(255) NOT NULL,
        `Website` VARCHAR(255) NOT NULL,
        Site_id   VARCHAR(255) NOT NULL,
        Partner_id  VARCHAR(255) NOT NULL,
        `Status` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
} 

// Creating the ads_MCMVerification database 
if (!$CI->db->table_exists(db_prefix() . 'ads_MCMVerification')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "ads_MCMVerification` (
        `MCMVendorID` INT(11) NOT NULL AUTO_INCREMENT,
        `DemandPartnerID` VARCHAR(255) NOT NULL,
        `Date` DATETIME NOT NULL,
        `Status` VARCHAR(50) NULL,
        PRIMARY KEY (`MCMVendorID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}

// Creating the ads_MCMSites database 
if (!$CI->db->table_exists(db_prefix() . 'ads_MCMSites')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "ads_MCMSites` (
        `Site_id` INT(11) NOT NULL AUTO_INCREMENT,
        `Site_name` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`Site_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}

// Creating the ads_MCMStatus database 
if (!$CI->db->table_exists(db_prefix() . 'ads_MCMStatus')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "ads_MCMStatus` (
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        `StatusName` VARCHAR(255) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}
?>
