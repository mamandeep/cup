$(document).ready(function () {
    /* var i=1;
    $("#addrow").click(function () {    
        $("#education_table tr").eq(1).clone().find("input textarea").each(function () {
            $(this).attr({
                'id': function (_, id) {
                    var newId = id.replace(/\d/g, i);
                    return newId;
                },
                'name': function (_, name) {
                    var newName = name.replace(/\d/,i);
                    return newName;
                },
                'value': function (_, value) {
                    if(value && value.match(/Delete/))
                        return 'Delete';
                    return '';
                }
            });
        }).end().appendTo("#education_table tbody");
        i++;
    });
    
    $('table').on('click', 'input[type="button"]', function(e){
        if ($('#education_table tbody tr').length == 2) {
            return;
        }
        $(this).closest('tr').remove();
    });*/
    
    /*
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
                var attri1 = 'input[name$="data[Education][0][user_id]"]';
                var attri2 = 'input[name$="data[Education][' + (numberRows - 1) +  '][user_id]"]';
                var attri3 = 'input[name$="data[Education][' + (numberRows - 1) +  '][id]"]';
                if($(attri2))
                    $(attri2).val($(attri1).val());
                $(attri3).remove();
            }
            else {
                var attri1 = 'input[name$="data[Education][0][user_id]"]';
                if($(attri1))
                    $(attri1).val($('#glob_userId').val());
            }
            $("#modified").val('true');
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();
            idElem = $("[name='Education.0.id']");
            userIdElem = $("[name='Education.0.user_id']");
            if(gradeTable.find('tbody > tr').length > 1 && $(this).closest('tr').find('td:first-child input:first-child').attr('name') != 'data[Education][0][id]') {
                $(this)
                    .closest('tr')
                    .fadeOut('fast', function() {
                        $(this).remove();
                    });
            }
            
            $("#modified").val('true');
        });

        if (numberRows === 0) {
            gradeTable.find('a.add').click();
        }*/
        
        //$('#formSubmit').on('click', function(e){
            //e.preventDefault();
            
            /*$('#grade-table > tbody > tr').each(function(i, row) {
                var str = '<input type="hidden" name="data[Education][' + (numberRows - 1) + '][counter]" value="' + i + '" id="Education' + (numberRows - 1) + 'Counter">';
                $(this).find('td:first-child').append(str);
            });*/
        //});
});