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
    <aside class="w-64 bg-white shadow-md min-h-screen fixed">
        <?= $this->include('projectmanager/sidebar') ?>
    </aside>

    <div class="flex-1 flex flex-col pl-64">
        <!-- Header -->
        <header class="fixed top-0 w-[calc(100%-16rem)] shadow-md z-50">
            <?= $this->include('projectmanager/header') ?>
        </header>
    </div>

    <!-- Manage Project Section -->
    <div class="bg-white mt-[125px] ml-[275px] mr-[20px] p-6 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-center">Manage Features</h2>
        <p class="mt-[5px] text-gray-400 text-center text-sm">Company Profile</p>

        <form action="<?= site_url('project-features/save') ?>" method="post" class="mt-6">

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-lg text-sm px-5 py-2.5">
                Make UAT Table
            </button>

            <!-- Feature List -->
            <div id="feature-list" class="mt-4">
                <div class="feature-item flex gap-2 mb-2">
                    <span class="feature-number font-bold ">1.</span>
                    <input type="text" name="features[]" class="border p-2 w-full rounded" placeholder="Masukkan fitur" required>
                    <button type="button" onclick="removeFeature(this)" class="bg-red-500 text-white px-4 py-2 rounded-lg">Delete</button>
                </div>
            </div>

            <!-- Add Feature Button -->
            <button type="button" onclick="addFeature()" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4">Add Feature</button>
        </form>
    </div>
    </main>

    <!-- JavaScript -->
    <script>
        function addFeature() {
            let container = document.getElementById("feature-list");
            let div = document.createElement("div");
            div.classList.add("feature-item", "flex", "gap-2", "mb-2");

            let featureNumber = container.children.length + 1;

            div.innerHTML = `
                <span class="feature-number font-bold">${featureNumber}.</span>
                <input type="text" name="features[]" class="border p-2 w-full rounded" placeholder="Input feature" required>
                <button type="button" onclick="removeFeature(this)" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            `;
            container.appendChild(div);
            updateFeatureNumbers();
        }

        function removeFeature(button) {
            button.parentElement.remove();
            updateFeatureNumbers();
        }

        function updateFeatureNumbers() {
            let featureItems = document.querySelectorAll(".feature-item .feature-number");
            featureItems.forEach((item, index) => {
                item.textContent = (index + 1) + ".";
            });
        }
    </script>

</body>

</html>