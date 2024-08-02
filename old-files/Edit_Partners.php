
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Partner</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form action="<?php echo admin_url('mcm/EditPartner/' . $Partners->MCMVendorID); ?>" method="POST">
            <div class="form-group">
                <label for="MCMVendorID">MCMVendorID</label>
                <input type="text" class="form-control" id="MCMVendorID" name="MCMVendorID" value="<?php echo $Partners->MCMVendorID; ?>" required>
            </div>
            <div class="form-group">
                <label for="DemandPartnerID">DemandPartnerID</label>
                <input type="text" class="form-control" id="DemandPartnerID" name="DemandPartnerID" value="<?php echo $Partners->DemandPartnerID; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Partner</button>
        </form>
    </div>
</body>
</html>