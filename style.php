<?php include 'settings.php'; ?>
<style>
        body {
            background: #f5f5f5;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(<?= $cols ?>, 1fr);
            /* gap: 15px; */
        }

        .frame{
            margin: 0 5vh;
        }
        /* Bọc iframe để tránh kéo trái phải */
        .frame-wrapper {
            width: 100%;
            overflow: hidden;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,.1);
            padding: 5px;
        }

        /* Make the box resizable vertically. Give a default height so resize works.
           Use overflow:auto so the CSS resize handle is shown and content can scroll. */
        .frame-box {
            resize: vertical;
            overflow: auto;
            min-height: 80vh;
            border: 1px solid #333;
            border-radius: 4px;
            background: #fff;
        }

        /* Iframe full width/height to fill its container */
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            display: block;
        }
</style>

