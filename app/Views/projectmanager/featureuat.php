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

    <div class="mt-[125px] ml-[275px] mr-[20px] text-xl font-bold text-center underline">
        <h2>
            Project Title: <?= esc($project['Title']) ?>
        </h2>
    </div>

    <form id="mainForm" action="" method="post">
        <input type="hidden" name="_method" value="PUT">
        <!-- feature -->
        <div class="mt-[25px] ml-[275px] mr-[20px] rounded-xl flex justify-between bg-gray-100 p-5 gap-40">
            <!-- Button Save UAT Table -->
            <button type="submit" id="saveButton"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 
        focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2 
        px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
        dark:focus:ring-blue-800">
                Save UAT Table
            </button>

            <!-- Button Generate PDF -->
            <a href="<?= isset($project['Id']) ? base_url('project-manager/generate-pdf/' . $project['Id']) : '#' ?>"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 
        focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-1/2 
        px-5 py-2.5 text-center inline-block dark:bg-green-600 dark:hover:bg-green-700 
        dark:focus:ring-green-800">
                Generate PDF
            </a>
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
                                <?php $no = 1; ?>
                                <!-- Form -->

                                <?php foreach ($features as $feature): ?>
                                    <tr>
                                        <input type="hidden" name="FeatureId[]" value="<?= $feature['Id'] ?>">
                                        <td class="p-3"><?= $no++ ?>.</td>
                                        </td>
                                        <td class="p-3"><?= $feature['Feature'] ?></td>
                                        <td class="p-3">
                                            <input type="date" name="UATDate[]" class="bg-white border text-black
                                        text-sm rounded-lg w-full p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                placeholder="UAT Date" value="<?= $feature['UATDate'] ?>">
                                        </td>
                                        <td class="p-3">
                                            <select name="ValidationStatus[]" class="bg-white border text-black text-sm rounded-lg w-full p-2.5 
                                    focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <option value="" selected>Status Validation Desnet</option>
                                                <option value="Worked" <?= $feature['ValidationStatus'] == 'Worked' ? 'selected' : '' ?>>Worked</option>
                                                <option value="Failed" <?= $feature['ValidationStatus'] == 'Failed' ? 'selected' : '' ?>>Failed</option>
                                            </select>
                                        </td>
                                        <td class="text-center p-3">
                                            <select name="ClientFeedbackStatus[]" class="bg-white border text-black text-sm rounded-lg w-full p-2.5 
                                    focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                <option value="" selected>Status Validation Client</option>
                                                <option value="Accepted" <?= $feature['ClientFeedbackStatus'] == 'Accepted' ? 'selected' : '' ?>>Accepted</option>
                                                <option value="Revision" <?= $feature['ClientFeedbackStatus'] == 'Revision' ? 'selected' : '' ?>>Revision</option>
                                            </select>
                                        </td>
                                        <td class="text-center p-3">
                                            <textarea id="message" rows="4" name="RevisionNotes[]" class="bg-white border text-black text-sm rounded-lg w-full p-2.5 
                                    focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Leave a comment..."><?= $feature['RevisionNotes'] ?></textarea>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
    </form>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>

    <script>
        document.getElementById('saveButton').addEventListener('click', function() {
            document.getElementById('mainForm').action = '/project-manager/manageproject/feature-uat';
        });
    </script>
</body>

</html>