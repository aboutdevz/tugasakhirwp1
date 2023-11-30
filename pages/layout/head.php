<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        html,
        body {
            height: 100vh;
            overflow-y: auto;
        }

        .wrapper {
            margin-bottom: -50px;
            max-height: 89vh;
            overflow-y: auto;
            /* Height of the footer */
        }

        #table-todo {
            overflow: hidden;
        }

        .footer {
            position: absolute;
            display: block;
            width: 100vw;
            bottom: 0px;
            height: 50px;
            /* Height of the footer */
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><?= APP_NAME ?></a>

    </nav>
    <div class="wrapper">
