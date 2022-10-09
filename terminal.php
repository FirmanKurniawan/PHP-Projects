<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MarioSecurity</title>

</head>

<body>

  <style>

      @import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;600&display=swap');

* {

    padding: 0 ;

    margin: 0 ;

    box-sizing: border-box ;

    outline: none ;

}

:root {

    --background : #4A4F74 ;

    --background : hsl(220, 12%, 17%) ;

    --title-bar  : hsl(220, 12%, 17%) ;

}

html {

    /* font-family: 'Ubuntu Mono', monospace; */

    font-family: 'Ubuntu Mono', monospace;

    font-family: 'Roboto Mono', monospace;

    font-size: 14px ;

}

.wrapper {

    position: absolute ;

    width : 100vw ;

    height: 100vh ;

    top: 0 ;

    left: 0 ;

    display: flex ;

    align-items: center ;

    justify-content: center ;

    flex-direction:column;

    background-color: #FFCC7C ;

}

.hint {

    color:#fff;

    margin-top:2rem;

    max-width:60%;

    text-align:center;

}

#virtual-terminal {

    width : 90vmin ;

    height: 60vmin ;

    display: flex ;

    flex-direction: column ;

    border-radius: 8px ;

    overflow: hidden ;

    box-shadow: 0 2px 4px rgba(0,0,0,.35) , 0 10px 20px rgba(0,0,0,.15);

}

#virtual-terminal > .title-bar {

    width : 100% ;

    height: 2.5rem ;

    flex: 0 0 2.5rem ;

    background-color: var(--title-bar) ;

    display: flex ;

    align-items: center ;

    justify-content: flex-end ;

}

#virtual-terminal > .title-bar > .title {

    flex: 1 ;

    line-height: 2rem ;

    color: #fff ;

    padding-left: 1rem ;

    font-size: 0.85rem ;

    font-weight: 500 ;

    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif ;

}

#virtual-terminal > .title-bar > .dot {

    width : 0.75rem ;

    height: 0.75rem ;

    border-radius: 50% ;

    background-color: #fff ;

    margin-right: 0.8rem ;

}

#virtual-terminal > .title-bar > .dot:nth-last-of-type(3) {

    background-color: #FA9A94 ;

}

#virtual-terminal > .title-bar > .dot:nth-last-of-type(2) {

    background-color: #FFDC89 ;

}

#virtual-terminal > .title-bar > .dot:nth-last-of-type(1) {

    background-color: #71E096 ;

}

#virtual-terminal > .terminal-io {

    position: relative ;

    flex: 1 ;

    padding: 0.75rem 1rem 5rem 1rem;

    background-color: var(--background) ;

    overflow: auto ;

}

.terminal-io::-webkit-scrollbar {

    -webkit-appearance: none ;

    appearance: none ;

    width: 0.3rem ;

}

.terminal-io::-webkit-scrollbar-thumb {

    -webkit-appearance: none ;

    appearance: none ;

    width: 0.25rem ;

    height: 1rem ;

    background-color: hsl(220, 12%, 30%) ;

}

#virtual-terminal .terminal-io .o-line,

#virtual-terminal .terminal-io .i-line {

    width: 100% ;

    line-height: 1.3 ;

    color: hsl(220, 12%, 70%) ;

}

#virtual-terminal .terminal-io .o-line .badge {

    font-size: 0.75rem ;

    text-transform: uppercase ;

    padding: 0.15rem 1.5ch 0.2rem 1.5ch ;

    border-radius: 4px ;

    margin-right: 1ch ;

    font-weight: 700 ;

    letter-spacing: 1px ;

    line-height: 2;

}

#virtual-terminal .terminal-io .o-line .error {

    background-color: hsl(4, 92%, 65%) ;

    color: #fff ;

}

#virtual-terminal .terminal-io .o-line .info {

    color: #fff ;

    background-color: hsl(197, 90%, 54%);

}

#virtual-terminal .terminal-io .o-line .pre-wrap {

    white-space: pre ;

}

#virtual-terminal .terminal-io .i-line .prompt {

    display: inline-block ;

    color: hsl(197, 90%, 54%) ;

    font-weight: 600 ;

    margin-right: 1ch ;

}

