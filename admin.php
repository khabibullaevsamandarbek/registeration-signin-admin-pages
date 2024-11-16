<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    session_start();
    include '../config/config.php';

    if (!isset($_SESSION['id']) || $_SESSION['role'] != "admin") {
        echo "
        <div class='alert alert-danger m-3' role='alert'>
            For Admins Only!!
        </div>
        ";
        return;
    }

    $stmt = $pdo->prepare("SELECT id , username , email , role FROM users");
    $stmt->execute();
    $user = $stmt->fetchAll();

    session_abort();
    ?>

    <div class="navbar bg-default">
        <div class="container-sm">
            <h1 class="navbar-brand fs-2">Admin Dashboard</h1>
            <nav class="navbar navbar-nav d-flex flex-row gap-2">
                <a href="login.php" class="fs-7" name="log-out-btn">Log Out</a>
                <a href="login.php" type="button" class="btn btn-warning fs-7">Log In</a>
                <a href="register.php" type="button" class="btn btn-warning fs-7">Sign In</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']) ?></td>
                        <td><?php echo htmlspecialchars($row['username']) ?></td>
                        <td><?php echo htmlspecialchars($row['email']) ?></td>
                        <td><?php echo htmlspecialchars($row['role']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>