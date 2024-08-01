<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Denegado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .access-denied-container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .access-denied-container h1 {
            font-size: 48px;
            color: #dc3545;
        }
        .access-denied-container p {
            font-size: 18px;
            color: #6c757d;
        }
        .btn {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="access-denied-container">
        <h1>Acceso Denegado</h1>
        <p>No tienes permiso para acceder a esta página.</p>
        <p>Por favor, contacta al administrador si crees que esto es un error.</p>
        <a href="../" class="btn btn-primary">Regresar al Inicio</a>
        <a href="../login.php" class="btn btn-secondary">Iniciar Sesión</a>
    </div>
</body>
</html>
