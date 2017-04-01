SKCMS-Contact
=============

This package is currently under development, more documentation and features will come soon.


# The Contact bundle of SKCMS for Symfony2

## Installation

Install skcms:core-bundle 

launch symfony command to create message entity.
```
php app/console skcms:generate:entity
```

The base message entity already contains :
date
status
email
name
subject
message
phone
fax

in config.yml set those options
```
skcms_admin:
    modules:
        contact:
            enabled: true
            messageEntity:
                name: #name of your created message entity
                beautyName:  #name you want to see in the menu
                bundle: #bundle name (by ex : SKCMSContact )
                class: #the class name with full namespace
                form: #the class name with full namespace
                listProperties:  #those are the proerties you want to see in the contact message list of your admin panel (date and status are automaticly displayed)
                    email:
                        dataName: 'email'
                        beautyName: 'E-mail'
                        type: 'string'
```


## Usage
###The form is globally accessible in twig with the var "contactForm" in any page.
To display the form you just have to write
```
{{contactForm|raw}}
```
To theme this form you just have to override the bundle and create a file named 'theme.html.twig' in Resources/views/Form
The submission and persistence of the message is full automatic.

###Override form view

Just override the bundle, and create your own view in Resources\views\Form\contact-form-content.html.twig




