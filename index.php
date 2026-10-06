<?php
include "db.php";

$countResult = mysqli_query($conn, "SELECT COUNT(*) AS c FROM vplaylist");
$title = mysqli_fetch_assoc($countResult)['c'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocaloid Playlist</title>
    <link rel="stylesheet" href="custom/style.css">
</head>

<body>

<?php include "nav.php"; ?>

<main class="home-container">
    <section class="welcome">
        <p class="eyebrow">♫ VOCALOID PLAYLIST</p>

        <h1>Your Personal<br>Vocaloid Playlist</h1>

        <p class="description">
            Organize your favorite Vocaloid songs in one simple
            and personal collection.
        </p>

        <div class="actions">

            <a href="pages/vplaylist_records.php" class="btn primary">
                View Playlist
            </a>

            <a href="pages/vplaylist_add.php" class="btn secondary">
                Add New Song
            </a>

        </div>

    </section>


    <section class="song-count">

        <span class="count-number">
            <?php echo (int)$title; ?>
        </span>

        <span class="count-label">
            Songs in your collection
        </span>

    </section>

</main>

</body>

</html>