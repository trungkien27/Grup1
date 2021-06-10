<?php
require_once '../layout/admin-header.php';
?>
    <head>
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;

        </style>
    </head>
    <body>
        <?php
        if (isset($_GET['url']) && !empty($_GET['url'])) {
            $url = $_GET['url'];
            unlink($url);
            ?>
            <div id="success-notify" class="box-content">
                <h1>Xóa ảnh thành công</h1>
                <a href="admin-gallery.php">Danh sách ảnh</a>
            </div>
        <?php } ?>
    </body>
</html>
