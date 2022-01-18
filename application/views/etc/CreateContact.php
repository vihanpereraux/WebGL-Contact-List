<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Contact</title>

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
                <h4 id="welcome-text">Craete new contacts !</h4>
            </div>   
        </div>
    </div>

    <div class="container">
        <!-- Form section -->
        <div id="postcontact">
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            <label for="html">Name</label>
                            <input class="form-control" id="contact_name">
                        </td>
                        <td>
                            <label for="html">Number</label>
                            <input class="form-control" id="contact_number">
                        </td>
                        <td>
                            <label for="html">Assigned User</label>
                            <input class="form-control" id="id">
                        </td>
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
            </table>
            <button class="btn btn-success" id="add-contact">Create Contact</button>
            <!-- <button id="update-contact">update me</button> -->
        </div>
    </div>


    <script>
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


        $(document).ready(function() {
            $('#update-contact').on('click',
                function() {
                    console.log('aaaaded');
                });
        });

        //View instance
        var contactForm = new ContactForm();
    </script>
    
</body>
</html>