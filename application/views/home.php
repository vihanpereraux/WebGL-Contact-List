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

        <div class="row">
            <div id="inputarea">
                <table class="table">
                    <thead>
                        <tr>
                            <td><input class="form-control Id-input"></td>
                            <td><input class="form-control username-input"></td>
                            <td><input class="form-control fname-input"></td>
                            <td><input class="form-control lname-input"></td>
                            <td><input class="form-control number-input"></td>
                            <td><input class="form-control email-input"></td>
                            <td><input class="form-control password-input"></td>
                            <td><button class="btn btn-primary" id="add-contact">Add</button></td>
                        </tr>
                    </thead>
                </table>
            </div>

            <div id="displayarea">  

            </div>

            <div id="welcome">  
                <button id="mybtn">Press me</button>
            </div>
        </div>
    </div>

    <script>
        //Backbone model
        var Contact = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/users/getbyid/1',
            defaults:{
                id:'',
                username:'',
                fname:'',
                lname:'',
                number:'',
                email:'',
                password:'',
            }
        });

        var contact1 = new Contact({
            contact_id:'1',
            contact_name:'Thisal Gamage',
            contact_number:'0775565891',
            id:'1'
        });
        var contact2 = new Contact({
            contact_id:'2',
            contact_name:'Hansani Gamage',
            contact_number:'0715565478',
            id:'2'
        });

        var contact3 = new Contact({
            id: 1
        });
        //contact3.fetch({success: function() { alert("Name is " + contact3.get('username'))}});
        //alert(contact3.get('username'));

        //Backbone collection
        var Users = Backbone.Collection.extend({
            model: Contact,
            url: 'http://localhost/WebGL-Contact-List/index.php/api/users'
        });
        var users = new Users();
        users.fetch({async:false});
        var firstu = users.at(1);
        console.log(users.toJSON());

        //Backbone view
        var WelcomeView = Backbone.View.extend({
            el: '#welcome',
            initialize: function (){
                //this.render();
            },
            render: function (){
                //$(this.el).html('Hello');
            },
            events: {
                "click #mybtn" : "displaymsg"
            },
            displaymsg: function (){
                alert("Pressed it!");
            }
        });
        var welcome = new WelcomeView();

        //Backbone view - add user
        var TableView = Backbone.View.extend({
            el: '#inputarea',
            initialize: function() {

            },
            render: function() {
                return this;
            },
            events: {
                "click #add-contact" : 'adduser'
            },
            adduser: function() {
                console.log('creating a user');
                var i = $('.Id-input').val();
                var n = $('.username-input').val();
                var f = $('.fname-input').val();
                var l = $('.lname-input').val();
                var num = $('.number-input').val();
                var emal = $('.email-input').val();
                var pw = $('.password-input').val();

                var newUser = new Contact({
                    id: i,
                    username: n,
                    fname: f,
                    lname: l,
                    number: num,
                    email: emal,
                    password: pw  
                });
                
                newUser.save()
            }
        });
        var tableView = new TableView();

        //Backbone collection
        var NewUsers = Backbone.Collection.extend({
            model: Contact,
            url: 'http://localhost/WebGL-Contact-List/index.php/api/users'
        });

        //collection instance
        var newUsers = new NewUsers();

        //Backbone view - view user
        var UserView = Backbone.View.extend({
            model: NewUsers, //connects view to the collection object
            el: $('#displayarea'), //connect view to page area

            initialize: function() {
                //getting all the users
                newUsers.fetch({async:false});
                this.render();
            },

            render: function() {
                var self = this;
                newUsers.each(function (c) {
                    var names = "<div class='names'>" + c.get('username') + "</div>";
                    self.$el.append(names);
                })
            }
        });
        var userView = new UserView();














        //alert(firstu.get('username')); 

        // //collection instance
        // var contacts = new Contacts([contact1, contact2]);

        // //Backbone view for one record
        // var ContactView = Backbone.View.extend({
        //     model: new Contact(),
        //     tagName: 'tr',
        //     initialize: function(){
        //         this.template = _.template($('.contact-list-template').html());
        //     },
        //     render: function(){
        //         this.$el.html(this.template(this.model.toJSON()));
        //         return this;
        //     }
        // });

        // //Backbone view for all records
        // var ContactsView = Backbone.View.extend({
        //     model: contacts,
        //     el: $('.contacts-list'),
        //     initialize: function(){
        //         this.model.on('add', this.render, this);
        //     },
        //     render: function(){
        //         var self = this;
        //         this.$el.html('');
        //         _.each(this.model.toArray(), function(contact) {
        //             self.$el.append((new ContactView({model: contact})).render.$el);
        //         });
        //         return this;
        //     }
        // });
        // var contactsView = new ContactsView();

        // $(document).ready(function() {
        //     $('.add-contact').on('click', function() {
        //         var contact = new Contact({
        //             contact_id:$('.Id-input').val(),
        //             contact_name:$('.name-input').val(),
        //             contact_number:$('.number-input').val(),
        //             id: $('.ownerid-input').val()
        //         });
        //         console.log(contact.toJSON());
        //         contacts.add(contact);
        //     })
        // })
    </script>
</body>
</html>