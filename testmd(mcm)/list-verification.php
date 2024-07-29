<!DOCTYPE html>
<html>
<head>
    <title>Verifications</title>
</head>
<body>
    <h1>List of Verifications</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vendor</th>
                <th>Demand Partner</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($verifications as $verification): ?>
                <tr>
                    <td><?php echo $verification['ID']; ?></td>
                    <td><?php echo $verification['MCMVendorID']; ?></td>
                    <td><?php echo $verification['DemandPartnerID']; ?></td>
                    <td><?php echo $verification['Date']; ?></td>
                    <td><?php echo $verification['Status']; ?></td>
                    <td>
                        <a href="view/<?php echo $verification['ID']; ?>">View</a>
                        <a href="delete/<?php echo $verification['ID']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
add to view file