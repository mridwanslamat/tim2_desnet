<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desnet | Project Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100"> 
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md min-h-screen fixed">
            <?= $this->include('projectmanager/sidebar') ?>
        </aside>

        <div class="flex-1 flex flex-col pl-64">
            <!-- Header -->
            <header class="fixed top-0 w-[calc(100%-16rem)] shadow-md z-50">
                <?= $this->include('projectmanager/header') ?>
            </header>
        </div>

        <!-- Manage Project -->
        <div class="justify-center flex bg-white mt-[125px] ml-[275px] mr-[20px] h-[585px] rounded-xl shadow-lg grid grid-cols-2">
            <div class="my-auto text-black text-center text-3xl font-sans font-bold">
                <h2> Manage Project </h2>
                <div class="text-gray-400 text-center text-sm font-normal ">
                    <p2>Company Profile</p2>
                </div>
                    <form action="/--" class="max-w-sm mx-auto"> 
                        <input type="datetime" name="ProjectSchedule" class="bg-white border text-black
                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-10" placeholder="Project Schedule" required>

                        <input type="text" name="Feature" class="bg-white border text-black
                        text-sm rounded-lg w-full h-[300px] p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3 mb-10" placeholder="Feature" required>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                        focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full 
                        px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
                        dark:focus:ring-blue-800">Make UAT Table</button>
                    </form>
            </div>
            <div class="items-center flex justify-center">
                <img src="<?= base_url('img/amico.png')?>" alt="manage">
            </div>
        </div>
        
</body>
</html>