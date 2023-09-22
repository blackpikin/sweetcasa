//Functionality functions
function ClassMasterSheet(){
    let year = $('#year').val();
    let cls = $('#c_name').val();
    let exam = $('#exam').val();
    if(year !== "" && cls !== "" && exam !== ""){
        window.location.href = 'index.php?p=mockClassSheet&year_id='+year+'&class_id='+cls+'&exam_id='+exam;
    }else{
        alert("You must select the three parameters: year, class and exam");
    }
}

function MasterSheet(){
    let year = $('#year').val();
    let cls = $('#c_name').val();
    let exam = $('#exam').val();
    if(year !== "" && cls !== "" && exam !== ""){
        window.location.href = 'index.php?p=mockMasterSheet&year_id='+year+'&class_id='+cls+'&exam_id='+exam;
    }else{
        alert("You must select the three parameters: year, class and exam");
    }
}

function MockStats(){
    let year = $('#year').val();
    let cls = $('#c_name').val();
    let exam = $('#exam').val();
    if(year !== "" && cls !== "" && exam !== ""){
        window.location.href = 'index.php?p=mockStatistics&year_id='+year+'&class_id='+cls+'&exam_id='+exam;
    }else{
        alert("You must select the three parameters: year, class and exam");
    }
}

function MockReport(){
    let year = $('#year').val();
    let cls = $('#c_name').val();
    let exam = $('#exam').val();
    if(year !== "" && cls !== "" && exam !== ""){
        window.location.href = 'index.php?p=MockResults&year_id='+year+'&class_id='+cls+'&exam_id='+exam;
    }else{
        alert("You must select the three parameters: year, class and exam");
    }
}

function SequenceStatPDF(){
    let year = $('#year').val();
    let cls = $('#c_name').val();
    let exam = $('#exam').val();
    if(year !== "" && cls !== "" && exam !== ""){
        window.open('./pdf/sequenceStatsPdf.php?year_id='+year+'&subject='+cls+'&exam_id='+exam, '_blank');
    }else{
        alert("You must select the three parameters: year, class and exam");
    }
}
function SequenceStats(){
    let year = $('#year').val();
    let cls = $('#c_name').val();
    let exam = $('#exam').val();
    if(year !== "" && cls !== "" && exam !== ""){
        $.ajax({
            type: "POST",
            url: "./html/ajax.php",
            data: {Year:year, klass:cls, Exam:exam, 'action':"SequenceStats"},
            dataType: 'html',
            success: function (data) {
                $('#class_list').html(data);
            },
            error: function () {
                console.log(Error().message);
            }
        });
    }else{
        alert("You must select the three parameters: year, class and exam");
    }
}

function SequenceReport(){
    let year = $('#year').val();
    let cls = $('#c_name').val();
    let exam = $('#exam').val();

    if(year !== "" && cls !== "" && exam !== ""){
        window.open('index.php?p=generateTermRep&year_id='+year+'&class_id='+cls+'&exam_id='+exam);
    }else{
        alert("You must select the three parameters: year, class and exam");
    }
    
}

function TermReport(){
    let year = $('#term_year').val();
    let cls = $('#term_class').val();
    let term = $('#term_term').val();

    if(year !== "" && cls !== "" && term !== ""){
        window.open('index.php?p=TermReport&year_id='+year+'&class_id='+cls+'&term_id='+term);
    }else{
        alert("You must select the three parameters: year, class and term");
    }
    
}

function GenderStats(elem){
    let year_id = elem.value;
    $.ajax({
        type: "POST",
        url: "./html/ajax.php",
        data: {Year:year_id, 'action':"GenderStats"},
        dataType: 'html',
        success: function (data) {
            $('#class_list').html(data);
        },
        error: function () {
            console.log(Error().message);
        }
    });
}


function PrintableEnrolment(elem){
    let year_id = elem.value;
    $.ajax({
        type: "POST",
        url: "./html/ajax.php",
        data: {Year:year_id, 'action':"PrintableEnrolment"},
        dataType: 'html',
        success: function (data) {
            $('#class_list').html(data);
        },
        error: function () {
            console.log(Error().message);
        }
    });
}

function PrintableClassList(elem){
    let class_id = elem.value;
    $.ajax({
        type: "POST",
        url: "./html/ajax.php",
        data: {classID:class_id, 'action':"PrintableClassList"},
        dataType: 'html',
        success: function (data) {
            $('#class_list').html(data);
        },
        error: function () {
            console.log(Error().message);
        }
    });
}

function ShowClassList(class_id, subject){
    $.ajax({
        type: "POST",
        url: "./html/ajax.php",
        data: {classId:class_id, Subject:subject, 'action':"ShowClassList"},
        dataType: 'html',
        success: function (data) {
            $('#c_list').html(data);
        },
        error: function () {
            console.log(Error().message);
        }
    });
}

function SaveMark(elem){
    let student_id = elem.id;
    let mark = elem.value;
    let klas = $('#'+student_id).attr('data-klass');
    let exam = $('#'+student_id).attr('data-exam');
    let subject = $('#'+student_id).attr('data-subject');


    if (mark !== "" && mark !== undefined){
        $.ajax({
            type: "POST",
            url: "./html/ajax.php",
            data: {studentID:student_id, mark:mark, classID:klas, examID:exam, Subject:subject, 'action':"SaveMark"},
            dataType: 'html',
            success: function (data) {
                $('#result').html(data); 
            },
            error: function () {
                console.log(Error().message);
            }
        });
    }
}

function GetAPage(pageName){

    let path = './html/' + pageName;
    fetch(path)
        .then((response) => {
        return response.text();
    })
    .then((html) => {
        document.getElementById('container').innerHTML = html
    });
}

function GotoPage(page){
    window.location = "index.php?p=" + page;
}

function CheckLoggedInUser(){
    let path = './includes/testUser.php';
    fetch(path)
        .then((response) => {
        return response.text();
    })
    .then((html) => {
        document.getElementById('container').innerHTML = html
    });
}

//////// END Functionality Functions///////////////////////
//////////////////////////////////////////////////////////

//Design functions
function SetPointer(elem){
    elem.style.cursor = "pointer";
}
