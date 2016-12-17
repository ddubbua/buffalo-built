jQuery('document').ready(function($){
    // Nova Button
    tinymce.create('tinymce.plugins.NovaButton', {
        init : function(ed, url) {
            ed.addButton('novabutton', {
                title : 'Nova Button',
                image : url + '/../images/tinymce-nova-button-icon.png',
                onclick : function() {
                    var $insertButtonArea = $('#nova-insert-button-shortcode-area'),
                        $insertButtonSubmit = $('#nova-insert-button-submit'),
                        $insertButtonCancel = $('#nova-insert-button-cancel'),
                        $colorField = $('#nova-insert-button-color'),
                        $iconField = $('#nova-insert-button-icon'),
                        $linkField = $('#nova-insert-button-link'),
                        $newTabField = $('#nova-insert-button-new-tab'),
                        $textField = $('#nova-insert-button-text'),
                        resetValues = function() {
                            $colorField.val('primary-color');
                            $iconField.prop('checked', false);
                            $linkField.val('');
                            $newTabField.prop('checked', false);
                            $textField.val('');
                        };
                    
                    $insertButtonArea.addClass('show');
                    
                    $insertButtonSubmit.one('click', function(e) {
                        e.preventDefault();
                        
                        var $iconValue = 'false',
                            $newTabValue = 'false';
                            
                        if ($iconField.is(':checked')) {
                            $iconValue = 'true';
                        }
                        
                        if ($newTabField.is(':checked')) {
                            $newTabValue = 'true';
                        }
                        
                        ed.execCommand('mceInsertContent', false, '[nova_button color="' + $colorField.val() + '" icon="' + $iconValue + '" link="' + $linkField.val() + '" open_link_in_new_tab="' + $newTabValue + '" text="' + $textField.val() + '"]');
                        
                        $insertButtonArea.removeClass('show');
                        resetValues();
                    });
                    
                    $insertButtonCancel.one('click', function(e) {
                        e.preventDefault();
                        resetValues();
                        $insertButtonArea.removeClass('show');
                    });
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "Nova Button Shortcode",
                author : 'Blu Giant',
                authorurl : 'http://blugiant.com/',
                infourl : 'http://blugiant.com/',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('novabutton', tinymce.plugins.NovaButton);
    
    // Nova Contact Info
    tinymce.create('tinymce.plugins.NovaContactInfo', {
        init : function(ed, url) {
            ed.addButton('novacontactinfo', {
                title : 'Nova Contact Info',
                image : url + '/../images/tinymce-nova-contact-info-icon.png',
                onclick : function() {
                    var $insertButtonArea = $('#nova-insert-contact-info-shortcode-area'),
                        $insertButtonSubmit = $('#nova-insert-contact-info-submit'),
                        $insertButtonCancel = $('#nova-insert-contact-info-cancel'),
                        $locationNameField = $('#nova-insert-contact-info-location-name'),
                        $locationAddressField = $('#nova-insert-contact-info-location-address'),
                        $locationAddress2Field = $('#nova-insert-contact-info-location-address2'),
                        $locationCityStateZipField = $('#nova-insert-contact-info-location-city-state-zip'),
                        $phoneField = $('#nova-insert-contact-info-phone'),
                        $emailField = $('#nova-insert-contact-info-email'),
                        $email2Field = $('#nova-insert-contact-info-email2'),
                        $fields = $insertButtonArea.find('form input'),
                        resetValues = function() {
                            $fields.each(function() {
                                $(this).val('');
                            });
                        };
                    
                    $insertButtonArea.addClass('show');
                    
                    $insertButtonSubmit.one('click', function(e) {
                        e.preventDefault();
                        
                        ed.execCommand('mceInsertContent', false, '[nova_contact_info location_name="' + $locationNameField.val() + '" location_address="' + $locationAddressField.val() + '" location_address2="' + $locationAddress2Field.val() + '" location_city_state_zip="' + $locationCityStateZipField.val() + '" phone="' + $phoneField.val() + '" email="' + $emailField.val() + '" email2="' + $email2Field.val() + '"]');
                        
                        $insertButtonArea.removeClass('show');
                        resetValues();
                    });
                    
                    $insertButtonCancel.one('click', function(e) {
                        e.preventDefault();
                        resetValues();
                        $insertButtonArea.removeClass('show');
                    });
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "Nova Contact Info Shortcode",
                author : 'Blu Giant',
                authorurl : 'http://blugiant.com/',
                infourl : 'http://blugiant.com/',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('novacontactinfo', tinymce.plugins.NovaContactInfo);
});