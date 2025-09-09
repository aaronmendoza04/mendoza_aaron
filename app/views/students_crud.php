<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Students CRUD</title>
    <link rel="stylesheet" href="/public/css/style.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/students"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Students CRUD</h1>

        <?php if (!empty($message)): ?>
            <div class="alert alert-success" role="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/students/save" class="mb-4">
            <input type="hidden" name="id" value="<?= isset($student['id']) ? htmlspecialchars($student['id']) : '' ?>" />
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required value="<?= isset($student['last_name']) ? htmlspecialchars($student['last_name']) : '' ?>" />
                </div>
                <div class="col-md-4">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required value="<?= isset($student['first_name']) ? htmlspecialchars($student['first_name']) : '' ?>" />
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" placeholder="Email" required value="<?= isset($student['email']) ? htmlspecialchars($student['email']) : '' ?>" />
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary me-2">
                    <?= isset($student['id']) ? 'Update Student' : 'Create Student' ?>
                </button>
                <?php if (isset($student['id'])): ?>
                    <a href="/students" class="btn btn-secondary">Cancel</a>
                <?php endif; ?>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($students)): ?>
                        <?php foreach ($students as $s): ?>
                            <tr>
                                <td><?= htmlspecialchars($s['id']) ?></td>
                                <td><?= htmlspecialchars($s['last_name']) ?></td>
                                <td><?= htmlspecialchars($s['first_name']) ?></td>
                                <td><?= htmlspecialchars($s['email']) ?></td>
                                <td>
                                    <a href="/students/edit/<?= htmlspecialchars($s['id']) ?>" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                                    <a href="/students/delete/<?= htmlspecialchars($s['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?');">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No students found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="/public/js/script.js"></script>
</body>
</html>
