var SSPEnable = true;
var opt = {
    responsive: true,
    processing: true,
    serverSide: true,
    ajax:{
        url:'developer/data',
        type:'POST',
        dataType: 'JSON',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization');
        }
    },
    columns:[
        {data: 'DT_RowIndex' , name: 'DT_RowIndex',orderable: true},
        //{data: 'id' , name: 'id', orderable: true},
        {name: 'fullname',
            orderable: true,
            searchable : true,
            "render": function ( data, type, full, meta ) {
                var name = ""+full.firstname+" "+full.lastname;
                return name;
        }
        },
        {data: 'position.name' , name: 'position', orderable: true, searchable : true},
        {data: 'mobile' , name: 'mobile', orderable: true, searchable : true},
        {data: 'email' , name: 'email', orderable: true, searchable : true},
        {data: 'work_type' , name: 'work_type', orderable: true, searchable : true},
        {
            name: 'status',
            orderable: true,
            searchable : true,
            "render":function(data, type, full, meta){
                if(full.status){
                return '<div class="btn-group btn-toggle" data-toggle="buttons">'+
                        '<label class="btn btn-sm btn-primary active" onclick="changeStatus('+full.id+')">'+
                        '<input type="radio" id="option-0" name="status" value="1" checked="checked" >Active</label>'+
                        '<label class="btn btn-sm btn-default" onclick="changeStatus('+full.id+')">'+
                        '<input type="radio" id="option-1" name="status" value="0">Inactive</label>'+
                        '</div>';
                }else{
                    return '<div class="btn-group btn-toggle" data-toggle="buttons">'+
                        '<label class="btn btn-sm btn-default" onclick="changeStatus('+full.id+')">'+
                        '<input type="radio" id="option-0" name="status" value="1" >Active</label>'+
                        '<label class="btn btn-sm  btn-primary active" onclick="changeStatus('+full.id+')">'+
                        '<input type="radio" id="option-1" name="status" value="0" checked="checked">Inactive</label>'+
                        '</div>';
                }

             //   return '<input type="checkbox" data-toggle="toggle" name="status" id="status" value="'+full.status+'"/>';
            }},
        {data: 'action' , name: 'action', orderable: false, searchable : false},
    ]
}


function successHandler(form,data){
    returnMessage('success',data.msg);
}

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[name="w_days[]"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

$(function () {
    datatabel = $('.dataTable').DataTable(opt);
});

function addClick(e){
    loadModal(resource);
}

function editClick(e){
    loadModal(resource,$(e).attr('data-id'));
}

function deleteClick(e){
    var delete_confirm = confirm("Please confirm delete");
    if(delete_confirm){
        deleteRow(resource + '/'+ $(e).attr('data-id'));
    }
}

function loadModal(resource,id = 0){
    var url = '';
    if(id == 0){
        url = resource+"/create";
    }else{
        url = resource+"/"+id+"/edit";
    }

    $.ajax({
        url: url,
        method: "get",
        data: {
            id:id
        },
        beforeSend: function () {
        },
        complete: function () {
        },
        success: function (data) {
            setModelContent(data);
        },
        error: function(data){

        }
    });
}

function setModelContent(data){
    $('#formModal .modal-content').html(data);
    $('#formModal').modal('show');
}

function successHandler(form,data){
    $('#formModal').modal('hide');
    datatabel.draw();
}

function checkForNumeric(value, name, span){
    if(value.match(/^[0-9]+$/) == null){
        document.getElementById(name).style.borderColor = "red";
        document.getElementById(span).innerHTML  = "This field can only contain numbers";
        numberValidation = false;
    }else{
        document.getElementById(name).style.borderColor = "#d2d6de";
        document.getElementById(span).innerHTML  = "";
        numberValidation = true;
    }

}

function changeStatus(id){
    $.ajax({
        url: resource+'/changestatus/'+id,
        method: "post",
        data: {
            id:id
        },
        beforeSend: function () {
        },
        complete: function () {
        },
        success: function (data) {
            //setModelContent(data);
            $('.dataTable').DataTable().ajax.reload();
        },
        error: function(data){

        }
    });
}

function directSubmitDeveloper(submit_form){
    var mobile= document.getElementById('mobile').value;
    var home = document.getElementById('home').value;
    checkForNumeric(mobile, 'mobile','span-mobile');
    checkForNumeric(home, 'home','span-home');

    if(numberValidation){
        // let form_ladda = $(form).attr('data-ladda');
        $(submit_form).find('[type="submit"]').addClass("ladda");
        var data = new FormData(submit_form);
        let path = $(submit_form).attr('action');
        let method = $(submit_form).attr('method');

        ladda['ladda'] = Ladda.create( document.querySelector( ".ladda" ) );

        resetErrors();
        nearSubmitErrorRemove();
        submitData(data,path,method,'ladda',$(submit_form));
    }
}