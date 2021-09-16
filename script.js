$(document).ready(function(){
    $('.general__form').submit(function(e){
        e.preventDefault();

        var form = $(this);
        var fieldForm = form.serializeArray();
        var url = form.attr('action');
        
        var fileData = form.find('[name="file"]').prop('files')[0];   
        var formData = new FormData();         
        
        formData.append('file', fileData);
        formData.append('ajax', 'Y');
        $(fieldForm).each(function(index, obj){
            formData.append(obj.name, obj.value);
        });

        $.ajax({
            url: url,
			type: "post",
			dataType: "json",
			data: formData,
            contentType: false,
            processData: false,
			success: function(data){
                
                if(!data.success){
                    form.find('.error').remove();
                    form.find('.general-form').prepend('<div class="error"></div>');
                    
                    $(data.text).each(function(index, value){
                        form.find('.error').append('<div>'+value+'</div>')
                    });
                }

                if(data.success){
                    form.html('');
                    form.append('<div class="general-form__success">'+data.text+'</div>')
                }
			},
            error: function(error){
                form.html('');
                form.append('<div class="error">Произошла ошибка, обратитесь к администратору</div>');
            }
        })
    })
})