<?php
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Product Manager</title>
      <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
      <style>
          .col-sm-offset-3{
              margin: 10px 0;
          }
          .table {
              width: 100%;
              margin-bottom: 1rem;
              color: #212529;
          }

          .table th,
          .table td {
              padding: 0.75rem;
              vertical-align: top;
              border-top: 1px solid #dee2e6;
          }
      </style>
  </head>
  <body>
     <div class="container">
         <nav class="navbar">
             {{--Navabr Contents--}}
         </nav>
     </div>
      @yield('content')
  </body>
</html>
