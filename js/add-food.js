$(document).ready(function () {
    $("#dropdown-category").change(function(){
        var category = $("#dropdown-category").val();
        if(category == 'Food'){
            $('#dropdown-type').prop('disabled', false);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
            $('#dropdown-type').append(`<option value="Water">ទឹក  </option>`); 
            $('#dropdown-type').append(`<option value="NoWater"> គោក </option>`); 
        }
        else if(category == 'Sweet'){
            $('#dropdown-type').prop('disabled', false);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
            $('#dropdown-type').append(`<option value="Sweet"> បង្អែម  </option>`); 
            $('#dropdown-type').append(`<option value="Cake"> នំ </option>`); 
        }
        else if(category == 'Drink'){
            $('#dropdown-type').prop('disabled', false);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
            $('#dropdown-type').append(`<option value="Hot"> ក្ដៅ  </option>`); 
            $('#dropdown-type').append(`<option value="Ice"> ទឹកកក </option>`); 
            $('#dropdown-type').append(`<option value="Shake"> ក្រឡុក  </option>`); 
            $('#dropdown-type').append(`<option value="Juice"> ច្របាច់ </option>`); 
            $('#dropdown-type').append(`<option value="Simple"> ធម្មតា  </option>`); 
        }
        else{            
            $('#dropdown-type').prop('disabled', true);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
        }
    });

    $("#dropdown-country").change(function(){
        var country = $("#dropdown-country").val();
        if(country == 'Khmer'){
            $('#dropdown-province').prop('disabled', false);
        }
        else if(country == 'Foreign' || country == ''){
            $('#dropdown-province option[value=""]').prop('selected',true);
            $('#dropdown-province').prop('disabled', true);
        }
    });
});

function addNewIngredient(){
    var table = document.getElementById("ingredient-table");
    var rows = table.tBodies[0].rows.length;
    rows ++;
    var row = table.insertRow(rows);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '<td>'+
                        '<input type="number" class="form-control" value="'+rows+'" name="num'+rows+'"/>'+
                      '</td>';
    cell2.innerHTML = '<td>'+
                        '<input type="text" class="form-control" id="ingredient" name="ingredient'+rows+'"/>'+
                    '</td>';
    cell3.innerHTML = '<td>'+
                        '<input type="text" class="form-control" name="qty'+rows+'"/>'+
                    '</td>';
    cell4.innerHTML = '<td style="text-align: center;">'+
                        '<button type="button" class="btn btn-danger form-control" value="Delete" onClick="deleteIngredient(this)"><i class="fa fa-minus-circle"></i></button>'+
                    '</td>';
    cell5.innerHTML = '<td style="text-align: center;">'+
                        '<button type="button" class="btn btn-success form-control" onClick="addNewIngredient()"><i class="fa fa-plus-circle"></i></button>'+
                    '</td>';
}
function deleteIngredient(r){
    var table = document.getElementById("ingredient-table");
    var rows = table.tBodies[0].rows.length;

    if(rows>1){
        var i = r.parentNode.parentNode.rowIndex;
        table.deleteRow(i);
    }        

    rows = table.tBodies[0].rows.length;
    var j=0;
    while(rows>0){
        j++;
        var x = table.rows[j].cells;
        x[0].innerHTML = '<input type="number" class="form-control" value="'+j+'" />';
        rows--;
    }
    
}

function addNewRecipe(){
    var table = document.getElementById("recipe-table");
    var rows = table.tBodies[0].rows.length;
    rows ++;
    var row = table.insertRow(rows);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = '<td>'+
                        '<input type="number" id="num'+rows+'" class="form-control" value="'+rows+'" name="no'+rows+'"/>'+
                      '</td>';
    cell2.innerHTML = '<td>'+
                        '<textarea class="form-control" id="exampleFormControlTextarea1" name="recipe'+rows+'" rows="3" style="resize: none;"></textarea>'+
                    '</td>';
    cell3.innerHTML = '<td style="text-align: center;">'+
                        '<button type="button" class="btn btn-danger form-control" value="Delete" onClick="deleteRecipe(this)"><i class="fa fa-minus-circle"></i></button>'+
                    '</td>';
    cell4.innerHTML = '<td style="text-align: center;">'+
                        '<button type="button" class="btn btn-success form-control" onClick="addNewRecipe()"><i class="fa fa-plus-circle"></i></button>'+
                    '</td>';
}

function deleteRecipe(r){
    var table = document.getElementById("recipe-table");
    var rows = table.tBodies[0].rows.length;

    if(rows>1){
        var i = r.parentNode.parentNode.rowIndex;
        table.deleteRow(i);
    }        

    rows = table.tBodies[0].rows.length;
    var j=0;
    while(rows>0){
        j++;
        var x = table.rows[j].cells;
        x[0].innerHTML = '<input type="number" class="form-control" value="'+j+'" />';
        rows--;
    }
    
}
function addFood(){
    alert("ការដាក់ស្នើរបស់លោកអ្នកទទួលបានជោគជ័យ​!! សូមអរគុណ");
}