(function() {
    tinymce.PluginManager.add('cybermark_tc_button', function( editor, url ) {
        editor.addButton( 'cybermark_tc_button', {
            title: 'CyberMark Shortcodes',
            type: 'menubutton',
            icon: 'icon cybermark-own-icon',
            menu: [
                {
                    text: 'Location Name',
                    value: '[acf field="business_name" post_id="options"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                    
                },
                {
                    text: 'Location City',
                    value: '[acf field="city" post_id="options"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                    
                },
                {
                    text: 'Location State',
                    value: '[acf field="state" post_id="options"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
                {
                    text: 'Location Zip Code',
                    value: '[acf field="zip_code" post_id="options"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
                {
                    text: 'Location Phone Number',
                    value: '[acf field="phone_number" post_id="options"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                },
                {
                    text: 'Location Email',
                    value: '[acf field="location_email" post_id="options"]',
                    onclick: function() {
                        editor.insertContent(this.value());
                    }
                }
           ]
        });
    });
})();