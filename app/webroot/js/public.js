formatSelectBox('department');

$('.delete-row').click(function(e){
    if (confirm('Are U sure ? Some infor will be delete')) {
        location.href = $(this).attr('href');
    }
    e.preventDefault;
});

function formatSelectBox(id) {
    $('#' + id).select2({
        minimumResultsForSearch: -1
    });
}

function getData () {
    var data = {
        keyword    : $('#keyword').val()
    };
    return data;
}

function sendData() {
    var data = getData();
    var form = $('#page_size').attr('page-form');
    $.ajax({
        url:  form+"/search",
        method: "POST",
        beforeSend: function () {
            $('#result').html('<span><img src="images/loader6.gif"></span>');
        },
        data: data,
        success: function (response) {
            $('#result').html(response);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert(textStatus);
        }
    });
}


$('.searchbtn').click(function(e) {
    sendData();
    e.preventDefault();
});

