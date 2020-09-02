window.addEventListener('DOMContentLoaded', function () {
const base_url = window.location.origin;
const location_path = window.location.pathname;

let id =0;


var image = document.getElementById('image');
var input = document.getElementById('input');
var $modal = $('#modal');
var cropper;
var image_cnt = 0;

var frm = $('#imageForm1');


$.get(`${base_url}/senior/load_barangay`, function(data)
{
    let html = '';
    for(let i=0; i < data.length; i++)
    {
        html += `<option value="${data[i].barangay}">${data[i].barangay}</option>`;
    }

    $('#barangay').append(html);

},'json');

$('#barangay').change(function()
{
    console.log('trigger');
    let barangay = $(this).val();

    $.get(`${base_url}/senior/load_purok/${barangay}`, function(data)
    {
        console.log(data);
        let html = '';
        for(let i=0; i < data.length; i++)
        {
            html += `<option value="${data[i].purok}">${data[i].purok}</option>`;
        }

        $('#purok').html(html);

    },'json');
});

let seniorTable =  $('#seniorTable').DataTable({ 
    "processing": true,
        "ajax": `${base_url}/senior/senior_list`,
        "columns": [
            { "visible": false, "width": "40%", "data": "pi_pk"},
            { "width": "30%", "data": "name[, ]" },
            { "width": "10%", "data": "gender" },
            { "width": "20%", "data": "purok" },
            { "width": "10%", "data": "barangay" },
            { "width": "10%", "data": "picture" },
            { "width": "10%", "data": "signature" },
            { "width": "10%", "data": "thumbmark" }
        ],
        "order": [[ 0, "desc" ]],
        "deferRender": true,
        "responsive": true,
        dom: 'PBfrtip',

});     

$('.dt-buttons').addClass('float-left');

$('#seniorForm').submit(function(e){
    e.preventDefault();
    $.post(`${base_url}/senior/save`, $(this).serialize(), function(succ){
        if(succ.status)
        {
            Swal.fire(
                'Success!',
                'You have successfully registered!',
                'success'
              ).then(()=>{
                  $('#seniorForm')[0].reset();
                  seniorTable.ajax.reload();
              })
        }
        else
        {
            Swal.fire(
                'Failed!',
                `Something went wrong`,
                'error'
              ); 
        }
    },'json');
});

$(document).on('click', '.btnPictureUpload', function(){
    id = $(this).attr('id');
    console.log(id);

    $('#pictureUpload').modal('show');
});

$(document).on('click', '.btnRemoveImage',function(){
    console.log('removeImage');
    $("#image_cnt_"+image_cnt).remove();
    image_cnt--;
});

input.addEventListener('change', function (e) {
    var files = e.target.files;
    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
        file = files[0];
        if (URL) {
            image.src = URL.createObjectURL(file);
            $modal.modal('show');
        } 
        else if (FileReader) 
        {
            reader = new FileReader();
            reader.onload = function (e) {
                image.src = reader.result;
                $modal.modal('show');
            };
            reader.readAsDataURL(file);
        }
    }
});

$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 1,
    });
}).on('hidden.bs.modal', function () {
    cropper.destroy();
    cropper = null;
});

document.getElementById('crop').addEventListener('click', function () {

    var canvas;
    $modal.modal('hide');
    if (cropper) {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        image_cnt++;

        $("#image_crop_data").append('<div class="pad_row" id="image_cnt_'+image_cnt+'"><img class="rounded avatar img-rounded" src="'+canvas.toDataURL()+'"><button type="button" class="btn btn-danger btn-sm btnRemoveImage" style="float: right;cursor: pointer;">Remove <i class="fa fa-trash"></i></button><textarea name="base64str[]" style="opacity: 0;">'+canvas.toDataURL()+'</textarea></div>');

        console.log(image_cnt);
    }
});
    

frm.submit(function (e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: `${base_url}/senior/upload`,
        data: frm.serialize(),
        success: function (data) {
            console.log('Submission was successful.');
            console.log(data);
                            $("#image_crop_data").html("");
        },
        error: function (data) {
            console.log('An error occurred.');
            console.log(data);
        },
    });
});
    

});



