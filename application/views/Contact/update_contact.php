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

    <!-- <script src="script.js"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <!-- Checking the content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                Update View for ID : <?php echo $contact_id ?>
            </div>    
        </div>

        <div id="contactlist"></div>

        <div id="postcontact">
            <table class="table">
                <thead>
                    <tr>
                        <td><input class="form-control" id="contact_fname" value="Swag"></td>
                        <td><input class="form-control" id="contact_sname" value="Swag"></td>
                        <td><input class="form-control" id="contact_number"></td>
                        <td><input class="form-control" id="id"></td>
                        <td><input class="form-control" id="contact_note"></td>
                        <td><input class="form-control" id="contact_address"></td>
                    </tr>
                </thead>
            </table>
            <button class="btn btn-success" id="add-contact">Update</button>
        </div>
        
    </div>

    <script>

        //Backbone model
        var Contact = Backbone.Model.extend({
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
        var IncomingContacts = Backbone.Collection.extend({
            model: Contact,
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/getbyid/<?php echo $contact_id ?>',
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
                                    "<button class='btn btn-danger delete-contact'>delete</button>"+ 
                                "</div>" +
                                "<div class='spacing'></div>" +
                                "<hr id='devider'>"+
                            "</div>" +
                        "</div>" +
                    "</div>"
                    self.$el.append(names);
                    document.getElementById("contact_fname").value = c.get('contact_fname');
                    document.getElementById("contact_sname").value = c.get('contact_sname');
                    document.getElementById("contact_number").value = c.get('contact_number');
                    document.getElementById("id").value = c.get('id');
                    document.getElementById("contact_note").value = c.get('contact_note');
                    document.getElementById("contact_address").value = c.get('contact_address');
                })
            },
        });

        //View instance
        var contactListView = new ContactListView();


        //New model for update contact
        var PostContact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/update/<?php echo $contact_id ?>',
        });

        //Backbone view - update
        var ContactForm = Backbone.View.extend({
            el: '#postcontact',
            initialize: function() {

            },
            render: function() {
                return this;
            },
            events: {
                "click #add-contact" : 'addcontact',

            },
            delete: function () {
                console.log('deleted');
            },
            addcontact: function () {
                var ppp = new PostContact();
                ppp.set('contact_fname', document.getElementById("contact_fname").value);
                ppp.set('contact_sname', document.getElementById("contact_sname").value);
                ppp.set('contact_number', document.getElementById("contact_number").value);
                ppp.set('id', document.getElementById("id").value);
                ppp.set('contact_note', document.getElementById("contact_note").value);
                ppp.set('contact_address', document.getElementById("contact_address").value);

                // var ppp = new PostContact({
                //     'contact_name': document.getElementById("contact_name").value,
                //     'contact_number': document.getElementById("contact_number").value,
                //     'id': document.getElementById("contact_number").value,
                //     'contact_note': document.getElementById("contact_note").value,
                //     'contact_address': document.getElementById("contact_address").value
                // })
                var ss = ppp.toJSON();
                //console.log(details);
                ppp.save(null, {
                    success: function(response){
                        console.log('updated');
                    },
                    error: function(response){
                        console.log('! updated');
                    }
                });
                console.log(ss);
            } 
        });

        //View instance
        var contactForm = new ContactForm();


    </script>
</body>
</html>