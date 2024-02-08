$(document).ready(function(){
    $.ajax({
        url: '../php/pull_task.php',
        type: 'GET',
        data:{ dataType: 'offers' }, 
        dataType: 'json',
        success: function(tasks) {
            create_tasks(tasks);           
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
});

function create_tasks(tasks) {
    
 var task_id = document.getElementById('offers'); 
    for (var i = 0; i < tasks.length; i++) {
        let task= tasks[i];
        console.log(task);
        var taskElement = document.createElement('div');
        taskElement.className = 'task';
        taskElement.id = 'task-' + i;
        
        var taskTitle = document.createElement('h3');
        taskTitle.innerHTML = "offer: "+task.id_off;
        taskTitle.className = 'title';
        task.id = 'task-title-' + i;
        
        var taskBody = document.createElement('p');
        taskBody.innerHTML = "Ονοματεπώνυμο : "+task.onoma +" "+task.epitheto + "<br>"+
        "Τηλέφωνο: "+task.phonenum +"<br>";
        taskBody.className = 'onoma';
        taskBody.id = 'task-onoma-' + i;
        
        var taskProduct = document.createElement('tr')
        for (var key in task.product_names) {
            for(var key2 in task.quantities){
            taskProduct.innerHTML +='<li>'+task.product_names[key] + ": "+
            task.quantities[key2]+'<br>'+'</li>'; 
        }
       }
        taskProduct.className = 'products';
        taskProduct.id = 'announcement-products-' + i;
        
        var taskDate = document.createElement('p');
        taskDate.innerHTML ="ημέρα αποδοχής: "+task.accept_date;
        taskDate.className = 'date';
        taskDate.id = 'announcement-date-' + i;


        var taskButton = document.createElement('button');
        taskButton.innerHTML = 'Ακύρωση';
        taskButton.className = 'task-button';
        taskButton.id = 'task-button-' + i;
        taskButton.addEventListener('click', function() {
        submitform(task);
        });

        taskElement.appendChild(taskTitle);
        taskElement.appendChild(taskBody);
        taskElement.appendChild(taskProduct);
        taskElement.appendChild(taskDate);
        taskElement.appendChild(taskButton);
        task_id.appendChild(taskElement);
    } 
}

function submitform(task){
    $.ajax({
        url: '../php/reject_offer.php',
        type: 'POST',
        data: JSON.stringify(task),
        contentType: 'application/json',
        success: function () {
            console.log(task);
        },
        error: function () {
            console.error('Error ');
        }
    });

}