
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
                </div>
                </div>
                
                <!-- Vendors Table Container -->
                <div id="vendors-table-container" class="row mtop10" style="display: block;"> <!-- Set display to block -->
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
        <!-- Existing Save Button -->
        <button type="submit" form="edit-vendor-form" class="btn btn-primary" id="save-btn" style="margin-top: 15px;">Save</button>  
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

<!-- Demand Partners Modal -->
<div class="modal fade" id="demandPartnersModal" tabindex="-1" role="dialog" aria-labelledby="demandPartnersModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demandPartnersModalLabel">Select Demand Partners</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="demandPartnersForm">
                    <input type="hidden" name="ad_id" id="ad_id">
                    <div class="form-group">
                        <label for="PartnerID">Demand Partners</label>
                        <select class="selectpicker form-control" data-live-search="true" name="PartnerID" id="PartnerID" multiple>
                            <!-- Options will be populated via AJAX -->
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="savePartner">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Website Modal -->
<div class="modal fade" id="siteModal" tabindex="-1" role="dialog" aria-labelledby="siteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siteModalLabel">Select Site</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="siteForm">
                    <input type="hidden" name="id" id="id"> <!-- Hidden input for vendor ID -->
                    <div class="form-group">
                        <label for="site_id">Site</label>
                        <select class="selectpicker" name="site_id" id="site_id" multiple data-live-search="true">
                            <!-- Options will be populated via AJAX -->
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveSite">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script>
// Show Import Modal csv data 
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
// Show import modal csv data 
// Vendors list table 
const directEndpoint = `${admin_url}mcm/get_mcm_vendors`;
let directColumns = [
    {
        title: 'Date',
        searchable: true,
        data: 'Date',
        render: function(data, type, row) {
            return `
                <div>
                    <span>${data}</span>
                    <div style="margin-top: 5px;">
                        <button class="btn btn-sm btn-primary edit-vendor-btn" data-id="${row.id}" style="margin-right: 5px; font-size: 11px; padding: 3px 7px;">
                            Edit
                        </button> 
                        <button class="btn btn-sm btn-danger delete-vendor-btn" 
                            data-id="${row.id}" 
                            data-name="${row.Name}"
                            style="font-size: 11px; padding: 3px 7px;">Delete</button>
                    </div>
                </div>
            `;
        }
    },
    {
        title: 'GoogleAdManagerID',
        searchable: true,
        data: 'GoogleAdManagerID'
    },
    {
        title: 'Name',
        searchable: true, 
        data: 'Name',
    },
    {
        title: 'Email',
        searchable: true,
        data: 'Email',
    },
    {
        title: 'Website',
        searchable: true,
        data: 'Website',
    },
    {
        title: 'Status',
        searchable: true,
        data: null,
        render: function(data, type, row) {
            return `<button class="btn btn-sm btn-warning status-btn" 
                    data-id="${row.id}" 
                    style="font-size: 11px; padding: 3px 7px;">Status</button>`;
        }
    },
    {
        title: 'Websites',
        searchable: false,
        data: null,
        render: function(data, type, row) {
            return `
                <button class="btn btn-sm btn-info open-websites-modal-btn" data-id="${row.id}" style="font-size: 11px; padding: 3px 7px;">
                    Select Website
                </button>
            `;
        }
    },
    {
        title: 'Partners',
        searchable: false,
        data: null,
        render: function(data, type, row) {
            return `
                <button class="btn btn-sm btn-warning open-demand-partners-modal-btn" data-id="${row.id}" style="font-size: 11px; padding: 3px 7px;">
                    Select Partners
                </button>
            `;
        }
    }
];

