<?php
session_start();
include 'include/navigation.php';
?>

<html>

<meta name="viewport" content="width = device-width, initial-scale = 1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Titillium+Web" rel="stylesheet">

<title>Travel Planner</title>

<style>

    .header{
        font-family: "Nunito";
        font-display: block;
        font-style: oblique;
        padding-left: 100px;
        margin: 0px;
    }

    .about-us{
    background-color:#DCDCDC;
    color:#2F4F4F;
    font-family:"Nunito";
    padding-top: 25px;
    padding-bottom:25px;
    }

    .contact-info{
        margin-top: 80px;
        margin-left: 50px;
    }

    .about-text{
        font-weight: bold;
    }

    .btn {
    margin: 15px 0;
    background-color: #ff533d;
    color: #fff;
    }

    .login{
    background: url("img/login.png");
    background-size: cover;
    color:white;
    font-family:"Titillium Web";
    padding-left: 50px;
    padding-right: 50px;
    padding-bottom: 25px;
    padding-top: 25px;
    }

     .img-responsive{
        height: 300px;
        width: auto;
        margin-left:50px;
        margin-top: 20px;
    }

    .image{
        height: 200px;
        width: auto;
        border: #ffffff67;
        border-width: 10px;
		box-shadow: 0 2px 8px black;
    }

	.image:hover {
        box-shadow: 0 1px 8px black;
    }

	.thumbnail {
     border: 0 none;
     box-shadow: none;
	 border-radius:0px;
    }

    .btn {
    margin: 15px 0;
    background-color: #f19f4d;
    color: #fff;
    }

    .logo{
        margin-top:25px;
    }

	.thumbnail:hover {
	    box-shadow: 0 1px 16px #DCDCDC;
	}

    .photo-grid{
        background: #ffffff67;
        font-family: "Montserrat";
        padding-top: 50px;
        padding-bottom: 100px;
    }

    .contact{
        background-color: rgba(0, 204, 255, 0.986);
        padding-top:25px;
        padding-bottom:25px;
    }

.contact{
    font-family: "Nunito";
    font-weight: bold;
    color:#2F4F4F;
}

</style>

<body>

    <div style="height: 50px;">
        <p>empty div</p>
    </div>

    <!--ABOUT US-->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="img/login.png" class="img-responsive" img style="border:20px solid white" alt="">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="continent">

                    Continents:<br><br>
                    <select id="continentlist" onchange=show_list("countrylist") style="width:160px">
                      <option selected disabled>Choose One:</option>
                      <option value="nam">North America</option>
                      <option value="sam">South America</option>
                      <option value="europe">Europe</option>
                      <option value="asia">Asia</option>
                      <option value="africa">Africa</option>
                    </select>
                    <div id="countrylist" style="display:none">
                      <br><br>
                      Countries:<br><br>
                      <select id="countries" onchange=show_list("attractionlist") style="width:160px">
                      </select>
                    </div>

                    <div id="attractionlist" style="display:none">
                      <br><br>
                      Attractions:<br><br>
                      <select id='attractions' style="width:160px">
                      </select>
                    </div>

                  </div>

                  <div class="place">
                    <br><br><br>
                    Popular Places:<br><br>
                    <select>
                      <option selected disabled>Choose One:</option>
                      <option value="yosemite">Yosemite Park</option>
                      <option value="notredame">Notre Dame</option>
                      <option value="sahara">Sahara Desert</option>
                      <option value="alps">The Alps</option>
                      <option value="everest">Mount Everest</option>
                    </select>
                    <br>
                    <br>
                    <br>
                  </div>

                  <div class="main">
                    <h2>Header</h2>

                  </div>


                    <h3><b>About Us</b></h3>
                    <p>Reho is an experienced travel management company. We work with you to manage all elements of
                        your travel in an efficient, cost effective and ethical manner.<br>

                        Reho Travel grew out of an overland luxury bus concept in the UK in the 70’s then
                        transformed
                        into a High Street bucket shop in the 80’s. The company has now evolved into a highly
                        respected
                        purpose driven Australian owned travel management company. Reho Travel is committed to
                        making a
                        difference in the world that its clients travel to, whether on business, on holiday or on a
                        study tour. With offices in Melbourne and Sydney, the company is focused on managing the
                        travel
                        for companies with a travel spend up to $5m.</p>
                    <p><I>Why trust us?</I></p>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <li> Exclusive Experiences</li>
                        <li> Bookings across the globe</li>
                        <li> Travel Experience like no other</li>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <li> Your memories are our responsibilities </li>
                        <li> Its better see something once than hear about it a thousand times </li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--LOGIN-->
    <div class="login" id="login">
        <p style="padding:30% 0 0 0"></p>
