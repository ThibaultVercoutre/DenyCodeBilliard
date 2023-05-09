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

var editorPython;
var editorC;

function createEditors(editor){
    switch(editor.id){
        case "my-editor-python":
            editorPython = ace.edit("my-editor-python");
            editorPython.setTheme("ace/theme/monokai");
            editorPython.session.setMode("ace/mode/python");
            editorPython.setValue('print("Hello World !")', -1);
            break;
        case "my-editor-c":
            editorC = ace.edit("my-editor-c");
            editorC.setTheme("ace/theme/monokai");
            editorC.session.setMode("ace/mode/c_cpp");
            editorC.setValue('#include <stdio.h>\n\nint main(){\nprintf("%s", "Hello World !");\nreturn 0;\n}', -1);
            break;
        default: break;
    }
}

createEditors(document.getElementsByClassName("editor")[0]);

const consoleElement = document.getElementById("console");

function findLanguage(edit){
    switch(edit.id){
        case "my-editor-python": return "python3";
        case "my-editor-c": return "c";
        default: return "rien";
    }
}

function findEditor(edit){
    switch(edit.id){
        case "my-editor-python": return editorPython;
        case "my-editor-c": return editorC;
        default: return "rien";
    }
}

async function runCode() {

    document.getElementById("chargement_barre").style.animation = "loading 2.5s linear infinite";

    languageEditor = findEditor(document.getElementsByClassName("editor")[0]);
    language = findLanguage(document.getElementsByClassName("editor")[0]);

    consoleElement.textContent = "";
    const code = languageEditor.getValue();
    fetch("https://api.paiza.io/runners/create", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        source_code: code,
        language: language,
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

        document.getElementById("chargement_barre").style.animation = "none";
    })
    .catch(error => {
        console.error("Erreur :", error);
        document.getElementById("chargement_barre").style.animation = "none";
    });
}