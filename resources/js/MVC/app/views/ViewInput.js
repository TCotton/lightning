// ViewInput.js
// -------
define(["jquery", "backbone", "models/Model", "text!templates/heading.php"],

    function($, Backbone, Model, template){

        var ViewInput = Backbone.View.extend({

            // The DOM Element associated with this view
            className: ".heaven",

            // View constructor
            initialize: function() {

                // Calls the view's render method
                this.render();

            },

            // View Event Handlers
            events: {

                'change [id=input]': 'changeInput',
                'click [data-role=header]': 'click'

            },

            // Renders the view's template to the UI
            render: function() {

                // Setting the view's template property using the Underscore template method
                //this.template = _.template(template, {});

                // Dynamically updates the UI with the view's template
                //this.$el.html(this.template);

                // Maintains chainability
                return this;

            },

            changeInput: function(event){

                console.log('changed');

                event.preventDefault();

            },

            click: function() {

                console.log('click');

            }

        });

        // Returns the View class
        return ViewInput;

    }

);