<link href="https://fonts.googleapis.com/css?family=Montserrat|Nunito|Lato|Titillium+Web" rel="stylesheet" type="text/css">
<style>
  .navbar{
  font-family: "Nunito";
}
input[type=text] {
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  width: 120px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  color:#585858;
  height:20px;
}
input[type=text]:focus {
  width: 250px;
  height: 30px;
  font-size: 16px;
}


</style>




<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><strong>Holiday Planner</strong></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navi" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><strong> <span class="glyphicon glyphicon-home"></span> Home</strong></a></li>
        <li><a onclick=toggle_aboutpage()><strong> <span class="glyphicon glyphicon-bookmark"></span> About Us</strong></a></li>
        <li><a onclick=toggle_contactpage()><strong> <span class="glyphicon glyphicon-comment"></span> Contact Us</strong></a></li>
        <li><a href="cart.php"><strong> <span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</strong></a></li>
        <li>
          <a onclick=show_search()><strong id="hideme"> <span class="glyphicon glyphicon-search"></span> Search</strong>
          <form action="" onsubmit="search_results(search.value); return false;" method="get" id="searchform" style="display: inline">
          <input type="text" id="search" name="search" style="display: none" placeholder="Search...">
          </form></a>
      </a>
      </li>
      </ul>
    </div>
  </div>
</nav>
<!--        <form action="" onsubmit="search_results(this.value); return false;" method="get" id="searchform" style="display: inline">
          <input type="text" id="search" name="search" style="display: none" placeholder="Search...">
        </form></a> -->

<script>

function about() {
  document.getElementById("aboutus").style.display = "none";

}

function show_search() {
  document.getElementById("search").style.display = "block";
  document.getElementById("hideme").style.display = "none";
}

  function toggle_aboutpage() {
      var x = document.getElementById("aboutpage").style.display;
      if (x == "block") {
          document.getElementById("aboutpage").style.display = "none";
      }
      else {
        document.getElementById("aboutpage").style.display = "block";
      }
  }

  function toggle_contactpage() {
      var x = document.getElementById("contactpage").style.display;
      if (x == "block") {
          document.getElementById("contactpage").style.display = "none";
      }
      else {
        document.getElementById("contactpage").style.display = "block";
      }
  }



</script>
