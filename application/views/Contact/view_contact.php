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

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5 id="welcome-text">Assign new tags for - <?php echo $contact_id ?></h5>
            </div>   
        </div>
    </div><br>

    <div class="container">
        <div id="assigntag">
            <label for="html">Tag ID</label>
            <select class="form-control" id="tag_id">
                <option disabled selected="selected" value>Select</option>
                <option value="1">Home</option>
                <option value="2">School</option>
                <option value="3">Office</option>
                <option value="4">Family</option>
                <option value="6">Temple</option>
            </select>    

            <br>
            <button class="btn btn-success" id="asign-tag">Assign Tags</button>
            <a class="btn btn-danger" 
                href="http://localhost/WebGL-Contact-List/index.php/Tag/Delete/<?php echo $contact_id ?>">
                Delete tags</a>
        </div>
    </div><br><br>

    <!-- Delete tag -->
    <div class="container">
        <form id="myForm">
            <div id="deletetag">
                <label for="html">Delete Tag</label>
                <select class="form-control" id="delete_tag_id">
                    <option value="1">Home</option>
                    <option value="2">School</option>
                    <option value="3">Office</option>
                    <option value="4">Family</option>
                    <option value="6">Temple</option>
                </select>

                <br>
                <button class="btn btn-danger" id="delete-tag">Delete Tags</button>
            </div>
        </form>
    </div>

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
                                "<div class='12'> Name : " + c.get('contact_fname') + " " + c.get('contact_sname') + "</div>" + 
                                "<div class='12'> Number : " + c.get('contact_number') + "</div>" +
                                "<div class='12'> Saved Under : " + c.get('id') + "</div>" +
                                "<div class='12'> Address : " + c.get('contact_address') + "</div>" +
                                "<div class='12'> Note : " + c.get('contact_note') + "</div>" +
                                "<div class='12'> Email : " + c.get('contact_email') + "</div>" +
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
                document.getElementById("myForm").reset();
                console.log(incomingContacts.toJSON());
            } 
        });

        // Instance for view
        var contactForm = new ContactForm();


        // ----------------------------------Adding new tags----------------------------------//


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


    </script>
</body>
</html>