#virtual-terminal .terminal-io .i-line .stdin {

    display: inline-block ;

    font-size: 1rem ;

    margin: 0 ;

    border:0;

    background-color:transparent;

    color: hsl(220, 12%, 70%) ;

}

  </style>  <div class="wrapper">

        <div id="virtual-terminal">

            <div class="title-bar">

                <div class="title" id="terminalTitle">MarioSecurity</div>

                <div class="dot"></div>

                <div class="dot"></div>

                <div class="dot"></div>

            </div>

            <div class="terminal-io" id="terminalWindow">

                <!-- <input type="text" id="test"> -->

            </div>

        </div>

        <div class="hint">Use help command for info about all the commands</div>

    </div>

    <script>

        const VirtualTerminalIO = (()=>{

    let terminal ;

    let terminalWindow ;

    let terminalTitle ;

    function init(terminalSelector){

        terminal = document.querySelector(terminalSelector) ;

        if(!terminal)

            console.error("Given selector dosent mathch any element");

        terminalWindow = terminal.querySelector("#terminalWindow");

        terminalTitle  = terminal.querySelector("#terminalTitle");

        terminalWindow.addEventListener("click",()=>{

            let activestdin = terminalWindow.querySelector(`[contenteditable="true"]`);

            if(activestdin){

                activestdin.focus();

            }

        })

    }

    function printLine(message,badge="",wrapping=""){

        let line = document.createElement("div");

        line.classList.add("o-line");

        if(badge)

            line.innerHTML += `<span class="badge ${badge}">${badge}</span>` ;

        line.innerHTML += `<span class="message ${wrapping ? "pre-wrap" : ""}">${message}</span>` ;

        terminalWindow.append(line);

        return line;

    }

    function stdin(prompt=">"){

        let line = document.createElement("div");

        line.classList.add("i-line");

        line.innerHTML = `<span class="prompt">${prompt}</span>` ;

        let input = document.createElement("input");

        input.contentEditable = "true" ;

        input.type = "text" ;

        input.classList.add("stdin");

        let stdInputPromise = new Promise((resolve,reject) => {

            input.addEventListener("keydown",(e)=>{

                if(e.key == "Enter") {

                    e.preventDefault();

                    e.target.contentEditable = false ;

                    e.target.blur();  

                    resolve(e.target.value);

                }

            });

        });

        line.appendChild(input);

        terminalWindow.append(line);

        input.focus();

        return stdInputPromise ;

    }

    function stdout(output,wrapping=""){

        let line = printLine(output,"",wrapping);

        return line ;

    }

    function stderr(error){

        printLine(error,"error");

    }

    function stdinfo(info){

        printLine(info,"info");

    }

    function progress(duration = 5000,stepsize = 200,label=""){

        duration = parseInt(duration)

        stepsize = parseInt(stepsize)

        if(!duration) duration = 5000

        if(!stepsize) stepsize = duration/100

        let line = stdout(`${label} [....................] 0%`);

        let message = line.querySelector(".message");

        

        let step = 100 * stepsize / duration ;

        let progressComplete = new Promise((resolve) => {

            let v = 0 ;

            let clock = setInterval(() => {

                v += step ;

                let percentage = Math.floor(v);

                let h = Math.floor(v*20/100) ;

                let d = 20 - h; 

                message.innerText = `${label} [${"#".repeat(h)}${".".repeat(d)}] ${percentage}%`;

                if(v >= 100) {

                    clearInterval(clock);

                    message.innerText = `${label} [${"#".repeat(h)}${".".repeat(d)}] 100%` ;

                    resolve();

                }

            },stepsize)

            

        })

        return progressComplete ;

    }

    function clear(){

        terminalWindow.innerHTML = "" ;

    }

    function setTitle(title = "MarioSecurity") {

        terminalTitle.innerText = title ;

    }

    return {

        init,

        stderr,

        stdin,

        stdout,

        stdinfo,

        progress,

        clear,

        setTitle

    }

})();

const AsciiTable = (()=>{

    class table {

        constructor(){

            this.rows = []  ;

        }

        addRow(...row){

            this.rows.push(row);

        }

        getTable(){

            // calc row width

            let colWidth = [] ;

            this.rows.forEach((row,r) => {

                row.forEach((col,c)=>{

                    if(!colWidth[c] || col.length > colWidth[c]) {

                        colWidth[c] = col.length ;

                        return;

                    }

                })

            });

            // draw horizontal divider

            let dividerH = "+" ;

            colWidth.forEach(len => {

                dividerH += "-".repeat(len+2) + "+" ;

            })

            let output = [`${dividerH}`]

            

            this.rows.forEach(row => {

                let formatedRow = "|" ;

                row.forEach((col,c) => {

                    formatedRow += " " + col.padEnd(colWidth[c]) + " |" ;

                })

                output.push(formatedRow);

                output.push(`${dividerH}`);

            });

            output.forEach(line => {

                VirtualTerminalIO.stdout(line,"pre");

            })

        }

        

    } 

    function createTable(){

        return new table();

    }

    return{

        createTable 

    }

})();

