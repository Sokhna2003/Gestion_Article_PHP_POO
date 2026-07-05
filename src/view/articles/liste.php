<section class="max-w-6xl mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Catalogue des Articles</h2>
    <a href="<?= path("article", "ajout") ?>" class="px-4 py-2 bg-[#00A8CC] text-white rounded-lg shadow hover:bg-[#0092B0] transition font-semibold text-sm">
      + Ajouter un article
    </a>
  </div>

  <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
      <thead class="bg-gray-50 border-b border-gray-100">
        <tr>
          <th class="p-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Libellé</th>
          <th class="p-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Catégorie</th>
          <th class="p-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Aperçu du contenu</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-50">
        <?php if (empty($articles)): ?>
          <tr><td colspan="3" class="p-8 text-center text-gray-400">Aucun article enregistré.</td></tr>
        <?php else: ?>
          <?php foreach ($articles as $article): ?>
          <tr class="hover:bg-gray-50/50 transition">
            <!-- Syntaxe Objet : $article->libelle -->
            <td class="p-4 font-bold text-gray-700"><?= htmlspecialchars($article->libelle) ?></td>
            <td class="p-4">
              <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-600 border border-blue-100">
                <?= htmlspecialchars($article->categorie) ?>
              </span>
            </td>
            <td class="p-4 text-gray-500 text-sm max-w-xs truncate"><?= htmlspecialchars($article->contenu) ?></td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
