var LIGHTNING = window.LIGHTNING || {};

LIGHTNING = {
    Model: {},
    Collection: {},
    View: {}
};

LIGHTNING.Constants = {

    URL: window.URL || window.webkitURL,
    worker: new Worker('resources/js/worker.js'),
    mimeArray: ['image/png, image/jpeg, image/jpg, image/gif']

};


LIGHTNING.Mixings = {

    newTemplate: function (id) {

        return _.template(document.getElementById(id).textContent);

    },

    getImage: function (fileData, imageType) {

        "use strict";

        var src, view, binary, i, l;

        if (imageType !== 0) {

            // if PNG object to data URI

            view = new Uint8Array(fileData);

            binary = '';
            for (i = 0, l = view.length; i < l; i += 1) {
                binary += String.fromCharCode(view[i]);
            }

            src = 'data:' + this.model.get('imageType') + ';base64,' + btoa(binary);

        } else {

            src = fileData;

        }

        // set to memory the size of the data URI

        this.model.set('dataURIsize', encodeURI(src).split(/%..|./).length - 1);

        // retun the data URI

        return src;

    },

    stringToObject: function(value, classes){

        var newElement = document.createElement('div');
        newElement.className = classes;
        newElement.innerHTML = value;

        return newElement;

    }

};