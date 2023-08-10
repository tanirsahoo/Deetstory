function clickfunc(checkbox) {
    var checkboxes3 = document.getElementsByName('Fat_test')
    checkboxes3.forEach((item) => {
        if (item !== checkbox) item.checked = false
    });
    checkboxes3.required = true;
}


let first_var = document.getElementById('Fat_test_1') ;
let second_var = document.getElementById('Fat_test_2') ;
let third_var = document.getElementById('Fat_test_3') ;

first_var.addEventListener("click" , () =>{
    let initial = document.getElementById('second_test_input_field_category_id') ;
    initial.innerHTML = `<p class="second_test_input_field_category_para">Select the category:</p>
    <select name="category_type" id="category_type_id" class="category_type_class">
        <option value="Haemoglobin">Haemoglobin</option>
        <option value="TC(RBC)">TC(RBC)</option>
        <option value="TC(WBC)">TC(WBC)</option>
        <option value="ESR">ESR</option>
    </select>` ;
}) ;
second_var.addEventListener("click" , () =>{
    let initial2 = document.getElementById('second_test_input_field_category_id') ;
    initial2.innerHTML = `<p class="second_test_input_field_category_para">Select the categpry:</p>
    <select name="category_type" id="category_type_id" class="category_type_class">
        <option value="Blood Creatinine">Blood Creatinine</option>
        <option value="Blood sugar fosting">Blood sugar fosting</option>
        <option value="Serum Cholesterol">Serum Cholesterol</option>
        <option value="Serum Triglyceride">Serum Triglyceride</option>
        <option value="Blood Sodium">Serum Sodium</option>
    </select>` ;
}) ;
third_var.addEventListener("click" , () =>{
    let initial3 = document.getElementById('second_test_input_field_category_id') ;
    initial3.innerHTML = `<p class="second_test_input_field_category_para">Select the categpry:</p>
    <select name="category_type" id="category_type_id" class="category_type_class">
        <option value="Vitamin A">Vitamin A</option>
        <option value="Vitamin B1">Vitamin B1</option>
        <option value="Vitamin C">Vitamin C</option>
        <option value="Vitamin D">Vitamin D</option>
    </select>` ;
}) ;