<?php
/**
 * Global Header Component
 * Sri Lanka–France Business Council (SLFBC)
 */
$phoneColombo = \App\Models\SiteSetting::get('secretariat_phone', '+94 11 558 8800');
$phoneParis = \App\Models\SiteSetting::get('paris_phone', '+33 1 45 61 00');
?>
<!-- TOP PROTOCOL BAR (Diplomatic Grounding Header Strip) -->
<div class="w-full bg-[#002654] text-white py-2 px-3 sm:px-6 lg:px-12 border-b border-[#001c3f] text-xs font-sans overflow-hidden">
  <div class="max-w-7xl mx-auto flex items-center justify-between gap-4 whitespace-nowrap">
    <div class="flex items-center gap-2 min-w-0 overflow-hidden">
      <span class="w-2 h-2 rounded-full bg-amber-400 shrink-0"></span>
      <p class="uppercase tracking-wider text-slate-200 font-semibold text-[11px] sm:text-xs truncate m-0">
        Sri Lanka–France Bilateral Chamber <span class="text-slate-400 mx-1 hidden sm:inline">|</span> <span class="text-slate-300 hidden sm:inline">Affiliated with The Ceylon Chamber of Commerce &amp; Embassy of France</span>
      </p>
    </div>
    <div class="flex items-center gap-3 sm:gap-4 uppercase tracking-wider font-semibold text-slate-200 text-[11px] sm:text-xs shrink-0">
      <div class="flex items-center gap-1 text-slate-300">
        <span class="text-white underline cursor-pointer">EN</span>
        <span class="text-slate-500">/</span>
        <span class="hover:text-white cursor-pointer transition-colors" title="Version française">FR</span>
      </div>
      <span class="text-slate-500 hidden md:inline">|</span>
      <span class="hidden md:inline text-slate-300">Colombo: <strong class="text-white"><?= e($phoneColombo) ?></strong></span>
      <span class="text-slate-500 hidden lg:inline">|</span>
      <span class="hidden lg:inline text-slate-300">Paris: <strong class="text-white"><?= e($phoneParis) ?></strong></span>
    </div>
  </div>
</div>

<!-- MAIN NAVIGATION BAR -->
<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 flex items-center justify-between h-20">
    <!-- Brand Logo -->
    <a class="flex items-center py-1 group" href="<?= url('/') ?>" aria-label="Sri Lanka–France Business Council Homepage">
      <img src="<?= asset('assets/images/slfbc-logo.png') ?>" alt="Sri Lanka–France Business Council Official Emblem" class="h-12 sm:h-14 w-auto object-contain">
    </a>

    <!-- Desktop Navigation Menu -->
    <nav class="hidden xl:flex items-center gap-1 text-[14.5px] font-semibold text-slate-700" aria-label="Main Navigation">
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/') && !isRouteActive('/about') && !isRouteActive('/leadership') && !isRouteActive('/membership') && !isRouteActive('/members') && !isRouteActive('/opportunities') && !isRouteActive('/news') && !isRouteActive('/events') && !isRouteActive('/contact') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/') ?>">Home</a>
      
      <!-- About Dropdown / Direct Link -->
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/about') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/about') ?>">About SLFBC</a>

      <!-- Leadership -->
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/leadership') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/leadership') ?>">Governance</a>

      <!-- Bilateral Relations -->
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/france-business') || isRouteActive('/srilanka-business') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/france-business') ?>">Bilateral Relations</a>

      <!-- Business Opportunities -->
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/opportunities') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/opportunities') ?>">Opportunities</a>

      <!-- Membership -->
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/membership') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/membership') ?>">Membership</a>

      <!-- Member Directory -->
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/members') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/members') ?>">Directory</a>

      <!-- News & Events -->
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/news') || isRouteActive('/events') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/news') ?>">News &amp; Events</a>

      <!-- Contact -->
      <a class="px-2.5 py-2 hover:text-[#002654] transition-colors border-b-2 <?= isRouteActive('/contact') ? 'text-[#002654] border-[#002654] font-bold' : 'border-transparent hover:border-slate-300' ?>" href="<?= url('/contact') ?>">Contact</a>
    </nav>

    <!-- CTAs and Mobile Toggle -->
    <div class="flex items-center gap-3">
      <a class="hidden sm:inline-flex items-center justify-center px-4 py-2.5 font-sans text-xs sm:text-sm font-bold tracking-wider uppercase bg-[#b91c1c] text-white hover:bg-[#991b1b] rounded shadow-sm transition-all" href="<?= url('/apply') ?>">
        Become a Member
      </a>

      <!-- Mobile Menu Hamburger Button -->
      <button type="button" id="mobile-nav-toggle" class="xl:hidden p-2 rounded border border-slate-300 text-slate-700 hover:text-[#002654] hover:border-[#002654] focus:outline-none" aria-label="Toggle navigation menu" aria-expanded="false">
        <span class="material-symbols-outlined text-2xl">menu</span>
      </button>
    </div>
  </div>
</header>

<!-- MOBILE NAVIGATION DRAWER -->
<div id="mobile-drawer" class="mobile-drawer" role="dialog" aria-modal="true" aria-label="Mobile Navigation">
  <div class="mobile-drawer-content">
    <div class="flex items-center justify-between pb-4 border-b border-slate-200">
      <img src="<?= asset('assets/images/slfbc-logo.png') ?>" alt="SLFBC Emblem" class="h-10 w-auto object-contain">
      <button type="button" id="mobile-drawer-close" class="p-1 rounded text-slate-500 hover:text-slate-800" aria-label="Close menu">
        <span class="material-symbols-outlined text-2xl">close</span>
      </button>
    </div>

    <nav class="flex flex-col gap-1 text-base font-semibold text-slate-700">
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/') ?>">Home</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/about') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/about') ?>">About SLFBC</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/leadership') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/leadership') ?>">Executive Committee &amp; Governance</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/ambassador-message') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/ambassador-message') ?>">Ambassador’s Message</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/membership') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/membership') ?>">Membership Information</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/members') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/members') ?>">Member Directory</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/opportunities') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/opportunities') ?>">Business Opportunities</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/france-business') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/france-business') ?>">Doing Business with France</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/srilanka-business') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/srilanka-business') ?>">Doing Business in Sri Lanka</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/events') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/events') ?>">Events &amp; Summits</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/news') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/news') ?>">News &amp; Communiqués</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/gallery') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/gallery') ?>">Photo Gallery</a>
      <a class="py-2.5 px-3 rounded hover:bg-slate-100 <?= isRouteActive('/contact') ? 'bg-blue-50 text-[#002654] font-bold' : '' ?>" href="<?= url('/contact') ?>">Contact Secretariat</a>
    </nav>

    <div class="pt-4 border-t border-slate-200 mt-auto flex flex-col gap-2">
      <a class="w-full py-3 text-center bg-[#b91c1c] text-white font-bold text-sm uppercase tracking-wider rounded" href="<?= url('/apply') ?>">
        Become a Member
      </a>
    </div>
  </div>
</div>
