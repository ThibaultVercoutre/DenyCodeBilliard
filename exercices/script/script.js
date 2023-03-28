document.addEventListener('DOMContentLoaded', function () {
    const accordionsHeader = document.querySelectorAll('.accordion-header');
    const accordionsContent = document.querySelectorAll('.accordion-content');

    for(let i = 0; i < accordionsHeader.length; i++) {
        accordionsHeader[i].addEventListener('click', function () {
            accordionsContent[i].classList.toggle('show');
        });
    };

});

function create_color(){
    var code = document.querySelectorAll(".codes_ex");
    console.log(code);
    
    console.log(code[code.length-1].innerHTML, code[code.length-1-1].innerHTML);
    for(let i = code.length-1; i > 0; i--){
        const searchString = "def get_shopping_list()";
        const replacement = "<strong>$&</strong>";
        
        code[i].innerHTML = code[i].innerHTML.replace(new RegExp(searchString, 'g'), replacement);
    }
}

create_color();