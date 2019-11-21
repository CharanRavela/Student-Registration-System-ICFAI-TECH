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
                <li><a href="#">Hello <?php echo $_SESSION['loggedin_name']; ?></a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
</div>

<form action="studentpagetest.php" method="post" onsubmit=" return validation()">
    <div align="center" style="margin-top: 100px">
       <select name="select_semester" class="list-group-item" required>
             <!--<option selected disabled>Select Semester</option>-->
			 <option value=""> Select Semester </option> 
			<?php
            $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                "SELECT * FROM semesters ");
            while ($row = mysqli_fetch_assoc($q)) {
                echo " \"<option value=\"{$row['semid']}\">{$row['semid']}</option>\"";
            }
            ?>
        </select>
		
        <button type="submit" name="submit"  value="grant" id="viewsemester" style="margin-top: 15px" class="btn btn-success btn-lg">Proceed</button>
    </div>
</form>

<form   method="post"><script LANGUAGE="JavaScript">
function validation()
{
if(document.subject_selection.select_semester.selectedIndex==0)
{ alert("Please select semester");
document.subject_selection.select_semester.focus();
return false;
}
return true;
}

function checkboxvalidation(){
checkboxes = document.getElementsByTagName("input"); 
var i,j=0;
for ( i = 0; i < checkboxes.length; i++) {
    var checkbox = checkboxes[i];
    checkbox.onclick = function() {
		
		var courseId,section;
		var count = $('input[name="select_subjects[]"]:checked').length;
		var checkedvalue = $('input[name="select_subjects[]"]:checked').value;
        var currentRow = this.parentNode.parentNode;
		var requiredRowindex=currentRow.rowIndex;
		var subject=document.forms[2];
		if(currentRow.cells.length <12){
			while((document.getElementById("display_subjects").rows[requiredRowindex].cells.length)!= 12)
			{
				requiredRowindex = requiredRowindex -1;
			}
			courseId = document.getElementById("display_subjects").rows[requiredRowindex].cells[1];
			section =currentRow.getElementsByTagName("td")[0];
			days = currentRow.getElementsByTagName("td")[2];
			hours = currentRow.getElementsByTagName("td")[3];
			commonhour = currentRow.getElementsByTagName("td")[5];
			seats = currentRow.getElementsByTagName("td")[6];
			
		}
		else
		{
			courseId = document.getElementById("display_subjects").rows[requiredRowindex].cells[1];
	 	    section = currentRow.getElementsByTagName("td")[4];
			days = currentRow.getElementsByTagName("td")[6];
			hours = currentRow.getElementsByTagName("td")[7];
			commonhour = currentRow.getElementsByTagName("td")[9];
			seats = currentRow.getElementsByTagName("td")[10];
		}
		
		//validation for seats availability		
		if(seats.textContent == 0)
		{
			alert("Seats are full. You cannot select " + courseId.textContent + " of section: " + section.textContent);
			subject[currentRow.rowIndex-1].checked=false;
			
		}else if ( count >6) {
			subject[count-1].checked=false;
         alert("you can select only 6 subjects for this semester" + subject[count-1].value);
			}
		else if(1){
		
         for(i=0;i<subject.length;i++)
		  {
	       if(subject[i].checked == true && i!= (currentRow.rowIndex-1)){
		   if(courseId.textContent == subject[i].value){
			subject[currentRow.rowIndex-1].checked=false;
			alert("You can't select different sections of same subject " + subject[currentRow.rowIndex-1].value + currentRow.rowIndex);
		 }}
		 }
		}
			var checkedRowsindex= [];
		for(i=0;i<subject.length;i++)
			{
				if(subject[i].checked == true)
				{
					checkedRowsindex[j]=i;	
					j++;
				}
		    }			
		
		for(i=0;i<count;i++){
			j=checkedRowsindex[i]+1;
		/*if((document.getElementById("display_subjects").rows[j].cells.length) <12){
			section1 = document.getElementById("display_subjects").rows[j].cells[0];
			days1 = document.getElementById("display_subjects").rows[j].cells[2];
			hours1 = document.getElementById("display_subjects").rows[j].cells[3];
			commonhour1 = document.getElementById("display_subjects").rows[j].cells[5];
			
		}
		else
		{
	 	    section1 = document.getElementById("display_subjects").rows[j].cells[4];
			days1 = document.getElementById("display_subjects").rows[j].cells[6];
			hours1 = document.getElementById("display_subjects").rows[j].cells[7];
			commonhour1 = document.getElementById("display_subjects").rows[j].cells[9];
		}
		alert("SECTION: " + section1.textContent + " days:" + days1.textContent + " hours: " + hours1.textContent + " commonhour: " + commonhour1.textContent);
		*/
		}
       if(count >1) 
		{
			alert(count);
			var sdays,s1days,cdays,c1days,chour,c1hour;
			for(i =0 ; i<checkedRowsindex.length ;i++){
			alert(checkedRowsindex[i]);
			j= checkedRowsindex[i]+1;
			
			//alert("Checked: " + checkedRowsindex[i] + " "+ j + i+ " " + (document.getElementById("display_subjects").rows[j].cells.length));
		if( currentRow.rowIndex != j){
        alert( " " + j);			
		if((document.getElementById("display_subjects").rows[j].cells.length) <12){
			section1 = document.getElementById("display_subjects").rows[j].cells[0];
			days1 = document.getElementById("display_subjects").rows[j].cells[2];
			hours1 = document.getElementById("display_subjects").rows[j].cells[3];
			commonhour1 = document.getElementById("display_subjects").rows[j].cells[5];
			
		}
		else
		{
	 	    section1 = document.getElementById("display_subjects").rows[j].cells[4];
			days1 = document.getElementById("display_subjects").rows[j].cells[6];
			hours1 = document.getElementById("display_subjects").rows[j].cells[7];
			commonhour1 = document.getElementById("display_subjects").rows[j].cells[9];
		}
		//alert("hours: " +hours.textContent + " hours1: " + hours1.textContent);
		
		//alert(commonhour.textContent.toString() + " " + commonhour.textContent.toString().length);
		
		if(commonhour.textContent.toString().length == 2){
			cdays = commonhour.textContent.substring(0,1);
			chour = commonhour.textContent.substring(1,2);
		}
		if(commonhour.textContent.toString().length == 3){
		    cdays = commonhour.textContent.substring(0,2);
			chour = commonhour.textContent.substring(2,3);
		}
		 
		if(commonhour1.textContent.toString().length == 2){
			c1days = commonhour1.textContent.substring(0,1);
			c1hour = commonhour1.textContent.substring(1,2);
		}
		if(commonhour1.textContent.toString().length == 3){
		    c1days = commonhour1.textContent.substring(0,2);
			c1hour = commonhour1.textContent.substring(2,3);
		} 
		 
		//alert(commonhour.textContent + " " + cdays + " " + chour );
		//alert(commonhour1.textContent + " " + commonhour.textContent ); 
		if((commonhour.textContent == commonhour1.textContent)){
			alert("You cannot select " + courseId.textContent +" because commonhour of " + subject[j-1].value + " and " + courseId.textContent + " are same.");
			subject[currentRow.rowIndex-1].checked=false;
		}
	   
	   if( (hours.textContent == hours1.textContent) )
		{
			var valid = 0;
            arr = days.textContent.toString().split(" ");
		    arr2 = days1.textContent.toString().split(" ");
			for(i=0;i<arr.length;i++)
			{
				for(var k=0;k<arr2.length;k++){
				if(arr[i] == arr2[k]){
   				valid = 1;
				break;
				}else{ valid =0;}
			}
			}
			if(valid){
			   alert("You cannot select " + courseId.textContent + " section : "+ section.textContent +" because " + courseId.textContent + " section: " + section.textContent +" and " + subject[j-1].value + " Section: " + section1.textContent + " have same days and hours");
				subject[currentRow.rowIndex-1].checked=false;
			}
		}
		if( (chour == hours1.textContent) ){
			var valid = 0;
			arr2 = days1.textContent.toString().split(" ");
			for(i=0 ; i< arr2.length ; i++){
				if( cdays == arr2[i] ){
				  valid = 1;
				}else{ valid = 0;}
			 if(valid){
			      alert("You cannot select " + courseId.textContent + " because commonhour of " + courseId.textContent + " has same days and hour as " + subject[j-1].value + " normal days and hours");
				  subject[currentRow.rowIndex-1].checked=false;
			    }  
			}
		}
		}
		}
		}
    };
}
//document.getElementById("S1").innerHTML = "saka<br>08";
 $(".studenttimetable #tr2 #td2").remove();
document.getElementById("M1").innerHTML = "FBT<br>102";
document.getElementById("W1").innerHTML = "FBT<br>102";
document.getElementById("F1").innerHTML = "FBT<br>102";

document.getElementById("M2").innerHTML = "BDS<br>102";
document.getElementById("W2").innerHTML = "BDS<br>102";
document.getElementById("F2").innerHTML = "BDS<br>102";

document.getElementById("M3").innerHTML = "IP<br>102";
document.getElementById("W3").innerHTML = "IP<br>102";
document.getElementById("F3").innerHTML = "IP<br>102";

document.getElementById("M5").innerHTML = "ACA<br>102";
document.getElementById("W5").innerHTML = "ACA<br>102";
document.getElementById("F5").innerHTML = "ACA<br>102";

document.getElementById("M6").innerHTML = "SE<br>102";
document.getElementById("W6").innerHTML = "SE<br>102";
document.getElementById("F6").innerHTML = "SE<br>102";
} 
</script></form>

