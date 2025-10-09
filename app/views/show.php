<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List - Student Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #a5b4fc;
            --secondary-color: #8b5cf6;
            --accent-color: #06b6d4;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;

            --bg-primary: #ffffff;
            --bg-secondary: #f8fafc;
            --bg-tertiary: #f1f5f9;
            --bg-card: #ffffff;

            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;

            --border-color: #e2e8f0;
            --border-light: #f1f5f9;

            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);

            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Navigation */
        .nav {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            padding: 1rem 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-md);
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background: var(--bg-secondary);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .user-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
        }

        /* Header */
        .page-header {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-lg);
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .btn-secondary {
            background: var(--bg-card);
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: var(--bg-secondary);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        /* Search and Filters */
        .search-section {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }

        .search-form {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-input {
            flex: 1;
            min-width: 250px;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            background: var(--bg-primary);
            color: var(--text-primary);
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .btn-search {
            background: var(--primary-color);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-lg);
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-search:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        /* Table */
        .table-container {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }

        .table-header {
            background: var(--bg-secondary);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .table-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .table-count {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        thead {
            background: var(--bg-secondary);
        }

        th {
            padding: 1rem 1.5rem;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
        }

        tbody tr {
            transition: all 0.2s ease;
        }

        tbody tr:hover {
            background: var(--bg-secondary);
        }

        .student-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
        }

        .student-name {
            font-weight: 600;
            color: var(--text-primary);
        }

        .student-email {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-icon {
            width: 2rem;
            height: 2rem;
            border-radius: var(--radius-md);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-edit {
            background: var(--warning-color);
            color: white;
        }

        .btn-edit:hover {
            background: #d97706;
            transform: scale(1.1);
        }

        .btn-delete {
            background: var(--danger-color);
            color: white;
        }

        .btn-delete:hover {
            background: #dc2626;
            transform: scale(1.1);
        }

        /* Pagination */
        .pagination-container {
            display: flex !important;
            justify-content: center !important;
            align-items: center !important;
            gap: 0.5rem !important;
            margin-top: 2rem !important;
            padding: 1rem !important;
            flex-wrap: nowrap !important;
            line-height: 1 !important;
            flex-direction: row !important;
            white-space: nowrap !important;
        }

        .pagination-btn {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 2.5rem !important;
            height: 2.5rem !important;
            padding: 0.5rem 0.75rem !important;
            border: 1px solid var(--border-color) !important;
            background: var(--bg-card) !important;
            color: var(--text-secondary) !important;
            text-decoration: none !important;
            border-radius: var(--radius-md) !important;
            transition: all 0.2s ease !important;
            font-size: 0.875rem !important;
            font-weight: 500 !important;
            white-space: nowrap !important;
            float: none !important;
            clear: none !important;
        }

        .pagination-btn:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
            transform: translateY(-1px);
        }

        .pagination-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .pagination-btn.disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        .pagination-info {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin: 0 1rem;
            align-self: center;
        }

        /* Ensure pagination links don't break to new lines */
        .pagination-container a {
            display: inline-block !important;
        }

        /* Handle any whitespace or line breaks in HTML */
        .pagination-container * {
            box-sizing: border-box;
        }



        /* Target any potential line breaks or text nodes */
        .pagination-container br {
            display: none !important;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-secondary);
        }

        .empty-state i {
            font-size: 4rem;
            color: var(--text-muted);
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .page-header {
                padding: 1.5rem;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .search-section {
                padding: 1.5rem;
            }

            .search-form {
                flex-direction: column;
                align-items: stretch;
            }

            .search-input {
                min-width: auto;
            }

            .table-header {
                padding: 1rem 1.5rem;
                flex-direction: column;
                align-items: flex-start;
            }

            th, td {
                padding: 0.75rem 1rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.25rem;
            }

            .btn-icon {
                width: 100%;
                justify-content: center;
                padding: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.25rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.75rem;
            }

            .pagination-container {
                gap: 0.25rem;
            }

            .pagination-btn {
                width: 2rem;
                height: 2rem;
                font-size: 0.75rem;
            }
        }

        /* Loading Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-header, .search-section, .table-container {
            animation: fadeInUp 0.6s ease forwards;
        }

        .page-header { animation-delay: 0.1s; }
        .search-section { animation-delay: 0.2s; }
        .table-container { animation-delay: 0.3s; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Navigation -->
        <nav class="nav">
            <a href="/" class="nav-brand">Student Management</a>
            <div class="nav-links">
                <?php
                // Load Auth library to check login status
                lava_instance()->call->library('Auth');
                if (lava_instance()->auth->is_logged_in()) {
                    $user = lava_instance()->auth->get_user();
                    echo '<div class="user-info">';
                    echo '<div class="user-avatar">' . strtoupper(substr($user['email'], 0, 1)) . '</div>';
                    echo '<span>' . html_escape($user['email']) . '</span>';
                    echo '</div>';
                    echo '<a href="' . site_url('auth/logout') . '" class="nav-link">Logout</a>';
                } else {
                    echo '<a href="' . site_url('auth/login') . '" class="nav-link">Login</a>';
                }
                ?>
            </div>
        </nav>

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Students Directory</h1>
                <p class="page-subtitle">Manage and organize all student records</p>
            </div>
            <div class="header-actions">
                <a href="/" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </a>
                <?php if (lava_instance()->auth->has_role('admin')): ?>
                <a href="<?=site_url('users/create');?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
        </div>
                </a>
                <?php endif; ?>
            </div>

        <!-- Search Section -->
        <div class="search-section">
            <form class="search-form" action="<?= site_url('users/show'); ?>" method="get">
                <input
                    type="text"
                    name="q"
                    placeholder="Search by ID, name, or email..."
                    value="<?= html_escape($q ?? ''); ?>"
                    class="search-input"
                >
                <button type="submit" class="btn-search">
                    <i class="fas fa-search"></i>
                    Search
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="table-container">
            <div class="table-header">
                <h2 class="table-title">All Students</h2>
                <span class="table-count">
                    <?php if (isset($users) && is_array($users)): ?>
                        <?= count($users); ?> student<?= count($users) !== 1 ? 's' : ''; ?> found
                    <?php else: ?>
                        No students found
                    <?php endif; ?>
                </span>
            </div>

            <div class="table-responsive">
                <?php if (isset($users) && is_array($users) && count($users) > 0): ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Contact</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td>
                                        <div style="display: flex; align-items: center; gap: 1rem;">
                                            <div class="student-avatar">
                                                <?= strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)); ?>
                                            </div>
                                            <div>
                                                <div class="student-name">
                                                    <?= html_escape($user['first_name'] . ' ' . $user['last_name']); ?>
                                                </div>
                                                <div style="color: var(--text-muted); font-size: 0.75rem;">
                                                    ID: #<?= $user['id']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="student-email">
                                            <i class="fas fa-envelope" style="margin-right: 0.5rem; color: var(--text-muted);"></i>
                                            <?= html_escape($user['email']); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <?php if (lava_instance()->auth->has_role('admin')): ?>
                                            <a href="<?= site_url('users/update/'.$user['id']); ?>" class="btn-icon btn-edit" title="Edit Student">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= site_url('users/delete/'.$user['id']); ?>" class="btn-icon btn-delete" title="Delete Student" onclick="return confirm('Are you sure you want to delete this student record? This action cannot be undone.')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <?php else: ?>
                                            <span class="text-muted" style="font-size: 0.75rem; color: var(--text-muted);">View only</span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-users"></i>
                        <h3>No Students Found</h3>
                        <p>
                            <?php if (lava_instance()->auth->has_role('admin')): ?>
                                Start by adding your first student to the system.
                            <?php else: ?>
                                No student records are available for viewing.
                            <?php endif; ?>
                        </p>
                        <?php if (lava_instance()->auth->has_role('admin')): ?>
                        <a href="<?= site_url('users/create'); ?>" class="btn btn-primary" style="margin-top: 1rem;">
                            <i class="fas fa-plus"></i>
                            Add First Student
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Pagination -->
        <?php if (isset($page) && $page): ?>
            <div class="pagination-container" id="paginationContainer">
                <?= $page; ?>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // Add smooth scrolling for better UX
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add loading state for search
        document.querySelector('.search-form')?.addEventListener('submit', function() {
            const searchBtn = this.querySelector('.btn-search');
            const originalText = searchBtn.innerHTML;
            searchBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Searching...';
            searchBtn.disabled = true;

            // Re-enable after 2 seconds (in case of slow response)
            setTimeout(() => {
                searchBtn.innerHTML = originalText;
                searchBtn.disabled = false;
            }, 2000);
        });

        // Style pagination links
        document.addEventListener('DOMContentLoaded', function() {
            const paginationContainer = document.getElementById('paginationContainer');
            if (paginationContainer) {
                // Force horizontal layout
                paginationContainer.style.display = 'flex';
                paginationContainer.style.flexDirection = 'row';
                paginationContainer.style.justifyContent = 'center';
                paginationContainer.style.alignItems = 'center';
                paginationContainer.style.flexWrap = 'nowrap';
                paginationContainer.style.gap = '0.5rem';

                // Clear any existing content and rebuild
                const links = paginationContainer.querySelectorAll('a');
                const spans = paginationContainer.querySelectorAll('span');

                // Remove existing pagination info if any
                spans.forEach(span => span.remove());

                links.forEach(link => {
                    // Force inline-flex display
                    link.style.display = 'inline-flex';
                    link.style.alignItems = 'center';
                    link.style.justifyContent = 'center';

                    // Add pagination button class
                    link.classList.add('pagination-btn');

                    // Check if it's the current page (active)
                    if (link.innerHTML.trim() === '<?= isset($current_page) ? $current_page : 1; ?>') {
                        link.classList.add('active');
                    }

                    // Add disabled class for non-functional links
                    if (link.innerHTML.includes('First') || link.innerHTML.includes('Prev') || link.innerHTML.includes('Next') || link.innerHTML.includes('Last')) {
                        // You might want to check if these should be disabled based on your backend logic
                        // For now, we'll leave them as clickable
                    }
                });

                // Add pagination info if available
                <?php if (isset($total_pages) && isset($current_page)): ?>
                    const info = document.createElement('span');
                    info.className = 'pagination-info';
                    info.textContent = `Page <?= $current_page ?? 1; ?> of <?= $total_pages ?? 1; ?>`;
                    paginationContainer.appendChild(info);
                <?php endif; ?>
            }
        });
    </script>
</body>
</html>
