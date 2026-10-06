<?php
include "../db.php";

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $sql = "DELETE FROM vplaylist WHERE id = $id";
    mysqli_query($conn, $sql);
    header("Location: vplaylist_records.php");
    exit;
}

$result = mysqli_query(
    $conn,
    "SELECT id, title, artist, vsinger
     FROM vplaylist
     ORDER BY id DESC"
);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocaloid Playlist</title>
    <link rel="stylesheet" href="../custom/recordstyle.css">
</head>

<body>
<?php include "../nav.php"; ?>

<main class="records-container">
    <section class="records-header">
        <div>
            <p class="eyebrow">♫ YOUR COLLECTION</p>

            <h1>Vocaloid Playlist</h1>

            <p class="records-description">
                Manage the songs in your personal Vocaloid collection.
            </p>

        </div>

        <a href="vplaylist_add.php" class="add-button">
            + Add New Song
        </a>

    </section>

    <section class="playlist-card">
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Artist</th>
                        <th>Vocaloid Singer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td class="song-id">
                                    <?php echo (int)$row['id']; ?>
                                </td>
                                <td class="song-title">
                                    <?php echo htmlspecialchars($row['title']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($row['artist']); ?>
                                </td>
                                <td class="singer">
                                    <?php echo htmlspecialchars($row['vsinger']); ?>
                                </td>
                                <td class="actions">
                                    <a
                                        href="vplaylist_edit.php?id=<?php echo (int)$row['id']; ?>"
                                        class="edit-button"
                                    >
                                        Edit
                                    </a>

                                    <a
                                        href="vplaylist_records.php?delete=<?php echo (int)$row['id']; ?>"
                                        class="delete-button"
                                        onclick="return confirm('Delete this song?');"
                                    >
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="5" class="empty-message">
                                No songs found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

</body>

</html>