</div>

    <!--PHOTO GRID-->
    <div class="photo-grid">
        <div class="container">
            <h2>WE OFFER THESE EXCITING TRAVEL DESTINATIONS!</h2><br><br>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-8">
                    <a href="british.php" style="text-decoration:none;">
                        <div class="thumbnail">
                            <img src="img/lon.jpg" alt="Nature" style="width:100%">
                            <div class="caption">
                                <h3><b>The Great British Endeavor</b></h3>
                                <p>&nbsp;</p>
                                <p>✓ 5 Star Hotels</p>
                                <p>✓ All 7 Isles</p>
                                <p>✓ Flight tickets included</p>
                                <p>✓ Guided visits</p>
                                <h5><b> Starting at $350 </b></h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-8">
                    <a href="USA.php" style="text-decoration:none;">
                        <div class="thumbnail">
                            <img src="img/D.jpg" alt="Nature" style="width:100%">
                            <div class="caption">
                                <h3><b>The Land of Liberty</b></h3>
                                <p>&nbsp;</p>
                                <p>✓ 5 Star Hotels</p>
                                <p>✓ Exclusive sight seeing</p>
                                <p>✓ A City per day</p>
                                <p>✓ Flight tickets included</p>

                                <h5><b> Starting at $500 </b></h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-8">
                    <a href="europe.php" style="text-decoration:none;">
                        <div class="thumbnail">
                            <img src="img/eu.jpg" alt="Nature" style="width:100%">
                            <div class="caption">
                                <h3><b>Vive La Europe</b></h3>
                                <p>&nbsp;</p>
                                <p>✓ 5 Star Hotels</p>
                                <p>✓ Rich Anciet European Experience </p>
                                <p>✓ Flight tickets included</p>
                                <p>✓ Guided Visits</p>
                                <h5><b> Starting at $2000</b></h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-8">
                    <a href="india.php" style="text-decoration:none;">
                        <div class="thumbnail">
                            <img src="img/K.jpg" alt="Nature" style="width:100%">
                            <div class="caption">
                                <h3><b>Land of Gods</b></h3>
                                <p>&nbsp;</p>
                                <p>✓ 5 Stars Hotel</p>
                                <p>✓ All Inclusive</p>
                                <p>✓ Flight tickets included</p>
                                <p>✓ Guided visits</p>
                                <h5><b> Starting at $1750 </b></h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-8">
                    <a href="africa.php" style="text-decoration:none;">
                        <div class="thumbnail">
                            <img src="img/T.jpg" alt="Nature" style="width:100%">
                            <div class="caption">
                                <h3><b>Exploring Afrićas</b></h3>
                                <p>&nbsp;</p>
                                <p>✓ 5 Star Hotels</p>
                                <p>✓ Exclusive sight seeing</p>
                                <p>✓ Flight tickets included</p>
                                <p>✓ All the way from Sahara to Cape Town</p>
                                <h5><b> Starting at $2100</b></h5>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-8">
                    <a href="australia.php" style="text-decoration:none;">
                        <div class="thumbnail">
                            <img src="img/Au.jpg" alt="Nature" style="width:100%">
                            <div class="caption">
                                <h3><b>Australian Blende</b></h3>
                                <p>&nbsp;</p>
                                <p>✓ 5 Star Hotels</p>
                                <p>✓ Living the Extreme Metropolis</p>
                                <p>✓ Tameing the Wilderness</p>
                                <p>✓ Flight tickets included</p>

                                <h5><b> Starting at $3405</b></h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="contact">
        <div class="container">
            <div class="col-md-8">
                <div class="row">
                    <div class="section-title">
                        <h2>Get In Touch</h2>
                        <p>Please fill out the form below to send us an
                            email and we will get back to you as soon
                            as possible.</p>
                    </div>
                    <form method="POST" action="sql/contactUs.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="abc" name="contact-name" class="form-control" placeholder="Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="contact-email" class="form-control" placeholder="Email"
                                        required>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="contact-message" class="form-control" rows="4" placeholder="Message"
                                required maxlength="256"></textarea>

                        </div>
                        <div id="success">
                            <p></p>
                        </div>
                        <button type="submit" class="btn btn-custom btn-lg">Send
                            Message</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 contact-info">
                <div class="contact-item">
                    <h4>Contact Info</h4>
                    <p>Ryerson University<br></p>
                </div>
                <div class="contact-item">
                    <p> 7123554536 </p>
                </div>
                <div class="contact-item">
                    <p> bytestacscs.ryersonk@gmail.com</p>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'include/footer.php';
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
    let nam_countries = ['Canada', 'United States']
    let sam_countries = ['Argentina', 'Brazil']
    let euro_countries = ['France', 'Italy']
    let africa_countries = ['Egypt', 'Morocco']
    let asia_countries = ['China', 'Japan']

    function fill_country(array) {
      $('#countries').children().remove();
      $('#countries').append($("<option selected disabled></option>").text("Choose One:"));
      $.each(array, function(key,value) {
        $('#countries').append($('<option></option>').text(value));
      });
    }

    $(document).ready(function(){
        $("#continentlist").change(function(){
            var contVal = $(this).children("option:selected").val();
            if (contVal == "nam") { fill_country(nam_countries); }
            else if (contVal == "sam") { fill_country(sam_countries); }
            else if (contVal == "europe") { fill_country(euro_countries); }
            else if (contVal == "asia") { fill_country(asia_countries); }
            else if (contVal == "africa") { fill_country(africa_countries); }
        });
    });
    </script>
    <script>
    let canada_attr = ['CN Tower', 'Whistler Blackcomb']
    let us_attr = ['Central Park', 'Disney Land']

    let argen_attr = ['Argentina', 'Brazil']
    let brazil_attr = ['France', 'Germany']

    let france_attr = ['Cameroon', 'Chad']
    let italy_attr = ['Cameroon', 'Chad']

    let egypt_attr = ['Cameroon', 'Chad']
    let morocco_attr = ['Cameroon', 'Chad']

    let china_attr = ['Cameroon', 'Chad']
    let japan_attr = ['Cameroon', 'Chad']


    function fill_attraction(array) {
      $('#attractions').children().remove();
      $('#attractions').append($("<option selected disabled></option>").text("Choose One:"));
      $.each(array, function(key,value) {
           $('#attractions').append($("<option></option>").text(value));
      });
    }

    $(document).ready(function(){
        $("#countrylist").change(function(){
            var countryVal = $('#countries').children("option:selected").val();
            if (countryVal == "Canada") { fill_attraction(canada_attr); }
            else if (countryVal == "Cuba") { fill_attraction(cuba_attr); }
            else if (countryVal == "Jamaica") { fill_attraction(jamaica_attr); }
            else if (countryVal == "Panama") { fill_attraction(panama_attr); }
            else if (countryVal == "United States") { fill_attraction(us_attr); }
        });
    });
    </script>
    <script>
      function show_list(list) {
          document.getElementById(list).style.display = "block";
      }
    </script>


</body>

</html>
