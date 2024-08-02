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
                            <form id="VendorsForm" method="post" action="<?php echo admin_url('mcm/mcmCredentialsVendor'); ?>">
                                <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <h2 class="page-title" style="margin-top: 10px; margin-bottom: 20px;"><?php echo _l('Vendors'); ?></h2>
                                            <label for="GoogleAdManagerID" class="form-label">GoogleAdManagerID</label>
                                            <input type="text" name="GoogleAdManagerID" id="GoogleAdManagerID" class="form-control">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="Name" id="name" class="form-control">
                                            <label for="Email" class="form-label">Email</label>
                                            <input type="text" name="Email" id="Email" class="form-control">
                                            <label for="Website" class="form-label">Website</label>
                                            <input type="text" name="Website" id="Website" class="form-control">
                                            <label for="status">Status:</label>
                                            <select name="status" id="status">
                                            <option value="1">Pending</option>
                                            <option value="2">Approved</option>
                                            <option value="3">Rejected</option>
                                            </select><br>
                                            <button type="Create" class="btn btn-primary" style="margin-top: 15px;">CREATE</button>
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