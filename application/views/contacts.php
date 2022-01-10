<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Phone Book</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.2/underscore-min.js" integrity="sha512-anTuWy6G+usqNI0z/BduDtGWMZLGieuJffU89wUU7zwY/JhmDzFrfIZFA3PY7CEX4qxmn3QXRoXysk6NBh5muQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone-min.js" integrity="sha512-9EgQDzuYx8wJBppM4hcxK8iXc5a1rFLp/Chug4kIcSWRDEgjMiClF8Y3Ja9/0t8RDDg19IfY5rs6zaPS9eaEBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel = "stylesheet" type = "text/css" 
        href = 'http://localhost/WebGL-Contact-List/styles/contact.css'>
</head>
<body>

    <!-- Checking the content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 id="welcome-text">Explore your contacts Vihan Perera !</h4>
            </div>   
        </div>
    </div>

    <table class="container table table-striped">
        <thead>
            <tr>
                <td class="col-3 column-names">Contact name</td>
                <td class="col-2 column-names">Contact number</td>
                <td class="col-4 column-names">Address</td>
                <td class="col-3 column-names action-col">Actions</td>
            </tr>
        </thead>
    </table>

    <div id="contactlist"></div>

    <div class="container mb-5 mt-3">
        <a class="btn btn-success" 
            href="http://localhost/WebGL-Contact-List/index.php/Welcome/Create">Create Contact</a>  
    </div>


    <script>

        //Backbone model
        var Contact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts',
            idAttribute: "contact_id",
            defaults:{
                contact_id:'',
                contact_name:'',
                contact_number:'',
                id: '',
                contact_note:'',
                contact_address:'',
            }
        });

        //Backbone collection
        var IncomingContacts = Backbone.Collection.extend({
            model: Contact,
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts',
        });

        //Collection instance
        var incomingContacts = new IncomingContacts();

        //Backbone view
        var ContactListView = Backbone.View.extend({
            model: incomingContacts,
            el: '#contactlist',

            initialize: function () {
                incomingContacts.fetch({async:false});
                console.log(incomingContacts.toJSON());
                this.render();
            },
            render: function () {
                var self = this;
                incomingContacts.each(function (c) {
                    var names = 
                    "<div class='names'>" + 
                        "<div class='container'>" +
                            "<div class='row'>" +
                                "<div class='col-3'>" + c.get('contact_name') + "</div>" + 
                                "<div class='col-2'>" + c.get('contact_number') + "</div>" +
                                "<div class='col-4'>" + c.get('contact_address') + "</div>" +
                                "<div class='col-3' style='text-align: center'>" + 
                                    "<button class='btn btn-warning id='update-contact' style='margin-right: 10px'><a href = 'http://localhost/WebGL-Contact-List/index.php/Welcome/Update/" + c.get('contact_id') + "'>update</a></button>"+ 
                                    "<button class='btn btn-danger delete-contact'><a href = 'http://localhost/WebGL-Contact-List/index.php/Welcome/Delete/" + c.get('contact_id') + "'>Delete</a></button>"+ 
                                "</div>" +
                                "<div class='spacing'></div>" +
                                "<hr id='devider'>"+
                            "</div>" +
                        "</div>" +
                    "</div>"
                    self.$el.append(names);
                })
            },
        });

        //View instance
        var contactListView = new ContactListView();

        //New model for add contact
        var PostContact = Backbone.Model.extend({
            urlRoot: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/insert',
            idAttribute: "contact_id",
        });

        //Backbone view
        var ContactForm = Backbone.View.extend({
            el: '#postcontact',
            initialize: function() {
                
            },
            render: function() {
                return this;
            },
            events: {
                "click #add-contact" : 'addcontact',
                "click #delete-contact" : 'delete',
            },
            delete: function () {
                console.log('deleted');
            },
            addcontact: function () {
                //var ppp = new AJAXPostContact();
                var ppp = new PostContact({
                    'contact_name': $('#contact_name').val(),
                    'contact_number': $('#contact_number').val(),
                    'id': $('#id').val(),
                    'contact_note': $('#contact_note').val(),
                    'contact_address': $('#contact_address').val()
                })
                var ss = ppp.toJSON();
                //console.log(details);
                ppp.save(ss);
                console.log("ss");
            } 
        });

        //View instance
        var contactForm = new ContactForm();

    </script>
</body>
</html>