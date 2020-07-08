<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 20%;
  height: 70px;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 80px 20px;
  height: 480px;
  font-size: 15px;
}

#First {background-color: #A8DADC;}
#Second {background-color: #457B9D;}
#Third {background-color: #1D3557;}
#Fourth {background-color: #bfd9ab;}
#Fifth {background-color: #e8747d;}
</style>
</head>

<body>
<?php 

$conn = mysqli_connect("localhost", "root", "", "kacst");
$query = "SELECT * FROM registered_patient_account WHERE Patient_Id= '777'";
$result = mysqli_query($conn, $query);


?>
<button class="tablink" onclick="openPage('First', this, '#A8DADC')">Patient Information & Main Results</button>
<button class="tablink" onclick="openPage('Second', this, '#457B9D')" id="defaultOpen">Patient Symptoms & Medical History </button>
<button class="tablink" onclick="openPage('Third', this, '#1D3557')">Sensor Data</button>
<button class="tablink" onclick="openPage('Fourth', this, '#bfd9ab')">Hospital Virtual Triage & Estimated Score </button>
<button class="tablink" onclick="openPage('Fifth', this, '#e8747d')">Result , Advice & Decision </button>


<div id="First" class="tabcontent">
<div style="float: left; width: 50%" >
  <span><h3>Patient information:</h3></span>

  <?php while($row = mysqli_fetch_array($result)) { ?>
  <p>
<b>Name: <?php echo $row['Patient_FName'] . " " . $row['Patient_LName']; ?>
  </p>
  <p>
    Patient ID: <?php echo $row['Patient_Id']; ?>
  </p>
  <p>
    National ID: <?php echo $row['Patient_NId'];  ?>
  </p>
  <p>
    Phone Number: <?php echo $row['Patient_MPhone']; ?>
  </p>
  <p>
    Address: <?php echo $row['Patient_Address']; ?>
  </p>
  <p>
    Registration Date: <?php echo $row['Registration_Date']; ?>
  </p>
  <p>
    Gender: <?php echo $row['Patient_Gender']; } ?>
  </p>
  </div>

  <div style="float: right; width: 50%" >
    <h3>Main Results</h3>
    <p>
        Score: 
    </p>
    <p>
        Level:
    </p>
    <p>
        Unit:
    </p>
    <p>
        Covid-19:
    </p>
</b>
  </div>

</div>


<div id="Second" class="tabcontent">
  <h3>News</h3>
  <p>Some news this fine day!</p> 
</div>

<div id="Third" class="tabcontent">
  <h3>Contact</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="Fourth" class="tabcontent">
  <h3>About</h3>
  <p>Who we are and what we do.</p>
</div>

<div id="Fifth" class="tabcontent">
  <h3>About</h3>
  <p>Who we are and what we do.</p>
</div>

<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");

  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none"; }

  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = ""; }

  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color; }
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
