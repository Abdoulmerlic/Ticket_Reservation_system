/* ===== MODERN JAVASCRIPT FRAMEWORK ===== */

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
  api: {
    baseUrl: "",
    timeout: 10000,
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

// Navigation Manager
class NavigationManager {
  constructor() {
    this.header = Utils.$(".header");
    this.sidebar = Utils.$(".sidebar");
    this.mobileMenuToggle = Utils.$(".mobile-menu-toggle");
    this.nav = Utils.$(".nav");
    this.mainContent = Utils.$(".main-content");
    this.footer = Utils.$(".footer");

    this.isSidebarOpen = false;
    this.isMobileMenuOpen = false;

    this.init();
  }

  init() {
    this.setupEventListeners();
    this.handleResize();
    this.setupScrollEffects();
  }

  setupEventListeners() {
    // Mobile menu toggle
    if (this.mobileMenuToggle) {
      Utils.on(this.mobileMenuToggle, "click", () => this.toggleMobileMenu());
    }

    // Sidebar toggle
    Utils.on(document, "click", (e) => {
      if (e.target.matches(".sidebar-toggle")) {
        this.toggleSidebar();
      }
    });

    // Close mobile menu when clicking outside
    Utils.on(document, "click", (e) => {
      if (
        this.isMobileMenuOpen &&
        !e.target.closest(".nav") &&
        !e.target.closest(".mobile-menu-toggle")
      ) {
        this.closeMobileMenu();
      }
    });

    // Handle window resize
    Utils.on(window, "resize", () => this.handleResize());

    // Handle scroll
    Utils.on(window, "scroll", () => this.handleScroll());
  }

  toggleMobileMenu() {
    this.isMobileMenuOpen = !this.isMobileMenuOpen;

    if (this.mobileMenuToggle) {
      this.mobileMenuToggle.classList.toggle("active", this.isMobileMenuOpen);
    }

    if (this.nav) {
      this.nav.classList.toggle("mobile-open", this.isMobileMenuOpen);
    }
  }

  closeMobileMenu() {
    this.isMobileMenuOpen = false;

    if (this.mobileMenuToggle) {
      this.mobileMenuToggle.classList.remove("active");
    }

    if (this.nav) {
      this.nav.classList.remove("mobile-open");
    }
  }

  toggleSidebar() {
    this.isSidebarOpen = !this.isSidebarOpen;

    if (this.sidebar) {
      this.sidebar.classList.toggle("hidden", !this.isSidebarOpen);
    }

    if (this.mainContent) {
      this.mainContent.classList.toggle("full-width", !this.isSidebarOpen);
    }

    if (this.footer) {
      this.footer.classList.toggle("full-width", !this.isSidebarOpen);
    }
  }

  handleResize() {
    if (Utils.isDesktop()) {
      this.closeMobileMenu();
      if (this.sidebar) {
        this.sidebar.classList.remove("hidden");
      }
      if (this.mainContent) {
        this.mainContent.classList.remove("full-width");
      }
      if (this.footer) {
        this.footer.classList.remove("full-width");
      }
    } else {
      if (this.sidebar) {
        this.sidebar.classList.add("hidden");
      }
      if (this.mainContent) {
        this.mainContent.classList.add("full-width");
      }
      if (this.footer) {
        this.footer.classList.add("full-width");
      }
    }
  }

  setupScrollEffects() {
    let lastScrollTop = 0;

    Utils.on(window, "scroll", () => {
      const scrollTop =
        window.pageYOffset || document.documentElement.scrollTop;

      // Header scroll effect
      if (this.header) {
        if (scrollTop > 100) {
          this.header.classList.add("scrolled");
        } else {
          this.header.classList.remove("scrolled");
        }
      }

      // Hide/show header on scroll
      if (scrollTop > lastScrollTop && scrollTop > 100) {
        // Scrolling down
        if (this.header) {
          this.header.style.transform = "translateY(-100%)";
        }
      } else {
        // Scrolling up
        if (this.header) {
          this.header.style.transform = "translateY(0)";
        }
      }

      lastScrollTop = scrollTop;
    });
  }

  handleScroll() {
    // Add scroll-based animations
    const elements = Utils.$$(".animate-on-scroll");

    elements.forEach((element) => {
      const rect = element.getBoundingClientRect();
      const isVisible = rect.top < window.innerHeight && rect.bottom > 0;

      if (isVisible) {
        element.classList.add("animate-fade-in");
      }
    });
  }
}

// Form Manager
class FormManager {
  constructor() {
    this.forms = Utils.$$("form");
    this.init();
  }

  init() {
    this.setupFormValidation();
    this.setupFormSubmissions();
    this.setupAutoSave();
  }

  setupFormValidation() {
    this.forms.forEach((form) => {
      const inputs = form.querySelectorAll("input, select, textarea");

      inputs.forEach((input) => {
        // Real-time validation
        Utils.on(input, "blur", () => this.validateField(input));
        Utils.on(input, "input", () => this.clearFieldError(input));

        // Auto-format inputs
        if (input.type === "tel") {
          Utils.on(input, "input", (e) => this.formatPhoneNumber(e.target));
        }

        if (input.type === "email") {
          Utils.on(input, "input", (e) => this.validateEmail(e.target));
        }
      });
    });
  }

  validateField(field) {
    const value = field.value.trim();
    const type = field.type;
    const required = field.hasAttribute("required");

    // Clear previous errors
    this.clearFieldError(field);

    // Required validation
    if (required && !Utils.validate.required(value)) {
      this.showFieldError(field, "This field is required");
      return false;
    }

    // Type-specific validation
    if (value && type === "email" && !Utils.validate.email(value)) {
      this.showFieldError(field, "Please enter a valid email address");
      return false;
    }

    if (value && type === "tel" && !Utils.validate.phone(value)) {
      this.showFieldError(field, "Please enter a valid phone number");
      return false;
    }

    return true;
  }

  showFieldError(field, message) {
    field.classList.add("error");

    // Remove existing error message
    const existingError = field.parentNode.querySelector(".error-message");
    if (existingError) {
      existingError.remove();
    }

    // Add new error message
    const errorElement = document.createElement("div");
    errorElement.className = "error-message";
    errorElement.textContent = message;
    field.parentNode.appendChild(errorElement);
  }

  clearFieldError(field) {
    field.classList.remove("error");
    const errorMessage = field.parentNode.querySelector(".error-message");
    if (errorMessage) {
      errorMessage.remove();
    }
  }

  formatPhoneNumber(input) {
    let value = input.value.replace(/\D/g, "");

    if (value.length > 0) {
      if (value.length <= 3) {
        value = `(${value}`;
      } else if (value.length <= 6) {
        value = `(${value.slice(0, 3)}) ${value.slice(3)}`;
      } else {
        value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(
          6,
          10
        )}`;
      }
    }

    input.value = value;
  }

  validateEmail(input) {
    const isValid = Utils.validate.email(input.value);
    input.classList.toggle("valid", isValid);
    input.classList.toggle("invalid", !isValid && input.value.length > 0);
  }

  setupFormSubmissions() {
    this.forms.forEach((form) => {
      Utils.on(form, "submit", (e) => this.handleFormSubmit(e));
    });
  }

  async handleFormSubmit(e) {
    e.preventDefault();

    const form = e.target;
    const submitButton = form.querySelector('button[type="submit"]');
    const originalText = submitButton?.textContent;

    // Validate all fields
    const inputs = form.querySelectorAll("input, select, textarea");
    let isValid = true;

    inputs.forEach((input) => {
      if (!this.validateField(input)) {
        isValid = false;
      }
    });

    if (!isValid) {
      return false;
    }

    // Show loading state
    if (submitButton) {
      submitButton.disabled = true;
      submitButton.textContent = "Processing...";
      submitButton.classList.add("loading");
    }

    try {
      // Simulate form submission
      await this.submitForm(form);

      // Show success message
      this.showSuccessMessage(form, "Form submitted successfully!");
    } catch (error) {
      // Show error message
      this.showErrorMessage(
        form,
        error.message || "An error occurred. Please try again."
      );
    } finally {
      // Reset button state
      if (submitButton) {
        submitButton.disabled = false;
        submitButton.textContent = originalText;
        submitButton.classList.remove("loading");
      }
    }
  }

  async submitForm(form) {
    // Simulate API call
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        // Simulate 90% success rate
        if (Math.random() > 0.1) {
          resolve();
        } else {
          reject(new Error("Network error"));
        }
      }, 2000);
    });
  }

  showSuccessMessage(form, message) {
    const alert = document.createElement("div");
    alert.className = "alert alert-success";
    alert.textContent = message;

    form.parentNode.insertBefore(alert, form);

    setTimeout(() => {
      alert.remove();
    }, 5000);
  }

  showErrorMessage(form, message) {
    const alert = document.createElement("div");
    alert.className = "alert alert-error";
    alert.textContent = message;

    form.parentNode.insertBefore(alert, form);

    setTimeout(() => {
      alert.remove();
    }, 5000);
  }

  setupAutoSave() {
    this.forms.forEach((form) => {
      const formId =
        form.id || "form-" + Math.random().toString(36).substr(2, 9);
      const inputs = form.querySelectorAll("input, select, textarea");

      inputs.forEach((input) => {
        Utils.on(input, "input", () => {
          this.saveFormData(formId, form);
        });
      });

      // Restore saved data
      this.restoreFormData(formId, form);
    });
  }

  saveFormData(formId, form) {
    const formData = new FormData(form);
    const data = {};

    for (let [key, value] of formData.entries()) {
      data[key] = value;
    }

    Utils.storage.set(`form_${formId}`, data);
  }

  restoreFormData(formId, form) {
    const savedData = Utils.storage.get(`form_${formId}`);

    if (savedData) {
      Object.keys(savedData).forEach((key) => {
        const input = form.querySelector(`[name="${key}"]`);
        if (input) {
          input.value = savedData[key];
        }
      });
    }
  }
}

// UI Components Manager
class UIComponentsManager {
  constructor() {
    this.init();
  }

  init() {
    this.setupModals();
    this.setupTooltips();
    this.setupDropdowns();
    this.setupTabs();
    this.setupAccordions();
    this.setupProgressBars();
  }

  setupModals() {
    const modalTriggers = Utils.$$("[data-modal]");

    modalTriggers.forEach((trigger) => {
      Utils.on(trigger, "click", (e) => {
        e.preventDefault();
        const modalId = trigger.getAttribute("data-modal");
        this.openModal(modalId);
      });
    });

    // Close modal on backdrop click
    Utils.on(document, "click", (e) => {
      if (e.target.classList.contains("modal-backdrop")) {
        this.closeModal(e.target.querySelector(".modal"));
      }
    });

    // Close modal on escape key
    Utils.on(document, "keydown", (e) => {
      if (e.key === "Escape") {
        const openModal = Utils.$(".modal.show");
        if (openModal) {
          this.closeModal(openModal);
        }
      }
    });
  }

  openModal(modalId) {
    const modal = Utils.$(`#${modalId}`);
    if (modal) {
      modal.classList.add("show");
      document.body.style.overflow = "hidden";

      // Focus first input
      const firstInput = modal.querySelector("input, select, textarea");
      if (firstInput) {
        firstInput.focus();
      }
    }
  }

  closeModal(modal) {
    if (modal) {
      modal.classList.remove("show");
      document.body.style.overflow = "";
    }
  }

  setupTooltips() {
    const tooltipElements = Utils.$$("[data-tooltip]");

    tooltipElements.forEach((element) => {
      Utils.on(element, "mouseenter", (e) => this.showTooltip(e));
      Utils.on(element, "mouseleave", (e) => this.hideTooltip(e));
    });
  }

  showTooltip(e) {
    const element = e.target;
    const text = element.getAttribute("data-tooltip");

    const tooltip = document.createElement("div");
    tooltip.className = "tooltip";
    tooltip.textContent = text;

    document.body.appendChild(tooltip);

    const rect = element.getBoundingClientRect();
    tooltip.style.left =
      rect.left + rect.width / 2 - tooltip.offsetWidth / 2 + "px";
    tooltip.style.top = rect.top - tooltip.offsetHeight - 8 + "px";

    element.tooltip = tooltip;
  }

  hideTooltip(e) {
    const element = e.target;
    if (element.tooltip) {
      element.tooltip.remove();
      element.tooltip = null;
    }
  }

  setupDropdowns() {
    const dropdowns = Utils.$$(".dropdown");

    dropdowns.forEach((dropdown) => {
      const trigger = dropdown.querySelector(".dropdown-trigger");
      const menu = dropdown.querySelector(".dropdown-menu");

      if (trigger && menu) {
        Utils.on(trigger, "click", (e) => {
          e.preventDefault();
          this.toggleDropdown(dropdown);
        });
      }
    });

    // Close dropdowns when clicking outside
    Utils.on(document, "click", (e) => {
      if (!e.target.closest(".dropdown")) {
        this.closeAllDropdowns();
      }
    });
  }

  toggleDropdown(dropdown) {
    const isOpen = dropdown.classList.contains("open");

    this.closeAllDropdowns();

    if (!isOpen) {
      dropdown.classList.add("open");
    }
  }

  closeAllDropdowns() {
    const openDropdowns = Utils.$$(".dropdown.open");
    openDropdowns.forEach((dropdown) => {
      dropdown.classList.remove("open");
    });
  }

  setupTabs() {
    const tabContainers = Utils.$$(".tabs");

    tabContainers.forEach((container) => {
      const tabs = container.querySelectorAll(".tab");
      const contents = container.querySelectorAll(".tab-content");

      tabs.forEach((tab) => {
        Utils.on(tab, "click", (e) => {
          e.preventDefault();
          const target = tab.getAttribute("data-tab");
          this.switchTab(container, target);
        });
      });
    });
  }

  switchTab(container, targetId) {
    const tabs = container.querySelectorAll(".tab");
    const contents = container.querySelectorAll(".tab-content");

    // Remove active classes
    tabs.forEach((tab) => tab.classList.remove("active"));
    contents.forEach((content) => content.classList.remove("active"));

    // Add active classes
    const activeTab = container.querySelector(`[data-tab="${targetId}"]`);
    const activeContent = container.querySelector(`#${targetId}`);

    if (activeTab) activeTab.classList.add("active");
    if (activeContent) activeContent.classList.add("active");
  }

  setupAccordions() {
    const accordions = Utils.$$(".accordion");

    accordions.forEach((accordion) => {
      const items = accordion.querySelectorAll(".accordion-item");

      items.forEach((item) => {
        const trigger = item.querySelector(".accordion-trigger");
        const content = item.querySelector(".accordion-content");

        if (trigger && content) {
          Utils.on(trigger, "click", () => {
            this.toggleAccordionItem(item);
          });
        }
      });
    });
  }

  toggleAccordionItem(item) {
    const isOpen = item.classList.contains("open");
    const content = item.querySelector(".accordion-content");

    if (isOpen) {
      item.classList.remove("open");
      content.style.maxHeight = "0px";
    } else {
      // Close other items
      const parent = item.parentNode;
      const openItems = parent.querySelectorAll(".accordion-item.open");
      openItems.forEach((openItem) => {
        openItem.classList.remove("open");
        const openContent = openItem.querySelector(".accordion-content");
        if (openContent) openContent.style.maxHeight = "0px";
      });

      // Open current item
      item.classList.add("open");
      content.style.maxHeight = content.scrollHeight + "px";
    }
  }

  setupProgressBars() {
    const progressBars = Utils.$$(".progress-bar");

    progressBars.forEach((bar) => {
      const fill = bar.querySelector(".progress-fill");
      const percentage = bar.getAttribute("data-percentage") || 0;

      if (fill) {
        fill.style.width = percentage + "%";
      }
    });
  }
}

// Theme Manager
class ThemeManager {
  constructor() {
    this.currentTheme = Utils.storage.get("theme") || "light";
    this.init();
  }

  init() {
    this.applyTheme(this.currentTheme);
    this.setupThemeToggle();
  }

  applyTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    Utils.storage.set("theme", theme);
    this.currentTheme = theme;
  }

  setupThemeToggle() {
    const themeToggle = Utils.$(".theme-toggle");
    if (themeToggle) {
      Utils.on(themeToggle, "click", () => {
        const newTheme = this.currentTheme === "light" ? "dark" : "light";
        this.applyTheme(newTheme);
      });
    }
  }
}

// Performance Monitor
class PerformanceMonitor {
  constructor() {
    this.metrics = {};
    this.init();
  }

  init() {
    this.measurePageLoad();
    this.setupPerformanceObserver();
  }

  measurePageLoad() {
    window.addEventListener("load", () => {
      const navigation = performance.getEntriesByType("navigation")[0];

      this.metrics = {
        pageLoadTime: navigation.loadEventEnd - navigation.loadEventStart,
        domContentLoaded:
          navigation.domContentLoadedEventEnd -
          navigation.domContentLoadedEventStart,
        firstPaint: performance.getEntriesByType("paint")[0]?.startTime || 0,
        firstContentfulPaint:
          performance.getEntriesByType("paint")[1]?.startTime || 0,
      };

      console.log("Performance Metrics:", this.metrics);
    });
  }

  setupPerformanceObserver() {
    if ("PerformanceObserver" in window) {
      const observer = new PerformanceObserver((list) => {
        list.getEntries().forEach((entry) => {
          if (entry.entryType === "largest-contentful-paint") {
            this.metrics.largestContentfulPaint = entry.startTime;
          }
        });
      });

      observer.observe({ entryTypes: ["largest-contentful-paint"] });
    }
  }
}

// Initialize all managers when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  // Initialize managers
  window.navigationManager = new NavigationManager();
  window.formManager = new FormManager();
  window.uiComponentsManager = new UIComponentsManager();
  window.themeManager = new ThemeManager();
  window.performanceMonitor = new PerformanceMonitor();

  // Add global utility functions
  window.Utils = Utils;

  console.log("🚀 Modern UI Framework initialized successfully!");
});

// Export for module usage
if (typeof module !== "undefined" && module.exports) {
  module.exports = {
    Utils,
    NavigationManager,
    FormManager,
    UIComponentsManager,
    ThemeManager,
    PerformanceMonitor,
    CONFIG,
  };
}
