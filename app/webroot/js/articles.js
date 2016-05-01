$(document).ready(function () {
    
    var
        gradeTable = $('#article-table'),
        gradeBody = gradeTable.find('tbody'),
        gradeTemplate = _.template($('#article-template').remove().text()),
        numberRows = gradeTable.find('tbody > tr').length;

    gradeTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();
            
            $(gradeTemplate({key: numberRows++}))
                .hide()
                .appendTo(gradeBody)
                .fadeIn('fast');
            if(numberRows > 1) {
                var attri1 = 'input[name$="data[Researcharticle][0][applicant_id]"]';
                var attri2 = 'input[name$="data[Researcharticle][' + (numberRows - 1) +  '][applicant_id]"]';
                var attri3 = 'input[name$="data[Researcharticle][' + (numberRows - 1) +  '][id]"]';
                if($(attri2))
                    $(attri2).val($(attri1).val());
                $(attri3).remove();
            }
            else {
                var attri1 = 'input[name$="data[Researcharticle][0][applicant_id]"]';
                if($(attri1))
                    $(attri1).val($('#glob_userId').val());
            }
            $("#modified_articles").val('true');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();
            idElem = $("[name='Researcharticle.0.id']");
            userIdElem = $("[name='Researcharticle.0.applicant_id']");
            if(gradeTable.find('tbody > tr').length > 1 && $(this).closest('tr').find('td:first-child input:first-child').attr('name') != 'data[Researcharticle][0][id]') {
                $(this)
                    .closest('tr')
                    .fadeOut('fast', function() {
                        $(this).remove();
                    });
            }
            
            $("#modified_articles").val('true');
        });

        if (numberRows === 0) {
            gradeTable.find('a.add').click();
        }
        
        $('#formSubmit').on('click', function(e){
            //e.preventDefault();
            
            /*$('#grade-table > tbody > tr').each(function(i, row) {
                var str = '<input type="hidden" name="data[Education][' + (numberRows - 1) + '][counter]" value="' + i + '" id="Education' + (numberRows - 1) + 'Counter">';
                $(this).find('td:first-child').append(str);
            });*/
        });
});



