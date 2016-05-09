$(document).ready(function () {
       
    var
        gradeTable = $('#grade-table'),
        gradeBody = gradeTable.find('tbody'),
        gradeTemplate = _.template($('#grade-template').remove().text()),
        numberRows = gradeTable.find('tbody > tr').length;

    gradeTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();
            
            $(gradeTemplate({key: numberRows++}))
                .hide()
                .appendTo(gradeBody)
                .fadeIn('fast');
            if(numberRows > 1) {
                var attri1 = 'input[name$="data[Experience][0][applicant_id]"]';
                var attri2 = 'input[name$="data[Experience][' + (numberRows - 1) +  '][applicant_id]"]';
                var attri3 = 'input[name$="data[Experience][' + (numberRows - 1) +  '][id]"]';
                if($(attri2))
                    $(attri2).val($(attri1).val());
                $(attri3).remove();
            }
            else {
                var attri1 = 'input[name$="data[Experience][0][applicant_id]"]';
                if($(attri1))
                    $(attri1).val($('#glob_userId').val());
            }
            $("#modified").val('true');
            var attri1 = 'input[name$="data[Experience]['+ (numberRows - 1) + '][from_date]"]';
            var attri2 = 'input[name$="data[Experience]['+ (numberRows - 1) + '][to_date]"]';
            var attri3 = 'input[name$="data[Experience]['+ (numberRows - 1) + '][no_of_yrs_mnths_days]"]';
            
            $(attri1).on('focusout', function(){
                dateFormatCheck(attri1);
            });
            $(attri2).on('focusout', function(){
                dateFormatCheck(attri2);
            });
            $(attri3).on('focusin', function(){
                calcuateDiff(attri1, attri2, attri3);
            });
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();
            idElem = $("[name='Experience.0.id']");
            userIdElem = $("[name='Experience.0.applicant_id']");
            if(gradeTable.find('tbody > tr').length > 1 && $(this).closest('tr').find('td:first-child input:first-child').attr('name') != 'data[Experience][0][id]') {
                $(this)
                    .closest('tr')
                    .fadeOut('fast', function() {
                        $(this).remove();
                        numberRows--;
                    });
            }
            
            $("#modified").val('true');
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