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
                Contacts works!
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla aliquid ex ipsum, voluptatem 
                quibusdam quis alias deserunt possimus dolor itaque repellendus architecto obcaecati doloribus 
                quod. Quidem fugit ipsa doloribus reprehenderit!
            </div>

            <div class="col-lg-6">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla aliquid ex ipsum, voluptatem 
                quibusdam quis alias deserunt possimus dolor itaque repellendus architecto obcaecati doloribus 
                quod. Quidem fugit ipsa doloribus reprehenderit!
            </div>     
        </div>
    </div>

    <div id="contactlist">

    </div>

    <div id="postcontact">
        <table class="table">
            <thead>
                <tr>
                    <td><input class="form-control" id="contact_name"></td>
                    <td><input class="form-control" id="contact_number"></td>
                    <td><input class="form-control" id="id"></td>
                </tr>
            </thead>
        </table>
        <button id="add-contact">press me</button>
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
                    var names = "<div class='names'>" + c.get('contact_name') + "</div>";
                    self.$el.append(names);
                })
            }
            
        });

        //View instance
        var contactListView = new ContactListView();


        //New model for add contact
        var PostContact = Backbone.Model.extend({
            urlRoot: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/insert',
            idAttribute: "contact_id",
        });

        var AJAXPostContact = Backbone.Model.extend({
            save: function (option) {
                var model = this;
                $.ajax({
                    url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts/insert',
                    type: 'POST',
                    dataType: 'json',
                    data: model.toJSON(),
                    success: function (object, status){
                        console.log('gone!');
                    }
                })
            }
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
                "click #add-contact" : 'addcontact'
            },
            addcontact: function () {
                //var ppp = new AJAXPostContact();
                var ppp = new PostContact({
                    'contact_name': $('#contact_name').val(),
                    'contact_number': $('#contact_number').val(),
                    'id': $('#id').val()
                })
                var ss = ppp.toJSON();
                //console.log(details);
                ppp.save(ss);
                console.log(ss);
            } 
        });

        var contactForm = new ContactForm();

        


        


    </script>
</body>
</html>