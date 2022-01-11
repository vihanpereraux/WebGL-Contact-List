<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Explore Contact</title>

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
                <h4 id="welcome-text">Search your contacts Vihan Perera !</h4>
            </div>   
        </div>
    </div><br><br>

    <div class="container">
        <form>
            <label for="fname">First name:</label>
            <input type="text" id="fname" name="fname" value="Gamage">

            <a class="btn btn-warning" onclick="myFunction()">Search</a>
        </form>
    </div>

    <div id="contactlist"></div>

    <div id="sercontactlist"></div>


    <script>
        
        function myFunction() {
            //alert('ssss');
            $fname = document.getElementById("fname").value;
            window.location.href = "http://localhost/WebGL-Contact-List/index.php/Welcome/Results/" + $fname;
        }

        //Backbone model
        var Contact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/contacts',
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
                    var names = 
                    "<div class='names'>" + 
                        "<div class='container'>" +
                            "<div class='row'>" +
                                "<div class='col-3'><a href = 'http://localhost/WebGL-Contact-List/index.php/Welcome/View/" + c.get('contact_id') + "'>" + c.get('contact_fname') + " " + c.get('contact_sname') + "</a></div>" + 
                                "<div class='col-2'>" + c.get('contact_number') + "</div>" +
                                "<div class='col-4'>" + c.get('contact_address') + "</div>" +
                                "<div class='col-3' style='text-align: center'>" + 
                                    "<button class='btn btn-warning id='update-contact' style='margin-right: 10px'><a href = 'http://localhost/WebGL-Contact-List/index.php/Welcome/Update/" + c.get('contact_id') + "'>update</a></button>"+ 
                                    "<button class='btn btn-danger delete-contact'><a href = 'http://localhost/WebGL-Contact-List/index.php/Welcome/Delete/" + c.get('contact_id') + "'>Delete</a></button>"+ 
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
        //var contactListView = new ContactListView();

        //--------------------------------------------------------------------------//

        //New model for serch contact
        // var SearchContact = Backbone.Model.extend({
        //     urlRoot: 'http://localhost/WebGL-Contact-List/index.php/api/attachments/getbyname/Gamage',
        //     idAttribute: "contact_id",
        //     defaults:{
        //         contact_id:'',
        //         contact_name:'',
        //         contact_number:'',
        //         id: '',
        //         contact_note:'',
        //         contact_address:'',
        //     }
        // });

        // //Backbone collection
        // var IncomingSearchedContacts = Backbone.Collection.extend({
        //     model: SearchContact,
        //     url: 'http://localhost/WebGL-Contact-List/index.php/api/attachments/getbyname/Gamage',
        // });

        // var incomingSearchedContacts = new IncomingSearchedContacts();

        // //Backbone view
        // var ContactForm = Backbone.View.extend({
        //     el: '#sercontactlist',
        //     initialize: function() {
                
        //     },
        //     render: function() {
        //         //return this;
        //     },
        //     events: {
        //         "click #explore-btn" : 'explorecontact',
        //     },
        //     explorecontact: function () {
        //         //var surname = document.getElementById("fname").value);
        //         incomingSearchedContacts.fetch({async:false});
        //         console.log(incomingSearchedContacts.toJSON());
        //         this.render(); 
        //     } 
        // });

        // //View instance
        // var contactForm = new ContactForm();

    </script>

</body>
</html>