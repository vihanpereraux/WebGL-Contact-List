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
        href = 'http://localhost/WebGL-Contact-List/styles/explore_styles.css'>
</head>
<body>

    <!-- Checking the content -->
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <p id="explore-heading">Search Your 
                    <span style="color: #FF543E">Contacts</span> &nbsp <span style="color: #282D98">: )</span></p>
            </div> 
            
        </div>
    </div><br>


    <div class="container section-01-devider">
        <div class="row">
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt">SEARCH RESULTS</p>
            </div>
            <div class="col-lg-6">
                <p class="mt-5 devider-01-txt-right">SEARCH BY NAMES</p>
            </div>
        </div>
        <div id="devider-01"></div>
    </div>

    <div class="container">
        <div class="row">
            
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form>
                    <label class="form-label">Search by surname</label>
                    <input type="text" class="form-control custom-input" id="fname" name="fname" value="Gamage">

                    <a class="btn search-btn" onclick="exploreFunction()"><p>Search</p></a>
                </form>
            </div>
            <div class="col-lg-4"></div>

        </div>
    </div>


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
    
    <div id="contactlist"></div>

    <div id="sercontactlist"></div>


    <script>
        
        function exploreFunction() {

            $fname = document.getElementById("fname").value;

            //Backbone model
            var Contact = Backbone.Model.extend({

                url: '<?php echo base_url('index.php/api/Explore/getContactsByName/'); ?>' + $fname,
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
                url: '<?php echo base_url('index.php/api/Explore/getContactsByName/'); ?>' + $fname,
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
                    self.$el.empty();
                    incomingContacts.each(function (c) {
                        var names = 
                        "<div class='names'>" + 
                            "<div class='container' style='padding-left: 10px; padding-left: 10px;'>" +
                                "<div class='row singe-record'>" +
                                    "<div class='col-3' id='full-name'><a href = '<?php echo base_url('index.php/Welcome/View/'); ?>" + c.get('contact_id') + "'>" + c.get('contact_fname') + " " + c.get('contact_sname') + "</a></div>" + 
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
                }
            });
            var contactListView = new ContactListView();
        }
        

    </script>

</body>
</html>