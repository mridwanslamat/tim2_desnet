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

    <!-- History -->
    <!-- List -->
    <div class="justify-center bg-white mt-[125px] ml-[275px] mr-[20px] h-[585px] rounded-xl shadow-lg flex-col">
        <div>
            <div class="border border-black rounded-lg w-full">
                <div class="py-3 px-4 rounded-lg">
                    <div class="border border-black rounded-lg relative max-w-xs">
                        <input type="text" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm 
                               focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none 
                               dark:bg-gray-100 dark:border-gray-600 dark:text-black dark:placeholder-gray-700 dark:focus:ring-gray-500"
                            placeholder="Search Project Title">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2 w-full">
                    <table class="min-w-full">
                        <thead class="bg-white">
                            <tr class="border border-black text-bold">
                                <th class="text-left">Project Manager</th>
                                <th class="text-left">Project Title</th>
                                <th class="text-left">Date Updated</th>
                                <th class="text-left w-xl">Status</th>
                                <th class="text-center">Document</th>
                                <th class="text-center">Update</th>
                            </tr>
                        </thead>
                        <tbody class="text-md divide-y divide-black">
                            <tr>
                                <td>Lindsey Gouse</td>
                                <td>Company Profile</td>
                                <td>null</td>
                                <td>null</td>
                                <td class="text-center">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">
                                        <i class="fa-regular fa-file"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">Click Here</button>
                                </td>
                            </tr>

                            <tr>
                                <td>Lindsey Gouse</td>
                                <td>Company Profile</td>
                                <td>null</td>
                                <td>null</td>
                                <td class="text-center">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">
                                        <i class="fa-regular fa-file"></i>
                                    </button>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">Click Here</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="justify-center bg-white mt-[125px] ml-[275px] mr-[20px] h-[585px] rounded-xl shadow-lg flex-col">
        <div>
            <div>
                <div class="border border-black rounded-lg divide-y divide-gray-200 dark:divide-neutral-700">
                    <div class="py-3 px-4 rounded-lg">
                        <div class="border border-black rounded-lg relative max-w-xs">
                            <input type="text" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm 
                                 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none 
                                 dark:bg-gray-100 dark:border-gray-600 dark:text-black dark:placeholder-gray-700 dark:focus:ring-gray-500"
                                placeholder="Search Project Title">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-full mt-4 px-5 divide-y divide-black dark:divide-black">
                        <table class="divide-y divide-black dark:divide-black w-full gap-2 border-separate border-spacing-2">
                            <thead css="divide-y divide-black dark:divide-black">
                                <tr class="border">
                                    <th class="text-left">Project Manager</th>
                                    <th class="text-left">Project Title</th>
                                    <th class="text-left">Date Updated</th>
                                    <th class="text-left w-xl">Status</th>
                                    <th class="text-center">Document</th>
                                    <th class="text-center">Update</th>
                                </tr>
                            </thead>
                            <tbody class="text-md divide-y divide-black dark:divide-black">
                                <tr>
                                    <td>Lindsey Gouse</td>
                                    <td>Company Profile</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td class="text-center">
                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">
                                            <i class="fa-regular fa-file"></i>
                                        </button>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">Click Here</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Lindsey Gouse</td>
                                    <td>Company Profile</td>
                                    <td>null</td>
                                    <td>null</td>
                                    <td class="text-center">
                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">
                                            <i class="fa-regular fa-file"></i>
                                        </button>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">Click Here</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="py-1 px-4">
                            <nav class="flex items-center space-x-1" aria-label="Pagination">
                                <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full
                                    text-black hover:bg-blue-500 focus:outline-none focus:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none 
                                    dark:text-black dark:hover:bg-blue-500 dark:focus:bg-blue-500" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button type="button" class="min-w-[40px] flex justify-center items-center text-black hover:bg-blue-500 focus:outline-none
                                    focus:bg-blue-500 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-black dark:focus:bg-neutral-700
                                    dark:hover:bg-blue-500" aria-current="page">1</button>

                                <button type="button" class="min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none
                                    focus:bg-blue-500 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-black dark:focus:bg-neutral-700
                                    dark:hover:bg-blue-500">2</button>

                                <button type="button" class="min-w-[40px] flex justify-center items-center text-gray-800 hover:bg-gray-100 focus:outline-none
                                    focus:bg-blue-500 py-2.5 text-sm rounded-full disabled:opacity-50 disabled:pointer-events-none dark:text-black dark:focus:bg-neutral-700
                                    dark:hover:bg-blue-500">3</button>

                                <button type="button" class="p-2.5 min-w-[40px] inline-flex justify-center items-center gap-x-2 text-sm rounded-full text-gray-800
                                    hover:bg-gray-100 focus:outline-none focus:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:text-black dark:hover:bg-blue-500
                                    dark:focus:bg-neutral-700" aria-label="Next">
                                    <span class="sr-only">Next</span>
                                    <span aria-hidden="true">»</span>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</body>

</html>