<style>
       .display_subjects,table {
            margin-top: 20px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }

        .display_subjects, th,td{
            border: 2px solid #dddddd ;
            text-align: center ;
            padding: 8px ;
        }
		
		#colorrow {
            background-color: #dddddd;
        }
		

    </style>
<!--NAVBAR SECTION END-->
<br>
<!--Algorithm Implementation-->


 <?php
     if(isset($_POST['submit']) == "grant"){
    if (isset($_POST['select_semester'])) {
		$semid = $_POST['select_semester'];
          $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                "SELECT * FROM semesters where semid = '$semid' ");         
	}
	$count = 0;
        while($row = mysqli_fetch_assoc($q)) {  
              $y = $row["belong_to_year"];
		      $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
               "Select *,max(section) as rowspanvalue from course where yearof = '$y' group by cid order by length(cid) asc"); 
			   echo "<form action=\"subjectsvalidator.php\" name=\"subject_selection\" action=\"timetable\" method=\"post\"><div align=\"center\" ><table class=\"display_subjects\" align=\"center\"><tr><th>S.no</th><th width=\"80px\">Course code</th><th width=\"160px\">Course Title</th><th width=\"20px\">L P U</th><th width=\"40px\">Section</th><th width=\"100px\">Faculty Name</th><th width=\"20px\">Days</th><th width=\"20px\">Hour</th><th width=\"40px\">Room No</th><th width=\"20px\">Common Hour</th><th>Seats Remaining</th><th>Action</th></tr>";                	 
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
               echo "<td id=\"".$rowcolor."\" width=\"40px\">".$row["section"]."</td><td id=\"".$rowcolor."\" width=\"200px\">".$row["F_name"]."</td><td id=\"".$rowcolor."\" width=\"80px\">".$row["c_days"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["c_hours"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["roomno"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["c_commonhour"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["strength"]."</td><td id=\"".$rowcolor."\" width=\"40px\"><input type=\"checkbox\" name=\"select_subjects[]\" id=\"select_subjects[]\" value=\"".$row['cid']."\" data-valuetwo=\"".$row["F_name"]."\" onclick=\"checkboxvalidation();\"></td></tr>";
			} 			 
		}
		echo "</table>";
		 echo "<table border=\"2\" align=\"center\" class=\"studenttimetable\">
		    <tr><td style=\"text-align:center\"><b>Days\Hour</b></td>
		        <td style=\"text-align:center\"><b>1<br>9:00-10:20</b></td>
                <td style=\"text-align:center\"><b>2<br>10:30-11:20</b></td>
                <td style=\"text-align:center\"><b>3<br>11:30-12:20</b></td>
                <td style=\"text-align:center\"><b>4<br>12:30-1:20</b></td>
                <td style=\"text-align:center\"><b>5<br>1:30-2:20</b></td>
                <td style=\"text-align:center\"><b>6<br>2:30-3:20</b></td>
                <td style=\"text-align:center\"><b>7<br>3:30-4:20</b></td>
				<td style=\"text-align:center\"><b>8<br>4:30-5:20</b></td>
            </tr>
			<tr id=\"tr2\"><td style=\"text-align:center\"><b>Monday</b></td>
		        <td style=\"text-align:center\"><p id=\"M1\"></p></td>
                <td style=\"text-align:center\"><p id=\"M2\"></p></td>
				<td style=\"text-align:center\" colspan=\"2\"><p id=\"M3\"></p></td>
				// <td style=\"text-align:center\" id=\"td2\"><p id=\"M4\"></p></td>
				<td style=\"text-align:center\"><p id=\"M5\"></p></td>
				<td style=\"text-align:center\"><p id=\"M6\"></p></td>
				<td style=\"text-align:center\"><p id=\"M7\"></p></td>
				<td style=\"text-align:center\"><p id=\"M8\"></p></td>
            </tr>
			<tr><td style=\"text-align:center\"><b>Tuesday</b></td>
		        <td style=\"text-align:center\"><p id=\"T1\"></p></td>
                <td style=\"text-align:center\"><p id=\"T2\"></p></td>
				<td style=\"text-align:center\"><p id=\"T3\"></p></td>
				<td style=\"text-align:center\"><p id=\"T4\"></p></td>
				<td style=\"text-align:center\"><p id=\"T5\"></p></td>
				<td style=\"text-align:center\"><p id=\"T6\"></p></td>
				<td style=\"text-align:center\"><p id=\"T7\"></p></td>
				<td style=\"text-align:center\"><p id=\"T8\"></p></td>
            </tr>
			<tr><td style=\"text-align:center\"><b>Wednesday</b></td>
		        <td style=\"text-align:center\"><p id=\"W1\"></p></td>
                <td style=\"text-align:center\"><p id=\"W2\"></p></td>
				<td style=\"text-align:center\"><p id=\"W3\"></p></td>
				<td style=\"text-align:center\"><p id=\"W4\"></p></td>
				<td style=\"text-align:center\"><p id=\"W5\"></p></td>
				<td style=\"text-align:center\"><p id=\"W6\"></p></td>
				<td style=\"text-align:center\"colspan=\"2\"><p id=\"W7\"></p></td>
            </tr>
			<tr><td style=\"text-align:center\"><b>Thursday</b></td>
		        <td style=\"text-align:center\"><p id=\"TH1\"></p></td>
                <td style=\"text-align:center\"><p id=\"TH2\"></p></td>
				<td style=\"text-align:center\"><p id=\"TH3\"></p></td>
				<td style=\"text-align:center\"><p id=\"TH4\"></p></td>
				<td style=\"text-align:center\"><p id=\"TH5\"></p></td>
				<td style=\"text-align:center\"><p id=\"TH6\"></p></td>
				<td style=\"text-align:center\"><p id=\"TH7\"></p></td>
				<td style=\"text-align:center\"><p id=\"TH8\"></p></td>
            </tr>
			<tr><td style=\"text-align:center\"><b>Friday</b></td>
		        <td style=\"text-align:center\"><p id=\"F1\"></p></td>
                <td style=\"text-align:center\"><p id=\"F2\"></p></td>
				<td style=\"text-align:center\"><p id=\"F3\"></p></td>
				<td style=\"text-align:center\"><p id=\"F4\"></p></td>
				<td style=\"text-align:center\"><p id=\"F5\"></p></td>
				<td style=\"text-align:center\"><p id=\"F6\"></p></td>
				<td style=\"text-align:center\"><p id=\"F7\"></p></td>
				<td style=\"text-align:center\"><p id=\"F8\"></p></td>
            </tr>
			<tr><td style=\"text-align:center\"><b>Saturday</b></td>
		        <td style=\"text-align:center\"><p id=\"S1\"></p></td>
                <td style=\"text-align:center\"><p id=\"S2\"></p></td>
				<td style=\"text-align:center\"><p id=\"S3\"></p></td>
				<td style=\"text-align:center\"><p id=\"S4\"></p></td>
				<td style=\"text-align:center\"><p id=\"S5\"></p></td>
				<td style=\"text-align:center\"><p id=\"S6\"></p></td>
				<td style=\"text-align:center\"><p id=\"S7\"></p></td>
				<td style=\"text-align:center\"><p id=\"S8\"></p></td>
            </tr></table>";
		
		echo "<button type=\"submit\" align=\"center\" name=\"submith\" id=\"viewsemester\" style=\"margin-top: 15px\" class=\"btn btn-success btn-lg\">Next</button> </form></div>";
        }
	 }
	        
?>  
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




<?php /*while($row = mysqli_fetch_assoc($q)) {
       	 
		    
		     
			// echo "<form action= \"studentpage.php\" method=\"post\"><select name=\"select_section\" class=\"list-group-item\"><option value=\"1\" selected>1</option>";
             //$s = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
              //  "SELECT distinct section FROM course where section not in (1)");
            //while ($row = mysqli_fetch_assoc($s)) {
              //  echo " \"<option value=\"{$row['section']}\">{$row['section']}</option>\"";
            
			 //echo "</select></form></td><td>";
			 //echo "<form method=\"post\"><select name=\"faculty_name\" class=\"list-group-item\">"
			 //$cid= $row['cid'];
			//   echo " \"<option align=\"center\" value=\"{$row['F_name']}\">{$row['F_name']}</option>\"";
			//echo $row['F_name'];
			// echo "</select></form></td><td>";
			 
			}
		    			
         // echo "</table></div>  <a href=\"studentpage.php\" align=\"center\" ><h3>Get timetable for selected subjects </h3></a></form> ";			
		  
        
		}*/
		?>