// Datatable Initialization without Search Bar and Language Settings
giveDatatable(directEndpoint, directColumns, () => {}, {
    serverSide: true,
    pageLength: 10,
    lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
    searching: false, // Disabled the global search bar
    ordering: true
}, '#vendors-data-datatable');
// Vendors list table
    // Edit modal
    $(document).on('click', '.edit-vendor-btn', function() {
        var id = $(this).data('id');
        $('#id').val(id);

        $.ajax({
            url: `${admin_url}mcm/getData/${id}`,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var dbVendorData = response;
                var localVendorData = localStorage.getItem('VendorData_' + id);
                var vendorDataToSet = localVendorData ? JSON.parse(localVendorData) : dbVendorData;

                $('#Date').val(vendorDataToSet.Date);
                $('#GoogleAdManagerID').val(vendorDataToSet.GoogleAdManagerID);
                $('#Name').val(vendorDataToSet.Name);
                $('#Email').val(vendorDataToSet.Email);
                $('#Website').val(vendorDataToSet.Website);

                $('#edit-vendor-modal').modal('show');
            }  
        });
    });

    // Handle Save button
    $('#edit-vendor-form').on('submit', function(e) {
        e.preventDefault();

        var Id = $('#id').val();
        var Date = $('#Date').val();
        var GoogleAdManagerID = $('#GoogleAdManagerID').val();
        var Name = $('#Name').val();
        var Email = $('#Email').val();
        var Website = $('#Website').val();

        if (Name === '' || Email === '' || Website === '') {
            alert('Please fill in all required fields.');
            return;
        }

        $.ajax({
            url: `${admin_url}mcm/update`,
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
                    var updatedVendorData = {
                        Date: Date,
                        GoogleAdManagerID: GoogleAdManagerID,
                        Name: Name,
                        Email: Email,
                        Website: Website
                    };
                    localStorage.setItem('VendorData_' + Id, JSON.stringify(updatedVendorData));
                    alert('Information updated successfully.');
                    $('#edit-vendor-modal').modal('hide');
                    $('#vendors-data-datatable').DataTable().ajax.reload();
                } else {
                    alert('Error: ' + (response.message || 'Failed to update information.'));
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('An error occurred while updating information. Please try again.');
            }
        });
    });
// Edit Modal

// Delete ajax confirmation 
$(document).on('click', '.delete-vendor-btn', function() {
    var id = $(this).data('id');  // Get vendor ID
    var name = $(this).data('name');  // Get vendor name

    // Show confirmation dialog with vendor name
    if (confirm(`Do you want to delete ${name}?`)) {
        $.ajax({
            url: `${admin_url}mcm/delete/${id}`,  // Use vendor ID in the URL
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    alert('Vendor deleted successfully.');
                    $('#vendors-data-datatable').DataTable().ajax.reload();  // Reload data table after deletion
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);  // Log any errors
            }
        });
    }
});
// Delete ajax confirmation 
</script>

<script> // site Conversion dropdown 
$(document).ready(function() {
    // Initialize Bootstrap Select
    $('#site_id').selectpicker();

    // When the modal is opened, load site data from the server
    $('#siteModal').on('show.bs.modal', function() {
        var id = $('#id').val(); // Get vendor ID from hidden input

        $.ajax({
            url: `${admin_url}mcm/get_sites_ajax`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var siteDropdown = $('#site_id');
                siteDropdown.empty(); // Clear previous options

                // Populate the dropdown with site data
                $.each(data, function(index, site) {
                    siteDropdown.append($('<option>', {
                        value: site.site_id,
                        text: site.site_name
                    }));
                });

                // Refresh Bootstrap Select to reflect new data
                siteDropdown.selectpicker('refresh');

                // Load the saved sites for the vendor
            $.ajax({
            url: `${admin_url}mcm/get_saved_sites_for_vendor`, // Correct endpoint
            type: 'GET',
            data: { id: id }, // Send vendor ID to fetch the saved sites
            dataType: 'json',
            success: function(data) {
                var siteDropdown = $('#site_id');
                siteDropdown.empty(); // Clear previous options

                // Populate the dropdown with site data
                $.each(data.all_sites, function(index, site) {
                    var isSelected = data.selected_sites.includes(site.site_id) ? 'selected' : '';
                    siteDropdown.append(`<option value="${site.site_id}" ${isSelected}>${site.site_name}</option>`);
                });

                // Refresh Bootstrap Select to reflect new data
                siteDropdown.selectpicker('refresh');
            },
            error: function() {
                // Show error message
                alert('An error occurred while fetching the websites. Please try again.');
            }
                });
            }
        });
    });

    // Save the selected sites in the server database
    $('#saveSite').on('click', function() {
        var site_ids = $('#site_id').val();
        var id = $('#id').val(); // Get vendor ID from hidden input

        // Send the selected sites and vendor ID to the server to save in the database
        $.ajax({
            url: `${admin_url}mcm/save_site_selection_to_db`, // Updated endpoint for saving to database
            type: 'POST',
            data: {
                site_ids: site_ids,
                id: id // Send vendor ID with the request
            },
            success: function(response) {
                // Show success message
                $('#siteModal').modal('hide');
                alert('Sites were saved successfully.');
            },
            error: function() {
                // Show error message
                alert('An error occurred while saving the selected sites. Please try again.');
            }
        });
    });

    // Open the website modal when the "Select Website" button is clicked
    $(document).on('click', '.open-websites-modal-btn', function() {
        var id = $(this).data('id'); // Get vendor ID from button data attribute
        $('#id').val(id); // Set the vendor ID in the hidden input
        $('#siteModal').modal('show'); // Open the website modal
    });
}); // Site Conversion dropdown 
</script> 

