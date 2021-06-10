	<div class="container" style="margin-top:10%;">
<?php
$title ="Nail | Gallery";
include_once('../layout/header.php');
?>
 <link rel="stylesheet" type="text/css" href="style.css">
 <style type="text/css">
 	    #gallery1 {
        display: table;
    }
    #gallery1 li{
        list-style: none;
        float: left;
        width: 23%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        margin: 10px 1%;
    }
    #gallery1 li img{
        width: 180px;
        height: 230px;
    }
    .clear-both{
        clear: both;
    }
    #gallery1 li input{
        width: 100%;
    }
 </style>
 <body style="background-color: #f8f8f8;">
	<div class="container" style="margin-top:10%; background-color: #f8f8f8;">

		<h1><span class="title">gallery</span></h1>
		<div class="gallery">
			<ul>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/01.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/02.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/03.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/04.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/05.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/06.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/07.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/08.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/09.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/10.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/11.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/12.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/13.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/14.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/15.jpg" alt="">
					</a>
				</li>
				<li>
					<a href="gallery-single-post.html">
						<img src="../pic/16.jpg" alt="">
					</a>
				</li>
			</ul>
		</div>
	</div> <?php
            $baseURL = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $allFiles = getAllFiles();
            if (!empty($allFiles)) {
                ?>
                <ul id="gallery1">
                    <?php foreach ($allFiles as $file) { ?>
                        <li>
                            <img src="<?= $file ?>"/>
                            <input style="display: none;" readonly="" type="text" value="<?= $baseURL .'/'. $file ?>" />
                            <a style="display: block; text-align: center;" href="../admin/admin-gallery-delete.php?url=<?=  urlencode($file)?>">Xóa</a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
</body>
<?php 
include_once('../layout/footer.php');
?>