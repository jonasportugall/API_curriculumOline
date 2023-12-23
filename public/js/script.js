function screamClean(){
    $('.form-cartaApresentacao').hide();
    $('.form-curriculum').hide();
    $('#contentOption').hide();
}


function changeContent(text){

    screamClean();

    $('#contentOption').show();

    var contentOption = document.getElementById('contentOption');
    contentOption.style.color = 'white';
    contentOption.innerText = text;

    
}

document.getElementById('contentOption').addEventListener('click', function(){
    window.location.href = '/curriculum';
});


function toggleForm(formId){
    screamClean();
    $('.'+formId).show();
    

    var subForm = document.getElementById(formId);
    if (subForm.style.display === 'none' || subForm.style.display === ''){
        subForm.style.display = 'block';
    } else {
        subForm.style.display = 'none';
    }

   

}

function toggleSubForm(sectionId) {
    var subForm = document.getElementById(sectionId);
    if (subForm.style.display === 'none' || subForm.style.display === ''){
        subForm.style.display = 'block';
    } else {
        subForm.style.display = 'none';
    }
}