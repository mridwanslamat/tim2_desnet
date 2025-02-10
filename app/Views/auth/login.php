<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desnet | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 justify-center items-center h-screen">
    <nav class="bg-white p-7">
        <a href="/" class="container flex justify-between items-center">
            <img src="<?= base_url('img/desnet.jpg') ?>" alt="desnet logo" class="w-24">
        </a>
    </nav>

    <div class="bg-white flex justify-center items-center mx-20 my-10 h-[495px] rounded-xl shadow-lg grid grid-cols-2">
        <div class="text-black text-center text-3xl font-sans font-bold">
            <h2> Login Page </h2>
            <div class="text-gray-400 text-center text-sm font-normal pb-10">
                <p2>Please enter your details!</p2>
            </div>
            <?php $session = session(); ?>

            <?php if ($session->getFlashdata('error')): ?>
                <p class="text-center text-sm text-red-600"><?= $session->getFlashdata('error'); ?></p>
            <?php endif; ?>

            <form action="/auth" class="max-w-sm mx-auto">
                <input type="text" name="username" class="bg-white border text-black
                    text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Username" required>

                <div class="relative w-full">
                    <input type="password" name="password" id="password" class="bg-white border text-regular
                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-10" placeholder="Password" required oninput="checkInput()" onblur="checkEmpty()">

                    <button id="toggleButton" type="button" onclick="togglePassword()"
                        class="absolute top-6 right-8 w-10 h-3 bg-white transform -translate-y-1/2 flex hidden items-center justify-end px-2">
                        <div class="bg-white rounded-lg text-right">
                            <p id="show" class="text-sm font-semibold hover:font-regular hover:text-gray-400">Show</p>
                            <p id="hide" class="text-sm font-semibold hover:font-regular hover:text-gray-400 hidden">Hide</p>
                        </div>
                    </button>
                </div>


                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                    focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full 
                    px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
                    dark:focus:ring-blue-800">Login</button>

            </form>

        </div>
        <div class="items-center flex justify-center">
            <img src="<?= base_url('img/rafiki.png') ?>" alt="login">
        </div>
    </div>

    <footer class="bg-white flex justify-center text-gray-400 font-normal items-center mx-20 my-10 h-[40px] rounded-md shadow-md">
        <p>© 2025 PT Des Teknologi Informasi All Rights Reserved</p>
    </footer>

    <script>
        function togglePassword() {
            let passwordInput = document.getElementById("password");
            let showText = document.getElementById("show");
            let hideText = document.getElementById("hide");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showText.classList.add("hidden");
                hideText.classList.remove("hidden");
            } else {
                passwordInput.type = "password";
                showText.classList.remove("hidden");
                hideText.classList.add("hidden");
            }
        }

        function checkInput() {
            let passwordInput = document.getElementById("password");
            let toggleButton = document.getElementById("toggleButton");

            if (passwordInput.value.length > 0) {
                toggleButton.classList.remove("hidden");
            }
        }

        function checkEmpty() {
            let passwordInput = document.getElementById("password");
            let toggleButton = document.getElementById("toggleButton");

            if (passwordInput.value.length === 0) {
                toggleButton.classList.add("hidden");
            }
        }
    </script>
</body>

</html>