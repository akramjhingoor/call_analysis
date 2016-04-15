/*Au momment de prod, laiscer la URL /*/
var URL = '/call_analysis/web';

$(document).ready(function () {
    $(".datepicker").datepicker({
        //defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
    });
});

jQuery(function ($) {
    $.datepicker.regional['fr'] = {
        closeText: 'Fermer',
        prevText: '&#x3c;Préc',
        nextText: 'Suiv&#x3e;',
        currentText: 'Courant',
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre',
            'Décembre'],
        monthNamesShort: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul',
            'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi',
            'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
        weekHeader: 'Sm',
        dateFormat: 'dd-mm-yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['fr']);
});

$(function () {
    $(".datepicker-from").datepicker({
        //defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        onClose: function (selectedDate) {
            $(".datepicker-to").datepicker("option", "minDate", selectedDate);
        }
    });
    $(".datepicker-to").datepicker({
        //defaultDate: "+1w",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1,
        onClose: function (selectedDate) {
            $(".datepicker-from").datepicker("option", "maxDate", selectedDate);
        }
    });
});

$(function () {
    $("#plugins4").jstree({
        "search": {
            "case_insensitive": false,
            "show_only_matches": true,
            "fuzzy": false,
            "close_opened_onclear": true
        },
        "plugins": ["search"]
    });

    var to = false;
    $('#plugins4_q').keyup(function () {

        if (to) {
            clearTimeout(to);
        }
        to = setTimeout(function () {
            var v = $('#plugins4_q').val();
            $('#plugins4').jstree(true).search(v);
        }, 250);
    });

    var to = false;
    $('#plugins4_q').ready(function () {
        if (to) {
            clearTimeout(to);
        }
        to = setTimeout(function () {
            var v = $('#plugins4_q').val();
            $('#plugins4').jstree(true).search(v);
        }, 250);
    });
});

$(function () {
    // 6 create an instance when the DOM is ready
    $('#plugins4').jstree();
    // 7 bind to events triggered on the tree
    $('#plugins4').on(
            "changed.jstree",
            function (e, data) {
                var v = $('#plugins4_q').val();
                console.log(data.selected);
                var str = data.selected[0];
                var res = str.split('_');
                var type = res[0];
                var id = res[1];
                switch (type) {
                    case 'society':
                        $(location).attr('href',
                                URL + '/main/client/contact/' + id);
                        break;
                    default:
                }
            });
});


$(document).ready(function () {
    $('#myTable_statisticsglobal').dataTable({
        "order": [[1, "asc"]],
        "bInfo": false,
        "bPaginate": false,
    });
});

$(document).ready(function () {
    $('#myTable_calls_contact').dataTable({
        "order": [[1, "asc"]],
        "bInfo": false,
        "bPaginate": false,
    });
});

$(function () {
    
    var a = parseInt($("#num_answered_t").html());
    var b = parseInt($("#num_not_answered_t").html());
    var a1 = a*100/(a + b); 
    var b1 = b*100/(a + b);
    
    var pieData = [
        {
            value: a,
            color: "#4ACAB4",
            label : ''+Math.round(a1)+'%',
        },
        {
            value: b,
            color: "#878BB6",
            label : ''+Math.round(b1)+'%',
        }
    ];

    var pieOptions = {
        animation : false,
    }

    // For a pie chart
    var calls = $("#calls").get(0).getContext("2d");
    new Chart(calls).Pie(pieData, pieOptions);

});




