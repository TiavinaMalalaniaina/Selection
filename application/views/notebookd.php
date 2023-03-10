<!-- IMPORTATION -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/gestion_projet.css">
<link rel="stylesheet" href="<?php bu('assets/css/blocNote.css')?>">
<meta name="language" content="english">
<meta name="viewport" content="width=device-width">
<meta name="twitter:description" content="Quill is a free, open source rich text editor built for the modern web.">
<meta name="twitter:image" content="https://quilljs.com/assets/images/brand-asset.png">
<meta property="og:type" content="website">
<meta property="og:url" content="https://quilljs.com/standalone/full/">
<meta property="og:image" content="https://quilljs.com/assets/images/brand-asset.png">
<meta property="og:title" content="Full Editor - Quill">
<meta property="og:site_name" content="Quill">
<link rel="canonical" href="https://quilljs.com/standalone/full/">
<link type="application/atom+xml" rel="alternate" href="https://quilljs.com/feed.xml" title="Quill - Your powerful rich text editor" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css" />
<link rel="stylesheet" href="<?php bu('assets/js/quill/quill.snow.css')?>" />
<title>Vos notes</title>
<!-- IMPORTATION -->

<!-- HEADER -->
<?php $this->load->view("templates/header") ?>
<!-- HEADER -->


    <div class="container ">
        <div class="row">
            <div class="col-md-4 listes">
                <h3>Listes de vos notes</h3>
                <div class="list-group" id="notelist">
                    <a  onclick="newest()" class="list-group-item list-group-item-action active" aria-current="true">
                       Nouveau + 
                    </a>
                </div>
            </div>    
            <div class="offset-md-1 col-md-7 notes">
                <div class="entete">
                    <h3 id="notitle">Nouveau</h3>
                    <a href=""><i class="fas fa-trash-alt"></i></a>
                </div>
                <hr>
                <div id="standalone-container">
                    <div id="toolbar-container">
                      <span class="ql-formats">
                        <select class="ql-font"></select>
                        <select class="ql-size"></select>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                      </span>
                      <span class="ql-formats">
                        <select class="ql-color"></select>
                        <select class="ql-background"></select>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-script" value="sub"></button>
                        <button class="ql-script" value="super"></button>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-header" value="1"></button>
                        <button class="ql-header" value="2"></button>
                        <button class="ql-blockquote"></button>
                        <button class="ql-code-block"></button>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-indent" value="-1"></button>
                        <button class="ql-indent" value="+1"></button>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-direction" value="rtl"></button>
                        <select class="ql-align"></select>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                        <button class="ql-formula"></button>
                      </span>
                      <span class="ql-formats">
                        <button class="ql-clean"></button>
                      </span>
                    </div>
                    <form id="form" class="formulaire">
                      <div id="editor-container"></div>
                            <input type="text" class="form-control mt-3" name="title" id="notitleinp">
                            <input type="hidden" name="idnote" id="idnote" value="0">
                            <button class="btn btn-info btn-sm mt-3">Save</button>
                    </form>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
                <script src="<?php bu('assets/js/quill/quill.min.js')?>"></script>
            </div>
        </div>
    </div>

    <div class="footer">
        <br>
        <p>
            StudArd est un plateforme web pour aider les étudiants à bien gerer ces etudes. <br>
            Nous avons conçue des fonctionnalités innovant, tel que la gestion d'emploie du temps, les blocs notes, rappel des devoirs.
        </p>
        <hr>
        <p>&copy; Hackaton Inter Universitaire</p>
    </div>

    <script>
        function change(id,title,val) {
          t = document.getElementById("notitle")
          t.innerText = title
          nt =  document.getElementById("notitleinp")
          nt.value  = title
          q = document.getElementById("editor-container")
          q.replaceChildren()
          to = document.getElementById("toolbar-container")
          to.replaceChildren()
          to.innerHTML  = "<span class=\"ql-formats\"><select class=\"ql-font\"></select><select class=\"ql-size\"></select></span><span class=\"ql-formats\"><button class=\"ql-bold\"></button><button class=\"ql-italic\"></button><button class=\"ql-underline\"></button><button class=\"ql-strike\"></button></span><span class=\"ql-formats\"><select class=\"ql-color\"></select><select class=\"ql-background\"></select></span><span class=\"ql-formats\"><button class=\"ql-script\" value=\"sub\"></button><button class=\"ql-script\" value=\"super\"></button></span><span class=\"ql-formats\"><button class=\"ql-header\" value=\"1\"></button><button class=\"ql-header\" value=\"2\"></button><button class=\"ql-blockquote\"></button><button class=\"ql-code-block\"></button></span><span class=\"ql-formats\"><button class=\"ql-list\" value=\"ordered\"></button><button class=\"ql-list\" value=\"bullet\"></button><button class=\"ql-indent\" value=\"-1\"></button><button class=\"ql-indent\" value=\"+1\"></button></span><span class=\"ql-formats\"><button class=\"ql-direction\" value=\"rtl\"></button><select class=\"ql-align\"></select></span><span class=\"ql-formats\"><button class=\"ql-link\"></button><button class=\"ql-image\"></button><button class=\"ql-video\"></button><button class=\"ql-formula\"></button></span><span class=\"ql-formats\"><button class=\"ql-clean\"></button></span>"
          var quill = new Quill('#editor-container', {
            modules: {
            formula: true,
            syntax: true,
            toolbar: '#toolbar-container'
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
            });
          quill.root.innerHTML = val
          idnote = document.getElementById("idnote")
          idnote.value = id
        }
        function newest(){
          t = document.getElementById("notitle")
          t.innerText = "Nouveau"
          nt =  document.getElementById("notitleinp")
          nt.value  = ""
          q = document.getElementById("editor-container")
          q.replaceChildren()
          to = document.getElementById("toolbar-container")
          to.replaceChildren()
          to.innerHTML  = "<span class=\"ql-formats\"><select class=\"ql-font\"></select><select class=\"ql-size\"></select></span><span class=\"ql-formats\"><button class=\"ql-bold\"></button><button class=\"ql-italic\"></button><button class=\"ql-underline\"></button><button class=\"ql-strike\"></button></span><span class=\"ql-formats\"><select class=\"ql-color\"></select><select class=\"ql-background\"></select></span><span class=\"ql-formats\"><button class=\"ql-script\" value=\"sub\"></button><button class=\"ql-script\" value=\"super\"></button></span><span class=\"ql-formats\"><button class=\"ql-header\" value=\"1\"></button><button class=\"ql-header\" value=\"2\"></button><button class=\"ql-blockquote\"></button><button class=\"ql-code-block\"></button></span><span class=\"ql-formats\"><button class=\"ql-list\" value=\"ordered\"></button><button class=\"ql-list\" value=\"bullet\"></button><button class=\"ql-indent\" value=\"-1\"></button><button class=\"ql-indent\" value=\"+1\"></button></span><span class=\"ql-formats\"><button class=\"ql-direction\" value=\"rtl\"></button><select class=\"ql-align\"></select></span><span class=\"ql-formats\"><button class=\"ql-link\"></button><button class=\"ql-image\"></button><button class=\"ql-video\"></button><button class=\"ql-formula\"></button></span><span class=\"ql-formats\"><button class=\"ql-clean\"></button></span>"
          var quill = new Quill('#editor-container', {
            modules: {
            formula: true,
            syntax: true,
            toolbar: '#toolbar-container'
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
            });
            idnote = document.getElementById("idnote")
          idnote.value = 0
        }
        function updatePath() {
            var path = document.getElementById('path');
            var file = document.getElementById('inputTag');
            console.log(file.value);
            path.innerHTML = file.value;
        }

    window.addEventListener("load", function () {
        var quill = new Quill('#editor-container', {
        modules: {
        formula: true,
        syntax: true,
        toolbar: '#toolbar-container'
        },
        placeholder: 'Compose an epic...',
        theme: 'snow'
    });
    // 
    var xhr; 
            try {  
                xhr = new ActiveXObject('Msxml2.XMLHTTP');   
            }
            catch (e) {
                try {   
                    xhr = new ActiveXObject('Microsoft.XMLHTTP'); 
                }
                catch (e2) {
                    try {  
                        xhr = new XMLHttpRequest();  
                    }
                    catch (e3) {  
                        xhr = false;   
                    }
                }
            }
            xhr.onreadystatechange  = function() { 
                if(xhr.readyState  == 4){
                    if(xhr.status  == 200) {
                        var p = JSON.parse(xhr.responseText)
                        let lst = document.getElementById("notelist")
                        for (let i = 0; i < p.length; i++) {
                          lst.innerHTML+= "<a onclick=\"change("+p[i].id+",'"+p[i].title+"','"+p[i].val+"')\" class=\"list-group-item list-group-item-action\">"+p[i].title+"</a>"
                        }
                    } else {
                        document.dyn="Error code " + xhr.status;
                    }
                }
            }; 
            xhr.open("GET", "<?php bu('NoteBookD/loadall')?>",  false);    
            xhr.send(null);   
    // 
    function procedure(quill) {
        var xhr; 
        try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
        catch (e) 
        {
            try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
            catch (e2) 
            {
            try {  xhr = new XMLHttpRequest();  }
            catch (e3) {  xhr = false;   }
            }
        }
        let inp = document.createElement("input");
        inp.name = "q"
        inp.type = "hidden"
        quill = document.querySelector(".ql-editor").innerHTML
        inp.value = quill
        form.appendChild(inp)
        var formData = new FormData(form);
        xhr.onreadystatechange  = function() { 
            if(xhr.readyState  == 4){
                if(xhr.status  == 200) {
                    
                    }
                else {
                    document.dyn="Error code " + xhr.status;
                }
            }
        };
        xhr.open("POST", "<?php bu('NoteBookD/save')?>",  false); 
        xhr.send(formData); 
    }
    var form = document.getElementById("form");
    form.addEventListener("submit", function (event) {
        // event.preventDefault();
        procedure(quill);
    });
});
    </script>


<!-- FOOTER -->
<?php $this->load->view("templates/footer") ?>
<!-- FOOTER -->