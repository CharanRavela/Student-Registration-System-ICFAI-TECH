<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Student Registration Management System</title>
	<link href="assets/img/icfai.jfif" rel= "icon"/>
    <!--<script type="text/javascript" src="assets/jsPDF/dist/jspdf.min.js"></script>-->
    <script type="text/javascript" src="assets/js/html2canvas.js"></script>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google	Fonts -->
</head>
<body> 
<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
       <div class="navbar-collapse collapse move-me">
            <ul class="nav navbar-nav navbar-left">
               <img src="assets/img/icfai.jfif" alt="icon" style="width:64px" align="left"/>                
			   <li><a href="#">Hello <?php echo $_SESSION['loggedin_name'];?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>

   </div>
    </div>
</div>
<Script>
function displayTimetable(){
	
	var l;
    var length = document.getElementById("Conformed_subjects").rows.length;
		for(l =1 ; l <length ;l++){
		var cid = document.getElementById("Conformed_subjects").rows[l].cells[0];
	    //var section = document.getElementById("Conformed_subjects").rows[l].cells[2];
		var days = document.getElementById("Conformed_subjects").rows[l].cells[4];
		var hours = document.getElementById("Conformed_subjects").rows[l].cells[5];
		var roomno = document.getElementById("Conformed_subjects").rows[l].cells[6];
		if(days.textContent != "NA"){
		arr = days.textContent.toString().split(" ");
		for(var h=0;h<arr.length;h++)
		{
			arr[h] = arr[h]+hours.textContent;
			document.getElementById(arr[h]).innerHTML = cid.textContent + "<br>" + roomno.textContent;
		}
	    }
		}
}
</SCript>


<style>
        table {
            margin-top: 20px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width : 80%;
        }

        td, th {
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
		
        #colorrow{
            background-color: #dddddd;
        }

</style>
<div style="margin-top:120px" align="center">
<?php
if(isset($_POST['submit2'])){
    $c = 0;
    $count = 0;
    $str="Sorry! seats are filled for this subjects\\n";
    $cid = array();
    $sec = array();
    $strength = array();
    $selected_subjects = $_POST['finally'];
    for($i=0; $i<count($selected_subjects) ; $i++)
    {
      $cid[$i] = substr($selected_subjects[$i],0,strlen($selected_subjects[$i])-1);
      $sec[$i] = substr($selected_subjects[$i],strlen($selected_subjects[$i])-1);
      $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
      "SELECT strength FROM course_details where cid = '$cid[$i]' and section = '$sec[$i]' ");
      while ($row = mysqli_fetch_assoc($q)) {
         $strength[$i] = $row['strength'];
         if($row['strength'] > 0){
            $c++;
         }
         else 
         {
            $str = $str . $cid[$i] . " " . $sec[$i]. "\\n";
         } 
      }
    }
    if($c<6)
    {
        $str = $str . " Please select subjects again...! ";
        echo "<script type=\"text/javascript\">alert('$str'); window.location.href = \"studentPage.php\";</script>";
    }
    else{
        $sid=$_SESSION['loggedin_id'];
        $cs = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
        "select registered from student where sid= '$sid' ");
        while($row = mysqli_fetch_assoc($cs)){
            $Registered = $row['registered'];
        }
        if($Registered == "N"){
        for($i=0 ; $i < count($selected_subjects) ; $i++ ){
            $strength[$i] = $strength[$i] -1; 
            $Y = "Y";
        $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
        "UPDATE course_details set strength = '$strength[$i]' where cid = '$cid[$i]' and section = '$sec[$i]'");
        if($q){
            $ss = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "UPDATE student set registered = '$Y' where sid = '$sid' " );
        }
        if($q){
            $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "Insert into student_course_details values ('$sid' , '$cid[$i]', '$sec[$i]')" );
        }
        }
        echo "<script type=\"text/javascript\">alert('Registration was successfull')</script>";
        }
        echo "<b><h2>Subjects</h2></b>";
        echo "<form action=\"registrationDone.php\" method=\"post\" ><table id=\"Conformed_subjects\"><tr><th>Course code</th><th>Course Title</th><th>Section</th><th>Faculty Name</th><th>Days</th><th>Hour</th><th>Room no</th></tr>";
        for($i=0 ; $i<count($selected_subjects) ; $i++)
         {   
             $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT c.cid,c.section,c.c_name,f.F_name,cd.c_days,cd.c_hours,cd.roomno FROM course_details cd,course c,faculty f where c.cid = '$cid[$i]' and c.section = '$sec[$i]' and c.cid=cd.cid and c.fid=f.fid and c.section=cd.section group by c.section,c.cid");
            while ($row = mysqli_fetch_assoc($q)) 
            {
                $count = $count +1;
				if($count % 2 != 0)
				{
					$rowcolor = "colorrow";
				}
				else
				{
					$rowcolor = "colorrow1";
				}
                echo "<tr id=\"".$rowcolor."\"><td>".$row['cid']."</td><td>".$row['c_name']."</td><td>".$row['section']."</td><td>".$row['F_name']."</td><td>".$row['c_days']."</td><td>".$row['c_hours']."</td><td>".$row['roomno']."</td></tr>";
            }
        }
       echo "</table></form>";
       echo "<b style=\"margin-top:20px\"><h2>TimeTable</h2></b>";
       include("timetable.php");
       echo "<script type=\"text/javascript\">displayTimetable();</script>";  	
      // echo "<button type=\"submit\" class=\"btn btn-success btn-info\" style=\"margin-top:20px;margin-bottom:50px\">Save as PDF</button></form>";
      echo "<div align=\"center\">
                  <form action=\"./pdf.php\" method=\"POST\">
          <input type=\"hidden\" id=\"timetableAsPdf\" name=\"timetableAsPdf\">
          <button  class=\"btn btn-info btn-lg\" type=\"submit\" style=\"margin-top: 15px; margin-bottom:50px;\" width=\"180px\">Save as Pdf</button>
          </form> 
          <script>document.getElementById(\"timetableAsPdf\").value = document.getElementById(\"timetable\").outerHTML</script>
          </div>";
    }  
}
?>
</div>
<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>
<!--  Flexslider Scripts -->
<script src="assets/js/jquery.flexslider.js"></script>
<!--  Scrolling Reveal Script -->
<script src="assets/js/scrollReveal.js"></script>
<!--  Scroll Scripts -->
<script src="assets/js/jquery.easing.min.js"></script>
<!--  Custom Scripts -->
<script src="assets/js/custom.js"></script>
</body>
</html>


