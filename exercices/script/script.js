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

// def main():
//     print("Hello World !")
//     bite()

// def bite():
//     print("Hey")
//     var = 0
//     ma_bite = "petite"
//     ma_bite = "horrible"
//     msg = ma_bite + " " + var
//     print(msg)
//     print("1)" + ma_var +" " + var)
//     print(var +" +  "+ var)
//     print(ma_var+"+"+var+";")
//     print(ma_var)

// main()

function createEditors(editor, code){
    switch(editor.id){
        case "my-editor-python":
            editorPython = ace.edit("my-editor-python");
            editorPython.setTheme("ace/theme/monokai");
            editorPython.session.setMode("ace/mode/python");
            if(code){
                editorPython.setValue(code, -1);
            }else{
                editorPython.setValue('print("Hello World !")', -1);
            }
            break;
        case "my-editor-c":
            editorC = ace.edit("my-editor-c");
            editorC.setTheme("ace/theme/monokai");
            editorC.session.setMode("ace/mode/c_cpp");
            if(code){
                editorC.setValue(code, -1);
            }else{
                editorC.setValue('#include <stdio.h>\n\nint main(){\n    printf("%s", "Hello World !");\n    return 0;\n}', -1);
            }
            break;
        default: break;
    }
}

function getCodeSaved(language, exercice_id) {
    var params = new URLSearchParams();
    params.append('language', language);
    params.append('exercice_id', exercice_id);

    fetch('../../../../fetch/load_saved_code.php', {
        method: 'POST',
        body: params,
        credentials: 'include'
    }).then(response => response.text())
    .then(response => {
        createEditors(document.getElementsByClassName("editor")[0], response);
    });
}

getCodeSaved(document.querySelector(".title_language").getAttribute("data"), document.querySelector("#execute").getAttribute("data"));

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

function findFunctionName(code){
    let regex = /def\s+([a-zA-Z_][a-zA-Z0-9_]*)\s*\(/g;
    let match;
    let functions = [];
    while (match = regex.exec(code)) {
        functions.push(match[1]);
    }
    return functions;
}

function findStringPrint(code){
    let regex = /print\((.*)\)/g;
    let match;
    let stringsPrint = [];
    while (match = regex.exec(code)) {
        stringsPrint.push(match[1]);
    }
    
    return stringsPrint;
}

function findVariable(code){
    let regex = /(\w+)\s*=\s*(.+)/g;
    let match;
    let variables = [];
    while (match = regex.exec(code)) {
        var variable = {
            Var : match[1],
            Value : match[2].trim()
        }
        variables.push(variable);
    }
    return variables;
}

function splitString(str) {
    const operators = ['+'];
    let result = [];
    let buffer = "";
    let inString = false;
    var loop = 0;
    for(let i = 0; i < str.length; i++) {
        if(str[i] === '"') {
            buffer += str[i];
            if(inString) {
                result.push(buffer.trim());
                buffer = "";
            }
            inString = !inString;
            loop = 1;
        }
        else if(operators.includes(str[i]) && !inString) {
            if(buffer.trim() !== "") {
                result.push(buffer.trim());
                buffer = "";
            }
            result.push(str[i].trim());
            loop = 2;
        } else {
            buffer += str[i];
            loop = 3;
        }
    }

    if(buffer.trim() !== "") {
        result.push(buffer.trim());
    }

    // Filter out "+" strings
    result = result.filter(item => item !== "+");

    return result;
}

function splitStringPrint(stringsPrint){
    var stringsPrintFinal = [];
    stringsPrint.forEach(string => {
        var stringPrint = [];
        splitString(string).forEach(str => {
            var stringfinal = {
                type : "",
                value : ""
            };
            if ((str.startsWith("'") || str.startsWith('"')) && (str.endsWith("'") || str.endsWith('"'))){
                stringfinal.type = "string";
                stringfinal.value = str.replace(/['"]+/g, '');
            }else{
                stringfinal.type = "variable";
                stringfinal.value = str;
            }
            stringPrint.push(stringfinal);
        });
        stringsPrintFinal.push(stringPrint);
    });
    return stringsPrintFinal;
}

function reconstituteStrings(stringsPrint, variables) { 
    var strings = [];
    stringsPrint.forEach(stringPrint => {
        string = "";
        stringPrint.forEach(str => {
            if(str.type == "string"){
                string += str.value;
            }else{
                variables.forEach(variable => {
                    if(variable.Var == str.value){
                        string += variable.Value;
                    }
                });
            }
        });
        strings.push(string);
    });

    console.log(strings);
}

function DenyFraude(code){ 
    var functions = findFunctionName(code);
    var stringsPrint = splitStringPrint(findStringPrint(code));
    var variables = findVariable(code);
    reconstituteStrings(stringsPrint, variables);
    console.log(variables);

    fetch('https://api.openai.com/v1/engines/gpt-3.5-turbo/completions', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer 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',
        },
        body: JSON.stringify({
            prompt: "Translate the following English text to French: '{}'",
            max_tokens: 60
        }),
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch((error) => {
        console.error('Error:', error);
    });

    return 0; 
}

function SaveCode(code, language, exercice_id) {

    var params = new URLSearchParams();
    params.append('language', language);
    params.append('code', code);
    params.append('exercice_id', exercice_id);

    fetch('../../../../fetch/save_code.php', {
        method: 'POST',
        body: params,
        credentials: 'include'
    })
}

// recupérer noms des variables + noms des fonctions



function SendCodeVerif(code, language){
    if(language == 'python3'){
        code = 'import ast\n\nclass AssignmentVisitor(ast.NodeVisitor):\n    def visit_Assign(self, node):\n        for target in node.targets:\n            if isinstance(target, ast.Name):\n                print(f"{target.id} : {ast.dump(node.value)}")\n        self.generic_visit(node)\n\ncode = """'
                + code + '"""\n\ntree = ast.parse(code)\nAssignmentVisitor().visit(tree)';
    }

    console.log(code, language);

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
        
            console.log(detailsData.stdout);
            if (detailsData.build_stderr) {
                console.log("Build Error: \n" + detailsData.build_stderr + "\n");
            }
            if (detailsData.stderr) {
                console.log("Runtime Error: \n" + detailsData.stderr + "\n");
            }
            break;
        }

        await new Promise(resolve => setTimeout(resolve, 1000));
        }
    })
}

async function runCode(exercice_id) {

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
            
            //DenyFraude(code);
            SaveCode(code, document.querySelector(".title_language").getAttribute("data"), exercice_id);
            //SendCodeGPT(code, language);
            text = "";
            text += detailsData.stdout + "\n";
            if (detailsData.build_stderr) {
                text += "Build Error: \n" + detailsData.build_stderr + "\n";
            }
            if (detailsData.stderr) {
                text += "Runtime Error: \n" + detailsData.stderr + "\n";
            }

            consoleElement.textContent = text;
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