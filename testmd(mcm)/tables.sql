LOAD DATA INFILE 'path_to_your_file.csv'
INTO TABLE tblads_MCMVendor
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(VendorName, Domain);
this important to xamp after cv file was edited properly 