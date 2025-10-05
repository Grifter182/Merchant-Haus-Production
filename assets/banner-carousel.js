const BANNER_ENDPOINT = '/.netlify/functions/list-assets?type=banner';
const INTEGRATIONS_ENDPOINT = '/.netlify/functions/list-assets?type=integrations';

const FALLBACK_BANNER_IMAGES = [
  'card1.webp',
  'card2.webp',
  'card3.webp',
  'card4.webp',
  'card5.webp',
  'card6.webp',
  'card7.webp',
  'card8.webp',
  'card9.webp',
  'card10.webp'
];

const FALLBACK_INTEGRATION_IMAGES = [
  'bigcommerce.webp',
  'clover.webp',
  'freshbooks.webp',
  'hubspot.webp',
  'keap.webp',
  'lightspeed.webp',
  'magento.webp',
  'mastercard.webp',
  'memberpress.svg',
  'ncr.webp',
  'quickbooks.webp',
  'salesforce.webp',
  'squarespace.webp',
  'vend.webp',
  'visa.webp',
  'wix.webp',
  'woocommerce.webp',
  'zoho_crm.webp'
];

const CARD_DETAILS = {
  'Mobile Payments': 'Accept tap, chip, and swipe transactions from handheld readers with offline safeguards and instant digital receipts.',
  'Smart Routing': 'Automatically steer each transaction to the least-cost, highest-approval processor to minimize declines and interchange fees.',
  'Invoicing': 'Create branded invoices with payment links, automated reminders, and partial payment tracking in a single dashboard.',
  'Recurring Billing': 'Manage subscriptions and installment plans with smart retries, automated dunning, and flexible billing cadences.',
  'Secure Tokenization': 'Replace card numbers with vaulted tokens so you can stay PCI compliant while enabling one-click payments everywhere.',
  'Detailed Reporting': 'Visualize deposits, settlements, disputes, and channel performance with real-time filters and export-ready reports.',
  'Automation': 'Trigger workflows across your CRM, fulfillment, and accounting tools the moment payments succeed or fail.',
  'ACH Payments': 'Offer low-cost bank transfers with instant account verification, configurable limits, and automated reconciliation.',
  'Fraud Prevention': 'Layer device intelligence, risk scoring, and velocity controls to stop fraudsters without blocking good customers.',
  'Global Payments': 'Launch in new markets with multi-currency pricing, localized payment methods, and dynamic FX management.'
};

const ready = () => new Promise((resolve) => {
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', resolve, { once: true });
  } else {
    resolve();
  }
});

async function fetchAssetList(endpoint, fallbackFiles, fallbackBasePath) {
  try {
    const response = await fetch(endpoint, { headers: { 'Cache-Control': 'no-cache' } });
    if (!response.ok) throw new Error(`Request failed: ${response.status}`);
    const payload = await response.json();
    const files = Array.isArray(payload.files) ? payload.files : [];
    const basePath = typeof payload.basePath === 'string' ? payload.basePath : fallbackBasePath;
    return { files, basePath };
  } catch (error) {
    console.warn(`[banner-carousel] Falling back to static manifest for ${endpoint}:`, error);
    return { files: fallbackFiles, basePath: fallbackBasePath };
  }
}

function buildImageList(primary, fallback, required) {
  const seen = new Set();
  const result = [];
  const combined = [...primary, ...fallback];
  for (const file of combined) {
    if (!file || seen.has(file)) continue;
    seen.add(file);
    result.push(file);
    if (result.length >= required) break;
  }
  return result;
}

function resolveAssetPath(basePath, fileName) {
  const normalizedBase = basePath.replace(/\/$/, '');
  return `${normalizedBase}/${fileName}`;
}

function applyBannerImages(slider, images, basePath) {
  const items = Array.from(slider.querySelectorAll('.item'));
  items.forEach((item, index) => {
    const card = item.querySelector('.service-card');
    if (!card) return;
    const fileName = images[index % images.length];
    const imageUrl = resolveAssetPath(basePath, fileName);
    card.style.setProperty('--panel-image', `url("${imageUrl}")`);
    card.dataset.imageSrc = imageUrl;
    card.dataset.imageFile = fileName;
  });
  slider.style.setProperty('--quantity', items.length);
}

