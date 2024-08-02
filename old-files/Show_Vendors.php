<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>GoogleAdManagerID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($Vendors) && is_array($Vendors)): ?>
                        <?php foreach ($Vendors as $Vendor): ?>
                            <tr>
                                <td><?php echo $Vendor['ID']; ?></td>
                                <td><?php echo $Vendor['GoogleAdManagerID']; ?></td>
                                <td><?php echo $Vendor['Name']; ?></td>
                                <td><?php echo $Vendor['Email']; ?></td>
                                <td><?php echo $Vendor['Website']; ?></td>
                                <td>
                             </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No Vendors</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="<?php echo admin_url('mcm/CreateVendor'); ?>" class="btn btn-primary mt-3">CREATE Vendor</a>
            <a href="<?php echo admin_url('mcm/EditVendor'); ?>" class="btn btn-primary mt-3">Edit Vendor</a>
            <a href="<?php echo admin_url('mcm/DeleteVendor'); ?>" class="btn btn-primary mt-3">Delete Vendor</a>
            <a href="<?php echo admin_url('mcm/CreatePartner'); ?>" class="btn btn-primary mt-3">CREATE Partner</a>
            <a href="<?php echo admin_url('mcm/EditPartner'); ?>" class="btn btn-primary mt-3">Edit Partner</a>
            <a href="<?php echo admin_url('mcm/DeletePartner'); ?>" class="btn btn-primary mt-3">Delete Partner</a>
        </div>
    </div>
</div>
<?php init_tail(); ?>
<script>
    showCleonModal('Vendor', 'Added')
</script>

