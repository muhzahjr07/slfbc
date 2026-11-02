<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Ambassador’s Message</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]">Diplomatic Patronage</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Message from the Ambassador of France
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Strengthening bilateral commercial ties, sustainable investment, and economic solidarity between the French Republic and the Democratic Socialist Republic of Sri Lanka.
    </p>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left 4 Columns: Diplomatic Credentials -->
      <div class="lg:col-span-4 space-y-6">
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm text-center">
          <!-- Diplomatic Crest Placeholder -->
          <div class="w-32 h-32 mx-auto mb-4 rounded-full bg-white border-4 border-[#c59b27] overflow-hidden flex items-center justify-center shadow-inner">
            <span class="material-symbols-outlined text-5xl text-[#002654]">account_balance</span>
          </div>
          
          <h2 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-1">H.E. Rémi Lambert</h2>
          <p class="text-xs text-slate-700 font-semibold mb-1">Ambassador of the French Republic</p>
          <p class="text-xs text-slate-500 font-medium mb-3">To Sri Lanka and the Maldives</p>
          <span class="px-3 py-1 bg-[#002654] text-white text-xs font-bold uppercase rounded-full inline-block mb-4">
            Patron of the Council
          </span>

          <div class="pt-4 border-t border-slate-200 text-left text-xs text-slate-600 space-y-2">
            <p><strong>Diplomatic Chancellery:</strong> 89, Rosmead Place, Colombo 07</p>
            <p><strong>Economic Service:</strong> Regional Economic Department (French Treasury)</p>
            <p><strong>Trade Facilitation:</strong> Business France South Asia &amp; SLFBC</p>
            <p><strong>Institutional Host:</strong> The Ceylon Chamber of Commerce</p>
          </div>
        </div>

        <!-- Editorial Safeguard Notice -->
        <div class="p-6 bg-slate-50 border-l-4 border-l-[#b91c1c] border border-slate-200 rounded-lg">
          <h3 class="font-serif-diplomatic text-sm font-bold uppercase tracking-wider text-[#b91c1c] mb-2">Protocol Notice</h3>
          <p class="text-xs text-slate-600 leading-relaxed m-0">
            In accordance with Council editorial governance and diplomatic protocol, formal ambassadorial messages are renewed upon bilateral diplomatic cycles. The official textual address for the current session is coordinated with the Chancellery of the Embassy of France in Colombo.
          </p>
        </div>
      </div>

      <!-- Right 8 Columns: Formal Diplomatic Address -->
      <div class="lg:col-span-8">
        <article class="bg-white border border-slate-200 rounded-lg p-8 sm:p-10 shadow-sm space-y-6">
          <div class="flex items-center justify-between pb-4 border-b border-slate-200">
            <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold">Diplomatic Address &amp; Bilateral Outlook</h2>
            <span class="px-2.5 py-1 bg-amber-50 text-amber-900 border border-amber-200 text-xs font-bold uppercase rounded">
              Protocol Dispatch
            </span>
          </div>

          <blockquote class="font-serif-diplomatic text-xl text-[#002654] font-bold italic border-l-4 border-[#c59b27] pl-6 my-6 leading-relaxed">
            "The relationship between France and Sri Lanka is anchored in mutual respect, enduring maritime heritage, and vibrant economic cooperation across the Indian Ocean."
          </blockquote>

          <div class="space-y-4 text-slate-700 leading-relaxed text-base">
            <p>
              For over two decades, the <strong>Sri Lanka–France Business Council (SLFBC)</strong> has stood at the vanguard of commercial diplomacy, facilitating meaningful dialogues between private sector enterprises, state entities, and multilateral development partners.
            </p>

            <p>
              France recognizes Sri Lanka's strategic geographical significance along major Indo-Pacific shipping corridors and remains committed to fostering sustainable trade, climate-resilient agriculture, maritime technology, aviation collaboration, and high-value industrial partnerships. Our bilateral trade exchange spans crucial sectors—from Ceylon tea, premium apparel, and natural rubber to advanced aeronautics, pharmaceuticals, electrical machinery, and renewable energy.
            </p>

            <p>
              French enterprises operating in Sri Lanka—from global benchmarks in multimodal logistics such as CMA CGM to leaders in industrial rubber like Michelin and energy pioneers such as TotalEnergies and Schneider Electric—bring not only capital and world-class innovation, but also strong commitments to corporate social responsibility, skills transfer, and environmental standards. Likewise, Sri Lankan exporters continue to discover expanding avenues across the French single market and the broader European Union under the GSP+ framework.
            </p>

            <p>
              As we navigate evolving global economic landscapes, the Embassy of France, together with Business France and the French Economic Department, will continue to work closely with the Sri Lanka–France Business Council and The Ceylon Chamber of Commerce to unlock new avenues of enterprise and shared prosperity.
            </p>
          </div>

          <div class="mt-8 pt-6 border-t border-dashed border-slate-300 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
              <p class="font-bold text-[#002654] text-sm mb-0.5">H.E. Rémi Lambert</p>
              <p class="text-xs text-slate-500 m-0">Ambassador Extraordinary and Plenipotentiary of the French Republic</p>
            </div>
            <a href="<?= url('/contact') ?>" class="px-5 py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded text-center transition-all">
              Diplomatic &amp; Secretariat Inquiries
            </a>
          </div>
        </article>
      </div>

    </div>
  </div>
</section>
