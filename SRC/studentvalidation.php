<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <script type="text/javascript" src="assets/js/html2canvas.js"></script>
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- FLEXSLIDER CSS -->
    <link href="assets/css/flexslider.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>

</head>
<body  style="margin-bottom: 50px;">
<br>
<style>
    table {
        margin-top: 20px;
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 1000px;
    }

    td, th {
        border: 2px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    #colorrow {
        background-color: #dddddd;
    }

    tr:nth-child(odd) {
        background-color: #ffffff;
    }
</style>
<div id="TT" style="background-color: #FFFFFF">
            <?php
            if (isset($_POST['select_semester'])) 
            {
				$semid = $_POST['select_semester'];
				if($semid == 'All'){
					//$q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                //"SELECT distinct belongs_to_year FROM semesters ");        
	        $count = 0;
            //while($row = mysqli_fetch_assoc($q)) {  
              //$y = $row["belong_to_year"];
		      $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
               "Select *,max(section) as rowspanvalue from course group by cid order by length(cid) asc,yearof"); 
			   echo "<form><div align=\"center\"><table id=\"display_subjects\" align=\"center\">";
			   echo "<b>Semester ".$semid." Master Timetable</b>";
			   echo "<tr><th>S.no</th><th width=\"80px\">Course code</th><th width=\"160px\">Course Title</th><th width=\"20px\">L P U</th><th width=\"40px\">Section</th><th width=\"100px\">Faculty Name</th><th width=\"20px\">Days</th><th width=\"20px\">Hour</th><th width=\"40px\">Room No</th><th width=\"20px\">Common Hour</th></tr>";                	 
             $sno=1;
			 while($row =mysqli_fetch_assoc($qq)) {   			 
             echo "<tr><td rowspan=\"".$row["rowspanvalue"]."\" width=\"40px\" >".$sno."</td><td rowspan=\"".$row["rowspanvalue"]."\" width=\"100px\" >".$row["cid"]."</td><td rowspan=\"".$row["rowspanvalue"]."\" width=\"280px\">".$row["c_name"]."</td><td rowspan=\"".$row["rowspanvalue"]."\" width=\"80px\">".$row["L"]." ".$row["P"]." ".$row["U"]."</td>";
             $sno = $sno + 1;
			 $cid= $row['cid'];
			 $fid=$row['fid'];
            $fn = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
               "SELECT f.F_name,ct.*,c.section FROM course c,faculty f,course_details ct where f.fid=c.fid and c.cid=ct.cid and c.section=ct.section and c.cid = '$cid' GROUP by c.section");
			while ($row = mysqli_fetch_assoc($fn)) {
				$count = $count +1;
				if($count % 2 != 0)
				{
					$rowcolor = "colorrow";
				}
				else
				{
					$rowcolor = "colorrow1";
				}
               echo "<td id=\"".$rowcolor."\" width=\"40px\">".$row["section"]."</td><td id=\"".$rowcolor."\" width=\"200px\">".$row["F_name"]."</td><td id=\"".$rowcolor."\" width=\"80px\">".$row["c_days"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["c_hours"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["roomno"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["c_commonhour"]."</td></tr>";
			//} 			 
		    }
	    }   
            echo "</table>
            </div></form>";
				}
				else{
            $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                "SELECT * FROM semesters where semid = '$semid' ");        
	        $count = 0;
            while($row = mysqli_fetch_assoc($q)) {  
              $y = $row["belong_to_year"];
		      $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
               "Select *,max(section) as rowspanvalue from course where yearof = '$y' group by cid order by length(cid) asc"); 
			   echo "<form><div align=\"center\"><table id=\"display_subjects\" align=\"center\">";
			   echo "<b>Semester ".$semid." Master Timetable</b>";
			   echo "<tr><th>S.no</th><th width=\"80px\">Course code</th><th width=\"160px\">Course Title</th><th width=\"20px\">L P U</th><th width=\"40px\">Section</th><th width=\"100px\">Faculty Name</th><th width=\"20px\">Days</th><th width=\"20px\">Hour</th><th width=\"40px\">Room No</th><th width=\"20px\">Common Hour</th></tr>";                	 
             $sno=1;
			 while($row =mysqli_fetch_assoc($qq)) {   			 
             echo "<tr><td rowspan=\"".$row["rowspanvalue"]."\" width=\"40px\" >".$sno."</td><td rowspan=\"".$row["rowspanvalue"]."\" width=\"100px\" >".$row["cid"]."</td><td rowspan=\"".$row["rowspanvalue"]."\" width=\"280px\">".$row["c_name"]."</td><td rowspan=\"".$row["rowspanvalue"]."\" width=\"80px\">".$row["L"]." ".$row["P"]." ".$row["U"]."</td>";
			//echo "<tr><td>".$row["cid"]."</td><td>".$row["c_name"]."</td><td>".$row["L"]." ".$row["P"]." ".$row["U"]."</td>";
             $sno = $sno + 1;
			 $cid= $row['cid'];
			 $fid=$row['fid'];
            $fn = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
               "SELECT f.F_name,ct.*,c.section FROM course c,faculty f,course_details ct where f.fid=c.fid and c.cid=ct.cid and c.section=ct.section and c.cid = '$cid' GROUP by c.section");
				//"SELECT f.F_name,ct.*,c.section FROM course c,faculty f,course_timings ct where f.fid='$fid' and c.cid='$cid' and c.cid=ct.cid");
			while ($row = mysqli_fetch_assoc($fn)) {
				$count = $count +1;
				if($count % 2 != 0)
				{
					$rowcolor = "colorrow";
				}
				else
				{
					$rowcolor = "colorrow1";
				}
               echo "<td id=\"".$rowcolor."\" width=\"40px\">".$row["section"]."</td><td id=\"".$rowcolor."\" width=\"200px\">".$row["F_name"]."</td><td id=\"".$rowcolor."\" width=\"80px\">".$row["c_days"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["c_hours"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["roomno"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["c_commonhour"]."</td></tr>";
			} 			 
		    }
	    }   
            echo "</table>
            </div></form>";
        }
        echo "<div align=\"center\">
              <form action=\"./pdf.php\" method=\"POST\">
              <input type=\"hidden\" id=\"timetableAsPdf\" name=\"timetableAsPdf\">
              <button  class=\"btn btn-info btn-lg\" type=\"submit\" style=\"margin-top: 15px; margin-bottom:50px;\" width=\"180px\">Save as Pdf</button>
              </form> 
              <script>document.getElementById(\"timetableAsPdf\").value = document.getElementById(\"display_subjects\").outerHTML</script>
              </div>";    	
    }
      ?>			
</div>
</body>
</html>