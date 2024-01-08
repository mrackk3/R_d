<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .wrapper {
            display: flex;
            align-items: center;
            flex-direction: row;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 320px;
            max-width: 100%;
            margin: 2rem auto;
        }

        .error {
            border-color: tomato;
        }

        h1 {
            font-size: 28px;
            color: green;
        }

        h1.error {
            color: tomato;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text"></h1>
                            <form action="POST">
                                <div class="mb-3">
                                    <label for="inputEmail">Email</label>
                                    <input type="email" class="form-control" name="email" id="inputEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" class="form-control" name="pass" id="inputPassword">
                                </div>
                                <button type="submit" class="btn btn-primary">Sign up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

        $("form").submit(function (e) {
            e.preventDefault();
            const form = $(this);
            const email = form.find('input[name = email]').val();
            const pass = form.find('input[name = pass]').val();

            if (email === '') {
                form.find('input[name = email]').addClass('error');
                form.find('input[name = pass]').removeClass('error');
                return false;
            } else if (pass === '') {
                form.find('input[name = pass]').addClass('error');
                form.find('input[name = email]').removeClass('error');
                return false;
            } else {
                submitForm(form);
                return false;
            }
        });

        function submitForm(e) {

            console.log($(e).serializeArray());

            $.ajax({
                type: "POST",
                url: "api.php",
                data: $(e).serialize(),
                dataType: "json"
            })
                .always(function (resp) {
                    if (resp.success) {
                        $(".text").html(resp.email).removeClass('error');;
                    } else {
                        $(".text").html(resp.error).addClass('error');
                    }
                });
            return false;
        };
    </script>
</body>

</html>