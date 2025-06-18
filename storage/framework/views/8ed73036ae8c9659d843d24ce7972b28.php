<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .value {
            margin-top: 5px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>New Contact Form Submission</h2>
    </div>
    
    <div class="content">
        <div class="field">
            <div class="label">First Name:</div>
            <div class="value"><?php echo e($firstname); ?></div>
        </div>
        
        <div class="field">
            <div class="label">Last Name:</div>
            <div class="value"><?php echo e($lastname); ?></div>
        </div>
        
        <div class="field">
            <div class="label">Email Address:</div>
            <div class="value"><?php echo e($emailaddress); ?></div>
        </div>
        
        <div class="field">
            <div class="label">Phone:</div>
            <div class="value"><?php echo e($phone); ?></div>
        </div>
        
        <div class="field">
            <div class="label">Message:</div>
            <div class="value"><?php echo e($userMessage); ?></div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views/emails/contact.blade.php ENDPATH**/ ?>