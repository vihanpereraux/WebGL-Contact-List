<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>My Phone Book</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.2/underscore-min.js" integrity="sha512-anTuWy6G+usqNI0z/BduDtGWMZLGieuJffU89wUU7zwY/JhmDzFrfIZFA3PY7CEX4qxmn3QXRoXysk6NBh5muQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone-min.js" integrity="sha512-9EgQDzuYx8wJBppM4hcxK8iXc5a1rFLp/Chug4kIcSWRDEgjMiClF8Y3Ja9/0t8RDDg19IfY5rs6zaPS9eaEBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel = "stylesheet" type = "text/css" 
        href = '<?php echo base_url('styles/home_styles.css'); ?>'>
        
</head>
<body>

    <div class="container section-01-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">SECTION 01 &nbsp | &nbsp ALL CONTACTS</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">YOUR CONTACTS</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>

    <!-- Welcome text -->
    <div class="container section-one">
        <div class="row">
            <div class="col-lg-1 my-auto">
                <img style="width: 110px; margin-left: 0px;" src="http://localhost/WebGL-Contact-List/img/Intro gif.gif">
            </div> 
            <div class="col-lg-4 my-auto" style="margin-left: 10px;">
                <h4 id="welcome-text">Explore Your <br> Contacts 
                    <span style="color: #282D98">Vihan Perera</span> &nbsp <span style="color: #F46C5A">: )</span></h4>
            </div>  
            <!-- <div class="col-lg-8 my-auto">
                <img style="width: 120px; margin-left:-80px;" src="http://localhost/WebGL-Contact-List/img/Intro gif.gif">
            </div>  -->
        </div>
    </div>

    <!-- Table to display contacts -->
    <table class="container" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <td class="col-3 column-names">Contacts</td>
                <td class="col-2 column-names">Number</td>
                <td class="col-4 column-names">Address</td>
                <td class="col-3 column-names action-col">Email</td>
            </tr>
        </thead>
    </table>

    <!-- Conatact list appends here -->
    <div id="contactlist"></div>


    <div class="container section-02-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">SECTION 02 &nbsp | &nbsp ADD CONTACTS</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">NEW CONTACTS</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>


    <!-- Form for creating contacts -->
    <div class="container mt-5">
        <div class="row">
            
            <div class="col-lg-6 my-auto">
                <img class="mx-auto d-block" style="width: 70%;" 
                    src="http://localhost/WebGL-Contact-List/img/createimg.png" alt="">
            </div>

            <div class="col-lg-6 my-auto">
                <p id="form-heading">Create Your <span style="color: #FF543E">Contacts</span> &nbsp <span style="color: #282D98">: )</span></p>
                
                <div id="postcontact">
                    <form id="myForm">
                        <input type="hidden" class="form-control" id="contact_id">

                        <div class="mb-4">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control custom-input" id="contact_fname" required />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control custom-input" id="contact_sname" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Contact number</label>
                            <input type="text" class="form-control custom-input" id="contact_number" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Special notes</label>
                            <textarea class="form-control custom-input" id="contact_note" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control custom-input" id="contact_address" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control custom-input" id="contact_email" required>
                        </div>
                    </form>
                    <button class="btn create-btn mt-4" id="add-contact">
                        <p> &nbsp + &nbsp Save Contact</p></button>
                </div>
            </div>
        </div>
    </div>


    <div class="container section-03-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">SECTION 03 &nbsp | &nbsp MANAGE CONTACTS</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">UPDATE CONTACTS</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>


    <!-- Requested name for update -->
    <!-- <div class="container">
        
    </div>

    <div class="container mt-5">
        
    </div> -->

    <div class="container mt-5">
        <div class="row">
                
            <div class="col-lg-1">
                <img class="mx-auto d-block bullet-section" style="width: 35%;"
                    src="<?php echo base_url('img/star.png'); ?>" alt="">

            </div>
                
            <div class="col-lg-5">
                <div id="update-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, 
                    eum quisquam dolores in adipisci necessitatibus quotemeta.
                </div>

                <img class="manage-img mt-4" style="width: 58%;" 
                    src=" <?php echo base_url('img/manageimg.png'); ?>" alt="">

                <div id="update-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, 
                    eum quisquam dolores in adipisci necessitatibus quotemeta.
                </div>

                <div id="update-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, 
                    eum quisquam dolores in adipisci necessitatibus quotemeta.
                </div>

            </div>

            <div class="col-lg-6 my-auto">
                <div id="updatecontact">
                    
                    <p id="form-heading">Manage Your <span style="color: #FF543E">Contacts</span> &nbsp <span style="color: #282D98">: )</span></p>
                    
                    <form id="update-form">
                        <div class="mb-4">  
                            <label class="form-label">Paste the name you want to update</label>
                            <input type="text" class="form-control custom-input" id="req-id">
                        
                            <div id="updatecontact">
                                <a class="mt-2 get-name-option" id="update-contact">I wanna update this</a>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="update_contact_id">

                        <div class="mb-4">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control custom-input" id="update_contact_fname">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control custom-input" id="update_contact_sname">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Contact number</label>
                            <input type="text" class="form-control custom-input" id="update_contact_number">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Special notes</label>
                            <textarea type="text" class="form-control custom-input" id="update_contact_note"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control custom-input" id="update_contact_address">
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control custom-input" id="update_contact_email">
                        </div>
                    </form>
                    <div id="updatedcontact">
                        <button class="btn update-btn mt-2" id="send-update">
                            <p>&nbsp + &nbsp Update Contact</p></button>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container section-04-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">SECTION 04 &nbsp | &nbsp EXPLORE CONTACTS</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">EXPLORE &nbsp CONTACTS &nbsp & &nbsp TAGS</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>


    <div class="container footer">
        <div class="row">

            <div class="col-lg-6 my-auto" style="line-height: 1.9; padding-left: 70px;">
                <h1 id="footer-heading">Let's Find Your <span style="color: #F46C5A">Contacts</span> &nbsp <span style="color: #282D98">: )</span></h1>

                <p class="mt-5">
                    <img class="" style="width: 5%;" 
                        src="<?php echo base_url('img/orange_star.png'); ?>">&nbsp &nbsp
                        
                    <a href="<?php echo base_url('index.php/Welcome/Explore'); ?>" 
                        class="footer-link">Explore Your Contacts</a>
                        
                </p>
                <p class="explore-details">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum necessitatibus 
                    doloribus recusandae aperiam dolor blanditiis ipsa.</p>

                <p class="mt-5">
                    <img class="" style="width: 5%;" 
                        src="<?php echo base_url('img/orange_star.png'); ?>">&nbsp &nbsp

                    <a href="<?php echo base_url('index.php/Welcome/Tags'); ?>" 
                        class="footer-link">Explore Your Contacts by Tag</a><br>
                </p>
                <p class="explore-details">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum necessitatibus 
                    doloribus recusandae aperiam dolor blanditiis ipsa.</p>

                <p class="mt-5">
                    <img class="" style="width: 5%;" 
                        src="<?php echo base_url('img/orange_star.png'); ?>">&nbsp &nbsp

                    <a href="" class="footer-link">Explore Your All Contacts</a>
                </p>
                <p class="explore-details">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum necessitatibus 
                    doloribus recusandae aperiam dolor blanditiis ipsa.</p>
            </div>

            <div class="col-lg-6 my-auto">
                <img class="mx-auto d-block explore-img" 
                    src="<?php echo base_url('img/exploreimg.png'); ?>" alt="">
            </div>
        </div>
    </div>


    <div class="container section-05-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">SECTION 05 &nbsp | &nbsp FOOTER</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">LET'S &nbsp WRAP &nbsp UP</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>


    <!-- <div class="container mt-5">
        <a class="btn btn-success" 
            href="http://localhost/WebGL-Contact-List/index.php/Welcome/Explore">Explore Contact</a>  
    </div>

    <div class="container mb-5 mt-5">
        <a class="btn btn-success" 
            href="http://localhost/WebGL-Contact-List/index.php/Welcome/Tags">Explore Tag</a>  
    </div> -->



    <script>

        //Backbone model
        var Contact = Backbone.Model.extend({
            url: '<?php echo base_url('index.php/api/contacts'); ?>',
            idAttribute: "contact_id",
            defaults:{
                contact_id:'',
                contact_fname:'',
                contact_number:'',
                id: '',
                contact_note:'',
                contact_address:'',
                contact_lname:'',
                contact_email:'',
            }
        });

        //Backbone collection
        var IncomingContacts = Backbone.Collection.extend({
            model: Contact,
            url: '<?php echo base_url('index.php/api/contacts'); ?>',
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
                            "<div class='container' style='padding-left: 10px; padding-left: 10px;'>" +
                                "<div class='row singe-record'>" +
                                "<div class='col-3' id='full-name'><a href = 'http://localhost/WebGL-Contact-List/index.php/Welcome/View/" + c.get('contact_id') + "'>" + c.get('contact_fname') + " " + c.get('contact_sname') + "</a></div>" + 
                                "<div class='col-2' style='color: ; font-weight: 600;'>" + "0" +c.get('contact_number') + "</div>" +
                                "<div class='col-4'>" + c.get('contact_address') + "</div>" +
                                "<div class='col-2'>" + c.get('contact_email') + "</div>" +
                                "<div class='col-1'><img style='width: 30px;' src='<?php echo base_url('img/Arrow.png'); ?>'></div>" +
                                "<div class='spacing'></div>" +
                                // "<hr id='devider'>"+
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
                    'contact_sname': $('#contact_sname').val(),
                    'contact_email': $('#contact_email').val()
                })
                var ss = ppp.toJSON();

                incomingContacts.add(ppp);
                ppp.save(ss);
                console.log(incomingContacts.toJSON());

                alert('A new contact added !');

                document.getElementById("myForm").reset();

                var firstView3 = new ContactListView();
                firstView3.render();
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
                    if( reqId === "")
                    {
                        alert('Add a name to update first !');
                    }
                    else
                    {
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
                    }
                    console.log(reqId);
                    console.log(incomingContacts.toJSON().length);
                    //alert(put_id);
                    inputField.value = " ";
            });
        });

        
        //Backbone view
        var UpdateForm = Backbone.View.extend({
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
                document.getElementById("update_contact_fname").value = incomingContacts.at(reqIdSuper).get('contact_fname');
                document.getElementById("update_contact_sname").value = incomingContacts.at(reqIdSuper).get('contact_sname');
                document.getElementById("update_contact_number").value = incomingContacts.at(reqIdSuper).get('contact_number');
                document.getElementById("update_contact_id").value = incomingContacts.at(reqIdSuper).get('contact_id');
                document.getElementById("update_contact_note").value = incomingContacts.at(reqIdSuper).get('contact_note');
                document.getElementById("update_contact_address").value = incomingContacts.at(reqIdSuper).get('contact_address');
                document.getElementById("update_contact_email").value = incomingContacts.at(reqIdSuper).get('contact_email');

                put_id = document.getElementById("contact_id").value;
            }
        });

        //View instance
        var updateForm = new UpdateForm();


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
                ppp.set('contact_id', document.getElementById("update_contact_id").value);
                ppp.set('contact_fname', document.getElementById("update_contact_fname").value);
                ppp.set('contact_sname', document.getElementById("update_contact_sname").value);
                ppp.set('contact_number', document.getElementById("update_contact_number").value);
                ppp.set('id', '1');
                ppp.set('contact_note', document.getElementById("update_contact_note").value);
                ppp.set('contact_address', document.getElementById("update_contact_address").value);
                ppp.set('contact_email', document.getElementById("update_contact_email").value);

                var ss = ppp.toJSON();
                ppp.save(null, {
                    success: function(response){
                        document.getElementById("update-form").reset();
                        alert('Selected contact updated !');
                        var firstView1 = new ContactListView();
                        firstView1.render();
                    },
                    error: function(response){
                        alert('Selected contact not updated !');
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
                            if(deletename == incomingContacts.toJSON()[i].contact_fname.toLowerCase() + " " + incomingContacts.toJSON()[i].contact_sname.toLowerCase())
                            {
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