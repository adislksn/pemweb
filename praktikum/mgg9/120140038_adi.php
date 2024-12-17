<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pemweb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CRUD Operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $conn->query("INSERT INTO data_table (name, email, date) VALUES ('$name', '$email', '$date')");
    }
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $conn->query("UPDATE data_table SET name='$name', email='$email', date='$date' WHERE id=$id");
    }
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $conn->query("DELETE FROM data_table WHERE id=$id");
    }
}

$result = $conn->query("SELECT * FROM data_table");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <!-- Tailwind CSS and Flowbite CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">CRUD Operations</h1>

        <!-- Form to Add/Update Data -->
        <div class="bg-white shadow-md rounded p-6 mb-6">
            <form method="POST" class="space-y-4">
                <input type="hidden" name="id" id="id">
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                        <input type="text" name="name" id="name" required
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <input type="email" name="email" id="email" required
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="date" class="block text-gray-700 font-medium mb-2">Date:</label>
                        <input type="date" name="date" id="date" required
                               class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" name="create" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Add
                    </button>
                    <button type="submit" name="update" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                        Update
                    </button>
                </div>
            </form>
        </div>

        <!-- Table to Display Data -->
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4"><?= $row['id'] ?></td>
                        <td class="px-6 py-4"><?= $row['name'] ?></td>
                        <td class="px-6 py-4"><?= $row['email'] ?></td>
                        <td class="px-6 py-4"><?= $row['date'] ?></td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button onclick="editRow(<?= $row['id'] ?>, '<?= $row['name'] ?>', '<?= $row['email'] ?>', '<?= $row['date'] ?>')"
                                    class="px-3 py-2 text-sm text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                Edit
                            </button>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="delete" class="px-3 py-2 text-sm text-white bg-red-500 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript to Populate Form for Editing -->
    <script>
        function editRow(id, name, email, date) {
            document.getElementById('id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            document.getElementById('date').value = date;
        }
    </script>
</body>
</html>
<?php
$conn->close();
?>
