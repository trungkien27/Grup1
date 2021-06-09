<?php
require_once '../layout/admin-header.php';
?>
    <body>
        <div class="container" style="margin-top: 10px;">
        <?php
        if (isset($_GET['url']) && !empty($_GET['url'])) {
            $url = $_GET['url'];
            unlink($url);
            ?>
                <h2 class="text-center">Xóa ảnh thành công</h2>
                <a href="admin-gallery.php" style="text-align: center;">Danh sách ảnh</a>
         </div>
        <?php } ?>
    </body>
</html>
