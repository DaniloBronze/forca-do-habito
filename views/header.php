<div class="container">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <h3 class="logo" style="color: #7d8da1;">CRM <b style="color: #00d9ff;">CLIENTS</b></h3>
    </a>

    <div class="col-md-3 text-end">
      <?php
      if (!isset($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO'] !== '/login') { ?>
        <a class="btn btn-outline-primary me-2" style="text-decoration:none;" href="/login">Login</a>
      <?php } ?>
    </div>
  </header>
</div>