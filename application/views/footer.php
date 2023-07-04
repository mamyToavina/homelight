<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>

    footer {
      background-color: rgba(12,29,122,1);
      color: white;
      padding: 20px;
      text-align: center;
    }

    .logo img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-left: auto;
      margin-right: auto;
    }

    .contenue ul li {
      list-style: none;
      padding: 2%;
      display: inline;
    }

    .contenue ul  li a{
      text-decoration: none;
      color: whitesmoke;
      font-family: 'Signika', sans-serif;
    }


  </style>
</head>
<body>
  <div class="footer">
    <footer>
      <div class="logo">
        <img src="<?php echo base_url('assets/logotranoko.png'); ?>" alt="Img logo">
      </div>

      <div class="contenue">
        <ul>
          <li> <a href="#"> Home</a> </li>
          <li> <a href="#"> About</a> </li>
          <li> <a href="#"> Service</a> </li>
          <li> <a href="#"> Team</a> </li>
          <li> <a href="#"> Help</a> </li>
          <li> <a href="#"> Contact</a> </li>
       </ul>
      </div>
    </footer>

  </div>
</body>
</html>
