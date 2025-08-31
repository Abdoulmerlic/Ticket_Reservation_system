/* ===== UTILITY FUNCTIONS ===== */

// Global configuration
const CONFIG = {
  breakpoints: {
    mobile: 640,
    tablet: 768,
    desktop: 1024,
    wide: 1280,
  },
  animations: {
    duration: 250,
    easing: "ease-in-out",
  },
};

// Utility functions
const Utils = {
  // DOM utilities
  $(selector) {
    return document.querySelector(selector);
  },

  $$(selector) {
    return document.querySelectorAll(selector);
  },

  // Event handling
  on(element, event, handler, options = {}) {
    element.addEventListener(event, handler, options);
  },

  off(element, event, handler) {
    element.removeEventListener(event, handler);
  },

  // Responsive utilities
  isMobile() {
    return window.innerWidth <= CONFIG.breakpoints.mobile;
  },

  isTablet() {
    return (
      window.innerWidth > CONFIG.breakpoints.mobile &&
      window.innerWidth <= CONFIG.breakpoints.tablet
    );
  },

  isDesktop() {
    return window.innerWidth > CONFIG.breakpoints.tablet;
  },

  // Animation utilities
  animate(element, properties, duration = CONFIG.animations.duration) {
    return new Promise((resolve) => {
      element.style.transition = `all ${duration}ms ${CONFIG.animations.easing}`;

      Object.keys(properties).forEach((property) => {
        element.style[property] = properties[property];
      });

      setTimeout(resolve, duration);
    });
  },

  // Storage utilities
  storage: {
    get(key) {
      try {
        return JSON.parse(localStorage.getItem(key));
      } catch {
        return null;
      }
    },

    set(key, value) {
      try {
        localStorage.setItem(key, JSON.stringify(value));
        return true;
      } catch {
        return false;
      }
    },

    remove(key) {
      localStorage.removeItem(key);
    },
  },

  // Validation utilities
  validate: {
    email(email) {
      const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return regex.test(email);
    },

    phone(phone) {
      const regex = /^[\+]?[1-9][\d]{0,15}$/;
      return regex.test(phone.replace(/\s/g, ""));
    },

    required(value) {
      return (
        value !== null && value !== undefined && value.toString().trim() !== ""
      );
    },
  },
};

// Export for global use
window.Utils = Utils;
window.CONFIG = CONFIG;
