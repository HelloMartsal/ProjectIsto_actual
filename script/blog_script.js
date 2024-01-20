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
    var selectedCategory = this.value; // Get the selected category
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
                selectedItems.push(id);
            } else {
                var index = selectedItems.indexOf(id);
                if(index !== -1) selectedItems.splice(index, 1);
            }
        });
    });
});





function submitForm() {
    var title = $('#title').val();
    var content = $('#content').val();
    var items = JSON.stringify(selectedItems);

    $.ajax({
        type: 'POST',
        url: '../php/store_announ.php',
        data: { title: title, content: content, items: items },
        success: function (data) {
            $('#result').html(data);
        },
        error: function () {
            $('#result').html('Error creating blog post. Please try again.');
        }
    });
}
