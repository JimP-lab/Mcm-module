<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel_s">
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12">
                <h4 class="page-title">MCM Vendors</h4>
              </div> 
            </div>
              
            <!-- PAGE CONTENT HERE -------------------------->
            <div class="row mtop10">
              <div class="col-xs-12">
                <button id="import-mcm-btn" class="btn">Import</button>
                <button id="show-mcm-btn" class="btn">Show</button>
              </div>
            </div>
            
            <!-- Vendors Table Container -->
            <div id="vendors-table-container" class="row mtop10" style="display: none;">
              <div class="col-xs-12">
                <table id="vendors-data-datatable" class="table table-striped table-bordered" width="100%"></table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php init_tail(); ?>

<!-- MODALS -------------------------->

<!-- Import Vendors Modal -->
<div class="modal fade" id="import-mcm-vendors-modal" tabindex="-1" role="dialog" aria-labelledby="cleon-modal-title" aria-hidden="true" style="z-index: 100001;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Import MCM Vendors</h4>
      </div>
      <div  class="modal-body" style="overflow: scroll;word-wrap: break-word;">
        <div class="row">
          <div class="col-xs-12 text-center">
            <div class="cleon-dropzone">
              <span>Click or Drop your File</span>
            </div> 
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Vendor Modal -->  
<div class="modal fade" id="edit-vendor-modal" tabindex="-1" role="dialog" aria-labelledby="edit-vendor-modal-title" style="z-index: 100001;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="edit-vendor-modal-title">Edit Information</h4>
      </div>
      <div class="modal-body">
        <form id="edit-vendor-form">
          <input type="hidden" id="id" name="id">

          <label for="Date" class="form-label required">Date</label>
          <input type="text" id="Date" name="Date" class="form-control required-field">
          
          <label for="GoogleAdManagerID" class="form-label required">GoogleAdManagerID</label>
          <input type="text" id="GoogleAdManagerID" name="GoogleAdManagerID" class="form-control required-field">

          <label for="Name" class="form-label required">Name</label>
          <input type="text" id="Name" name="Name" class="form-control required-field">

          <label for="Email" class="form-label required">Email</label>
          <input type="text" id="Email" name="Email" class="form-control required-field">

          <label for="Website" class="form-label required">Website</label>
          <input type="text" id="Website" name="Website" class="form-control required-field url-type">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="edit-vendor-form" class="btn btn-primary" id="save-btn" style="margin-top: 15px;">Save</button>  
      </div>
    </div>
  </div>
</div>

<!-- Delete Vendor Modal -->
<div class="modal fade" id="delete-vendor-modal" tabindex="-1" role="dialog" aria-labelledby="delete-vendor-modal-title" style="z-index: 100001;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="delete-vendor-modal-title">Delete Vendor</h4>
      </div>
      <div class="modal-body">
        <p id="delete-vendor-message">Do you want to delete this vendor?</p>
        <input type="hidden" id="delete-vendor-id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm-delete-vendor">Delete</button>
      </div>
    </div>
  </div>
</div>


<!-- Site Selection Modal -->
<div class="modal fade" id="Website-modal" tabindex="-1" role="dialog" aria-labelledby="Website-modal-title" aria-hidden="true" style="z-index: 100001;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="Website-modal-title">Select Website</h4>
      </div>
      <div class="modal-body">
        <form id="Website-form">
          <input type="hidden" id="id" name="id">
          <input type="hidden" id="selected-site" name="site">
          <label for="Website" class="form-label required">Website</label>
          <ul id="website-list" class="list-group">
            <!-- Websites will be appended here -->
          </ul>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="Website-btn" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit-ads-txt-modal" tabindex="-1" aria-labelledby="editAdsTxtModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editAdsTxtModalLabel">Insert entries for Ads.txt</h1>
            </div>
            <div class="modal-body">
                <div id="edit-unique-Ads-txt-form" class="cleon-form">
                    <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>"> </input>
                    <input type="hidden" name="siteID" id="site-id" value=""> </input>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="separator-with-name">
                                <hr />
                                <span class="separator-name required">Unique Settings</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea id="uniqueSettings" class="required-field full-width" name="uniqueSettings" class="full-width" rows="30"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="separator-with-name">
                                <hr />
                                <span class="separator-name">Global Settings</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea id="globalSettings" name="globalSettings" class="full-width" rows="30" readonly></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="save_unique_ads_txt_btn" name="save_ads_txt" class="btn btn-primary">Save</button>
                    <button type="button" id="get_ads_txt" name="get_ads_txt" class="btn btn-primary">Get Ads.TXT</button>
                    <button type="button" id="close_ads_txt_modal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DemandPartners Modal -->
