<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="http://wallpaper.huynq.net/">hWallpapers</a>

            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="http://wallpaper.huynq.net/">Home</a></li>
                    <li><a href="http://huynq.net/" target="_blank">Blog</a></li>
                    <li><a href="http://www.thugian360.com/" target="_blank">TG360</a></li>
                    <li><a href="mailto:huy@huynq.net">Contact</a></li>
                    <li><a href="#upload" role="button" data-toggle="modal">Upload</a></li>
                    <?php
                    if (isset($_GET['category']) || isset($_GET['pack'])) {
                        ?>
                        <li><a href="#buy" role="button" data-toggle="modal">Download all these wallpapers</a></li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>