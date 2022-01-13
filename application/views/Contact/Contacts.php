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

    <!-- Form for creating contacts -->
    <div class="container">
        <div id="postcontact">
            <form id="myForm">
                <thead>
                    <tr>
                        <td>
                            <!-- <label for="html">Contact Id</label> -->
                            <input type="hidden" class="form-control" id="contact_id">
                        </td>
                        <td>
                            <label for="html">First Name</label>
                            <input class="form-control" id="contact_fname">
                        </td>
                        <td>
                            <label for="html">Surname</label>
                            <input class="form-control" id="contact_sname">
                        </td>
                        <td>
                            <label for="html">Number</label>
                            <input class="form-control" id="contact_number">
                        </td>
                        <!-- <td>
                            <label for="html">Assigned User</label>
                            <input class="form-control" id="id">
                        </td> -->
                        <td>
                            <label for="html">Note</label>
                            <input class="form-control" id="contact_note">
                        </td>
                        <td>
                            <label for="html">Address</label>
                            <input class="form-control" id="contact_address">
                        </td>
                    </tr>
                </thead>
            </form>
            <button class="btn btn-warning  " id="add-contact">Create Contact</button>
            <!-- <button id="update-contact">update me</button> -->
        </div>
    </div>

    <!-- <div class="container mt-3">
        <a class="btn btn-success" 
            href="http://localhost/WebGL-Contact-List/index.php/Welcome/Create">Create Contact</a>  
    </div> -->

    <div class="container mt-5">
        <label for="html">Which name you wanna update ?</label>
        <input class="form-control" id="req-id">
        <div id="updatecontact">
            <button class="btn btn-primary mt-2" id="update-contact">update</button>
        </div>
    </div>

    <div class="container mt-5">
        <div id="updatedcontact">
            <button class="btn btn-primary mt-2" id="send-update">Update Now</button>
        </div>
    </div>

    <div class="container mt-5">
        <a class="btn btn-success" 
            href="http://localhost/WebGL-Contact-List/index.php/Welcome/Explore">Explore Contact</a>  
    </div>

    <div class="container mb-5 mt-5">
        <a class="btn btn-success" 
            href="http://localhost/WebGL-Contact-List/index.php/Welcome/Tags">Explore Tag</a>  
    </div>

    <!-- <div class="container mt-5">
        <label for="html">Which name you wanna delete ?</label>
        <input class="form-control" id="delete-id">
        <div id="deletecontact">
            <a class="btn btn-warning" id="send-delete" onclick="myFunction()">Delete</a>
        </div>
    </div> -->

    


    <script>

        //Backbone model
        var Contact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts',
            idAttribute: "contact_id",
            defaults:{
                contact_id:'',
                contact_fname:'',
                contact_number:'',
                id: '',
                contact_note:'',
                contact_address:'',
                contact_lname:''
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
                this.listenTo(incomingContacts, 'add remove', this.render);
                this.render();
            },
            render: function () {
                var self = this;
                self.$el.empty();
                incomingContacts.each(function (c) {
                    var names = 
                    "<div class='names'>" + 
                        "<div class='container'>" +
                            "<div class='row'>" +
                                "<div class='col-3'><a href = 'http://localhost/WebGL-Contact-List/index.php/Welcome/View/" + c.get('contact_id') + "'>" + c.get('contact_fname') + " " + c.get('contact_sname') + "</a></div>" + 
                                "<div class='col-2'>" + c.get('contact_number') + "</div>" +
                                "<div class='col-4'>" + c.get('contact_address') + "</div>" +
                                "<div class='col-3' style='text-align: center'>" + 
                                    "<button class='btn btn-warning id='update-contact' style='margin-right: 10px'>update</button>"+ 
                                    "<button class='btn btn-danger id='delete-contact'>delete</button>"+ 
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


        // -------------------------------Upload contact------------------------------ //


        // Model for add contact
        var PostContact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/insert',
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
            },
            addcontact: function () {
                var ppp = new PostContact({
                    'contact_fname': $('#contact_fname').val(),
                    'contact_number': $('#contact_number').val(),
                    'id': $('#id').val(),
                    'contact_note': $('#contact_note').val(),
                    'contact_address': $('#contact_address').val(),
                    'contact_sname': $('#contact_sname').val()
                })
                var ss = ppp.toJSON();
                incomingContacts.add(ppp);
                console.log(incomingContacts.toJSON());
                ppp.save(ss);
                document.getElementById("myForm").reset();
                console.log("ss");
            }
        });

        //View instance
        var contactForm = new ContactForm();

            
        // -------------------------------Update contact------------------------------ //


        //id checking before updating
        var reqId;
        var reqIdSuper;
        var fullname;
        var index;
        var put_id;
        const inputField = document.getElementById("req-id");
        $(document).ready(function() {
            $('#update-contact').on('click',
                function() {
                    reqId = document.getElementById("req-id").value.toLowerCase();
                    for (let i = 0; i < incomingContacts.toJSON().length; i++) 
                    {
                        //fullname = (incomingContacts.toJSON()[i].contact_fname + incomingContacts.toJSON()[i].contact_sname);
                        if(reqId == incomingContacts.toJSON()[i].contact_fname.toLowerCase()
                        || reqId == incomingContacts.toJSON()[i].contact_fname.toLowerCase() + " " + incomingContacts.toJSON()[i].contact_sname.toLowerCase())
                        {
                            reqIdSuper = i;
                            put_id = incomingContacts.toJSON()[i].contact_id;  
                        }
                    }
                    // for validations
                    //alert(reqIdSuper);
                    console.log(reqId);
                    console.log(incomingContacts.toJSON().length);
                    alert(put_id);
                    inputField.value = " ";
                    //document.getElementById("myForm2").reset()
            });
        });

        $(document).ready(function() {
            $('#send-update').on('click',
                function() {
                    alert(put_id);
            });
        });

        

        //Backbone view
        var ContactForm2 = Backbone.View.extend({
            el: '#updatecontact',
            initialize: function() {
                
            },
            render: function() {
                return this;
            },
            events: {
                "click #update-contact" : 'updatecontact',
            },
            updatecontact: function () {
                console.log('update clicked');
                document.getElementById("contact_fname").value = incomingContacts.at(reqIdSuper).get('contact_fname');
                document.getElementById("contact_sname").value = incomingContacts.at(reqIdSuper).get('contact_sname');
                document.getElementById("contact_number").value = incomingContacts.at(reqIdSuper).get('contact_number');
                document.getElementById("contact_id").value = incomingContacts.at(reqIdSuper).get('contact_id');
                document.getElementById("contact_note").value = incomingContacts.at(reqIdSuper).get('contact_note');
                document.getElementById("contact_address").value = incomingContacts.at(reqIdSuper).get('contact_address');

                put_id = document.getElementById("contact_id").value;
            }
        });

        //View instance
        var contactForm = new ContactForm2();


        //New model for update contact
        var UpdateContact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/update/',
        });

        //Backbone view - update
        var ContactForm = Backbone.View.extend({
            el: '#updatedcontact',
            initialize: function() {

            },
            events: {
                "click #send-update" : 'sendupdate',

            },
            sendupdate: function () {
                var ppp = new UpdateContact();
                ppp.set('contact_id', document.getElementById("contact_id").value);
                ppp.set('contact_fname', document.getElementById("contact_fname").value);
                ppp.set('contact_sname', document.getElementById("contact_sname").value);
                ppp.set('contact_number', document.getElementById("contact_number").value);
                ppp.set('id', '1');
                ppp.set('contact_note', document.getElementById("contact_note").value);
                ppp.set('contact_address', document.getElementById("contact_address").value);

                var ss = ppp.toJSON();
                //console.log(details);
                ppp.save(null, {
                    success: function(response){
                        document.getElementById("myForm").reset();
                        console.log('updated');
                        var firstView1 = new ContactListView();
                        firstView1.render();
                    },
                    error: function(response){
                        console.log('! updated');
                    }
                });

                console.log(ss);
            },
        });

        //View instance
        var contactForm = new ContactForm();


        // -------------------------------Delete contact------------------------------ //
        

        function myFunction() {
            alert('goda');
        
            //id checking before updating
            var reqId;
            var reqIdSuper;
            var fullname;
            var index;
            $delete_id = '';
            $(document).ready(function() {
                $('#delete-contact').on('click',
                    function() {
                        deletename = document.getElementById("delete-id").value.toLowerCase();
                        for (let i = 0; i < incomingContacts.toJSON().length; i++) 
                        {
                            //fullname = (incomingContacts.toJSON()[i].contact_fname + incomingContacts.toJSON()[i].contact_sname);
                            if(deletename == incomingContacts.toJSON()[i].contact_fname.toLowerCase() + " " + incomingContacts.toJSON()[i].contact_sname.toLowerCase())
                            {
                                //reqIdSuper = i;
                                delete_id = incomingContacts.toJSON()[i].contact_id;  
                            }
                        }
                        // for validations
                        console.log(reqId);
                        console.log(incomingContacts.toJSON().length);
                        alert(delete_id);
                });
            });

            //New model for update contact
            var DeleteContact = Backbone.Model.extend({
                url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/delete/' + $delete_id,
            });

            //Backbone view - update
            var DeleteForm = Backbone.View.extend({
                el: '#deletecontact',
                initialize: function() {

                },
                events: {
                    "click #send-delete" : 'senddelete',
                },
                senddelete: function () {
                    var ppp = new DeleteContact({
                        'contact_id': document.getElementById("delete-id").value,
                    });
                    var ss = ppp.toJSON();
                    //console.log(details);
                    ppp.destroy(null, {
                        success: function(response){
                            document.getElementById("myForm").reset();
                            console.log('deleted');
                            var firstView1 = new ContactListView();
                            firstView1.render();
                        },
                        error: function(response){
                            console.log('! deleted');
                        }
                    });

                    console.log(ss);
                },
            });

            //View instance
            var deleteForm = new DeleteForm();
        }

    </script>
</body>
</html>