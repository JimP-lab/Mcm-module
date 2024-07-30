<!DOCTYPE html>
<html>
<head>
    <title>Add Verification</title>
</head>
<body>
    <h1>Add Verification</h1>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <form method="post" action="add_action">
        <label for="mcmvendorid">Vendor:</label>
        <select name="mcmvendorid" id="mcmvendorid">
            <?php foreach ($vendors as $vendor): ?>
                <option value="<?php echo $vendor['ID']; ?>"><?php echo $vendor['VendorName']; ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="demandpartnerid">Demand Partner:</label>
        <select name="demandpartnerid" id="demandpartnerid">
            <?php foreach ($demand_partners as $partner): ?>
                <option value="<?php echo $partner['ID']; ?>"><?php echo $partner['PartnerName']; ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label for="date">Date:</label>
        <input type="date" name="date" id="date"><br>
        
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="1">Pending</option>
            <option value="2">Approved</option>
            <option value="3">Rejected</option>
        </select><br>
        
        <button type="submit">Add Verification</button>
    </form>
</body>
</html>
