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
			   <li><a href="#">Hello <?php echo $_SESSION['loggedin_name']; ?></a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="div" align="center"> <b></b> </div>
<!--NAVBAR SECTION END-->
<br>
<form name="subject_selection" method="post" action="studentPage.php" onSubmit="return validation();">
<div style="margin-top: 100px" align="center">
        <select name="select_semester" class="list-group-item" style="width:180px" required>
            <option selected disabled>Select semester</option>
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
        <button type="submit" name="submit"  value="grant" id="viewsemestersubjects" style="margin-top: 15px" class="btn btn-success btn-lg" >Get Subjects
        </button>
    </div>

</form>

<form   method="post"><script LANGUAGE="JavaScript">

function validation()
{
if(document.subject_selection.select_semester.selectedIndex == 0)
{ alert("Please select semester");
document.subject_selection.select_semester.focus();
return false;
}
return true;
}

function finalvalidation()
{
    if ($('input[name="select_subjects[]"]:checked').length <6) {
        alert("you have to select 6 subjects"); 
        return false;				
	}
	else{
     	return true;
	}
}

function checkboxvalidation(){
checkboxes = document.getElementsByTagName("input"); 
        var i,j=0,flag =1;
        for (var tt = 0; tt < checkboxes.length; tt++) {
             var checkbox = checkboxes[tt];
             checkbox.onclick = function() {
		
		var courseId,section;
		var count = $('input[name="select_subjects[]"]:checked').length;
		//var checkedvalue = $('input[name="select_subjects[]"]:checked').value;
        var currentRow = this.parentNode.parentNode;
		var requiredRowindex=currentRow.rowIndex;
		var subject=document.forms[2];
		var x = document.getElementById("div");
		
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
		if( seats.textContent == 0  && flag )
		{
			alert("Seats are full. You cannot select " + courseId.textContent + " of section: " + section.textContent);
			subject[currentRow.rowIndex-1].checked=false;
			flag = 0;
		}
		
		//validation for more than 6 subjects
				if ( count >6 && flag )
				{
					alert("you can select only 6 subjects for this semester");
			        subject[currentRow.rowIndex-1].checked=false;
					flag = 0;
			    }	
		
        //validation for different section selection of same subject
		if(flag){
		for(var ii=0;ii<subject.length;ii++)
		{
	     if(subject[ii].checked == true && ii!= (currentRow.rowIndex-1)){
		 if(courseId.textContent == subject[ii].value.substring(0, (subject[ii].value.length-1))){
			subject[currentRow.rowIndex-1].checked=false;
			alert("You cannot select different sections of same courseId: " + courseId.textContent);
			flag = 0;
		 }}
		}}	
			
		var checkedRowsindex= [];
        for(iii=0;iii<subject.length;iii++)
			{
				if(subject[iii].checked == true)
				{
					checkedRowsindex[j]=iii;	
					j++;
				}
		    }			
			
		//validation for subjects clash	
		if(count >1 && flag) 
		{
			var sdays,s1days,cdays,c1days,chour,c1hour;
			for(i =0 ; i<checkedRowsindex.length ;i++)
			{
			    j= checkedRowsindex[i]+1;
				if( currentRow.rowIndex != j)
			    {	
		           if((document.getElementById("display_subjects").rows[j].cells.length) <12)
				   {
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
				   
				   if(commonhour.textContent.toString().length == 2)
				   {
					   cdays = commonhour.textContent.substring(0,1);
			           chour = commonhour.textContent.substring(1,2);
		           }
		           if(commonhour.textContent.toString().length == 3)
				   {
					   cdays = commonhour.textContent.substring(0,2);
			           chour = commonhour.textContent.substring(2,3);
		           }
		 
		           if(commonhour1.textContent.toString().length == 2)
				   {
					   c1days = commonhour1.textContent.substring(0,1);
			           c1hour = commonhour1.textContent.substring(1,2);
		           }
		           if(commonhour1.textContent.toString().length == 3)
				   {
					   c1days = commonhour1.textContent.substring(0,2);
	                   c1hour = commonhour1.textContent.substring(2,3);
		           } 
		        
				//validation for commonhours
		        if((commonhour.textContent == commonhour1.textContent) && flag )
				{
					alert("You cannot select " + courseId.textContent +" because commonhour of " + courseId.textContent + " and " + subject[j-1].value.substring(0, (subject[j-1].value.length-1)) + " are same.");
			        subject[currentRow.rowIndex-1].checked=false;
					flag = 0;
		        }
				//validation for same day and hour subjects	         
			    if( (hours.textContent == hours1.textContent) && flag )
				{
					var valid = 1;
                    arr = days.textContent.toString().split(" ");
		            arr2 = days1.textContent.toString().split(" ");
					
					for(var kk=0;kk<arr.length;kk++)
					{
						for(var k=0;k<arr2.length;k++)
						{ 
							if(arr[kk] == arr2[k])
							{
								valid = 0;
								break;
							}
			            }
			        }
					if(!valid)
					{
						alert("You cannot select " + courseId.textContent + " section :"+ section.textContent +" because " + courseId.textContent + " section: " + section.textContent +" and " + subject[j-1].value.substring(0, (subject[j-1].value.length-1)) + " Section: " + section1.textContent + " has same timings.");
				        subject[currentRow.rowIndex-1].checked=false;
						flag = 0;
			        }
		        }
				
				//validation for commonhour with subject days
				if( (chour == hours1.textContent) && flag )
				{
					var valid = 1;
			        arr2 = days1.textContent.toString().split(" ");
					for(var uu=0 ; uu< arr2.length ; uu++)
					{ 
						if( cdays == arr2[uu] )
						{
							valid = 0;
							break;
				        }
					}
					if(!valid)
					{
						alert("You cannot select " + courseId.textContent + " because commonhour of " + courseId.textContent + " has same timings with " + subject[j-1].value.substring(0, (subject[j-1].value.length-1)) + " normal timings.");
				        subject[currentRow.rowIndex-1].checked=false;
					    flag = 0;
			        }  
		        }
				
				//validation for previously selected subject's commonhour with subject days
				if( (c1hour == hours.textContent) && flag )
				{
					var valid = 1;
			        arr = days.textContent.toString().split(" ");
					for(var r=0 ; r< arr.length ; r++)
					{ 
						if( c1days == arr[r] )
						{
							valid = 0;
							break;
				        }
					}
					if(!valid)
					{
						alert("You cannot select " + courseId.textContent + " because commonhour of " + subject[j-1].value.substring(0, (subject[j-1].value.length-1)) + " has same timings with " + courseId.textContent + " normal timings.");
				        subject[currentRow.rowIndex-1].checked=false;
						flag = 0;
			        } 
		        }
		    }
	    }
	}
			   
	//Student timetable display checked subjects
	for(var pp=0;pp<checkedRowsindex.length;pp++)
	{
		t = checkedRowsindex[pp]+1;
		if(subject[t-1].checked == true){
		if((document.getElementById("display_subjects").rows[t].cells.length) <12)
				   {
			           dayst = document.getElementById("display_subjects").rows[t].cells[2];
			           hourst = document.getElementById("display_subjects").rows[t].cells[3];
					   roomnot = document.getElementById("display_subjects").rows[t].cells[4]
			           commonhourt = document.getElementById("display_subjects").rows[t].cells[5];
		           }
		           else
		           {
			           dayst = document.getElementById("display_subjects").rows[t].cells[6];
			           hourst = document.getElementById("display_subjects").rows[t].cells[7];
					   roomnot = document.getElementById("display_subjects").rows[t].cells[8]
					   commonhourt = document.getElementById("display_subjects").rows[t].cells[9];
		           }
				   
		if(dayst.textContent != "NA"){
		arr = dayst.textContent.toString().split(" ");
		for(var h=0;h<arr.length;h++)
		{
			arr[h] = arr[h]+hourst.textContent;
			document.getElementById(arr[h]).innerHTML = subject[t-1].value.substr(0,(subject[t-1].value.length-1)) + "<br>" + roomnot.textContent;
		}
	    }
		}
	}
    //student timetable	remove checked uncheck subjects 
	if(subject[currentRow.rowIndex-1].checked == false && flag){
		var f=currentRow.rowIndex;
			if((document.getElementById("display_subjects").rows[f].cells.length) <12)
				   {
			           daysd = document.getElementById("display_subjects").rows[f].cells[2];
			           hoursd = document.getElementById("display_subjects").rows[f].cells[3];
					   //roomnot = document.getElementById("display_subjects").rows[t].cells[4]
			           //commonhourt = document.getElementById("display_subjects").rows[t].cells[5];
		           }
		           else
		           {
			           daysd = document.getElementById("display_subjects").rows[f].cells[6];
			           hoursd = document.getElementById("display_subjects").rows[f].cells[7];
					   //roomnot = document.getElementById("display_subjects").rows[t].cells[8]
					   //commonhourt = document.getElementById("display_subjects").rows[t].cells[9];
		    
           		   }
			if(daysd.textContent != "NA"){
		    arr = daysd.textContent.toString().split(" ");
			for(var h=0;h<arr.length;h++)
			{
			  arr[h] = arr[h]+hoursd.textContent;
			  document.getElementById(arr[h]).innerHTML = " ";
		    }
			flag=0;
			}
		}
		//Total subjects selected div
		Tolsubs = $('input[name="select_subjects[]"]:checked').length;
		if(Tolsubs == 0)
		{
			x.style.display = "none";
		}
	    else if(Tolsubs <= 6)
		{
			x.style.display = "block";
			x.innerHTML = "No of subjects selected: " + Tolsubs;
		}
    };

}
} 
</script></form>

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
		
		#colorrow {
            background-color: #dddddd;
        }
		#div{
            margin-top : 75px;
            width :200px;
            background-color: rgba(28, 43, 75, 1);
            border-radius: 25px;
			margin-right: 135px;
			color: white;
			position : fixed;
			right :0;
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
	$count = 0;
        while($row = mysqli_fetch_assoc($q)) {  
              $y = $row["belong_to_year"];
		      $qq = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                "Select *,max(section) as rowspanvalue from course where yearof = '$y' group by cid order by length(cid) asc"); 
			   echo "<form id=\"subject_selection\"  action=\"subjectsConformation.php\" method=\"post\" onSubmit=\"return finalvalidation();\"><div align=\"center\"><table name=\"display_subjects\" id=\"display_subjects\" align=\"center\"><tr><th>S.no</th><th width=\"80px\">Course code</th><th width=\"160px\">Course Title</th><th width=\"20px\">L P U</th><th width=\"40px\">Section</th><th width=\"100px\">Faculty Name</th><th width=\"20px\">Days</th><th width=\"20px\">Hour</th><th width=\"40px\">Room No</th><th width=\"20px\">Common Hour</th><th>Seats Remaining</th><th>Action</th></tr>";                	 
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
               echo "<td id=\"".$rowcolor."\" width=\"40px\">".$row["section"]."</td><td id=\"".$rowcolor."\" width=\"200px\">".$row["F_name"]."</td><td id=\"".$rowcolor."\" width=\"80px\">".$row["c_days"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["c_hours"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["roomno"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["c_commonhour"]."</td><td id=\"".$rowcolor."\" width=\"40px\">".$row["strength"]."</td><td id=\"".$rowcolor."\" width=\"40px\"><input type=\"checkbox\" name=\"select_subjects[]\" id=\"select_subjects[]\" value=\"".$row['cid'],$row['section']."\" data-valuetwo=\"".$row["F_name"]."\" onMouseDown=\"checkboxvalidation();\"></td></tr>";
			} 			 
		    }
			include("timetable.php");
			echo "</table> <button type=\"submit\" class=\"btn btn-success btn-lg\" name=\"submit1\" id=\"submit1\" value=\"subjectsconformation\" style=\"margin-top: 25px; margin-bottom:50px;\" width=\"180px\">Next</button> </div></form>";    
	    } 
	}
}
?>  

         
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
