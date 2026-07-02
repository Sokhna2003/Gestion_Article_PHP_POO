<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion Article</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>
  <link rel="stylesheet" href="https://cloudflare.com">
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <div class="flex h-screen">
    <!-- Barre Latérale -->
    <aside class="w-1/5 bg-[#1E272E] text-white flex flex-col p-6 space-y-6">
      <h1 class="text-xl font-bold text-[#00A8CC] mb-4">
        <i class="fa-solid fa-cubes mr-2"></i>Ges-Article POO
      </h1>
      <nav class="space-y-1">
        <a href="<?= path("article","liste") ?>" class="flex items-center p-3 rounded-lg hover:bg-white/10 transition <?= ($_GET['controller'] ?? 'article') === 'article' ? 'bg-[#00A8CC] text-white' : '' ?>">
          <i class="fa-solid fa-newspaper w-6"></i> <span>Articles</span>
        </a>
        <a href="<?= path("categorie","liste") ?>" class="flex items-center p-3 rounded-lg hover:bg-white/10 transition <?= ($_GET['controller'] ?? '') === 'categorie' ? 'bg-[#00A8CC] text-white' : '' ?>">
          <i class="fa-solid fa-tags w-6"></i> <span>Catégories</span>
        </a>
        <a href="<?= path("client","liste") ?>" class="flex items-center p-3 rounded-lg hover:bg-white/10 transition <?= ($_GET['controller'] ?? '') === 'client' ? 'bg-[#00A8CC] text-white' : '' ?>">
          <i class="fa-solid fa-users w-6"></i> <span>Clients</span>
        </a>
      </nav>
    </aside>
    
    <!-- Zone Principale -->
    <main class="flex-1 flex flex-col overflow-hidden">
      <header class="h-20 bg-white shadow-sm flex items-center justify-between px-8 border-b border-gray-100">
        <h2 class="text-lg font-semibold text-gray-700">Système de Gestion Commerciale</h2>
      </header>
      <div class="flex-1 overflow-y-auto bg-gray-50/50 p-8">
          <?= $content ?>
      </div>
    </main>
  </div>

</body>
</html>
