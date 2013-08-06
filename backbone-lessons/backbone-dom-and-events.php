<!DOCTYPE html>
<html>
<head>
    <title>Lightning</title>

</head>
<body>
<div id="wrapper">
    <header data-role="header">header here</header>

    <form id="addTask" action="">

        <input type="text" placeholder="Your new task" />
        <input type="submit" value="Add task" />

    </form>

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


<!-- DOM & XHR utility -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- functional programming utility library -->
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.1/underscore-min.js"></script>
<!-- Backbone.js -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

<script id="taskTemplate" type="text/template">

    <span><%= title %></span>
    <button class="edit">Edit</button>
    <button class="delete">Delete</button>

</script>

<script>

(function () {

    var win = window;

    var LIGHTNING = win.LIGHTNING || {};

    LIGHTNING = {
        Models: {},
        Collections: {},
        Views: {}
    };

    win.template = function (id) {
        return _.template($('#' + id).html());
    };

    LIGHTNING.Models.Task = Backbone.Model.extend({
        defaults: {
            title: 'John Doe',
            priority: 1
        },
        validate: function (attrs) {

            if (!attrs.title.trim()) {

                return 'Please return a valid title';

            }

        }

    });

    LIGHTNING.Collections.Tasks = Backbone.Collection.extend({

        model: LIGHTNING.Models.Task

    });

    LIGHTNING.Views.Task = Backbone.View.extend({

        tagName: 'li',

        template: template('taskTemplate'),

        initialize: function () {

            this.model.on('change', this.render, this);
            this.model.on('destroy', this.remove, this);

        },

        events: {

            'click .edit': 'editTask',
            'click .delete': 'destroy'

        },

        editTask: function () {

            var newTaskTitle = prompt('What would you like to change the text to?', this.model.get('title'));

            this.model.set('title', newTaskTitle, {validate: true});

        },

        destroy: function () {

            this.model.destroy();

        },

        remove: function () {

            this.$el.remove();

        },

        render: function () {

            var template = this.template(this.model.toJSON());

            this.$el.html(template);
            return this;

        }

    });

    LIGHTNING.Views.Tasks = Backbone.View.extend({

        tagName: 'ul',

        initialize: function() {

            this.collection.on('add', this.addOne, this);

        },

        render: function () {

            this.collection.each(this.addOne, this);

            return this;

        },
        addOne: function (task) {

            var taskView = new LIGHTNING.Views.Task({model: task});

            this.$el.append(taskView.render().el);

        }

    });

    LIGHTNING.Views.AddTask = Backbone.View.extend({

        el: '#addTask',

        events: {

            'submit' : 'submit'

        },

        initialize: function() {



        },

        submit : function(e) {

            e.preventDefault();

            var newTaskTitle = $(e.currentTarget).find('input[type=text]').val();

            var task = new LIGHTNING.Models.Task({title: newTaskTitle});
            this.collection.add(task);

        }

    });


    var tasksCollection = new LIGHTNING.Collections.Tasks([

        {

            title: 'Go to the store',
            priority: 4

        },

        {

            title: 'Go to the mall',
            priority: 4

        },

        {

            title: 'Go to work',
            priority: 4

        }

    ]);

    var addTaskView = new LIGHTNING.Views.AddTask({collection: tasksCollection});

    var tasksView = new LIGHTNING.Views.Tasks({collection: tasksCollection});
    tasksView.render();
    document.body.appendChild(tasksView.el);



})();

</script>

<script src="resources/js/script.js"></script>

</body>
</html>