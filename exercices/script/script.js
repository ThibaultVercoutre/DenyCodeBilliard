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

//INSERT INTO `functions_verification`(`id_exercice`, `function`, `start_variables`, `end_variables`) VALUES (8, 'test_numero', "['5','7','1','3'],['a']", "(['5', '1', '3', '7'], [])")

function sendTest(verif, language){
    return new Promise((resolve, reject) => {
        //console.log(verif);
        verification = 0;
        fetch("https://api.paiza.io/runners/create", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                source_code: verif[0],
                language: language,
                api_key: "guest"
            })
            })
            .then(data => data.json())
            .then(async data => {
                const statusCheckURL = `https://api.paiza.io/runners/get_status?id=${data.id}&api_key=guest`;

                while (true) {
                const statusResponse = await fetch(statusCheckURL);
                const statusData = await statusResponse.json();

                if (statusData.status === "completed") {
                    const detailsURL = `https://api.paiza.io/runners/get_details?id=${data.id}&api_key=guest`;
                    const detailsResponse = await fetch(detailsURL);
                    const detailsData = await detailsResponse.json();
                                    
                                    
                    if(!(detailsData.build_stderr || detailsData.stderr)){
                        if(detailsData.stdout.replaceAll('\n', '') != verif[1]){
                            console.log('false');
                            resolve(false);
                        }else{
                            console.log('true');
                            resolve(true);
                        }
                    }
                    break;
                }

                await new Promise(resolve => setTimeout(resolve, 1000));
            }
        });
    });
}

async function DenyFraude(functions_separed, language){ 
    // var functions = findFunctionName(code);
    // var stringsPrint = splitStringPrint(findStringPrint(code));
    // var variables = findVariable(code);
    // reconstituteStrings(stringsPrint, variables);
    // console.log(variables);
    
    var test = [];
    for(var function_separed in functions_separed) {
        //console.log(function_separed);
        if(function_separed != "main") {
            params = new URLSearchParams();
            params.append('functions', function_separed);
            params.append('exercice_id', document.querySelector("#title").getAttribute("data"));

            fetch('../../../../fetch/deny_fraude.php', {
                method: 'POST',
                body: params,
                credentials: 'include'
            }).then(response => response.json())
            .then(async response => {
                for(var i = 0; i < response[1].length; i++) {
                    let newCode = functions_separed[response[0]]
                    for(var funct in functions_separed) {
                        if(newCode.includes(funct) && funct != 'main' && funct != response[0]){
                            newCode = functions_separed[funct] + '\n\n' + newCode;
                        }
                    }
                    newCode = `def main():\n    print(${response[0]}(${response[1][i]["start_variables"]}))\n\n` + newCode + '\nmain()';
                    test.push([newCode, response[1][i]["end_variables"]]);
                    if(test.length == 2*(response[1].length + 1)){
                        var variable_test = true;
                        for(var i = 0; i < test.length; i++) {
                            const result = await sendTest(test[i], language);
                            if(!result){
                                variable_test = false;
                            }
                        }
                        if(variable_test){
                            alert("vous avez validé l'exerice !");
                        }else{
                            alert("vous n'avez pas validé l'exerice !");
                        }
                        document.getElementById("chargement_barre").style.animation = "none";
                        document.getElementById("chargement_barre").style.backgroundColor = "dodgerblue";
                    }
                }
                
            });
            
        }
    }
    
    return true; 
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

// separer les fonctions

function SeparateFunct(code, functions){
    var lines = code.split('\n');
    var functionLines = {};
    var currentFunction = null;
    var currentIndent = null;

    for (var i = 0; i < lines.length; i++) {
        var line = lines[i];
        for (var j = 0; j < functions.length; j++) {
            var functionName = functions[j];
            var regex = new RegExp('^\\s*def\\s+' + functionName + '\\s*\\(.*\\):');
            var match = regex.exec(line);
            if (match !== null) {
                currentFunction = functionName;
                currentIndent = line.match(/^(\s*)/)[0].length;
                functionLines[currentFunction] = [];
            }
        }
        if (currentFunction !== null && line.match(/^(\s*)/)[0].length >= currentIndent) {
            functionLines[currentFunction].push(line);
        } else {
            currentFunction = null;
        }
    }
    for (var functionName in functionLines) {
        functionLines[functionName] = functionLines[functionName].join('\n');
    }
    return functionLines;
}

// recupérer noms des variables + noms des fonctions

function SendCodeVerif(code, language, mode){
    if(language == 'python3'){
        code_test = 'import ast\n\n'
            + 'class FunctionVisitor(ast.NodeVisitor):\n'
            + '    def visit_FunctionDef(self, node):\n'
            + '        print(f"{node.name}")\n'
            + '        self.generic_visit(node)'
            + '\n\ncode = """'
            + code + '"""\n\ntree = ast.parse(code)\nFunctionVisitor().visit(tree)';
    }

    fetch("https://api.paiza.io/runners/create", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        source_code: code_test,
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
        
            //console.log(detailsData.stdout);
            if(!(detailsData.build_stderr || detailsData.stderr)){
                var functions_separed = SeparateFunct(code.replace('\nmain()',''), detailsData.stdout.split("\n"));
            }
            //console.log(functions_separed);
            if(mode == 1){
                document.getElementById("chargement_barre").style.backgroundColor = "crimson";
                document.getElementById("chargement_barre").style.animation = "loading 2.5s linear infinite";
                DenyFraude(functions_separed, language).then(result => {
                    
                });
            }else{
                document.getElementById("chargement_barre").style.animation = "none";
            }

            // if (detailsData.build_stderr) {
            //     console.log("Build Error: \n" + detailsData.build_stderr + "\n");
            // }
            // if (detailsData.stderr) {
            //     console.log("Runtime Error: \n" + detailsData.stderr + "\n");
            // }
            break;
        }

        await new Promise(resolve => setTimeout(resolve, 1000));
        }
    })
}

async function runCode(exercice_id, mode) {

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
            
            SaveCode(code, document.querySelector(".title_language").getAttribute("data"), exercice_id);
            SendCodeVerif(code.replace(/""".+?"""/gs, ''), language, mode);
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

        //document.getElementById("chargement_barre").style.animation = "none";
    })
    .catch(error => {
        console.error("Erreur :", error);
        document.getElementById("chargement_barre").style.animation = "none";
    });
}