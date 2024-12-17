<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pemweb";
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$totalResult = $conn->query("SELECT COUNT(*) as total FROM data_table");
$totalRows = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);

$sql = "SELECT * FROM data_table LIMIT $start, $limit";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table with Pagination</title>
    <!-- Tailwind CSS and Flowbite CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Data Table</h1>

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $rowCount = 0;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr class='bg-white border-b'>
                                    <td class='px-6 py-4'>{$row['id']}</td>
                                    <td class='px-6 py-4'>{$row['name']}</td>
                                    <td class='px-6 py-4'>{$row['email']}</td>
                                    <td class='px-6 py-4'>{$row['date']}</td>
                                  </tr>";
                            $rowCount++;
                        }
                    }
                    // Fill remaining rows to make it exactly 10 rows
                    for ($i = $rowCount; $i < $limit; $i++) {
                        echo "<tr class='bg-white border-b'>
                                <td class='px-6 py-4'>&nbsp;</td>
                                <td class='px-6 py-4'>&nbsp;</td>
                                <td class='px-6 py-4'>&nbsp;</td>
                                <td class='px-6 py-4'>&nbsp;</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center mt-4 space-x-2">
            <a href="?page=<?= max($page - 1, 1) ?>" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 <?= $page <= 1 ? 'opacity-50 pointer-events-none' : '' ?>">Sebelumnya</a>
            <span class="text-sm text-gray-700">Halaman <?= $page ?> dari <?= $totalPages ?></span>
            <a href="?page=<?= min($page + 1, $totalPages) ?>" class="px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded hover:bg-blue-600 <?= $page >= $totalPages ? 'opacity-50 pointer-events-none' : '' ?>">Selanjutnya</a>
        </div>
    </div>

</body>
</html>
<?php
$conn->close();
?>
