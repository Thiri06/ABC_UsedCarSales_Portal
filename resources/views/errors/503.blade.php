<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance | ABC Cars</title>
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
        
        .maintenance-container {
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
        
        .fa-wrench {
            color: #f36d33;
            font-size: 4rem;
            margin: 2rem 0;
            animation: swing 2s infinite;
        }
        
        @keyframes swing {
            20% { transform: rotate(15deg); }
            40% { transform: rotate(-10deg); }
            60% { transform: rotate(5deg); }
            80% { transform: rotate(-5deg); }
            100% { transform: rotate(0deg); }
        }
        
        .message {
            color: #a5a7e2;
            font-size: 1.2rem;
            margin: 1.5rem 0;
        }
        
        .estimated-time {
            color: #dbf320;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="maintenance-container">
        <div class="brand-text">ABC Cars</div>
        <i class="fas fa-wrench"></i>
        <h1>We're Currently Under Maintenance</h1>
        <p class="message">Our team is working hard to improve your car shopping experience.</p>
        <p class="message">Please check back shortly.</p>
        <p class="estimated-time">Estimated downtime: 30 minutes</p>
    </div>
</body>
</html>
