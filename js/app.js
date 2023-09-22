function LoadQuarters(){
    let city = $('#city').val();
    if(city !== ""){
        $.ajax({
            type: "POST",
            url: "./html/ajax.php",
            data: {City:city, 'action':"LoadQuarters"},
            dataType: 'html',
            success: function (data) {
                $('#quarter').html(data);
            },
            error: function () {
                console.log(Error().message);
            }
        });
    }else{
        alert("Select a city");
    }
}

function Search(){
    let city = $('#city').val();
    let quarter = $('#quarter').val();
    let type = $('#typeof').val();
    let min = $('#min_price').val();
    let max = $('#max_price').val();

    if(city !== "" && quarter !== "" && type !== "" && min !== "" && max !== ""){
        window.open('?p=search&city='+city+'&quarter='+quarter+'&type='+type+'&min='+min+'&max='+max);
    }else{
        alert("Fill all the search parameters");
    }
    
}

function SetPointer(elem){
    elem.style.cursor = "pointer";
}

function GotoPage(page){
    window.location = "?p=" + page;
}

