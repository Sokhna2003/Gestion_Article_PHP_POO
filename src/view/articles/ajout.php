<section class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow border border-gray-100">
  <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">Créer un Nouvel Article</h2>
  <form action="<?= path("article", "ajout") ?>" method="POST" class="space-y-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Libellé</label>
      <input type="text" name="libelle" value="<?= htmlspecialchars($_POST['libelle'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none text-sm focus:ring-2 focus:ring-[#00A8CC]">
      <span class="text-red-500 text-xs"><?= $errors["libelle"] ?? "" ?></span>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Catégorie</label>
      <select name="id_categorie" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white outline-none text-sm focus:ring-2 focus:ring-[#00A8CC]">
        <option value="" disabled <?= !isset($_POST['id_categorie']) ? 'selected' : '' ?>>-- Choisir une catégorie --</option>
        <?php foreach ($categories as $cat): ?>
          <option value="<?= $cat->id_categorie ?>" <?= (isset($_POST['id_categorie']) && (int)$_POST['id_categorie'] === (int)$cat->id_categorie) ? 'selected' : '' ?>>
            <?= htmlspecialchars($cat->nom_categorie) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <span class="text-red-500 text-xs"><?= $errors["id_categorie"] ?? "" ?></span>
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Contenu</label>
      <textarea name="contenu" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none text-sm resize-none focus:ring-2 focus:ring-[#00A8CC]"><?= htmlspecialchars($_POST['contenu'] ?? '') ?></textarea>
      <span class="text-red-500 text-xs"><?= $errors["contenu"] ?? "" ?></span>
    </div>
    <button type="submit" name="ajout" class="w-full bg-[#00A8CC] hover:bg-[#0092B0] text-white font-bold py-2 rounded-lg shadow transition text-sm">Enregistrer l'article</button>
  </form>
</section>
