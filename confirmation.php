<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Application Submitted</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        text-align: center;
        background-color: #1d1d1d;
        color: #fff8e8;
    }

    .confirmation {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 3px solid #ccc;
        border-radius: 15px;
    }

    h1 {
        color: #00b386;
    }

    .eoi-number {
        font-size: 24px;
        font-weight: bold;
        color: #00b386;
        margin: 20px 0;
    }

    .back-link {
        margin-top: 20px;
    }

    .back-link a {
        display: inline-block;
        padding: 12px 24px;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        color: #fff;
        background: linear-gradient(45deg, #2196f3, #00b386);
        border-radius: 25px;
        transition: 0.3s ease-in-out;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
    }

    .back-link a:hover {
        background: linear-gradient(45deg, #00b386, #2196f3);
        transform: scale(1.05);
    }
    </style>
</head>

<body>
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
