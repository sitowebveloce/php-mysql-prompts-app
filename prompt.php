<?php
require "dbprompts.php";
$id = $_GET['id'] ?? null;
// echo $id;
// echo "<br>";

if (!$id) {
    header('Location: index.php');
    exit;
};

$query = "SELECT * FROM prompts WHERE id = :id";
$stmt = $db->prepare($query);
$param = ['id' => $id];
$stmt->execute($param);
$prompt = $stmt->fetch();;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
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
    <div class="flex-grow container mx-auto px-2 bg-slate-400 min-h-[100%]">
        <a href="index.php" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded rounded-lg hover:bg-orange-600 focus:outline-none flex justify-center items-center gap-1 max-w-[110px]">
            <span class="material-symbols-outlined">
                home
            </span> <span class="text-xl">Home</span>
        </a>


        <div class="block mt-4 max-w-xl p-6 bg-slate-400 border border-slate-200 rounded-lg shadow hover:bg-gray-100 dark:bg-slate-400 dark:border-gray-700 dark:hover:bg-slate-400 w-full mx-auto">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $prompt['title'] ?></h5>
            <div class="author text-white"><strong>Author: </strong><?= $prompt['author'] ?? 'Unknown' ?></div>
            <p class="font-normal text-gray-700 dark:text-gray-700"><?= $prompt['prompt'] ?></p>
            <p><small><?= date('d-m-Y', strtotime($prompt['created_at'])) ?></small></p>
        </div>



        <div class="controls flex justify-between items-center flex-wrap gap-4 p-4">
            <form action="deleteprompt.php" method="post">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="id" value="<?= $prompt['id'] ?>">
                <button type="submit" onclick="return confirmDelete()" class="mt-4 bg-red-600 text-white px-4 py-2 rounded rounded-lg hover:bg-red-700 focus:outline-none flex justify-center items-center gap-1 max-w-[110px]" name="submit">
                    <span class="material-symbols-outlined">
                        delete
                    </span> <span>Delete</span>
                </button>
            </form>

            <a href="editprompt.php?id=<?= $prompt['id'] ?>" class="mt-4 bg-green-600 text-white px-4 py-2 rounded rounded-lg hover:bg-green-700 focus:outline-none flex justify-center items-center gap-1 max-w-[110px]">
                <span class="material-symbols-outlined">
                    edit
                </span> <span class="text-xl">Edit</span>
            </a>
        </div>

    </div>

    <footer class=" bg-white rounded-lg shadow m-4 dark:bg-gray-800">
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

    <script>
        function confirmDelete() {
            let con = confirm("Are you sure you want to delete this prompt?");
            if (con == true) {
                return true;
            } else {
                return false;
            };
        };
        // confirmDelete();
    </script>
</body>

</html>