<?php

session_start() ;

include "dbconnect.php" ;


if(isset($_POST['submit1'])){
    $username = mysqli_real_escape_string($conn , $_POST['username']) ;
    $emailid = mysqli_real_escape_string($conn , $_POST['user_email']) ;
    $age = mysqli_real_escape_string($conn , $_POST['age_meter']) ;
    $gender = mysqli_real_escape_string($conn , $_POST['field_check']) ;
    $test_type = mysqli_real_escape_string($conn , $_POST['test_type']) ;
    setcookie("username" , $username , time() + (86400 * 2) , "/") ;

    $sql = "INSERT INTO `general_info` (`Sl.No`, `Username`, `Email-id`, `Age`, `Gender`, `Test_type`, `Timestamp`) VALUES (NULL, '$username', '$emailid', '$age', '$gender', '$test_type', current_timestamp());" ;
    $result = mysqli_query($conn , $sql) ;
    if($result && $test_type == "Urine & Stool test"){
        header ("location:second_test.php") ;
    }
    else if($result && $test_type == "Blood Test"){
        header ("location:first_test.php") ;
    }
    else{
        alert("There is some probelm with Deetmeter.Please try again after some time.") ;
        header ("location: deetmeter_landing_page.php") ;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "design_and_css_link.php" ; ?>
    <title>Deetmeter | Check all the health factors</title>
</head>

<body>

    <section class="heading_deetmeter_class" id="heading_id_deetmeter">
        <div class="heading_deetmeter_class_division">
            Welcome to Deetmeter
        </div>
    </section>
    <section class="deetmeter_first_section" id="deetmeter_first_sec_id">
        <div class="deetmeter_first_section_inside_1">
            Compare your health report with that of a normal person.
        </div>
    </section>

    <section class="deetmeter_form_section" id="deetstory_form_id_1">
        <form action="deetmeter_landing_page.php" method="post" class="deetmeter_form_section_main_form">
            <section class="deetmeter_form_section_main_form_input_section">
                <p class="deetmeter_form_section_main_form_input_section_inside_1">Username:</p>
                <input type="text" name="username" id="username_1" class="username_field_1" placeholder="Subham Pandey"
                    required><br>
                <p class="deetmeter_form_section_main_form_input_section_inside_2">Email-ID:</p>
                <input type="email" name="user_email" id="user_email_id" class="user_email_class_1"
                    placeholder="example@xyz.com" required><br>
                <p class="deetmeter_form_section_main_form_input_section_inside_3">Age:</p>
                <input type="number" name="age_meter" id="age_meter_id" class="age_meter_class" min=1 max=150
                    maxlength=3><br>
                <p class="deetmeter_form_section_main_form_input_section_inside_4">Gender Classification:</p>
                <div class="deetmeter_form_section_main_form_input_section_inside_4_gender_field">
                    <label>
                        <input type="checkbox" name="field_check" id="male_field_check_id_1"
                            class="male_field_check_class" onclick="onlyOne(this)" checked value="Male">
                        Male
                    </label>
                    <label>
                        <input type="checkbox" name="field_check" id="female_field_check_id_1"
                            class="female_field_check_class" onclick="onlyOne(this)" value="Female">
                        Female
                    </label>
                    <label>
                        <input type="checkbox" name="field_check" id="infant_field_check_id_1"
                            class="infant_field_check_class" onclick="onlyOne(this)" value="Infant">
                        Infant
                    </label>
                </div>
                <p class="deetmeter_test_name_class" id="deetmeter_test_name_id">Type of test:</p>
                <div class="deetmeter_test_name_Fields" id="deetmeter_test_name_fields_id">
                    <label>
                        <input type="checkbox" name="test_type" id="test_type_1_id" class="test_type_1_class"
                            onclick="thisfield(this)" checked value="Blood Test">
                        Blood Test
                    </label>
                    <label>
                        <input type="checkbox" name="test_type" id="test_type_2_id" class="test_type_2_class"
                            onclick="thisfield(this)" value="Urine & Stool test">
                        Urine & Stool test
                    </label>
                </div>
                <button type="submit1" class="form_section_button" id="form_section_id_1" name="submit1">Submit</button>
            </section>
        </form>
    </section>

    <nav class="navigation_bar_deetstory" id="deetstory_nav_bar">
        <div class="navigation_bar_deetstory_inside_1">
            <a href="cookies_destry.php" class="navigation_bar_deetstory_inside_2">BACK TO HOME</a>
        </div>
    </nav>

    <script>
    function onlyOne(checkbox) {
        var checkboxes = document.getElementsByName('field_check')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        });
        checkboxes.required = true ;
    }

    function thisfield(checkbox) {
        var checkboxes2 = document.getElementsByName('test_type')
        checkboxes2.forEach((item) => {
            if (item !== checkbox) item.checked = false
        });
        checkboxes2.required = true ;
    }
    </script>
</body>

</html>