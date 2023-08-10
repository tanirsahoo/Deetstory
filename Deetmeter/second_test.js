function clickfunc(checkbox) {
    var checkboxes3 = document.getElementsByName('Fat_test')
    checkboxes3.forEach((item) => {
        if (item !== checkbox) item.checked = false
    });
    checkboxes3.required = true;
}


let first_var = document.getElementById('Fat_test_1') ;
let second_var = document.getElementById('Fat_test_2') ;

first_var.addEventListener("click" , () =>{
    let initial = document.getElementById('second_test_input_field_category_id') ;
    initial.innerHTML = `<p class="second_test_input_field_category_para">Select the category:</p>
    <select name="category_type" id="category_type_id" class="category_type_class">
        <option value="PH">PH</option>
        <option value="Urea">Urea</option>
        <option value="Uric Acid">Uric Acid</option>
    </select>` ;
}) ;
second_var.addEventListener("click" , () =>{
    let initial2 = document.getElementById('second_test_input_field_category_id') ;
    initial2.innerHTML = `<p class="second_test_input_field_category_para">Select the categpry:</p>
    <select name="category_type" id="category_type_id" class="category_type_class">
        <option value="Fat">Fat</option>
        <option value="Protein">Protein</option>
    </select>` ;
}) ;