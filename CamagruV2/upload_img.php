<!--protect page like the index !!!!!-->


<!DOCTYPE html>
<html>
    <head>
        <html lang='en'>
        <meta charset="UTF-8">
        <title>Upload Page</title>
    </head>

    <body>
    
        <!-- Streaming video on main + add fx-->
        <div class="video-wrap">
            <video id="video" playsinline autoplay></video>
        </div>

        <!-- Trigger canvas web API -->
        <div class="controller">
            <button id="snap">Capture</button>

            <!--add input config-->
            <form method="get">
                <p>If you don't have any Webcam, or it doesn't work, you can also <input id="file" type="file" name="filename" accept="image/gif, image/jpeg, image/png"></p>
                <button id="view">View</button>
            </form>

        </div>

        <!--Video SnapShot - display pic+fx on right side -->
        <canvas id="canvas" width="640" height="480"><canvas> 

        <script type="text/javascript" src="webcam/snapshot.js"></script>

    </body>
</html>