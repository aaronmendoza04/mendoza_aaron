<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Students CRUD</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Inter Font from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --bg-start: #1a1a2e;
            --bg-end: #0f0f23;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--bg-start) 0%, var(--bg-end) 100%);
            min-height: 100vh;
        }
        .gradient-button {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        }
        .gradient-header {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        }
        .table-row-hover:hover {
            transform: scale(1.01);
            background-color: rgba(102, 126, 234, 0.1);
        }
    </style>
</head>
<body class="text-slate-200">

    <nav class="bg-slate-900/95 backdrop-blur-lg border-b border-slate-700">
        <div class="container mx-auto flex items-center justify-between p-4">
            <a class="text-xl font-bold text-sky-400" href="/">Aaron Mendoza</a>
            <div class="flex items-center">
                <a class="px-4 py-2 font-medium rounded-lg text-slate-300 hover:text-sky-400 transition-colors" href="/">Home</a>
                <a class="px-4 py-2 font-medium rounded-lg text-sky-400 border-b-2 border-sky-400" href="/students">Students</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4 md:p-8 mt-8 bg-slate-800/80 rounded-2xl shadow-2xl border border-slate-700 backdrop-blur-sm animate-fade-in">

        <h1 class="text-center font-bold text-4xl text-sky-400 mb-6 drop-shadow-md">Students CRUD</h1>

        <?php if (!empty($message)): ?>
            <div class="p-4 mb-6 rounded-lg text-emerald-300 bg-emerald-900/50 border border-emerald-800 animate-slide-in-right" role="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>



        <form method="post" action="/students/save" class="mb-8">
            <input type="hidden" name="id" value="<?= isset($student['id']) ? htmlspecialchars($student['id']) : '' ?>" />
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <input type="text" name="last_name" class="w-full p-3 rounded-lg bg-slate-700/50 border border-slate-600 focus:outline-none focus:ring-2 focus:ring-sky-400" placeholder="Last Name" required value="<?= isset($student['last_name']) ? htmlspecialchars($student['last_name']) : '' ?>" />
                <input type="text" name="first_name" class="w-full p-3 rounded-lg bg-slate-700/50 border border-slate-600 focus:outline-none focus:ring-2 focus:ring-sky-400" placeholder="First Name" required value="<?= isset($student['first_name']) ? htmlspecialchars($student['first_name']) : '' ?>" />
                <input type="email" name="email" class="w-full p-3 rounded-lg bg-slate-700/50 border border-slate-600 focus:outline-none focus:ring-2 focus:ring-sky-400" placeholder="Email" required value="<?= isset($student['email']) ? htmlspecialchars($student['email']) : '' ?>" />
            </div>
            <div class="mt-4 flex flex-wrap gap-4">
                <button type="submit" class="gradient-button px-6 py-3 rounded-lg font-semibold text-white shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                    <?= isset($student['id']) ? 'Update Student' : 'Create Student' ?>
                </button>
                <?php if (isset($student['id'])): ?>
                    <a href="/students" class="px-6 py-3 rounded-lg font-semibold bg-slate-600 text-slate-200 shadow transition-all duration-300 transform hover:-translate-y-1 hover:bg-slate-500">Cancel</a>
                <?php endif; ?>
            </div>
        </form>

        <div class="overflow-x-auto rounded-xl shadow-lg bg-slate-900/80">
            <table class="w-full text-left">
                <thead class="gradient-header text-white font-semibold">
                    <tr>
                        <th class="p-4 rounded-tl-xl">ID</th>
                        <th class="p-4">Last Name</th>
                        <th class="p-4">First Name</th>
                        <th class="p-4">Email</th>
                        <th class="p-4 rounded-tr-xl">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-700">
                    <?php if (!empty($students)): ?>
                        <?php foreach ($students as $s): ?>
                            <tr class="table-row-hover">
                                <td class="p-4"><?= htmlspecialchars($s['id']) ?></td>
                                <td class="p-4"><?= htmlspecialchars($s['last_name']) ?></td>
                                <td class="p-4"><?= htmlspecialchars($s['first_name']) ?></td>
                                <td class="p-4"><?= htmlspecialchars($s['email']) ?></td>
                                <td class="p-4 flex flex-col sm:flex-row gap-2">
                                    <a href="/students/edit/<?= htmlspecialchars($s['id']) ?>" class="px-3 py-1 text-sm font-medium rounded-lg text-sky-400 border border-sky-400 hover:bg-sky-400 hover:text-white transition-colors duration-200">Edit</a>
                                    <a href="#" onclick="showDeleteModal('/students/delete/<?= htmlspecialchars($s['id']) ?>'); return false;" class="px-3 py-1 text-sm font-medium rounded-lg text-red-500 border border-red-500 hover:bg-red-500 hover:text-white transition-colors duration-200">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="p-4 text-center text-slate-400 italic">No students found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if (!empty($pagination_links)): ?>
            <div class="mt-6 px-2 sm:px-0 overflow-x-auto">
                <?= $pagination_links ?>
            </div>
        <?php endif; ?>


    </div>

    <!-- Custom Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="bg-slate-800 p-8 rounded-xl shadow-lg border border-slate-700 w-full max-w-sm transform scale-95 transition-transform duration-300">
            <h3 class="text-xl font-bold mb-4 text-white">Confirm Deletion</h3>
            <p class="text-slate-400 mb-6">Are you sure you want to delete this record? This action cannot be undone.</p>
            <div class="flex justify-end gap-3">
                <button id="cancelDelete" class="px-4 py-2 rounded-lg font-semibold bg-slate-600 text-slate-200 hover:bg-slate-500 transition-colors">Cancel</button>
                <a id="confirmDelete" href="#" class="px-4 py-2 rounded-lg font-semibold bg-red-600 text-white hover:bg-red-500 transition-colors">Delete</a>
            </div>
        </div>
    </div>

    <script>
        // Custom Delete Modal Logic
        const deleteModal = document.getElementById('deleteModal');
        const confirmDeleteButton = document.getElementById('confirmDelete');
        const cancelDeleteButton = document.getElementById('cancelDelete');

        function showDeleteModal(url) {
            confirmDeleteButton.href = url;
            deleteModal.classList.remove('hidden', 'opacity-0');
            deleteModal.classList.add('flex', 'opacity-100');
            // Animate the inner card
            setTimeout(() => {
                deleteModal.querySelector('div').classList.remove('scale-95');
                deleteModal.querySelector('div').classList.add('scale-100');
            }, 50);
        }

        function hideDeleteModal() {
            deleteModal.querySelector('div').classList.remove('scale-100');
            deleteModal.querySelector('div').classList.add('scale-95');
            setTimeout(() => {
                deleteModal.classList.remove('flex', 'opacity-100');
                deleteModal.classList.add('hidden', 'opacity-0');
            }, 300);
        }

        cancelDeleteButton.addEventListener('click', (e) => {
            e.preventDefault();
            hideDeleteModal();
        });

        // Hide modal when clicking outside of it
        deleteModal.addEventListener('click', (e) => {
            if (e.target === deleteModal) {
                hideDeleteModal();
            }
        });

        // Handle alert dismissal
        const alertElement = document.querySelector('[role="alert"]');
        if (alertElement) {
            setTimeout(() => {
                alertElement.style.opacity = '0';
                alertElement.style.transform = 'translateX(100%)';
                setTimeout(() => alertElement.remove(), 500);
            }, 5000); // Hides after 5 seconds
        }

    </script>
</body>
</html>
