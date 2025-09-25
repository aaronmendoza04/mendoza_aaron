<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - Student Management System</title>
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
            padding: 2rem 1rem;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        /* Header */
        .page-header {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            text-align: center;
        }

        .page-icon {
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--warning-color), #f59e0b);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin: 0 auto 1.5rem;
        }

        .page-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--text-secondary);
            font-size: 1rem;
            margin-bottom: 0;
        }

        /* Student Info Card */
        .student-info {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .student-avatar {
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .student-details h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.25rem;
        }

        .student-details p {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .student-id {
            background: var(--bg-secondary);
            color: var(--primary-color);
            padding: 0.25rem 0.75rem;
            border-radius: var(--radius-md);
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
        }

        /* Form Container */
        .form-container {
            background: var(--bg-card);
            border-radius: var(--radius-xl);
            padding: 2.5rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }

        .form-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-description {
            color: var(--text-secondary);
            font-size: 0.875rem;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        label {
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .required {
            color: var(--danger-color);
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-lg);
            background: var(--bg-primary);
            color: var(--text-primary);
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        input[type="text"]:invalid,
        input[type="email"]:invalid {
            border-color: var(--danger-color);
        }

        input[type="text"]:valid,
        input[type="email"]:valid {
            border-color: var(--success-color);
        }

        /* Input Icons */
        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 1rem;
        }

        .input-with-icon {
            padding-right: 3rem;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-light);
        }

        .btn {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
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
            background: linear-gradient(135deg, var(--warning-color), #f59e0b);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-primary:hover {
            background: #d97706;
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

        .btn-danger {
            background: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-2px);
        }

        /* Progress Indicator */
        .progress-container {
            margin-bottom: 2rem;
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: var(--bg-secondary);
            border-radius: 2px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--warning-color), var(--accent-color));
            border-radius: 2px;
            transition: width 0.3s ease;
            width: 0%;
        }

        .progress-fill.filling {
            width: 100%;
        }

        /* Success/Error Messages */
        .message {
            padding: 1rem;
            border-radius: var(--radius-lg);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        .message-success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--success-color);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .message-error {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger-color);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .message i {
            font-size: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .container {
                max-width: 100%;
            }

            .page-header {
                padding: 1.5rem;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .student-info {
                padding: 1.5rem;
                flex-direction: column;
                text-align: center;
            }

            .form-container {
                padding: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 1.25rem;
            }

            .btn {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .page-header {
            animation: fadeInUp 0.6s ease forwards;
        }

        .student-info {
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: 0.1s;
        }

        .form-container {
            animation: fadeInUp 0.6s ease forwards;
            animation-delay: 0.2s;
        }

        .form-group {
            animation: slideInLeft 0.5s ease forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.4s; }
        .form-group:nth-child(2) { animation-delay: 0.5s; }
        .form-group:nth-child(3) { animation-delay: 0.6s; }

        .form-actions {
            animation: fadeInUp 0.5s ease forwards;
            animation-delay: 0.8s;
            opacity: 0;
        }

        /* Focus styles for accessibility */
        .btn:focus,
        input:focus {
            outline: 2px solid var(--primary-color);
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <div class="page-icon">
                <i class="fas fa-user-edit"></i>
            </div>
            <h1 class="page-title">Edit Student</h1>
            <p class="page-subtitle">Update the student's information below</p>
        </div>

        <!-- Student Info Card -->
        <div class="student-info">
            <div class="student-avatar">
                <?= strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)); ?>
            </div>
            <div class="student-details">
                <h3><?= html_escape($user['first_name'] . ' ' . $user['last_name']); ?></h3>
                <p><i class="fas fa-envelope" style="margin-right: 0.5rem; color: var(--text-muted);"></i><?= html_escape($user['email']); ?></p>
                <span class="student-id">ID: #<?= $user['id']; ?></span>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <div class="form-header">
                <h2 class="form-title">Update Information</h2>
                <p class="form-description">Make the necessary changes to the student record.</p>
            </div>

            <!-- Success/Error Messages -->
            <?php if (isset($_GET['success'])): ?>
                <div class="message message-success">
                    <i class="fas fa-check-circle"></i>
                    Student updated successfully!
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="message message-error">
                    <i class="fas fa-exclamation-circle"></i>
                    Error updating student. Please try again.
                </div>
            <?php endif; ?>

            <form action="<?=site_url('users/update/' . $user['id']);?>" method="post" id="studentForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">
                            First Name <span class="required">*</span>
                        </label>
                        <div class="input-group">
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                value="<?=html_escape($user['first_name']);?>"
                                required
                                placeholder="Enter first name"
                                class="input-with-icon"
                            >
                            <i class="fas fa-user input-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="last_name">
                            Last Name <span class="required">*</span>
                        </label>
                        <div class="input-group">
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                value="<?=html_escape($user['last_name']);?>"
                                required
                                placeholder="Enter last name"
                                class="input-with-icon"
                            >
                            <i class="fas fa-user input-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">
                        <i class="fas fa-envelope" style="margin-right: 0.25rem;"></i>
                        Email Address <span class="required">*</span>
                    </label>
                    <div class="input-group">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="<?=html_escape($user['email']);?>"
                            required
                            placeholder="Enter email address"
                            class="input-with-icon"
                        >
                        <i class="fas fa-at input-icon"></i>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="<?=site_url('users/show');?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Cancel
                    </a>
                    <a href="<?=site_url('users/delete/' . $user['id']);?>"
                       class="btn btn-danger"
                       onclick="return confirm('Are you sure you want to delete this student? This action cannot be undone.')">
                        <i class="fas fa-trash"></i>
                        Delete
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Update Student
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('studentForm');
            const progressFill = document.getElementById('progressFill');

            // Animate progress bar on load
            setTimeout(() => {
                progressFill.classList.add('filling');
            }, 500);

            // Real-time validation
            const inputs = form.querySelectorAll('input[required]');

            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.style.borderColor = 'var(--success-color)';
                    } else if (this.value.length > 0) {
                        this.style.borderColor = 'var(--danger-color)';
                    } else {
                        this.style.borderColor = 'var(--border-color)';
                    }
                });

                input.addEventListener('blur', function() {
                    if (this.value.length === 0) {
                        this.style.borderColor = 'var(--border-color)';
                    }
                });
            });

            // Form submission enhancement
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('.btn-primary');
                const originalText = submitBtn.innerHTML;

                // Disable button and show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';

                // Re-enable after 3 seconds (in case of slow response)
                setTimeout(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }, 3000);
            });

            // Auto-focus first input
            const firstInput = form.querySelector('input');
            if (firstInput) {
                firstInput.focus();
            }
        });

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
    </script>
</body>
</html>