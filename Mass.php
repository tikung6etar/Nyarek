<!-- This tools usefull when terminal or cmd function is disabled -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bulk Set Directory Permissions</title>
</head>
<body>
    <h1>Mass Set File and Directory Permissions</h1>
    <form method="post" action="">
        <label for="directory">Master Path:</label>
        <input type="text" id="directory" name="directory" placeholder="/home/willygoid/public_html" required>
        <label for="permission">Permission:</label>
        <input type="number" id="permission" name="permission" value="0777" required>
        <button type="submit">Set Permissions</button>
    </form>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $directory = $_POST['directory'];
        $permission = $_POST['permission'];

        function setPermissions($dir) {
            if (!is_dir($dir)) {
                throw new Exception("The provided path is not a directory");
            }

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::SELF_FIRST
            );

            foreach ($iterator as $item) {
                if ($item->isDir()) {
                    chmod($item, $permission);
                } else {
                    chmod($item, $permission);
                }
            }

            // Finally, set the top-level directory permissions
            chmod($dir, $permission);
        }

        try {
            setPermissions($directory);
            echo "<p>Permissions set to $permission for all files and directories in $directory</p>";
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    }
    ?>