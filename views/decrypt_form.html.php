<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="web/css/style.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="web/js/script.js"></script>
    <title>Cipher API Test</title>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container"></div>
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Sypher</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
        <div class="row form-row">
            <form method="post" id="decryptForm">
                <div class="form-group">
                    <label for="encrypted_text">Enter encrypted text <span class="required">(Required)</span></label>
                    <textarea class="form-control" name="encrypted_text" id="encrypted_text" rows="10" required aria-describedby="help"></textarea>
                    <span id="help" class="help-block">Enter encrypted text into this box.</span>
                </div>
                <div class="form-group">
                    <label for="decrypted_text">Decrypted text</label>
                    <textarea class="form-control" name="decrypted_text" id="decrypted_text" rows="10" readonly></textarea>
                </div>
                <button type="submit" class="btn btn-primary col-md-1">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>