
<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<?php init_head();?>
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel_s">
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12">
                <h4 class="page-title">Edit Vendors</h4>
              </div> 
            </div>
			<!-- PAGE CONTENT HERE -------------------------->
            <div class="row mtop10">
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>GoogleAdManagerID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Vendors as $Vendor): ?>
                    <tr>
                        <td><?php echo $Vendor['ID']; ?></td>
                        <td><?php echo $Vendor['GoogleAdManagerID']; ?></td>
                        <td><?php echo $Vendor['Name']; ?></td>
                        <td><?php echo $Vendor['Email']; ?></td>
                        <td><?php echo $Vendor['Website']; ?></td>
                        <td>
                        <form id="VendorsForm" method="post" action="<?php echo admin_url('mcm/EditVendor'); ?>">
                        <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" name="ID" value="<?php echo $Vendor['ID']; ?>">
                        <button type="Delete" class="btn btn-primary mt-3">Edit Vendor</button>
                        </form>
                        <a href="<?php echo admin_url('mcm/CreateVendor'); ?>" class="btn btn-primary mt-3">Create Vendor</a>
                        <a href="<?php echo admin_url('mcm/DeleteVendor'); ?>" class="btn btn-primary mt-3">Delete Vendor</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php init_tail(); ?>