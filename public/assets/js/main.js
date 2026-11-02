/**
 * Sri Lanka–France Business Council (SLFBC)
 * Public Frontend Interactions & Accessibility Enhancements
 */

document.addEventListener('DOMContentLoaded', function () {
  // 1. Mobile Navigation Drawer
  const mobileToggle = document.getElementById('mobile-nav-toggle');
  const mobileDrawer = document.getElementById('mobile-drawer');
  const mobileClose = document.getElementById('mobile-drawer-close');

  if (mobileToggle && mobileDrawer) {
    mobileToggle.addEventListener('click', function () {
      const isOpen = mobileDrawer.classList.contains('open');
      if (isOpen) {
        closeDrawer();
      } else {
        openDrawer();
      }
    });

    if (mobileClose) {
      mobileClose.addEventListener('click', closeDrawer);
    }

    mobileDrawer.addEventListener('click', function (e) {
      if (e.target === mobileDrawer) {
        closeDrawer();
      }
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && mobileDrawer.classList.contains('open')) {
        closeDrawer();
      }
    });

    function openDrawer() {
      mobileDrawer.classList.add('open');
      mobileToggle.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
      mobileDrawer.classList.remove('open');
      mobileToggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }
  }

  // 2. Interactive Member Directory Live Search & Filter
  const memberSearchInput = document.getElementById('member-search-input');
  const memberSectorSelect = document.getElementById('member-sector-select');
  const memberGrid = document.getElementById('member-directory-grid');

  if (memberSearchInput && memberGrid) {
    let debounceTimer;

    const filterMembers = function () {
      const query = memberSearchInput.value.toLowerCase().trim();
      const sector = memberSectorSelect ? memberSectorSelect.value : '';
      const cards = memberGrid.querySelectorAll('.member-card');
      let visibleCount = 0;

      cards.forEach(function (card) {
        const name = (card.getAttribute('data-name') || '').toLowerCase();
        const cardSector = card.getAttribute('data-sector-id') || '';
        const desc = (card.getAttribute('data-description') || '').toLowerCase();

        const matchesQuery = !query || name.includes(query) || desc.includes(query);
        const matchesSector = !sector || sector === 'all' || cardSector === sector;

        if (matchesQuery && matchesSector) {
          card.style.display = '';
          visibleCount++;
        } else {
          card.style.display = 'none';
        }
      });

      const emptyState = document.getElementById('member-empty-state');
      if (emptyState) {
        emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
      }
    };

    memberSearchInput.addEventListener('input', function () {
      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(filterMembers, 200);
    });

    if (memberSectorSelect) {
      memberSectorSelect.addEventListener('change', filterMembers);
    }
  }

  // 3. Event Tab Switching (Upcoming vs Past)
  const eventTabs = document.querySelectorAll('.event-tab-btn');
  if (eventTabs.length > 0) {
    eventTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        eventTabs.forEach(t => {
          t.classList.remove('active', 'text-[#002654]', 'border-[#002654]', 'font-bold', 'bg-primary', 'text-white');
          t.classList.add('text-slate-500', 'border-transparent', 'font-semibold');
        });

        this.classList.add('active', 'text-[#002654]', 'border-[#002654]', 'font-bold');
        this.classList.remove('text-slate-500', 'border-transparent', 'font-semibold', 'bg-slate-100');

        const targetId = this.getAttribute('data-target');
        const panes = document.querySelectorAll('.event-tab-pane');
        panes.forEach(pane => {
          if (pane.id === targetId || (targetId === 'upcoming' && pane.id === 'events-upcoming-container') || (targetId === 'past' && pane.id === 'events-past-container') || (targetId === 'upcomingEventsTab' && pane.id === 'upcomingEventsTab') || (targetId === 'pastEventsTab' && pane.id === 'pastEventsTab')) {
            pane.classList.remove('hidden');
            pane.style.display = '';
          } else {
            pane.classList.add('hidden');
            pane.style.display = 'none';
          }
        });
      });
    });
  }

  // 4. File Upload Validation (Client-Side Feedback)
  const fileInputs = document.querySelectorAll('input[type="file"][data-max-size]');
  fileInputs.forEach(function (input) {
    input.addEventListener('change', function () {
      const maxMb = parseFloat(this.getAttribute('data-max-size') || '10');
      const maxBytes = maxMb * 1024 * 1024;
      const file = this.files[0];

      const feedbackElem = this.parentElement.querySelector('.file-feedback') || document.createElement('div');
      feedbackElem.className = 'file-feedback text-xs mt-1 font-semibold';
      this.parentElement.appendChild(feedbackElem);

      if (file) {
        if (file.size > maxBytes) {
          feedbackElem.textContent = `File "${file.name}" exceeds the maximum ${maxMb}MB limit.`;
          feedbackElem.className = 'file-feedback text-xs mt-1 text-red-600 font-bold';
          this.value = '';
        } else {
          const sizeKb = Math.round(file.size / 1024);
          feedbackElem.textContent = `Selected: ${file.name} (${sizeKb} KB)`;
          feedbackElem.className = 'file-feedback text-xs mt-1 text-emerald-700 font-semibold';
        }
      } else {
        feedbackElem.textContent = '';
      }
    });
  });

  // 5. Flash Alert Auto-dismiss after 6 seconds
  const autoDismissAlerts = document.querySelectorAll('.alert-auto-dismiss');
  autoDismissAlerts.forEach(function (alert) {
    setTimeout(function () {
      alert.style.transition = 'opacity 0.5s ease';
      alert.style.opacity = '0';
      setTimeout(() => alert.remove(), 500);
    }, 6000);
  });
});
