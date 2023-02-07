<?php require_once("./inc/top.php"); ?>

<body class="home">
    <?php require_once("./inc/header.php"); ?>

<div class="container text-center py-5 my-5" id="error">
  <svg height="100" width="100">
    <polygon points="50,25 17,80 82,80" stroke-linejoin="round" style="fill:none;stroke:#ff8a00;stroke-width:8" />
    <text x="42" y="74" fill="#ff8a00" font-family="sans-serif" font-weight="900" font-size="42px">!</text>
  </svg>
 <div class="row">
    <div class="col-md-12">
      <div class="main-icon text-warning"><span class="uxicon uxicon-alert"></span></div>
        <h1>File not found (404 error)</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <p class="lead">If you think what you're looking for should be here, please <a href="contact" class="fw-bold">Contact</a> the site owner.</p>
    </div>
  </div>
</div>

<?php require_once("./inc/footer.php");?>
<?php require_once("./inc/bottom.php");?>