<script> // Partners dropdown 
$(document).ready(function() {
    // Initialize Bootstrap Select for Demand Partners
    $('#PartnerID').selectpicker();

    // When the Demand Partners modal is opened, load demand partner data from the server
    $('#demandPartnersModal').on('show.bs.modal', function() {
        var id = $('#id').val(); // Get vendor ID from hidden input

        $.ajax({
            url: `${admin_url}mcm/get_Partners_ajax`,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var partnerDropdown = $('#PartnerID');
                partnerDropdown.empty(); // Clear previous options

                // Populate the dropdown with demand partners data
                $.each(data, function(index, partner) {
                    partnerDropdown.append($('<option>', {
                        value: partner.PartnerID,
                        text: partner.PartnerName
                    }));
                });

                // Refresh Bootstrap Select to reflect new data
                partnerDropdown.selectpicker('refresh');

                // If PartnerIDs are saved in localStorage, set them as selected options
                var savedPartnerIds = JSON.parse(localStorage.getItem('selectedPartnerIds')) || [];
                partnerDropdown.val(savedPartnerIds);
                partnerDropdown.selectpicker('refresh');
            },
            error: function() {
                // Show error message
                alert('An error occurred while fetching the demand partners. Please try again.');
            }
        });
    });

    // Save the selected demand partners in localStorage and send them to the server
    $('#savePartner').on('click', function() {
        var partner_ids = $('#PartnerID').val();
        var id = $('#id').val(); // Get vendor ID from hidden input

        // Save the selected demand partners in localStorage
        localStorage.setItem('selectedPartnerIds', JSON.stringify(partner_ids));

        // Send the selected demand partners to the server to save in the database
        $.ajax({
            url: `${admin_url}mcm/save_partner`, // Updated endpoint for saving to database
            type: 'POST',
            data: {
                partner_ids: partner_ids,
                id: id // Send vendor ID with the request
            },
            success: function(response) {
                // Show success message
                $('#demandPartnersModal').modal('hide');
                alert('Demand partners were saved successfully!');
            },
            error: function() {
                // Show error message
                alert('An error occurred while saving the selected demand partners. Please try again.');
            }
        });
    });

    // Open the demand partners modal when the "Select Demand Partners" button is clicked
    $(document).on('click', '.open-demand-partners-modal-btn', function() {
        var id = $(this).data('id'); // Get vendor ID from button data attribute
        $('#id').val(id); // Set the vendor ID in the hidden input
        $('#demandPartnersModal').modal('show'); // Open the demand partners modal
    });
}); // Partners dropdown 
</script>

<script>
   // Show Status dropdown
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
    }); // Show Status dropdown
</script>
