<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>GoogleAdManagerID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($Vendors) && is_array($Vendors)): ?>
                        <?php foreach ($Vendors as $Vendors): ?>
                            <tr>
                                <td><?php echo $Vendors['GoogleAdManagerID']; ?></td>
                                <td><?php echo $Vendors['Name']; ?></td>
                                <td><?php echo $Vendors['Email']; ?></td>
                                <td><?php echo $Vendors['Website']; ?></td>
                                <td>
                        <form action="<?php echo admin_url('mcm/mcmTablesVendor'); ?>" method="POST" onsubmit="return confirm('Do you want to delete this vendor?');">
                        <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" name="ID" value="<?php echo $Vendors['ID']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
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
            <a href="<?php echo admin_url('mcm/mcmVendorCreate'); ?>" class="btn btn-primary mt-3">CREATE Vendor</a>
            <a href="<?php echo admin_url('mcm/'); ?>" class="btn btn-primary mt-3">Edit Vendor</a>
            <a href="<?php echo admin_url('mcm/mcmPartnerCreate'); ?>" class="btn btn-primary mt-3">CREATE Partner</a>
        </div>
    </div>
</div>
<?php init_tail(); ?>
