$(document).ready(function() {

    var headerSearch =  $('#header-search');
    var searchbar = headerSearch.find('input');
    var icon = headerSearch.find('i');
    icon.on('click', function(){
        if (headerSearch.hasClass('active') && searchbar.val().length > 0){
            // submit search
        } else {
            headerSearch.addClass('active');
            searchbar.focus();
        }
    });
    searchbar.on('focus', function(){
        headerSearch.addClass('active');
    });
    searchbar.on('change blur', function(){
        if (searchbar.val().length < 1){
            headerSearch.removeClass('active');
        }
    })

    $.fn.dataTable.ext.classes.sPageButton = 'btn btn-sm btn-empty';

    var team_members = [{
        id: 'AP1',
        photo: 'http://placehold.it/200x200/',
        name: 'Ayushi Patidar',
        impact_score: 74,
        impact_score_change: 1
    },{
        id: 'CH1',
        photo: 'http://placehold.it/200x200/',
        name: 'Camden Hill',
        impact_score: 79,
        impact_score_change: 6
    },{
        id: 'TP1',
        photo: 'http://placehold.it/200x200/',
        name: 'Tobi Polland',
        impact_score: 85,
        impact_score_change: 10
    },{
        id: 'JR1',
        photo: 'http://placehold.it/200x200/',
        name: 'Josh Richmond',
        impact_score: 90,
        impact_score_change: 1
    },{
        id: 'EE1',
        photo: 'http://placehold.it/200x200/',
        name: 'Eric Edgerton',
        impact_score: 70,
        impact_score_change: 10
    }];

    var gigs = [{
        id: 'brilliant',
        name: 'Brilliant Design Dashboard',
        teamMembers: ['TP1', 'JR1'],
        created: 'May 5, 2018',
        progress: 70,
        status: 3,
        hoursSpent: 9,
        review: 5
    },{
        id: 'imax',
        name: 'IMAX Logo Design',
        teamMembers: ['TP1', 'EE1'],
        created: 'May 3, 2018',
        progress: 60,
        status: 3,
        hoursSpent: 5,
        review: 4.5
    },{
        id: 'tableauDashboard',
        name: 'Tableau Dashboard for HQ',
        teamMembers: ['TP1', 'JR1'],
        created: 'May 2, 2018',
        progress: 60,
        status: 1,
        hoursSpent: 1,
        review: 4
    },{
        id: 'haz',
        name: 'Hazardous Waste Scanning',
        teamMembers: ['TP1', 'JR1'],
        created: 'May 7, 2018',
        progress: 12,
        status: 2,
        hoursSpent: 2,
        review: 5
    }];

    $('#gig_portfolio_table').DataTable({
        dom: 'rt',
        data: gigs,
        order: [[ 0, "desc" ]],
        pageLength: 5,
        autoWidth: false,
        columns: [
            {
                title: 'ID',
                data: 'id',
                visible: false
            },{
                title: 'Gig Name',
                data: 'name',
                "render": function ( data, type, row, meta ) {
                    return data + '<br /><small>Created ' + row.created + '</small>'
                }
            },{
           /*     data: 'teamMembers',
                "render": function ( data, type, row, meta ) {
                    var photoContainer = $('<div />');
                    var photoThumbnail = $('<div />', {
                        class: 'photo-thumbnail photo-thumbnail-small photo-thumbnail-square',
                        style: 'display: inline-block; margin-right: 4px;'
                    });
                    var photo = $('<img />');
                    var teamMember = team_members.filter(function(member){
                        return member.id == data[0];
                    });
                    photo[0].src = teamMember[0].photo;
                    photo[0].title = teamMember[0].name;
                    photoContainer.append(photoThumbnail.append(photo));
                    return photoContainer.html();
                }
            },{*/
                title: 'Hours<br />Spent',
                data: 'hoursSpent',
                class: 'text-center'
            },{
                title: 'Team<br />Members',
                data: 'teamMembers',
                "render": function ( data, type, row, meta ) {
                    var photoContainer = $('<div />');
                    for (var i = 0; i < data.length; i++){
                        var photoThumbnail = $('<div />', {
                            class: 'photo-thumbnail photo-thumbnail-small photo-thumbnail-square',
                            style: 'display: inline-block; margin-right: 4px;'
                        });
                        var photo = $('<img />');
                        var teamMember = team_members.filter(function(member){
                            return member.id == data[i];
                        });
                        photo[0].src = teamMember[0].photo;
                        photo[0].title = teamMember[0].name;
                        photoContainer.append(photoThumbnail.append(photo));
                    }
                    return photoContainer.html();
                }
            },{
                title: 'Gig Progress',
                data: 'progress',
                "render": function ( data, type, row, meta ) {
                    var progressContainer = $('<div />');
                    var progressWrapper = $('<div />', {
                        class: 'progress'
                    });
                    var progressBar = $('<div />', {
                        class: 'progress-bar',
                        role: 'progressbar',
                        width: data + '%'
                    });

                    progressWrapper.append(progressBar);
                    progressContainer.append(progressWrapper);
                    progressContainer.append('<small>' + data + '% Complete</small>');
                    return progressContainer.html();
                }
            },{
                title: 'Status',
                data: 'status',
                "render": function ( data, type, row, meta ) {
                    var statusContainer = $('<div />');
                    var statusBtn = $('<div />', {
                        class: 'badge badge-pill full-width p-2'
                    });

                    if (data == '3'){
                        statusBtn.addClass('badge-success');
                        statusBtn.html('SUCCESS');
                    } else if (data == '2'){
                        statusBtn.addClass('badge-warning');
                        statusBtn.html('HOLD');
                    } else if (data == '1'){                        statusBtn.addClass('badge-danger');
                        statusBtn.html('BLOCKED');
                    }
                    statusContainer.append(statusBtn);
                    return statusContainer.html();
                }
            },{
                title: 'Review',
                data: 'review',
                width: '80px',
                "render": function ( data, type, row, meta ) {
                    var reviewContainer = $('<div />');
                    var fullStars = 0;
                    if (data % 1 !== 0){
                        fullStars = data - .5;
                    }
                    for (var i = 0; i < data; i++){
                        var star = $('<i />', {
                            class: 'fas fa-star',
                            style: 'color: #FFD11F;'
                        });
                        reviewContainer.append(star);
                    }
                    for (var i = 5; i > data; i--){
                        var starGray = $('<i />', {
                            class: 'fas fa-star',
                            style: 'color: #eee;'
                        });
                        reviewContainer.append(star);
                    }
                    return reviewContainer.html();
                }
            }
        ]
    });
});