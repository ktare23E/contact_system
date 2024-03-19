<?php 

    if(isset($_GET['errors'])){
        $errorData = json_decode($_GET['errors']);
        foreach($errorData as $errors){
            echo "<script>alert('".$errors."')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="output.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <section class="bg-gray-900 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-center dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="controllers/user_registration.php" method="POST" autocomplete="off">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First Name" required="">
                            </div>
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last Name" required="">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            <span class="check_result text-sm"></span>
                        </div>
                        <div >
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <div class="password-container">
                                <input type="password" name="password" id="password" placeholder="••••••••" class="password-input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="eye-icon w-5 h-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close_eye_icon w-5 h-5 text-gray-400 ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </div>
                            <span class="password_result text-sm"></span>
                        </div>
                        <div>
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <div class="confirm_password_container">
                                <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="confirm-password-input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="confirm-eye-icon w-5 h-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="confirm_close_eye_icon w-5 h-5 text-gray-400 ">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </div>
                            <span class="confirm_password_text text-sm"></span>
                        </div>
                        <input type="submit" class="w-full text-white bg-blue-800 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" name="submit" value="Create Account">
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="index.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#email').on('input',function(){
            let email = $(this).val();

            $.ajax({
                url : './controllers/checkUserEmail.php',
                type : 'POST',
                data : {email:email},
                success : function(response){
                    if(response == 'taken'){
                        $('#email').addClass('border-red-500');
                        $('#email').removeClass('border-green-500');
                        $('.check_result').text('Email already taken').addClass('text-red-500').removeClass('text-green-500');
                    }else{
                        $('#email').addClass('border-green-500');
                        $('#email').removeClass('border-red-500');
                        $('.check_result').text('Email available').addClass('text-green-500').removeClass('text-red-500');
                    }

                    if(email === ''){
                        $('.check_result').text('')
                    }
                }
            })
        })

        $('#password').on('input',function(){
            let password = $(this).val();

            $.ajax({
                url : './controllers/checkPassword.php',
                type : 'POST',
                data : {
                    password : password
                },
                success : function(response,status){
                    if(response == 'error'){
                        $('.password_result').text('Password must contain at least 8 characters, 1 uppercase letter and 1 number to make a strong password.').addClass('text-red-500');
                    }else{
                        $('.password_result').text('Password is now strong!').addClass('text-green-500').removeClass('text-red-500');
                    }

                    if(password === ''){
                        $('.password_result').text(' ');
                    }
                }
            });
        });

        $('.confirm-password-input').on('input',function(){
            let confirm_password = $(this).val();
            let password = $('#password').val();
        
            $.ajax({
                url : './controllers/confirmPassword.php',
                type : 'POST',
                data : {
                    password : password,
                    confirm_password : confirm_password
                },
                success : function(response){
                    if(response == 'success'){
                        $('.confirm_password_text').addClass('text-green-500');
                        $('.confirm_password_text').text('Password is identical!').addClass('text-green-500');
                        $('.confirm_password_text').removeClass('text-red-500');
                    }else{
                        $('.confirm_password_text').addClass('text-red-500')
                        $('.confirm_password_text').removeClass('text-green-500');
                        $('.confirm_password_text').text('Password is does not match!');
                    }

                    if(confirm_password === ''){
                        $('.confirm_password_text').text('');
                    }
                }
            })
        });

        $('.eye-icon').click(function () {
            $(this).addClass('hidden');
            $('.password-input').attr('type', 'text');
            $('.close_eye_icon').css('display','block');
        });

        $('.close_eye_icon').click(function () {
            $(this).css('display','none');
            $('.password-input').attr('type', 'password');
            $('.eye-icon').removeClass('hidden');
        });

        $('.confirm-eye-icon').click(function () {
            $(this).addClass('hidden');
            $('.confirm-password-input').attr('type', 'text');
            $('.confirm_close_eye_icon').css('display','block');
        });

        $('.confirm_close_eye_icon').click(function () {
            $(this).css('display','none');
            $('.confirm-password-input').attr('type', 'password');
            $('.confirm-eye-icon').removeClass('hidden');
        });
    </script>
</body>

</html>