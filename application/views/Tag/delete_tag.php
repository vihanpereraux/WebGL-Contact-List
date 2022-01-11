<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Assign Tags</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.2/underscore-min.js" integrity="sha512-anTuWy6G+usqNI0z/BduDtGWMZLGieuJffU89wUU7zwY/JhmDzFrfIZFA3PY7CEX4qxmn3QXRoXysk6NBh5muQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.0/backbone-min.js" integrity="sha512-9EgQDzuYx8wJBppM4hcxK8iXc5a1rFLp/Chug4kIcSWRDEgjMiClF8Y3Ja9/0t8RDDg19IfY5rs6zaPS9eaEBw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel = "stylesheet" type = "text/css" 
        href = 'http://localhost/WebGL-Contact-List/styles/contact.css'>
</head>
<body>

    <!-- Create heading -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5 id="welcome-text">Assign new tags for - <?php echo $contact_id ?></h5>
            </div>   
        </div>
    </div><br>

    <div class="container"><h4>Associated Tags</h4></div><br>
    <div id="taglist"></div>

    <div class="container">
        <div id="deletetag">
            <label for="html">Delete Tag ID</label>
            <select class="form-control" id="tag_id">
                <option value="1">Home</option>
                <option value="2">School</option>
                <option value="3">Office</option>
                <option value="4">Family</option>
                <option value="6">Temple</option>
            </select>    

            <br>
            <button class="btn btn-danger" id="delete-tag">Delete Tag</button><br>

        </div>
    </div>


    <script>
        // Backbone model
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


        //New model for delete tags
        var AssignTag = Backbone.Model.extend({
            urlRoot: 'http://localhost/WebGL-Contact-List/index.php/api/attachments/delete',
            idAttribute: "attachment_id",
        });

        //Backbone view for assign tags
        var ContactForm = Backbone.View.extend({
            el: '#deletetag',
            initialize: function() {
                
            },
            render: function() {
                return this;
            },
            events: {
                "click #delete-tag" : 'deletetag'
            },
            deletetag: function () {
                var assignedTag = new AssignTag({
                    'contact_id': <?php echo $contact_id; ?>, 
                    'tag_id': $('#tag_id').val(),
                })
                var ppp = assignedTag.toJSON();
                //console.log(details);
                assignedTag.destroy(ppp);
                console.log(ppp.task_id);
            } 
        });

        // Instance for view
        var contactForm = new ContactForm();

    </script>


</body>
</html>