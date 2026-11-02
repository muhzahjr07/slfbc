<!DOCTYPE html>
<html lang="en" class="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle ?? 'Administration Panel | SLFBC') ?></title>
  <link rel="icon" type="image/svg+xml" href="<?= asset('assets/images/logo.svg') ?>">

  <!-- Fonts & Material Symbols -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

  <!-- Tailwind CSS Engine -->
  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#002654",
            "primary-hover": "#001b3f",
            "secondary": "#b91c1c",
            "gold": "#c59b27",
            "diplomatic-navy": "#0b1e3b",
          },
          fontFamily: {
            "serif-diplomatic": ["Merriweather", "Georgia", "serif"],
            "sans-diplomatic": ["\"Source Sans 3\"", "sans-serif"],
          }
        }
      }
    }
  </script>

  <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>">
</head>
<body class="bg-slate-100 font-sans-diplomatic text-slate-800 antialiased min-h-screen flex flex-col">
  <!-- Top Admin Bar -->
  <header class="bg-[#002654] text-white h-16 border-b border-[#001c3f] flex items-center justify-between px-6 sticky top-0 z-40 shadow-sm">
    <div class="flex items-center gap-3">
      <a href="<?= url('/admin') ?>" class="flex items-center gap-2.5 text-white font-serif-diplomatic font-bold text-lg tracking-tight">
        <img src="<?= asset('assets/images/slfbc-logo.png') ?>" alt="SLFBC Logo" class="h-8 w-auto bg-white p-0.5 rounded shadow-sm">
        <span>SLFBC Administration</span>
      </a>
      <span class="text-slate-400 text-xs uppercase tracking-wider hidden sm:inline">| Ceylon Chamber of Commerce Secretariat</span>
    </div>

    <div class="flex items-center gap-4 text-sm font-semibold">
      <a href="<?= url('/') ?>" target="_blank" class="text-slate-300 hover:text-white flex items-center gap-1.5 transition-colors text-xs uppercase tracking-wider">
        <span class="material-symbols-outlined text-base">open_in_new</span> View Public Site
      </a>

      <?php if ($admin = auth()): ?>
        <div class="flex items-center gap-3 pl-4 border-l border-white/20">
          <span class="hidden md:inline text-xs text-slate-300">
            Signed in as: <strong class="text-white"><?= e($admin['name']) ?></strong> (<?= e($admin['role']) ?>)
          </span>
          <a href="<?= url('/admin/logout') ?>" class="px-3 py-1.5 bg-red-800 hover:bg-red-700 text-white rounded text-xs uppercase font-bold tracking-wider transition-colors flex items-center gap-1">
            <span class="material-symbols-outlined text-sm">logout</span> Logout
          </a>
        </div>
      <?php endif; ?>
    </div>
  </header>

  <!-- Admin Body with Sidebar -->
  <div class="flex-grow flex flex-col md:flex-row w-full max-w-7xl mx-auto my-6 px-4 sm:px-6 lg:px-8 gap-6">
    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-white border border-slate-200 rounded-lg shadow-sm p-4 h-fit shrink-0">
      <div class="text-xs font-bold uppercase tracking-wider text-slate-500 px-3 py-2 border-b border-slate-100 mb-2">
        Secretariat Management
      </div>
      <nav class="flex flex-col gap-1 text-sm font-semibold text-slate-700">
        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin') && !isRouteActive('/admin/members') && !isRouteActive('/admin/news') && !isRouteActive('/admin/events') && !isRouteActive('/admin/applications') && !isRouteActive('/admin/enquiries') && !isRouteActive('/admin/leadership') && !isRouteActive('/admin/opportunities') && !isRouteActive('/admin/settings') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin') ?>">
          <span class="material-symbols-outlined text-xl">dashboard</span> Dashboard
        </a>

        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin/members') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin/members') ?>">
          <span class="material-symbols-outlined text-xl">corporate_fare</span> Member Directory
        </a>

        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin/applications') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin/applications') ?>">
          <span class="material-symbols-outlined text-xl">assignment_turned_in</span> Applications
          <?php $pendingCount = \App\Models\MembershipApplication::countPending(); if ($pendingCount > 0): ?>
            <span class="ml-auto bg-amber-500 text-white text-xs px-2 py-0.5 rounded-full font-bold"><?= $pendingCount ?></span>
          <?php endif; ?>
        </a>

        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin/news') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin/news') ?>">
          <span class="material-symbols-outlined text-xl">article</span> News &amp; Communiqués
        </a>

        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin/events') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin/events') ?>">
          <span class="material-symbols-outlined text-xl">event</span> Events &amp; Summits
        </a>

        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin/enquiries') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin/enquiries') ?>">
          <span class="material-symbols-outlined text-xl">mail</span> Enquiries
          <?php $unreadCount = \App\Models\ContactEnquiry::countUnread(); if ($unreadCount > 0): ?>
            <span class="ml-auto bg-red-600 text-white text-xs px-2 py-0.5 rounded-full font-bold"><?= $unreadCount ?></span>
          <?php endif; ?>
        </a>

        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin/leadership') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin/leadership') ?>">
          <span class="material-symbols-outlined text-xl">groups</span> Governance &amp; ExCo
        </a>

        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin/opportunities') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin/opportunities') ?>">
          <span class="material-symbols-outlined text-xl">trending_up</span> Opportunities
        </a>

        <a class="flex items-center gap-2.5 px-3 py-2.5 rounded hover:bg-slate-100 <?= isRouteActive('/admin/settings') ? 'bg-[#002654] text-white font-bold' : '' ?>" href="<?= url('/admin/settings') ?>">
          <span class="material-symbols-outlined text-xl">settings</span> Site Settings
        </a>
      </nav>
    </aside>

    <!-- Content Area -->
    <main class="flex-grow bg-white border border-slate-200 rounded-lg shadow-sm p-6 lg:p-8 min-w-0">
      <!-- Flash Messages -->
      <?php if ($successMsg = flash('success')): ?>
        <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-600 rounded text-emerald-900 flex items-start gap-3 alert-auto-dismiss" role="alert">
          <span class="material-symbols-outlined text-emerald-600 text-2xl shrink-0">check_circle</span>
          <div>
            <h4 class="font-bold text-sm">Success</h4>
            <p class="text-sm mt-0.5"><?= e($successMsg) ?></p>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($errorMsg = flash('error')): ?>
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-600 rounded text-red-900 flex items-start gap-3" role="alert">
          <span class="material-symbols-outlined text-red-600 text-2xl shrink-0">error</span>
          <div>
            <h4 class="font-bold text-sm">Notice</h4>
            <p class="text-sm mt-0.5"><?= e($errorMsg) ?></p>
          </div>
        </div>
      <?php endif; ?>

      <?= $content ?>
    </main>
  </div>

  <footer class="text-center py-4 text-xs text-slate-500 mt-auto border-t border-slate-200 bg-white">
    Sri Lanka–France Business Council Administration • Secretariat under The Ceylon Chamber of Commerce
  </footer>

  <script src="<?= asset('assets/js/admin.js') ?>"></script>
</body>
</html>
