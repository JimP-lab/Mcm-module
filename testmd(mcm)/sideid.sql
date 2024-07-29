CREATE TABLE tblads_Sites (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    SiteName VARCHAR(255) NOT NULL
);

-- Προσθήκη νέας στήλης siteid στον πίνακα tblads_MCMVendor
ALTER TABLE tblads_MCMVendor ADD COLUMN SiteID INT;

-- Μεταφορά των δεδομένων από το sitename στο siteid
-- (Αυτό το βήμα απαιτεί περαιτέρω SQL script για τη μεταφορά των δεδομένων)
database edit for improvement 
add this command after add db

ALTER TABLE tblads_MCMVerification ADD CONSTRAINT unique_verification UNIQUE (MCMVendorID, DemandPartnerID);