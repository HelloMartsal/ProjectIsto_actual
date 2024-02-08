var array = [];

function onClick() {
  var inputValue = $("#search").val();
  
  array = array.concat(inputValue.split(','));
  
  console.log(array);
  console.log("Array content", array);
  get();
}


function get() {
  var table = $("#item_table");
 
  table.empty();
  
  $.ajax({
    url: "../php/display.php",
    type: "GET",
    dataType: "json",
    success: function(response) {
      var data = response;
      console.log("Response received");
      console.log("Response received", JSON.stringify(response, null, 2));
      
      var header = $("<thead></thead>");
      var row = $("<tr></tr>");
      var cell1 = $("<th></th>").text("Item ");
      var cell2 = $("<th></th>").text("Category ");
      var cell3 = $("<th></th>").text("Quantity");
      
      
      row.append(cell1, cell2,cell3);
      header.append(row);
      table.append(header);
    
    var tbody = $("<tbody></tbody>");
    
for (var i = 0; i < data.length; i++) {
      var rowData = data[i];
  for (var k = 0; k < array.length; k++) {  
      if (array[k] == rowData.cat_name){
        var row = $("<tr></tr>");

      
      var cell1 = $("<td></td>").text(rowData.product_name);
      var cell2 = $("<td></td>").text(rowData.cat_name);
      var cell3 = $("<td></td>").text(rowData.quant);
      

      row.append(cell1, cell2, cell3);
      tbody.append(row);
    }
  }
}
    table.append(tbody);
    array = [];
    },
    error: function() {
      console.log("Error occurred in the request");
    }
  });
}

var button = $("button");
button.on("click", onClick);

$(document).ready(function () {
  $.ajax({
      url: '../php/print_data.php',
      type: 'GET',
      data: { dataType: 'categories' },
      dataType: 'json',
      success: function (data) {
          var dropdown = $('#categories');
          $.each(data, function (index, category) {
              dropdown.append($('<option></option>').attr('value', category.cat_id).text(category.cat_name));
          });
      },
      error: function () {
          console.error('Error fetching categories');
      }
  });
});