<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Error | ABC Cars</title>
    <link rel="icon" href="{{ asset('images/car.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #010113;
            color: #dfe0fd;
            font-family: 'Spline Sans Mono', monospace;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .error-container {
            text-align: center;
            padding: 2rem;
        }
        
        .brand-text {
            background: linear-gradient(45deg, #f36d33 30%, #dbf320 70%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 3rem;
            font-weight: bold;
        }
        
        .fa-database {
            color: #f36d33;
            font-size: 4rem;
            margin: 2rem 0;
        }
        
        .retry-btn {
            background-color: #f36d33;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        
        .retry-btn:hover {
            background-color: #dbf320;
            color: #010113;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="brand-text">ABC Cars</div>
        <i class="fas fa-database"></i>
        <h1>Database Connection Error</h1>
        <p class="message">We're experiencing technical difficulties connecting to our database.</p>
        <p class="message">Our team has been notified and is working on the issue.</p>
        <button class="retry-btn" onclick="window.location.reload()">Retry Connection</button>
    </div>
</body>
</html>
