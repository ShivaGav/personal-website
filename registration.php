<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="//cdn.tutorialjinni.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.tutorialjinni.com/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="path/to/bootstrap-select.min.js"></script>
    <script src="path/to/countrypicker.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

</body>
<body>
    <style>
        body{ 
        background-color: #5A6168; 
        }
    </style>
    
<section class="vh-100 gradient-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
    <div class="card bg-dark text-white" style="border-radius: 1rem;">
    <div class="card-body p-5 text-center">
    <div class="mb-md-5 mt-md-4 pb-5">

        <?php

        if(isset($_POST["submit"])){
            $LastName = $_POST["LastName"];
            $FirstName = $_POST["FirstName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $RepeatPassword = $_POST["repeat_password"];

            $passwordHash=password_hash($password, PASSWORD_DEFAULT);
            $errors = array();

            //validate if all fields are empty
            if (empty($LastName) OR empty($FirstName) OR empty($email) OR empty($password) OR empty($RepeatPassword)) {
                array_push($errors, "All fields are required");
            }
            //validate if the email is not validated
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            //password should not be less than 8
            if (strlen($password)<8) {
                array_push ($errors, "Password must be at least 8 characters long");
            }
            // check if password is the same
            if($password!= $RepeatPassword) {
                array_push($errors, "Password does not match");
            }
            require_once "database.php";
            $sql="SELECT * FROM user WHERE email='$email'";
            $result=mysqli_query($conn, $sql);
            $rowCount=mysqli_num_rows($result);
            if ($rowCount>0) {
                array_push($errors, "Email Already Exist");
            }
            
            if (count($errors)>0){
                foreach ($errors as $error) {
                    echo"<div class='alert alert-danger'>$error</div>";
                    }
                } else {
                    require_once "database.php";
                    $sql="INSERT INTO user(Last_Name, First_Name, email, password) values(?, ?, ?, ?)";
                    $stmt=mysqli_stmt_init($conn); //initializes a statement and returns an object suitable for mysqli_stmt_prepare()
                    $preparestmt=mysqli_stmt_prepare($stmt, $sql);
                    if ($preparestmt) {
                        mysqli_stmt_bind_param($stmt, "ssss", $LastName, $FirstName, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'> You are Registered Successfully! </div>";
                    } else {
                        die("Something went wrong");
                    }
                }
            }
            
        ?>  
        <form action="registration.php" method="post">
        <h3>Personal Information</h3>
            <div class="form-group">
                <input type="text" class="form-control" name="LastName" placeholder="Last Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="FirstName" placeholder="First Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Input Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
           <h3>Address</h3>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country" required>
                                <option selected>Choose...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="state">State/Province</label>
                            <select class="form-control" id="state" name="state" required>
                                <option selected>Choose...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City/Municipality</label>
                            <select class="form-control" id="city" name="city" required>
                                <option selected>Choose...</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lotBlk">Lot/Block</label>
                            <input type="text" class="form-control" id="lotBlk" name="lotBlk" placeholder="Enter Lot/Block" required>
                        </div>
                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street" required>
                        </div>
                        <div class="form-group">
                            <label for="phaseSubdivision">Phase/Subdivision</label>
                            <input type="text" class="form-control" id="phaseSubdivision" name="phaseSubdivision" placeholder="Enter Phase/Subdivision" required>
                        </div>
                        <div class="form-group">
                            <label for="barangay">Barangay</label>
                            <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" required>
                        </div>
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="phoneCode" readonly>
                                <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter Contact Number">
                            </div>
                        </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Register" placeholder="submit">
            </div>
            
        </form>
        <div><p>Already registered? <a href="login.php">Login Here</a></div>
    </div>
    <script src="//cdn.tutorialjinni.com/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.tutorialjinni.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.tutorialjinni.com/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="//g.tutorialjinni.com/mojoaxel/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>
    <script>

let data = [];

document.addEventListener('DOMContentLoaded', function() {
    fetch('https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries%2Bstates%2Bcities.json')
        .then(response => response.json())
        .then(jsonData => {
            data = jsonData;
            const countries = data.map(country => country.name);
            populateDropdown('country', countries);
        })
        .catch(error => console.error('Error fetching countries:', error));
});

function populateDropdown(dropdownId, data) {
    const dropdown = document.getElementById(dropdownId);
    dropdown.innerHTML = '';
    data.forEach(item => {
        const option = document.createElement('option');
        option.value = item;
        option.text = item;
        dropdown.add(option);
    });
}

document.getElementById('country').addEventListener('change', function() {
    const selectedCountry = this.value;
    const countryData = data.find(country => country.name === selectedCountry);
    if (countryData && countryData.states) {
        const states = countryData.states.map(state => state.name);
        populateDropdown('state', states);
    }
    const phoneCode = countryData ? countryData.phone_code : '';
    document.getElementById('phoneCode').value = phoneCode;
});

document.getElementById('state').addEventListener('change', function() {
    const selectedState = this.value;
    const countryData = data.find(country => country.name === document.getElementById('country').value);
    if (countryData) {
        const stateData = countryData.states.find(state => state.name === selectedState);
        if (stateData && stateData.cities) {
            const cities = stateData.cities.map(city => city.name);
            populateDropdown('city', cities);
        } else {
            console.log('No cities found for state:', selectedState);
        }
    } else {
        console.log('Country data not found for state:', selectedState);
    }
});

</script>
</body>
</html>