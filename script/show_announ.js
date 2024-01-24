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
            send_announ_id(announcement.id_ann);
        });
        
        announcementElement.appendChild(announcementTitle);
        announcementElement.appendChild(announcementBody);
        announcementElement.appendChild(announcementDate);
        announcementElement.appendChild(announcementButton);
        announ.appendChild(announcementElement);
        
    }
}

function send_announ_id(id_ann) {
    window.location.href = 'donation_page.php?id_ann=' + id_ann;
}