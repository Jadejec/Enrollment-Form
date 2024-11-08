<?php
session_start(); 

$showEnrollmentForm = true; 
$showGradeSection = false;
$showStudentInfo = false; 


if (isset($_POST['btnSend'])) {
    $showEnrollmentForm = false; 
    $showGradeSection = true; 
    $_SESSION['firstName'] = $_POST['txtFirstname'];
    $_SESSION['lastName'] = $_POST['txtLastname'];
    $_SESSION['age'] = $_POST['txtNumber'];
    $_SESSION['gender'] = isset($_POST['radSex']) ? $_POST['radSex'] : '';
    $_SESSION['course'] = $_POST['dlstCourse'];
    $_SESSION['email'] = $_POST['txtEmail'];
}


if (isset($_POST['btnSubmit'])) {
    $prelim = $_POST['txtprelim'];
    $midterm = $_POST['txtmidterm'];
    $final = $_POST['txtFinal'];

    $average = ($prelim + $midterm + $final) / 3;

   
    $_SESSION['prelim'] = $prelim;
    $_SESSION['midterm'] = $midterm;
    $_SESSION['final'] = $final;
    $_SESSION['average'] = $average;

   
    if ($average >= 74.5) {
        $_SESSION['status'] = '-  Passed';
        $_SESSION['statusColor'] = 'green'; 
    } else {
        $_SESSION['status'] = '-  Failed';
        $_SESSION['statusColor'] = 'red'; 
    }

    $showStudentInfo = true; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if ($showEnrollmentForm) { ?>
<form method="post" class="form-group">
    <label for="txtFirstname">First Name</label>
    <input type="text" class="form-control" name="txtFirstname" id="txtFirstname" autofocus required>

    <label for="txtLastname">Last Name</label>
    <input type="text" class="form-control" name="txtLastname" id="txtLastname" required>

    <label for="txtNumber">Age</label>
    <input type="number" class="form-control" name="txtNumber" id="txtNumber" required min="0" max="100">

    <label>Gender</label><br>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="radSex" id="radMale" value="Male" checked required>
    <label class="form-check-label" for="radMale">Male</label>
    </div>
    <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="radSex" id="radFemale" value="Female" required>
    <label class="form-check-label" for="radFemale">Female</label>
    </div><br>

    <label for="dlstCourse">Course</label>
    <input type="text" class="form-control" name="dlstCourse" id="dlstCourse" list="Course" required>
    <datalist id="Course">
        <option value="BSIT">
        <option value="BSHM">
        <option value="BSBA">
    </datalist>

    <label for="txtEmail">Email</label>
    <input type="email" class="form-control" name="txtEmail" id="txtEmail" required><br>

    <button type="submit" class="btn btn-primary" name="btnSend">Submit Student Information</button><br><br>
</form>
<?php } ?>

<?php if ($showGradeSection) { ?>
<h2 style="text-align: center;">Enter Grades</h2>
            <form method="post" class="form-group">
                <label for="txtPrelim">Prelim:</label>
                <input type="number" class="form-control" name="txtprelim" id="txtprelim" min="0" max="99" required>

                <label for="txtMidterm">Midterm:</label>
                <input type="number" class="form-control" name="txtmidterm" id="txtmidterm" required min="0" max="99">

                <label for="txtFinal">Final:</label>
                <input type="number" class="form-control" name="txtFinal" id="txtFinal" min="0" max="99" required><br>

                <button type="submit" class="btn btn-success" name="btnSubmit">Submit Grades</button>
            </form>
            <?php } ?>

<?php if ($showStudentInfo) { ?>
            <div class="student-info">
                <h2>Student Details</h2>
                <p><strong>First Name:</strong> <?php echo $_SESSION['firstName']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $_SESSION['lastName']; ?></p>
                <p><strong>Age:</strong> <?php echo $_SESSION['age']; ?></p>
                <p><strong>Gender:</strong> <?php echo $_SESSION['gender']; ?></p>
                <p><strong>Course:</strong> <?php echo $_SESSION['course']; ?></p>
                <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            </div>

            <div class="grades">
                <h2>Grades</h2>
                <p><strong>Prelim :</strong> <?php echo $_SESSION['prelim']; ?></p>
                <p><strong>Midterm :</strong> <?php echo $_SESSION['midterm']; ?></p>
                <p><strong>Final :</strong> <?php echo $_SESSION['final']; ?></p>

                <h3>Average Grade</h3>
                <div style="display: inline-block; margin-right: 10px;">
                <?php echo isset($_SESSION['average']) ? number_format($_SESSION['average'], 2) : ' '; ?>
                </div>
                <div style="display: inline-block; color: <?php echo isset($_SESSION['statusColor']) ? $_SESSION['statusColor'] : 'black'; ?>;">
                <?php echo isset($_SESSION['status']) ? $_SESSION['status'] : ''; ?>
                </div>  
                </p>
            </div>
            <?php } ?>
    
</body>
</html>