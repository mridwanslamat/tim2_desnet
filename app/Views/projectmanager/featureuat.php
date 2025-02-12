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

    <!-- feature -->
    <div class="mt-[125px] ml-[275px] mr-[20px] rounded-xl grid grid-cols-2">
        <div class="px-20 bg-gray-100 ">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
        focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full 
        px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
        dark:focus:ring-blue-800">Save UAT Table</button>
        </div>

        <div class="px-20 bg-gray-100">
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 
        focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full 
        px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 
        dark:focus:ring-green-800">Generate UAT Document</button>
        </div>
    </div>
    <div class="bg-white mt-[25px] ml-[275px] mr-[20px] rounded-xl shadow-lg flex-col">
        <div>
            <div class="border border-black rounded-lg w-full">
                <div class="flex flex-col gap-2 w-full">
                    <table class="min-w-full">
                        <thead class="bg-white">
                            <tr class="bg-blue-800 text-white">
                                <th class="text-left p-3">No</th>
                                <th class="text-left p-3">Feature</th>
                                <th class="text-left p-3">Date</th>
                                <th class="text-left w-xl p-3">Status Validation Desnet</th>
                                <th class="text-left p-3">Status Validation Client</th>
                                <th class="text-left p-3">Notes</th>
                            </tr>
                        </thead>
                        <tbody class="text-md divide-y divide-black">
                            <tr>
                                <td class="p-3">1.</td>
                                </td>
                                <td class="p-3">Lorem ipsum dolor sit amet</td>
                                <td class="p-3">
                                    <input type="date" name="UATDate" class="bg-white border text-black
                                text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="UAT Date" required>
                                </td>
                                <td class="p-3">
                                    <select name="ValidationStatus" class="bg-white border text-black text-sm rounded-lg w-full p-2.5 
                                    focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                        <option value="" disabled selected>Status Validation Desnet</option>
                                        <option value="Worked">Worked</option>
                                        <option value="Failed">Failed</option>
                                    </select>
                                </td>
                                <td class="text-center p-3">
                                    <select name="ClientFeedbackStatus" class="bg-white border text-black text-sm rounded-lg w-full p-2.5 
                                    focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                        <option value="" disabled selected>Status Validation Client</option>
                                        <option value="Accepted">Accepted</option>
                                        <option value="Revision">Revision</option>
                                    </select>
                                </td>
                                <td class="text-center p-3">
                                    <form class="max-w-sm mx-auto">
                                        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50
                                        rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700
                                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                        dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                                    </form>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>