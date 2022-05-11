<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Ajax</title>
</head>
<body>

    <h1>Register Form</h1>

    <div>
        <h2>Get request</h2>
        <button type="button" class="btn btn-success" id="getRequest">Get request</button>
    </div><br>

    <div id="getRequestData"></div><br>

    <div>
        <form id="register" action="#">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="text" name="name" id="inputName" placeholder="name">
            <input type="text" name="text" id="inputText" placeholder="text">

            <button type="submit" value="Register" class="btn btn-primary">Register</button>
        </form>
    </div><br>

    <div id="postRequestData"></div>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){
            $("#getRequest").click(function(){
            //     $.get("getRequest", function(data){
            //         $("#getRequestData").append(data);
            //     });
            // });

                $.ajax({
                    type: "GET",
                    url: "getRequest",
                    success: function(data)
                    {
                        $("#getRequestData").append(data);
                        console.log(data);
                    }
                });
            });

            $("#register").submit(function(){
                var inputName = $("#inputName").val();
                var inputText = $("#inputText").val();

                // $.post('register', {name: name, text: text}, function(data){
                //     console.log(data);
                //     $("#postRequestData").html(data);
                // });

                var dataString = "Name - "+inputName+", Text - "+inputText;

                $.ajax({
                    type: "POST",
                    url: "register",
                    data: dataString,
                    success: function(data)
                    {
                        console.log(data);
                        $("#postRequestData").append(data);
                        document.getElementById('postRequestData').append(dataString);
                    }
                });

                return false;
            });
        });
    </script>

</body>
</html>
