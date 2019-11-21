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
    <title>TimeTable Management System</title>
	<link href="assets/img/icfai.jfif" rel= "icon"/>
	<!--<script type="text/javascript" src="assets/js/jspdf.plugin.autotable.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.28/jspdf.plugin.autotable.js"></script>
    <script type="text/javascript" src="assets/js/html2canvas.js"></script>-->
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
                <li><a href="#">Hello <?php echo $_SESSION['loggedin_name']; ?></a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>
<br>



<form name="view_faculty_timetable" action="facultypage.php" method="post" onsubmit="validation();">
    <div style="margin-top: 100px" align="center">
        <select name="select_semester" class="list-group-item" style="width:180px" onchange="validation()">
            <option selected disabled>Select semester</option>
			<option value="All">Get all semesters</option>
            <?php
			if(date("Y")%2 === 0){
			   if(date("m")>= "01" && date("m")< "08"){
                $s="Select * from semesters where semid in(1,3,5,7)";			   
			   }
			   else{
				   $s="Select * from semesters where semid not in(1,3,5,7)";
			   }
			}
			else
			{
				if(date("m")>="01" && date("m")<"08"){
                $s="Select * from semesters where semid in(2,4,6,8)";			   
			   }
			   else{
				   $s="Select * from semesters where semid not in(2,4,6,8)";
			   }
			}
			
            $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),$s);
            while ($row = mysqli_fetch_assoc($q)) {
                echo " \"<option value=\"{$row['semid']}\">{$row['semid']}</option>\"";
            }
            ?>
        </select>
		<button type="submit" name="submit" id="GetSubjects"  value = "grant" style="margin-top: 10px" class="btn btn-success btn-lg">Get Subjects</button>
    </div>
  
</form>

<div>
    <br>
    <style>
        table {
            margin-top: 20px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 1250px;
        }

        td, th {
            border: 2px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
    
<script type="text/javascript">

function validation()
{
if(document.view_faculty_timetable.select_semester.selectedIndex == 0)
{ alert("Please select semester");
document.view_faculty_timetable.select_semester.focus();
return false;
}else{
return true;
}
}

/*	
function gendf() 
{debugger;
    /*var doc = new jsPDF();
	doc.addHTML(document.getElementById('timetable'), function () {
    doc.save('<?php
            // if (isset($_POST["select_semester"])) {
            //     echo "ttms semester " . $_POST["select_semester"];
            //     } else if (isset($_POST["select_teacher"])) {
            //     echo "ttms " . $_POST["select_teacher"];
            //     } else if (isset($_SESSION["loggedin_id"])) {
            //     echo "ttms " . $_SESSION["loggedin_id"];
            //     }
            //     ?>' + '.pdf');
            alert("Downloaded!");

        });
		var doc = new jsPDF('p', 'pt');
   /* var specialElementHandlers = {
        '#timetable': function (element, renderer) {
            return true;
        }
    };

    $('#saveaspdf').click(function () {
        doc.fromHTML($('#timetable').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('timetable.pdf');
    });
	doc.autoTable({html: '#timetable'});
    doc.save('tabletable.pdf');

    }*/

function displayTimetable(){
	
	var flag = 1,l;
	var length = document.getElementById("display_subjects").rows.length;
	
	if( length == 1 && flag){
	alert("There are no subjects of you for this semester");
	flag=0;
	}
	
	if(flag){
		for(l = 1 ; l <length ;l++){
		var cid = document.getElementById("display_subjects").rows[l].cells[1];
	    var section = document.getElementById("display_subjects").rows[l].cells[3];
		var days = document.getElementById("display_subjects").rows[l].cells[4];
		var hours = document.getElementById("display_subjects").rows[l].cells[5];
		var roomno = document.getElementById("display_subjects").rows[l].cells[6];
		
		if(days.textContent != "NA"){
		arr = days.textContent.toString().split(" ");
		for(var h=0;h<arr.length;h++)
		{
			arr[h] = arr[h]+hours.textContent;
			document.getElementById(arr[h]).innerHTML = cid.textContent + "<br>" + section.textContent + " " + roomno.textContent;
		}
	    }
		}		
	}
}	
</script>
<?php
     if(isset($_POST['submit']) == "grant"){
    if (isset($_POST['select_semester'])) {
		$semid = $_POST['select_semester'];
		if($semid == 'All'){
			$fid = $_SESSION['loggedin_id'];
		      $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
               "select c.cid,c.c_name,c.section,cd.c_days,cd.c_hours,cd.roomno,cd.c_commonhour from course as c,course_details as cd where c.fid ='$fid' and c.cid = cd.cid and c.section = cd.section"); 
			   echo "<form id=\"subject_selection\" method=\"post\"><div align=\"center\"><table id=\"display_subjects\" align=\"center\" ><tr><th>S.no</th><th>Course code</th><th>Course Title</th><th>Section</th><th>Days</th><th>Hour</th><th>Room No</th><th>Common Hour</th></tr>";                	 
             $sno=1;			  
			 while($row =mysqli_fetch_assoc($qq)) {   			 
             echo "<tr><td>".$sno."</td><td>".$row["cid"]."</td><td>".$row["c_name"]."</td><td>".$row["section"]."</td><td>".$row["c_days"]."</td><td>".$row["c_hours"]."</td><td>".$row["roomno"]."</td><td>".$row["c_commonhour"]."</td></tr>";
             $sno = $sno + 1;			 
		 }
	     include("timetable.php");
		 echo "<script type=\"text/javascript\">displayTimetable();</script>";  	
		 echo "</table></div></form>";			
		}
		else{
    	$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                "SELECT * FROM semesters where semid = '$semid' ");        
        while($row = mysqli_fetch_assoc($q)) {  
              $y = $row["belong_to_year"];
			  $fid = $_SESSION['loggedin_id'];
		      $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
               "select c.cid,c.c_name,c.section,cd.c_days,cd.c_hours,cd.roomno,cd.c_commonhour from course as c,course_details as cd where c.fid ='$fid' and c.cid = cd.cid and c.section = cd.section and c.yearof='$y' "); 
			   echo "<form name=\"subject_selection\" method=\"post\"><div align=\"center\"><table id=\"display_subjects\" align=\"center\"><tr><th>S.no</th><th>Course code</th><th>Course Title</th><th>Section</th><th>Days</th><th>Hour</th><th>Room No</th><th>Common Hour</th></tr>";                	 
             $sno=1;			  
			 while($row =mysqli_fetch_assoc($qq)) {   			 
             echo "<tr><td>".$sno."</td><td>".$row["cid"]."</td><td>".$row["c_name"]."</td><td>".$row["section"]."</td><td>".$row["c_days"]."</td><td>".$row["c_hours"]."</td><td>".$row["roomno"]."</td><td>".$row["c_commonhour"]."</td></tr>";
        	$sno = $sno +1;		 
		    }
        }
		include("timetable.php");
		echo "<script type=\"text/javascript\">displayTimetable();</script>";
		echo "</table></form></div>";
        }
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
<!--<button type=\"submit\" id=\"saveaspdf\"  >SAVE AS PDF</button></form></div></form>";-->
<!--HOME SECTION END-->

<!--<div id="footer">
    <!--  &copy 2014 yourdomain.com | All Rights Reserved |  <a href="http://binarytheme.com" style="color: #fff" target="_blank">Design by : binarytheme.com</a>
-->
<!-- FOOTER SECTION END-->

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
