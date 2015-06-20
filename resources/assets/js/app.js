var Vue = require('vue'),
    vueResource = require('vue-resource');

Vue.use(vueResource);

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
            postcode = postcode.replace(/\s/g, '');     ///TODO: replace any non alphanumerics
            l = postcode.length;

            // Error checks
            if (l === 0) { return ''; }
            if (l < 5) {
                console.log('Error: postcode is too short');
                return '';
            }
            if (l > 7) {
                console.log('Error: postcode is too long');
                return '';
            }

            // Add any necessary padding spaces (length 5 or 6)
            if (l === 5) { return postcode.substring(0, 2) + '  ' + postcode.substring(2, 5); }
            if (l === 6) { return postcode.substring(0, 3) + ' ' + postcode.substring(3, 6); }
            return postcode;
        },

        brmaPostcode: function(postcode) {
            var p,
                l = 0;

            // Parse as postcode first
            p = this.parsePostcode(postcode);

            // Replace any double spaces with a single
            p = p.replace(/  +/g, ' ');
            l = p.length;

            // Remove last two characters
            if (l > 0) { p = p.substring(0, l - 2); }
            l = p.length;

            // If the postcode doesn't contain a space (e.g. SN139XE) then add one after the major
            if (p.indexOf(' ') === -1) { p = p.substring(0, l - 1) + ' ' + p.substring(l - 1, l); }

            return p;
        },

        getPostcode: function(e) {
            // Prevent submission and re-initialisation of form
            e.preventDefault();

            // Set the correct number of spaces in postcode for database
            this.postcode = this.parsePostcode(this.postcode);

            // Make the API call
            this.$http.get('/postcode/' + this.postcode, function(postcode) {
                this.$set('postcodeDetails', postcode);
            }).error(function(data, status, request) {
                // handle error
                console.log(data);
            });

            // BRMA API call
            this.$http.get('/brma/' + this.postcode, function(brma) {
                this.$set('brmaDetails', brma);
            }).error(function(data, status, request) {
                // handle error
                console.log(data);
            });
        }

    }
});
