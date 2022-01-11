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
                <h5 id="welcome-text">Conatct ID is -> <?php echo $contact_id ?></h5>
            </div>   
        </div>
    </div><br>
    
    <div class="container"><h4>General Details</h4></div><br>
    <div id="contactdetails"></div><br>

    <div class="container"><h4>Associated Tags</h4></div><br>
    <div id="taglist"></div>

    <!-- Add new tag -->
    <div class="container"><a class="btn btn-success" 
        href="http://localhost/WebGL-Contact-List/index.php/Tag/Assign/<?php echo $contact_id ?>">
            Assign new tag</a>
    </div>

    <script>

        //Backbone model
        var Contact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/attachments/<?php echo $contact_id ?>',
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
            url: 'http://localhost/WebGL-Contact-List/index.php/api/attachments/<?php echo $contact_id ?>',
        });

        //Collection instance
        var incomingContacts = new IncomingContacts();

        //Backbone view
        var ContactListView = Backbone.View.extend({
            model: incomingContacts,
            el: '#taglist',

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
                                "<div class='col-4'>" + c.get('tag_name') + "</div>" +
                                "<div class='spacing'></div>" +
                            "</div>" +
                        "</div>" +
                    "</div>"
                    self.$el.append(names);
                })
            },
        });

        //View instance
        var contactListView = new ContactListView();


        // For personal data
        // Backbone model
        var SingleContact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/getbyid/<?php echo $contact_id ?>',
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
        var IncomingSingleContacts = Backbone.Collection.extend({
            model: SingleContact,
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/getbyid/<?php echo $contact_id ?>',
        });

        //Collection instance
        var incomingSingleContacts = new IncomingSingleContacts();

        //Backbone view
        var SingleContactListView = Backbone.View.extend({
            model: incomingSingleContacts,
            el: '#contactdetails',

            initialize: function () {
                incomingSingleContacts.fetch({async:false});
                console.log(incomingSingleContacts.toJSON());
                this.render();
            },
            render: function () {
                var self = this;
                incomingSingleContacts.each(function (c) {
                    var names = 
                    "<div class='names'>" + 
                        "<div class='container'>" +
                            "<div class='row'>" +
                                "<div class='12'> Name : " + c.get('contact_name') + "</div>" + 
                                "<div class='12'> Number : " + c.get('contact_number') + "</div>" +
                                "<div class='12'> Saved Under : " + c.get('id') + "</div>" +
                                "<div class='12'> Address : " + c.get('contact_address') + "</div>" +
                                "<div class='12'> Note : " + c.get('contact_note') + "</div>" +
                                "<div class='spacing'></div>" +
                            "</div>" +
                        "</div>" +
                    "</div>"
                    self.$el.append(names);
                })
            },
        });

        //View instance
        var singleContactListView = new SingleContactListView();

    </script>

</body>
</html>