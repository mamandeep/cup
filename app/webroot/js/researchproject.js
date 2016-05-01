$(document).ready(function () {
    
    var
        gradeTable = $('#rp-table'),
        gradeBody = gradeTable.find('tbody'),
        gradeTemplate = _.template($('#rp-template').remove().text()),
        numberRows = gradeTable.find('tbody > tr').length;

    gradeTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();
            
            $(gradeTemplate({key: numberRows++}))
                .hide()
                .appendTo(gradeBody)
                .fadeIn('fast');
            if(numberRows > 1) {
                var attri1 = 'input[name$="data[Researchproject][0][applicant_id]"]';
                var attri2 = 'input[name$="data[Researchproject][' + (numberRows - 1) +  '][applicant_id]"]';
                var attri3 = 'input[name$="data[Researchproject][' + (numberRows - 1) +  '][id]"]';
                if($(attri2))
                    $(attri2).val($(attri1).val());
                $(attri3).remove();
            }
            else {
                var attri1 = 'input[name$="data[Researchproject][0][applicant_id]"]';
                if($(attri1))
                    $(attri1).val($('#glob_userId').val());
            }
            $("#modified_rp").val('true');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();
            idElem = $("[name='Researchproject.0.id']");
            userIdElem = $("[name='Researchproject.0.applicant_id']");
            if(gradeTable.find('tbody > tr').length > 1 && $(this).closest('tr').find('td:first-child input:first-child').attr('name') != 'data[Researchproject][0][id]') {
                $(this)
                    .closest('tr')
                    .fadeOut('fast', function() {
                        $(this).remove();
                    });
            }
            
            $("#modified_rp").val('true');
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




