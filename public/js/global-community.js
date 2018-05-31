$(document).ready(function() {
    $.fn.dataTable.ext.classes.sPageButton = 'btn btn-sm btn-empty';

    var series = [
        ['USA', 55, 'United States'],
        ['ITA', 10, 'Italy'],
        ['GBR', 16, 'Great Britain'],
        ['BRA', 11, 'Brazil'],
        ['IND', 10, 'India'],
        ['CAN', 8, 'Canada'],
        ['MEX', 6, 'Mexico'],
        ['RUS', 3, 'Russia'],
        ['AUS', 3, 'Australia']
    ];

    $('#global_community_table').DataTable({
        dom: 't',
        data: series,
        order: [[ 1, "desc" ]],
        pageLength: 8,
        columns: [
            {
                data: [2]
            },{
                data: [1],
                "render": function ( data, type, row, meta ) {
                    return data + '%';
                }
            }
        ]
    });

    var dataset = {};
    // We need to colorize every country based on "numberOfWhatever"
    // colors should be uniq for every value.
    // For this purpose we create palette(using min/max series-value)
    var onlyValues = series.map(function(obj){ return obj[1]; });
    var minValue = Math.min.apply(null, onlyValues),
            maxValue = Math.max.apply(null, onlyValues);
    // create color palette function
    // color can be whatever you wish
    var paletteScale = d3.scale.linear()
            .domain([minValue,maxValue])
            .range(["#beebef","#00A1AC"]); // blue color
    // fill dataset in appropriate format
    series.forEach(function(item){ //
        // item example value ["USA", 70]
        var iso = item[0],
                value = item[1];
        dataset[iso] = { numberOfThings: value, fillColor: paletteScale(value) };
    });

    var global_community = new Datamap({
        element: document.getElementById("global_community"),
        projection: 'mercator',
        height: null,
        width: null,
        setProjection: function (element) {
            var projection = d3.geo.mercator().center([10, 0]).scale(67).translate([element.offsetWidth / 2, element.offsetHeight / 2 + element.offsetHeight / 4]);
            var path = d3.geo.path().projection(projection);
            return { path: path, projection: projection };
        },
        responsive: true,
        fills: { defaultFill: '#beebef' },
        data: dataset,
        geographyConfig: {
            borderColor: '#00A1AC',
            borderWidth: 0,
            highlightBorderWidth: 1,
            // don't change color on mouse hover
            highlightFillColor: function(geo) {
                return geo['fillColor'] || '#beebef';
            },
            // only change border
            highlightBorderColor: '#00A1AC',
            // show desired information in tooltip
            popupTemplate: function(geo, data) {
                // don't show tooltip if country don't present in dataset
                if (!data) { return ; }
                // tooltip content
                return ['<div class="hoverinfo">',
                    '<strong>', geo.properties.name, '</strong>',
                    '<br>Count: <strong>', data.numberOfThings, '</strong>',
                    '</div>'].join('');
            }
        }
    });

    var colors = d3.scale.category10();

    window.addEventListener('resize', function(event){
        global_community.resize();
    });

    var team_members = [{
        id: 'AP1',
        photo: '../images/professional-woman-2.png',
        name: 'Ayushi Patidar',
        impact_score: 74,
        impact_score_change: 1
    },{
        id: 'JG1',
        photo: '../images/professional-man-2.png',
        name: 'John Gibbons',
        impact_score: 79,
        impact_score_change: 6
    },{
        id: 'TP1',
        photo: '../images/professional-woman-1.png',
        name: 'Tobi Polland',
        impact_score: 85,
        impact_score_change: 10
    },{
        id: 'JR1',
        photo: '../images/profile-josh.jpg',
        name: 'Josh Richmond',
        impact_score: 90,
        impact_score_change: 1
    },{
        id: 'EE1',
        photo: '../images/professional-man-3.png',
        name: 'Eric Edgerton',
        impact_score: 70,
        impact_score_change: 10
    }];

    $('#top_gigatizers_table').DataTable({
        dom: 't',
        data: team_members,
        order: [[ 0, "desc" ]],
        pageLength: 4,
        autoWidth: false,
        columns: [
            {
                data: 'impact_score',
                visible: false
            },{
                data: 'photo',
                className: 'photo-thumbnail-container',
                "render": function ( data, type, row, meta ) {
                    return '<div class="photo-thumbnail"><img src="' + data + '" /></div>'
                }
            },{
                defaultContent: '',
                width: '100%',
                "render": function ( data, type, row, meta ) {
                    var info = $('<div>');
                    info.append($('<small>', {
                        html: '<strong>' + row.name + '</strong><br />'
                    }));
                    info.append($('<small>', {
                        html: row.impact_score + ' Impact Score<br />'
                    }));

                    var impact_score_change = row.impact_score_change;
                    if (impact_score_change > -1){
                        impact_score_change = '+' + impact_score_change;
                    }

                    info.append($('<small>', {
                        html: impact_score_change + ' Today<br />'
                    }));
                    return info.html();
                }
            }
        ]
    });

    var gigs = [{
        id: 'brilliant',
        name: 'Brilliant Design Dashboard',
        teamMembers: ['TP1', 'JR1'],
        created: 'May 5, 2018',
        progress: 70,
        status: 3
    },{
        id: 'shawneeMacro',
        name: 'VBA Macro for Shawnee',
        teamMembers: ['JG1', 'AP1'],
        created: 'May 3, 2018',
        progress: 90,
        status: 3
    },{
        id: 'imax',
        name: 'IMAX Logo Design',
        teamMembers: ['TP1', 'EE1'],
        created: 'May 3, 2018',
        progress: 60,
        status: 3
    },{
        id: 'tableauDashboard',
        name: 'Tableau Dashboard for HQ',
        teamMembers: ['TP1', 'JR1'],
        created: 'May 2, 2018',
        progress: 60,
        status: 1
    },{
        id: 'haz',
        name: 'Hazardous Waste Scanning',
        teamMembers: ['TP1', 'JR1'],
        created: 'May 7, 2018',
        progress: 12,
        status: 2
    }];

    $('#this_months_gigs_table').DataTable({
        dom: 'rt',
        data: gigs,
        order: [[ 0, "desc" ]],
        pageLength: 5,
        autoWidth: false,
        scrollY: '400px',
        scrollCollapse: true,
        columns: [
            {
                data: 'id',
                visible: false
            },{
                data: 'name',
                "render": function ( data, type, row, meta ) {
                    return data + '<br /><small>Created ' + row.created + '</small>'
                }
            },{
                data: 'teamMembers',
                "render": function ( data, type, row, meta ) {
                    var photoContainer = $('<div />');
                    for (var i = 0; i < data.length; i++){
                        var photoThumbnail = $('<div />', {
                            class: 'photo-thumbnail photo-thumbnail-medium',
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
                defaultContent: '',
                width: '120px',
                "render": function ( data, type, row, meta ) {
                    var actionsContainer = $('<div />');
                    var buttonGroup = $('<div />', {
                        class: 'btn-group btn-group-sm'
                    });
                    var viewBtn = $('<btn />', {
                        class: 'btn',
                        title: 'View',
                        html: '<i class="fas fa-eye"></i>'
                    });
                    buttonGroup.append(viewBtn);
                    var upvoteBtn = $('<btn />', {
                        class: 'btn',
                        title: 'Upvote',
                        html: '<i class="fas fa-thumbs-up"></i>'
                    });
                    buttonGroup.append(upvoteBtn);
                    var commentBtn = $('<btn />', {
                        class: 'btn',
                        title: 'Comment',
                        html: '<i class="fas fa-comments"></i>'
                    });
                    buttonGroup.append(commentBtn);
                    var favoriteBtn = $('<btn />', {
                        class: 'btn',
                        title: 'Add to Favorites',
                        html: '<i class="fas fa-star"></i>'
                    });
                    buttonGroup.append(favoriteBtn);
                    actionsContainer.append(buttonGroup);
                    return actionsContainer.html();
                }
            }
        ]
    });
});