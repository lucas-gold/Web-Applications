<?php
session_start();
require_once('travel_planner/create_table.php');
include 'include/navigation.php';
?>

<html>
<head>
<meta name="viewport" content="width = device-width, initial-scale = 1">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Titillium+Web" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="stylesheetA1.css">

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

body{
  background: url("img/cityscape.svg") bottom;
  background-size:cover;

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

#aboutpage {
  text-align:right;
  padding-right: 20%;
  display:none;
  float:right;
}
#contactpage {
  text-align:right;
  padding-right: 20%;
  display:none;
  float:right;

}

.about_l {
  width: 190px;
  position: fixed;
  text-align:center;
  background: #222222;
  border-radius: 25px;
  color:#9d9d9d;
  padding: 10px 20px 10px 20px;
}

#attr {
  max-height: 550px;
  min-width: 420px;
  max-width: 750px;
  display: none;
  padding:40px;
  background: #64b4cf;
  border-radius: 25px;
}
#c1, #c2, #c3 {

  max-height: 200px;
  max-width: 210px;
  display: none;
  float:left;
  padding: 10px;
  margin: 5px;
  background: #64b4cf;
  border-radius: 25px;
}

#fig {
  display: none;
}

#caption {
  margin-top: -35px;
  margin-left: 20px;
}



@media (max-height:400px) {
  .about_l{
    position:static;
    padding: 0px;
    background: none;
    color:black;
  }

}


</style>








</head>
<body>

  <script>
  function show_countries(str) {

    $("#countrylist").load("travel_planner/get_countries.php?q="+str);

  }

  function show_attractions(str) {

    $("#attractionlist").load("travel_planner/get_attractions.php?q="+str);

  }

  function show_pics(str) {
    $("#info").load("travel_planner/get_pics.php?q="+str);

  }
  </script>

  <div style="height: 50px;">
  </div>

  <!--MAIN PAGE-->
  <div class="about-us">
    <!--CONTACT US-->
    <div id="contactpage">
      <span class = "about_l" style="font-size:24px;">Contact Us<br></span><br><br><br><br>
      <span class = "about_l">Tammy Cheung<br>something@ryerson.ca<br></span><br><br><br><br>
      <span class = "about_l">Lucas Gold<br>lucas.gold@ryerson.ca<br></span><br><br><br><br>
      <span class = "about_l">Mustafa Salem<br>something@ryerson.ca<br></span>
    </div>
    <!--ABOUT US-->
    <div id="aboutpage">
      <span class = "about_l" style="font-size:24px;">About Us<br></span><br><br><br><br>
      <span class = "about_l">Tammy Cheung<br>StudentNum<br></span><br><br><br><br>
      <span class = "about_l">Lucas Gold<br>500686031<br></span><br><br><br><br>
      <span class = "about_l">Mustafa Salem<br>StudentNum<br></span>
    </div>
    <!--DROPDOWN MENU-->

          <div class="continent">

            <h3> &nbsp&nbsp&nbspContinents:</h3><br>
            <select id="continentlist" name="continentlist" onchange=show_countries(this.value) style="width:160px; color:black">
              <option selected disabled>Choose a continent...</option>
              <?php foreach ($continents as $row): ?>
                    <option value="<?=$row["cont_id"]?>"><?=$row["name"]?></option>
              <?php endforeach ?>
            </select>

            <div id = "countrylist"></div>
            <div id = "attractionlist"></div>

            <div>
              <br><br>
              <h4> &nbsp&nbsp&nbspPopular Places:</h4><br>
              <select id='popularplaces' style="width:160px; color:black">
                <option selected disabled>Choose One:</option>
                <option value="yosemite">Yosemite Park</option>
                <option value="notredame">Notre Dame</option>
                <option value="sahara">Sahara Desert</option>
                <option value="alps">The Alps</option>
                <option value="everest">Mount Everest</option>
              </select>
            </div>

          </div>

          <div id = "info">
            <h2>Header</h2>
            <figure id = "fig">
            <img id = "attr"></img>
            <figcaption id = "caption"></figcaption>
          </figure>
                <img id = "c1"></img>

                <img id = "c2"></img>

                <img id = "c3"></img><br><br>



                read more read more read more

          </div>


          <h3><b>About Us</b></h3>

  </div>

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
      //window.location.href="?cont_id="+contVal;
      document.cookie = "continent="+contVal;

      if (contVal == "1") { fill_country(nam_countries); }
      else if (contVal == "sam") { fill_country(sam_countries); }
      else if (contVal == "europe") { fill_country(euro_countries); }
      else if (contVal == "asia") { fill_country(asia_countries); }
      else if (contVal == "africa") { fill_country(africa_countries); }
    });
  });
  </script>
  <script>
  let canada_attr = ['CN Tower', 'Casa Loma']
  let us_attr = ['Las Vegas', 'Disney Land']


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
      document.cookie = "country="+countryVal;
      if (countryVal == "Canada") { fill_attraction(canada_attr); }
      else if (countryVal == "Cuba") { fill_attraction(cuba_attr); }
      else if (countryVal == "Jamaica") { fill_attraction(jamaica_attr); }
      else if (countryVal == "Panama") { fill_attraction(panama_attr); }
      else if (countryVal == "United States") { fill_attraction(us_attr); }
    });
  });


  $(document).ready(function(){
    $("#attractionlist").change(function(){
      var attrVal = $('#attractions').children("option:selected").val();
      if (attrVal == "CN Tower") { display_attraction("cntower", "casaloma", "disney", "lasvegas", attrVal); }
    });
  });
  function display_attraction(attr, close1, close2, close3, attrVal) {
    document.getElementById("attr").src = "img/" + attr + ".jpg";
    document.getElementById("c1").src = "img/" + close1 + ".jpg";
    document.getElementById("c2").src = "img/" + close2 + ".jpg";
    document.getElementById("c3").src = "img/" + close3 + ".jpg";
    document.getElementById("fig").style.display = "block";
    document.getElementById("attr").style.display = "block";
    document.getElementById("c1").style.display = "block";
    document.getElementById("c2").style.display = "block";
    document.getElementById("c3").style.display = "block";
    document.getElementById("caption").innerHTML = attrVal;
    document.getElementById("caption").innerHTML = attractions;

  }


  </script>
  <script>
  function show_list(list) {
    document.getElementById(list).style.display = "block";
  }

  </script>


</body>

</html>