function createExpansionOverlay() {
  const overlay = document.createElement('div');
  overlay.className = 'banner-expansion';
  overlay.innerHTML = `
    <div class="banner-expansion__backdrop" data-expansion-close></div>
    <div class="banner-expansion__card">
      <button type="button" class="banner-expansion__close" aria-label="Close service spotlight" data-expansion-close>&times;</button>
      <div class="banner-expansion__content">
        <h3 class="banner-expansion__title"></h3>
        <p class="banner-expansion__copy"></p>
      </div>
    </div>
  `;
  document.body.appendChild(overlay);

  const titleEl = overlay.querySelector('.banner-expansion__title');
  const copyEl = overlay.querySelector('.banner-expansion__copy');
  const cardEl = overlay.querySelector('.banner-expansion__card');

  const close = () => {
    if (!overlay.classList.contains('is-visible')) return;
    overlay.classList.remove('is-visible');
    document.body.classList.remove('banner-expansion--open');
  };

  overlay.addEventListener('click', (event) => {
    if (event.target.matches('[data-expansion-close]')) {
      close();
    }
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') close();
  });

  const open = (title, copy, imageUrl) => {
    titleEl.textContent = title;
    copyEl.textContent = copy;
    if (imageUrl) {
      cardEl.style.setProperty('--panel-image', `url("${imageUrl}")`);
    } else {
      cardEl.style.removeProperty('--panel-image');
    }
    overlay.classList.add('is-visible');
    document.body.classList.add('banner-expansion--open');
  };

  return { open, close, element: overlay };
}

