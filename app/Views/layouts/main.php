<!DOCTYPE html>
<html lang="en" class="light">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle ?? 'Sri Lanka–France Business Council | Ceylon Chamber of Commerce') ?></title>
  <meta name="description" content="<?= e($metaDescription ?? 'The Sri Lanka–France Business Council connects businesses, institutions and investors to strengthen bilateral commercial relationships between Sri Lanka and France.') ?>">
  <link rel="canonical" href="<?= e($canonicalUrl ?? url($_SERVER['REQUEST_URI'] ?? '/')) ?>">

  <!-- Open Graph Protocol -->
  <meta property="og:site_name" content="Sri Lanka–France Business Council">
  <meta property="og:title" content="<?= e($pageTitle ?? 'Sri Lanka–France Business Council | Ceylon Chamber of Commerce') ?>">
  <meta property="og:description" content="<?= e($metaDescription ?? 'Connecting Sri Lanka & France for Business, Trade and Investment.') ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= e($canonicalUrl ?? url($_SERVER['REQUEST_URI'] ?? '/')) ?>">
  <meta property="og:image" content="<?= asset('assets/images/bilateral-summit.jpg') ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="<?= asset('assets/images/logo.svg') ?>">

  <!-- Google Fonts: Merriweather & Source Sans 3 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400&family=Source+Sans+3:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

  <!-- Tailwind CSS Engine for dynamic utilities -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#002654",
            "primary-hover": "#001b3f",
            "primary-light": "#eef4ff",
            "secondary": "#b91c1c",
            "secondary-dark": "#991b1b",
            "gold": "#c59b27",
            "gold-dark": "#8d4004",
            "gold-light": "#fef3c7",
            "diplomatic-navy": "#0b1e3b",
            "surface-pure": "#ffffff",
            "surface-stone": "#f8fafc",
            "border-diplomatic": "#e2e8f0",
            "border-strong": "#cbd5e1",
            "text-main": "#0f172a",
            "text-muted": "#334155",
            "text-soft": "#64748b"
          },
          fontFamily: {
            "serif-diplomatic": ["Merriweather", "Georgia", "serif"],
            "sans-diplomatic": ["\"Source Sans 3\"", "-apple-system", "BlinkMacSystemFont", "sans-serif"],
          }
        }
      }
    }
  </script>

  <!-- Master Architectural Style -->
  <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>">
</head>
<body class="bg-white font-sans-diplomatic text-slate-800 antialiased min-h-screen flex flex-col">
  <!-- Skip to Content for Accessibility -->
  <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 focus:z-50 focus:px-4 focus:py-2 focus:bg-[#002654] focus:text-white focus:rounded">
    Skip to main content
  </a>

  <!-- Header -->
  <?php require __DIR__ . '/header.php'; ?>

  <!-- Flash Messages -->
  <?php if ($successMsg = flash('success')): ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 pt-6 w-full alert-auto-dismiss" role="alert">
      <div class="p-4 bg-emerald-50 border-l-4 border-emerald-600 rounded text-emerald-900 flex items-start gap-3 shadow-sm">
        <span class="material-symbols-outlined text-emerald-600 text-2xl shrink-0">check_circle</span>
        <div>
          <h4 class="font-bold text-sm">Success</h4>
          <p class="text-sm mt-0.5"><?= e($successMsg) ?></p>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($errorMsg = flash('error')): ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 pt-6 w-full" role="alert">
      <div class="p-4 bg-red-50 border-l-4 border-red-600 rounded text-red-900 flex items-start gap-3 shadow-sm">
        <span class="material-symbols-outlined text-red-600 text-2xl shrink-0">error</span>
        <div>
          <h4 class="font-bold text-sm">Notice</h4>
          <p class="text-sm mt-0.5"><?= e($errorMsg) ?></p>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Main Content Area -->
  <main id="main-content" class="flex-grow w-full">
    <?= $content ?>
  </main>

  <!-- Footer -->
  <?php require __DIR__ . '/footer.php'; ?>

  <!-- Core JavaScript -->
  <script src="<?= asset('assets/js/main.js') ?>"></script>
</body>
</html>
