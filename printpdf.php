<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/franken-ui-releases@0.0.12/dist/default.min.css" />
    <style>
        :root {
            --muted-foreground: 240 5% 64.9% !important;
            --muted: 240 3.7% 15.9% !important;
            --border: 240 3.7% 15.9% !important;
        }
    </style>
</head>

<body class="uk-margin-top uk-background-primary uk-panel text-primary-foreground">
    <nav class="uk-navbar uk-background-primary " uk-navbar>
        <div class="uk-navbar-left ">
            <ul class="uk-tab-alt max-w-[140px] ">
                <li> <a href="dashboard.php" uk-toggle="" role="button">Dashboard</a> </li>
                <li class="uk-active"> <a href="printpdf.php" uk-toggle="" role="button">Print Data</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Reports</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Products</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Clients</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Machines</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Commands</a> </li>
            </ul>
        </div>
    </nav>
    <div class="uk-margin-top uk-width-1-1@s uk-card">
        <div class="uk-card-header">
            <div class="uk-flex uk-flex-between">
                <div>
                    <button class="uk-button uk-button-default" id="getcanva">Download Canva</button>
                </div>
                <div>
                    <input type="file" name="file" id="file">
                    <button id="importdata" class="uk-button uk-button-default">Upload</button>
                </div>
            </div>
        </div>
        <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom" id="_canvas_container">
        </div>
        <div class="uk-card-footer uk-flex uk-flex-center">
            <div id="validation" style="display: none;">
                <form>
                    <button class="uk-button uk-button-default uk-width-1-1">Validate</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#getcanva').on('click', function() {
                const tableHTML = `
                <table id="_canvas" class="uk-table uk-table-hover">
                    <thead>
                        <tr>
                            <th>Required</th>
                            <th>Required</th>
                            <th>Required</th>
                            <th>Required</th>
                            <th>Required</th>
                            <th>Required</th>
                        </tr>
                        <tr>
                            <th>Client</th>
                            <th>Product</th>
                            <th>Qte</th>
                            <th>Date</th>
                            <th>Machine</th>
                            <th>QR Code</th>
                        </tr>
                    </thead>
                </table>
            `;

                $("#_canvas_container").empty().append(tableHTML).hide().fadeIn(1500);

                // Wait for the fade-in animation to complete before downloading
                setTimeout(() => {
                    downloadToExcel('xlsx', '_canvas', 'CANEVA_Pdf', 'Articles');
                }, 1600); // slightly longer than the fade-in duration
            });

            var dataimport = [];
            $('#importdata').on('click', function(e) {
                e.preventDefault();
                var file = $('#file')[0].files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = new Uint8Array(e.target.result);
                    var workbook = XLSX.read(data, {
                        type: 'array'
                    });

                    var worksheet = workbook.Sheets[workbook.SheetNames[0]];
                    var jsonData = XLSX.utils.sheet_to_json(worksheet, {
                        header: 1
                    });
                    dataimport = jsonData;
                    var html = `
                    <table class="uk-table uk-table-hover">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Machine</th>
                                <th>Date</th>
                                <th>QR Code</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                    for (var i = 0; i < jsonData.length; i++) {
                        html += '<tr>';
                        for (var j = 0; j < jsonData[i].length; j++) {
                            html += '<td>' + jsonData[i][j] + '</td>';
                        }
                        html += '</tr>';
                    }

                    html += '</tbody>' +
                        '</table>';
                    $('#_canvas_container').html(html);
                    $('#validation').show(); // Show the form validation
                };
                reader.readAsArrayBuffer(file);
            });

            $('#validation').on('submit', function(e) {
                e.preventDefault();
                var form = $('<form>', {
                    'action': 'printData.php',
                    'method': 'POST',
                    'target': '_blank'
                }).append($('<input>', {
                    'name': 'data',
                    'value': JSON.stringify(dataimport),
                    'type': 'hidden'
                }));

                $('body').append(form);
                form.submit();
            });
        });
    </script>


</body>

</html>