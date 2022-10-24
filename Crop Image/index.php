<!DOCTYPE html>
<html lang="en">
<head>
<title>Crop photo using PHP and jQuery</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/jquery.Jcrop.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>		<!-- =======   List of CDN Files Added ======== -->
</head>

<body>
    <div class="container">
       
        <div class="content">
            <span class="upload_btn" onclick="show_popup('popup_upload')">Click to upload photo</span>
            <div id="photo_container">							<!-- =======   Here Cropped Image is shown ======== -->
            </div>
        </div><!-- content -->    
        <div class="footer">
            <a href="http://www.google.com/" target="_blank">Crop photo using PHP and jQuery</a>
        </div><!-- footer -->
    </div><!-- container -->

    												<!-- =======    The popup modal for upload new photo  =======   -->
    <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Upload photo</h2>
            <form action="upload_photo.php" method="post" enctype="multipart/form-data" target="upload_frame" onsubmit="submit_photo()">
                <input type="file" name="photo" id="photo" class="file_input">
                <div id="loading_progress"></div>
                <input type="submit" value="Upload photo" id="upload_btn">
            </form>
            <iframe name="upload_frame" class="upload_frame"></iframe>
        </div>
    </div>

   													 <!--  =======   The popup for crop the uploaded photo  =======   -->
    <div id="popup_crop">
        <div class="form_crop">
            <span class="close" onclick="close_popup('popup_crop')">x</span>
            <h2>Crop photo</h2>
            <!-- This is the image we're attaching the crop to -->
            <img id="cropbox" />
            
           									 <!--  =======   This is the form that our event handler fills  =======   -->
            <form>
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <input type="hidden" id="photo_url" name="photo_url" />
                <input type="button" value="Crop Image" id="crop_btn" onclick="crop_photo()" />
            </form>
        </div>
    </div>
</body>
</html>
