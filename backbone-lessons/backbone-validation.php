<!DOCTYPE html>
<html>
<head>
    <title>Lightning</title>

    <script>

        /*

         (function (ua, w, d, undefined) {

         // App Environment
         // ---------------
         // Tip: Set to true to turn on "production" mode
         var production = false,
         config = {

         // Loaded when not in production mode
         "dev-css": ["resources/css/styles.css"],

         // Loaded when in production mode
         "prod-css": ["css/app.min.css"],

         // Loaded when not in production mode
         "dev-js": [
         { "data-main": "resources/js/MVC/app/config/Init.js", "src": "resources/js/MVC/libs/require.js" }
         ],

         // Loaded when in production mode
         "prod-js": ["resources/js/MVC/app/config/Init.min.js"]


         };

         // Loads the correct CSS and JavaScript files
         loadFiles(config);

         function loadCSS(urls, callback) {

         var x, link;

         for (x = 0; x <= urls.length - 1; x += 1) {

         link = d.createElement("link");

         link.type = "text/css";

         link.rel = "stylesheet";

         link.href = urls[x];

         d.getElementsByTagName("head")[0].appendChild(link);

         }

         if (callback) callback();

         }

         function loadJS(files, callback) {

         var x, script, file;

         for (x = 0; x <= files.length - 1; x += 1) {

         file = files[x];

         script = d.createElement("script");

         if (((typeof file).toLowerCase()) === "object" && file["data-main"] !== undefined) {

         script.setAttribute("data-main", file["data-main"]);

         script.async = true;

         script.src = file.src;

         }

         else {

         script.src = file;

         }

         d.getElementsByTagName("head")[0].appendChild(script);

         }

         if (callback) callback();

         }

         function loadFiles(obj, callback) {

         if (production) {

         // Loads the production CSS file(s)
         loadCSS(obj["prod-css"], function () {

         // If there are production JavaScript files to load
         if (obj["prod-js"]) {

         // Loads the correct initialization file (which includes Almond.js)
         loadJS(obj["prod-js"], callback);

         }

         });

         }

         // Else if your app is in development mode
         else {

         // Loads the development CSS file(s)
         loadCSS(obj["dev-css"], function () {

         // If there are development Javascript files to load
         if (obj["dev-js"]) {

         // Loads Require.js and tells Require.js to find the correct intialization file
         loadJS(obj["dev-js"], callback);

         }

         });

         }

         }

         })(navigator.userAgent || navigator.vendor || window.opera, window, window.document);
         */


    </script>

    <!--

    <script src="resources/js/main-script.js"></script>

    -->


</head>
<body>
<div id="wrapper">
    <header data-role="header">header here</header>

    <pre id="console">Loading, please wait ...</pre>
    <div id="output">
        <div class="inner"></div>
    </div>

    <![if !IE]>
    <input type="file" id="input" accept="image/png, image/jpeg, image/jpg, image/gif">
    <![endif]>

    <div class="example"></div>

    <footer data-role="footer"></footer>

</div>

<!--
<script src="resources/js/script.js"></script>
-->
<!-- DOM & XHR utility -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- functional programming utility library -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/lodash.js/1.3.1/lodash.underscore.js"></script>
<!-- Backbone.js -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

<script>



    var Person = Backbone.Model.extend({
        defaults: {
            name: 'John Doe',
            age: 30,
            occupation: 'worker'
        },

        validate: function (attrs) {

            if (attrs.age < 0) {
                return 'Age must be positive, stupid.';
            }

            if (!attrs.name) {
                return 'Every person must have a name, fool.';
            }
        },

        work: function () {
            return this.get('name') + ' is working.';
        }

    });


    var person = new Person;

    person.on('invalid', function (model, error) {

        console.log(error);

    });

    console.log(person.work());

    console.log(person.get('name'));

    person.set('name', 'Andy Walpole');

    console.log(person.get('name'));

    person.set('age', -50, {validate: true});

    person.set('name', '', {validate: true});

    //console.log(person.get('age'));

</script>

</body>
</html>

