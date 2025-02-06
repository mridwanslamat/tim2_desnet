<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desnet | Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="flex bg-white p-7 top-0 left-0 w-full">
        <div class="grid grid-cols-2 ml-auto pr-10">
            <div class="items-center flex justify-center">
                <img src="<?= base_url('img/user.png')?>" alt="header">
             </div>
            <div>
                <h1 class="text-bs font-medium text-black">
                    <?= esc($username); ?>    
                    <!-- Alfonso Baptista -->
                </h1>
                <h2 class="text-sm font-light">
                    <?= esc($level); ?>
                    <!-- Project Manager -->
                </h2>
            </div>    
        </div>    
</div>

    
</body>
</html>