<?php
session_start() ;
include "dbconnect.php" ;
if(isset($_POST['submit3'])){
    if(isset($_COOKIE)){
        $category = $_COOKIE['category'] ;
        if($category){
            setcookie("Cat_status" , "active" , time() + (86400 * 2) , "/") ;
        }
        else
            header ("location:second_test.php") ;
    }
    else{
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
    <section class="third_test_section" id="third_test_section_id">
        <form class="third_test_container" action="first_third_test.php" method="post">
            <div class="third_test_container_inside_1">
                <p class="third_test_container_inside_1_para">Enter your report data:</p>
                <input type="number" name="final_data" id="final_data" class="third_test_final_data"
                    id="final_data_third_test" step=".01"><br>
            </div>
            <button type="submit3" class="form_section_button" id="form_section_id_1" name="submit3">Submit</button>
            <div class="third_test_section_inside_2" id="third_test_section_inside_2_id">
                <!-- <hr class="third_test_section_inside_2_horizontal_rule">
                <p class="third_test_section_inside_2_para_1">Your input data: 52 gm/day</p>
                <p class="third_test_section_inside_2_para_2">Normal data: 100 gm/day</p>
                <p class="third_test_section_inside_2_para_2">Status : <span class="third_test_status_color1"
                        id="third_test_status_color_id">Normal</span></p> -->
            </div>
        </form>
    </section>

    <nav class="navigation_bar_deetstory" id="deetstory_nav_bar">
        <div class="navigation_bar_deetstory_inside_1">
            <a href="cookies_destry.php" class="navigation_bar_deetstory_inside_2">BACK TO HOME</a>
        </div>
    </nav>


    <?php
if(isset($_COOKIE['Cat_status'])){
    // echo "Cookie is set" ;
    $Cat_status = $_COOKIE['Cat_status'] ;
    if($Cat_status == "active"){
        
        $sql = "SELECT * FROM `test_info` WHERE Name_of_Test = '$category'" ;
        $result = mysqli_query($conn , $sql) ;
        $res = mysqli_fetch_assoc($result) ;
        $final_data = mysqli_real_escape_string($conn , $_POST['final_data']) ;
        $lower_data = $res['Normal_value_Lower_Range'] ;
        $upper_data = $res['Normal_value_Upper_Range'] ;
        // echo gettype($lower_data) ;
        // echo gettype($upper_data) ;
        // echo gettype($final_data) ;
        // $final_data = floatval($final_data) ;
        // $upper_data = floatval($upper_data) ;
        // $lower_data = floatval($lower_data) ;
        // echo gettype($lower_data) ;
        // echo gettype($upper_data) ;
        // echo gettype($final_data) ;
        // echo $upper_data ;
        // echo $lower_data ;
        // echo $final_data ;
        $unit = $res['Unit'] ;
        if($final_data >= $lower_data && $final_data <= $upper_data){
            if($lower_data == $upper_data){
                // echo "Section 1" ;
                echo '<script>
                    let inser_result = document.getElementById("third_test_section_inside_2_id");
                    inser_result.innerHTML =
                        `<hr class="third_test_section_inside_2_horizontal_rule">
                <p class="third_test_section_inside_2_para_1">Your input data: '.$final_data.' '.$unit.'</p>
                <p class="third_test_section_inside_2_para_2">Normal data: '.$upper_data.' '.$unit.'</p>
                <p class="third_test_section_inside_2_para_2">Status : <span class="third_test_status_color1" id="third_test_status_color_id">Normal</span></p>`;
                    </script>' ;
            }
            else{
                // echo "Section 2" ;
                echo '<script>
                    let inser_result = document.getElementById("third_test_section_inside_2_id");
                    inser_result.innerHTML =
                        `<hr class="third_test_section_inside_2_horizontal_rule">
                <p class="third_test_section_inside_2_para_1">Your input data: '.$final_data.' '.$unit.'</p>
                <p class="third_test_section_inside_2_para_2">Normal data: '.$lower_data.' '.$unit.' - '.$upper_data.' '.$unit.'</p>
                <p class="third_test_section_inside_2_para_2">Status : <span class="third_test_status_color1" id="third_test_status_color_id">Normal</span></p>`;
                    </script>' ;
            }
        }
        else{
            if($upper_data == $lower_data){
                // echo "Section 3" ;
            echo '<script>
            let inser_result = document.getElementById("third_test_section_inside_2_id");
            inser_result.innerHTML =
                `<hr class="third_test_section_inside_2_horizontal_rule">
        <p class="third_test_section_inside_2_para_1">Your input data: '.$final_data.' '.$unit.'</p>
        <p class="third_test_section_inside_2_para_2">Normal data: '.$lower_data.' '.$unit.'</p>
        <p class="third_test_section_inside_2_para_2">Status : <span class="third_test_status_color2" id="third_test_status_color_id">Abnormal</span></p>`;
            </script>' ;
            }
            else{
                // echo "Section 4" ;
                echo '<script>
            let inser_result = document.getElementById("third_test_section_inside_2_id");
            inser_result.innerHTML =
                `<hr class="third_test_section_inside_2_horizontal_rule">
        <p class="third_test_section_inside_2_para_1">Your input data: '.$final_data.' '.$unit.'</p>
        <p class="third_test_section_inside_2_para_2">Normal data: '.$lower_data.' '.$unit.' - '.$upper_data.' '.$unit.'</p>
        <p class="third_test_section_inside_2_para_2">Status : <span class="third_test_status_color2" id="third_test_status_color_id">Abnormal</span></p>`;
            </script>' ;
            }
        }
    }
}


?>
</body>

</html>