import os

MAIN_DIR = r"c:\Users\0610s\Music\Anshul_web\Anshul\Main"
MASTER_FOOTER = '''<footer class="w-full bg-[#1F4D3A] text-[#F7F1E3] border-t border-[#B38A3E]/30"><div class="max-w-[1440px] mx-auto px-6 lg:px-margin pt-space-xl pb-space-lg"><div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-gutter-lg pb-space-xl border-b border-[#B38A3E]/20"><div class="md:col-span-5 flex flex-col justify-start space-y-space-sm"><div class="flex flex-col items-start"><a href="home.html" data-path="home" class="inline-block select-none mb-2"><img src="images/logo.png" alt="ANUKUL Logo" class="h-16 w-auto object-contain bg-[#F7F1E3] p-1.5 rounded shadow-sm"></a></div><p class="font-body-md text-body-md text-surface-container-high/90 max-w-md pt-2">ANUKUL Ayur Vastu Harmony Clinic — Health • Space • Lifestyle • Harmony</p><p class="font-body-sm text-body-sm text-outline-variant max-w-sm pt-1">Anchored in classical Vedic sciences, spatial alignment, and holistic constitutional balance for serene modern living.</p></div><div class="md:col-span-4 flex flex-col justify-start space-y-3"><h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold">Explorations</h3><nav class="grid grid-cols-2 gap-y-2 gap-x-4"><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="home" href="home.html">Home</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="ayurveda" href="ayurveda.html">Ayurveda</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="vastu" href="vastu.html">Vastu</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="services" href="services.html">Services</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="shop" href="shop.html">Shop</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="blog" href="blog.html">Blog</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="gallery" href="gallery.html">Gallery</a><a class="font-body-sm text-body-sm text-surface-container-high/80 hover:text-[#B38A3E] transition-colors" data-path="contact" href="contact.html">Contact</a></nav></div><div class="md:col-span-3 flex flex-col justify-start space-y-3"><h3 class="font-label-md text-label-md uppercase text-[#B38A3E] tracking-widest font-semibold">Sanctuary Hours</h3><p class="font-body-sm text-body-sm text-surface-container-high/80">Monday — Saturday<br>08:00 AM – 07:00 PM IST</p><p class="font-body-sm text-body-sm text-surface-container-high/80 pt-2"><span class="text-[#B38A3E] font-medium">Location:</span> Prime Vedic Enclave, Cultural Quarter</p></div></div><div class="pt-space-md flex flex-col sm:flex-row items-center justify-between gap-4"><p class="font-body-sm text-body-sm text-outline-variant text-center sm:text-left">© 2025 ANUKUL Ayur Vastu Harmony Clinic. All rights reserved. Responsible Vedic Clinical Practice.</p><div class="flex items-center gap-6 font-body-sm text-body-sm text-surface-container-high/70"><a class="hover:text-[#B38A3E] transition-colors" data-path="privacy-policy" href="contact.html#privacy">Privacy Policy</a><span class="text-[#B38A3E]/40">•</span><a class="hover:text-[#B38A3E] transition-colors" data-path="terms" href="contact.html#terms">Terms</a><span class="text-[#B38A3E]/40">•</span><a class="hover:text-[#B38A3E] transition-colors" data-path="disclaimer" href="contact.html#disclaimer">Disclaimer</a></div></div></div></footer>'''

