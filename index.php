<!DOCTYPE html>
<html>
<head>

    <title>Lightning</title>
    <link rel='stylesheet' href='resources/css/styles.css'/>

</head>
<body>
<div id="wrapper">

    <div id="file-wrapper">
        <p>Click to browse for file</p>
        <![if !IE]>
        <input type="file" id="input">
        <![endif]>
    </div>

</div>


<script id="errorWrapper" type="text/template">

    <%= error %>

</script>

<script id="outputWrapper" type="text/template">

    <div class="left">
        <div class="image-name"><%- imageName %></div>
        <!-- end image-name -->

        <div class="dataURI">
            <pre><%- dataURI %></pre>
        </div>
        <!-- end dataURL -->

        <div class="image-info">

            <p>Original file size: <%= originalImageSize %> bytes</p>

            <% if (fileSizeReduction !== null) { %>

                <p>After optimisation: <%= fileSizeReduction %></p>

            <% } else { %>

                <p>No image optimisation has taken place</p>

            <% } %>

            <p>Data URI size: <%= dataURIsize %> bytes</p>

            <% var elapsed = (end - start) / 1000 %>

            <p>Processed in <% print (elapsed) %> seconds</p>

            <% if (fileSizeReduction !== null && (originalImageSize < fileSizeReduction)) { %>

                    <p>If the image has been optimised then why is the data URI bytes still more than the original
                        image?</p>

                <% } %>

        </div>

    </div>
    <!-- end left -->
    <div class="right">

        <a href="<%- dataURI %>" download="<%- imageName %>"><img src="<%- dataURI %>" alt="<%- dataURI %>"/></a>

        <p>Left click on image above to download</p>

    </div>
    <!-- end right -->

</script>


<!-- DOM & XHR utility -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- functional programming utility library -->
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.1/underscore-min.js"></script>
<!-- Backbone.js -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

<script src="resources/js/backbone/config/config.js"></script>
<script src="resources/js/backbone/models/models.js"></script>
<script src="resources/js/backbone/views/AddImage.js"></script>
<script src="resources/js/backbone/views/Worker.js"></script>
<script src="resources/js/backbone/views/ImageDetails.js"></script>
<script src="resources/js/backbone/init/init.js"></script>

</body>
</html>