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
                        message: 'Ime mora da ima minimalno 8 karaktera i maksimalno 50 karaktera',
                        min: 8,
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
                        message: 'Sifra mora da ima minimalno 5 karaktera i maksimalno 50 karaktera',
                        min: 8,
                        max:50,
                    },
                    notEmpty: {
                        message: 'Unesite password'
                    }
                }
            },
            confirm_password: {
                validators: {
                    stringLength: {
                        min: 8,
                        max:50,
                    },
                    notEmpty: {
                        message: 'Potvrdite Password'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Unesite Email Adresu'
                    },
                    emailAddress: {
                        message: 'Unesite validnu Email adresu'
                    }
                }
            },
            contact_no: {
                validators: {
                    stringLength: {
                        min: 5,
                        max: 50,
                        notEmpty: {
                            message: 'Unesite Br. telefona'
                        }
                    }
                }
        },
            address: {
                validators: {
                    stringLength: {
                        min: 5,
                        max: 50,
                        notEmpty: {
                            message: 'Unesite ulicu,broj i grad'
                        }
                    }
                },
            }
    }})
});