var Vue = require('vue');

new Vue({

    el: '#postcodeSearch',

    data: {
        postcode: ''
    },

    methods: {

        parsePostcode: function(postcode) {
            var parsed = '',
                l;

            // Remove any typed spaces
            postcode = postcode.replace(/\s/g, "");     ///TODO: replace any non alphanumerics
            l = postcode.length;

            // Error checks
            if (l === 0) return '';
            if (l < 5) {
                console.log('Error: postcode is too short');
                return '';
            }
            if (l > 7) {
                console.log('Error: postcode is too long');
                return '';
            }
            
            // Add any necessary padding spaces (length 5 or 6)
            if (l === 5) return postcode.substring(0, 2) + '  ' + postcode.substring(2, 5);
            if (l === 6) return postcode.substring(0, 3) + ' ' + postcode.substring(3, 6);
            return postcode;
        },

        getPostcode: function(e) {
            // Prevent submission and re-initialisation of form
            e.preventDefault();

            // Set the correct number of spaces in postcode for database
            this.postcode = this.parsePostcode(this.postcode);

            // Make the API call
        }

    }
});