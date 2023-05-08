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

const editor = ace.edit("my-editor-python");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/c_cpp");
editor.setValue('print("Hello World")', -1);

const consoleElement = document.getElementById("console");

async function runCode() {
    consoleElement.textContent = "";
    const code = editor.getValue();
    fetch("https://api.paiza.io/runners/create", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        source_code: code,
        language: "python3",
        api_key: "guest"
    })
    })
    .then(response => response.json())
    .then(async data => {
        const statusCheckURL = `https://api.paiza.io/runners/get_status?id=${data.id}&api_key=guest`;

        while (true) {
        const statusResponse = await fetch(statusCheckURL);
        const statusData = await statusResponse.json();

        if (statusData.status === "completed") {
            const detailsURL = `https://api.paiza.io/runners/get_details?id=${data.id}&api_key=guest`;
            const detailsResponse = await fetch(detailsURL);
            const detailsData = await detailsResponse.json();

            consoleElement.textContent += detailsData.stdout + "\n";
            break;
        }

        await new Promise(resolve => setTimeout(resolve, 1000));
        }
    })
    .catch(error => {
        console.error("Erreur :", error);
    });
}