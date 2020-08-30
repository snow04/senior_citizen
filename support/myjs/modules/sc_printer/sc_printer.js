const base_url = window.location.origin;
const location_path = window.location.pathname;

let printTable =  $('#printTable').DataTable({ 
    "processing": true,
        "ajax": `${base_url}/sc_printer/load_print`,

        "columns": [
            { "visible": false, "width": "40%", "data": "pi_pk"},
            { "width": "35%", "data": "name[, ]" },
            { "width": "30%", "data": "purok" },
            { "width": "20%", "data": "barangay" },
            { "width": "20%", "data": "printed" },
            { "width": "10%", "data": "action" }
        ],
        "order": [[ 0, "desc" ]],
        "deferRender": true,
        "responsive": true,
        dom: 'PBfrtip',

});

$('.dt-buttons').addClass('float-left');
