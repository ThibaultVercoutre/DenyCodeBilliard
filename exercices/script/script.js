document.addEventListener('DOMContentLoaded', function () {
    const accordionsHeader = document.querySelectorAll('.accordion-header');
    const accordionsContent = document.querySelectorAll('.accordion-content');

    for(let i = 0; i < accordionsHeader.length; i++) {
        accordionsHeader[i].addEventListener('click', function () {
            if(accordionsContent[i].style.display == 'block') {
                accordionsContent[i].style.display = 'none';
            }else {
                accordionsContent[i].style.display = 'block';
            }
        });
    };

});