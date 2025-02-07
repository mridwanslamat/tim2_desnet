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

        <div class="flex-1 flex flex-col pl-64">
            <!-- Header -->
            <header class="fixed top-0 w-[calc(100%-16rem)] shadow-md z-50">
                <?= $this->include('admin/header') ?>
            </header>
        </div>

        <!-- Add New Project -->
        <div class="justify-center flex bg-white mt-[125px] ml-[275px] mr-[20px] h-[585px] rounded-xl shadow-lg">
            <div class="mt-8 text-black text-center text-3xl font-sans font-bold">
                <h2> New Project </h2>
                    <div class="mt-8 items-center flex justify-center">
                        <img src="<?= base_url('img/addnewproject.png')?>" alt="new" class="w-[250px]">
                    </div>

                    <?php $session = session(); ?>

                    <?php if ($session->getFlashdata('error')): ?>
                        <p class="text-center text-sm text-red-600"><?= $session->getFlashdata('error'); ?></p>
                    <?php endif; ?>

                    <?php if ($session->getFlashdata('success')): ?>
                        <p class="text-center text-sm text-green-600"><?= $session->getFlashdata('success'); ?></p>
                    <?php endif; ?>

                    <form action="/admin/addnewproject" method="post" class="max-w-sm mx-auto"> 
                        <input type="text" name="ProjectManager" class="bg-white border text-black
                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-10" placeholder="Project Manager" required>

                        <input type="text" name="ProjectTitle" class="bg-white border text-black
                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Project Title" required>
                        
                        <input type="text" name="ClientName" class="bg-white border text-black
                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-10" placeholder="Client Name" required>

                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                        focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full 
                        px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
                        dark:focus:ring-blue-800">Add New Project</button>
                    </form>
            </div>
        </div>
</body>
</html>