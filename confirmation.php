<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Application Submitted</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
</head>

<body class="confirmationpage">
    <div class="confirmation">
        <h1>Thank you!</h1>
        <p>Your job application form has been recorded successfully.</p>
        <p class="eoi-number">
            Your unique Number is:
            <?php echo isset($_GET['eoi']) ? htmlspecialchars($_GET['eoi']) : 'N/A'; ?>
        </p>
        <p>Please save this number for your records.</p>
        <div class="back-link">
            <a href="apply.php">Come Back</a>
        </div>
    </div>
</body>

</html>
