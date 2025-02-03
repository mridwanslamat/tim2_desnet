<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desnet | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100"> 
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md min-h-screen fixed">
            <?= $this->include('admin/sidebar') ?>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col pl-64">
            <!-- Header -->
            <header class="fixed top-0 w-[calc(100%-16rem)] shadow-md z-50">
                <?= $this->include('admin/header') ?>
            </header>
        </div>

        <!-- Sapaan -->
        <div class="bg-white mt-[125px] ml-[275px] mr-[20px] h-[200px] rounded-xl shadow-lg grid grid-cols-2">
            <div class=" my-auto text-black text-center text-7xl font-sans font-bold">
              <h2> Hello, John! </h2>
                <div class="text-gray-600 text-center text-xl font-normal">
                    <p2>Let’s create new projects and bring innovations to life!</p2>
                 </div>
            </div>
            <div class="flex justify-center items-center">
                <img src="<?= base_url('img/pana.png')?>" alt="sapaan" class="w-[350px]">
            </div>
        </div>

        <!-- Calendar -->
        <div class="bg-white mt-[20px] ml-[275px] mr-[20px] h-[365px] rounded-xl shadow-lg grid grid-cols-2">
            <div class="flex items-center">
                <img src="<?= base_url('img/quotes.jpg')?>" alt="quotes" class=" h-[365px] rounded-l-xl">
            </div>
            <div class=" my-auto text-black text-6xl font-sans font-bold">
                <div class="text-gray-600 text-3xl font-normal mr-20 mb-5">
                    <p2>The secret of change is to focus all of your energy not on fighting the old, but on building the new</p2>
                 </div>
              <h2> -Socrates </h2>
            </div>
        </div>
    
        
</body>
</html>