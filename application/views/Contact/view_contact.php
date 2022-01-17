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
                    src="http://localhost/WebGL-Contact-List/img/tagmanageimg.png" alt="">
            </div>

            <div class="col-lg-6" style="padding-left: 35px">
                <div id="taglist"></div>   

                <div class="">
                    <div id="assigntag">
                    <label class="form-label">Assign new tags</label>
                    <select class="form-control custom-input" id="tag_id">
                        <option disabled selected="selected" value>Select</option>
                        <option value="1">Home</option>
                        <option value="2">School</option>
                        <option value="3">Office</option>
                        <option value="4">Family</option>
                        <option value="6">Temple</option>
                    </select>    
                    <br>
                    <button class="btn create-btn" id="asign-tag">
                        <p>+ Assign Tags</p></button>
                </div><br>

                <form id="myForm">
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
                        <button class="btn delete-btn" id="delete-tag"><p>- Delete Tags</p></button>
                    </div>
                </form>
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

    <div class="continer">
        <div id="deletecontact">
            <button class="btn btn-danger" id="delete-contact" 
                onclick="deleteFunction()">- Delete Tags</button>
        </div>
    </div>

    <a href="http://localhost/WebGL-Contact-List/">Back to home</a>


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

                var assignedTag = new AssignTag({
                    'contact_id': <?php echo $contact_id; ?>, 
                    'tag_id': $('#tag_id').val(),
                })

                var ppp = assignedTag.toJSON();
                incomingContacts.add(assignedTag);
                assignedTag.save(ppp);
                alert('New tag added !');
                document.getElementById("myForm").reset();
                console.log(incomingContacts.toJSON());
            } 
        });

        // Instance for view
        var contactForm = new ContactForm();


        // ----------------------------------Delete assigned tags----------------------------------//


        // Model to delete data
        var DeleteTag = Backbone.Model.extend({
            urlRoot: 'http://localhost/WebGL-Contact-List/index.php/api/Attachments/deleteAttachment',
            idAttribute: "attachment_id",
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
                var ppp = deletedTag.toJSON();
                deletedTag.destroy();
                var firstView1 = new ContactListView();
                firstView1.render();
            } 
        });

        //View instance
        var deleteTagView = new DeleteTagView();


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
                    //var deleteContact = new DeleteContact();
                    deleteContact.destroy();
                    console.log(deleteContact.destroy());
                    // var firstView1 = new ContactListView();
                    // firstView1.render();
                } 
            });

            var deleteContactView = new DeleteContactView();

        }


    </script>
</body>
</html>