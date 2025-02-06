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

        <!-- Update New Project -->
        <div class="justify-center flex bg-white mt-[125px] ml-[275px] mr-[20px] h-[585px] rounded-xl shadow-lg grid grid-cols-2">
            <div class="my-auto text-black text-center text-3xl font-sans font-bold">
                <h2> Update Project </h2>
                    <form action="/--" class="max-w-sm mx-auto"> 
                        <input type="text" name="ProjectManager" class="bg-white border text-black
                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-10" placeholder="Project Manager" required>

                        <input type="text" name="ProjectTitle" class="bg-white border text-black
                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3" placeholder="Project Title" required>
                        
                        <input type="datetime" name="DateUpdated" class="bg-white border text-black
                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3" placeholder="Date Updated" required>

                        <!-- Dropdown Status -->
                        <select name="ProjectStatus" class="bg-white border text-black text-sm rounded-lg w-full p-2.5 
                        focus:outline-none focus:ring-2 focus:ring-blue-500 mt-3" required>
                            <option value="" disabled selected>Project Status</option>
                            <option value= "Finish">Finish</option>
                            <option value="On Progress">On Progress</option>
                        </select>

                        
                        <div class="mt-3 mb-10">
                            <input type="file" class="w-full text-gray-400 font-bold text-sm bg-white border file:cursor-pointer rounded-lg
                                cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-gray-100 file:hover:bg-gray-200 file:text-gray-500 rounded" />
                        </div>


                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
                        focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full 
                        px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
                        dark:focus:ring-blue-800">Submit</button>
                    </form>
            </div>
            <div class="items-center flex justify-center">
                <img src="<?= base_url('img/updateproject.png')?>" alt="update">
            </div>
        </div>
        
</body>
</html>