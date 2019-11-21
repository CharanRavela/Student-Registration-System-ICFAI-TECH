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
<script>

</script>


<style>
        table {
            margin-top: 20px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width : 60%;
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
if(isset($_POST['submit1'])){
    $c = 0;
    $str="Sorry! seats are filled for this subjects\\n";
    $cid = array();
    $sec = array();
    $strength = array();
    $selected_subjects = $_POST['select_subjects'];
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
        echo "<b><h2>Selected Subjects</h2></b>";
        $count = 0;
        echo "<form action=\"registrationDone.php\" method=\"post\"><table name=\"Selected_subjects\"><tr><th>Course code</th><th>Course Title</th><th>Section</th><th>Faculty Name</th></tr>";
        for($i=0 ; $i<count($selected_subjects) ; $i++)
         {   
             //$cid[$i] = substr($selected_subjects[$i],0,strlen($selected_subjects[$i])-1);
             //$sec[$i] = substr($selected_subjects[$i],strlen($selected_subjects[$i])-1);
             $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT c.cid,c.section,c.c_name,f.F_name FROM course_details cd,course c,faculty f where c.cid = '$cid[$i]' and c.section = '$sec[$i]' and c.cid=cd.cid and c.fid=f.fid group by c.section");
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
                echo "<input type=\"hidden\" name=\"finally[]\" value=\"".$row['cid'],$row['section']."\"><tr id=\"".$rowcolor."\"  ><td>".$row['cid']."</td><td>".$row['c_name']."</td><td>".$row['section']."</td><td>".$row['F_name']."</td></tr>";
            }
        }
       echo "</table><button type=\"submit\" name=\"submit2\" id=\"submit2\" value=\"finallydone\" class=\"btn btn-success btn-lg\" style=\"margin-top:20px\">Confirm Registration</button></form>";
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
