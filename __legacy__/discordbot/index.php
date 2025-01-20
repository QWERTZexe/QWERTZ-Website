<?php $pageTitle = "QWERTZ - Discord Bot Builder"; include '../head.php'; ?>
<body>
    <?php include '../header.php'; ?>
    <main>
        <?php $pageName = "Discord Bot Builder"; $pageDescription = "Create your Discord bot using drag and drop blocks"; include '../hero.php'; ?>
        
        <!-- Include Blockly library -->
        <script src="https://unpkg.com/blockly/blockly.min.js"></script>

        <style>
            #blocklyDiv {
                height: 480px;
                width: 100%;
                margin-top: 20px;
            }
            .export-area {
                margin-top: 20px;
                text-align: center;
            }
            #exportButton, #importButton, #exportDiscordPyButton {
                margin-inline: 20px;
            }
        </style>

        <section id="bot-builder" class="content-section">
            <div id="blocklyDiv"></div>
            <div class="export-area">
                <button id="exportButton" class="btn btn-primary">Export to XML</button>
                <button id="importButton" class="btn btn-secondary">Import from XML</button>
                <button id="exportDiscordPyButton" class="btn btn-primary">Export to Discord.py</button>
                <input type="file" id="importInput" style="display: none;" accept=".xml">
            </div>
        </section>

        <xml id="toolbox" style="display: none">
            <!-- This will be populated dynamically -->
        </xml>

        <script>
            // Declare workspace in the global scope
            var workspace;

            // Load blocks from JSON file
            fetch('blocks.json')
                .then(response => response.json())
                .then(data => {
                    const toolbox = document.getElementById('toolbox');
                    
                    data.categories.forEach(category => {
                        const categoryElement = document.createElement('category');
                        categoryElement.setAttribute('name', category.name);
                        categoryElement.setAttribute('colour', category.colour);
                        
                        category.blocks.forEach(block => {
                            const blockElement = document.createElement('block');
                            blockElement.setAttribute('type', block.type);
                            categoryElement.appendChild(blockElement);
                            
                            // Define the block
                            Blockly.Blocks[block.type] = {
                                init: function() {
                                    this.jsonInit(block);
                                }
                            };
                        });
                        
                        toolbox.appendChild(categoryElement);
                    });

                    Blockly.utils.colour.setHsvSaturation(1);
                    Blockly.utils.colour.setHsvValue(0.8);

                    // Initialize Blockly (note the removal of 'var')
                    workspace = Blockly.inject('blocklyDiv', {
                        toolbox: toolbox,
                        renderer: "zelos",
                        scrollbars: true,
                        trashcan: true,
                        grid: {
                            spacing: 20,
                            length: 3,
                            colour: '#ccc',
                            snap: true
                        },
                    });

                    // Call a function to set up the export button after Blockly is initialized
                    setupButtons();
                })
                .catch(error => console.error('Error loading blocks:', error));
                // Function to export the workspace to XML
                function exportToXml() {
                        if (!workspace) {
                            console.error('Workspace is not initialized');
                            return;
                        }
                        var xmlDom = Blockly.Xml.workspaceToDom(workspace);
                        var xmlText = Blockly.Xml.domToPrettyText(xmlDom);
                        
                        // Create a Blob with the XML content
                        var blob = new Blob([xmlText], {type: 'text/xml'});
                        
                        // Create a link element, hide it, direct it towards the blob, and then 'click' it programatically
                        var a = document.createElement("a");
                        a.style = "display: none";
                        document.body.appendChild(a);
                        
                        // Create a DOMString representing the blob and point the link element towards it
                        var url = window.URL.createObjectURL(blob);
                        a.href = url;
                        a.download = 'qwertz-discordbot.xml';
                        
                        // Programatically click the link to trigger the download
                        a.click();
                        
                        // Release the reference to the file by revoking the Object URL
                        window.URL.revokeObjectURL(url);
                    }
                // Function to export the workspace to XML
                function importFromXml(event) {
                    var file = event.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var xml = Blockly.utils.xml.textToDom(e.target.result);
                        Blockly.Xml.clearWorkspaceAndLoadFromXml(xml, workspace);
                    };
                    reader.readAsText(file);
                }

                // Function to set up the export and import buttons
                function setupButtons() {
                    document.getElementById('exportButton').addEventListener('click', exportToXml);
                    
                    var importButton = document.getElementById('importButton');
                    var importInput = document.getElementById('importInput');
                    
                    importButton.addEventListener('click', function() {
                        importInput.click();
                    });
                    
                    importInput.addEventListener('change', importFromXml);
                    document.getElementById('exportDiscordPyButton').addEventListener('click', exportToDiscordPy);

                }
                function exportToDiscordPy() {
                    if (!workspace) {
                        console.error('Workspace is not initialized');
                        return;
                    }
                    var xmlDom = Blockly.Xml.workspaceToDom(workspace);
                    var xmlText = Blockly.Xml.domToPrettyText(xmlDom);
                    
                    // Send the XML to the server
                    fetch('export_discord_py.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'xml=' + encodeURIComponent(xmlText)
                    })
                    .then(response => response.blob())
                    .then(blob => {
                        // Create a link to download the file
                        var url = window.URL.createObjectURL(blob);
                        var a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = url;
                        a.download = 'discord_bot.py';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    })
                    .catch(error => console.error('Error:', error));
                }
        </script>
    </main>
    <?php include '../footer.php'; ?>

</body>
</html>