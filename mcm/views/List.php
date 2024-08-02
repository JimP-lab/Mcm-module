<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>MCMVendorID</th>
                        <th>DemandPartnerID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($Partners) && is_array($Partners)): ?>
                        <?php foreach ($Partners as $Partners): ?>
                            <tr>
                                <td><?php echo $Partners['MCMVendorID']; ?></td>
                                <td><?php echo $Partners['DemandPartnerID']; ?></td>
                                <td><?php echo $Partners['Status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3">No Partners</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="<?php echo admin_url('mcm/mcmPartnerCreate'); ?>" class="btn btn-primary mt-3">CREATE Partner</a>
            <a href="<?php echo admin_url('mcm/'); ?>" class="btn btn-primary mt-3">Edit Partner</a>
            <a href="<?php echo admin_url('mcm/'); ?>" class="btn btn-primary mt-3">Delete Partner</a>
            <a href="<?php echo admin_url('mcm/mcmVendorCreate'); ?>" class="btn btn-primary mt-3">CREATE Vendor</a>
        </div>
    </div>
</div>
<?php init_tail(); ?>
