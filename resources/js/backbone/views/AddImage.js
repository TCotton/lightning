LIGHTNING.View.AddImage = Backbone.View.extend(
    _.extend({}, LIGHTNING.Constants, LIGHTNING.Mixings, {

        el: '#input',

        events: {

            'change': 'submitImage'

        },

        initialize: function () {

            this.template = this.newTemplate('errorWrapper');

        },

        submitImage: function (e) {

            "use strict";

            var file, error, output;

            // remove previous html and return model to its default values

            this.model.clear().set(this.model.defaults);

            if (document.querySelector('.error')) {
                error = document.querySelector('.error');
                error.parentNode.removeChild(error);
            }
            if (document.querySelector('.output')) {
                output = document.querySelector('.output');
                output.parentNode.removeChild(output);
            }

            file = e.currentTarget.files[0];

            // validate uploaded file to see if it is the correct image type

            // if not then render the error template

            this.model.set('file', file.type, {
                validate: true
            });

            if (this.model.set('file').validationError !== null) {

                this.model.set('error', this.model.set('file').validationError);

                this.render();

            } else {

                this.model.set('image', file);
                this.model.set('start', new Date().getTime());

            }

            e.preventDefault();

        },

        render: function () {

            document.getElementById('wrapper').appendChild(this.stringToObject(this.template(this.model.toJSON()), 'error'));

            return this;

        }

    }));