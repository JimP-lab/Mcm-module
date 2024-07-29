CREATE TABLE tblads_MCMVerification (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    MCMVendorID INT,
    DemandPartnerID INT,
    Date DATE,
    Status INT,
    FOREIGN KEY (MCMVendorID) REFERENCES tblads_MCMVendor(ID)
);

CREATE TABLE tblads_MCMStatus (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    StatusName VARCHAR(255) NOT NULL
);
