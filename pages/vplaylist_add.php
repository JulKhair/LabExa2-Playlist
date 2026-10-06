<?php
include "../db.php";

$message = "";

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
        $sql = "INSERT INTO vplaylist (title, artist, vsinger)
                VALUES ('$title', '$artist', '$vsinger')";
        if (mysqli_query($conn, $sql)) {
            header("Location: vplaylist_records.php");
            exit;
        }
        $message = "Failed to save record: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add VPlaylist</title>
    <link rel="stylesheet" href="../custom/addstyle.css">
</head>

<body>
<?php include "../nav.php"; ?>

<main class="add-container">
    <section class="add-header">
        <p class="eyebrow">♫ NEW SONG</p>
        <h1>Add New Song</h1>
        <p>
            Add a Vocaloid song to your personal collection.
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
                    placeholder="Enter song title"
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
                    placeholder="Enter artist name"
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
                    placeholder="e.g. Hatsune Miku"
                    required
                >
            </div>

            <div class="form-actions">
                <button
                    type="submit"
                    name="save"
                    class="save-button"
                >
                    Save Song
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