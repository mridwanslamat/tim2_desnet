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
    <div class="bg-white mt-[125px] ml-[275px] mr-[20px] rounded-xl shadow-lg flex-col">
        <div>
            <div class="border border-black rounded-lg w-full">
                <form method="GET" action="<?= base_url('/admin/history') ?>" class="py-3 px-4 rounded-lg">
                    <div class="border border-black rounded-lg relative max-w-xs">
                        <input type="text" name="search" value="<?= isset($search) ? esc($search) : '' ?>"
                            class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm 
               focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none 
               dark:bg-gray-100 dark:border-gray-600 dark:text-black dark:placeholder-gray-700 dark:focus:ring-gray-500"
                            placeholder="Search Project Title">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </form>
                <div class="flex flex-col gap-2 w-full">
                    <table class="min-w-full">
                        <thead class="bg-white">
                            <tr class="border border-black bg-blue-800 text-white">
                                <th class="text-left p-3">Project Manager</th>
                                <th class="text-left p-3">Project Title</th>
                                <th class="text-left p-3">Date Updated</th>
                                <th class="text-left w-xl p-3">Status</th>
                                <th class="text-center p-3">Document</th>
                                <th class="text-center p-3">Update</th>
                            </tr>
                        </thead>
                        <tbody class="text-md divide-y divide-black">
                            <?php foreach ($historyprojects as $history): ?>
                                <tr>
                                    <td class="p-3"><?= $history['ProjectManager'] ?></td>
                                    <td class="p-3"><?= $history['Title'] ?></td>
                                    <td class="p-3"><?= $history['DateAdded'] ?></td>
                                    <td class="p-3">
                                        <?php
                                        $status = $history['Status'];
                                        $badgeClass = '';

                                        if ($status === 'Finish') {
                                            $badgeClass = 'bg-green-600 text-white';
                                        } elseif ($status === 'On Progress') {
                                            $badgeClass = 'bg-yellow-400 text-white';
                                        }
                                        ?>

                                        <span class="inline-flex items-center <?= $badgeClass ?> text-sm font-medium px-2.5 py-0.5 rounded-full">
                                            <?= $status ?>
                                        </span>
                                    </td>
                                    <td class="text-center p-3">
                                        <a href="<?= base_url('/admin/download/' . $history['Id']) ?>" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">
                                            <i class="fa-regular fa-file" title="<?= $history['Document'] ?>"></i>
                                        </a>
                                    </td>
                                    <td class="text-center p-3">
                                        <a href="/admin/history/updateproject/<?= $history['Id'] ?>" type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600
                                        hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400
                                        dark:focus:text-blue-400">Click Here</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>