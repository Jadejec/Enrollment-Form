<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


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


    
</body>
</html>