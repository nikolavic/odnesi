$(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    stringLength: {
                        message: 'Ime mora da ima minimalno 3 karaktera i maksimalno 50 karaktera',
                        min: 3,
                        max:50,
                    },
                    notEmpty: {
                        message: 'Unesite ime'
                    }
                }
            },
            decleration: {
                validators: {
                    stringLength: {
                        message: 'Morate uneti minimum 20 karaktera',
                        min: 20,
                    },
                    notEmpty: {
                        message: 'Unesite opis'
                    }
                }
            },
            price: {
                validators: {
                    stringLength: {
                        message: 'Morate uneti broj minimalno 2 karaktera maximalno 4',
                        min: 2,
                        max:4,
                    },
                    notEmpty: {
                        message: 'Unesite cenu'
                    }
                }
            },
    
    }})
});