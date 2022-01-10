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
                            <td><input class="form-control" id="username-input"></td>
                            <td><input class="form-control" id="fname-input"></td>
                            <td><input class="form-control" id="lname-input"></td>
                            <td><input class="form-control" id="number-input"></td>
                            <td><input class="form-control" id="email-input"></td>
                            <td><input class="form-control" id="password-input"></td>
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
            url: 'http://localhost/WebGL-Contact-List/index.php/api/users',
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

        //Backbone collection
        var NewUsers = Backbone.Collection.extend({
            model: Contact,
            url: 'http://localhost/WebGL-Contact-List/index.php/api/users'
        });

        //collection instance
        var newUsers = new NewUsers();

        //Backbone view - view user
        var UserView = Backbone.View.extend({
            model: newUsers, //connects view to the collection object
            el: $('#displayarea'), //connect view to page area

            initialize: function() {
                //getting all the users
                newUsers.fetch({async:false});
                this.render();
                //something happened to the newUser collection
                this.model.on('add', this.render, this);
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

        // anothr model for add user
        var AddUser = Backbone.Model.extend({
            url: 'http://localhost/WebGL-Contact-List/index.php/api/Contacts/storeUser',
            idAttribute: "id",
        });

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
                //var newUser = new AddUser();
                var newUser = new AddUser({
                    'username' : "hanzzzz",
                    'fname' : "hanzzzz",
                    'lname' : "hanzzzz",
                    'number' : "hanzzzz",
                    'email' : "hanzzzz",
                    'password' : "hanzzzz"
                });
                newUser.save();
                console.log('added to collection');
            }
        });
        var tableView = new TableView();
    </script>
</body>
</html>