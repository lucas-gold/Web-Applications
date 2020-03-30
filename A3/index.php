<?php
session_start();
require_once('travel_planner/create_table.php');
include 'include/navigation.php';
include 'include/aboutus.php';

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
  color:#2F4F4F;
  font-family:"Nunito";
}

body{
  background: url("img/cityscape.svg");
  background-size:cover;

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
  padding-top: 1%;
  padding-right: 20%;
  display:none;
  float:right;
}
#contactpage {
  text-align:right;
  padding-top: 1%;
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

.mainimg {
  max-height: 550px;
  min-width: 420px;
  max-width: 750px;
  padding:40px;
  background: #64b4cf;
  border-radius: 25px;
  margin-top: -25px;
}
.c1, .c2, .c3 {

  max-height: 120px;
  max-width: 230px;
  float:left;
  padding: 10px;
  margin: 5px;
  background: #64b4cf;
  border-radius: 25px;
  margin-bottom: 50px;
}

.caption {
  margin-top: -35px;
  margin-left: 25px;
  padding-left: 13px;
}

.caption2 {
  color: white;
  font-size: 16px;
  float: left;
  margin-top: 130px;
  margin-left: -200px;
  padding-right: 20px;
}

#info {
  margin-left: 35%;
  font-size: 28px;
  padding: 0px 10px;
}

#search_data {
  position: absolute;
  bottom: 10px;
  right: 10px;
  background-color: #64b4cf;
  border: 8px solid #2f2f2f;
  color: #2f2f2f;
  font-size: 22px;
  border-radius: 15px;
  font-style:italic;
  padding: 10px 20px;
  display: none;

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

  function search_results(str) {
    document.getElementById("search_data").style.display = "block";
    $("#search_data").load("searchdb.php?search="+str.replace(/ /g,'+'));
  }
  </script>

  <div style="height: 50px;">
  </div>

  <!--MAIN PAGE-->

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
              <select id='popularplaces' onchange=show_pics(this.value) style="width:160px; color:black">
                <option selected disabled>Choose One:</option>
                <?php foreach ($attractions as $row): ?>
                      <option value="<?=$row["id"]?>"><?=$row["name"]?></option>
                <?php endforeach ?>
              </select>
            </div>

          </div>

          <div id="info"></div>
          <div id="search_data"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>
