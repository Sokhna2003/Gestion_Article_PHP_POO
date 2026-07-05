<section class="max-w-4xl mx-auto">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Liste des Catégories</h2>
    <a href="<?= path("categorie", "ajout") ?>" class="px-4 py-2 bg-[#00A8CC] text-white rounded-lg shadow hover:bg-[#0092B0] transition font-semibold text-sm">
      + Ajouter une catégorie
    </a>
  </div>
  <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
      <thead class="bg-gray-50 border-b border-gray-100">
        <tr>
          <th class="p-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">ID Catégorie</th>
          <th class="p-4 text-gray-500 font-semibold text-xs uppercase tracking-wider">Nom de la catégorie</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-50">
        <?php if (empty($categories)): ?>
          <tr><td colspan="2" class="p-8 text-center text-gray-400">Aucune catégorie enregistrée.</td></tr>
        <?php else: ?>
          <?php foreach ($categories as $cat): ?>
          <tr class="hover:bg-gray-50/50 transition">
            <td class="p-4 text-gray-500 text-sm font-medium">#<?= $cat->id_categorie ?></td>
            <td class="p-4 font-bold text-gray-700"><?= htmlspecialchars($cat->nom_categorie) ?></td>
          </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</section>
