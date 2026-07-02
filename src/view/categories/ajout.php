<section class="max-w-md mx-auto bg-white p-8 rounded-xl shadow border border-gray-100">
  <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">Créer une Catégorie</h2>
  <form action="<?= path("categorie", "ajout") ?>" method="POST" class="space-y-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Nom de la catégorie</label>
      <input type="text" name="nom_categorie" class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none text-sm focus:ring-2 focus:ring-[#00A8CC]">
      <span class="text-red-500 text-xs"><?= $errors["nom_categorie"] ?? "" ?></span>
    </div>
    <button type="submit" name="ajout" class="w-full bg-[#00A8CC] hover:bg-[#0092B0] text-white font-bold py-2 rounded-lg shadow transition text-sm">Enregistrer la catégorie</button>
  </form>
</section>
