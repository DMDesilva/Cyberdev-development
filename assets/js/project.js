var opt = {
    responsive: true,
    processing: true,
    serverSide: true,
    ajax:{
        url:'project/data',
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
        {data: 'description' , name: 'description', orderable: true, searchable : true},
        {
           // data:'projectclients.0.client.name',
            name: 'clients',
            orderable: true,
            searchable : true,
            //"render": "[, ].name"
            "render": function ( data, type, full, meta ) {
                var client_list = '';
                //console.log(full.projectclients[0].client.name);
                for(var i=0;i<full.projectclients.length;i++){
                    if(i > 0){
                        client_list +=' ,';
                    }
                     client_list += full.projectclients[i].client.name;

                }
                return client_list;
            }

        },
        {data: 'domain' , name: 'domain', orderable: false, searchable : false},
        {data: 'action' , name: 'action', orderable: false, searchable : false},
    ]
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

function validateDates(){
    var startDt = document.getElementById("approved_date").value;
    var endDt = document.getElementById("dev_start_date").value;

    if(startDt != '' && endDt != ''){
        if((new Date(startDt).getTime() > new Date(endDt).getTime()))
        {
            document.getElementById("approved_date").style.borderColor = "red";
            document.getElementById("dev_start_date").style.borderColor = "red";
            alert("Approved date must come before Developement Start Date");
            dateValidation = false;
        }else{
            document.getElementById("approved_date").style.borderColor = "#d2d6de";
            document.getElementById("dev_start_date").style.borderColor = "#d2d6de";
            dateValidation = true;
        }
    }

}

function directSubmitProject(submit_form){
    validateDates();
    if(dateValidation){
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
