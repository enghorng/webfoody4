$(document).ready(function () {
    $("#dropdown-catalog").change(function(){
        var catalog = $("#dropdown-catalog").val();
        if(catalog == 'Food'){
            $('#dropdown-type').prop('disabled', false);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
            $('#dropdown-type').append(`<option value="Water">ទឹក  </option>`); 
            $('#dropdown-type').append(`<option value="NoWater"> គោក </option>`); 
        }
        else if(catalog == 'Sweet'){
            $('#dropdown-type').prop('disabled', false);
            $('#dropdown-type').html('');
            $('#dropdown-type').append(`<option value=""> -- សូមជ្រើសរើស -- </option>`); 
            $('#dropdown-type').append(`<option value="Sweet"> បង្អែម  </option>`); 
            $('#dropdown-type').append(`<option value="Cake"> នំ </option>`); 
        }
        else if(catalog == 'Drink'){
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
            $('option[value=""]').prop('selected',true);
            $('#dropdown-province').prop('disabled', true);
            // $(this).attr('selected','selected');
        }
    });

    // $("#btnAddIngredient").click(function(){
    //     var num = $("table #ingredient-table").length + 2;
    //     $("table #ingredient-tbody").append('<tr>'+
    //                                             '<td>'+
    //                                                 '<input type="text" class="form-control" value="" />'+
    //                                             '</td>'+
    //                                             '<td>'+
    //                                                 '<input type="text" class="form-control" id="ingredient" name="ingredient2" />'+
    //                                             '</td>'+
    //                                             '<td>'+
    //                                                 '<input type="text" class="form-control" name="qty2"/>'+
    //                                             '</td>'+
    //                                             '<td style="text-align: center;">'+
    //                                                 '<button type="button" class="btn btn-danger form-control"><i class="fa fa-minus-circle"></i></button>'+
    //                                             '</td>'+
    //                                             '<td style="text-align: center;">'+
    //                                                 '<button type="button" class="btn btn-success form-control"><i class="fa fa-undo"></i></button>'+
    //                                             '</td>'+
    //                                         '</tr>');
    // });
});

function addNewIngredient(){
    var table = document.getElementById("ingredient-table");
    var row = table.insertRow(3);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '<td>'+
                        '<input type="text" class="form-control" value="" />'+
                      '</td>';
    cell2.innerHTML = '<td>'+
                        '<input type="text" class="form-control" id="ingredient" name="ingredient2" onClick="addNewIngredient()" />'+
                    '</td>';
    cell3.innerHTML = '<td>'+
                        '<input type="text" class="form-control" name="qty2"/>'+
                    '</td>';
    cell4.innerHTML = '<td style="text-align: center;">'+
                        '<button type="button" class="btn btn-danger form-control"><i class="fa fa-minus-circle"></i></button>'+
                    '</td>';
    cell5.innerHTML = '<td style="text-align: center;">'+
                        '<button type="button" class="btn btn-success form-control"><i class="fa fa-plus-circle" onClick="addNewIngredient()"></i></button>'+
                    '</td>';
}