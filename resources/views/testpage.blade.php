<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>

  <style>
    .offcanvas {
      transition: transform 0s ease-in-out;
    }

    .SideBarBox {
      width: 85%;
    }

    @media (min-width: 450px) {
      .SideBarBox {
        width: 60% !important;
      }
    }

    @media (min-width: 576px) {
      .SideBarBox {
        width: 45% !important;
      }
    }

    @media (min-width: 768px) {
      .SideBarBox {
        width: 35% !important;
      }
    }

    .div1 {
      background-color: red !important;
    }

    .div0 {
      background-color: green;
      width: 50px;
      height: 50px;
    }

  </style>
</head>

<body>

  <button class="btn btn-primary" onclick=" location.reload();" type="submit" style="border-radius:4px">
    <div class="h7">Reload</div>
  </button>
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop"
    aria-controls="offcanvasWithBackdrop">Enable backdrop (default)</button>


  <div class="offcanvas offcanvas-start SideBarBox" tabindex="-1" id="offcanvasWithBackdrop"
    aria-labelledby="offcanvasWithBackdropLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Offcanvas with backdrop</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <p>Test</p>
    </div>
  </div>

  <div id="test" class="div0 m-2" onclick="$('#test').toggleClass('div1')"></div>
  <div id="test1" class="div0 m-2" onclick="$('#test1').toggleClass('div1')"></div>
  <div id="test2" class="div0 m-2" onclick="$('#test2').toggleClass('div1')"></div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->

  <!-- JQUERY -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
</body>

</html>
