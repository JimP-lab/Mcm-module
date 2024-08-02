<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('mcm/assets/styles'); ?>"> 
</head>
<body>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel_s">
                    <div class="panel-body">
                        <!-- Page Title -->
                        <div class="row">
                            <form id="PartnersForm" method="post" action="<?php echo admin_url('mcm/mcmCredentialsPartner'); ?>">
                                <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <h2 class="page-title" style="margin-top: 10px; margin-bottom: 20px;"><?php echo _l('Partners'); ?></h2>
                                            <label for="MCMVendorID" class="form-label">MCMVendorID</label>
                                            <input type="text" name="MCMVendorID" id="MCMVendorID" class="form-control">
                                            <label for="DemandPartnerID" class="form-label">DemandPartnerID</label>
                                            <input type="text" name="DemandPartnerID" id="DemandPartnerID" class="form-control">
                                            <label for="Status" class="form-label">Status</label>
                                            <input type="text" name="Status" id="Status" class="form-control">
                                            <button type="Create" class="btn btn-primary" style="margin-top: 15px;">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php init_tail(); ?>
</body>
</html>