ACCOUNT_HTML_CONTENT = '''<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta content="web_dashboard" name="shell-type"/>
  <title>Client Sanctuary Account • ANUKUL Ayur Vastu</title>
  <link href="https://fonts.googleapis.com" rel="preconnect"/>
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..700;1,400..700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
  <style>
    @layer base {
      html, body { margin: 0; padding: 0; }
      body { overscroll-behavior: none; }
      main > :first-child { margin-top: 0 !important; }
      main > :last-child { margin-bottom: 0 !important; }
    }
    ::-webkit-scrollbar { display: none; }
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
  <script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "outline-variant": "#c0c9c2",
            "error-container": "#ffdad6",
            "on-tertiary-fixed": "#400012",
            "surface-container": "#f6ece4",
            "on-secondary-fixed": "#311300",
            "surface-dim": "#e2d8d0",
            "on-secondary-container": "#6e3300",
            "primary-fixed-dim": "#a1d1b8",
            "tertiary": "#5d0f24",
            "on-primary-fixed": "#002114",
            "primary": "#023625",
            "on-primary-fixed-variant": "#214f3c",
            "secondary-fixed-dim": "#ffb688",
            "surface-tint": "#3a6753",
            "on-secondary": "#ffffff",
            "primary-container": "#1f4d3a",
            "surface-variant": "#ebe1d9",
            "error": "#ba1a1a",
            "on-secondary-fixed-variant": "#733600",
            "background": "#fff8f4",
            "on-background": "#1f1b16",
            "surface-container-highest": "#ebe1d9",
            "surface-container-low": "#fcf2ea",
            "on-error": "#ffffff",
            "on-primary": "#ffffff",
            "on-tertiary": "#ffffff",
            "on-surface": "#1f1b16",
            "secondary-container": "#ff964c",
            "on-tertiary-fixed-variant": "#7d283a",
            "surface": "#fff8f4",
            "tertiary-fixed-dim": "#ffb2bc",
            "on-tertiary-container": "#ff93a4",
            "surface-container-high": "#f1e6de",
            "on-error-container": "#93000a",
            "tertiary-container": "#7b2739",
            "secondary-fixed": "#ffdbc7",
            "tertiary-fixed": "#ffd9dd",
            "on-surface-variant": "#414944",
            "outline": "#717973",
            "secondary": "#974800",
            "primary-fixed": "#bceed3",
            "inverse-surface": "#352f2a",
            "inverse-primary": "#a1d1b8",
            "inverse-on-surface": "#f9efe7",
            "surface-bright": "#fff8f4",
            "surface-container-lowest": "#ffffff",
            "on-primary-container": "#8dbda4"
          },
          borderRadius: {
            "DEFAULT": "0.125rem",
            "lg": "0.25rem",
            "xl": "0.5rem",
            "full": "0.75rem"
          },
          fontFamily: {
            "body-lg": ["Manrope"],
            "body-sm": ["Manrope"],
            "display-mobile": ["EB Garamond"],
            "label-sm": ["Manrope"],
            "display": ["EB Garamond"],
            "headline-sm": ["EB Garamond"],
            "body-md": ["Manrope"],
            "editorial-quote": ["EB Garamond"],
            "headline-lg": ["EB Garamond"],
            "headline-lg-mobile": ["EB Garamond"],
            "label-md": ["Manrope"],
            "headline-md": ["EB Garamond"]
          }
        }
      }
    };
  </script>
</head>
<body class="bg-surface font-body-md text-on-surface antialiased min-h-screen flex flex-col">

  <!-- UNIFIED SITE HEADER -->
  <header class="fixed top-0 w-full z-50 bg-[#F7F1E3]/95 backdrop-blur-md border-b border-[#E8D8BC] shadow-[0_1px_8px_rgba(0,0,0,0.03)]">
    <div class="h-20 max-w-[1440px] mx-auto px-6 lg:px-margin flex items-center justify-between gap-4">
      <a href="home.html" data-path="home" class="flex items-center select-none py-1">
        <img src="images/logo.png" alt="ANUKUL Logo" class="h-14 sm:h-16 w-auto max-h-[64px] object-contain">
      </a>
      <nav class="hidden xl:flex items-center gap-6 lg:gap-space-md" data-active-classes="text-primary font-semibold relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1.5px] after:bg-[#B38A3E]">
        <a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="home" href="home.html">Home</a>
        <a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="ayurveda" href="ayurveda.html">Ayurveda</a>
        <a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="vastu" href="vastu.html">Vastu</a>
        <a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="services" href="services.html">Services</a>
        <a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="shop" href="shop.html">Shop</a>
        <a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="blog" href="blog.html">Blog</a>
        <a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="gallery" href="gallery.html">Gallery</a>
        <a class="font-label-md text-label-md uppercase text-on-surface-variant hover:text-primary transition-colors tracking-widest" data-path="contact" href="contact.html">Contact</a>
      </nav>
      <div class="flex items-center gap-2 sm:gap-3">
        <a href="search_result.html" data-path="search" title="Search Wisdom &amp; Remedies" class="flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors">
          <span class="material-symbols-outlined text-[22px]">search</span>
        </a>
        <a href="cart.html" data-path="cart" title="Shopping Cart" class="relative flex items-center justify-center w-10 h-10 rounded-full text-primary hover:bg-[#E8D8BC]/60 hover:text-secondary transition-colors">
          <span class="material-symbols-outlined text-[22px]">shopping_bag</span>
          <span class="absolute top-1 right-1 w-4 h-4 bg-secondary text-on-secondary text-[10px] font-bold rounded-full flex items-center justify-center leading-none">2</span>
        </a>
        <a href="book_your_consultation.html" data-path="book-consultation" class="hidden sm:inline-flex items-center justify-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md px-5 py-2.5 rounded-lg tracking-wider uppercase transition-colors duration-200 hover:bg-secondary shadow-sm font-semibold">
          BOOK CONSULTATION
        </a>
        <a href="account.html" data-path="account" title="Client Sanctuary Portal" class="w-9 h-9 rounded-full bg-primary flex items-center justify-center text-on-primary hover:bg-secondary transition-colors shadow-sm ring-2 ring-[#B38A3E]">
          <span class="material-symbols-outlined text-[18px]">person</span>
        </a>
        <button id="mobile-menu-btn" type="button" aria-label="Toggle navigation" class="xl:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg text-primary hover:bg-[#E8D8BC]/60 focus:outline-none transition-colors">
          <span class="material-symbols-outlined text-[26px]" id="mobile-menu-icon">menu</span>
        </button>
      </div>
    </div>
    <div id="mobile-menu" class="hidden xl:hidden w-full bg-[#F7F1E3] border-b border-[#E8D8BC] shadow-lg transition-all">
      <div class="px-6 py-5 space-y-4 max-h-[calc(100vh-80px)] overflow-y-auto">
        <nav class="flex flex-col space-y-1.5">
          <a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="home" href="home.html">Home</a>
          <a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="ayurveda" href="ayurveda.html">Ayurveda</a>
          <a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="vastu" href="vastu.html">Vastu</a>
          <a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="services" href="services.html">Services</a>
          <a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="shop" href="shop.html">Shop</a>
          <a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="blog" href="blog.html">Blog</a>
          <a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="gallery" href="gallery.html">Gallery</a>
          <a class="py-2.5 px-3 rounded-lg font-label-md text-label-md uppercase tracking-widest text-on-surface-variant hover:bg-surface-container hover:text-primary transition-colors" data-path="contact" href="contact.html">Contact</a>
        </nav>
        <div class="pt-4 border-t border-[#E8D8BC] flex flex-col gap-3">
          <a href="book_your_consultation.html" data-path="book-consultation" class="w-full text-center bg-[#1F4D3A] text-[#F7F1E3] font-label-md text-label-md py-3 rounded-lg tracking-wider uppercase font-semibold hover:bg-secondary transition-colors shadow-sm">BOOK CONSULTATION</a>
          <div class="grid grid-cols-3 gap-2 pt-1 text-center text-xs font-label-md">
            <a href="search_result.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors"><span class="material-symbols-outlined text-[20px] mb-1">search</span>Search</a>
            <a href="cart.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors relative"><span class="material-symbols-outlined text-[20px] mb-1">shopping_bag</span>Cart (2)</a>
            <a href="account.html" class="flex flex-col items-center justify-center p-2 rounded-lg bg-surface-container hover:bg-[#E8D8BC]/70 text-primary transition-colors"><span class="material-symbols-outlined text-[20px] mb-1">person</span>Account</a>
          </div>
        </div>
      </div>
    </div>
    <script>
      (function(){
        var btn = document.getElementById('mobile-menu-btn');
        var menu = document.getElementById('mobile-menu');
        var icon = document.getElementById('mobile-menu-icon');
        if (btn && menu) {
          btn.onclick = function() {
            var isHidden = menu.classList.contains('hidden');
            if (isHidden) {
              menu.classList.remove('hidden');
              if (icon) icon.textContent = 'close';
            } else {
              menu.classList.add('hidden');
              if (icon) icon.textContent = 'menu';
            }
          };
        }
      })();
    </script>
  </header>

  <!-- MAIN WRAPPER -->
  <main class="w-full pt-20 bg-surface min-h-[calc(100vh-80px)] flex-grow">
    <!-- Breadcrumb Bar -->
    <section class="w-full bg-[#F7F1E3]/80 border-b border-[#E8D8BC] py-3.5">
      <div class="max-w-[1440px] mx-auto px-6 lg:px-12 flex items-center justify-between text-on-surface-variant font-body-sm text-sm">
        <nav aria-label="Breadcrumb" class="flex items-center gap-2 tracking-wider">
          <a class="hover:text-primary transition-colors" data-path="home" href="home.html">Home</a>
          <span class="opacity-40">/</span>
          <a class="hover:text-primary transition-colors" href="account.html">My Account</a>
          <span class="opacity-40">/</span>
          <span id="account-breadcrumb-current" class="text-primary font-semibold">Sanctuary Overview</span>
        </nav>
        <div class="hidden sm:flex items-center gap-2 font-label-sm text-xs uppercase tracking-[0.2em] text-secondary font-bold">
          <span class="inline-block w-2 h-2 rounded-full bg-secondary"></span>
          Ishanya Portal • Client Sanctuary
        </div>
      </div>
    </section>

    <!-- Sanctuary Account Workspace Grid -->
    <div class="relative w-full px-6 lg:px-12 py-8 max-w-[1440px] mx-auto">
      <div class="absolute top-0 right-0 w-96 h-96 bg-primary-fixed-dim/20 rounded-full blur-3xl pointer-events-none -mr-20 -mt-20"></div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start relative z-10">
        
        <!-- ========================================== -->
        <!-- UNIFIED LEFT SIDEBAR (Span 4)             -->
        <!-- ========================================== -->
        <aside class="lg:col-span-4 flex flex-col gap-6">
          <!-- Identity Sanctuary Profile Plaque -->
          <div class="bg-surface-container-low rounded-xl p-6 shadow-sm border border-[#E8D8BC]/60 relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-surface-container-high rounded-full opacity-60 pointer-events-none"></div>
            <div class="flex items-center gap-4">
              <div class="relative">
                <div class="w-16 h-16 rounded-full bg-cover bg-center overflow-hidden shadow-inner ring-2 ring-primary-container/20" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAmmeN600jPvER6c8tpXCmpSljFPYSp1xbsq0pMk_kNdBKham7qY0uRqGXtK5tww_JVCO_A2ETH7QK0WNx-JsfFu_-73juaFU9GcezxyHhV-JDd1-fCF8MSHFsfxDGItxuCJtUxk8jjvXOI3NGBgo6F4Hg8d29Tg4RjbVAWprXZ-XC8a_pE_nUgOCCKWmlQf3zCdN_X_dHG2WOr1CFdZWJT-U6yWTuH-Kjoud0HHj2GdQn3bIsfvbsipg')"></div>
                <span class="absolute bottom-0 right-0 w-5 h-5 rounded-full bg-primary-container flex items-center justify-center text-on-primary text-[10px] shadow" title="Clinical Sanctuary Verified">
                  <span class="material-symbols-outlined text-[12px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                </span>
              </div>
              <div class="min-w-0 flex-1">
                <div class="flex items-center gap-1.5 mb-1">
                  <span class="font-label-sm text-xs uppercase tracking-wider text-secondary font-bold">Seeker Profile</span>
                </div>
                <h2 class="font-headline-sm text-2xl text-primary tracking-tight truncate">Ananya Sharma</h2>
                <p class="font-body-sm text-xs text-on-surface-variant truncate">ananya.sharma@example.com</p>
              </div>
            </div>
            <div class="mt-5 pt-4 border-t border-[#E8D8BC]/50 flex items-center justify-between text-xs">
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-surface-container-high text-secondary font-label-md tracking-wider uppercase font-semibold">
                <span class="material-symbols-outlined text-[14px]">spa</span>
                Pitta-Vata Sadhana Pass
              </span>
              <span class="font-label-sm text-outline font-semibold">ID: ANK-8924</span>
            </div>
          </div>

          <!-- Master Multi-Tab In-Page Navigation Menu -->
          <nav class="bg-surface-container-low rounded-xl p-3 shadow-sm border border-[#E8D8BC]/60 flex flex-col gap-1.5" id="account-nav-tabs">
            
            <!-- Tab 1: Dashboard -->
            <button type="button" onclick="switchAccountTab('dashboard')" id="nav-tab-dashboard" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm transition-all w-full text-left bg-primary text-on-primary font-semibold shadow-md">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[20px]">dashboard</span>
                <span>Dashboard</span>
              </div>
              <span class="material-symbols-outlined text-[16px] text-primary-fixed tab-chevron">arrow_forward</span>
            </button>

            <!-- Tab 2: Orders -->
            <button type="button" onclick="switchAccountTab('orders')" id="nav-tab-orders" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[20px]">inventory_2</span>
                <span>Orders</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-[11px] font-bold">3 active</span>
                <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
              </div>
            </button>

            <!-- Tab 3: Addresses -->
            <button type="button" onclick="switchAccountTab('addresses')" id="nav-tab-addresses" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[20px]">pin_drop</span>
                <span>Addresses</span>
              </div>
              <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
            </button>

            <!-- Tab 4: Account Details -->
            <button type="button" onclick="switchAccountTab('account-details')" id="nav-tab-account-details" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[20px]">manage_accounts</span>
                <span>Account Details</span>
              </div>
              <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
            </button>

            <!-- Tab 5: Downloads -->
            <button type="button" onclick="switchAccountTab('downloads')" id="nav-tab-downloads" class="account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[20px]">file_download</span>
                <span>Downloads</span>
              </div>
              <div class="flex items-center gap-2">
                <span class="px-2 py-0.5 rounded-full bg-surface-container-high text-primary font-label-sm text-[11px] font-semibold">4 files</span>
                <span class="material-symbols-outlined text-[16px] text-outline-variant tab-chevron">chevron_right</span>
              </div>
            </button>

            <div class="my-1.5 mx-2 h-px bg-surface-container-highest opacity-70"></div>

            <!-- Sign Out -->
            <a class="flex items-center justify-between px-4 py-2.5 rounded-lg text-error hover:bg-error-container/20 transition-all font-body-sm text-sm" href="login.html">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-[20px]">logout</span>
                <span>Sign Out</span>
              </div>
              <span class="material-symbols-outlined text-[16px] text-outline-variant">chevron_right</span>
            </a>
          </nav>

          <!-- Sanctuary Concierge Help Desk Card -->
          <div class="bg-surface-container rounded-xl p-5 shadow-sm border border-[#E8D8BC]/60 relative overflow-hidden">
            <div class="flex items-start gap-3.5">
              <div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center shrink-0 text-secondary">
                <span class="material-symbols-outlined text-[22px]">support_agent</span>
              </div>
              <div class="flex-1">
                <h3 class="font-headline-sm text-xl text-primary mb-1">Dispensary Desk</h3>
                <p class="font-body-sm text-xs text-on-surface-variant leading-relaxed mb-3">
                  Need assistance with your clinical orders, dosha constitution, or spatial blueprint audits?
                </p>
                <a class="inline-flex items-center gap-1.5 text-secondary hover:text-primary transition-colors font-label-md text-xs tracking-wider uppercase font-bold" href="contact.html">
                  <span>Contact Sanctuary Concierge</span>
                  <span class="material-symbols-outlined text-[14px]">north_east</span>
                </a>
              </div>
            </div>
          </div>

          <!-- Sacred Geometry Watermark Vignette -->
          <div class="p-4 rounded-xl bg-surface-container-lowest border border-[#E8D8BC]/50 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center shrink-0">
              <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 100 100">
                <circle cx="50" cy="50" opacity="0.3" r="42"></circle>
                <polygon opacity="0.6" points="50,15 82,75 18,75"></polygon>
                <polygon opacity="0.6" points="50,85 18,25 82,25"></polygon>
                <circle cx="50" cy="50" fill="currentColor" fill-opacity="0.15" r="10"></circle>
                <circle cx="50" cy="50" fill="currentColor" r="3"></circle>
              </svg>
            </div>
            <div>
              <p class="font-label-sm text-[11px] tracking-wider uppercase text-outline font-bold">Vastu Harmony Index</p>
              <p class="font-body-sm text-xs text-on-surface font-semibold">Brahmasthan Alignment: 98.4% Balanced</p>
            </div>
          </div>
        </aside>

        <!-- ========================================== -->
        <!-- MAIN WORKSPACE TAB PANES (Span 8)          -->
        <!-- ========================================== -->
        <main class="lg:col-span-8 flex flex-col gap-6 min-h-[600px]">

          <!-- ====================================== -->
          <!-- 1. DASHBOARD TAB PANE                  -->
          <!-- ====================================== -->
          <div id="tab-pane-dashboard" class="space-y-8">
            <!-- Header Panel -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
              <div>
                <div class="flex items-center gap-2 mb-1.5">
                  <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">SANCTUARY OVERVIEW · PRAKRITI HARMONY</span>
                  <span class="text-outline-variant">·</span>
                  <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Core</span>
                </div>
                <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">NAMASTE, ANANYA</h1>
                <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
                  Welcome to your personal clinical sanctuary. Your Pitta-Vata balance and residential Ishanya coordinates are harmonized under current lunar transits.
                </p>
              </div>
              <div class="flex items-center gap-2 self-start md:self-auto shrink-0">
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary/10 text-primary font-label-sm text-xs font-semibold">
                  <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                  Active Sadhana Session
                </span>
              </div>
            </div>

            <!-- 4 Summary KPI Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
              <div class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors">
                <div class="flex items-center justify-between mb-2">
                  <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Prakriti Status</span>
                  <span class="material-symbols-outlined text-primary text-[20px]">spa</span>
                </div>
                <p class="font-headline-sm text-2xl text-primary font-serif">Pitta-Vata</p>
                <p class="font-body-sm text-xs text-on-surface-variant mt-1">87% Balanced • Summer Regimen</p>
              </div>

              <div onclick="switchAccountTab('orders')" class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors cursor-pointer">
                <div class="flex items-center justify-between mb-2">
                  <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Dispensary Orders</span>
                  <span class="material-symbols-outlined text-primary text-[20px]">inventory_2</span>
                </div>
                <p class="font-headline-sm text-2xl text-primary font-serif">3 Total <span class="text-xs font-sans text-secondary font-semibold">(1 Active)</span></p>
                <p class="font-body-sm text-xs text-secondary mt-1 flex items-center gap-1 font-medium">View dispatches <span class="material-symbols-outlined text-[14px]">arrow_forward</span></p>
              </div>

              <div class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors">
                <div class="flex items-center justify-between mb-2">
                  <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Spatial Equilibrium</span>
                  <span class="material-symbols-outlined text-primary text-[20px]">explore</span>
                </div>
                <p class="font-headline-sm text-2xl text-primary font-serif">Ishanya 98.4%</p>
                <p class="font-body-sm text-xs text-on-surface-variant mt-1">Brahmasthan Consecrated</p>
              </div>

              <div onclick="switchAccountTab('downloads')" class="bg-surface-container-low p-5 rounded-xl border border-[#E8D8BC]/60 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-colors cursor-pointer">
                <div class="flex items-center justify-between mb-2">
                  <span class="font-label-sm text-[11px] uppercase tracking-wider text-secondary font-bold">Vedic Blueprints</span>
                  <span class="material-symbols-outlined text-primary text-[20px]">file_download</span>
                </div>
                <p class="font-headline-sm text-2xl text-primary font-serif">4 Documents</p>
                <p class="font-body-sm text-xs text-secondary mt-1 flex items-center gap-1 font-medium">Download PDFs <span class="material-symbols-outlined text-[14px]">arrow_forward</span></p>
              </div>
            </div>

            <!-- Active Dispatch Feature Banner -->
            <div class="bg-primary-container text-on-primary p-6 sm:p-7 rounded-xl shadow-md relative overflow-hidden">
              <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="space-y-2 max-w-xl">
                  <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-on-primary/10 text-primary-fixed font-label-sm text-xs uppercase tracking-wider font-semibold">
                    <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                    Active Dispatch In Transit • Blue Dart Express
                  </div>
                  <h3 class="font-headline-sm text-2xl sm:text-3xl text-on-primary font-normal">Order #ANK-84920 — Shankhpushpi &amp; Copper Sri Yantra</h3>
                  <p class="font-body-sm text-sm text-inverse-on-surface leading-relaxed">
                    Dispatched from Varanasi Ashram Vault under auspicious Pushya Nakshatra. Arriving at your Bangalore residence on or before 16 October 2025.
                  </p>
                </div>
                <div class="flex flex-col sm:flex-row md:flex-col gap-3 shrink-0">
                  <button onclick="switchAccountTab('orders')" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-surface text-primary hover:bg-[#F7F1E3] font-label-md text-xs uppercase tracking-wider font-bold transition-all shadow-sm">
                    Track Order Details
                  </button>
                  <button onclick="switchAccountTab('orders')" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg border border-on-primary/30 text-on-primary hover:bg-on-primary/10 font-label-md text-xs uppercase tracking-wider transition-all">
                    View All Dispatches
                  </button>
                </div>
              </div>
              <div class="absolute -right-10 -bottom-10 w-44 h-44 rounded-full bg-white/5 pointer-events-none"></div>
            </div>

            <!-- Split Grid: Quick Address & Next Consultation Session -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Default Address Card -->
              <div class="bg-surface-container-low p-6 rounded-xl border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
                <div>
                  <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                    <h4 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                      <span class="material-symbols-outlined text-secondary text-[18px]">location_on</span>
                      Default Sanctuary Address
                    </h4>
                    <button onclick="switchAccountTab('addresses')" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors font-bold">Edit</button>
                  </div>
                  <p class="font-headline-sm text-lg text-primary">Ananya Sharma</p>
                  <p class="font-body-sm text-sm text-on-surface-variant mt-1 leading-relaxed">
                    42 Kasturi Sanctuary Enclave, 4th Cross,<br>
                    Ishanya Gate Road, Indiranagar,<br>
                    Bangalore 560038, Karnataka
                  </p>
                  <p class="font-body-sm text-xs text-outline mt-2">Contact: +91 98450 12890</p>
                </div>
                <div class="pt-4 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between text-xs">
                  <span class="text-on-surface-variant">Validated for Consecrated Deliveries</span>
                  <span class="text-primary font-semibold flex items-center gap-1">Verified <span class="material-symbols-outlined text-[14px]">check_circle</span></span>
                </div>
              </div>

              <!-- Upcoming Consultation Card -->
              <div class="bg-surface-container-low p-6 rounded-xl border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
                <div>
                  <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                    <h4 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                      <span class="material-symbols-outlined text-secondary text-[18px]">calendar_month</span>
                      Upcoming Consultation
                    </h4>
                    <span class="text-xs uppercase font-label-sm text-primary font-bold px-2 py-0.5 rounded bg-primary-fixed/40">Confirmed</span>
                  </div>
                  <p class="font-headline-sm text-lg text-primary">Spatial Vastu Review &amp; Seasonal Ritucharya</p>
                  <p class="font-body-sm text-sm text-on-surface-variant mt-1 leading-relaxed">
                    Session with Dr. Anshul &bull; 60 Min Dedicated Diagnostic &bull; Ishanya Directional Calibration.
                  </p>
                  <div class="mt-3 p-3 rounded-lg bg-surface-container flex items-center gap-3">
                    <span class="material-symbols-outlined text-secondary text-[22px]">schedule</span>
                    <div>
                      <p class="font-label-md text-xs font-bold text-primary uppercase tracking-wider">Saturday, 24 Oct 2025 • 10:30 AM IST</p>
                      <p class="font-body-sm text-[11px] text-on-surface-variant">Private Video Sanctuary link sent via email</p>
                    </div>
                  </div>
                </div>
                <div class="pt-4 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between">
                  <a href="book_your_consultation.html" class="text-xs uppercase font-label-sm text-secondary hover:text-primary transition-colors font-bold flex items-center gap-1">
                    Reschedule or Book Another <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- ====================================== -->
          <!-- 2. ORDERS TAB PANE                     -->
          <!-- ====================================== -->
          <div id="tab-pane-orders" class="hidden space-y-6">
            <!-- Header Panel -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
              <div>
                <div class="flex items-center gap-2 mb-1.5">
                  <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">DISPENSARY APOTHECARY · SACRED REMEDIES</span>
                  <span class="text-outline-variant">·</span>
                  <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Order History</span>
                </div>
                <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">MY ORDERS &amp; DISPATCHES</h1>
                <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
                  Consecrated botanical formulations, classical tailas, and sacred architectural geometry remedies dispatched under auspicious lunar muhurtas.
                </p>
              </div>
              <div class="flex items-center gap-2">
                <a href="shop.html" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm">
                  <span class="material-symbols-outlined text-[16px]">local_mall</span>
                  Explore Dispensary
                </a>
              </div>
            </div>

            <!-- Orders Filter Bar -->
            <div class="p-2 bg-surface-container rounded-xl flex flex-wrap items-center justify-between gap-2 shadow-sm text-xs font-label-md uppercase tracking-wider">
              <div class="flex items-center gap-1">
                <button type="button" onclick="filterOrders('all')" id="filter-order-all" class="px-3.5 py-1.5 rounded-lg bg-primary text-on-primary font-bold shadow-sm transition-all">All (3)</button>
                <button type="button" onclick="filterOrders('transit')" id="filter-order-transit" class="px-3.5 py-1.5 rounded-lg bg-surface hover:bg-surface-container-high text-on-surface-variant transition-all">In Transit (1)</button>
                <button type="button" onclick="filterOrders('delivered')" id="filter-order-delivered" class="px-3.5 py-1.5 rounded-lg bg-surface hover:bg-surface-container-high text-on-surface-variant transition-all">Delivered (2)</button>
              </div>
              <span class="text-outline hidden sm:inline px-3 font-normal">Authenticity Guaranteed With GST Stamp</span>
            </div>

            <!-- Order Cards List -->
            <div class="space-y-4">
              <!-- ORDER 1 (Active) -->
              <div class="order-card order-status-transit bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-6 shadow-sm hover:border-primary/40 transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-[#E8D8BC]/50">
                  <div>
                    <div class="flex items-center gap-2">
                      <span class="font-headline-sm text-xl text-primary font-serif font-bold">#ANK-84920</span>
                      <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed text-[11px] font-label-md uppercase tracking-wider font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary animate-pulse"></span>
                        Dispatched • Varanasi Vault
                      </span>
                    </div>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-1">Placed on 12 Oct 2025 &bull; Paid via UPI &bull; Expedited Blue Dart Courier</p>
                  </div>
                  <div class="text-left sm:text-right">
                    <p class="font-headline-sm text-2xl text-primary font-bold">₹ 2,970</p>
                    <p class="font-body-sm text-xs text-outline">3 items included</p>
                  </div>
                </div>

                <div class="py-4 space-y-3">
                  <div class="flex items-center gap-4 text-sm">
                    <span class="w-2 h-2 rounded-full bg-[#B38A3E]"></span>
                    <span class="font-semibold text-primary">Shankhpushpi Medhya Rasayana</span>
                    <span class="text-xs text-on-surface-variant">500g Consecrated Jar &times; 1</span>
                    <span class="ml-auto font-medium text-primary">₹ 980</span>
                  </div>
                  <div class="flex items-center gap-4 text-sm">
                    <span class="w-2 h-2 rounded-full bg-[#B38A3E]"></span>
                    <span class="font-semibold text-primary">Consecrated Pure Copper Sri Yantra</span>
                    <span class="text-xs text-on-surface-variant">6&times;6 inch Ishanya Plate &times; 1</span>
                    <span class="ml-auto font-medium text-primary">₹ 1,350</span>
                  </div>
                  <div class="flex items-center gap-4 text-sm">
                    <span class="w-2 h-2 rounded-full bg-[#B38A3E]"></span>
                    <span class="font-semibold text-primary">Maha Mrityunjaya Taila</span>
                    <span class="text-xs text-on-surface-variant">200ml Cold-Pressed Sesame Infusion &times; 1</span>
                    <span class="ml-auto font-medium text-primary">₹ 640</span>
                  </div>
                </div>

                <div class="pt-4 border-t border-[#E8D8BC]/50 flex flex-wrap items-center justify-between gap-3 text-xs">
                  <div class="flex items-center gap-2 text-on-surface-variant">
                    <span class="material-symbols-outlined text-secondary text-[16px]">local_shipping</span>
                    <span>Tracking: <strong class="text-primary font-mono font-semibold">BD-789218490</strong> (Expected 16 Oct)</span>
                  </div>
                  <div class="flex items-center gap-3">
                    <a href="client_order.html" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md uppercase tracking-wider font-semibold hover:bg-secondary transition-colors">
                      View Order Details
                    </a>
                    <button onclick="alert('Downloading GST Tax Invoice for Order #ANK-84920...')" class="px-3 py-2 rounded-lg border border-[#E8D8BC] text-primary hover:bg-surface-container font-label-md uppercase tracking-wider font-semibold transition-colors flex items-center gap-1">
                      <span class="material-symbols-outlined text-[16px]">download</span> Invoice
                    </button>
                  </div>
                </div>
              </div>

              <!-- ORDER 2 (Delivered) -->
              <div class="order-card order-status-delivered bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-6 shadow-sm hover:border-primary/40 transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-[#E8D8BC]/50">
                  <div>
                    <div class="flex items-center gap-2">
                      <span class="font-headline-sm text-xl text-primary font-serif font-bold">#ANK-83104</span>
                      <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-primary-fixed/40 text-primary text-[11px] font-label-md uppercase tracking-wider font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                        Delivered
                      </span>
                    </div>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-1">Placed on 18 Sep 2025 &bull; Delivered on 21 Sep 2025</p>
                  </div>
                  <div class="text-left sm:text-right">
                    <p class="font-headline-sm text-2xl text-primary font-bold">₹ 1,450</p>
                    <p class="font-body-sm text-xs text-outline">2 items included</p>
                  </div>
                </div>

                <div class="py-4 space-y-3">
                  <div class="flex items-center gap-4 text-sm">
                    <span class="w-2 h-2 rounded-full bg-[#B38A3E]"></span>
                    <span class="font-semibold text-primary">Brahmi Vati Gold Grade</span>
                    <span class="text-xs text-on-surface-variant">60 Classical Tablets &times; 1</span>
                    <span class="ml-auto font-medium text-primary">₹ 950</span>
                  </div>
                  <div class="flex items-center gap-4 text-sm">
                    <span class="w-2 h-2 rounded-full bg-[#B38A3E]"></span>
                    <span class="font-semibold text-primary">Tejas Botanical Herbal Infusion</span>
                    <span class="text-xs text-on-surface-variant">250g Loose Tisane &times; 1</span>
                    <span class="ml-auto font-medium text-primary">₹ 500</span>
                  </div>
                </div>

                <div class="pt-4 border-t border-[#E8D8BC]/50 flex flex-wrap items-center justify-between gap-3 text-xs">
                  <span class="text-on-surface-variant flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-primary text-[16px]">verified</span>
                    Delivered to Bangalore Sanctuary Address
                  </span>
                  <div class="flex items-center gap-3">
                    <a href="shop.html" class="px-4 py-2 rounded-lg bg-surface-container-high text-primary hover:bg-primary hover:text-on-primary font-label-md uppercase tracking-wider font-semibold transition-colors flex items-center gap-1">
                      <span class="material-symbols-outlined text-[16px]">restart_alt</span> Reorder
                    </a>
                    <button onclick="alert('Downloading GST Tax Invoice for Order #ANK-83104...')" class="px-3 py-2 rounded-lg border border-[#E8D8BC] text-primary hover:bg-surface-container font-label-md uppercase tracking-wider font-semibold transition-colors flex items-center gap-1">
                      <span class="material-symbols-outlined text-[16px]">download</span> Invoice
                    </button>
                  </div>
                </div>
              </div>

              <!-- ORDER 3 (Delivered) -->
              <div class="order-card order-status-delivered bg-surface-container-low rounded-xl border border-[#E8D8BC]/60 p-6 shadow-sm hover:border-primary/40 transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pb-4 border-b border-[#E8D8BC]/50">
                  <div>
                    <div class="flex items-center gap-2">
                      <span class="font-headline-sm text-xl text-primary font-serif font-bold">#ANK-81992</span>
                      <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-primary-fixed/40 text-primary text-[11px] font-label-md uppercase tracking-wider font-bold">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                        Delivered
                      </span>
                    </div>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-1">Placed on 02 Aug 2025 &bull; Delivered on 06 Aug 2025</p>
                  </div>
                  <div class="text-left sm:text-right">
                    <p class="font-headline-sm text-2xl text-primary font-bold">₹ 4,800</p>
                    <p class="font-body-sm text-xs text-outline">1 item included</p>
                  </div>
                </div>

                <div class="py-4 space-y-3">
                  <div class="flex items-center gap-4 text-sm">
                    <span class="w-2 h-2 rounded-full bg-[#B38A3E]"></span>
                    <span class="font-semibold text-primary">Vastu Brass Pyramid Energy Stabilizer Kit</span>
                    <span class="text-xs text-on-surface-variant">Set of 9 Consecrated Brass Pyramids &times; 1</span>
                    <span class="ml-auto font-medium text-primary">₹ 4,800</span>
                  </div>
                </div>

                <div class="pt-4 border-t border-[#E8D8BC]/50 flex flex-wrap items-center justify-between gap-3 text-xs">
                  <span class="text-on-surface-variant flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-primary text-[16px]">verified</span>
                    Spatial installation completed with Vaidya guidance
                  </span>
                  <div class="flex items-center gap-3">
                    <a href="shop.html" class="px-4 py-2 rounded-lg bg-surface-container-high text-primary hover:bg-primary hover:text-on-primary font-label-md uppercase tracking-wider font-semibold transition-colors flex items-center gap-1">
                      <span class="material-symbols-outlined text-[16px]">restart_alt</span> Reorder
                    </a>
                    <button onclick="alert('Downloading GST Tax Invoice for Order #ANK-81992...')" class="px-3 py-2 rounded-lg border border-[#E8D8BC] text-primary hover:bg-surface-container font-label-md uppercase tracking-wider font-semibold transition-colors flex items-center gap-1">
                      <span class="material-symbols-outlined text-[16px]">download</span> Invoice
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- ====================================== -->
          <!-- 3. ADDRESSES TAB PANE                  -->
          <!-- ====================================== -->
          <div id="tab-pane-addresses" class="hidden space-y-6">
            <!-- Header Panel -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
              <div>
                <div class="flex items-center gap-2 mb-1.5">
                  <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">PREMISES &amp; COORDINATES</span>
                  <span class="text-outline-variant">·</span>
                  <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Delivery Points</span>
                </div>
                <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">SAVED ADDRESSES</h1>
                <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
                  The following addresses will be calibrated for consecrated dispensary deliveries, herbal formulations, and architectural audit reports.
                </p>
              </div>
            </div>

            <!-- Two Address Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Billing Address Card -->
              <div class="bg-surface-container-low rounded-xl p-6 border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
                <div>
                  <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                    <h3 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                      <span class="material-symbols-outlined text-secondary text-[18px]">receipt_long</span>
                      Billing Coordinates
                    </h3>
                    <span class="text-xs uppercase font-label-sm text-primary font-bold px-2 py-0.5 rounded bg-primary-fixed/40">Default</span>
                  </div>
                  <p class="font-headline-sm text-xl text-primary font-serif">Ananya Sharma</p>
                  <p class="font-body-sm text-sm text-on-surface-variant mt-2 leading-relaxed">
                    42 Kasturi Sanctuary Enclave, 4th Cross,<br>
                    Ishanya Gate Road, Indiranagar,<br>
                    Bangalore 560038, Karnataka, India
                  </p>
                  <p class="font-body-sm text-xs text-outline mt-3">Phone: +91 98450 12890</p>
                  <p class="font-body-sm text-xs text-outline">Email: ananya.sharma@example.com</p>
                </div>
                <div class="pt-5 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between">
                  <button type="button" onclick="toggleAddressEditor('billing')" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">edit</span> Edit Billing Address
                  </button>
                </div>
              </div>

              <!-- Shipping Address Card -->
              <div class="bg-surface-container-low rounded-xl p-6 border border-[#E8D8BC]/60 shadow-sm flex flex-col justify-between">
                <div>
                  <div class="flex items-center justify-between mb-3 pb-2 border-b border-[#E8D8BC]/40">
                    <h3 class="font-label-md text-sm uppercase tracking-wider text-primary font-bold flex items-center gap-2">
                      <span class="material-symbols-outlined text-secondary text-[18px]">local_shipping</span>
                      Sanctuary Delivery Address
                    </h3>
                    <span class="text-xs uppercase font-label-sm text-primary font-bold px-2 py-0.5 rounded bg-primary-fixed/40">Default</span>
                  </div>
                  <p class="font-headline-sm text-xl text-primary font-serif">Ananya Sharma</p>
                  <p class="font-body-sm text-sm text-on-surface-variant mt-2 leading-relaxed">
                    42 Kasturi Sanctuary Enclave, 4th Cross,<br>
                    Ishanya Gate Road, Indiranagar,<br>
                    Bangalore 560038, Karnataka, India
                  </p>
                  <p class="font-body-sm text-xs text-outline mt-3">Phone: +91 98450 12890</p>
                  <p class="font-body-sm text-xs text-outline">Delivery Notes: Leave with Sanctuary Concierge Security</p>
                </div>
                <div class="pt-5 mt-4 border-t border-[#E8D8BC]/30 flex items-center justify-between">
                  <button type="button" onclick="toggleAddressEditor('shipping')" class="px-4 py-2 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">edit</span> Edit Delivery Address
                  </button>
                </div>
              </div>
            </div>

            <!-- Address Editor Form (Initially Hidden, Toggled by Edit buttons) -->
            <div id="address-editor-container" class="hidden bg-surface-container-low rounded-xl p-8 border border-primary/30 shadow-md">
              <div class="flex items-center justify-between pb-4 mb-6 border-b border-[#E8D8BC]">
                <div>
                  <h3 class="font-headline-sm text-2xl text-primary font-serif" id="address-editor-title">Edit Address</h3>
                  <p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Specifications update instantly across your ANUKUL profile.</p>
                </div>
                <button type="button" onclick="toggleAddressEditor(null)" class="text-outline hover:text-primary p-1">
                  <span class="material-symbols-outlined text-[22px]">close</span>
                </button>
              </div>

              <form onsubmit="handleSaveAddressForm(event)" class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5">First Name *</label>
                    <input type="text" id="addr_first_name" value="Ananya" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  </div>
                  <div>
                    <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5">Last Name *</label>
                    <input type="text" id="addr_last_name" value="Sharma" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  </div>
                </div>

                <div>
                  <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5">Street Address *</label>
                  <input type="text" id="addr_street" value="42 Kasturi Sanctuary Enclave, 4th Cross, Ishanya Gate Road" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                  <div>
                    <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5">City *</label>
                    <input type="text" id="addr_city" value="Bangalore" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  </div>
                  <div>
                    <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5">State *</label>
                    <input type="text" id="addr_state" value="Karnataka" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  </div>
                  <div>
                    <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5">PIN Code *</label>
                    <input type="text" id="addr_pin" value="560038" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5">Phone Number *</label>
                    <input type="tel" id="addr_phone" value="+91 98450 12890" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  </div>
                  <div>
                    <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5">Special Dispatch Note</label>
                    <input type="text" id="addr_notes" value="Consecrated package • Handle with care" class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  </div>
                </div>

                <div class="flex items-center gap-3 pt-3">
                  <button type="submit" class="px-6 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm">
                    Save Address Coordinates
                  </button>
                  <button type="button" onclick="toggleAddressEditor(null)" class="px-5 py-2.5 rounded-lg border border-[#E8D8BC] text-on-surface-variant font-label-md text-xs uppercase tracking-wider hover:bg-surface-container transition-colors">
                    Cancel
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- ====================================== -->
          <!-- 4. ACCOUNT DETAILS TAB PANE            -->
          <!-- ====================================== -->
          <div id="tab-pane-account-details" class="hidden space-y-6">
            <!-- Header Panel -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
              <div>
                <div class="flex items-center gap-2 mb-1.5">
                  <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">SANCTUARY CREDENTIALS &amp; IDENTITY</span>
                  <span class="text-outline-variant">·</span>
                  <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Core</span>
                </div>
                <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">ACCOUNT DETAILS</h1>
                <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
                  Keep your personal information up to date so you can manage your ANUKUL account, Ayurvedic dispensary prescriptions, and spatial consultations with seamless clarity.
                </p>
              </div>
              <div class="flex items-center gap-2 self-start md:self-auto shrink-0">
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-primary-fixed/30 text-primary font-label-sm text-xs">
                  <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                  Secure Session
                </span>
              </div>
            </div>

            <!-- Form Card Container -->
            <div class="bg-surface-container-low rounded-xl p-8 sm:p-10 shadow-sm border border-[#E8D8BC]/60 relative overflow-hidden">
              <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-secondary/20 via-primary to-secondary/20"></div>
              
              <div id="account-feedback-banner" class="hidden p-4 rounded-lg bg-primary-fixed/40 text-primary text-sm font-medium mb-6 flex items-center justify-between">
                <div class="flex items-center gap-2">
                  <span class="material-symbols-outlined text-[18px]">check_circle</span>
                  <span>Personal account credentials updated successfully in Sanctuary profile.</span>
                </div>
                <button onclick="document.getElementById('account-feedback-banner').classList.add('hidden')" class="text-primary hover:text-secondary">
                  <span class="material-symbols-outlined text-[18px]">close</span>
                </button>
              </div>

              <form autocomplete="off" class="space-y-8" id="account-form" onsubmit="handleAccountFormSubmit(event)">
                <!-- SECTION 1: Personal Information -->
                <section class="space-y-5">
                  <div class="flex items-center gap-3 pb-2 border-b border-[#E8D8BC]/40">
                    <span class="w-7 h-7 rounded-full bg-primary/10 text-primary font-headline-sm text-base flex items-center justify-center italic">I</span>
                    <h2 class="font-headline-md text-xl text-primary tracking-tight">PERSONAL IDENTITY</h2>
                  </div>

                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                      <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="first_name">First Name *</label>
                      <input type="text" id="first_name" name="first_name" value="Ananya" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                    </div>
                    <div>
                      <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="last_name">Last Name *</label>
                      <input type="text" id="last_name" name="last_name" value="Sharma" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                    </div>
                  </div>

                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                      <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="display_name">Display Name *</label>
                      <input type="text" id="display_name" name="display_name" value="Ananya Sharma" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                      <span class="text-[11px] text-outline mt-1 block">This is how your name will appear in consultation notes &amp; orders.</span>
                    </div>
                    <div>
                      <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="email_address">Email Address *</label>
                      <input type="email" id="email_address" name="email_address" value="ananya.sharma@example.com" required class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                    </div>
                  </div>
                </section>

                <!-- SECTION 2: Password / Security -->
                <section class="space-y-5 pt-4">
                  <div class="flex items-center gap-3 pb-2 border-b border-[#E8D8BC]/40">
                    <span class="w-7 h-7 rounded-full bg-primary/10 text-primary font-headline-sm text-base flex items-center justify-center italic">II</span>
                    <h2 class="font-headline-md text-xl text-primary tracking-tight">SECURITY &amp; PASSPHRASE</h2>
                  </div>

                  <div>
                    <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="password_current">Current Password (leave blank to leave unchanged)</label>
                    <input type="password" id="password_current" name="password_current" placeholder="••••••••••••" class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                  </div>

                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                      <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="password_1">New Password (leave blank to leave unchanged)</label>
                      <input type="password" id="password_1" name="password_1" placeholder="Minimum 8 characters" class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                    </div>
                    <div>
                      <label class="block font-label-md text-xs uppercase tracking-wider text-primary font-bold mb-1.5" for="password_2">Confirm New Password</label>
                      <input type="password" id="password_2" name="password_2" placeholder="Re-enter new password" class="w-full px-4 py-2.5 rounded-lg border border-[#E8D8BC] bg-surface font-body-sm text-sm focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                    </div>
                  </div>
                </section>

                <!-- Save Action Button -->
                <div class="pt-4 flex items-center gap-4">
                  <button type="submit" class="px-8 py-3 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-bold hover:bg-secondary transition-colors shadow-sm">
                    Save Changes
                  </button>
                  <button type="button" onclick="document.getElementById('account-form').reset()" class="px-5 py-3 rounded-lg border border-[#E8D8BC] text-on-surface-variant font-label-md text-xs uppercase tracking-wider hover:bg-surface-container transition-colors">
                    Reset
                  </button>
                </div>
              </form>
            </div>
          </div>

          <!-- ====================================== -->
          <!-- 5. DOWNLOADS TAB PANE                  -->
          <!-- ====================================== -->
          <div id="tab-pane-downloads" class="hidden space-y-6">
            <!-- Header Panel -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-3 border-b border-[#E8D8BC]">
              <div>
                <div class="flex items-center gap-2 mb-1.5">
                  <span class="font-label-sm text-xs uppercase tracking-widest text-secondary font-bold">SACRED BLUEPRINTS &amp; CLINICAL FILES</span>
                  <span class="text-outline-variant">·</span>
                  <span class="font-label-sm text-xs text-outline uppercase tracking-wider">Sanctuary Vault</span>
                </div>
                <h1 class="font-headline-lg text-3xl sm:text-4xl text-primary tracking-tight">SANCTUARY DOWNLOADS</h1>
                <p class="font-body-md text-sm text-on-surface-variant max-w-2xl mt-1 leading-relaxed">
                  Certified Vastu spatial audit blueprints, personalized Ayurvedic dinacharya regimens, and consecrated consultation recordings available for permanent reference.
                </p>
              </div>
            </div>

            <!-- Downloads List -->
            <div class="space-y-4">
              <!-- Item 1 -->
              <div class="bg-surface-container-low rounded-xl p-5 border border-[#E8D8BC]/60 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-primary/40 transition-colors">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined text-[26px]">architecture</span>
                  </div>
                  <div>
                    <h3 class="font-headline-sm text-lg text-primary font-bold">Ishanya &amp; Brahmasthan Spatial Alignment Blueprint</h3>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Vastu Spatial Audit &bull; Consecrated by Dr. Anshul &bull; 8.4 MB (High-Res Vector PDF)</p>
                    <div class="mt-2 flex items-center gap-2 text-[11px] text-outline font-label-sm uppercase">
                      <span>Audit Date: 12 Oct 2025</span>
                      <span>&bull;</span>
                      <span class="text-secondary font-semibold">Residential Permit Stamp Included</span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
                  <button type="button" onclick="alert('Downloading: Ishanya & Brahmasthan Spatial Alignment Blueprint.pdf')" class="px-4 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">download</span> Download PDF
                  </button>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="bg-surface-container-low rounded-xl p-5 border border-[#E8D8BC]/60 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-primary/40 transition-colors">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined text-[26px]">medication</span>
                  </div>
                  <div>
                    <h3 class="font-headline-sm text-lg text-primary font-bold">Personalized Pitta-Vata Dinacharya &amp; Herbal Regimen</h3>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Ayurvedic Clinical Prescription &bull; Formulation Schedule &bull; 2.1 MB (PDF)</p>
                    <div class="mt-2 flex items-center gap-2 text-[11px] text-outline font-label-sm uppercase">
                      <span>Prescribed: 28 Sep 2025</span>
                      <span>&bull;</span>
                      <span class="text-primary font-semibold">Active Sadhana Protocol</span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
                  <button type="button" onclick="alert('Downloading: Pitta-Vata Dinacharya & Herbal Regimen.pdf')" class="px-4 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">download</span> Download PDF
                  </button>
                </div>
              </div>

              <!-- Item 3 -->
              <div class="bg-surface-container-low rounded-xl p-5 border border-[#E8D8BC]/60 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-primary/40 transition-colors">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined text-[26px]">schedule</span>
                  </div>
                  <div>
                    <h3 class="font-headline-sm text-lg text-primary font-bold">Apothecary Formulation Timing &amp; Lunar Muhurta Calendar</h3>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Dispensary User Guide &bull; Pushya Nakshatra Timings &bull; 1.3 MB (PDF)</p>
                    <div class="mt-2 flex items-center gap-2 text-[11px] text-outline font-label-sm uppercase">
                      <span>Ref Order: #ANK-84920</span>
                      <span>&bull;</span>
                      <span>Expires: 31 Dec 2025</span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
                  <button type="button" onclick="alert('Downloading: Apothecary Formulation Timing Calendar.pdf')" class="px-4 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">download</span> Download PDF
                  </button>
                </div>
              </div>

              <!-- Item 4 -->
              <div class="bg-surface-container-low rounded-xl p-5 border border-[#E8D8BC]/60 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-primary/40 transition-colors">
                <div class="flex items-start gap-4">
                  <div class="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary shrink-0">
                    <span class="material-symbols-outlined text-[26px]">verified</span>
                  </div>
                  <div>
                    <h3 class="font-headline-sm text-lg text-primary font-bold">GST Tax Invoice &amp; Consecration Seal #ANK-84920</h3>
                    <p class="font-body-sm text-xs text-on-surface-variant mt-0.5">Official Tax Receipt &bull; GSTIN 29AAACA1122C1Z4 &bull; 420 KB (PDF)</p>
                    <div class="mt-2 flex items-center gap-2 text-[11px] text-outline font-label-sm uppercase">
                      <span>Issued: 12 Oct 2025</span>
                      <span>&bull;</span>
                      <span class="text-primary font-semibold">Digitally Signed</span>
                    </div>
                  </div>
                </div>
                <div class="flex items-center gap-2 self-start sm:self-auto shrink-0">
                  <button type="button" onclick="alert('Downloading: Tax Invoice #ANK-84920.pdf')" class="px-4 py-2.5 rounded-lg bg-primary text-on-primary font-label-md text-xs uppercase tracking-wider font-semibold hover:bg-secondary transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="material-symbols-outlined text-[16px]">download</span> Download PDF
                  </button>
                </div>
              </div>
            </div>
          </div>

        </main>
      </div>
    </div>
  </main>

  <!-- MASTER UNIFIED FOOTER -->
  ''' + MASTER_FOOTER + '''

  <!-- JAVASCRIPT TAB SWITCHER CONTROLLER -->
  <script>
    function switchAccountTab(tabKey) {
      const tabs = ['dashboard', 'orders', 'addresses', 'account-details', 'downloads'];
      if (!tabs.includes(tabKey)) tabKey = 'dashboard';

      tabs.forEach(t => {
        const pane = document.getElementById('tab-pane-' + t);
        const btn = document.getElementById('nav-tab-' + t);

        if (pane) {
          if (t === tabKey) {
            pane.classList.remove('hidden');
          } else {
            pane.classList.add('hidden');
          }
        }

        if (btn) {
          const chevron = btn.querySelector('.tab-chevron');
          if (t === tabKey) {
            btn.className = "account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg bg-primary text-on-primary font-body-sm text-sm font-semibold shadow-md transition-all w-full text-left";
            if (chevron) {
              chevron.textContent = 'arrow_forward';
              chevron.className = 'material-symbols-outlined text-[16px] text-primary-fixed tab-chevron';
            }
          } else {
            btn.className = "account-nav-btn flex items-center justify-between px-4 py-3 rounded-lg font-body-sm text-sm text-on-surface-variant hover:bg-surface-container hover:text-on-surface transition-all w-full text-left";
            if (chevron) {
              chevron.textContent = 'chevron_right';
              chevron.className = 'material-symbols-outlined text-[16px] text-outline-variant tab-chevron';
            }
          }
        }
      });

      // Update breadcrumb
      const breadcrumbCurrent = document.getElementById('account-breadcrumb-current');
      if (breadcrumbCurrent) {
        const titles = {
          'dashboard': 'Sanctuary Overview',
          'orders': 'Dispensary Orders',
          'addresses': 'Premises & Addresses',
          'account-details': 'Account Details',
          'downloads': 'Downloads & Blueprints'
        };
        breadcrumbCurrent.textContent = titles[tabKey] || 'Sanctuary Overview';
      }

      // Update URL hash without forcing jump
      if (history.pushState) {
        history.pushState(null, null, '#' + tabKey);
      } else {
        location.hash = '#' + tabKey;
      }
    }

    // Orders Filter
    function filterOrders(status) {
      const cards = document.querySelectorAll('.order-card');
      const allBtn = document.getElementById('filter-order-all');
      const transitBtn = document.getElementById('filter-order-transit');
      const deliveredBtn = document.getElementById('filter-order-delivered');

      [allBtn, transitBtn, deliveredBtn].forEach(b => {
        if (b) b.className = "px-3.5 py-1.5 rounded-lg bg-surface hover:bg-surface-container-high text-on-surface-variant transition-all";
      });

      if (status === 'all') {
        allBtn.className = "px-3.5 py-1.5 rounded-lg bg-primary text-on-primary font-bold shadow-sm transition-all";
        cards.forEach(c => c.style.display = '');
      } else if (status === 'transit') {
        transitBtn.className = "px-3.5 py-1.5 rounded-lg bg-primary text-on-primary font-bold shadow-sm transition-all";
        cards.forEach(c => {
          c.style.display = c.classList.contains('order-status-transit') ? '' : 'none';
        });
      } else if (status === 'delivered') {
        deliveredBtn.className = "px-3.5 py-1.5 rounded-lg bg-primary text-on-primary font-bold shadow-sm transition-all";
        cards.forEach(c => {
          c.style.display = c.classList.contains('order-status-delivered') ? '' : 'none';
        });
      }
    }

    // Address Editor Toggle
    function toggleAddressEditor(type) {
      const container = document.getElementById('address-editor-container');
      const title = document.getElementById('address-editor-title');
      if (!container) return;

      if (!type) {
        container.classList.add('hidden');
        return;
      }

      container.classList.remove('hidden');
      if (title) {
        title.textContent = type === 'billing' ? 'Edit Billing Address' : 'Edit Sanctuary Delivery Address';
      }
      container.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function handleSaveAddressForm(e) {
      e.preventDefault();
      alert('Address specifications updated in Sanctuary profile successfully.');
      toggleAddressEditor(null);
    }

    function handleAccountFormSubmit(e) {
      e.preventDefault();
      const banner = document.getElementById('account-feedback-banner');
      if (banner) {
        banner.classList.remove('hidden');
        banner.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      }
    }

    // Read initial hash on page load
    window.addEventListener('DOMContentLoaded', () => {
      let hash = window.location.hash.replace('#', '');
      if (hash === 'account' || hash === 'profile' || hash === 'details') hash = 'account-details';
      if (hash === 'order') hash = 'orders';
      if (hash === 'address') hash = 'addresses';
      if (hash === 'download') hash = 'downloads';
      if (!hash || !['dashboard', 'orders', 'addresses', 'account-details', 'downloads'].includes(hash)) {
        hash = 'dashboard';
      }
      switchAccountTab(hash);
    });

    // Also handle popstate (back/forward in browser)
    window.addEventListener('popstate', () => {
      let hash = window.location.hash.replace('#', '');
      if (['dashboard', 'orders', 'addresses', 'account-details', 'downloads'].includes(hash)) {
        switchAccountTab(hash);
      }
    });
  </script>
</body>
</html>
'''

with open(os.path.join(MAIN_DIR, "account.html"), "w", encoding="utf-8") as f:
    f.write(ACCOUNT_HTML_CONTENT)
print("Updated Main/account.html successfully!")
