<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= \App\Core\View::e($pageTitle ?? 'Secretariat Login | SLFBC') ?></title>
  <link rel="icon" type="image/svg+xml" href="<?= \App\Core\View::asset('assets/images/logo.svg') ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            "primary": "#002654",
            "gold": "#c59b27",
            "crimson": "#b91c1c",
          },
          fontFamily: {
            "serif": ["Merriweather", "Georgia", "serif"],
            "sans": ["\"Source Sans 3\"", "sans-serif"],
          }
        }
      }
    }
  </script>
</head>
<body class="bg-slate-900 font-sans text-slate-800 min-h-screen flex items-center justify-center p-4">
  <div class="w-full max-w-md">
    <!-- Header Card -->
    <div class="text-center mb-8">
      <div class="inline-flex items-center justify-center p-3 rounded-xl bg-white mb-4 border border-white/20 shadow-lg">
        <img src="<?= \App\Core\View::asset('assets/images/slfbc-logo.png') ?>" alt="SLFBC Logo" class="h-12 w-auto object-contain">
      </div>
      <h1 class="text-2xl font-serif font-bold text-white tracking-tight">SLFBC Administration</h1>
      <p class="text-slate-400 text-xs uppercase tracking-wider mt-1">The Ceylon Chamber of Commerce Secretariat</p>
    </div>

    <!-- Login Box -->
    <div class="bg-white rounded-xl shadow-2xl p-8 border border-slate-100">
      <div class="mb-6 pb-4 border-b border-slate-100">
        <h2 class="text-lg font-bold text-[#002654]">Official Authentication</h2>
        <p class="text-xs text-slate-500 mt-1">Authorized personnel only. Sessions are encrypted and audited.</p>
      </div>

      <?php if (!empty($error)): ?>
        <div class="mb-5 p-3.5 bg-red-50 border-l-4 border-red-600 rounded text-red-900 text-xs leading-relaxed flex items-start gap-2.5">
          <span class="material-symbols-outlined text-red-600 text-lg shrink-0">error</span>
          <div><?= \App\Core\View::e($error) ?></div>
        </div>
      <?php endif; ?>

      <?php if (!empty($rateLimited)): ?>
        <div class="mb-5 p-3.5 bg-amber-50 border-l-4 border-amber-500 rounded text-amber-900 text-xs leading-relaxed">
          <strong>Access Temporarily Throttled:</strong> Excessive failed attempts detected. Please wait 15 minutes before retrying.
        </div>
      <?php endif; ?>

      <form action="<?= \App\Core\View::url('admin/login') ?>" method="POST" novalidate>
        <?= \App\Core\CSRF::field() ?>

        <div class="mb-4">
          <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Administrative Email</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
              <span class="material-symbols-outlined text-lg">mail</span>
            </span>
            <input type="email" id="email" name="email" required autofocus class="w-full pl-10 pr-3 py-2.5 text-sm rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#002654] focus:border-[#002654] transition-all" placeholder="admin@slfbc.lk">
          </div>
        </div>

        <div class="mb-6">
          <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Access Passphrase</label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
              <span class="material-symbols-outlined text-lg">lock</span>
            </span>
            <input type="password" id="password" name="password" required class="w-full pl-10 pr-3 py-2.5 text-sm rounded-lg border border-slate-300 focus:ring-2 focus:ring-[#002654] focus:border-[#002654] transition-all" placeholder="••••••••••••">
          </div>
        </div>

        <button type="submit" class="w-full py-3 px-4 bg-[#002654] hover:bg-[#001c3f] text-white font-bold rounded-lg text-sm uppercase tracking-wider transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2">
          <span class="material-symbols-outlined text-base">login</span> Authenticate Session
        </button>
      </form>
    </div>

    <!-- Security Footer -->
    <div class="text-center mt-6 text-xs text-slate-500">
      <p>&copy; <?= date('Y') ?> Sri Lanka–France Business Council.</p>
      <p class="mt-1"><a href="<?= \App\Core\View::url('') ?>" class="text-slate-400 hover:text-white underline">Return to Public Portal</a></p>
    </div>
  </div>
</body>
</html>