function initBannerCarousel(slider) {
  const items = Array.from(slider.querySelectorAll('.item'));
  if (!items.length) return;

  const overlay = createExpansionOverlay();
  const angleStep = 360 / items.length;
  const state = {
    rotation: 0,
    velocity: 0,
    pointerActive: false,
    dragMoved: false,
    preventClick: false,
    pointerStartX: 0,
    lastPointerX: 0,
    inertiaFrame: null,
    animationFrame: null,
    autoRotateTimer: null,
    isHovered: false,
    autoRotateSpeed: 0.08, // Slightly reduced speed for smoother rotation
    dragSensitivity: 0.5 // Enhanced drag responsiveness
  };

  const setRotation = (value) => {
    state.rotation = value;
    // Apply rotation to the slider transform, maintaining the perspective and rotateX
    slider.style.transform = `perspective(1500px) rotateX(-18deg) rotateY(${value}deg)`;
    updateActive();
    updateCardZIndexes(); // Enhanced z-index management
  };

  // Enhanced z-index management for front/back sliders
  const updateCardZIndexes = () => {
    const frontSlider = document.getElementById('front-slider');
    const backSlider = document.getElementById('back-slider');
    if (!frontSlider || !backSlider) return;

    items.forEach(item => {
      const position = parseInt(item.style.getPropertyValue('--position'));
      const itemAngle = (position - 1) * angleStep;
      let effectiveAngle = (state.rotation + itemAngle) % 360;
      if (effectiveAngle < 0) effectiveAngle += 360;

      if (effectiveAngle > 90 && effectiveAngle < 270) {
        if (item.parentElement !== backSlider) {
          backSlider.appendChild(item);
        }
      } else {
        if (item.parentElement !== frontSlider) {
          frontSlider.appendChild(item);
        }
      }
    });
  };

  const cancelInertia = () => {
    if (state.inertiaFrame) {
      cancelAnimationFrame(state.inertiaFrame);
      state.inertiaFrame = null;
    }
    state.velocity = 0;
  };

  const cancelAnimation = () => {
    if (state.animationFrame) {
      cancelAnimationFrame(state.animationFrame);
      state.animationFrame = null;
    }
  };

  const startAutoRotation = () => {
    if (state.autoRotateTimer) {
      cancelAnimationFrame(state.autoRotateTimer);
    }
    
    const autoRotate = () => {
      if (!state.pointerActive && !state.isHovered && !document.body.classList.contains('banner-expansion--open')) {
        setRotation(state.rotation - state.autoRotateSpeed);
      }
      state.autoRotateTimer = requestAnimationFrame(autoRotate);
    };
    
    state.autoRotateTimer = requestAnimationFrame(autoRotate);
  };

  const stopAutoRotation = () => {
    if (state.autoRotateTimer) {
      cancelAnimationFrame(state.autoRotateTimer);
      state.autoRotateTimer = null;
    }
  };

  const normalizeIndex = (value) => {
    const size = items.length;
    return ((value % size) + size) % size;
  };

  const getIndexFromRotation = (rotation) => {
    const raw = Math.round((-rotation) / angleStep);
    return normalizeIndex(raw);
  };

  const updateActive = () => {
    const activeIndex = getIndexFromRotation(state.rotation);
    items.forEach((item, index) => {
      item.classList.toggle('is-active', index === activeIndex);
    });
  };

  const shortestAngleDifference = (from, to) => {
    let diff = ((to - from + 540) % 360) - 180;
    if (diff < -180) diff += 360;
    return diff;
  };

  const focusOnIndex = (targetIndex, duration = 520) => {
    cancelInertia();
    cancelAnimation();
    const targetRotation = -targetIndex * angleStep;
    const startRotation = state.rotation;
    const delta = shortestAngleDifference(startRotation, targetRotation);
    if (Math.abs(delta) < 0.01) {
      setRotation(targetRotation);
      return Promise.resolve(targetIndex);
    }
    return new Promise((resolve) => {
      const startTime = performance.now();
      const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);
      const step = (now) => {
        const elapsed = now - startTime;
        const progress = Math.min(1, elapsed / duration);
        const eased = easeOutCubic(progress);
        setRotation(startRotation + delta * eased);
        if (progress < 1) {
          state.animationFrame = requestAnimationFrame(step);
        } else {
          cancelAnimation();
          setRotation(targetRotation);
          resolve(targetIndex);
        }
      };
      state.animationFrame = requestAnimationFrame(step);
    });
  };

  const snapToNearest = () => {
    const index = getIndexFromRotation(state.rotation);
    focusOnIndex(index, 360);
  };

  const startInertia = () => {
    cancelAnimation();
    if (Math.abs(state.velocity) < 0.05) {
      snapToNearest();
      return;
    }
    const friction = 0.92; // Slightly more friction for better control
    const step = () => {
      state.velocity *= friction;
      if (Math.abs(state.velocity) < 0.05) {
        cancelInertia();
        snapToNearest();
        return;
      }
      setRotation(state.rotation + state.velocity);
      state.inertiaFrame = requestAnimationFrame(step);
    };
    state.inertiaFrame = requestAnimationFrame(step);
  };

  // Enhanced pointer event handling
  const pointerDown = (event) => {
    if (document.body.classList.contains('banner-expansion--open')) return;
    state.pointerActive = true;
    state.dragMoved = false;
    state.pointerStartX = event.clientX || event.touches?.[0]?.clientX || 0;
    state.lastPointerX = state.pointerStartX;
    slider.classList.add('is-grabbing', 'dragging');
    document.body.classList.add('grabbing');
    cancelAnimation();
    cancelInertia();
    stopAutoRotation();
    if (event.pointerId) slider.setPointerCapture(event.pointerId);
  };

  const pointerMove = (event) => {
    if (!state.pointerActive) return;
    event.preventDefault();
    const currentX = event.clientX || event.touches?.[0]?.clientX || state.lastPointerX;
    const deltaX = currentX - state.lastPointerX;
    
    if (!state.dragMoved && Math.abs(currentX - state.pointerStartX) > 5) {
      state.dragMoved = true;
    }
    
    const deltaRotation = deltaX * state.dragSensitivity;
    state.velocity = deltaRotation;
    setRotation(state.rotation - deltaRotation); // Inverted for natural feel
    state.lastPointerX = currentX;
  };

  const pointerUp = (event) => {
    if (!state.pointerActive) return;
    if (event.pointerId) slider.releasePointerCapture(event.pointerId);
    state.pointerActive = false;
    slider.classList.remove('is-grabbing', 'dragging');
    document.body.classList.remove('grabbing');
    
    if (state.dragMoved) {
      state.preventClick = true;
      setTimeout(() => {
        state.preventClick = false;
      }, 100);
      startInertia();
    } else {
      snapToNearest();
    }
    
    state.dragMoved = false;
    state.pointerStartX = 0;
    state.lastPointerX = 0;
    
    // Resume auto-rotation after interaction
    setTimeout(() => {
      if (!state.isHovered) {
        startAutoRotation();
      }
    }, 1500);
  };

  // Enhanced event listeners with touch support
  slider.addEventListener('pointerdown', pointerDown);
  slider.addEventListener('pointermove', pointerMove);
  slider.addEventListener('pointerup', pointerUp);
  slider.addEventListener('pointercancel', pointerUp);
  slider.addEventListener('touchstart', (e) => pointerDown(e.touches[0]), { passive: true });
  slider.addEventListener('touchmove', (e) => pointerMove(e.touches[0]), { passive: true });
  slider.addEventListener('touchend', pointerUp);
  
  slider.addEventListener('pointerleave', () => {
    if (!state.pointerActive) return;
    state.pointerActive = false;
    slider.classList.remove('is-grabbing', 'dragging');
    document.body.classList.remove('grabbing');
    startInertia();
    state.dragMoved = false;
  });

  // Enhanced hover management
  const banner = document.querySelector('.banner');
  if (banner) {
    banner.addEventListener('mouseenter', () => {
      state.isHovered = true;
      stopAutoRotation();
    });

    banner.addEventListener('mouseleave', () => {
      state.isHovered = false;
      if (!state.pointerActive) {
        setTimeout(startAutoRotation, 1000);
      }
    });
  }

  items.forEach((item, index) => {
    item.dataset.index = String(index);
    item.addEventListener('click', (event) => {
      if (state.preventClick || state.dragMoved) {
        event.preventDefault();
        return;
      }
      focusOnIndex(index, 520).then(() => {
        const card = item.querySelector('.service-card');
        if (!card) return;
        const nameEl = card.querySelector('.service-name');
        const serviceName = nameEl ? nameEl.textContent.trim() : 'Service Spotlight';
        const description = CARD_DETAILS[serviceName] || 'Explore how this capability strengthens your payment experience and keeps customers moving forward.';
        overlay.open(serviceName, description, card.dataset.imageSrc);
      });
    });
  });

  // Initialize
  setRotation(0);
  updateCardZIndexes();
  startAutoRotation();
}

