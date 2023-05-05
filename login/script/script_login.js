const Btheme = document.getElementById('theme');
const CSShero = document.getElementById("hero");

Btheme.addEventListener('click', (e) => {
    if (Btheme.innerHTML === '<span class="material-symbols-outlined">dark_mode</span>') {
        Btheme.innerHTML = '<span class="material-symbols-outlined">light_mode</span>';
        CSShero.style.background = "linear-gradient(-45deg, #530808, #870505, #1e1b1b, #000000, #160265, #06025c)";
        CSShero.style.animation = "gradient 10s ease infinite";
        CSShero.style.backgroundSize = "400% 400%";
        Btheme.style.color = "#000000";
        Btheme.style.background = "linear-gradient(-90deg, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #000000, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff)";
        Btheme.style.border = "2px solid #000000";
        Btheme.style.webkitTextStroke = "1px #000000";
        Btheme.style.backgroundSize = "400% 400%";
    } else if (Btheme.innerHTML === '<span class="material-symbols-outlined">light_mode</span>') {
        Btheme.innerHTML = '<span class="material-symbols-outlined">dark_mode</span>';
        CSShero.style.background = "linear-gradient(-45deg, #e7bc2f, #e86209, #52df57, #19aa0b, #1891bd, #2920e0)";
        CSShero.style.animation = "gradient 10s ease infinite";
        CSShero.style.backgroundSize = "400% 400%";
        Btheme.style.color = "#ffffff";
        Btheme.style.background = "linear-gradient(-90deg, #000000, #000000, #000000, #000000, #000000, #000000, #000000,#000000, #000000, #ffffff, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000)";
        Btheme.style.border = "2px solid #ffffff";
        Btheme.style.webkitTextStroke = "1px #ffffff";
        Btheme.style.backgroundSize = "400% 400%";
    };
});

Btheme.addEventListener("mouseover", function() {
    if (Btheme.innerHTML === '<span class="material-symbols-outlined">dark_mode</span>') {
        Btheme.style.color = "#000000";
        Btheme.style.background = "linear-gradient(-90deg, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #000000, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff)";
        Btheme.style.border = "2px solid #000000";
        Btheme.style.webkitTextStroke = "1px #000000";
        Btheme.style.backgroundSize = "400% 400%";
    } else if (Btheme.innerHTML === '<span class="material-symbols-outlined">light_mode</span>') {
        Btheme.style.color = "#ffffff";
        Btheme.style.background = "linear-gradient(-90deg, #000000, #000000, #000000, #000000, #000000, #000000, #000000,#000000, #000000, #ffffff, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000)";
        Btheme.style.border = "2px solid #ffffff";
        Btheme.style.webkitTextStroke = "1px #ffffff";
        Btheme.style.backgroundSize = "400% 400%";  
    };
});

Btheme.addEventListener("mouseout", function() {
    if (Btheme.innerHTML === '<span class="material-symbols-outlined">light_mode</span>') {
        Btheme.style.color = "#000000";
        Btheme.style.background = "linear-gradient(-90deg, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #000000, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff, #ffffff)";
        Btheme.style.border = "2px solid #000000";
        Btheme.style.webkitTextStroke = "1px #000000";
        Btheme.style.backgroundSize = "400% 400%";
    } else if (Btheme.innerHTML === '<span class="material-symbols-outlined">dark_mode</span>') {
        Btheme.style.color = "#ffffff";
        Btheme.style.background = "linear-gradient(-90deg, #000000, #000000, #000000, #000000, #000000, #000000, #000000,#000000, #000000, #ffffff, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000, #000000)";
        Btheme.style.border = "2px solid #ffffff";
        Btheme.style.webkitTextStroke = "1px #ffffff";
        Btheme.style.backgroundSize = "400% 400%";  
    };
});