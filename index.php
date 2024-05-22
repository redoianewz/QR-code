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

<body class="uk-padding uk-background-primary text-primary-foreground  uk-flex uk-flex-center uk-flex-middle uk-height-viewport">

    <div class="uk-width-1-3@s uk-card">
        <div class="uk-card-header ">
            <h3 class="uk-card-title ">Login</h3>
            <p class="uk-margin-small-top uk-text-small text-muted-foreground">
                Enter your email below to login
            </p>
        </div>
        <form action="dashboard.php" method="post">
            <div class="uk-card-body uk-padding-remove-top uk-padding-remove-bottom">
                <div class="">
                    <label class="uk-form-label" for="email">Email</label>
                    <input class="uk-input" id="email" type="email" aria-describedby="name-help-block" placeholder="m@example.com" />
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label" for="password">password</label>
                    <input class="uk-input" id="password" type="password" aria-describedby="name-help-block" placeholder="Password" />

                </div>
            </div>

            <div class="uk-card-footer uk-flex uk-flex-center">
                <button class="uk-width-1-1 uk-button uk-button-default uk-margin-small-bottom ">Login</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.20.8/dist/js/uikit-icons.min.js"></script>
</body>

</html>