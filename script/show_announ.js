$(document).ready(function(){
    $.ajax({
        url: '../php/pull_announ.php',
        type: 'GET',
        dataType: 'json',
        success: function(announcements) {
            create_announcements(announcements);
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
});

function create_announcements(announcements) {
    var announ = document.getElementById('announcements');
    for (var i = 0; i < announcements.length; i++) {
        let announcement = announcements[i];
        console.log(announcement);
        var announcementElement = document.createElement('div');
        announcementElement.className = 'announcement';
        announcementElement.id = 'announcement-' + i;
        
        var announcementTitle = document.createElement('h3');
        announcementTitle.innerHTML = announcement.title;
        announcementTitle.className = 'title';
        announcementTitle.id = 'announcement-title-' + i;
        
        var announcementBody = document.createElement('p');
        announcementBody.innerHTML = announcement.text;
        announcementBody.className = 'content';
        announcementBody.id = 'announcement-body-' + i;
        
        var announcementDate = document.createElement('p');
        announcementDate.innerHTML = announcement.time;
        announcementDate.className = 'date';
        announcementDate.id = 'announcement-date-' + i;
        
        var announcementButton = document.createElement('button');
        announcementButton.innerHTML = 'Δωρεά';
        announcementButton.className = 'announcement-button';
        announcementButton.id = 'announcement-button-' + i;
        announcementButton.addEventListener('click', function() {
            send_announ_id(announcement.id_ann, 'donation');
        });
        var announcementProduct = document.createElement('tr')
        for (var key in announcement.products) {
        announcementProduct.innerHTML +='<li>'+announcement.products[key] +'<br>'+'</li>'; 
        }
        
        announcementProduct.className = 'products';
        announcementProduct.id = 'announcement-products-' + i;
        
        var requestButton = document.createElement('button');
        requestButton.innerHTML = 'Αίτηση';
        requestButton.className = 'announcement-button';
        requestButton.id = 'announcement-button-' + i;
        requestButton.addEventListener('click', function() {
            send_announ_id(announcement.id_ann, 'request');
        });
        announcementElement.appendChild(announcementTitle);
        announcementElement.appendChild(announcementBody);
        announcementElement.appendChild(announcementProduct);
        announcementElement.appendChild(announcementDate);
        announcementElement.appendChild(announcementButton);
        announcementElement.appendChild(requestButton);
        announ.appendChild(announcementElement);
        
    }
}

function send_announ_id(id_ann, type) {
    if (type == 'donation') {
        window.location.href = 'donation_page.php?id_ann=' + id_ann;
    } else if (type == 'request'){
        window.location.href = 'request_page.php?id_ann=' + id_ann;
    }
}