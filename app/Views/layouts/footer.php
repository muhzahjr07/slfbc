<?php
/**
 * Global Footer Component
 * Sri Lanka–France Business Council (SLFBC)
 */
$address = \App\Models\SiteSetting::get('secretariat_address', '50, Nawam Mawatha, Colombo 02, Sri Lanka');
$phoneColombo = \App\Models\SiteSetting::get('secretariat_phone', '+94 11 558 8800');
$phoneParis = \App\Models\SiteSetting::get('paris_phone', '+33 1 45 61 00');
$publicEmail = \App\Models\SiteSetting::get('secretariat_email', 'info@slfbc.lk');
?>
<footer class="w-full bg-[#0b1e3b] text-slate-300 border-t border-[#001c3f] mt-auto">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
      <!-- 1. Brand & Mission with White Container -->
      <div class="flex flex-col gap-4">
        <div class="bg-white p-2 rounded max-w-fit shadow-sm">
          <img src="<?= asset('assets/images/slfbc-logo.png') ?>" alt="Sri Lanka–France Business Council Official Emblem" class="h-10 w-auto object-contain">
        </div>
        <p class="text-sm leading-relaxed text-slate-300">
          The Sri Lanka–France Business Council (SLFBC) was inaugurated under the aegis of the Ceylon Chamber of Commerce to foster, promote, and expand bilateral trade, investment, joint ventures, and economic cooperation between Sri Lanka and the Republic of France.
        </p>
        <div class="p-3 bg-white/5 border border-white/10 rounded">
          <p class="text-xs uppercase font-bold text-amber-400">Accredited Bilateral Chamber</p>
          <p class="text-xs text-slate-300 mt-1">Affiliated with The Ceylon Chamber of Commerce &amp; The Embassy of France in Colombo.</p>
        </div>
      </div>

      <!-- 2. Governance & Institution -->
      <div class="flex flex-col gap-3">
        <h3 class="text-xs font-bold uppercase tracking-wider text-amber-400 border-b border-white/15 pb-2">Council &amp; Governance</h3>
        <ul class="flex flex-col gap-2.5 text-sm text-slate-300 list-none p-0 m-0">
          <li><a class="hover:text-white transition-colors" href="<?= url('/about') ?>">About SLFBC</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/leadership') ?>">Executive Committee &amp; Governance</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/ambassador-message') ?>">Ambassador’s Message</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/members') ?>">Member Directory</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/membership') ?>">Membership Information &amp; Fees</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/about#constitution') ?>">Constitution &amp; By-Laws</a></li>
        </ul>
      </div>

      <!-- 3. Opportunities & Corridors -->
      <div class="flex flex-col gap-3">
        <h3 class="text-xs font-bold uppercase tracking-wider text-amber-400 border-b border-white/15 pb-2">Trade Corridors</h3>
        <ul class="flex flex-col gap-2.5 text-sm text-slate-300 list-none p-0 m-0">
          <li><a class="hover:text-white transition-colors" href="<?= url('/opportunities') ?>">Priority Business Opportunities</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/france-business') ?>">Doing Business with France (EU)</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/srilanka-business') ?>">Doing Business in Sri Lanka</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/events') ?>">Bilateral Summits &amp; Delegations</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/news') ?>">Latest Communiqués &amp; Reports</a></li>
          <li><a class="hover:text-white transition-colors" href="<?= url('/gallery') ?>">Event Photo Gallery</a></li>
        </ul>
      </div>

      <!-- 4. Secretariats & Contact -->
      <div class="flex flex-col gap-3">
        <h3 class="text-xs font-bold uppercase tracking-wider text-amber-400 border-b border-white/15 pb-2">Secretariats</h3>
        <div class="space-y-4 text-sm text-slate-300">
          <div>
            <p class="font-bold text-white">Colombo Secretariat:</p>
            <p class="mt-0.5 text-slate-300"><?= e($address) ?></p>
            <p class="mt-1 text-amber-300 font-medium">
              Tel: <a href="tel:<?= e(str_replace(' ', '', $phoneColombo)) ?>" class="text-amber-300 hover:underline"><?= e($phoneColombo) ?></a>
            </p>
            <p class="text-amber-300 font-medium">
              Email: <a href="mailto:<?= e($publicEmail) ?>" class="text-amber-300 hover:underline"><?= e($publicEmail) ?></a>
            </p>
          </div>
          <div class="pt-3 border-t border-white/10">
            <p class="font-bold text-white">Paris Liaison Office:</p>
            <p class="mt-0.5 text-slate-300">27 Rue de Berri, 75008 Paris, France</p>
            <p class="mt-1 text-amber-300 font-medium">
              Tel: <a href="tel:<?= e(str_replace(' ', '', $phoneParis)) ?>" class="text-amber-300 hover:underline"><?= e($phoneParis) ?></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Legal Strip -->
  <div class="w-full border-t border-white/10 bg-[#071326] py-5 px-4 sm:px-6 lg:px-12 text-xs text-slate-400">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4 font-medium">
      <p>© <?= date('Y') ?> Sri Lanka–France Business Council. Affiliated with The Ceylon Chamber of Commerce. All rights reserved.</p>
      <div class="flex items-center gap-4">
        <a class="hover:text-white transition-colors" href="<?= url('/about') ?>">Institutional Charter</a>
        <span class="text-slate-600">|</span>
        <a class="hover:text-white transition-colors" href="<?= url('/membership') ?>">Terms of Membership</a>
        <span class="text-slate-600">|</span>
        <a class="hover:text-white transition-colors" href="<?= url('/sitemap.xml') ?>" target="_blank">Sitemap</a>
        <span class="text-slate-600">|</span>
        <a class="hover:text-white transition-colors" href="<?= url('/contact') ?>">Secretariat Inquiries</a>
      </div>
    </div>
  </div>
</footer>
