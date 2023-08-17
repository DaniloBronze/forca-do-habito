<?php 
require_once __DIR__ . '/inicio.php';
?>
<div class="container">
<main class="form-signin w-100 m-auto" style="width: 100%; max-width:350px;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">Por favor inicie sessão</h1>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email</label>
    </div>
    <br>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Senha</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
      Lembrar-me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Iniciar sessão</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
  </form>
</main>
</div>
<?php require_once __DIR__ . '/fim.php';