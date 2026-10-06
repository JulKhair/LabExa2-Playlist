<?php

$scriptDir = dirname($_SERVER['SCRIPT_NAME']);

$basePath = basename($scriptDir) === 'pages'
    ? dirname($scriptDir)
    : $scriptDir;

?>

<nav
    style="
        display: flex;
        justify-content: center;
        padding: 16px;
        margin-bottom: 40px;
        border-bottom: 1px solid #2a2e3a;
        background: #181b24;
    "
>

    <div
        style="
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            width: min(1100px, 92%);
            flex-wrap: wrap;
        "
    >

        <a
            href="<?php echo $basePath; ?>/index.php"
            style="
                color: #f5f7fa;
                font-size: 16px;
                font-weight: bold;
                letter-spacing: 1px;
                text-decoration: none;
            "
        >
            ♫ VOCALOID
        </a>


        <div
            style="
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
            "
        >

            <a
                href="<?php echo $basePath; ?>/index.php"
                style="
                    padding: 9px 13px;
                    border-radius: 7px;
                    color: #9ca3af;
                    font-size: 14px;
                    font-weight: bold;
                    text-decoration: none;
                "
            >
                Main Menu
            </a>


            <a
                href="<?php echo $basePath; ?>/pages/vplaylist_records.php"
                style="
                    padding: 9px 13px;
                    border-radius: 7px;
                    color: #9ca3af;
                    font-size: 14px;
                    font-weight: bold;
                    text-decoration: none;
                "
            >
                Vocaloid Playlist
            </a>


            <a
                href="<?php echo $basePath; ?>/pages/vplaylist_add.php"
                style="
                    padding: 9px 13px;
                    border-radius: 7px;
                    color: #9ca3af;
                    font-size: 14px;
                    font-weight: bold;
                    text-decoration: none;
                "
            >
                Add Song
            </a>
        </div>
    </div>
</nav>