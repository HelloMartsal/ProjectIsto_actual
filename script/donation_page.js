// TODO PRINT ONLY THE ITEMS AND CATEGORIES OF THE CURRENT ANNOUNCEMENT
var urlParams = new URLSearchParams(window.location.search);
var id_ann = urlParams.get('id_ann');
if (id_ann && !isNaN(id_ann)) {
    id_ann = parseInt(id_ann);
} else {
    console.error('Invalid announcement ID:', id_ann);
}


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
var items = [];
$(document).ready(function () {
    $.ajax({
        url: '../php/print_data.php',
        type: 'GET',
        data: { dataType: 'items' },
        dataType: 'json',
        success: function (data) {
            items = data;
            var event = new Event('change');
            document.getElementById('categories').dispatchEvent(event);
        },
        error: function () {
            console.error('Error fetching categories');
        }
    });
});

var selectedItems = [];
document.getElementById('categories').addEventListener('change', function() {
    $('#items').html('');
    var selectedCategory = this.value; 
    if (this.value === ''){
        selectedCategory = "1";
    };
    var filteredItems = items.filter(function(item) {
        return item.category == selectedCategory; 
    });
    $.each(filteredItems, function(i, item) {
        var checkbox = $('<input>', { 
            type: 'checkbox',
            id:item.product_id,
            value: item.product_id,
            checked: selectedItems.includes(item.product_id)
        });
        $('#items').append(
            checkbox,
            $('<label>', { 
                for:item.producut_id,
                text: item.product_name 
            }),
            $('<br>') 
        );

        checkbox.on('change', function() {
            var id = Number(this.id);
            if(this.checked) {
                // Uncheck all other checkboxes
                $('input[type="checkbox"]').not(this).prop('checked', false);

                selectedItems = [id];
            } else {
                selectedItems = []; 
            }
        });
    });
});





function submitForm() {
    var items = JSON.stringify(itemQuant);
    console.log(items);
    //this works in the sever but returns an error in the client
    $.ajax({
        url: '../php/donation_store.php',
        type: 'POST',
        data: {items: items},
        dataType: 'application/json',
        success: function () {
            alert('Donation submitted successfully');
        },
        error: function () {
            console.error('Error submitting donation');           
        }
    });
}
var itemQuant = [];
function addItem(){
    var quant = document.getElementById('quant').value;
    var selectedItem = selectedItems[0];
    if (selectedItem && quant) {
        itemQuant.push({ item: selectedItem, quant: quant });

        document.getElementById('quant').value = '';
        $('#' + selectedItem).prop('checked', false);
    } else {
        console.error('An item must be selected and quant must not be empty');
    }
}