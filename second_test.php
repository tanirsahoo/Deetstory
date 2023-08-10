<?php

session_start() ;

include "dbconnect.php" ;

if(isset($_POST['submit2'])){
    $test_type = mysqli_real_escape_string($conn , $_POST['Fat_test']) ;
    $category = mysqli_real_escape_string($conn , $_POST['category_type']) ;
    if($test_type != NULL && $category != NULL){
        setcookie("category" , $category , time() + (86400 * 2) , "/") ;
        header("location:third_test.php") ;
    }
    else
        header("location:second_test.php") ; 
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

    <section class="second_test_container" id="second_test_cont_id">
        <form action="second_test.php" method="post" class="second_test_inside_1">
            <div class="second_test_inside_2">
                <p class="second_test_paragraph_1">Please select the test you want to check:</p>
                <div class="second_test_input_field_type">
                    <label>
                        <input type="checkbox" name="Fat_test" id="Fat_test_1" class="fat_test_field_1"
                            value="Urine Test" checked onclick="clickfunc(this)">
                        Urine Test
                    </label>
                    <label>
                        <input type="checkbox" name="Fat_test" id="Fat_test_2" class="fat_test_field_2"
                            value="Stool Test" onclick="clickfunc(this)">
                        Stool Test
                    </label>
                </div>
                <div class="second_test_input_field_category" id="second_test_input_field_category_id">
                    <p class="second_test_input_field_category_para">Select the category:</p>
                    <select name="category_type" id="category_type_id" class="category_type_class">
                        <option value="PH">PH</option>
                        <option value="Urea">Urea</option>
                        <option value="Uric Acid">Uric Acid</option>
                    </select>
                </div>
                <button type="submit2" class="form_section_button" id="form_section_id_1" name="submit2">Submit</button>
            </div>
        </form>
    </section>

    <nav class="navigation_bar_deetstory" id="deetstory_nav_bar">
        <div class="navigation_bar_deetstory_inside_1">
            <a href="cookies_destry.php" class="navigation_bar_deetstory_inside_2">BACK TO HOME</a>
        </div>
    </nav>
</body>
<script src="second_test.js"></script>

</html>