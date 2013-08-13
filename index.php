<!DOCTYPE html>
<!--[if lte IE 9]>
<html lang="en" class="ie9">
<![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>Lightning: Upload an image, shrink it, create a data URI</title>

    <link rel="dns-prefetch" href="//use.typekit.net" />
    <link rel="dns-prefetch" href="//p.typekit.net" />
    <link rel="dns-prefetch" href="//images.lightning.gs" />

    <link rel='stylesheet' href='resources/css/styles.css?v=1'/>

    <script type="text/javascript">
        (function() {
            var config = {
                kitId: 'kcb7jsz',
                scriptTimeout: 3000
            };
            var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
        })();
    </script>


</head>
<body>
<!--[if lte IE 9]>
<div id="ie">This website only works in modern browsers<br />Try Firefox or Chrome instead</div>
<![endif]-->

<div id="title" class="clearfix" >
    <div id="inner-title">
        <div id="inner-title-h1">
            <h1>Lightning</h1>
            <img src="http://images.lightning.gs/lightning.png" alt="lightning bolt"/>
        </div>
        <h2>Upload an image, optimize the PNG, create a data URI</h2>
    </div>
</div>
<div id="wrapper">

    <div id="file-wrapper">
        <p>Click to browse for a file or drag and drop</p>
        <input type="file" id="input" draggable="true">
    </div>

    <div class="png-checkbox clearfix">
        <div class="checked-slider">
            <input type="checkbox" value="None" id="nopng" name="nopng" />
            <label for="nopng"></label>
            <p>Turn off PngCrush</p>
        </div>
    </div>

    <div class="output clearfix">
        <div id="instructions">
            <div id="inner-instructions">
                <p>Lightning.gs converts PNG, JPEG and Gif images to a data URI. If the image is a PNG it uses a client-side JavaScript port of PngCrush to optimise your image first.</p>
                <p>It works fine in Firefox and Chrome on Mac and Windows. It does work in IE10 but using client-side PngCrush in this browser takes forever and a day. Works fine using Mac Safari but not on Windows.</p>
            </div>
        </div>

        <img src="http://images.lightning.gs/main-image.png" alt="instructions" id="instructions-image"/>


        <div id="credits">
            <a href="http://andywalpole.me/">Created by Andy Walpole</a>
        </div>

    </div>


</div>

<div id="holding-image">

    <div id="holding-image-inner">

        <img src="http://images.lightning.gs/holding-image.png" alt="The PNG image is being optimized. Hold on, it's coming"/>

    </div>

</div>

<div id="holding-background"></div>


<script id="errorWrapper" type="text/template">

    <div class="inner-error">

        <img src="http://images.lightning.gs/error-message.png" width="783px" height="596px" alt="Mister, I hear if you upload anything other PNG, GIF or JPEGs then the sheriff is gonna start shooting kittens" />

    </div>

</script>

<script id="outputWrapper" type="text/template">

    <div class="left">
        <div class="image-name"><%- imageName %></div>
        <!-- end image-name -->

        <div class="dataURI">
            <pre><%= dataURI %></pre>
        </div>
        <!-- end dataURL -->

        <div class="image-info">

            <p><span>Original file size:</span> <%= originalImageSize %> bytes</p>

            <% if (fileSizeReduction !== null) { %>

                <p><span>After optimisation:</span> <%= fileSizeReduction %></p>

            <% } else { %>

                <p><span>No image optimisation has taken place</span></p>

            <% } %>

            <p><span>Data URI size:</span> <%= dataURIsize %> bytes</p>

            <% var elapsed = (end - start) / 1000 %>

            <p>Processed in <% print (elapsed) %> seconds</p>

            <% if (fileSizeReduction !== null && (originalImageSize < dataURIsize)) { %>

                <p class="last">If the image has been optimised then why is the returned data URI still
                    larger?</p>

                <p class="last-hidden">Data URIs are always bigger than an image. So, even though the image has been shrunk, once it is converted to a data URI it may still be larger</p>

            <% } %>

        </div>

    </div>
    <!-- end left -->
    <div class="right">

        <div class="right-image">

            <a href="<%= dataURI %>" download="<%- imageName %>">
                <img src="<%= dataURI %>"/>
            </a>

            <p>Left click on the above image to download</p>

        </div>

    </div>
    <!-- end right -->

</script>

<script src="resources/js/backbone/vender/jquery-underscore-bacbone.js"></script>
<script src="resources/js/backbone/config/config.js?v=1"></script>
<script src="resources/js/backbone/models/models.js?v=1"></script>
<script src="resources/js/backbone/views/AddImage.js?v=1"></script>
<script src="resources/js/backbone/views/Worker.js?v=1"></script>
<script src="resources/js/backbone/views/ImageDetails.js?v=1"></script>
<script src="resources/js/backbone/init/init.js?v=1"></script>


</html>