async function initIntegrationsCarousel() {
  const track = document.getElementById('integrations-track');
  if (!track) return;
  const { files, basePath } = await fetchAssetList(INTEGRATIONS_ENDPOINT, FALLBACK_INTEGRATION_IMAGES, 'assets/integrations');
  const uniqueLogos = buildImageList(files, FALLBACK_INTEGRATION_IMAGES, files.length || FALLBACK_INTEGRATION_IMAGES.length);
  if (!uniqueLogos.length) return;
  track.innerHTML = '';
  const seamlessList = uniqueLogos.concat(uniqueLogos);
  seamlessList.forEach((fileName) => {
    const logoName = fileName.replace(/\.[^.]+$/, '').replace(/[_-]+/g, ' ');
    const item = document.createElement('div');
    item.className = 'integration-item flex-shrink-0';
    const img = document.createElement('img');
    img.src = resolveAssetPath(basePath, fileName);
    img.alt = `${logoName} Logo`;
    img.loading = 'lazy';
    img.className = 'integration-logo h-10 sm:h-12 object-contain';
    if (/shopify|gohighlevel/i.test(fileName)) {
      img.classList.add('integration-logo--xl');
    }
    item.appendChild(img);
    track.appendChild(item);
  });
}

async function init() {
  await ready();
  const slider = document.querySelector('#back-slider');
  if (slider) {
    const itemCount = slider.querySelectorAll('.item').length || FALLBACK_BANNER_IMAGES.length;
    const { files, basePath } = await fetchAssetList(BANNER_ENDPOINT, FALLBACK_BANNER_IMAGES, 'assets/img');
    const images = buildImageList(files, FALLBACK_BANNER_IMAGES, itemCount);
    applyBannerImages(slider, images, basePath);
    initBannerCarousel(slider);
  }
  initIntegrationsCarousel();
}

init();
