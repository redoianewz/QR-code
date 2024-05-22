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



<body class="uk-margin-top uk-background-primary text-primary-foreground">
    <nav class="uk-navbar uk-background-primary" uk-navbar>
        <div class="uk-navbar-left ">
            <ul class="uk-tab-alt max-w-[140px]">
                <li class="uk-active"> <a href="dashboard.php"" uk-toggle="" role=" button">Dashboard</a> </li>
                <li> <a href="printpdf.php" uk-toggle="" role="button">Print Data</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Reports</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Products</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Clients</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Machines</a> </li>
                <li> <a href="#demo" uk-toggle="" role="button">Commands</a> </li>
            </ul>
        </div>
    </nav>
    <div class="flex-1 space-y-4 uk-margin-top">
        <div class="space-y-4 ">
            <div class="grid grid-cols-2 gap-4 lg:grid-cols-4" style="display: flex; flex-wrap: wrap;">
                <div class="uk-card uk-card-primary" style="flex: 1; margin-right: 10px;">
                    <div class="uk-card-header">
                        <h3 class="uk-card-title">Dashboard</h3>
                    </div>
                    <div class="uk-card-body pt-0">
                        <div class="uk-text-large uk-text-bold">+2350</div>
                        <p class="text-xs text-muted-foreground">+180.1% from last month</p>
                    </div>
                </div>

                <div class="uk-card" style="flex: 1; margin-right: 10px;">
                    <div class="uk-card-header">
                        <h3 class="uk-card-title">Print Data</h3>
                    </div>
                    <div class="uk-card-body pt-0">
                        <div class="uk-text-large uk-text-bold">+2350</div>
                        <p class="text-xs text-muted-foreground">+180.1% from last month</p>
                    </div>
                </div>

                <div class="uk-card" style="flex: 1; margin-right: 10px;">
                    <div class="uk-card-header">
                        <h3 class="uk-card-title">Reports</h3>
                    </div>
                    <div class="uk-card-body pt-0">
                        <div class="uk-text-large uk-text-bold">+2350</div>
                        <p class="text-xs text-muted-foreground">+180.1% from last month</p>
                    </div>
                </div>

                <div class="uk-card" style="flex: 1; margin-right: 10px;">
                    <div class="uk-card-header">
                        <h3 class="uk-card-title">Notifications</h3>
                    </div>
                    <div class="uk-card-body pt-0">
                        <div class="uk-text-large uk-text-bold">+2350</div>
                        <p class="text-xs text-muted-foreground">+180.1% from last month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit-icons.min.js"></script>
</body>

</html>