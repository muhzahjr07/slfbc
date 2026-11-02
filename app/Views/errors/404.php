<div class="py-24 px-6 max-w-4xl mx-auto text-center">
  <div class="w-20 h-20 bg-red-100 text-[#b91c1c] rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
    <span class="material-symbols-outlined text-4xl">search_off</span>
  </div>
  <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#002654] font-bold mb-4">
    Official Record or Page Not Found
  </h1>
  <p class="text-slate-600 text-base sm:text-lg max-w-xl mx-auto mb-8 leading-relaxed">
    The dossier, event, or council resource you requested at <code class="bg-slate-100 px-2 py-0.5 rounded text-sm text-slate-800 font-mono"><?= e($requestedUrl ?? '') ?></code> could not be located. It may have been updated, relocated, or archived.
  </p>
  <div class="flex flex-wrap items-center justify-center gap-4">
    <a href="<?= url('/') ?>" class="inline-flex items-center justify-center px-6 py-3 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded transition-all shadow-sm">
      Return to Homepage
    </a>
    <a href="<?= url('/contact') ?>" class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 hover:bg-slate-100 text-slate-700 font-bold text-xs uppercase tracking-wider rounded transition-all shadow-sm">
      Contact Secretariat
    </a>
  </div>
</div>
