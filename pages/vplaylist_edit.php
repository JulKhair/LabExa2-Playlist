<?php
include "../db.php";

$message = "";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header("Location: vplaylist_records.php");
    exit;
}

if (isset($_POST['save'])) {

    $title = trim($_POST['title'] ?? '');
    $artist = trim($_POST['artist'] ?? '');
    $vsinger = trim($_POST['vsinger'] ?? '');

    if ($title === "" || $artist === "" || $vsinger === "") {
        $message = "Please fill in all fields.";
    } else {
        $title = mysqli_real_escape_string($conn, $title);
        $artist = mysqli_real_escape_string($conn, $artist);
        $vsinger = mysqli_real_escape_string($conn, $vsinger);
        $sql = "UPDATE vplaylist
                SET title='$title',
                    artist='$artist',
                    vsinger='$vsinger'
                WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            header("Location: vplaylist_records.php");
            exit;
        }
        $message = "Failed to update record: " . mysqli_error($conn);
    }
}

$result = mysqli_query(
    $conn,
    "SELECT title, artist, vsinger
     FROM vplaylist
     WHERE id=$id
     LIMIT 1"
);

if (mysqli_num_rows($result) === 0) {
    header("Location: vplaylist_records.php");
    exit;
}
$row = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit VPlaylist</title>
    <link rel="stylesheet" href="../custom/editstyle.css">
</head>

<body>
<?php include "../nav.php"; ?>

<main class="edit-container">
    <section class="edit-header">
        <p class="eyebrow">♫ EDIT SONG</p>
        <h1>Edit Song</h1>
        <p>
            Update the information of this song in your collection.
        </p>
    </section>

    <section class="form-card">
        <?php if ($message !== "") : ?>
            <div class="error-message">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label for="title">
                    Song Title
                </label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="<?php echo htmlspecialchars($row['title']); ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="artist">
                    Artist
                </label>
                <input
                    type="text"
                    id="artist"
                    name="artist"
                    value="<?php echo htmlspecialchars($row['artist']); ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="vsinger">
                    Vocaloid Singer
                </label>
                <input
                    type="text"
                    id="vsinger"
                    name="vsinger"
                    value="<?php echo htmlspecialchars($row['vsinger']); ?>"
                    required
                >
            </div>

            <div class="form-actions">
                <button
                    type="submit"
                    name="save"
                    class="update-button"
                >
                    Update Song
                </button>
                <a
                    href="vplaylist_records.php"
                    class="cancel-button"
                >
                    Cancel
                </a>
            </div>
        </form>
    </section>
</main>

</body>

</html>