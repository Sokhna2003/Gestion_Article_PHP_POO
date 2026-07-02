<section class="max-w-md mx-auto bg-white p-8 rounded-xl shadow border border-gray-100">
  <h2 class="text-xl font-bold text-gray-800 mb-6 text-center">Fiche Inscription Client</h2>
  <form action="<?= path("client", "ajout") ?>" method="POST" class="space-y-4">
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Nom</label>
      <input type="text" name="nom" required class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none text-sm focus:ring-2 focus:ring-[#00A8CC]">
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Prénom</label>
      <input type="text" name="prenom" required class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none text-sm focus:ring-2 focus:ring-[#00A8CC]">
    </div>
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-1">Adresse E-mail</label>
      <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none text-sm focus:ring-2 focus:ring-[#00A8CC]">
    </div>
    <button type="submit" name="enregistrer" class="w-full bg-[#00A8CC] hover:bg-[#0092B0] text-white font-bold py-2 rounded-lg shadow transition text-sm">Enregistrer le client</button>
  </form>
</section>
