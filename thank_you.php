<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You Page</title>
    <link href="output.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <?php 

        if(isset($_GET['success'])){
            echo '
                <div class="thank_you_container h-screen w-screen flex flex-col gap-2 items-center justify-center bg-gray-900">
                    <h1 class="text-3xl text-white">Thank you for Registering.</h1>
                    <div>
                        <button class="py-1 px-2 bg-green-300 text-white text-sm rounded-sm"><a href="users/index.php">Continue</a></button>
                    </div>
                </div>
                ';
        }else{
            echo '
                <div class="thank_you_container h-screen w-screen flex flex-col gap-2 items-center justify-center bg-gray-900">
                    <h1 class="text-3xl text-white">You are not allowed to access this page.</h1>
                    <div>
                        <button class="py-1 px-2 bg-green-300 text-white text-sm rounded-sm"><a href="index.php">Back to Home</a></button>
                    </div>
                </div>
                ';
        }

    ?>

</body>

</html>