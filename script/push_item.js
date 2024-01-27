var detailCounter = 0;
function addDetails() {
    var detailsDiv = document.getElementById('details');
    
    var newDetailNameLabel = document.createElement('label');
    newDetailNameLabel.innerHTML = 'Detail ' + (detailCounter + 1) + ':';
    detailsDiv.appendChild(newDetailNameLabel);
    detailsDiv.appendChild(document.createElement('br'));
    
    var newDetailName = document.createElement('input');
    newDetailName.type = 'text';
    newDetailName.name = 'detail_name[' + detailCounter + ']';
    newDetailName.id = 'detail_name_' + detailCounter;
    newDetailName.placeholder = 'Detail Name';
    newDetailName.required = true;
    detailsDiv.appendChild(newDetailName);
    detailsDiv.appendChild(document.createElement('br'));
    
    
    var newDetailValue = document.createElement('input');
    newDetailValue.type = 'text';
    newDetailValue.name = 'detail_value[' + detailCounter + ']';
    newDetailValue.id = 'detail_value_' + detailCounter;
    newDetailValue.placeholder = 'Detail Value';
    newDetailValue.required = true;
    detailsDiv.appendChild(newDetailValue);
    detailsDiv.appendChild(document.createElement('br'));
    
    detailCounter++;
}

function prepareAndSendData(event) {
    event.preventDefault();
    var itemName = document.getElementById('item_name').value;
    var itemCategory = document.getElementById('item_category').value;
    var detailName = document.getElementById('detail_name').value;
    var detailValue = document.getElementById('detail_value').value;
    var details = [];
    details.push({
        detail_name: detailName,
        detail_value: detailValue
    });
    for (var i = 0; i < detailCounter; i++) {
        var detailName = document.getElementById('detail_name_' + i).value;
        var detailValue = document.getElementById('detail_value_' + i).value;
        details.push({
            detail_name: detailName,
            detail_value: detailValue
        });
    }

    var itemData = {
        name: itemName,
        category: itemCategory,
        details: details
    };

    var jsonData = JSON.stringify(itemData);
    submitForm(jsonData);

    console.log(jsonData);
    document.getElementById('item_name').value = '';
    document.getElementById('item_category').value = '';
    document.getElementById('detail_name').value = '';
    document.getElementById('detail_value').value = '';
    for (var i = 0; i < detailCounter; i++) {
        document.getElementById('detail_name_' + i).value = '';
        document.getElementById('detail_value_' + i).value = '';
    }

    return true;
}

function submitForm(jsondata) {
    $.ajax({
        url: '../php/push_pro.php',
        type: 'POST',
        data: jsondata,
        contentType: 'application/json',
        success: function (response) {
            var responseElement = document.getElementById('response');
            responseElement.innerHTML = response;
        },
        error: function () {
            console.error('Error fetching categories');
        }
    });
}
