<?php
require_once '../utils/utility.php';
require_once '../layout/admin-header.php';
?>
<style>
    #gallery{
        display: table;
    }

    #gallery li{
        list-style: none;
        float: left;
        width: 23%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        margin: 10px 1%;
    }

    #gallery li img{
        width: 230px;
        height: 230px;
    }

    #gallery li input{
        width: 100%;
    }

</style>
    <body>
        <div class="container" style="margin-top: 10px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Quản lý thư viện ảnh </h2>
            </div>
            <form id="upload-file-form" action="?upload=file" method="POST" enctype="multipart/form-data" style="margin-left: 20%; margin-top: 40px; margin-bottom: 30px;"> 
                <label style="margin-right: 7%;font-weight: bold;">Chọn hình ảnh: </label>
                <input multiple type="file" name="file_upload[]" />
                <input type="submit" value="Tải ảnh lên" />
            </form>
        <?php
        if (isset($_GET['upload']) && $_GET['upload'] == 'file') {
            $uploadedFiles = $_FILES['file_upload'];
            $errors = uploadFiles($uploadedFiles);
            if (!empty($errors)) {
                print_r($errors);
                exit;
            } else {
                echo "Tải lên thành công. <a  href='admin-gallery.php'>Xem lại thư viện ảnh</a>";
            }
            /**
             * Chú ý khi upload file
             * Trong file php.ini có các thông số max như sau: 
             * post_max_size = 8M // Dung lượng lớn nhất cho một lần upload
             * upload_max_filesize = 2M //Dung lượng file cho phép lớn nhất
             * max_file_uploads = 20 //Số lượng file upload tối đa
             * Các bạn muốn upload nhiều hơn thì thay các thông số này và restart lại wamp hoặc xamp
             */
        } else {
            ?>
	
            	<h2 class="text-center">Danh sách ảnh</h2>
            <?php
            $baseURL = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $allFiles = getAllFiles();
            if (!empty($allFiles)) {
                ?>
                <ul id="gallery">
                    <?php foreach ($allFiles as $file) { ?>
                        <li>
                            <img src="<?= $file ?>"/>
                            <input style="display: none;" readonly="" type="text" value="<?= $baseURL .'/'. $file ?>" />
                            <a style="display: block; text-align: center;" href="admin-gallery-delete.php?url=<?=  urlencode($file)?>">Xóa</a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        <?php } ?>
	    </div>
	</div>
    </body>
</html>
