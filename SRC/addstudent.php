<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>TimeTable Management System</title>
	<link href="assets/img/icfai.jfif" rel= "icon"/>
    <!-- BOOTSTRAP CORE STYLE CSS -->
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
                <li><a href="addteachers.php">ADD TEACHERS</a></li>
                <li><a href="addsubjects.php">ADD SUBJECTS</a></li>
                <li><a href="addclassrooms.php">ADD CLASSROOMS</a></li>
				<li><a href="addstudent.php">ADD STUDENT</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">ALLOTMENT
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href=allotsubjects.php>THEORY COURSES</a>
                        </li>
                        <li>
                            <a href=allotpracticals.php>PRACTICAL COURSES</a>
                        </li>
                        <li>
                            <a href=allotclasses.php>CLASSROOMS</a>
                        </li>
                    </ul>
                </li>
               <!-- <li><a href="generatetimetable.php">GENERATE TIMETABLE</a></li>-->

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">LOGOUT</a></li>
            </ul>

        </div>
    </div>
</div>
<!--NAVBAR SECTION END-->
<br>

<div align="center" style="margin-top:80px">
    <form name="import" method="post" enctype="multipart/form-data">
        <input type="file" name="file"/>
        <input type="submit" name="studentexcel" id="studentexcel" class="btn btn-info btn-lg" value="IMPORT EXCEL"/>
    </form>
    <?php
    if (isset($_POST['studentexcel'])) {
        if (empty($_FILES['file']['tmp_name'])) {
            echo '<script>alert("Select a file first! ");</script>';
        } else {
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, 'r');
            $headings = true;
            while (!feof($handle)) {
                $filesop = fgetcsv($handle, 1000);

                $sid = $filesop[0];
                $sname = $filesop[1];
                $year = $filesop[2];
                $semester = $filesop[3];
                $branch = $filesop[4];
                $password = $filesop[5];
				$phno = $filesop[6];
				$email = $filesop[7];
				$N = "N";
				$R = "N";
                if ($sid == "" || $sid == "Enrollment no.") {
                    continue;
                }
                $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
                    "INSERT INTO student VALUES ('$sid','$sname','$year','$semester','$branch','$password', '$phno','$email','$R','$N')");
            }
        }
    }
    ?>
</div>
<div align="center" style="margin-top:20px">
    <button id="studentmanual" class="btn btn-success btn-lg">ADD STUDENT</button>
</div>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content" style="margin-top: -60px">
        <div class="modal-header">
            <span class="close">&times</span>
            <h2 id="popupHead">Add STUDENT</h2>
        </div>
        <div class="modal-body" id="EnterStudent">
            <!--Admin Login Form-->
            <div style="display:none" id="addStudentForm">
                <form action="addstudentFormValidation.php" method="POST">
                    <div class="form-group">
                        <label for="studentname">Student's Name</label>
                        <input type="text" class="form-control" id="studentname" name="SN"
                               placeholder="Student's Name ...">
                    </div>
                    <div class="form-group">
                        <label for="enrollmentno">Enrollment No</label>
                        <input type="number" class="form-control" id="enrollmentno" name="EN" placeholder="Enrollment No ...">
                    </div>
                    <div class="form-group">
                        <label for="Branch">Branch</label>

                        <select class="form-control" id="branch" name="SB">
                            <option selected disabled>Select</option>
                            <option value="C.S.E">Computer Science</option>
                            <option value="E.C.E">Electrical</option>
                            <option value="CIVIL">CIVIL</option>
                            <option value="M.E">Mechanical</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phonenumber">Mobile no..</label>
                        <input type="text" class="form-control" id="phonenumber" name="SP"
                               placeholder="+91 ...">
                    </div>

                    <div class="form-group">
                        <label for="studentemailid">Email-ID</label>
                        <input type="text" class="form-control" id="studentemailid" name="SE"
                               placeholder="stu@dent.com ...">
                    </div>
                    <div align="right">
                        <input type="submit" class="btn btn-default" name="ADD" value="ADD">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var addstudentBtn = document.getElementById("studentmanual");
    var heading = document.getElementById("popupHead");
    var studentForm = document.getElementById("addStudentForm");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal

    addstudentBtn.onclick = function () {
        modal.style.display = "block";
        //heading.innerHTML = "Student Login";
        studentForm.style.display = "block";
        //adminForm.style.display = "none";


    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        //adminForm.style.display = "none";
        studentForm.style.display = "none";

    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


<div>
    <br>
    <style>
        table {
            margin-top: 10px;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-left: 30px;
            width: 90%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <script>
        function deleteHandlers() {
            var table = document.getElementById("studentstable");
            var rows = table.getElementsByTagName("tr");
            for (i = 0; i < rows.length; i++) {
                var currentRow = table.rows[i];
                //var b = currentRow.getElementsByTagName("td")[0];
                var createDeleteHandler =
                    function (row) {
                        return function () {
                            var cell = row.getElementsByTagName("td")[0];
                            var id = cell.innerHTML;
                            var x;
                            if (confirm("Are You Sure?") == true) {
                                window.location.href = "deletestudent.php?name=" + id;
                            }

                        };
                    };
                currentRow.cells[5].onclick = createDeleteHandler(currentRow);
            }
        }
    </script>

    <table id=studentstable style="margin-left: 80px">
        <caption><strong>Student's Information </strong></caption>
        <tr>
            <th width="130">Enrollment No</th>
            <th width="290">Name</th>
            <th width="190">Branch</th>
            <th width="190">Contact No.</th>
            <th width="290">Email ID</th>
            <th width="40">Action</th>
        </tr>
        <tbody>
        <?php
        include 'connection.php';
        $q = mysqli_query(mysqli_connect("localhost", "root", "", "ttms"),
            "SELECT * FROM student where DELETED = \"N\" ORDER BY sid ASC");

        while ($row = mysqli_fetch_assoc($q)) {
            echo "<tr><td>{$row['sid']}</td>
                    <td>{$row['S_name']}</td>
                    <td>{$row['branch']}</td>
                    <td>{$row['phno']}</td>
                    <td>{$row['email']}</td>
                   <td>
                    <button>Delete</button></td>
                    </tr>\n";
        }
        echo "<script>deleteHandlers();</script>";
        ?>
        </tbody>
    </table>

</div>
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
