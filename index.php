<?php
require "dbprompts.php";
// Prepare
$stmt = $db->prepare("SELECT * FROM prompts.prompts");
// Execute
$stmt->execute();
$prompts = $stmt->fetchAll();
// foreach ($notes as $note) {
//     echo $note["title"];
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySql Veloce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body class="bg-slate-400 flex flex-col min-h-screen">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center  space-x-3 rtl:space-x-reverse">
                <img src="./assets/imgs/php_icon.png" class="h-8" alt="PHP MySql" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PHP MySql Prompts Veloce</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-3xl lg:text-6xl 2xl:text-6xl lg:text-6xl md:text-4xl text-center text-orange-400 font-bold my-4"> Prompts Veloce App</h1>
    <div class="flex-grow container mx-auto px-2 bg-slate-400 min-h-[100%]">

        <!-- <h1 class="text-center text-4xl font-bold my-2">PHP MySql Veloce</h1> -->
        <div class="card relative flex flex-col items-center gap-4 bg-white border border-gray-200 rounded-lg shadow sm:m-auto md:flex-col max-w-[200px] max-h-[200px] m-auto  w-full hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 my-2">

            <img src="./assets/imgs/bg-gif-1.gif" alt="bg-1" class="object-none aspect-square opacity-50 blur-sm w-full rounded-lg max-h-[100px] md:h-auto md:w-full" />

            <a href="newprompt.php" class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] bg-orange-500 text-white px-4 py-2 rounded rounded-lg hover:bg-orange-600 focus:outline-none flex justify-center items-center gap-1 min-w-[100px]">
                <span class="material-symbols-outlined">
                    add_circle
                </span> <span class="text-2xl">Prompt</span>
            </a>


        </div>
        <div class="container mx-auto mt-4 p-4 flex flex-wrap gap-4">
            <!-- FOR HERE  -->
            <?php foreach ($prompts as $prompt) : ?>
                <a href="prompt.php?id=<?= $prompt['id'] ?>" class="card flex flex-col md:flex-row items-center gap-21 bg-white border border-gray-200 rounded-lg shadow  m-auto sm:m-auto xs:m-auto  md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="img-container h-[100%] max-w-[180px] relative">
                        <img src="./assets/imgs/bg-<?= $prompt['id'] ?>.jpg" alt="bg-1" class="object-cover w-full aspect-square rounded-t-lg h-full md:rounded-none md:rounded-s-lg" />
                    </div>

                    <div class="flex flex-col flex-wrap  justify-between max-w-[280px] min-w-[180px] p-1 leading-normal">

                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $prompt['title'] ?></h5>
                        <div class="author text-white"><strong>Author: </strong><?= $prompt['author'] ?? 'Unknown' ?></div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            <?= substr($prompt['prompt'], 0, 20) ?>
                            <br>

                            <small><?= date('d-m-Y', strtotime($prompt['created_at'])) ?></small>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>

            <!-- END HERE -->
        </div>
    </div>


    <footer class="bg-white rounded-lg shadow m-4 dark:bg-gray-800">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="" class="hover:underline">PHP MySql Veloce™</a>. All Rights Reserved.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
    </footer>

</body>

</html>