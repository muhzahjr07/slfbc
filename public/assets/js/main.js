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

  // 6. Interactive Hero Content & Image Slider
  const heroSlider = document.getElementById('hero-slider');
  if (heroSlider) {
    const slides = heroSlider.querySelectorAll('.hero-slide');
    const dots = heroSlider.querySelectorAll('[data-hero-dot]');
    const prevBtn = heroSlider.querySelector('[data-hero-prev]');
    const nextBtn = heroSlider.querySelector('[data-hero-next]');
    let currentIndex = 0;
    let autoPlayTimer = null;

    function showSlide(index) {
      if (slides.length === 0) return;
      currentIndex = (index + slides.length) % slides.length;
      slides.forEach((slide, idx) => {
        if (idx === currentIndex) {
          slide.classList.add('active');
          slide.removeAttribute('aria-hidden');
        } else {
          slide.classList.remove('active');
          slide.setAttribute('aria-hidden', 'true');
        }
      });
      dots.forEach((dot, idx) => {
        if (idx === currentIndex) {
          dot.classList.add('w-8', 'bg-[#002654]');
          dot.classList.remove('w-2.5', 'bg-slate-300');
          dot.setAttribute('aria-current', 'true');
        } else {
          dot.classList.remove('w-8', 'bg-[#002654]');
          dot.classList.add('w-2.5', 'bg-slate-300');
          dot.removeAttribute('aria-current');
        }
      });
    }

    function startAutoPlay() {
      stopAutoPlay();
      autoPlayTimer = setInterval(() => showSlide(currentIndex + 1), 6500);
    }

    function stopAutoPlay() {
      if (autoPlayTimer) {
        clearInterval(autoPlayTimer);
        autoPlayTimer = null;
      }
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        showSlide(currentIndex - 1);
        startAutoPlay();
      });
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        showSlide(currentIndex + 1);
        startAutoPlay();
      });
    }
    dots.forEach((dot) => {
      dot.addEventListener('click', () => {
        const idx = parseInt(dot.getAttribute('data-hero-dot') || '0', 10);
        showSlide(idx);
        startAutoPlay();
      });
    });

    heroSlider.addEventListener('mouseenter', stopAutoPlay);
    heroSlider.addEventListener('mouseleave', startAutoPlay);
    startAutoPlay();
  }

  // 7. Universal Horizontal Scroll-Snap Carousels
  const carousels = document.querySelectorAll('[data-carousel]');
  carousels.forEach(function (carousel) {
    const track = carousel.querySelector('[data-carousel-track]');
    const prev = carousel.querySelector('[data-carousel-prev]');
    const next = carousel.querySelector('[data-carousel-next]');
    if (!track) return;

    const getScrollStep = () => {
      const firstItem = track.firstElementChild;
      return firstItem ? firstItem.getBoundingClientRect().width + 24 : 340;
    };

    if (prev) {
      prev.addEventListener('click', () => {
        track.scrollBy({ left: -getScrollStep(), behavior: 'smooth' });
      });
    }
    if (next) {
      next.addEventListener('click', () => {
        if (track.scrollLeft + track.clientWidth >= track.scrollWidth - 10) {
          track.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
          track.scrollBy({ left: getScrollStep(), behavior: 'smooth' });
        }
      });
    }
  });

  // 8. Interactive Accordions (FAQs & Constitution)
  const accordionToggles = document.querySelectorAll('[data-accordion-toggle]');
  accordionToggles.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const panel = this.nextElementSibling;
      const icon = this.querySelector('.accordion-icon');
      const isExpanded = this.getAttribute('aria-expanded') === 'true';

      this.setAttribute('aria-expanded', isExpanded ? 'false' : 'true');
      if (panel) {
        panel.classList.toggle('hidden', isExpanded);
      }
      if (icon) {
        icon.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
      }
    });
  });

  // 9. Gallery Category Filtering & Fullscreen Lightbox
  const galleryFilterBtns = document.querySelectorAll('[data-gallery-filter]');
  const galleryItems = document.querySelectorAll('[data-gallery-category]');
  if (galleryFilterBtns.length > 0) {
    galleryFilterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filter = this.getAttribute('data-gallery-filter');
        galleryFilterBtns.forEach(b => {
          b.classList.remove('bg-[#002654]', 'text-white', 'border-[#002654]');
          b.classList.add('bg-white', 'text-slate-700', 'border-slate-300');
        });
        this.classList.add('bg-[#002654]', 'text-white', 'border-[#002654]');
        this.classList.remove('bg-white', 'text-slate-700', 'border-slate-300');

        galleryItems.forEach(item => {
          const cat = item.getAttribute('data-gallery-category');
          if (filter === 'all' || cat === filter) {
            item.style.display = '';
          } else {
            item.style.display = 'none';
          }
        });
      });
    });
  }

  // Lightbox Modal Viewer
  const lightboxTriggers = document.querySelectorAll('[data-lightbox-src]');
  const lightboxModal = document.getElementById('slfbc-lightbox');
  if (lightboxTriggers.length > 0 && lightboxModal) {
    const lbImg = document.getElementById('slfbc-lightbox-img');
    const lbCaption = document.getElementById('slfbc-lightbox-caption');
    const lbClose = document.getElementById('slfbc-lightbox-close');

    lightboxTriggers.forEach(trigger => {
      trigger.addEventListener('click', function () {
        const src = this.getAttribute('data-lightbox-src');
        const title = this.getAttribute('data-lightbox-title') || '';
        if (lbImg) lbImg.src = src;
        if (lbCaption) lbCaption.textContent = title;
        lightboxModal.classList.remove('hidden');
        lightboxModal.classList.add('flex');
      });
    });

    const closeLightbox = () => {
      lightboxModal.classList.add('hidden');
      lightboxModal.classList.remove('flex');
    };

    if (lbClose) lbClose.addEventListener('click', closeLightbox);
    lightboxModal.addEventListener('click', (e) => {
      if (e.target === lightboxModal) closeLightbox();
    });
  }
});