const VirtualTerminalShell = (()=>{   

    const IO = VirtualTerminalIO ;

    let shellPrompt = "root@mariosecurity:-$";

    const cmdList = {};

    const shell = {

        activateShell,

        registerProgram,

        IO,

        cmdList,

        sleep

    };

    function sleep(milliseconds) {

        const date = Date.now();

        let currentDate = null;

        do {

          currentDate = Date.now();

        } while (currentDate - date < milliseconds);

    }

    function registerProgram(cmd,cmdData){

        cmdList[cmd] = cmdData ;

    }

    async function exec(cmdline=""){

        let cleanCmd = cmdline.trim().replace(/\s\s+/g, " ").split(" ");

        let cmd = cleanCmd[0];

        let params = cleanCmd.slice(1);

        let programFinish = new Promise((resolve,reject) => {

            if(cmd in cmdList){

                cmdList[cmd].run(params,shell,resolve,reject);

            } else {

                IO.stderr(`'${cmd}' is not recognized as an internal or external command`);

                resolve();

            }

        })

       

        return programFinish ;

    }

    

    async function activateShell(){

        for(;;){

            let cmdinp = IO.stdin(shellPrompt);

            let cmdline = await cmdinp ;

            if(cmdline)

                await exec(cmdline) ;

        }

    }

    

    return shell;

})();

VirtualTerminalShell.registerProgram("echo",{

    run : (params,shell,resolve,reject) => {

        shell.IO.stdout(params.join(" "))

        resolve();

    },

    doc : `echos text in the command line`,

    syntax : `echo $message`

});

VirtualTerminalShell.registerProgram("help",{

    run : (params,shell,resolve,reject) => {

        if(params.length == 0) {

            let table = AsciiTable.createTable();

            table.addRow("command name","command syntax");

            for(cmd in shell.cmdList){

                // console.log(cmd);

                table.addRow(cmd,shell.cmdList[cmd].syntax);

            }

            let output = table.getTable();

            // console.log(output)

        }

        params.forEach(param => {

            if(param in shell.cmdList){

                shell.IO.stdinfo(param);

                shell.IO.stdout(shell.cmdList[params].syntax);

                shell.IO.stdout(shell.cmdList[params].doc);

            } else {

                shell.IO.stderr(`${param} is not recognized as an internal or external command`);

            }

        });

        resolve();

    },

    doc : `echos text in the command line`,

    syntax : `help $cmd-name[optional]`

});

VirtualTerminalShell.registerProgram("info",{

    run : (params,shell,resolve,reject) => {

        shell.IO.stdinfo(params.join(" "))

        resolve();

    },

    doc : `echos text in the command line`,

    syntax : `info $info-message`

});

VirtualTerminalShell.registerProgram("progress",{

    run : (params,shell,resolve) => {

        shell.IO.progress(params[0],params[1],params[2]).then(()=>{

            resolve();

        });

    },

    doc : `echos text in the command line`,

    syntax : `progress $duration $update $lable `

});

VirtualTerminalShell.registerProgram("input",{

    run : (params,shell,resolve,reject) => {

        shell.IO.stdin(params[0]).then(()=>{

            resolve();

        });

    },

    doc : `echos text in the command line`,

    syntax : `input $prompt`

});

VirtualTerminalShell.registerProgram("clear",{

    run : (params,shell,resolve,reject) => {

        shell.IO.clear();

        resolve();

    },

    doc : `echos text in the command line`,

    syntax : `clear`

});

VirtualTerminalShell.registerProgram("title",{

    run : (params,shell,resolve,reject) => {

        shell.IO.setTitle(params.join(" "));

        resolve();

    },

    doc : `changes title of the terminal`,

    syntax : `title %new-title%`

});

VirtualTerminalShell.registerProgram("jscli",{

    run :async (params,shell,resolve,reject) => {

        shell.IO.progress(1000,100,"Loading JS").then(async ()=>{

            shell.IO.stdinfo("JavaScript Session Active");

            shell.IO.stdout("Now you can use normal JS Expressions in terminal. [try : 2+2] Type exit to exit");

            for(;;){

                let cmdinp = shell.IO.stdin(">>>");

                let cmdline = await cmdinp ;

                if(cmdline == "exit") {

                    resolve();

                    return ;

                }

                try{

                    let output = await eval(cmdline) ;

                    shell.IO.stdout(output);

                } catch(error) {

                    shell.IO.stderr(error);

                }

            }

        });

    },

    doc : `Starts a JavaScript Terminal Session`,

    syntax : `jscli`

});

window.onload = () =>{

    VirtualTerminalIO.init("#virtual-terminal");

    VirtualTerminalShell.activateShell();

};

    </script>

</body>

</html>
