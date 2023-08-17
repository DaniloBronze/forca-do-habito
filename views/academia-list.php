<?php
require_once __DIR__ . '/inicio.php';
?>
<div class="container container-center">
  <div class="mt-5 bg-[#FCFCFC] min-h-screen">
    <main class="px-4 default-container">
      <div class="flex items-center gap-2 flex-wrap">
        <h1 class="primary-font text-xl font-semibold">Equipamentos de alto padrão</h1>
      </div><!-- /.flex-->
      <div class="w-full mt-2" style="padding: 2rem;">
        <div class="flex overflow-hidden relative bg-black/30 backdrop-blur h-64 sm:h-96 rounded-lg">
          <img class="object-cover"
            src="https://smartsite-production.s3.amazonaws.com/images/new_home_br/equipamentos_alto_padrao.jpeg"
            style="transform: translateX(0%);">
          <img class="object-cover"
            src="https://smartsite-production.s3.amazonaws.com/images/new_home_br/salas-exclusivas.jpeg"
            style="transform: translateX(0%);">
          <img class="object-cover"
            src="https://smartsite-production.s3.amazonaws.com/images/new_home_br/areas-musculacao.jpeg"
            style="transform: translateX(0%);">
          <!--absolute flex-->
        </div><!-- /.fle-->
      </div>
      <!--w-full -->
    </main>
    <!--main-->
  </div>
  <!--mt-5-->
</div><!-- /.container -->

<?php require_once __DIR__ . '/fim.php';