var SSPEnable = true;
var opt = {
    responsive: true,
    processing: true,
    serverSide: true,
    ajax:{
        url:resource +'/data',
        type:'POST',
        dataType: 'JSON',
        beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization');
        }
    },
    columns:[
        {data: 'DT_RowIndex' , name: 'DT_RowIndex',orderable: true},
        // {data: 'id' , name: 'id', orderable: true},
        {data: 'name' , name: 'name', orderable: true, searchable : true},
        // {data: 'client.good_name' , name: 'client.good_name', orderable: true, searchable : true},
        {data: 'mailtypes.name' , name: 'mailtypes.name', orderable: true, searchable : true},
        // {name: 'developers', orderable: true, searchable : true,
        //     "render": function ( data, type, full, meta ) {
        //         var client_list = '';
        //       //  console.log(full.maildevelopers[0].developers.firstname);
        //         for(var i=0;i<full.maildevelopers.length;i++){
        //             if(i > 0){
        //                 client_list +=' ,';
        //             }
        //             client_list += full.maildevelopers[i].developers.firstname+' '+full.maildevelopers[i].developers.lastname;
        //
        //         }
        //         return client_list;
        //     }
        // },
        // {name: 'developergroups', orderable: true, searchable : true,
        //     "render": function ( data, type, full, meta ) {
        //         var client_list = '';
        //       //  console.log(full.maildevelopergroups[0].developergroups.name);
        //         for(var i=0;i<full.maildevelopergroups.length;i++){
        //             if(i > 0){
        //                 client_list +=' ,';
        //             }
        //             client_list += full.maildevelopergroups[i].developergroups.name;
        //
        //         }
        //         return client_list;
        //     }
        //
        // },
        {data: 'duration' , name: 'duration', orderable: true, searchable : true},
        {data: 'start_date' , name: 'start_date', orderable: true, searchable : true},
        {data: 'repeat' , name: 'repeat', orderable: true, searchable : true},
        {data: 'repeat_type' , name: 'repeat_type', orderable: true, searchable : true},
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



$(function () {
    datatabel = $('.dataTable').DataTable(opt)
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
            $('select').select2();
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

function directSubmitDevMail(submit_form){

    var devgrp = $('#devgroups').has('option:selected').length;
    var dev = $('#developers').has('option:selected').length;

    if(dev >0 || devgrp >0){
        $(submit_form).find('[type="submit"]').addClass("ladda");
        var data = new FormData(submit_form);
        let path = $(submit_form).attr('action');
        let method = $(submit_form).attr('method');

        ladda['ladda'] = Ladda.create( document.querySelector( ".ladda" ) );
        //console.log(data);
        resetErrors();
        nearSubmitErrorRemove();
        submitData(data,path,method,'ladda',$(submit_form));
    }else{
        alert('Either developer group or developers should be selected.');
        document.getElementById("devgroups").style.borderColor = "red";
        document.getElementById("developers").style.borderColor = "red";
    }

    // let form_ladda = $(form).attr('data-ladda');

}