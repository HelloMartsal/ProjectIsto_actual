// Fetch categories from the server and populate the multi-select dropdown
$(document).ready(function () {
    $.ajax({
        url: '../php/process_two.php',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Populate the multi-select dropdown with category options
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

// Function to handle form submission
function submitForm() {
    var title = $('#title').val();
    var content = $('#content').val();
    var categories = $('#categories').val(); // Get an array of selected category values

    // You can perform additional validation here

    // Use jQuery to make an AJAX request to process.php
    $.ajax({
        type: 'POST',
        url: '../php/process.php',
        data: { title: title, content: content, categories: categories },
        success: function (data) {
            $('#result').html(data);
        },
        error: function () {
            $('#result').html('Error creating blog post. Please try again.');
        }
    });
}
