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
        href = 'http://localhost/WebGL-Contact-List/styles/view_styles.css'>
</head>
<body>

    <div class="menu-section">
        <div class="row">

            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                    <img style="width: 40%; margin-left: 0px;" src="http://localhost/WebGL-Contact-List/img/logo.png">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="http://localhost/WebGL-Contact-List#all-contacts">ALL CONTACTS ????</a></li>
                            &nbsp
                            <li class="nav-item"><a class="nav-link" href="http://localhost/WebGL-Contact-List#create-contacts">CREATE ????</a></li>
                            &nbsp
                            <li class="nav-item"><a class="nav-link" href="http://localhost/WebGL-Contact-List#manage-contacts">MANAGE ????</a></li>
                            &nbsp
                            <li class="nav-item"><a class="nav-link" href="http://localhost/WebGL-Contact-List#search-w-name">SEARCH ????</a></li>
                            &nbsp
                            <li class="nav-item"><a class="nav-link" href="http://localhost/WebGL-Contact-List#footer-scroll">US ????</a></li>
                            &nbsp
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main links -->
            <div id="menu-links">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5"><a href="http://localhost/WebGL-Contact-List#all-contacts"><h3>ALL CONTACTS</h3></a></div>
                    <div class="col-lg-1"><h3>????</h3></div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5"><a href="http://localhost/WebGL-Contact-List#create-contacts"><h3>CREATE CONTATCS</h3></a></div>
                    <div class="col-lg-1"><h3>????</h3></div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5"><a href="http://localhost/WebGL-Contact-List#manage-contacts"><h3>MANAGE CONTATCS</h3></a></div>
                    <div class="col-lg-1"><h3>????</h3></div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5"><a href="http://localhost/WebGL-Contact-List#search-w-name"><h3>SEARCH CONTATCS / W NAMES</h3></a></div>
                    <div class="col-lg-1"><h3>????</h3></div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5"><a href="http://localhost/WebGL-Contact-List#search-w-tag"><h3>SEARCH CONTATCS / W TAGS</h3></a></div>
                    <div class="col-lg-1"><h3>????</h3></div>
                    <div class="col-lg-3"></div>
                </div>
            </div>

            <div class="container menu-section-devider">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="mt-5 menu-devider-txt">LET'S &nbsp GET &nbsp CONNECTED</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="mt-5 menu-devider-txt-middle">SCROLL &nbsp DOWN &nbsp ????</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="mt-5 menu-devider-txt-right">????? VIHANPERERAUX</p>
                    </div>
                </div>
                <!-- <div id="menu-devider-01"></div> -->
            </div>

        </div>
    </div>


    <!-- Checking the content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p id="explore-heading">Explore Your 
                    <span style="color: #FF543E">Contact</span> &nbsp : ) </p>
            </div>   
        </div>
    </div><br>


    <div class="container section-01-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">CONTACT &nbsp DETAILS</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">ASSIGNED &nbsp TAGS &nbsp & &nbsp DETAILS</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-"></div>
            <div class="col-lg-5 my-auto">
                <img class="mx-auto d-block" style="width: 50%;" src="http://localhost/WebGL-Contact-List/img/Intro gif.gif">
            </div>
            <div class="col-lg-7">
                <!-- <div class="container"><h4>General Details</h4></div> -->
                <div id="contactdetails"></div>
            </div>
            <!-- <div class="col-lg-1"></div> -->
        </div>
    </div>


    <div class="container section-02-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">ASSIGNED &nbsp TAGS</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">ASSIGN &nbsp NEW &nbsp TAGS</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>


    <div class="container">
        <div class="row">

            <div class="col-lg-6 my-auto">
                <img class="mx-auto d-block bullet-section" style="width: 48%;" 
                    src="http://localhost/WebGL-Contact-List/img/manageimg.png" alt="">
            </div>

            <div class="col-lg-6" style="padding-left: 35px">

                <div id="taglist"></div>   

                <div id="assigntag">
                    <label class="form-label">Assign new tags</label>
                    <select class="form-control custom-input" id="tag_id">
                        <option disabled selected="selected" value="0">Select</option>
                        <option value="1">Home</option>
                        <option value="2">School</option>
                        <option value="3">Office</option>
                        <option value="4">Family</option>
                        <option value="6">Temple</option>
                    </select>    
                    <br>
                    <button class="btn create-btn" id="asign-tag" onclick="assignTags()">
                        <p>+ Assign Tags</p></button>
                </div><br>

                <div id="deletetag">
                    <label class="form-label">Remove tags</label>
                    <select class="form-control custom-input" id="delete_tag_id">
                        <option disabled selected="selected" value>Select</option>
                        <option value="1">Home</option>
                        <option value="2">School</option>
                        <option value="3">Office</option>
                        <option value="4">Family</option>
                        <option value="6">Temple</option>
                    </select>

                    <br>
                    <button class="btn delete-btn" id="delete-tag" onclick="tagDeleteFunction()"><p>- Delete Tags</p></button>
                </div>
                
                <div style="margin-top: 100px"></div>
            </div>

        </div>
    </div>


    <div class="container section-02-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">REMOVE &nbsp USER</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">ALL &nbsp USER &nbsp DETAILS &nbsp & &nbsp TAGS</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>


    <div class="container">
        <div class="row">

            <div class="col-lg-4"></div>
            
            <div class="col-lg-4">
                <div id="deletecontact">
                    <button class="btn delete-btn mb-5" id="delete-contact" onclick="deleteFunction()"><p>- Delete Contact</p></button>
                </div>
            </div>

            <div class="col-lg-4"></div>

        </div>
    </div>

    <!-- <div class="container">
        
    </div> -->

    <!-- <a href="http://localhost/WebGL-Contact-List/">Back to home</a> -->


    <script>

        $("#reset").on("click", function () {
            $('#asign-tag').prop('selected', function() {
                return this.defaultSelected;
            });
        });

        //Backbone model
        var Contact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/attachments/<?php echo $contact_id ?>',
            idAttribute: "contact_id",
            defaults:{
                contact_id:'',
                contact_fname:'',
                contact_number:'',
                id: '',
                contact_note:'',
                contact_address:'',
                contact_sname:'',
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
        var TagListView = Backbone.View.extend({
            model: incomingContacts,
            el: '#taglist',

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
                        "<div class='all-tags'>" +
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
        var tagListView = new TagListView();


        // For personal data
        // Backbone model
        var SingleContact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/getbyid/<?php echo $contact_id ?>',
            idAttribute: "contact_id", 
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
                                "<p class='view-page-title'> Name </p>" +
                                "<p class='view-page-data'>" + c.get('contact_fname') + " " + c.get('contact_sname') + "</p>" + 

                                "<p class='view-page-title'> Number </p>" +
                                "<p class='view-page-data'>" + c.get('contact_number') + "</p>" +

                                "<p class='view-page-title'> Belongs to </p>" +
                                "<p class='view-page-data'>" + "Vihan Perera" + "</p>" +

                                "<p class='view-page-title'> Address </p>" +
                                "<p class='view-page-data'>" + c.get('contact_address') + "</p>" +

                                "<p class='view-page-title'> Special Notes </p>" +
                                "<p class='view-page-data'>" + c.get('contact_note') + "</p>" +

                                "<p class='view-page-title'> Email </p>" +
                                "<p class='view-page-data'>" + c.get('contact_email') + "</p>" +

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


        // ----------------------------------Adding new tags----------------------------------//

        function assignTags()
        {
                //New model for assign tags
                var AssignTag = Backbone.Model.extend({
                        urlRoot: 'http://localhost/WebGL-Contact-List/index.php/api/Attachments/storeAttachment',
                        idAttribute: "attachment_id",
                    });

                //Backbone view for assign tags
                var ContactForm = Backbone.View.extend({
                    el: '#assigntag',
                    initialize: function() {
                        
                    },
                    render: function() {
                        return this;
                    },
                    events: {
                        "click #asign-tag" : 'assigntag'
                    },
                    assigntag: function () {

                        if( $('#tag_id').val() == 1 )
                        {
                            var assignedTag = new AssignTag({
                                'contact_id': <?php echo $contact_id; ?>, 
                                'tag_id': $('#tag_id').val(),
                                'tag_name': 'Home'
                            })
                        }

                        if( $('#tag_id').val() == 2 )
                        {
                            var assignedTag = new AssignTag({
                                'contact_id': <?php echo $contact_id; ?>, 
                                'tag_id': $('#tag_id').val(),
                                'tag_name': 'School'
                            })
                        }

                        if( $('#tag_id').val() == 3 )
                        {
                            var assignedTag = new AssignTag({
                                'contact_id': <?php echo $contact_id; ?>, 
                                'tag_id': $('#tag_id').val(),
                                'tag_name': 'Office'
                            })
                        }

                        if( $('#tag_id').val() == 4 )
                        {
                            var assignedTag = new AssignTag({
                                'contact_id': <?php echo $contact_id; ?>, 
                                'tag_id': $('#tag_id').val(),
                                'tag_name': 'Family'
                            })
                        }

                        if( $('#tag_id').val() == 6 )
                        {
                            var assignedTag = new AssignTag({
                                'contact_id': <?php echo $contact_id; ?>, 
                                'tag_id': $('#tag_id').val(),
                                'tag_name': 'Temple'
                            })
                        }

                        var ppp = assignedTag.toJSON();

                        incomingContacts.add(assignedTag);

                        assignedTag.save(ppp, {
                            success: function (response) {
                                console.log(response.toJSON().status);
                                assignedTag.save(ppp);
                                var firstView3 = new TagListView();
                                firstView3.render();
                            },
                            error: function () {
                                console.log('Failed to add');
                            }
                        });


                        $('#tag_id').val(0);

                        alert('New tag added !');
                    } 
                });
                // Instance for view
                var contactForm = new ContactForm();
        }



        // ----------------------------------Delete assigned tags----------------------------------//


        function tagDeleteFunction() 
        {
            alert('Delete tag clicked');  

            // Model to delete data
            var DeleteTag = Backbone.Model.extend({
                url: 'http://localhost/WebGL-Contact-List/index.php/api/Attachments/deleteAttachment',
                defaults:{
                    contact_address: "",
                    contact_fname: "",
                    contact_id: "",
                    contact_note: "",
                    contact_number: "",
                    contact_sname: "",
                    id: "",
                    tag_id: "",
                    tag_name: "",
                }
            });

            //Backbone view
            var DeleteTagView = Backbone.View.extend({
                el: '#deletetag',

                initialize: function () {
                    
                },
                render: function () {
                    
                },
                events: {
                    "click #delete-tag" : 'deletetag',
                },
                deletetag: function () {
                    var deletedTag = new DeleteTag({
                        'contact_id': <?php echo $contact_id; ?>, 
                        'tag_id': $('#delete_tag_id').val(),
                    })

                    // var ppp = deletedTag.toJSON();

                    deletedTag.destroy();

                    var firstView1 = new TagListView();
                    firstView1.render();
                } 
            });

            //View instance
            var deleteTagView = new DeleteTagView();  
        }


        // ---------------------------------- Delete contacts ----------------------------------//


        function deleteFunction() {
            //alert("button cicked!");


            // Model to delete contact
            var DeleteContact = Backbone.Model.extend({
                url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/delete/<?php echo $contact_id ?>',
                defaults:{
                    contact_id:'',
                    contact_fname:'',
                    contact_number:'',
                    id: '',
                    contact_note:'',
                    contact_address:'',
                    contact_sname:'',
                }
            });

            //Backbone view
            var DeleteContactView = Backbone.View.extend({
                el: '#deletecontact',

                initialize: function () {
                    
                },
                render: function () {
                    
                },
                events: {
                    "click #delete-contact" : 'deletecontact',
                },
                deletecontact: function () {
                    console.log('view works !');
                    var deleteContact = new DeleteContact({
                        'contact_id': <?php echo $contact_id ?>,
                        'contact_fname':'',
                        'contact_number':'',
                        'id': '',
                        'contact_note':'',
                        'contact_address':'',
                        'contact_sname':'',
                    });
                    
                    deleteContact.destroy();
                    console.log(deleteContact.destroy());
                } 
            });

            var deleteContactView = new DeleteContactView();

        }


    </script>
</body>
</html>