<div class="modal fade" id="DemandPartners-modal" tabindex="-1" role="dialog" aria-labelledby="DemandPartners-modal-title" aria-hidden="true" style="z-index: 100001;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="DemandPartners-modal-title">Update DemandPartners</h4>
            </div>
            <div class="modal-body">
                <form id="DemandPartners-form">
                    <input type="hidden" id="id" name="id">
                    <label for="DemandPartners" class="form-label required">DemandPartners</label>
                    <select class="form-control" id="DemandPartners" name="DemandPartners">
                        <option value="">Select DemandPartners</option>
                        <option value="Adform">Adform</option>
                        <option value="Google">Google</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="DemandPartners-save-btn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Status Selection Modal -->
<div class="modal fade" id="status-modal" tabindex="-1" role="dialog" aria-labelledby="status-modal-title" aria-hidden="true" style="z-index: 100001;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="status-modal-title">Update Status</h4>
            </div>
            <div class="modal-body">
                <form id="status-form">
                    <input type="hidden" id="status-id" name="id">
                    <label for="status" class="form-label required">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">Select Status</option>
                        <option value="approved">Approved</option>
                        <option value="pending">Pending</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="status-save-btn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    // Show Import Modal
    $('#import-mcm-btn').on('click', function() {
        $('#import-mcm-vendors-modal').modal('show');
        /** 1. Drop and read CSV */

        const dropzone = new Dropzone("div.cleon-dropzone", {
            url: file => {
                return false;
            },
            autoProcessQueue: false,
            previewTemplate: '<div style="display:none"></div>',
            acceptedFiles: '.csv'
        });

        // Accepted Files
        dropzone.on("addedfile", file => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const text = e.target.result;
                let data = convertCSVForAPI(text);
                sendMCMVendorsCSVToController(data);
            };
            reader.readAsText(file);
        });

        function convertCSVForAPI(text) {
            let data = [];
            let lines = text.split('\n');
            lines.splice(0, 2);
            for (let i = 0; i < lines.length; i += 1) {
                const lineArr = lines[i].split(',');
                let obj = {};
                if (lineArr[0]) {
                    for (let j = 0; j < lineArr.length; j += 1) {
                        lineArr[j] = lineArr[j].replace(/"/g, '');
                        lineArr[j] = lineArr[j].trim();
                        console.log(lineArr[j]);
                    }
                    data.push(lineArr);
                }
            }
            return data;
        }

        let indexToPropName = {
            0: 'Date',
        }

        function sendMCMVendorsCSVToController(data) {
            const controllerMethod = 'import_mcm_vendors';

            $.ajax({
                url: `${admin_url}mcm/${controllerMethod}`,
                type: 'POST',
                dataType: 'json',
                data: { data: data },
                success: function(result) {
                    console.log(result);
                }
            });
        }
    });
     // Show Vendors List Table
     $('#show-mcm-btn').on('click', function() {
        const directEndpoint = `${admin_url}mcm/get_mcm_vendors`;
        let directColumns = [
            {
                title: 'Date',
                searchable: true,
                data: 'Date'
            },
            {
                title: 'GoogleAdManagerID',
                searchable: true,
                data: 'GoogleAdManagerID'
            },
            {
                title: 'Name',
                searchable: false,
                data: 'Name',
            },
            {
                title: 'Email',
                searchable: false,
                data: 'Email',
            },
            {
                title: 'Website',
                searchable: false,
                data: 'Website',
            },
            {
                title: 'Actions',
                searchable: false,
                data: null,
                render: function(data, type, row) {
                    return `
                        <button class="btn btn-sm btn-primary edit-vendor-btn" 
                            data-id="${row.id}" 
                            data-name="${row.Name}" 
                            data-email="${row.Email}" 
                            data-website="${row.Website}"
                            data-googleadmanagerid="${row.GoogleAdManagerID}"
                            data-date="${row.Date}">Edit</button>
                        <button class="btn btn-sm btn-danger delete-vendor-btn" 
                            data-id="${row.id}" 
                            data-name="${row.Name}">Delete</button>
                        <button class="btn btn-sm btn-warning Website-btn" 
                         data-id="${row.id}">Website</button>
                        <button class="btn btn-sm btn-warning DemandPartners-btn" 
                         data-id="${row.id}">DemandPartners</button>
                        <button class="btn btn-sm btn-warning status-btn" 
                            data-id="${row.id}">Status</button>
                    `;
                }
            }
        ];

        // Initialize or refresh the datatable
        if (!$.fn.DataTable.isDataTable('#vendors-data-datatable')) {
            giveDatatable(directEndpoint, directColumns, () => {}, {
                serverSide: true,
                pageLength: 5,
                searching: true,
                ordering: true,
            }, '#vendors-data-datatable');
        } else {
            $('#vendors-data-datatable').DataTable().ajax.reload();
        }

        // Toggle table visibility
        $('#vendors-table-container').toggle();
    });

    $(document).ready(function() {
    // Handle edit button click
    $(document).on('click', '.edit-vendor-btn', function() {
        var id = $(this).data('id'); // Get the ID from the data attribute
    
    $('#id').val(id); // Set the ID in the hidden input field
    
    $.ajax({
        url: `${admin_url}mcm/getData/${id}`, // Adjust URL as needed
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                alert(response.error);
            } else {
                // Populate the form with the retrieved data
                var dbVendorData = response; // Get data from the server
                var localVendorData = localStorage.getItem('VendorData_' + id); // Get data from localStorage
                var vendorDataToSet = localVendorData ? JSON.parse(localVendorData) : dbVendorData; // Use localStorage data if available

                // Populate the form fields
                $('#Date').val(vendorDataToSet.Date);
                $('#GoogleAdManagerID').val(vendorDataToSet.GoogleAdManagerID);
                $('#Name').val(vendorDataToSet.Name);
                $('#Email').val(vendorDataToSet.Email);
                $('#Website').val(vendorDataToSet.Website);

                // Show the modal
                $('#edit-vendor-modal').modal('show');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.log('Server Response:', xhr.responseText);

            // Display error message
            alert('An error occurred while retrieving the data. Please try again.');
            }
        });
    });

    // Handle form submission
    $('#edit-vendor-form').on('submit', function(e) {
    e.preventDefault(); // Prevent default form submission

    var Id = $('#id').val();
    var Date = $('#Date').val();
    var GoogleAdManagerID = $('#GoogleAdManagerID').val();
    var Name = $('#Name').val();
    var Email = $('#Email').val();
    var Website = $('#Website').val();

    // Validate form fields if necessary
    if (Name === '' || Email === '' || Website === '') {
        alert('Please fill in all required fields.');
        return;
    }

        // Send AJAX request to update the record
        $.ajax({
        url: `${admin_url}mcm/update`, // Adjust URL as needed
        type: 'POST',
        data: {
            id: Id,
            Date: Date,
            GoogleAdManagerID: GoogleAdManagerID,
            Name: Name,
            Email: Email,
            Website: Website
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Save the updated data to localStorage
                var updatedVendorData = {
                    Date: Date,
                    GoogleAdManagerID: GoogleAdManagerID,
                    Name: Name,
                    Email: Email,
                    Website: Website
                };
                localStorage.setItem('VendorData_' + Id, JSON.stringify(updatedVendorData));

                // Display success message
                alert('Information updated successfully.');

                // Hide the modal
                $('#edit-vendor-modal').modal('hide');

                // Optionally reload the DataTable or update the UI
                $('#vendors-data-datatable').DataTable().ajax.reload();
            } else {
                // Display error message
                alert('Error: ' + (response.message || 'Failed to update information.'));
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.log('Server Response:', xhr.responseText);

            // Display error message
            alert('An error occurred while updating information. Please try again.');
            }
        });
    });
});


    // Show delete modal
    $(document).on('click', '.delete-vendor-btn', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('#delete-vendor-message').text(`Do you want to delete vendor ${name}?`);
        $('#delete-vendor-modal #delete-vendor-id').val(id);
        $('#delete-vendor-modal').modal('show');
    });

    $('#confirm-delete-vendor').on('click', function() {
        var id = $('#delete-vendor-modal #delete-vendor-id').val();
        $.ajax({
            url: `${admin_url}mcm/delete/${id}`,
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    alert('Vendor deleted successfully.');
                    $('#delete-vendor-modal').modal('hide');
                    $('#vendors-data-datatable').DataTable().ajax.reload();
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Show DemandPartners Modal
    $(document).on('click', '.DemandPartners-btn', function() {
        var Id = $(this).data('id');
        $('#id').val(Id);
        $.ajax({
            url: `${admin_url}mcm/get_demand`,
            type: 'POST',
            data: { id: Id },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    var dbDemandPartners = response.DemandPartners;
                    var localDemandPartners = localStorage.getItem('DemandPartners_' + Id);
                    var DemandPartnersToSet = localDemandPartners || dbDemandPartners;
                    $('#DemandPartners').val(DemandPartnersToSet);
                    $('#DemandPartners-modal').modal('show');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#DemandPartners-save-btn').on('click', function() {
        var Id = $('#id').val();
        var DemandPartners = $('#DemandPartners').val();
        if (DemandPartners === '') {
            alert('Please select a DemandPartner.');
            return;
        }
        $.ajax({
            url: `${admin_url}mcm/update_partners`,
            type: 'POST',
            data: { id: Id, DemandPartners: DemandPartners },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    localStorage.setItem('DemandPartners_' + Id, DemandPartners);
                    alert('DemandPartners updated successfully.');
                    $('#DemandPartners-modal').modal('hide');
                    $('#vendors-data-datatable').DataTable().ajax.reload();
                } else {
                    alert('Error: ' + (response.message || 'Failed to update DemandPartners.'));
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                console.log('Server Response:', xhr.responseText);
                alert('An error occurred while updating DemandPartners. Please try again.');
            }
        });
    });

    // Show Status Modal
    $(document).on('click', '.status-btn', function() {
        var Id = $(this).data('id');
        $('#status-id').val(Id);
        $.ajax({
            url: `${admin_url}mcm/get_status`,
            type: 'POST',
            data: { id: Id },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    var dbStatus = response.status;
                    var localStatus = localStorage.getItem('status_' + Id);
                    var statusToSet = localStatus || dbStatus;
                    $('#status').val(statusToSet);
                    $('#status-modal').modal('show');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    $('#status-save-btn').on('click', function() {
        var Id = $('#status-id').val();
        var status = $('#status').val();
        if (status === '') {
            alert('Please select a status.');
            return;
        }
        $.ajax({
            url: `${admin_url}mcm/update_status`,
            type: 'POST',
            data: { id: Id, status: status },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    localStorage.setItem('status_' + Id, status);
                    alert('Status updated successfully.');
                    $('#status-modal').modal('hide');
                    $('#vendors-data-datatable').DataTable().ajax.reload();
                } else {
                    alert('Error: ' + (response.message || 'Failed to update status.'));
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                console.log('Server Response:', xhr.responseText);
                alert('An error occurred while updating status. Please try again.');
            }
        });
    });
});
// Show Website Modal
$(document).on('click', '.Website-btn', function() {
    var Id = $(this).data('id');
    $('#id').val(Id);

    // Fetch websites from the database
    $.ajax({
        url: `${admin_url}mcm/get_websites`, // Adjust URL to your backend API endpoint
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                alert(response.error);
            } else {
                var websites = response.websites;
                var $websiteList = $('#website-list');

                $websiteList.empty(); // Clear the list before appending new items

                // Append websites to the list
                $.each(websites, function(index, website) {
                    $websiteList.append(`<li class="list-group-item website-item" data-site="${website.Website}">${website.Website}</li>`);
                });

                $('#Website-modal').modal('show');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});

// Handle Website Selection
$(document).on('click', '.website-item', function() {
    $('.website-item').removeClass('active'); // Remove active class from all items
    $(this).addClass('active'); // Add active class to the selected item
    $('#selected-site').val($(this).data('site')); // Set the selected website value in the hidden input
});

// Handle Save Button Click
$('#Website-btn').on('click', function() {
    var Id = $('#id').val();
    var selectedSite = $('#selected-site').val();

    if (!selectedSite) {
        alert('Please select a website.');
        return;
    }

    // Save the selected website to the database
    $.ajax({
        url: `${admin_url}mcm/update_website`, // Adjust URL as needed
        type: 'POST',
        data: {
            id: Id,
            site: selectedSite,
        },
        dataType: 'json',
        success: function(response) {
            if (response.error) {
                alert(response.error);
            } else {
                alert('Website updated successfully.');
                $('#Website-modal').modal('hide'); // Hide the modal
                $('#vendors-data-datatable').DataTable().ajax.reload(); // Reload the DataTable
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
</script>
