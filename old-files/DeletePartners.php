
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Delete Partners</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>MCMVendorID</th>
                <th>DemandPartnerID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Partners as $Partner): ?>
                    <tr>
                    <td><?php echo $Partner['ID']; ?></td>
                    <td><?php echo $Partner['MCMVendorID']; ?></td>
                    <td><?php echo $Partner['DemandPartnerID']; ?></td>
                        <td>
                        <form id="PartnersForm" method="post" action="<?php echo admin_url('mcm/DeletePartner'); ?>">
                        <input type="hidden" name="csrf_token_name" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" name="ID" value="<?php echo $Partner['ID']; ?>">
                        <button type="Delete" class="btn btn-primary mt-3">Delete Partner</button>
                        </form>
                        <a href="<?php echo admin_url('mcm/CreatePartner'); ?>" class="btn btn-primary mt-3">Create Partner</a>
                        <a href="<?php echo admin_url('mcm/EditPartner'); ?>" class="btn btn-primary mt-3">Edit Partner</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>