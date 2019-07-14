/*
**** FORM SUBMIT HANDLER PLUGIN ****
Author: Rumesh Dananjaya
*/

//dynamically declare ladda
var ladda = {};
let loop_id = 1;
$('.ajax-submit').each(function(){
	$(this).attr('data-ladda',"ladda_"+loop_id);
	$(this).attr('data-form-id',loop_id);
	$(this).find('[type="submit"]').addClass("ladda_"+loop_id);
	ladda['ladda' + '_' + loop_id] = Ladda.create( document.querySelector( ".ladda_"+loop_id ) );
	loop_id++;
});

$('.ajax-submit input').change(function(){
	removeError(this);
});

$('.ajax-submit').submit(function(event){
	event.preventDefault();

	let form_ladda = $(this).attr('data-ladda');
	let form = $(this);
	var data = new FormData(this);
	let path = $(this).attr('action');
	let method = $(this).attr('method');

	resetErrors();
	nearSubmitErrorRemove();
	submitData(data,path,method,form_ladda,form);
});


// function addClick() {
// 	$('#addDataModal').modal('show');
// }

// function editClick(element) {
	// let row_id = $(element).attr('data-id');
	// $('#editDataModal').modal('show');
// }

// function deleteClick(element) {
// 	let row_id = $(element).attr('data-id');
// 	// $('#editDataModal').modal('show');
// }




function directSubmit(submit_form){

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


function submitData(data,path,method,form_ladda=0,form=0){
	// get this form's ladda
	if(form != 0){
		var this_ladda = ladda[form_ladda];
	}
	$.ajax({
		url: path,
		method: method,
		data: data,
		processData: false,
		contentType: false,
		beforeSend: function () {
			if(form != 0){
				this_ladda.start();
			}
		},
		complete: function () {
			if(form != 0){
				this_ladda.stop();
			}
		},
		success: function (data) {
			if (typeof window['successHandler'] === 'function') {
				successHandler(form,data); // This need to be handled externally
			}

		},
		error: function(data){
			
			if(data.status == 422){
				validationErrorHandler(data.responseJSON.errors)
				if (typeof window['appendValidationErrorHandler'] === 'function') {
					appendValidationErrorHandler(data.responseJSON.errors);
				}
				nearSubmitErrorDisplay(form,'* There are errors on the form. Please fix them before continuing.');
			}else{
				nearSubmitErrorDisplay(form,'* Something went wrong. Please try again later');
			}

			if (typeof window['appendErrorHandler'] === 'function') {
				appendErrorHandler(data);
			}
		}
	});

}

function deleteRow(path){
	submitData("",path,"delete");
}

function nearSubmitErrorDisplay(form,msg){
	if(form != 0){
		form.find('[type="submit"]').parent().prepend('<div class="text-danger submit-errors-availabe"><small>'+msg+'</small></div>');
	}
	// form.find('[type="submit"]').before('<div class="text-danger submit-errors-availabe"><small>'+msg+'</small></div>');
}

function nearSubmitErrorRemove(){
	$('.submit-errors-availabe').remove();
}

function validationErrorHandler(errors){
	$.each(errors, function(index, message) {
		displayErrors(index,message)
	});
}

function displayErrors(index, message) {

	let element = '';
	let input_index = parseInt(index.split('.').pop().trim());
	if (Number.isInteger(input_index)) {
		let input_name = (index.substring(0, index.indexOf(".")));
		element = "[name='" + input_name + "[" + input_index + "]']";
	} else {
		element = '[name="' + index + '"]';
	}

	// $(element).addClass('is-invalid');
	$(element).closest('.form-group').addClass('has-error');
	$(element).after('<span class="help-block">'+message+'</span>');
	if (typeof window['appendDisplayErrors'] === 'function') {
		appendDisplayErrors(index, message);
	}

}

function resetErrors(){
	$('.form-group').removeClass('has-error');
	$('.help-block').remove();
	nearSubmitErrorRemove();
}

function removeError(element) {
	$(element).removeClass('is-invalid');
	$(element).next('.invalid-feedback').remove();
	nearSubmitErrorRemove();

	if (typeof window['appendRemoveError'] === 'function') {
		appendRemoveError(element);
	}
}
