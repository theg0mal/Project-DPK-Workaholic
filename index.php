<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Workaholic — Cari Kerja Mudah</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --cream: #F7F4EF;
    --paper: #FDFCFA;
    --ink: #1A1814;
    --ink-soft: #5C574F;
    --ink-muted: #9C9890;
    --accent: #2D6A4F;
    --accent-soft: #D8EDD7;
    --accent-light: #F0F8EE;
    --warm-border: #E8E3DA;
    --tag-bg: #EDEBE6;
  }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--ink);
    font-size: 15px;
    line-height: 1.6;
    min-height: 100vh;
  }

  /* NAV */
  nav {
    background: var(--paper);
    border-bottom: 1px solid var(--warm-border);
    padding: 0 5vw;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 60px;
    position: sticky;
    top: 0;
    z-index: 100;
  }

  .logo {
    font-family: 'DM Serif Display', serif;
    font-size: 22px;
    color: var(--ink);
    letter-spacing: -0.5px;
    text-decoration: none;
  }

  .logo span { color: var(--accent); }

  .nav-links {
    display: flex;
    align-items: center;
    gap: 28px;
    list-style: none;
  }

  .nav-links a {
    color: var(--ink-soft);
    text-decoration: none;
    font-size: 14px;
    font-weight: 400;
    transition: color 0.2s;
  }

  .nav-links a:hover { color: var(--ink); }

  .nav-post {
    background: var(--ink);
    color: var(--paper) !important;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 500 !important;
    font-size: 13px !important;
    transition: background 0.2s !important;
  }

  .nav-post:hover { background: var(--accent) !important; color: white !important; }
/* HERO */
  .hero {
    padding: 72px 5vw 56px;
    max-width: 1200px;
    margin: 0 auto;
    animation: fadeUp 0.5s ease both;
  }

  .hero-kicker {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: var(--accent);
    background: var(--accent-light);
    padding: 4px 10px;
    border-radius: 99px;
    margin-bottom: 20px;
  }

  .hero-kicker::before {
    content: '';
    width: 6px; height: 6px;
    border-radius: 50%;
    background: var(--accent);
    display: inline-block;
  }

  h1 {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(36px, 5vw, 52px);
    line-height: 1.12;
    letter-spacing: -1.5px;
    color: var(--ink);
    margin-bottom: 16px;
    max-width: 560px;
  }

  h1 em {
    font-style: italic;
    color: var(--accent);
  }

  .hero-sub {
    font-size: 16px;
    color: var(--ink-soft);
    font-weight: 300;
    max-width: 440px;
    margin-bottom: 36px;
    line-height: 1.7;
  }

  /* SEARCH */
  .search-wrap {
    display: flex;
    gap: 8px;
    max-width: 540px;
    background: var(--paper);
    border: 1.5px solid var(--warm-border);
    border-radius: 10px;
    padding: 6px 6px 6px 16px;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .search-wrap:focus-within {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
  }

  .search-wrap input {
    flex: 1;
    border: none;
    outline: none;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    background: transparent;
    color: var(--ink);
  }

  .search-wrap input::placeholder { color: var(--ink-muted); }

  .btn-search {
    background: var(--accent);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 7px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s, transform 0.1s;
    white-space: nowrap;
  }

  .btn-search:hover { background: #1B5235; }
  .btn-search:active { transform: scale(0.98); }

  .hero-stats {
    display: flex;
    gap: 32px;
    margin-top: 40px;
    padding-top: 32px;
    border-top: 1px solid var(--warm-border);
    flex-wrap: wrap;
  }

  .stat-item { }
  .stat-num {
    font-family: 'DM Serif Display', serif;
    font-size: 28px;
    color: var(--ink);
    letter-spacing: -0.5px;
    display: block;
  }
  .stat-lbl {
    font-size: 12px;
    color: var(--ink-muted);
    font-weight: 400;
  }

  /* FILTER TAGS */
  .filter-section {
    padding: 0 5vw 28px;
    max-width: 1200px;
    margin: 0 auto;
    animation: fadeUp 0.5s 0.1s ease both;
  }

  .filter-label {
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--ink-muted);
    margin-bottom: 10px;
  }

  .filter-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }

  .tag {
    padding: 6px 14px;
    border-radius: 99px;
    font-size: 13px;
    font-weight: 400;
    cursor: pointer;
    border: 1px solid var(--warm-border);
    background: var(--paper);
    color: var(--ink-soft);
    transition: all 0.15s;
    user-select: none;
  }

  .tag:hover {
    border-color: var(--accent);
    color: var(--accent);
  }

  .tag.active {
    background: var(--accent);
    color: white;
    border-color: var(--accent);
    font-weight: 500;
  }

  /* MAIN LAYOUT */
  .main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 5vw 80px;
    display: grid;
    grid-template-columns: 1fr 280px;
    gap: 32px;
    align-items: start;
  }

  /* JOB LIST */
  .list-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 16px;
  }

  .list-count {
    font-size: 13px;
    color: var(--ink-muted);
  }

  .list-count strong { color: var(--ink); }

  .sort-select {
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    color: var(--ink-soft);
    background: transparent;
    border: 1px solid var(--warm-border);
    border-radius: 6px;
    padding: 5px 10px;
    cursor: pointer;
    outline: none;
  }

  .job-card {
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 12px;
    padding: 20px 22px;
    margin-bottom: 12px;
    cursor: pointer;
    transition: border-color 0.2s, box-shadow 0.2s, transform 0.15s;
    animation: fadeUp 0.4s ease both;
    position: relative;
    overflow: hidden;
  }

  .job-card::before {
    content: '';
    position: absolute;
    left: 0; top: 0; bottom: 0;
    width: 3px;
    background: transparent;
    transition: background 0.2s;
  }

  .job-card:hover {
    border-color: #c8c2b8;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    transform: translateY(-1px);
  }

  .job-card:hover::before { background: var(--accent); }
  .job-card.featured { }
  .job-card.featured::before { }

  .card-top {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    margin-bottom: 12px;
  }

  .company-logo {
    width: 44px;
    height: 44px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 17px;
    font-weight: 600;
    flex-shrink: 0;
    border: 1px solid var(--warm-border);
    font-family: 'DM Serif Display', serif;
  }

  .card-header { flex: 1; min-width: 0; }

  .job-title {
    font-size: 15px;
    font-weight: 500;
    color: var(--ink);
    margin-bottom: 2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .company-name {
    font-size: 13px;
    color: var(--ink-soft);
  }

  .badge-featured {
    font-size: 11px;
    font-weight: 500;
    background: var(--accent-soft);
    color: var(--accent);
    padding: 3px 8px;
    border-radius: 99px;
    white-space: nowrap;
    letter-spacing: 0.03em;
  }

  .card-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 14px;
  }

  .meta-pill {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 12px;
    color: var(--ink-muted);
    background: var(--tag-bg);
    padding: 3px 10px;
    border-radius: 99px;
  }

  .card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid var(--warm-border);
  }

  .salary {
    font-family: 'DM Serif Display', serif;
    font-size: 17px;
    color: var(--ink);
    letter-spacing: -0.3px;
  }

  .salary span {
    font-family: 'DM Sans', sans-serif;
    font-size: 11px;
    color: var(--ink-muted);
    font-weight: 400;
    letter-spacing: 0;
  }

  .card-time {
    font-size: 12px;
    color: var(--ink-muted);
  }

  .btn-apply {
    background: var(--ink);
    color: var(--paper);
    border: none;
    padding: 8px 16px;
    border-radius: 7px;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
  }

  .btn-apply:hover { background: var(--accent); }

  /* SIDEBAR */
  .sidebar { position: sticky; top: 80px; }

  .sidebar-card {
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 16px;
  }

  .sidebar-title {
    font-family: 'DM Serif Display', serif;
    font-size: 17px;
    margin-bottom: 14px;
    color: var(--ink);
  }

  .sidebar-filter { margin-bottom: 18px; }
  .sf-label {
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--ink-muted);
    margin-bottom: 8px;
  }

  .sf-options { display: flex; flex-direction: column; gap: 6px; }

  .sf-option {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: var(--ink-soft);
    cursor: pointer;
    padding: 6px 8px;
    border-radius: 6px;
    transition: background 0.15s;
    user-select: none;
  }

  .sf-option:hover { background: var(--cream); color: var(--ink); }

  .sf-option input[type=checkbox] { accent-color: var(--accent); cursor: pointer; }

  .sf-option .sf-count {
    margin-left: auto;
    font-size: 11px;
    color: var(--ink-muted);
  }

  .btn-reset {
    width: 100%;
    padding: 9px;
    border: 1px solid var(--warm-border);
    border-radius: 7px;
    background: transparent;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    color: var(--ink-soft);
    cursor: pointer;
    margin-top: 4px;
    transition: all 0.15s;
  }

  .btn-reset:hover { border-color: var(--ink); color: var(--ink); }

  .newsletter {
    background: var(--ink);
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 16px;
  }

  .newsletter p:first-child {
    font-family: 'DM Serif Display', serif;
    font-size: 17px;
    color: var(--paper);
    margin-bottom: 6px;
  }

  .newsletter p:nth-child(2) {
    font-size: 13px;
    color: #8C8880;
    margin-bottom: 14px;
    font-weight: 300;
  }

  .nl-input {
    width: 100%;
    padding: 9px 12px;
    border-radius: 7px;
    border: 1px solid #3A3830;
    background: #252320;
    color: var(--paper);
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    margin-bottom: 8px;
    outline: none;
  }

  .nl-input::placeholder { color: #5C574F; }
  .nl-input:focus { border-color: var(--accent); }

  .btn-nl {
    width: 100%;
    padding: 9px;
    border: none;
    border-radius: 7px;
    background: var(--accent);
    color: white;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
  }

  .btn-nl:hover { background: #1B5235; }

  /* MODAL */
  .overlay {
    position: fixed;
    inset: 0;
    background: rgba(26,24,20,0.5);
    z-index: 200;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 20px;
    backdrop-filter: blur(2px);
  }

  .overlay.open { display: flex; }

  .modal {
    background: var(--paper);
    border-radius: 16px;
    max-width: 520px;
    width: 100%;
    max-height: 85vh;
    overflow-y: auto;
    padding: 32px;
    position: relative;
    animation: modalIn 0.25s ease both;
  }

  .modal-close {
    position: absolute;
    top: 16px; right: 16px;
    width: 32px; height: 32px;
    border: none;
    background: var(--tag-bg);
    border-radius: 50%;
    cursor: pointer;
    font-size: 18px;
    color: var(--ink-soft);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.15s;
  }

  .modal-close:hover { background: var(--warm-border); }

  .modal-logo {
    width: 56px; height: 56px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    font-weight: 600;
    font-family: 'DM Serif Display', serif;
    border: 1px solid var(--warm-border);
    margin-bottom: 16px;
  }

  .modal h2 {
    font-family: 'DM Serif Display', serif;
    font-size: 24px;
    letter-spacing: -0.5px;
    margin-bottom: 4px;
  }

  .modal-company { font-size: 14px; color: var(--ink-soft); margin-bottom: 20px; }

  .modal-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--warm-border);
  }

  .modal-section { margin-bottom: 20px; }

  .modal-section h3 {
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.07em;
    color: var(--ink-muted);
    margin-bottom: 10px;
  }

  .modal-section p, .modal-section li {
    font-size: 14px;
    color: var(--ink-soft);
    line-height: 1.7;
  }

  .modal-section ul { padding-left: 18px; }
  .modal-section li { margin-bottom: 4px; }

  .modal-footer {
    display: flex;
    gap: 10px;
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid var(--warm-border);
  }

  .btn-apply-lg {
    flex: 1;
    padding: 12px;
    background: var(--accent);
    color: white;
    border: none;
    border-radius: 9px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
  }

  .btn-apply-lg:hover { background: #1B5235; }

  .btn-save {
    padding: 12px 20px;
    border: 1px solid var(--warm-border);
    background: transparent;
    border-radius: 9px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink-soft);
    cursor: pointer;
    transition: all 0.15s;
  }

  .btn-save:hover { border-color: var(--ink); color: var(--ink); }

  /* EMPTY */
  .empty {
    text-align: center;
    padding: 48px 20px;
    display: none;
  }

  .empty-icon { font-size: 36px; margin-bottom: 12px; }
  .empty h3 { font-family: 'DM Serif Display', serif; font-size: 20px; margin-bottom: 8px; }
  .empty p { font-size: 14px; color: var(--ink-muted); }

  /* TOAST */
  .toast {
    position: fixed;
    bottom: 24px; right: 24px;
    background: var(--ink);
    color: var(--paper);
    padding: 12px 20px;
    border-radius: 10px;
    font-size: 14px;
    z-index: 300;
    transform: translateY(100px);
    opacity: 0;
    transition: all 0.3s ease;
  }

  .toast.show { transform: translateY(0); opacity: 1; }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes modalIn {
    from { opacity: 0; transform: scale(0.96) translateY(10px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
  }

  /* ===== MOBILE RESPONSIVE ===== */
  @media (max-width: 768px) {

    /* NAV */
    nav {
      padding: 0 16px;
      height: 54px;
    }

    .nav-links {
      gap: 8px;
    }

    .nav-links li:first-child,
    .nav-links li:nth-child(2) {
      display: none; /* hide Lowongan & Perusahaan text links on mobile */
    }

    .nav-btn-login { padding: 6px 12px; font-size: 12px; }
    .nav-btn-signup { padding: 6px 12px; font-size: 12px; }
/* HERO */
    .hero {
      padding: 36px 16px 32px;
    }

    h1 { font-size: 28px; letter-spacing: -0.5px; }

    .hero-sub { font-size: 14px; margin-bottom: 24px; }

    .search-wrap {
      flex-direction: column;
      padding: 10px;
      gap: 8px;
      border-radius: 12px;
    }

    .search-wrap input { font-size: 14px; padding: 4px 0; }
    .btn-search { width: 100%; padding: 11px; border-radius: 8px; }

    .hero-stats {
      gap: 20px;
      margin-top: 28px;
      padding-top: 24px;
    }

    .stat-num { font-size: 22px; }

    /* FILTER TAGS */
    .filter-section { padding: 0 16px 20px; overflow-x: auto; }
    .filter-tags { flex-wrap: nowrap; overflow-x: auto; padding-bottom: 4px; }
    .filter-tags::-webkit-scrollbar { display: none; }
    .tag { white-space: nowrap; flex-shrink: 0; }

    /* MAIN / HOME LAYOUT */
    .home-layout { padding: 0 16px; }
    .main { padding: 0; }
    .sidebar { display: none; }

    /* JOB CARDS */
    .job-card { padding: 14px 16px; }
    .company-logo { width: 38px; height: 38px; font-size: 14px; }
    .job-title { font-size: 14px; }
    .company-name { font-size: 12px; }
    .meta-pill { font-size: 11px; padding: 3px 8px; }
    .salary { font-size: 15px; }
    .btn-apply { padding: 7px 12px; font-size: 12px; }

    /* LIST HEADER */
    .list-header { margin-bottom: 12px; }

    /* MODAL */
    .modal { padding: 24px 20px; border-radius: 14px; }
    .modal h2 { font-size: 20px; }
    .modal-logo { width: 48px; height: 48px; font-size: 18px; }
    .modal-footer { flex-direction: column; }
    .btn-apply-lg { padding: 13px; }
    .btn-save { padding: 11px; }

    /* APPLY PAGE */
    .apply-wrap { padding: 24px 16px 60px; }
    .apply-section { padding: 16px; }
    .apply-two-col { grid-template-columns: 1fr; gap: 0; }
    .apply-progress { gap: 4px; }
    .prog-step span { display: none; } /* hide step labels, show only dots */
    .apply-footer { flex-direction: column-reverse; gap: 8px; }
    .btn-back-apply, .btn-submit-apply { width: 100%; text-align: center; }

    /* COMPANIES PAGE */
    .companies-wrap { padding: 24px 16px 60px; }
    .companies-grid { grid-template-columns: 1fr; }
    .companies-hero h2 { font-size: 24px; }

    /* COMPANY PROFILE */
    .cp-wrap { padding: 24px 16px 60px; }
    .cp-cover { height: 100px; }
    .cp-header { padding: 14px 16px 18px; }
    .cp-logo { width: 52px; height: 52px; font-size: 18px; }
    .cp-name { font-size: 20px; }
    .cp-stat { padding: 0 10px; }
    .cp-stat-val { font-size: 18px; }
    .cp-body { grid-template-columns: 1fr; }
    .cp-section { padding: 16px; }

    /* AUTH */
    .auth-box { padding: 28px 20px 24px; }
    .auth-title { font-size: 22px; }
    .field-row { flex-direction: column; gap: 0; }

    /* FOOTER */
    .footer-cta { padding: 32px 16px; }
    .footer-cta-left h3 { font-size: 20px; }
    .footer-cta-right { width: 100%; }
    .btn-cta-white, .btn-cta-outline { flex: 1; text-align: center; padding: 11px 16px; }

    .footer-main {
      grid-template-columns: 1fr;
      gap: 32px;
      padding: 36px 16px 28px;
    }

    .footer-desc { max-width: 100%; }

    .footer-bottom {
      flex-direction: column;
      align-items: flex-start;
      padding: 16px;
      gap: 8px;
    }
  }

  @media (max-width: 400px) {
    h1 { font-size: 24px; }
    .hero { padding: 28px 14px 24px; }
    .home-layout { padding: 0 12px; }
    .nav-btn-login { display: none; } /* only show signup on very small screens */
  }

  /* AUTH PAGES */
  .page { display: none; }
  .page.active { display: block; }

  .auth-wrap {
    min-height: calc(100vh - 60px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    background: var(--cream);
  }

  .auth-box {
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 16px;
    padding: 40px 40px 36px;
    width: 100%;
    max-width: 420px;
    animation: fadeUp 0.4s ease both;
  }

  .auth-logo {
    font-family: 'DM Serif Display', serif;
    font-size: 20px;
    color: var(--ink);
    text-decoration: none;
    display: block;
    margin-bottom: 28px;
    cursor: pointer;
  }
  .auth-logo span { color: var(--accent); }

  .auth-title {
    font-family: 'DM Serif Display', serif;
    font-size: 26px;
    letter-spacing: -0.5px;
    color: var(--ink);
    margin-bottom: 6px;
  }

  .auth-sub {
    font-size: 14px;
    color: var(--ink-muted);
    margin-bottom: 28px;
    font-weight: 300;
  }

  .auth-sub a {
    color: var(--accent);
    text-decoration: none;
    font-weight: 500;
    cursor: pointer;
  }

  .auth-sub a:hover { text-decoration: underline; }

  .auth-field { margin-bottom: 16px; }

  .auth-label {
    display: block;
    font-size: 12px;
    font-weight: 500;
    color: var(--ink-soft);
    margin-bottom: 6px;
    letter-spacing: 0.03em;
  }

  .auth-input {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid var(--warm-border);
    border-radius: 8px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink);
    background: var(--cream);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .auth-input:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
    background: var(--paper);
  }

  .auth-input.input-error,
  .apply-input.input-error,
  .apply-select.input-error,
  .apply-textarea.input-error {
    border-color: #dc2626 !important;
    box-shadow: 0 0 0 3px rgba(220,38,38,0.1) !important;
    background: #fff8f8 !important;
  }
  .field-error-msg {
    color: #dc2626;
    font-size: 12px;
    margin-top: 5px;
    display: flex;
    align-items: center;
    gap: 4px;
    animation: fadeUp 0.2s ease both;
  }
  .field-error-msg::before {
    content: '!';
    background: #dc2626;
    color: white;
    width: 14px; height: 14px;
    border-radius: 50%;
    font-size: 10px; font-weight: 700;
    display: inline-flex;
    align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  .auth-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    margin-top: -4px;
  }

  .auth-check {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 13px;
    color: var(--ink-soft);
    cursor: pointer;
  }

  .auth-check input { accent-color: var(--accent); cursor: pointer; }

  .auth-forgot {
    font-size: 13px;
    color: var(--accent);
    text-decoration: none;
    font-weight: 500;
    cursor: pointer;
  }

  .auth-forgot:hover { text-decoration: underline; }

  .btn-auth {
    width: 100%;
    padding: 12px;
    background: var(--ink);
    color: var(--paper);
    border: none;
    border-radius: 9px;
    font-family: 'DM Sans', sans-serif;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s, transform 0.1s;
    margin-bottom: 16px;
  }

  .btn-auth:hover { background: var(--accent); }
  .btn-auth:active { transform: scale(0.99); }

  .auth-divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
    color: var(--ink-muted);
    font-size: 12px;
  }

  .auth-divider::before, .auth-divider::after {
    content: '';
    flex: 1;
    height: 1px;
    background: var(--warm-border);
  }

  .btn-google {
    width: 100%;
    padding: 11px;
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 9px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: border-color 0.2s, box-shadow 0.2s;
    margin-bottom: 24px;
  }

  .btn-google:hover {
    border-color: #c8c2b8;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  }

  .google-icon {
    width: 18px; height: 18px;
    background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 48 48'%3E%3Cpath fill='%23EA4335' d='M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z'/%3E%3Cpath fill='%234285F4' d='M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z'/%3E%3Cpath fill='%23FBBC05' d='M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z'/%3E%3Cpath fill='%2334A853' d='M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.31-8.16 2.31-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z'/%3E%3C/svg%3E") center/contain no-repeat;
    flex-shrink: 0;
  }

  .auth-switch {
    text-align: center;
    font-size: 13px;
    color: var(--ink-muted);
    padding-top: 20px;
    border-top: 1px solid var(--warm-border);
  }

  .auth-switch a {
    color: var(--accent);
    font-weight: 500;
    text-decoration: none;
    cursor: pointer;
  }

  .auth-switch a:hover { text-decoration: underline; }

  .auth-terms {
    font-size: 12px;
    color: var(--ink-muted);
    line-height: 1.6;
    margin-bottom: 20px;
  }

  .auth-terms a { color: var(--accent); text-decoration: none; }

  .field-row { display: flex; gap: 12px; }
  .field-row .auth-field { flex: 1; }

  .nav-btn-login {
    padding: 7px 16px;
    border: 1px solid var(--warm-border);
    border-radius: 7px;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    color: var(--ink-soft);
    background: transparent;
    cursor: pointer;
    transition: all 0.15s;
  }
  .nav-btn-login:hover { border-color: var(--ink); color: var(--ink); }

  .nav-btn-signup {
    padding: 7px 16px;
    border: none;
    border-radius: 7px;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: white;
    background: var(--ink);
    cursor: pointer;
    transition: background 0.15s;
  }
  .nav-btn-signup:hover { background: var(--accent); }

  .user-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 13px;
    color: var(--ink-soft);
  }

  .user-avatar {
    width: 30px; height: 30px;
    border-radius: 50%;
    background: var(--accent-soft);
    color: var(--accent);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
  }

  .btn-logout {
    font-size: 12px;
    color: var(--ink-muted);
    background: none;
    border: none;
    cursor: pointer;
    font-family: 'DM Sans', sans-serif;
    padding: 2px 6px;
    border-radius: 4px;
    transition: color 0.15s;
  }
  .btn-logout:hover { color: var(--ink); }



  /* ===== APPLY PAGE ===== */
  .apply-wrap {
    max-width: 860px;
    margin: 0 auto;
    padding: 40px 5vw 80px;
  }

  .apply-header {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 28px;
  }

  .apply-company-logo {
    width: 52px; height: 52px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; font-weight: 700;
    font-family: 'DM Serif Display', serif;
    border: 1px solid var(--warm-border);
    flex-shrink: 0;
  }

  .apply-job-title {
    font-family: 'DM Serif Display', serif;
    font-size: 22px;
    letter-spacing: -0.5px;
    color: var(--ink);
    margin-bottom: 2px;
  }

  .apply-company-name { font-size: 13px; color: var(--ink-muted); }

  .apply-section {
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 16px;
  }

  .apply-section-title {
    font-family: 'DM Serif Display', serif;
    font-size: 17px;
    color: var(--ink);
    margin-bottom: 18px;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--warm-border);
  }

  .apply-field { margin-bottom: 16px; }
  .apply-field:last-child { margin-bottom: 0; }

  .apply-label {
    display: block;
    font-size: 12px;
    font-weight: 500;
    color: var(--ink-soft);
    margin-bottom: 6px;
    letter-spacing: 0.03em;
  }

  .apply-input {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid var(--warm-border);
    border-radius: 8px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink);
    background: var(--cream);
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .apply-input:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
    background: var(--paper);
  }

  .apply-textarea {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid var(--warm-border);
    border-radius: 8px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink);
    background: var(--cream);
    outline: none;
    resize: vertical;
    min-height: 120px;
    line-height: 1.6;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .apply-textarea:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(45,106,79,0.1);
    background: var(--paper);
  }

  .apply-select {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid var(--warm-border);
    border-radius: 8px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink);
    background: var(--cream);
    outline: none;
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%239C9890' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 14px center;
  }

  .apply-select:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(45,106,79,0.1); }

  .upload-area {
    border: 1.5px dashed var(--warm-border);
    border-radius: 8px;
    padding: 24px;
    text-align: center;
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
    background: var(--cream);
  }
  .upload-file-input { display: none !important; }

  .upload-area:hover { border-color: var(--accent); background: var(--accent-light); }

  .upload-icon { font-size: 28px; margin-bottom: 8px; }
  .upload-label { font-size: 14px; font-weight: 500; color: var(--ink); margin-bottom: 4px; }
  .upload-hint { font-size: 12px; color: var(--ink-muted); }

  .apply-two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

  .apply-footer {
    display: flex;
    gap: 12px;
    align-items: center;
    justify-content: flex-end;
    margin-top: 8px;
  }

  .btn-back-apply {
    padding: 11px 20px;
    border: 1px solid var(--warm-border);
    border-radius: 9px;
    background: transparent;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    color: var(--ink-soft);
    cursor: pointer;
    transition: all 0.15s;
  }

  .btn-back-apply:hover { border-color: var(--ink); color: var(--ink); }

  .btn-submit-apply {
    padding: 12px 28px;
    background: var(--accent);
    color: white;
    border: none;
    border-radius: 9px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
  }

  .btn-submit-apply:hover { background: #1B5235; }

  .apply-progress {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 28px;
  }

  .prog-step {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    color: var(--ink-muted);
  }

  .prog-step.active { color: var(--accent); font-weight: 500; }
  .prog-step.done { color: var(--ink-soft); }

  .prog-dot {
    width: 22px; height: 22px;
    border-radius: 50%;
    border: 1.5px solid var(--warm-border);
    display: flex; align-items: center; justify-content: center;
    font-size: 10px;
    font-weight: 600;
    background: var(--paper);
    color: var(--ink-muted);
    flex-shrink: 0;
  }

  .prog-step.active .prog-dot { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }
  .prog-step.done .prog-dot { border-color: var(--accent); background: var(--accent); color: white; }

  .prog-line { flex: 1; height: 1px; background: var(--warm-border); }
  .prog-line.done { background: var(--accent); }

  /* ===== COMPANIES PAGE ===== */
  .companies-wrap {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 5vw 80px;
  }

  .companies-hero {
    margin-bottom: 36px;
    animation: fadeUp 0.4s ease both;
  }

  .companies-hero h2 {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(28px, 4vw, 40px);
    letter-spacing: -1px;
    color: var(--ink);
    margin-bottom: 8px;
  }

  .companies-hero p {
    font-size: 15px;
    color: var(--ink-muted);
    font-weight: 300;
  }

  .companies-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 16px;
    margin-bottom: 40px;
  }

  .company-card {
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 12px;
    padding: 20px;
    cursor: pointer;
    transition: border-color 0.2s, box-shadow 0.2s, transform 0.15s;
    animation: fadeUp 0.4s ease both;
  }

  .company-card:hover {
    border-color: #c8c2b8;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    transform: translateY(-2px);
  }

  .cc-top {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
  }

  .cc-logo {
    width: 46px; height: 46px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; font-weight: 700;
    font-family: 'DM Serif Display', serif;
    border: 1px solid var(--warm-border);
    flex-shrink: 0;
  }

  .cc-name { font-size: 15px; font-weight: 500; color: var(--ink); margin-bottom: 2px; }
  .cc-industry { font-size: 12px; color: var(--ink-muted); }

  .cc-desc {
    font-size: 13px;
    color: var(--ink-soft);
    line-height: 1.6;
    margin-bottom: 14px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .cc-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    padding-top: 14px;
    border-top: 1px solid var(--warm-border);
  }

  .cc-pill {
    font-size: 11px;
    color: var(--ink-muted);
    background: var(--tag-bg);
    padding: 3px 9px;
    border-radius: 99px;
  }

  /* COMPANY PROFILE PAGE */
  .cp-wrap {
    max-width: 1100px;
    margin: 0 auto;
    padding: 40px 5vw 80px;
    animation: fadeUp 0.4s ease both;
  }

  .cp-cover {
    height: 160px;
    border-radius: 14px;
    margin-bottom: -36px;
    background: linear-gradient(135deg, var(--accent) 0%, #0f3d2a 100%);
    position: relative;
  }

  .cp-header {
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 14px;
    padding: 20px 24px 24px;
    margin-bottom: 20px;
    position: relative;
  }

  .cp-logo-wrap {
    display: flex;
    align-items: flex-end;
    gap: 16px;
    margin-bottom: 16px;
  }

  .cp-logo {
    width: 68px; height: 68px;
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px; font-weight: 700;
    font-family: 'DM Serif Display', serif;
    border: 2px solid var(--paper);
    box-shadow: 0 2px 12px rgba(0,0,0,0.1);
    flex-shrink: 0;
    margin-top: -44px;
  }

  .cp-name {
    font-family: 'DM Serif Display', serif;
    font-size: 26px;
    letter-spacing: -0.5px;
    color: var(--ink);
    margin-bottom: 2px;
  }

  .cp-tagline { font-size: 14px; color: var(--ink-muted); }

  .cp-stats {
    display: flex;
    gap: 0;
    border-top: 1px solid var(--warm-border);
    padding-top: 16px;
    flex-wrap: wrap;
  }

  .cp-stat {
    flex: 1;
    min-width: 100px;
    padding: 0 16px;
    border-right: 1px solid var(--warm-border);
  }

  .cp-stat:first-child { padding-left: 0; }
  .cp-stat:last-child { border-right: none; }

  .cp-stat-val {
    font-family: 'DM Serif Display', serif;
    font-size: 22px;
    color: var(--ink);
    display: block;
  }

  .cp-stat-lbl { font-size: 11px; color: var(--ink-muted); }

  .cp-body { display: grid; grid-template-columns: 1fr 280px; gap: 20px; align-items: start; }

  .cp-section {
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 12px;
    padding: 22px;
    margin-bottom: 16px;
  }

  .cp-section-title {
    font-family: 'DM Serif Display', serif;
    font-size: 17px;
    color: var(--ink);
    margin-bottom: 12px;
    padding-bottom: 10px;
    border-bottom: 1px solid var(--warm-border);
  }

  .cp-section p {
    font-size: 14px;
    color: var(--ink-soft);
    line-height: 1.75;
    margin-bottom: 10px;
  }

  .cp-section p:last-child { margin-bottom: 0; }

  .cp-info-list { display: flex; flex-direction: column; gap: 10px; }

  .cp-info-item {
    display: flex;
    gap: 10px;
    font-size: 13px;
  }

  .cp-info-label { color: var(--ink-muted); min-width: 90px; flex-shrink: 0; }
  .cp-info-val { color: var(--ink-soft); font-weight: 500; }

  .cp-job-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 0;
    border-bottom: 1px solid var(--warm-border);
    cursor: pointer;
  }

  .cp-job-item:last-child { border-bottom: none; padding-bottom: 0; }
  .cp-job-item:hover .cp-job-title { color: var(--accent); }

  .cp-job-title { font-size: 13px; font-weight: 500; color: var(--ink); flex: 1; transition: color 0.15s; }
  .cp-job-type { font-size: 11px; color: var(--ink-muted); background: var(--tag-bg); padding: 2px 8px; border-radius: 99px; }

  .btn-follow {
    padding: 9px 20px;
    border: 1px solid var(--warm-border);
    border-radius: 8px;
    background: transparent;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    color: var(--ink-soft);
    cursor: pointer;
    transition: all 0.15s;
    margin-top: 12px;
    width: 100%;
  }

  .btn-follow:hover { border-color: var(--accent); color: var(--accent); }
  .btn-follow.following { background: var(--accent-light); border-color: var(--accent); color: var(--accent); }





  /* ===== COMPANY ADMIN ===== */
  .company-admin-wrap { max-width: 1100px; margin: 0 auto; padding: 40px 5vw 80px; animation: fadeUp 0.4s ease both; }
  .company-admin-head { display:flex; align-items:flex-start; justify-content:space-between; gap:16px; margin-bottom:20px; flex-wrap:wrap; }
  .company-admin-title { font-family:'DM Serif Display', serif; font-size:30px; letter-spacing:-0.6px; color:var(--ink); }
  .company-admin-sub { font-size:14px; color:var(--ink-muted); margin-top:4px; }
  .company-admin-grid { display:grid; grid-template-columns: 1fr 360px; gap:20px; align-items:start; }
  .company-admin-card { background:var(--paper); border:1px solid var(--warm-border); border-radius:12px; padding:22px; margin-bottom:16px; }
  .company-admin-card-title { font-family:'DM Serif Display', serif; font-size:18px; color:var(--ink); margin-bottom:16px; padding-bottom:10px; border-bottom:1px solid var(--warm-border); }
  .company-job-list { display:flex; flex-direction:column; gap:10px; }
  .company-job-row { border:1px solid var(--warm-border); border-radius:10px; padding:12px 14px; background:var(--cream); }
  .company-job-row-title { font-size:14px; font-weight:500; color:var(--ink); margin-bottom:3px; }
  .company-job-row-meta { font-size:12px; color:var(--ink-muted); }
  .auth-alt-link { text-align:center; margin-top:14px; font-size:13px; color:var(--ink-muted); }
  .auth-alt-link a { color:var(--accent); cursor:pointer; text-decoration:none; font-weight:500; }
  @media (max-width: 768px) { .company-admin-grid { grid-template-columns:1fr; } .company-admin-wrap { padding:24px 16px 60px; } }


  .avatar-img { width: 100%; height: 100%; object-fit: cover; display: block; border-radius: inherit; }
  .photo-upload-row { display:flex; align-items:center; gap:12px; flex-wrap:wrap; margin-bottom:16px; }
  .photo-preview-sm { width:56px; height:56px; border-radius:12px; border:1px solid var(--warm-border); background:var(--cream); display:flex; align-items:center; justify-content:center; overflow:hidden; font-family:'DM Serif Display', serif; font-weight:700; color:var(--accent); }
  .btn-upload-photo { padding:9px 16px; border:1px solid var(--warm-border); border-radius:8px; background:var(--paper); font-family:'DM Sans', sans-serif; font-size:13px; color:var(--ink-soft); cursor:pointer; transition:all 0.15s; }
  .btn-upload-photo:hover { border-color:var(--accent); color:var(--accent); }

  /* ===== FOOTER ===== */
  .footer {
    background: var(--ink);
    color: var(--paper);
    position: relative;
    overflow: hidden;
  }

  .footer-cta {
    background: var(--accent);
    padding: 56px 5vw;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
    position: relative;
    overflow: hidden;
  }

  .footer-cta::before {
    content: '';
    position: absolute;
    right: -60px; top: -60px;
    width: 280px; height: 280px;
    border-radius: 50%;
    border: 40px solid rgba(255,255,255,0.08);
    pointer-events: none;
  }

  .footer-cta::after {
    content: '';
    position: absolute;
    left: -40px; bottom: -80px;
    width: 220px; height: 220px;
    border-radius: 50%;
    border: 30px solid rgba(255,255,255,0.06);
    pointer-events: none;
  }

  .footer-cta-left h3 {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(22px, 3vw, 32px);
    letter-spacing: -0.5px;
    color: white;
    margin-bottom: 6px;
  }

  .footer-cta-left p {
    font-size: 14px;
    color: rgba(255,255,255,0.75);
    font-weight: 300;
    max-width: 400px;
    line-height: 1.6;
  }

  .footer-cta-right { display: flex; gap: 10px; flex-wrap: wrap; flex-shrink: 0; }

  .btn-cta-white {
    padding: 12px 24px;
    background: white;
    color: var(--accent);
    border: none;
    border-radius: 9px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    white-space: nowrap;
  }

  .btn-cta-white:hover { background: var(--cream); transform: translateY(-1px); }

  .btn-cta-outline {
    padding: 12px 24px;
    background: transparent;
    color: white;
    border: 1.5px solid rgba(255,255,255,0.4);
    border-radius: 9px;
    font-family: 'DM Sans', sans-serif;
    font-size: 14px;
    font-weight: 400;
    cursor: pointer;
    transition: all 0.2s;
    white-space: nowrap;
  }

  .btn-cta-outline:hover { border-color: white; background: rgba(255,255,255,0.08); }

  .footer-main {
    padding: 56px 5vw 40px;
    display: grid;
    grid-template-columns: 1.8fr 1fr 1fr 1fr;
    gap: 48px;
    max-width: 1400px;
    margin: 0 auto;
  }

  .footer-brand {}

  .footer-logo {
    font-family: 'DM Serif Display', serif;
    font-size: 24px;
    color: white;
    margin-bottom: 12px;
    display: block;
  }

  .footer-logo span { color: var(--accent); }

  .footer-desc {
    font-size: 13px;
    color: rgba(255,255,255,0.5);
    line-height: 1.75;
    margin-bottom: 24px;
    font-weight: 300;
    max-width: 260px;
  }

  .footer-socials {
    display: flex;
    gap: 10px;
    margin-bottom: 28px;
    flex-wrap: wrap;
  }

  .social-btn {
    width: 38px; height: 38px;
    border-radius: 9px;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    font-size: 16px;
    text-decoration: none;
    color: white;
  }

  .social-btn:hover {
    background: var(--accent);
    border-color: var(--accent);
    transform: translateY(-2px);
  }

  .footer-address {
    font-size: 12px;
    color: rgba(255,255,255,0.4);
    line-height: 1.8;
  }

  .footer-address strong {
    color: rgba(255,255,255,0.6);
    font-weight: 500;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    display: block;
    margin-bottom: 6px;
  }

  .footer-col-title {
    font-size: 11px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: rgba(255,255,255,0.35);
    margin-bottom: 18px;
  }

  .footer-links { list-style: none; }

  .footer-links li { margin-bottom: 12px; }

  .footer-links a {
    font-size: 13px;
    color: rgba(255,255,255,0.6);
    text-decoration: none;
    transition: color 0.15s;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .footer-links a:hover { color: white; }

  .footer-cs {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 12px;
    padding: 16px;
    margin-top: 8px;
  }

  .footer-cs-title {
    font-size: 12px;
    font-weight: 500;
    color: rgba(255,255,255,0.5);
    text-transform: uppercase;
    letter-spacing: 0.07em;
    margin-bottom: 12px;
  }

  .cs-item {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }

  .cs-item:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }

  .cs-icon {
    width: 32px; height: 32px;
    border-radius: 8px;
    background: rgba(255,255,255,0.07);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
  }

  .cs-label { font-size: 11px; color: rgba(255,255,255,0.4); margin-bottom: 1px; }
  .cs-val { font-size: 12px; color: rgba(255,255,255,0.75); font-weight: 500; }

  .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.07);
    padding: 20px 5vw;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    max-width: 1400px;
    margin: 0 auto;
  }

  .footer-bottom-left {
    font-size: 12px;
    color: rgba(255,255,255,0.3);
  }

  .footer-bottom-right {
    display: flex;
    gap: 20px;
  }

  .footer-bottom-right a {
    font-size: 12px;
    color: rgba(255,255,255,0.3);
    text-decoration: none;
    transition: color 0.15s;
    cursor: pointer;
  }

  .footer-bottom-right a:hover { color: rgba(255,255,255,0.6); }

  /* ===== DECORATIVE MARQUEE ===== */
  .marquee-section {
    background: var(--paper);
    border-top: 1px solid var(--warm-border);
    border-bottom: 1px solid var(--warm-border);
    padding: 14px 0;
    overflow: hidden;
    position: relative;
  }

  .marquee-track {
    display: flex;
    gap: 0;
    animation: marquee 28s linear infinite;
    width: max-content;
  }

  .marquee-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 0 28px;
    font-size: 13px;
    color: var(--ink-muted);
    white-space: nowrap;
    border-right: 1px solid var(--warm-border);
  }

  .marquee-dot {
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--accent);
    flex-shrink: 0;
  }

  @keyframes marquee {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
  }

  /* ===== SIDE DECORATIVE BANNER ===== */
  .home-layout {
    display: block;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 5vw;
  }

  .home-left { min-width: 0; }

  .side-panel {
    padding: 0 0 0 24px;
    position: sticky;
    top: 80px;
  }

  .side-card {
    background: var(--paper);
    border: 1px solid var(--warm-border);
    border-radius: 12px;
    padding: 18px;
    margin-bottom: 14px;
  }

  .side-card-title {
    font-family: 'DM Serif Display', serif;
    font-size: 15px;
    color: var(--ink);
    margin-bottom: 14px;
  }

  .trending-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 0;
    border-bottom: 1px solid var(--warm-border);
    cursor: pointer;
  }

  .trending-item:last-child { border-bottom: none; padding-bottom: 0; }
  .trending-item:hover .trending-title { color: var(--accent); }

  .trending-num {
    font-family: 'DM Serif Display', serif;
    font-size: 18px;
    color: var(--warm-border);
    width: 20px;
    text-align: center;
    flex-shrink: 0;
  }

  .trending-title {
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
    transition: color 0.15s;
    line-height: 1.3;
  }

  .trending-count { font-size: 11px; color: var(--ink-muted); }

  .tip-item {
    display: flex;
    gap: 10px;
    padding: 8px 0;
    border-bottom: 1px solid var(--warm-border);
    align-items: flex-start;
  }

  .tip-item:last-child { border-bottom: none; padding-bottom: 0; }

  .tip-icon { font-size: 16px; flex-shrink: 0; margin-top: 1px; }

  .tip-text {
    font-size: 12px;
    color: var(--ink-soft);
    line-height: 1.5;
  }

  .tip-text strong { color: var(--ink); display: block; font-size: 12px; margin-bottom: 1px; }





  /* ===== ABOUT PAGE ===== */
  .about-wrap { max-width: 1100px; margin: 0 auto; padding: 52px 5vw 80px; animation: fadeUp 0.4s ease both; }
  .about-hero { display:grid; grid-template-columns: 1.1fr 0.9fr; gap:36px; align-items:end; margin-bottom:36px; }
  .about-title { font-family:'DM Serif Display', serif; font-size:clamp(32px, 4vw, 48px); line-height:1.12; letter-spacing:-1px; color:var(--ink); margin:12px 0 14px; }
  .about-lead { font-size:16px; color:var(--ink-soft); line-height:1.75; max-width:620px; }
  .about-panel { background:var(--paper); border:1px solid var(--warm-border); border-radius:12px; padding:22px; }
  .about-panel-title { font-family:'DM Serif Display', serif; font-size:20px; color:var(--ink); margin-bottom:12px; }
  .about-panel p { font-size:14px; color:var(--ink-soft); line-height:1.75; margin-bottom:10px; }
  .about-stats { display:grid; grid-template-columns:repeat(3, 1fr); gap:12px; margin-bottom:28px; }
  .about-stat { background:var(--paper); border:1px solid var(--warm-border); border-radius:12px; padding:18px; }
  .about-stat strong { display:block; font-family:'DM Serif Display', serif; font-size:28px; color:var(--accent); margin-bottom:2px; }
  .about-stat span { font-size:12px; color:var(--ink-muted); }
  .about-grid { display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; }
  .about-card { background:var(--paper); border:1px solid var(--warm-border); border-radius:12px; padding:20px; }
  .about-card h3 { font-family:'DM Serif Display', serif; font-size:18px; color:var(--ink); margin-bottom:8px; }
  .about-card p { font-size:13px; color:var(--ink-soft); line-height:1.7; }
  @media (max-width: 768px) { .about-wrap { padding:32px 16px 60px; } .about-hero, .about-grid, .about-stats { grid-template-columns:1fr; } }


  /* ===== CAREER HELP PAGE ===== */
  .career-help-wrap { max-width: 1100px; margin: 0 auto; padding: 52px 5vw 80px; animation: fadeUp 0.4s ease both; }
  .career-help-hero { display:grid; grid-template-columns: 1.05fr 0.95fr; gap:32px; align-items:center; margin-bottom:30px; }
  .career-help-title { font-family:'DM Serif Display', serif; font-size:clamp(32px, 4vw, 48px); line-height:1.12; letter-spacing:-1px; color:var(--ink); margin:12px 0 14px; }
  .career-help-lead { font-size:16px; color:var(--ink-soft); line-height:1.75; max-width:620px; }
  .career-help-panel { background:var(--ink); color:white; border-radius:12px; padding:24px; border:1px solid rgba(255,255,255,0.08); }
  .career-help-panel-title { font-family:'DM Serif Display', serif; font-size:22px; margin-bottom:12px; }
  .career-help-panel p { color:rgba(255,255,255,0.72); font-size:14px; line-height:1.75; margin-bottom:16px; }
  .career-help-actions { display:flex; gap:10px; flex-wrap:wrap; }
  .career-help-grid { display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; margin-bottom:24px; }
  .career-help-card { background:var(--paper); border:1px solid var(--warm-border); border-radius:12px; padding:22px; }
  .career-help-icon { width:42px; height:42px; border-radius:10px; display:flex; align-items:center; justify-content:center; background:var(--accent-light); color:var(--accent); font-size:13px; font-weight:700; margin-bottom:14px; }
  .career-help-card h3 { font-family:'DM Serif Display', serif; font-size:20px; color:var(--ink); margin-bottom:8px; }
  .career-help-card p { font-size:13px; color:var(--ink-soft); line-height:1.7; margin-bottom:14px; }
  .career-help-list { display:grid; gap:8px; }
  .career-help-list span { display:flex; gap:8px; align-items:flex-start; font-size:13px; color:var(--ink-soft); }
  .career-help-list span::before { content:'✓'; color:var(--accent); font-weight:700; flex-shrink:0; }
  .career-help-flow { background:var(--paper); border:1px solid var(--warm-border); border-radius:12px; padding:22px; }
  .career-help-flow-title { font-family:'DM Serif Display', serif; font-size:20px; color:var(--ink); margin-bottom:14px; }
  .career-help-steps { display:grid; grid-template-columns:repeat(4, 1fr); gap:12px; }
  .career-help-step { background:var(--cream); border:1px solid var(--warm-border); border-radius:10px; padding:16px; }
  .career-help-step strong { display:block; color:var(--accent); font-size:12px; margin-bottom:6px; }
  .career-help-step span { display:block; color:var(--ink-soft); font-size:13px; line-height:1.55; }
  @media (max-width: 768px) { .career-help-wrap { padding:32px 16px 60px; } .career-help-hero, .career-help-grid, .career-help-steps { grid-template-columns:1fr; } }
  .career-testimonials { margin-top:24px; }
  .career-section-head { display:flex; align-items:flex-end; justify-content:space-between; gap:16px; margin-bottom:14px; }
  .career-section-title { font-family:'DM Serif Display', serif; font-size:24px; color:var(--ink); }
  .career-section-sub { font-size:13px; color:var(--ink-muted); line-height:1.6; max-width:520px; }
  .career-testimonial-grid { display:grid; grid-template-columns:repeat(3, 1fr); gap:16px; margin-bottom:24px; }
  .career-testimonial-card { background:var(--paper); border:1px solid var(--warm-border); border-radius:12px; padding:20px; }
  .career-testimonial-top { display:flex; align-items:center; gap:10px; margin-bottom:12px; }
  .career-testimonial-avatar { width:42px; height:42px; border-radius:50%; background:var(--accent); color:white; display:flex; align-items:center; justify-content:center; font-family:'DM Serif Display', serif; font-size:16px; flex-shrink:0; }
  .career-testimonial-name { font-size:14px; font-weight:700; color:var(--ink); }
  .career-testimonial-role { font-size:12px; color:var(--ink-muted); margin-top:2px; }
  .career-testimonial-text { font-size:13px; color:var(--ink-soft); line-height:1.75; margin-bottom:12px; }
  .career-testimonial-badge { display:inline-flex; padding:5px 10px; border-radius:99px; background:var(--accent-light); color:var(--accent); font-size:12px; font-weight:700; }
  .career-feedback { display:grid; grid-template-columns:0.9fr 1.1fr; gap:18px; align-items:start; background:var(--paper); border:1px solid var(--warm-border); border-radius:12px; padding:22px; }
  .career-feedback-copy h3 { font-family:'DM Serif Display', serif; font-size:22px; color:var(--ink); margin-bottom:8px; }
  .career-feedback-copy p { font-size:13px; color:var(--ink-soft); line-height:1.75; }
  .career-feedback-form { display:grid; gap:12px; }
  .career-feedback-row { display:grid; grid-template-columns:1fr 1fr; gap:10px; }
  .career-feedback-input, .career-feedback-select, .career-feedback-textarea { width:100%; border:1px solid var(--warm-border); border-radius:8px; background:var(--cream); color:var(--ink); font-family:'DM Sans', sans-serif; font-size:13px; padding:11px 12px; outline:none; }
  .career-feedback-textarea { min-height:116px; resize:vertical; line-height:1.6; }
  .career-feedback-input:focus, .career-feedback-select:focus, .career-feedback-textarea:focus { border-color:var(--accent); box-shadow:0 0 0 3px rgba(45,106,79,0.1); background:var(--paper); }
  .career-feedback-submit { justify-self:end; padding:11px 22px; border:none; border-radius:9px; background:var(--accent); color:white; font-family:'DM Sans', sans-serif; font-size:13px; font-weight:700; cursor:pointer; }
  .career-feedback-submit:hover { background:#1B5235; }
  @media (max-width: 768px) { .career-section-head, .career-feedback { display:block; } .career-testimonial-grid, .career-feedback-row { grid-template-columns:1fr; } .career-feedback-copy { margin-bottom:16px; } .career-feedback-submit { width:100%; } }

  /* ===== PROFILE PAGE ===== */
  .profile-wrap { max-width: 900px; margin: 0 auto; padding: 40px 5vw 80px; animation: fadeUp 0.4s ease both; }
  .profile-cover { height: 140px; border-radius: 14px 14px 0 0; background: linear-gradient(135deg, #1A1814 0%, #2D6A4F 100%); }
  .profile-header { background: var(--paper); border: 1px solid var(--warm-border); border-radius: 0 0 14px 14px; padding: 0 28px 24px; margin-bottom: 20px; }
  .profile-avatar-wrap { display: flex; align-items: flex-end; justify-content: space-between; margin-bottom: 16px; }
  .profile-avatar { width: 88px; height: 88px; border-radius: 50%; background: var(--accent); color: white; display: flex; align-items: center; justify-content: center; font-family: 'DM Serif Display', serif; font-size: 32px; font-weight: 700; border: 4px solid var(--paper); margin-top: -44px; flex-shrink: 0; box-shadow: 0 2px 12px rgba(0,0,0,0.12); }
  .btn-edit-profile { padding: 9px 20px; border: 1px solid var(--warm-border); border-radius: 8px; background: transparent; font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500; color: var(--ink); cursor: pointer; transition: all 0.15s; margin-top: 12px; }
  .btn-edit-profile:hover { background: var(--cream); border-color: var(--ink); }
  .btn-edit-profile.active { background: var(--ink); color: white; }
  .profile-name { font-family: 'DM Serif Display', serif; font-size: 24px; letter-spacing: -0.5px; color: var(--ink); margin-bottom: 4px; }
  .profile-headline { font-size: 14px; color: var(--ink-soft); margin-bottom: 6px; }
  .profile-meta-row { display: flex; flex-wrap: wrap; gap: 16px; font-size: 13px; color: var(--ink-muted); }
  .completion-bar-wrap { background: var(--cream); border-radius: 99px; height: 6px; margin: 10px 0 6px; overflow: hidden; }
  .completion-bar { height: 100%; background: var(--accent); border-radius: 99px; transition: width 0.5s ease; }
  .profile-body { display: grid; grid-template-columns: 1fr 280px; gap: 20px; align-items: start; }
  .profile-section { background: var(--paper); border: 1px solid var(--warm-border); border-radius: 12px; padding: 22px; margin-bottom: 16px; }
  .profile-section-title { font-family: 'DM Serif Display', serif; font-size: 17px; color: var(--ink); margin-bottom: 14px; padding-bottom: 10px; border-bottom: 1px solid var(--warm-border); }
  .profile-text { font-size: 14px; color: var(--ink-soft); line-height: 1.75; }
  .profile-empty { font-size: 13px; color: var(--ink-muted); font-style: italic; }
  .skill-tag { display: inline-block; padding: 5px 14px; background: var(--accent-light); color: var(--accent); border-radius: 99px; font-size: 12px; font-weight: 500; margin: 4px 4px 4px 0; border: 1px solid var(--accent-soft); }
  .profile-info-item { display: flex; gap: 10px; font-size: 13px; padding: 8px 0; border-bottom: 1px solid var(--warm-border); align-items: flex-start; }
  .profile-info-item:last-child { border-bottom: none; padding-bottom: 0; }
  .profile-info-icon { font-size: 16px; flex-shrink: 0; margin-top: 1px; }
  .profile-info-label { font-size: 11px; color: var(--ink-muted); margin-bottom: 1px; }
  .profile-info-val { font-size: 13px; color: var(--ink-soft); font-weight: 500; word-break: break-all; }
  .edit-form-wrap { display: none; background: var(--paper); border: 1px solid var(--warm-border); border-radius: 12px; padding: 24px; margin-bottom: 16px; }
  .edit-form-wrap.open { display: block; animation: fadeUp 0.3s ease both; }
  .edit-form-title { font-family: 'DM Serif Display', serif; font-size: 18px; color: var(--ink); margin-bottom: 20px; padding-bottom: 12px; border-bottom: 1px solid var(--warm-border); }
  .edit-group { margin-bottom: 16px; }
  .edit-label { display: block; font-size: 12px; font-weight: 500; color: var(--ink-soft); margin-bottom: 6px; letter-spacing: 0.03em; }
  .edit-input { width: 100%; padding: 10px 14px; border: 1px solid var(--warm-border); border-radius: 8px; font-family: 'DM Sans', sans-serif; font-size: 14px; color: var(--ink); background: var(--cream); outline: none; transition: border-color 0.2s, box-shadow 0.2s; }
  .edit-input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(45,106,79,0.1); background: var(--paper); }
  .edit-textarea { width: 100%; padding: 10px 14px; border: 1px solid var(--warm-border); border-radius: 8px; font-family: 'DM Sans', sans-serif; font-size: 14px; color: var(--ink); background: var(--cream); outline: none; resize: vertical; min-height: 100px; line-height: 1.6; transition: border-color 0.2s, box-shadow 0.2s; }
  .edit-textarea:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(45,106,79,0.1); background: var(--paper); }
  .edit-hint { font-size: 11px; color: var(--ink-muted); margin-top: 4px; }
  .edit-two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
  .edit-footer { display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px; padding-top: 16px; border-top: 1px solid var(--warm-border); }
  .btn-save-profile { padding: 10px 24px; background: var(--accent); color: white; border: none; border-radius: 8px; font-family: 'DM Sans', sans-serif; font-size: 14px; font-weight: 500; cursor: pointer; transition: background 0.2s; }
  .btn-save-profile:hover { background: #1B5235; }
  .btn-cancel-edit { padding: 10px 20px; border: 1px solid var(--warm-border); border-radius: 8px; background: transparent; font-family: 'DM Sans', sans-serif; font-size: 14px; color: var(--ink-soft); cursor: pointer; transition: all 0.15s; }
  .btn-cancel-edit:hover { border-color: var(--ink); color: var(--ink); }
  @media (max-width: 768px) {
    .profile-body { grid-template-columns: 1fr; }
    .profile-wrap { padding: 0 0 60px; }
    .profile-cover { border-radius: 0; height: 100px; }
    .profile-header { border-radius: 0; padding: 0 16px 20px; }
    .edit-two-col { grid-template-columns: 1fr; gap: 0; }
  }

</style>
</head>
<body>

<nav>
  <a class="logo" onclick="showPage('home')" style="cursor:pointer">Workaholic<span>.</span></a>
  <ul class="nav-links">
    <li><a href="#" onclick="showPage('home');return false;">Lowongan</a></li>
    <li><a href="#" onclick="showPage('companies');return false;">Perusahaan</a></li>
    <li><a href="#" onclick="showPage('company-login');return false;">Untuk Perusahaan</a></li>
    <li><a href="#" onclick="showPage('about');return false;">About Us</a></li>
    <li id="nav-auth-btns" style="display:flex;gap:8px;list-style:none">
      <button class="nav-btn-login" onclick="showPage('login')">Masuk</button>
      <button class="nav-btn-signup" onclick="showPage('signup')">Daftar</button>
    </li>
    <li id="nav-user-badge" style="display:none">
      <div class="user-badge">
        <div class="user-avatar" id="nav-avatar" onclick="openProfile()" style="cursor:pointer" title="Lihat profil">U</div>
        <span id="nav-username" onclick="openProfile()" style="cursor:pointer;font-weight:500"></span>
        <button class="btn-logout" onclick="doLogout()">Keluar</button>
      </div>
    </li>
  </ul>
</nav>

<div id="page-home" class="page active">
<section class="hero">
  <h1>Temukan pekerjaan yang <em>tepat</em> untukmu.</h1>
  <p class="hero-sub">Ribuan lowongan dari perusahaan terpercaya di seluruh Indonesia. Lamar cepat, langsung ke rekruter.</p>
  <div class="search-wrap">
    <input type="text" id="search-input" placeholder="Cari posisi, perusahaan, atau kata kunci..." oninput="filterJobs()">
    <button class="btn-search" onclick="filterJobs()">Cari</button>
  </div>
  <div class="hero-stats">
    <div class="stat-item">
      <span class="stat-num">2.400+</span>
      <span class="stat-lbl">Lowongan aktif</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">850+</span>
      <span class="stat-lbl">Perusahaan</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">48 jam</span>
      <span class="stat-lbl">Rata-rata respons</span>
    </div>
  </div>
</section>

<section class="filter-section">
  <div class="filter-label">Kategori</div>
  <div class="filter-tags">
    <span class="tag active" onclick="filterByTag(this,'semua')">Semua</span>
    <span class="tag" onclick="filterByTag(this,'teknologi')">Teknologi</span>
    <span class="tag" onclick="filterByTag(this,'desain')">Desain</span>
    <span class="tag" onclick="filterByTag(this,'keuangan')">Keuangan</span>
    <span class="tag" onclick="filterByTag(this,'marketing')">Marketing</span>
    <span class="tag" onclick="filterByTag(this,'pendidikan')">Pendidikan</span>
    <span class="tag" onclick="filterByTag(this,'kesehatan')">Kesehatan</span>
    <span class="tag" onclick="filterByTag(this,'hukum')">Hukum</span>
  </div>
</section>

<div class="home-layout"><div class="main" style="padding:0;max-width:100%">
  <div>
    <div class="list-header">
      <span class="list-count"><strong id="job-count">12</strong> lowongan ditemukan</span>
      <select class="sort-select" onchange="sortJobs(this.value)">
        <option value="terbaru">Terbaru</option>
        <option value="gaji">Gaji tertinggi</option>
        <option value="nama">A–Z</option>
      </select>
    </div>
    <div id="job-list"></div>
    <div class="empty" id="empty-state">
      <div class="empty-icon">🔍</div>
      <h3>Lowongan tidak ditemukan</h3>
      <p>Coba kata kunci atau filter yang berbeda.</p>
    </div>
  </div>

  <aside class="sidebar">
    <div class="sidebar-card">
      <div class="sidebar-title">Filter</div>

      <div class="sidebar-filter">
        <div class="sf-label">Tipe Pekerjaan</div>
        <div class="sf-options">
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> Full-time <span class="sf-count">8</span></label>
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> Part-time <span class="sf-count">3</span></label>
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> Remote <span class="sf-count">5</span></label>
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> Freelance <span class="sf-count">2</span></label>
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> Internship <span class="sf-count">4</span></label>
        </div>
      </div>

      <div class="sidebar-filter">
        <div class="sf-label">Pengalaman</div>
        <div class="sf-options">
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> Fresh Graduate <span class="sf-count">6</span></label>
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> 1–3 Tahun <span class="sf-count">5</span></label>
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> 3–5 Tahun <span class="sf-count">3</span></label>
          <label class="sf-option"><input type="checkbox" onchange="filterJobs()"> 5+ Tahun <span class="sf-count">2</span></label>
        </div>
      </div>

      <button class="btn-reset" onclick="resetFilters()">Reset semua filter</button>
    </div>

    <div class="newsletter">
      <p>Dapat loker lebih cepat</p>
      <p>Terima notifikasi lowongan sesuai profilmu, setiap hari.</p>
      <input class="nl-input" type="email" placeholder="email@kamu.com">
      <button class="btn-nl">Langganan</button>
    </div>
  </aside>
</div>

<!-- MODAL -->
<div class="overlay" id="overlay" onclick="closeModal(event)">
  <div class="modal" id="modal">
    <button class="modal-close" onclick="closeModalDirect()">&#215;</button>
    <div class="modal-logo" id="modal-logo"></div>
    <h2 id="modal-title"></h2>
    <div class="modal-company" id="modal-company"></div>
    <div class="modal-meta" id="modal-meta"></div>
    <div class="modal-section">
      <h3>Tentang Posisi</h3>
      <p id="modal-desc"></p>
    </div>
    <div class="modal-section">
      <h3>Kualifikasi</h3>
      <ul id="modal-qual"></ul>
    </div>
    <div class="modal-footer">
      <button class="btn-apply-lg" onclick="applyJob()">Lamar Sekarang</button>
      <button class="btn-save" onclick="saveJob()">Simpan</button>
    </div>
  </div>
</div>

<div class="toast" id="toast"></div>

<script>
var currentTag = 'semua';

var jobs = [
  {
    id:1, featured:true,
    title:'Frontend Developer',
    company:'Tokopedia',
    logo:'Tk', logoBg:'#E8F4FF', logoCol:'#1B5EA8',
    location:'Jakarta Selatan', type:'Full-time', mode:'Hybrid',
    category:'teknologi', exp:'1–3 Tahun',
    salary:'Rp 8–14 jt', salaryRaw:14,
    posted:'2 jam lalu',
    desc:'Kami mencari Frontend Developer berpengalaman untuk bergabung dengan tim produk kami. Kamu akan membangun dan menyempurnakan antarmuka pengguna yang digunakan oleh jutaan orang Indonesia setiap harinya.',
    qual:['Menguasai HTML, CSS, JavaScript, dan React.js','Pengalaman minimal 1 tahun di industri teknologi','Mampu bekerja dalam tim Agile/Scrum','Memahami prinsip UI/UX dan aksesibilitas','Nilai plus: TypeScript, Next.js']
  },
  {
    id:2, featured:false,
    title:'UI/UX Designer',
    company:'Gojek',
    logo:'Go', logoBg:'#E8F8EE', logoCol:'#1B7A3E',
    location:'Jakarta Pusat', type:'Full-time', mode:'Remote',
    category:'desain', exp:'3–5 Tahun',
    salary:'Rp 12–20 jt', salaryRaw:20,
    posted:'5 jam lalu',
    desc:'Bergabunglah dengan tim desain Gojek untuk menciptakan pengalaman pengguna yang bermakna di aplikasi super-app kami. Kamu akan bekerja langsung dengan PM dan engineer untuk merancang fitur baru dari nol.',
    qual:['Portfolio desain yang kuat dan beragam','Mahir menggunakan Figma','Memahami design system dan component library','Kemampuan user research dan usability testing','Pengalaman 3+ tahun di bidang UI/UX']
  },
  {
    id:3, featured:false,
    title:'Data Analyst',
    company:'Bank BCA',
    logo:'BCA', logoBg:'#EEF4FF', logoCol:'#1A3D8F',
    location:'Jakarta Barat', type:'Full-time', mode:'On-site',
    category:'keuangan', exp:'1–3 Tahun',
    salary:'Rp 7–11 jt', salaryRaw:11,
    posted:'1 hari lalu',
    desc:'Posisi ini bertanggung jawab menganalisis data transaksi nasabah untuk menghasilkan insight bisnis yang actionable. Kamu akan berkolaborasi erat dengan tim risiko dan produk perbankan.',
    qual:['Sarjana Statistika, Matematika, atau Informatika','Menguasai SQL dan Python atau R','Pengalaman menggunakan Tableau atau Power BI','Teliti, analitis, dan berorientasi pada detail','Fresh graduate dipersilakan mendaftar']
  },
  {
    id:4, featured:false,
    title:'Content Writer',
    company:'KumparanNews',
    logo:'Km', logoBg:'#FFF4E8', logoCol:'#994D00',
    location:'Jakarta Timur', type:'Part-time', mode:'Remote',
    category:'marketing', exp:'Fresh Graduate',
    salary:'Rp 3–5 jt', salaryRaw:5,
    posted:'1 hari lalu',
    desc:'Kami membuka posisi Content Writer paruh waktu untuk menulis artikel informatif dan engaging di platform berita digital kami. Topik meliputi teknologi, bisnis, dan gaya hidup.',
    qual:['Lulusan Komunikasi, Jurnalistik, atau bidang terkait','Kemampuan menulis artikel yang baik dan terstruktur','Riset mandiri dan mampu memenuhi deadline','Familiar dengan SEO dasar','Portofolio tulisan menjadi nilai tambah']
  },
  {
    id:5, featured:true,
    title:'Backend Engineer (Node.js)',
    company:'Shopee Indonesia',
    logo:'Sh', logoBg:'#FFF0EA', logoCol:'#CC4400',
    location:'Jakarta Selatan', type:'Full-time', mode:'Hybrid',
    category:'teknologi', exp:'3–5 Tahun',
    salary:'Rp 15–25 jt', salaryRaw:25,
    posted:'3 jam lalu',
    desc:'Kamu akan membangun dan memelihara layanan backend skala besar yang melayani puluhan juta transaksi per hari. Ini adalah kesempatan untuk bekerja dengan infrastruktur yang kompleks dan menantang.',
    qual:['Pengalaman 3+ tahun dengan Node.js dan TypeScript','Memahami arsitektur microservices','Familiar dengan Kafka, Redis, Docker, Kubernetes','Pengalaman dengan database SQL dan NoSQL','Kemampuan problem solving yang kuat']
  },
  {
    id:6, featured:false,
    title:'Guru Matematika SMA',
    company:'Ruangguru',
    logo:'Rg', logoBg:'#F0EEFF', logoCol:'#4C35B0',
    location:'Bandung', type:'Full-time', mode:'On-site',
    category:'pendidikan', exp:'1–3 Tahun',
    salary:'Rp 5–8 jt', salaryRaw:8,
    posted:'2 hari lalu',
    desc:'Bergabunglah sebagai pengajar Matematika untuk kelas 10–12 di pusat belajar kami di Bandung. Kamu akan menyiapkan materi ajar, mengajar langsung, dan membimbing siswa menuju ujian nasional.',
    qual:['S1 Pendidikan Matematika atau Matematika Murni','Pengalaman mengajar minimal 1 tahun','Sabar, komunikatif, dan mampu menjelaskan konsep sulit dengan mudah','Menguasai kurikulum Merdeka Belajar','Sertifikasi pendidik menjadi keunggulan']
  },
  {
    id:7, featured:false,
    title:'Perawat Klinis',
    company:'RS Siloam',
    logo:'Sl', logoBg:'#E8F8EE', logoCol:'#0F5C35',
    location:'Surabaya', type:'Full-time', mode:'On-site',
    category:'kesehatan', exp:'Fresh Graduate',
    salary:'Rp 4–7 jt', salaryRaw:7,
    posted:'3 hari lalu',
    desc:'RS Siloam Surabaya membuka peluang bagi perawat muda yang berdedikasi untuk bergabung di unit rawat inap kami. Kamu akan mendapat pelatihan intensif dari senior dan kesempatan pengembangan karir yang jelas.',
    qual:['D3 atau S1 Keperawatan','Memiliki STR aktif','Bersedia bekerja shifting termasuk malam dan akhir pekan','Teliti, empati, dan tanggap dalam keadaan darurat','Fresh graduate dipersilakan']
  },
  {
    id:8, featured:false,
    title:'Legal Officer',
    company:'Pertamina',
    logo:'Pt', logoBg:'#FFF8E0', logoCol:'#7A5C00',
    location:'Jakarta Pusat', type:'Full-time', mode:'On-site',
    category:'hukum', exp:'1–3 Tahun',
    salary:'Rp 9–14 jt', salaryRaw:14,
    posted:'4 hari lalu',
    desc:'Posisi ini mendukung Divisi Legal Pertamina dalam penyusunan kontrak, review dokumen hukum, dan analisis regulasi. Kamu akan bekerja dalam lingkungan korporasi yang dinamis dan penuh tantangan.',
    qual:['S1 Hukum dari universitas terkemuka','IPK minimal 3.2','Memahami hukum kontrak dan hukum korporasi','Kemampuan riset hukum yang kuat','Pengalaman magang di firma hukum atau korporasi menjadi nilai plus']
  },
  {
    id:9, featured:false,
    title:'Social Media Specialist',
    company:'Wardah Cosmetics',
    logo:'Wd', logoBg:'#FFF0F5', logoCol:'#8C1A4A',
    location:'Tangerang', type:'Full-time', mode:'Hybrid',
    category:'marketing', exp:'1–3 Tahun',
    salary:'Rp 5–9 jt', salaryRaw:9,
    posted:'2 hari lalu',
    desc:'Kami mencari kreator konten berbakat untuk mengelola akun media sosial brand kecantikan terbesar di Indonesia. Kamu akan merancang strategi konten, membuat copywriting, dan menganalisis performa kampanye.',
    qual:['Pengalaman minimal 1 tahun di social media marketing','Memahami platform Instagram, TikTok, dan YouTube','Kemampuan copywriting yang kreatif dan engaging','Familiar dengan tools analitik sosial media','Minat pada industri kecantikan adalah nilai tambah']
  },
  {
    id:10, featured:false,
    title:'Mobile Developer (Flutter)',
    company:'Traveloka',
    logo:'Tv', logoBg:'#E8F0FF', logoCol:'#1A3E99',
    location:'Jakarta Selatan', type:'Full-time', mode:'Remote',
    category:'teknologi', exp:'3–5 Tahun',
    salary:'Rp 13–22 jt', salaryRaw:22,
    posted:'5 jam lalu',
    desc:'Bergabunglah dengan tim mobile Traveloka untuk membangun aplikasi perjalanan yang digunakan oleh jutaan pengguna di Asia Tenggara. Kamu akan berkontribusi pada fitur-fitur utama seperti pemesanan, pembayaran, dan loyalty.',
    qual:['Pengalaman 3+ tahun dengan Flutter dan Dart','Memahami state management (Bloc, Provider, Riverpod)','Berpengalaman dengan REST API dan GraphQL','Familiar dengan CI/CD untuk mobile apps','Portofolio atau aplikasi yang sudah dipublish di store']
  },
  {
    id:11, featured:false,
    title:'Aktuaris Junior',
    company:'Prudential Indonesia',
    logo:'Pr', logoBg:'#FFF0E8', logoCol:'#8C2800',
    location:'Jakarta Pusat', type:'Full-time', mode:'On-site',
    category:'keuangan', exp:'Fresh Graduate',
    salary:'Rp 8–13 jt', salaryRaw:13,
    posted:'1 hari lalu',
    desc:'Prudential Indonesia membuka kesempatan bagi lulusan baru untuk memulai karir di bidang aktuaria. Kamu akan belajar langsung dari aktuaris senior dalam analisis risiko, penetapan premi, dan pelaporan keuangan.',
    qual:['S1 Matematika, Statistika, atau Aktuaria','IPK minimal 3.3','Telah atau sedang menempuh ujian profesi aktuaria (PPMAK)','Kemampuan analitis dan kuantitatif yang kuat','Mahir menggunakan Excel dan R atau Python']
  },
  {
    id:12, featured:false,
    title:'Graphic Designer',
    company:'Kompas Gramedia',
    logo:'KG', logoBg:'#F5EEFF', logoCol:'#5220A8',
    location:'Jakarta Pusat', type:'Full-time', mode:'On-site',
    category:'desain', exp:'1–3 Tahun',
    salary:'Rp 5–8 jt', salaryRaw:8,
    posted:'3 hari lalu',
    desc:'Kompas Gramedia mencari Graphic Designer untuk mendukung kebutuhan visual grup media terbesar di Indonesia. Kamu akan mengerjakan desain editorial, ilustrasi digital, dan materi promosi cetak maupun digital.',
    qual:['S1 Desain Komunikasi Visual atau terkait','Mahir menggunakan Adobe Illustrator dan Photoshop','Portofolio desain yang beragam dan kuat','Memahami prinsip tipografi dan layout','Pengalaman desain untuk media cetak menjadi nilai plus']
  }
];

var filteredJobs = jobs.slice();
var currentJobId = null;


function logoContent(item) {
  return item && item.logoUrl ? '<img class="avatar-img" src="' + escapeHtml(item.logoUrl) + '" alt="">' : escapeHtml(item && item.logo ? item.logo : '');
}

function setLogoElement(el, item) {
  if (!el || !item) return;
  el.style.background = item.logoUrl ? 'var(--paper)' : item.logoBg;
  el.style.color = item.logoCol || 'var(--accent)';
  el.innerHTML = logoContent(item);
}

function setAvatarElement(el, name, photoUrl) {
  if (!el) return;
  var initials = (name || 'U').split(' ').slice(0,2).map(function(w){return w[0];}).join('').toUpperCase();
  el.innerHTML = photoUrl ? '<img class="avatar-img" src="' + escapeHtml(photoUrl) + '" alt="">' : escapeHtml(initials);
}
function renderJobs() {
  var list = document.getElementById('job-list');
  var empty = document.getElementById('empty-state');
  document.getElementById('job-count').textContent = filteredJobs.length;

  if (!filteredJobs.length) {
    list.innerHTML = '';
    empty.style.display = 'block';
    return;
  }
  empty.style.display = 'none';

  list.innerHTML = filteredJobs.map(function(j, i) {
    return '<div class="job-card' + (j.featured ? ' featured' : '') + '" onclick="openJob(' + j.id + ')" style="animation-delay:' + (i * 0.04) + 's">'
      + '<div class="card-top">'
      + '<div class="company-logo" style="background:' + (j.logoUrl ? 'var(--paper)' : j.logoBg) + ';color:' + j.logoCol + '">' + logoContent(j) + '</div>'
      + '<div class="card-header">'
      + '<div class="job-title">' + j.title + '</div>'
      + '<div class="company-name">' + j.company + ' &middot; ' + j.location + '</div>'
      + '</div>'
      
      + '</div>'
      + '<div class="card-meta">'
      + '<span class="meta-pill">&#128205; ' + j.location + '</span>'
      + '<span class="meta-pill">&#128188; ' + j.type + '</span>'
      + '<span class="meta-pill">&#127968; ' + j.mode + '</span>'
      + '<span class="meta-pill">&#127891; ' + j.exp + '</span>'
      + '</div>'
      + '<div class="card-footer">'
      + '<div><div class="salary">' + j.salary + ' <span>/bulan</span></div></div>'
      + '<div style="display:flex;align-items:center;gap:10px">'
      + '<span class="card-time">' + j.posted + '</span>'
      + '<button class="btn-apply" onclick="event.stopPropagation();applyDirect(' + j.id + ')">Lamar</button>'
      + '</div></div>'
      + '</div>';
  }).join('');
}

function filterByTag(el, tag) {
  document.querySelectorAll('.tag').forEach(function(t) { t.classList.remove('active'); });
  el.classList.add('active');
  currentTag = tag;
  filterJobs();
}

function filterJobs() {
  var q = document.getElementById('search-input').value.toLowerCase().trim();
  filteredJobs = jobs.filter(function(j) {
    var matchTag = currentTag === 'semua' || j.category === currentTag;
    var matchQ = !q || j.title.toLowerCase().includes(q) || j.company.toLowerCase().includes(q) || j.location.toLowerCase().includes(q);
    return matchTag && matchQ;
  });
  renderJobs();
}

function sortJobs(val) {
  if (val === 'gaji') filteredJobs.sort(function(a,b){return b.salaryRaw-a.salaryRaw});
  else if (val === 'nama') filteredJobs.sort(function(a,b){return a.title.localeCompare(b.title)});
  else filteredJobs.sort(function(a,b){return a.id-b.id});
  
renderJobs();
}

function resetFilters() {
  document.querySelectorAll('.sf-option input').forEach(function(c){c.checked=false});
  document.getElementById('search-input').value = '';
  currentTag = 'semua';
  document.querySelectorAll('.tag').forEach(function(t,i){t.classList.toggle('active',i===0)});
  filteredJobs = jobs.slice();
  
renderJobs();
}

function openJob(id) {
  var j = jobs.find(function(x){return x.id===id});
  if(!j) return;
  currentJobId = id;
  var ml = document.getElementById('modal-logo');
  setLogoElement(ml, j);
  document.getElementById('modal-title').textContent = j.title;
  document.getElementById('modal-company').textContent = j.company + ' · ' + j.location;
  document.getElementById('modal-meta').innerHTML =
    '<span class="meta-pill">&#128188; ' + j.type + '</span>'
    + '<span class="meta-pill">&#127968; ' + j.mode + '</span>'
    + '<span class="meta-pill">&#127891; ' + j.exp + '</span>'
    + '<span class="meta-pill" style="font-weight:500;color:var(--accent);background:var(--accent-soft)">&#128181; ' + j.salary + '/bln</span>';
  document.getElementById('modal-desc').textContent = j.desc;
  document.getElementById('modal-qual').innerHTML = j.qual.map(function(q){return '<li>'+q+'</li>'}).join('');
  document.getElementById('overlay').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeModal(e) {
  if(e.target === document.getElementById('overlay')) closeModalDirect();
}

function closeModalDirect() {
  document.getElementById('overlay').classList.remove('open');
  document.body.style.overflow = '';
}

function applyJob() {
  closeModalDirect();
  openApplyPage(currentJobId);
}

function applyDirect(id) {
  openApplyPage(id);
}

function openApplyPage(id) {
  currentJobId = id;
  var j = jobs.find(function(x){return x.id===id});
  if(!j) return;
  // Set header
  var logoEl = document.getElementById('apply-logo-el');
  setLogoElement(logoEl, j);
  document.getElementById('apply-job-title-el').textContent = j.title;
  document.getElementById('apply-company-el').textContent = j.company + ' · ' + j.location;
  var cvInput = document.getElementById('ap-cv');
  if (cvInput) cvInput.value = '';
  var cvLabel = document.getElementById('cv-label');
  if (cvLabel) cvLabel.textContent = 'Klik untuk upload CV / Resume';
  var cvArea = document.getElementById('cv-upload-area');
  if (cvArea) cvArea.classList.remove('selected', 'error');
  var letterInput = document.getElementById('ap-letter-file');
  if (letterInput) letterInput.value = '';
  var letterLabel = document.getElementById('letter-label');
  if (letterLabel) letterLabel.textContent = 'Klik untuk upload surat lamaran';
  var letterArea = document.getElementById('letter-upload-area');
  if (letterArea) letterArea.classList.remove('selected', 'error');
  // Reset to step 1
  applyNextStep(1, true);
  showPage('apply');
}

var currentApplyStep = 1;

function applyNextStep(step, reset) {
  // Per-step validation before advancing
  if (!reset && step > currentApplyStep) {
    if (currentApplyStep === 1) {
      var ok1 = true;
      ['ap-name','ap-email','ap-phone','ap-city'].forEach(clearFieldError);
      var n  = (document.getElementById('ap-name')  ||{value:''}).value.trim();
      var e  = (document.getElementById('ap-email') ||{value:''}).value.trim();
      var ph = String((document.getElementById('ap-phone') ||{value:''}).value).trim();
      var ct = (document.getElementById('ap-city')  ||{value:''}).value.trim();
      if (!n)  { setFieldError('ap-name',  'Nama lengkap wajib diisi'); ok1=false; }
      if (!e)  { setFieldError('ap-email', 'Email wajib diisi'); ok1=false; }
      else if (!isValidEmail(e)) { setFieldError('ap-email','Format email tidak valid (contoh: nama@email.com)'); ok1=false; }
      if (!ph) { setFieldError('ap-phone', 'Nomor HP wajib diisi'); ok1=false; }
      if (!ct) { setFieldError('ap-city',  'Kota domisili wajib diisi'); ok1=false; }
      if (!ok1) { window.scrollTo(0,0); return; }
    }
    if (currentApplyStep === 2) {
      var cvChk = document.getElementById('ap-cv');
      var cvAr  = document.getElementById('cv-upload-area');
      if (!cvChk || !cvChk.files || !cvChk.files[0]) {
        if (cvAr) cvAr.classList.add('error');
        showToast('Upload CV / resume terlebih dulu!');
        return;
      }
    }
    if (currentApplyStep === 3) {
      var ok3 = true;
      ['ap-q1','ap-q2','ap-skills'].forEach(clearFieldError);
      var q1  = (document.getElementById('ap-q1')    ||{value:''}).value.trim();
      var q2  = (document.getElementById('ap-q2')    ||{value:''}).value.trim();
      var sk  = (document.getElementById('ap-skills')||{value:''}).value.trim();
      if (!q1) { setFieldError('ap-q1',    'Motivasi melamar wajib diisi'); ok3=false; }
      if (!q2) { setFieldError('ap-q2',    'Pencapaian terbesar wajib diisi'); ok3=false; }
      if (!sk) { setFieldError('ap-skills','Skill wajib diisi'); ok3=false; }
      if (!ok3) { window.scrollTo(0,0); return; }
    }
  }
  // Show/hide step divs
  for (var i = 1; i <= 4; i++) {
    var el = document.getElementById('apply-step-' + i);
    if (el) el.style.display = (i === step) ? 'block' : 'none';
  }
  // Update progress indicators
  for (var s = 1; s <= 4; s++) {
    var prog = document.getElementById('prog' + s);
    if (!prog) continue;
    prog.className = 'prog-step';
    if (s < step) prog.classList.add('done');
    else if (s === step) prog.classList.add('active');
    var dot = prog.querySelector('.prog-dot');
    if (dot) dot.innerHTML = s < step ? '&#10003;' : s;
    var line = document.getElementById('pline' + s);
    if (line) line.className = 'prog-line' + (s < step ? ' done' : '');
  }
  currentApplyStep = step;
  if (step === 4) buildReview();
  window.scrollTo(0, 0);
}

function buildReview(){
  var name = document.getElementById('ap-name').value || '-';
  var email = document.getElementById('ap-email').value || '-';
  var phone = document.getElementById('ap-phone').value || '-';
  var city = document.getElementById('ap-city').value || '-';
  var edu = document.getElementById('ap-edu').value || '-';
  var exp = document.getElementById('ap-exp').value || '-';
  var salary = document.getElementById('ap-salary').value || '-';
  var start = document.getElementById('ap-start').value || '-';
  var skills = document.getElementById('ap-skills').value || '-';
  var cvInput = document.getElementById('ap-cv');
  var cvName = (cvInput && cvInput.files && cvInput.files[0]) ? cvInput.files[0].name : '-';
  var letterInput = document.getElementById('ap-letter-file');
  var letterName = (letterInput && letterInput.files && letterInput.files[0]) ? letterInput.files[0].name : '-';
  var items = [
    ['Nama','ap-name',name],['Email','ap-email',email],['Nomor HP','ap-phone',phone],
    ['Domisili','ap-city',city],['Pendidikan','ap-edu',edu],['Pengalaman','ap-exp',exp],
    ['Ekspektasi Gaji','ap-salary',salary],['Mulai Bekerja','ap-start',start],['CV / Resume','ap-cv',cvName],['File Surat Lamaran','ap-letter-file',letterName],['Skill','ap-skills',skills]
  ];
  document.getElementById('apply-review-content').innerHTML = items.map(function(it){
    return '<div class="cp-info-item"><span class="cp-info-label">'+it[0]+'</span><span class="cp-info-val">'+it[2]+'</span></div>';
  }).join('');
}

function handleCvFile(input) {
  var label = document.getElementById('cv-label');
  var area = document.getElementById('cv-upload-area');
  if (!input || !input.files || !input.files[0]) return;
  var file = input.files[0];
  var allowed = ['application/pdf', 'image/jpeg', 'image/png', 'image/webp'];
  if (allowed.indexOf(file.type) === -1) {
    input.value = '';
    if (area) area.classList.add('error');
    if (label) label.textContent = 'Format harus PDF, JPG, PNG, atau WEBP';
    showToast('Format CV harus PDF atau gambar!');
    return;
  }
  if (file.size > 5 * 1024 * 1024) {
    input.value = '';
    if (area) area.classList.add('error');
    if (label) label.textContent = 'Ukuran file melebihi 5 MB';
    showToast('Ukuran CV maksimal 5 MB!');
    return;
  }
  if (area) area.classList.remove('error');
  if (area) area.classList.add('selected');
  if (label) label.textContent = 'CV dipilih: ' + file.name;
}

function handleLetterFile(input) {
  var label = document.getElementById('letter-label');
  var area = document.getElementById('letter-upload-area');
  if (!input || !input.files || !input.files[0]) return;
  var file = input.files[0];
  var allowed = ['application/pdf', 'image/jpeg', 'image/png', 'image/webp'];
  if (allowed.indexOf(file.type) === -1) {
    input.value = '';
    if (area) area.classList.add('error');
    if (label) label.textContent = 'Format harus PDF, JPG, PNG, atau WEBP';
    showToast('Format surat lamaran harus PDF atau gambar!');
    return;
  }
  if (file.size > 5 * 1024 * 1024) {
    input.value = '';
    if (area) area.classList.add('error');
    if (label) label.textContent = 'Ukuran file melebihi 5 MB';
    showToast('Ukuran surat lamaran maksimal 5 MB!');
    return;
  }
  if (area) area.classList.remove('error');
  if (area) area.classList.add('selected');
  if (label) label.textContent = 'Surat lamaran dipilih: ' + file.name;
}
function submitApplication() {
  var btn = document.querySelector('#apply-step-4 .btn-submit-apply');
  var cvInput = document.getElementById('ap-cv');
  if (!cvInput || !cvInput.files || !cvInput.files[0]) {
    showToast('CV tidak ditemukan, silakan kembali ke step Dokumen dan upload ulang!');
    applyNextStep(2, true);
    return;
  }
  var fd = new FormData();
  fd.append('lowongan_id',  currentJobId || 0);
  fd.append('nama',         (document.getElementById('ap-name')        ||{value:''}).value);
  fd.append('email',        (document.getElementById('ap-email')       ||{value:''}).value);
  fd.append('no_hp',        (document.getElementById('ap-phone')       ||{value:''}).value);
  fd.append('kota',         (document.getElementById('ap-city')        ||{value:''}).value);
  fd.append('pendidikan',   (document.getElementById('ap-edu')         ||{value:''}).value);
  fd.append('pengalaman',   (document.getElementById('ap-exp')         ||{value:''}).value);
  fd.append('gaji',         (document.getElementById('ap-salary')      ||{value:''}).value);
  fd.append('cover_letter', (document.getElementById('ap-coverletter') ||{value:''}).value);
  fd.append('cv_resume', cvInput.files[0]);
  var letterInput = document.getElementById('ap-letter-file');
  if (letterInput && letterInput.files && letterInput.files[0]) fd.append('cover_letter_file', letterInput.files[0]);
  if (btn) { btn.disabled=true; btn.textContent='Mengirim...'; }
  fetch('lamar.php', {method:'POST', body:fd})
    .then(function(res){return res.json();})
    .then(function(data){
      if (btn) { btn.disabled=false; btn.textContent='Kirim Lamaran 🚀'; }
      if (data.status==='ok') { showPage('home'); showToast('🎉 Lamaranmu berhasil dikirim!'); }
      else if (data.status==='login') { showPage('login'); showToast('Kamu harus login dulu untuk melamar!'); }
      else { showToast(data.pesan||'Terjadi kesalahan, coba lagi!'); }
    })
    .catch(function(err){
      if (btn) { btn.disabled=false; btn.textContent='Kirim Lamaran 🚀'; }
      console.error('submitApplication error:', err);
      showToast('Gagal terhubung ke server!');
    });
}

function saveJob() {
  showToast('Lowongan disimpan ke daftar pantaumu.');
}

function showToast(msg) {
  var t = document.getElementById('toast');
  t.textContent = msg;
  t.classList.add('show');
  setTimeout(function(){t.classList.remove('show')}, 3000);
}

document.addEventListener('keydown', function(e){
  if(e.key==='Escape') closeModalDirect();
});


var companies = [];
var loggedInType = null;
function escapeHtml(value) { return String(value == null ? '' : value).replace(/[&<>'"]/g, function(ch){ return {'&':'&amp;','<':'&lt;','>':'&gt;',"'":'&#39;','"':'&quot;'}[ch]; }); }
function loadJobs() {
  fetch('list_jobs.php')
    .then(function(res){ return res.json(); })
    .then(function(res){
      if (res.status === 'ok') {
        jobs = res.data;
        filteredJobs = jobs.slice();
        renderJobs();
      }
    });
}
function loadCompanies() { fetch('list_companies.php').then(function(res){return res.json();}).then(function(res){ if(res.status==='ok'){ companies=res.data; renderCompanies(); } }); }
function renderCompanies() { var grid=document.getElementById('companies-grid'); if(!grid)return; if(!companies.length){grid.innerHTML='<div class="profile-empty">Belum ada perusahaan terdaftar.</div>';return;} grid.innerHTML=companies.map(function(c,i){return '<div class="company-card" onclick="openCompanyProfile('+c.id+')" style="animation-delay:'+(i*0.04)+'s"><div class="cc-top"><div class="cc-logo" style="background:'+(c.logoUrl ? 'var(--paper)' : c.logoBg)+';color:'+c.logoCol+'">'+logoContent(c)+'</div><div><div class="cc-name">'+escapeHtml(c.name)+'</div><div class="cc-industry">'+escapeHtml(c.industry)+' · '+escapeHtml(c.city)+'</div></div></div><div class="cc-desc">'+escapeHtml(c.desc)+'</div><div class="cc-meta"><span class="cc-pill">'+c.jobs+' lowongan aktif</span><span class="cc-pill">'+escapeHtml(c.website)+'</span></div></div>';}).join(''); }
function openCompanyProfile(id) { var c=companies.find(function(x){return x.id===id;}); if(!c)return; var related=jobs.filter(function(j){return j.company_id===id;}); document.getElementById('cp-wrap').innerHTML='<div class="cp-cover"></div><div class="cp-header"><div class="cp-logo-wrap"><div class="cp-logo" style="background:'+(c.logoUrl ? 'var(--paper)' : c.logoBg)+';color:'+c.logoCol+'">'+logoContent(c)+'</div><div><div class="cp-name">'+escapeHtml(c.name)+'</div><div class="cp-tagline">'+escapeHtml(c.tagline||c.industry+' · '+c.city)+'</div></div></div><div class="cp-stats"><div class="cp-stat"><span class="cp-stat-val">'+c.jobs+'</span><span class="cp-stat-lbl">Lowongan aktif</span></div><div class="cp-stat"><span class="cp-stat-val">'+escapeHtml(c.city)+'</span><span class="cp-stat-lbl">Lokasi</span></div><div class="cp-stat"><span class="cp-stat-val">'+escapeHtml(c.industry)+'</span><span class="cp-stat-lbl">Industri</span></div></div></div><div class="cp-body"><div><div class="cp-section"><div class="cp-section-title">Tentang Perusahaan</div><p>'+escapeHtml(c.desc)+'</p></div><div class="cp-section"><div class="cp-section-title">Kandidat yang Dicari</div><p>'+escapeHtml(c.looking)+'</p></div></div><div><div class="cp-section"><div class="cp-section-title">Informasi</div><div class="cp-info-list"><div class="cp-info-item"><span class="cp-info-label">Email</span><span class="cp-info-val">'+escapeHtml(c.email)+'</span></div><div class="cp-info-item"><span class="cp-info-label">Website</span><span class="cp-info-val">'+escapeHtml(c.website)+'</span></div></div></div><div class="cp-section"><div class="cp-section-title">Lowongan Aktif</div>'+(related.length?related.map(function(j){return '<div class="cp-job-item" onclick="openJob('+j.id+')"><div class="cp-job-title">'+escapeHtml(j.title)+'</div><div class="cp-job-type">'+escapeHtml(j.type)+'</div></div>';}).join(''):'<div class="profile-empty">Belum ada lowongan aktif.</div>')+'</div></div></div>'; showPage('company-profile'); }
// ===== VALIDATION HELPERS =====
function setFieldError(id, msg) {
  var el = document.getElementById(id);
  if (!el) return;
  el.classList.add('input-error');
  var existing = el.parentNode.querySelector('.field-error-msg');
  if (existing) existing.remove();
  if (msg) {
    var err = document.createElement('div');
    err.className = 'field-error-msg';
    err.textContent = msg;
    el.parentNode.appendChild(err);
  }
  el.addEventListener('input', function clearMe() {
    el.classList.remove('input-error');
    var m = el.parentNode.querySelector('.field-error-msg');
    if (m) m.remove();
    el.removeEventListener('input', clearMe);
  });
}
function clearFieldError(id) {
  var el = document.getElementById(id);
  if (!el) return;
  el.classList.remove('input-error');
  var m = el.parentNode.querySelector('.field-error-msg');
  if (m) m.remove();
}
function isValidEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()); }
function isValidPhone(v) { return /^[0-9+\-\s]{7,15}$/.test(v.trim()); }
// ===== END VALIDATION HELPERS =====

function doCompanyLogin() {
  var email = document.getElementById('cl-email').value.trim();
  var pass  = document.getElementById('cl-pass').value;
  var ok = true;
  clearFieldError('cl-email'); clearFieldError('cl-pass');
  if (!email) { setFieldError('cl-email','Email perusahaan wajib diisi'); ok=false; }
  else if (!isValidEmail(email)) { setFieldError('cl-email','Format email tidak valid (contoh: hr@perusahaan.com)'); ok=false; }
  if (!pass) { setFieldError('cl-pass','Password wajib diisi'); ok=false; }
  if (!ok) return;
  var fd = new FormData();
  fd.append('email', email); fd.append('password', pass);
  fetch('company_login.php', {method:'POST',body:fd})
    .then(function(r){return r.json();})
    .then(function(d){
      if (d.status==='ok') companyLoginSuccess(d.nama);
      else setFieldError('cl-email', d.pesan||'Email atau password salah');
    })
    .catch(function(){showToast('Gagal terhubung ke server!');});
}
function doCompanySignup(){var pass=document.getElementById('cs-pass').value;var pass2=document.getElementById('cs-pass2').value;if(pass!==pass2){showToast('Password tidak cocok!');return;}var fd=new FormData();fd.append('nama_perusahaan',document.getElementById('cs-name').value.trim());fd.append('industri',document.getElementById('cs-industry').value.trim());fd.append('email',document.getElementById('cs-email').value.trim());fd.append('kota',document.getElementById('cs-city').value.trim());fd.append('website',document.getElementById('cs-website').value.trim());fd.append('deskripsi',document.getElementById('cs-desc').value.trim());fd.append('cari_kandidat',document.getElementById('cs-looking').value.trim());fd.append('password',pass);fetch('company_register.php',{method:'POST',body:fd}).then(function(r){return r.json();}).then(function(d){if(d.status==='ok')companyLoginSuccess(d.nama);else showToast(d.pesan);}).catch(function(){showToast('Gagal terhubung ke server!');});}
function companyLoginSuccess(name){loggedInUser=name;loggedInType='company';document.getElementById('nav-auth-btns').style.display='none';var badge=document.getElementById('nav-user-badge');badge.style.display='list-item';document.getElementById('nav-username').textContent=name;document.getElementById('nav-avatar').textContent=name.split(' ').slice(0,2).map(function(w){return w[0];}).join('').toUpperCase();showPage('company-dashboard');loadCompanyDashboard();showToast('Halo, admin '+name+'!');}
function loadCompanyDashboard(){fetch('company_session.php').then(function(r){return r.json();}).then(function(res){if(res.status!=='ok'){showToast(res.pesan);showPage('company-login');return;}var d=res.data;document.getElementById('cd-title').textContent=d.nama_perusahaan||'Company Dashboard';document.getElementById('cd-sub').textContent=(d.industri||'Perusahaan')+' · '+(d.kota||'Lokasi belum diisi');document.getElementById('cd-name').value=d.nama_perusahaan||'';document.getElementById('cd-industry').value=d.industri||'';document.getElementById('cd-city').value=d.kota||'';document.getElementById('cd-website').value=d.website||'';document.getElementById('cd-tagline').value=d.tagline||'';document.getElementById('cd-desc').value=d.deskripsi||'';document.getElementById('cd-looking').value=d.cari_kandidat||'';setAvatarElement(document.getElementById('cd-logo-preview'), d.nama_perusahaan, d.logo || '');setAvatarElement(document.getElementById('nav-avatar'), d.nama_perusahaan, d.logo || '');renderCompanyJobs(res.jobs||[]);}).catch(function(){showToast('Gagal memuat dashboard perusahaan!');});}
function renderCompanyJobs(items){var list=document.getElementById('cd-job-list');if(!list)return;if(!items.length){list.innerHTML='<div class="profile-empty">Belum ada lowongan.</div>';return;}list.innerHTML=items.map(function(j){return '<div class="company-job-row"><div class="company-job-row-title">'+escapeHtml(j.judul)+'</div><div class="company-job-row-meta">'+escapeHtml(j.lokasi)+' · '+escapeHtml(j.tipe)+' · '+escapeHtml(j.status)+'</div></div>';}).join('');}
function saveCompanyProfile(){var fd=new FormData();fd.append('nama_perusahaan',document.getElementById('cd-name').value.trim());fd.append('industri',document.getElementById('cd-industry').value.trim());fd.append('kota',document.getElementById('cd-city').value.trim());fd.append('website',document.getElementById('cd-website').value.trim());fd.append('tagline',document.getElementById('cd-tagline').value.trim());fd.append('deskripsi',document.getElementById('cd-desc').value.trim());fd.append('cari_kandidat',document.getElementById('cd-looking').value.trim());fetch('update_company_profile.php',{method:'POST',body:fd}).then(function(r){return r.json();}).then(function(d){if(d.status==='ok'){showToast(d.pesan);loggedInUser=d.nama;document.getElementById('nav-username').textContent=d.nama;loadCompanyDashboard();loadCompanies();}else showToast(d.pesan);}).catch(function(){showToast('Gagal menyimpan company profile!');});}
function createCompanyJob(){var fd=new FormData();fd.append('judul',document.getElementById('job-title-new').value.trim());fd.append('lokasi',document.getElementById('job-location-new').value.trim());fd.append('tipe',document.getElementById('job-type-new').value);fd.append('mode_kerja',document.getElementById('job-mode-new').value);fd.append('pengalaman',document.getElementById('job-exp-new').value.trim());fd.append('gaji_min',document.getElementById('job-salary-min-new').value);fd.append('gaji_max',document.getElementById('job-salary-max-new').value);fd.append('deskripsi',document.getElementById('job-desc-new').value.trim());fd.append('kualifikasi',document.getElementById('job-qual-new').value.trim());fetch('tambah_lowongan.php',{method:'POST',body:fd}).then(function(r){return r.json();}).then(function(d){if(d.status==='ok'){showToast(d.pesan);['job-title-new','job-location-new','job-exp-new','job-salary-min-new','job-salary-max-new','job-desc-new','job-qual-new'].forEach(function(id){document.getElementById(id).value='';});loadCompanyDashboard();loadJobs();loadCompanies();}else if(d.status==='login'){showPage('company-login');showToast(d.pesan);}else showToast(d.pesan);}).catch(function(){showToast('Gagal menambah lowongan!');});}


renderJobs();
loadJobs();
loadCompanies();

// --- AUTH & PAGE ROUTING ---
var loggedInUser = null;

function showPage(name) {
  document.querySelectorAll('.page').forEach(function(p){ p.classList.remove('active'); });
  var el = document.getElementById('page-' + name);
  if(el) el.classList.add('active');
  window.scrollTo(0,0);
  // Sembunyikan marquee & footer saat di halaman profile
  var hide = (name === 'profile');
  var marquee = document.getElementById('global-marquee');
  var footer  = document.getElementById('global-footer');
  if(marquee) marquee.style.display = hide ? 'none' : '';
  if(footer)  footer.style.display  = hide ? 'none' : '';
  if(name === 'companies') loadCompanies();
  if(name === 'company-dashboard') loadCompanyDashboard();
}

function doLogin() {
  var email = document.getElementById('login-email').value.trim();
  var pass  = document.getElementById('login-pass').value;
  var ok = true;
  clearFieldError('login-email'); clearFieldError('login-pass');
  if (!email) { setFieldError('login-email','Email wajib diisi'); ok=false; }
  else if (!isValidEmail(email)) { setFieldError('login-email','Format email tidak valid (contoh: nama@email.com)'); ok=false; }
  if (!pass) { setFieldError('login-pass','Password wajib diisi'); ok=false; }
  if (!ok) return;
  var btn = document.querySelector('#page-login .btn-auth');
  if (btn) { btn.disabled=true; btn.textContent='Masuk...'; }
  var fd = new FormData();
  fd.append('email', email); fd.append('password', pass);
  fetch('login.php', {method:'POST',body:fd})
    .then(function(res){return res.json();})
    .then(function(data){
      if (btn) { btn.disabled=false; btn.textContent='Masuk'; }
      if (data.status==='ok') loginSuccess(data.nama);
      else setFieldError('login-email', data.pesan||'Email atau password salah');
    })
    .catch(function(){ if(btn){btn.disabled=false;btn.textContent='Masuk';} showToast('Gagal terhubung ke server!'); });
}

function doSignup() {
  var fname = document.getElementById('signup-fname').value.trim();
  var lname = document.getElementById('signup-lname').value.trim();
  var email = document.getElementById('signup-email').value.trim();
  var pass  = document.getElementById('signup-pass').value;
  var pass2 = document.getElementById('signup-pass2').value;
  var ok = true;
  ['signup-fname','signup-email','signup-pass','signup-pass2'].forEach(clearFieldError);
  if (!fname) { setFieldError('signup-fname','Nama depan wajib diisi'); ok=false; }
  if (!email) { setFieldError('signup-email','Email wajib diisi'); ok=false; }
  else if (!isValidEmail(email)) { setFieldError('signup-email','Format email tidak valid (contoh: nama@email.com)'); ok=false; }
  if (!pass) { setFieldError('signup-pass','Password wajib diisi'); ok=false; }
  else if (pass.length < 8) { setFieldError('signup-pass','Password minimal 8 karakter'); ok=false; }
  if (!pass2) { setFieldError('signup-pass2','Konfirmasi password wajib diisi'); ok=false; }
  else if (pass && pass !== pass2) { setFieldError('signup-pass2','Password tidak cocok'); ok=false; }
  if (!ok) return;
  var btn = document.querySelector('#page-signup .btn-auth');
  if (btn) { btn.disabled=true; btn.textContent='Mendaftar...'; }
  var fd = new FormData();
  fd.append('nama', fname + (lname ? ' ' + lname : ''));
  fd.append('email', email); fd.append('password', pass);
  fetch('register.php', {method:'POST',body:fd})
    .then(function(res){return res.json();})
    .then(function(data){
      if (btn) { btn.disabled=false; btn.textContent='Daftar Sekarang'; }
      if (data.status==='ok') { showToast('Registrasi berhasil! Silakan login.'); showPage('login'); }
      else setFieldError('signup-email', data.pesan||'Pendaftaran gagal');
    })
    .catch(function(){ if(btn){btn.disabled=false;btn.textContent='Daftar Sekarang';} showToast('Gagal terhubung ke server!'); });
}

function doGoogleAuth() {
  loginSuccess('Pengguna Google');
}

function loginSuccess(name) {
  loggedInUser = name;
  loggedInType = 'user';
  // Update navbar
  document.getElementById('nav-auth-btns').style.display = 'none';
  var badge = document.getElementById('nav-user-badge');
  badge.style.display = 'list-item';
  document.getElementById('nav-username').textContent = name;
  var initials = name.split(' ').slice(0,2).map(function(w){return w[0]}).join('').toUpperCase();
  document.getElementById('nav-avatar').textContent = initials;
  showPage('home');
  showToast('Halo, ' + name + '! Selamat datang di Workaholic 👋');
}

function doLogout() {
  fetch('logout.php')
    .then(() => {
      loggedInUser = null;
      loggedInType = null;
      document.getElementById('nav-auth-btns').style.display = 'flex';
      document.getElementById('nav-user-badge').style.display = 'none';
      showPage('home');
      showToast('Kamu telah keluar. Sampai jumpa!');
    });
}

</script>
</div></div><!-- end home-left --></div><!-- end home-layout -->
</div><!-- end page-home -->

<!-- LOGIN PAGE -->
<div id="page-login" class="page">
<div class="auth-wrap">
  <div class="auth-box">
    <div class="auth-logo" onclick="showPage('home')">Workaholic<span>.</span></div>
    <h2 class="auth-title">Selamat datang kembali</h2>
    <p class="auth-sub">Belum punya akun? <a onclick="showPage('signup')">Daftar sekarang</a></p>

    <div class="auth-field">
      <label class="auth-label">Email</label>
      <input class="auth-input" type="email" id="login-email" placeholder="kamu@email.com">
    </div>
    <div class="auth-field">
      <label class="auth-label">Password</label>
      <input class="auth-input" type="password" id="login-pass" placeholder="Masukkan password">
    </div>
    <div class="auth-row">
      <label class="auth-check">
        <input type="checkbox"> Ingat saya
      </label>
      <a class="auth-forgot">Lupa password?</a>
    </div>

    <button class="btn-auth" onclick="doLogin()">Masuk</button>

    <div class="auth-divider">atau</div>

    <button class="btn-google" onclick="doGoogleAuth()">
      <span class="google-icon"></span>
      Masuk dengan Google
    </button>

    <div class="auth-switch">
      Belum punya akun? <a onclick="showPage('signup')">Daftar gratis</a>
    </div>
  </div>
</div>
</div>

<!-- SIGN UP PAGE -->
<div id="page-signup" class="page">
<div class="auth-wrap">
  <div class="auth-box">
    <div class="auth-logo" onclick="showPage('home')">Workaholic<span>.</span></div>
    <h2 class="auth-title">Buat akun baru</h2>
    <p class="auth-sub">Sudah punya akun? <a onclick="showPage('login')">Masuk di sini</a></p>

    <div class="field-row">
      <div class="auth-field">
        <label class="auth-label">Nama Depan</label>
        <input class="auth-input" type="text" id="signup-fname" placeholder="Budi">
      </div>
      <div class="auth-field">
        <label class="auth-label">Nama Belakang</label>
        <input class="auth-input" type="text" id="signup-lname" placeholder="Santoso">
      </div>
    </div>
    <div class="auth-field">
      <label class="auth-label">Email</label>
      <input class="auth-input" type="email" id="signup-email" placeholder="kamu@email.com">
    </div>
    <div class="auth-field">
      <label class="auth-label">Password</label>
      <input class="auth-input" type="password" id="signup-pass" placeholder="Minimal 8 karakter">
    </div>
    <div class="auth-field" style="margin-bottom:20px">
      <label class="auth-label">Konfirmasi Password</label>
      <input class="auth-input" type="password" id="signup-pass2" placeholder="Ulangi password">
    </div>

    <p class="auth-terms">
      Dengan mendaftar, kamu menyetujui ketentuan Workaholic.
    </p>

    <button class="btn-auth" onclick="doSignup()">Buat Akun</button>

    <div class="auth-divider">atau</div>

    <button class="btn-google" onclick="doGoogleAuth()">
      <span class="google-icon"></span>
      Daftar dengan Google
    </button>

    <div class="auth-switch">
      Sudah punya akun? <a onclick="showPage('login')">Masuk</a>
    </div>
  </div>
</div>
</div>

<!-- COMPANY LOGIN PAGE -->
<div id="page-company-login" class="page">
<div class="auth-wrap"><div class="auth-box">
  <div class="auth-logo" onclick="showPage('home')">Workaholic<span>.</span></div>
  <h2 class="auth-title">Masuk perusahaan</h2>
  <p class="auth-sub">Kelola profil perusahaan dan lowongan aktif.</p>
  <div class="auth-field"><label class="auth-label">Email Perusahaan</label><input class="auth-input" type="email" id="cl-email" placeholder="hr@perusahaan.com"></div>
  <div class="auth-field"><label class="auth-label">Password</label><input class="auth-input" type="password" id="cl-pass" placeholder="Password perusahaan"></div>
  <button class="btn-auth" onclick="doCompanyLogin()">Masuk sebagai Perusahaan</button>
  <div class="auth-switch">Belum punya akun perusahaan? <a onclick="showPage('company-signup')">Daftar perusahaan</a></div>
  <div class="auth-alt-link"><a onclick="showPage('login')">Masuk sebagai pencari kerja</a></div>
</div></div>
</div>

<!-- COMPANY SIGNUP PAGE -->
<div id="page-company-signup" class="page">
<div class="auth-wrap"><div class="auth-box" style="max-width:640px">
  <div class="auth-logo" onclick="showPage('home')">Workaholic<span>.</span></div>
  <h2 class="auth-title">Daftarkan perusahaan</h2>
  <p class="auth-sub">Akun ini akan menjadi admin untuk company profile dan lowongan.</p>
  <div class="field-row"><div class="auth-field"><label class="auth-label">Nama Perusahaan *</label><input class="auth-input" type="text" id="cs-name" placeholder="PT Contoh Indonesia"></div><div class="auth-field"><label class="auth-label">Industri</label><input class="auth-input" type="text" id="cs-industry" placeholder="Teknologi, Keuangan, dll"></div></div>
  <div class="field-row"><div class="auth-field"><label class="auth-label">Email Perusahaan *</label><input class="auth-input" type="email" id="cs-email" placeholder="hr@perusahaan.com"></div><div class="auth-field"><label class="auth-label">Kota</label><input class="auth-input" type="text" id="cs-city" placeholder="Jakarta"></div></div>
  <div class="auth-field"><label class="auth-label">Website</label><input class="auth-input" type="url" id="cs-website" placeholder="https://perusahaan.com"></div>
  <div class="auth-field"><label class="auth-label">Perkenalan Company</label><textarea class="edit-textarea" id="cs-desc" placeholder="Ceritakan perusahaan ini bergerak di bidang apa..."></textarea></div>
  <div class="auth-field"><label class="auth-label">Sedang mencari kandidat seperti apa?</label><textarea class="edit-textarea" id="cs-looking" placeholder="Contoh: kandidat yang kuat di komunikasi, teliti, dan nyaman bekerja hybrid..."></textarea></div>
  <div class="field-row"><div class="auth-field"><label class="auth-label">Password *</label><input class="auth-input" type="password" id="cs-pass" placeholder="Minimal 8 karakter"></div><div class="auth-field"><label class="auth-label">Konfirmasi Password *</label><input class="auth-input" type="password" id="cs-pass2" placeholder="Ulangi password"></div></div>
  <button class="btn-auth" onclick="doCompanySignup()">Buat Akun Perusahaan</button>
  <div class="auth-switch">Sudah punya akun perusahaan? <a onclick="showPage('company-login')">Masuk</a></div>
</div></div>
</div>

<!-- COMPANY DASHBOARD PAGE -->
<div id="page-company-dashboard" class="page">
<div class="company-admin-wrap">
  <div class="company-admin-head"><div><div class="hero-kicker">Admin Perusahaan</div><div class="company-admin-title" id="cd-title">Company Dashboard</div><div class="company-admin-sub" id="cd-sub">Kelola company profile dan lowongan dari satu tempat.</div></div><button class="btn-search" onclick="showPage('companies');loadCompanies()">Lihat Company Profile</button></div>
  <div class="company-admin-grid"><div>
    <div class="company-admin-card"><div class="company-admin-card-title">Company Profile</div><div class="photo-upload-row"><div class="photo-preview-sm" id="cd-logo-preview">CO</div><div><input type="file" id="company-logo-input" accept="image/png,image/jpeg,image/webp" style="display:none" onchange="uploadCompanyLogo()"><button class="btn-upload-photo" onclick="document.getElementById('company-logo-input').click()">Upload Logo Perusahaan</button><div class="edit-hint">JPG, PNG, atau WEBP, maks. 2 MB.</div></div></div><div class="edit-two-col"><div class="edit-group"><label class="edit-label">Nama Perusahaan *</label><input class="edit-input" id="cd-name" type="text"></div><div class="edit-group"><label class="edit-label">Industri</label><input class="edit-input" id="cd-industry" type="text"></div></div><div class="edit-two-col"><div class="edit-group"><label class="edit-label">Kota</label><input class="edit-input" id="cd-city" type="text"></div><div class="edit-group"><label class="edit-label">Website</label><input class="edit-input" id="cd-website" type="url"></div></div><div class="edit-group"><label class="edit-label">Tagline</label><input class="edit-input" id="cd-tagline" type="text"></div><div class="edit-group"><label class="edit-label">Perkenalan Company</label><textarea class="edit-textarea" id="cd-desc"></textarea></div><div class="edit-group"><label class="edit-label">Sedang mencari kandidat seperti apa?</label><textarea class="edit-textarea" id="cd-looking"></textarea></div><div class="edit-footer"><button class="btn-save-profile" onclick="saveCompanyProfile()">Simpan Company Profile</button></div></div>
    <div class="company-admin-card"><div class="company-admin-card-title">Tambah Lowongan</div><div class="edit-two-col"><div class="edit-group"><label class="edit-label">Judul Lowongan *</label><input class="edit-input" id="job-title-new" type="text"></div><div class="edit-group"><label class="edit-label">Lokasi *</label><input class="edit-input" id="job-location-new" type="text"></div></div><div class="edit-two-col"><div class="edit-group"><label class="edit-label">Tipe *</label><select class="edit-input" id="job-type-new"><option>Full-time</option><option>Part-time</option><option>Internship</option><option>Freelance</option><option>Contract</option></select></div><div class="edit-group"><label class="edit-label">Mode Kerja *</label><select class="edit-input" id="job-mode-new"><option>On-site</option><option>Hybrid</option><option>Remote</option></select></div></div><div class="edit-two-col"><div class="edit-group"><label class="edit-label">Pengalaman</label><input class="edit-input" id="job-exp-new" type="text"></div><div class="edit-group"><label class="edit-label">Gaji Min / Max</label><div style="display:grid;grid-template-columns:1fr 1fr;gap:8px"><input class="edit-input" id="job-salary-min-new" type="number"><input class="edit-input" id="job-salary-max-new" type="number"></div></div></div><div class="edit-group"><label class="edit-label">Deskripsi Lowongan *</label><textarea class="edit-textarea" id="job-desc-new"></textarea></div><div class="edit-group"><label class="edit-label">Kualifikasi</label><textarea class="edit-textarea" id="job-qual-new"></textarea></div><div class="edit-footer"><button class="btn-save-profile" onclick="createCompanyJob()">Terbitkan Lowongan</button></div></div>
  </div><aside><div class="company-admin-card"><div class="company-admin-card-title">Lowongan Perusahaan</div><div class="company-job-list" id="cd-job-list"><div class="profile-empty">Belum ada lowongan.</div></div></div></aside></div>
</div>
</div>

<!-- APPLY PAGE -->
<div id="page-apply" class="page">
<div class="apply-wrap">
  <div class="apply-header">
    <div class="apply-company-logo" id="apply-logo-el"></div>
    <div>
      <div class="apply-job-title" id="apply-job-title-el">Frontend Developer</div>
      <div class="apply-company-name" id="apply-company-el">Tokopedia · Jakarta Selatan</div>
    </div>
  </div>

  <div class="apply-progress">
    <div class="prog-step done" id="prog1">
      <div class="prog-dot">&#10003;</div>
      <span>Info Pribadi</span>
    </div>
    <div class="prog-line done" id="pline1"></div>
    <div class="prog-step active" id="prog2">
      <div class="prog-dot">2</div>
      <span>Dokumen</span>
    </div>
    <div class="prog-line" id="pline2"></div>
    <div class="prog-step" id="prog3">
      <div class="prog-dot">3</div>
      <span>Pertanyaan</span>
    </div>
    <div class="prog-line" id="pline3"></div>
    <div class="prog-step" id="prog4">
      <div class="prog-dot">4</div>
      <span>Review</span>
    </div>
  </div>

  <!-- Step 1: Info Pribadi -->
  <div id="apply-step-1">
    <div class="apply-section">
      <div class="apply-section-title">Informasi Pribadi</div>
      <div class="apply-two-col">
        <div class="apply-field">
          <label class="apply-label">Nama Lengkap *</label>
          <input class="apply-input" type="text" id="ap-name" placeholder="Nama lengkap sesuai KTP">
        </div>
        <div class="apply-field">
          <label class="apply-label">Email *</label>
          <input class="apply-input" type="email" id="ap-email" placeholder="email@kamu.com">
        </div>
      </div>
      <div class="apply-two-col">
        <div class="apply-field">
          <label class="apply-label">Nomor HP *</label>
          <input class="apply-input" type="number" id="ap-phone" placeholder="08xx-xxxx-xxxx">
        </div>
        <div class="apply-field">
          <label class="apply-label">Kota Domisili *</label>
          <input class="apply-input" type="text" id="ap-city" placeholder="contoh: Semarang">
        </div>
      </div>
      <div class="apply-field">
        <label class="apply-label">LinkedIn (opsional)</label>
        <input class="apply-input" type="url" id="ap-linkedin" placeholder="https://linkedin.com/in/namakamu">
      </div>
      <div class="apply-field">
        <label class="apply-label">Portfolio / Website (opsional)</label>
        <input class="apply-input" type="url" id="ap-portfolio" placeholder="https://portfoliokamu.com">
      </div>
    </div>

    <div class="apply-section">
      <div class="apply-section-title">Pengalaman & Pendidikan</div>
      <div class="apply-two-col">
        <div class="apply-field">
          <label class="apply-label">Pendidikan Terakhir *</label>
          <select class="apply-select" id="ap-edu">
            <option value="">Pilih pendidikan</option>
            <option>SMA / SMK</option>
            <option>D3</option>
            <option>S1</option>
            <option>S2</option>
            <option>S3</option>
          </select>
        </div>
        <div class="apply-field">
          <label class="apply-label">Pengalaman Kerja *</label>
          <select class="apply-select" id="ap-exp">
            <option value="">Pilih pengalaman</option>
            <option>Fresh Graduate</option>
            <option>Kurang dari 1 tahun</option>
            <option>1 – 3 tahun</option>
            <option>3 – 5 tahun</option>
            <option>Lebih dari 5 tahun</option>
          </select>
        </div>
      </div>
      <div class="apply-field">
        <label class="apply-label">Ekspektasi Gaji (per bulan) *</label>
        <input class="apply-input" type="text" id="ap-salary" placeholder="contoh: Rp 8.000.000">
      </div>
      <div class="apply-field">
        <label class="apply-label">Kapan bisa mulai bekerja? *</label>
        <select class="apply-select" id="ap-start">
          <option value="">Pilih waktu</option>
          <option>Segera (dalam 2 minggu)</option>
          <option>1 bulan lagi</option>
          <option>2 bulan lagi</option>
          <option>Lebih dari 2 bulan</option>
        </select>
      </div>
    </div>

    <div class="apply-footer">
      <button class="btn-back-apply" onclick="showPage('home')">&#8592; Kembali</button>
      <button class="btn-submit-apply" onclick="applyNextStep(2)">Lanjut &rarr;</button>
    </div>
  </div>

  <!-- Step 2: Dokumen -->
  <div id="apply-step-2" style="display:none">
    <div class="apply-section">
      <div class="apply-section-title">Upload CV / Resume *</div>
      <div class="upload-area" id="cv-upload-area" onclick="document.getElementById('ap-cv').click()">
        <input class="upload-file-input" type="file" id="ap-cv" accept="application/pdf,image/jpeg,image/png,image/webp" onchange="handleCvFile(this)" onclick="event.stopPropagation()">
        <div class="upload-icon">📄</div>
        <div class="upload-label" id="cv-label">Klik untuk upload CV / Resume</div>
        <div class="upload-hint">PDF, JPG, PNG, atau WEBP — maks. 5 MB</div>
      </div>
    </div>
    <div class="apply-section">
      <div class="apply-section-title">Surat Lamaran (opsional)</div>
      <div class="upload-area" id="letter-upload-area" onclick="document.getElementById('ap-letter-file').click()">
        <input class="upload-file-input" type="file" id="ap-letter-file" accept="application/pdf,image/jpeg,image/png,image/webp" onchange="handleLetterFile(this)" onclick="event.stopPropagation()">
        <div class="upload-icon">✉</div>
        <div class="upload-label" id="letter-label">Klik untuk upload surat lamaran</div>
        <div class="upload-hint">PDF, JPG, PNG, atau WEBP — maks. 5 MB</div>
      </div>
    </div>
    <div class="apply-section">
      <div class="apply-section-title">Atau tulis surat lamaran langsung</div>
      <div class="apply-field">
        <label class="apply-label">Surat Lamaran</label>
        <textarea class="apply-textarea" id="ap-coverletter" placeholder="Perkenalkan diri kamu dan jelaskan mengapa kamu tertarik dengan posisi ini..."></textarea>
      </div>
    </div>
    <div class="apply-footer">
      <button class="btn-back-apply" onclick="applyNextStep(1)">&#8592; Kembali</button>
      <button class="btn-submit-apply" onclick="applyNextStep(3)">Lanjut &rarr;</button>
    </div>
  </div>

  <!-- Step 3: Pertanyaan Tambahan -->
  <div id="apply-step-3" style="display:none">
    <div class="apply-section">
      <div class="apply-section-title">Pertanyaan dari Rekruter</div>
      <div class="apply-field">
        <label class="apply-label">Mengapa kamu tertarik dengan posisi ini? *</label>
        <textarea class="apply-textarea" id="ap-q1" placeholder="Ceritakan motivasi kamu melamar posisi ini..."></textarea>
      </div>
      <div class="apply-field">
        <label class="apply-label">Apa pencapaian terbesar kamu di pekerjaan/proyek sebelumnya? *</label>
        <textarea class="apply-textarea" id="ap-q2" placeholder="Jelaskan secara spesifik dengan angka atau hasil yang bisa diukur..."></textarea>
      </div>
      <div class="apply-field">
        <label class="apply-label">Skill utama yang relevan dengan posisi ini *</label>
        <input class="apply-input" type="text" id="ap-skills" placeholder="contoh: React, Node.js, Figma, SQL...">
      </div>
      <div class="apply-field">
        <label class="apply-label">Apakah kamu bersedia relokasi jika dibutuhkan?</label>
        <select class="apply-select" id="ap-relocate">
          <option value="">Pilih jawaban</option>
          <option>Ya, bersedia</option>
          <option>Tidak bersedia</option>
          <option>Bisa didiskusikan</option>
        </select>
      </div>
    </div>
    <div class="apply-footer">
      <button class="btn-back-apply" onclick="applyNextStep(2)">&#8592; Kembali</button>
      <button class="btn-submit-apply" onclick="applyNextStep(4)">Lanjut &rarr;</button>
    </div>
  </div>

  <!-- Step 4: Review -->
  <div id="apply-step-4" style="display:none">
    <div class="apply-section">
      <div class="apply-section-title">Review Lamaran</div>
      <div class="cp-info-list" id="apply-review-content"></div>
    </div>
    <div class="apply-section" style="background:var(--accent-light);border-color:var(--accent-soft)">
      <div style="display:flex;gap:12px;align-items:flex-start">
        <div style="font-size:22px;flex-shrink:0">✅</div>
        <div>
          <div style="font-weight:500;color:var(--ink);margin-bottom:4px;font-size:14px">Lamaranmu siap dikirim!</div>
          <div style="font-size:13px;color:var(--ink-soft);line-height:1.6">Dengan mengirim lamaran ini, kamu menyetujui bahwa data yang kamu berikan adalah benar dan dapat digunakan oleh rekruter untuk keperluan rekrutmen.</div>
        </div>
      </div>
    </div>
    <div class="apply-footer">
      <button class="btn-back-apply" onclick="applyNextStep(3)">&#8592; Edit</button>
      <button class="btn-submit-apply" onclick="submitApplication()" style="background:var(--accent);padding:12px 32px">Kirim Lamaran 🚀</button>
    </div>
  </div>
</div>
</div>

<!-- COMPANIES PAGE -->
<div id="page-companies" class="page">
<div class="companies-wrap">
  <div class="companies-hero">
    <div class="hero-kicker">850+ Perusahaan</div>
    <h2>Kenali <em style="font-style:italic;color:var(--accent)">Perusahaan</em> Impianmu.</h2>
    <p>Pelajari latar belakang, budaya, dan lowongan tersedia dari ratusan perusahaan terpercaya.</p>
  </div>
  <div class="companies-grid" id="companies-grid"></div>
</div>
</div>

<!-- COMPANY PROFILE PAGE -->
<div id="page-company-profile" class="page">
<div class="cp-wrap" id="cp-wrap"></div>
</div>

<!-- ABOUT PAGE -->
<div id="page-about" class="page">
<div class="about-wrap">
  <div class="about-hero">
    <div>
      <div class="hero-kicker">Tentang Workaholic</div>
      <div class="about-title">Menghubungkan talenta dengan perusahaan yang tepat.</div>
      <p class="about-lead">Workaholic dibuat untuk membantu pencari kerja menemukan peluang yang relevan, sekaligus memberi perusahaan ruang yang rapi untuk memperkenalkan diri dan membuka lowongan secara bertanggung jawab.</p>
    </div>
    <div class="about-panel">
      <div class="about-panel-title">Kenapa Workaholic ada?</div>
      <p>Banyak pencari kerja butuh informasi lowongan yang jelas, bukan sekadar daftar posisi. Di sisi lain, perusahaan butuh tempat untuk menunjukkan budaya, kebutuhan kandidat, dan proses rekrutmen secara lebih manusiawi.</p>
      <p>Karena itu Workaholic menggabungkan job portal, company profile, profil pelamar, dan dashboard perusahaan dalam satu alur.</p>
    </div>
  </div>

  <div class="about-stats">
    <div class="about-stat"><strong>12+</strong><span>Lowongan demo aktif</span></div>
    <div class="about-stat"><strong>2</strong><span>Jenis akun: pencari kerja dan perusahaan</span></div>
    <div class="about-stat"><strong>1</strong><span>Tempat untuk profil, lamaran, dan lowongan</span></div>
  </div>

  <div class="about-grid">
    <div class="about-card"><h3>Untuk pencari kerja</h3><p>Pengguna bisa membuat akun, melengkapi profil, mengunggah foto, melihat company profile, dan mengirim lamaran ke lowongan yang tersedia.</p></div>
    <div class="about-card"><h3>Untuk perusahaan</h3><p>Admin perusahaan bisa membuat company profile, mengunggah logo, menjelaskan kandidat yang dicari, dan menerbitkan lowongan setelah login.</p></div>
    <div class="about-card"><h3>Nilai utama</h3><p>Workaholic mengutamakan transparansi, profil yang informatif, dan pengalaman melamar kerja yang sederhana namun tetap profesional.</p></div>
  </div>
</div>
</div>

<!-- CAREER HELP PAGE -->
<div id="page-career-help" class="page">
<div class="career-help-wrap">
  <div class="career-help-hero">
    <div>
      <div class="hero-kicker">Konsultasi Karir</div>
      <div class="career-help-title">Dapatkan bantuan untuk melamar dengan lebih percaya diri.</div>
      <p class="career-help-lead">Tim Workaholic membantu kamu menyiapkan dokumen, latihan interview, dan menemukan lowongan yang paling sesuai dengan profil, pengalaman, serta target karirmu.</p>
    </div>
    <div class="career-help-panel">
      <div class="career-help-panel-title">Mulai dari profilmu</div>
      <p>Lengkapi profil Workaholic agar rekomendasi karir, saran CV, dan daftar lowongan bisa dibuat lebih relevan.</p>
      <div class="career-help-actions">
        <button class="btn-cta-white" onclick="openProfile()">Lengkapi Profil</button>
        <button class="btn-cta-outline" onclick="showPage('home')">Lihat Lowongan</button>
      </div>
    </div>
  </div>

  <div class="career-help-grid">
    <div class="career-help-card">
      <div class="career-help-icon">CV</div>
      <h3>Review CV</h3>
      <p>Kami bantu cek struktur, isi, kata kunci, dan keterbacaan CV supaya lebih mudah dipahami rekruter.</p>
      <div class="career-help-list">
        <span>Perbaikan ringkasan profil dan pengalaman</span>
        <span>Saran kata kunci sesuai posisi target</span>
        <span>Masukan agar CV lebih rapi dan profesional</span>
      </div>
    </div>
    <div class="career-help-card">
      <div class="career-help-icon">Q&A</div>
      <h3>Persiapan Interview</h3>
      <p>Latihan menjawab pertanyaan umum dan teknis dengan alur cerita yang jelas, singkat, dan meyakinkan.</p>
      <div class="career-help-list">
        <span>Simulasi pertanyaan HR dan user</span>
        <span>Latihan menjelaskan pengalaman kerja</span>
        <span>Tips menjawab ekspektasi gaji dan motivasi</span>
      </div>
    </div>
    <div class="career-help-card">
      <div class="career-help-icon">JOB</div>
      <h3>Rekomendasi Lowongan</h3>
      <p>Kami bantu mencocokkan profilmu dengan lowongan yang sesuai dari sisi skill, lokasi, industri, dan level pengalaman.</p>
      <div class="career-help-list">
        <span>Kurasi lowongan berdasarkan profil</span>
        <span>Saran posisi yang realistis untuk dilamar</span>
        <span>Arah pengembangan skill untuk peluang berikutnya</span>
      </div>
    </div>
  </div>


  <div class="career-testimonials">
    <div class="career-section-head">
      <div>
        <div class="career-section-title">Cerita sukses dari pengguna Workaholic</div>
        <div class="career-section-sub">Beberapa pengguna berhasil memperbaiki cara melamar, lebih siap interview, dan mendapatkan pekerjaan lewat proses yang lebih terarah.</div>
      </div>
    </div>
    <div class="career-testimonial-grid" id="career-testimonial-list">
      <div class="career-testimonial-card">
        <div class="career-testimonial-top"><div class="career-testimonial-avatar">AP</div><div><div class="career-testimonial-name">Aulia Putri</div><div class="career-testimonial-role">Frontend Developer, Jakarta</div></div></div>
        <div class="career-testimonial-text">Setelah CV direview, pengalaman magangku jadi lebih jelas dibaca. Dua minggu kemudian aku dapat panggilan interview dan akhirnya diterima sebagai Frontend Developer.</div>
        <div class="career-testimonial-badge">Diterima kerja</div>
      </div>
      <div class="career-testimonial-card">
        <div class="career-testimonial-top"><div class="career-testimonial-avatar">RA</div><div><div class="career-testimonial-name">Rafi Alamsyah</div><div class="career-testimonial-role">Data Analyst, Bandung</div></div></div>
        <div class="career-testimonial-text">Latihan interview sangat membantu. Aku jadi tahu cara menjelaskan proyek data dengan runtut, bukan cuma menyebut tools yang pernah dipakai.</div>
        <div class="career-testimonial-badge">Lolos interview</div>
      </div>
      <div class="career-testimonial-card">
        <div class="career-testimonial-top"><div class="career-testimonial-avatar">NS</div><div><div class="career-testimonial-name">Nadya Safira</div><div class="career-testimonial-role">UI/UX Designer, Remote</div></div></div>
        <div class="career-testimonial-text">Rekomendasi lowongannya lebih sesuai dengan portofolioku. Aku tidak buang waktu melamar posisi yang kurang cocok dan akhirnya dapat offer remote.</div>
        <div class="career-testimonial-badge">Mendapat offer</div>
      </div>
    </div>
  </div>

  <div class="career-feedback">
    <div class="career-feedback-copy">
      <h3>Bagikan testimoni, kritik, atau saran</h3>
      <p>Ceritakan pengalamanmu memakai konsultasi karir Workaholic. Masukanmu membantu kami memperbaiki review CV, persiapan interview, dan rekomendasi lowongan agar makin relevan.</p>
    </div>
    <div class="career-feedback-form">
      <div class="career-feedback-row">
        <input class="career-feedback-input" id="fb-name" type="text" placeholder="Nama lengkap">
        <input class="career-feedback-input" id="fb-role" type="text" placeholder="Posisi / tujuan karir">
      </div>
      <div class="career-feedback-row">
        <select class="career-feedback-select" id="fb-type"><option value="Testimoni">Testimoni</option><option value="Kritik">Kritik</option><option value="Saran">Saran</option></select>
        <select class="career-feedback-select" id="fb-rating"><option value="5">Sangat puas</option><option value="4">Puas</option><option value="3">Cukup</option><option value="2">Kurang puas</option><option value="1">Tidak puas</option></select>
      </div>
      <textarea class="career-feedback-textarea" id="fb-message" placeholder="Tulis pengalaman, kritik, atau saran kamu..."></textarea>
      <button class="career-feedback-submit" onclick="submitCareerFeedback()">Kirim Testimoni</button>
    </div>
  </div>

  <div class="career-help-flow">
    <div class="career-help-flow-title">Alur bantuan karir</div>
    <div class="career-help-steps">
      <div class="career-help-step"><strong>01</strong><span>Lengkapi profil dan dokumen lamaran.</span></div>
      <div class="career-help-step"><strong>02</strong><span>Tim meninjau CV, pengalaman, dan target posisi.</span></div>
      <div class="career-help-step"><strong>03</strong><span>Kamu mendapat arahan interview dan perbaikan dokumen.</span></div>
      <div class="career-help-step"><strong>04</strong><span>Kami bantu arahkan ke lowongan yang paling cocok.</span></div>
    </div>
  </div>
</div>
</div>
<!-- MARQUEE -->
<div class="marquee-section" id="global-marquee">
  <div class="marquee-track">
    <div class="marquee-item"><div class="marquee-dot"></div>Frontend Developer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>UI/UX Designer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Data Scientist</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Backend Engineer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Product Manager</div>
    <div class="marquee-item"><div class="marquee-dot"></div>DevOps Engineer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Marketing Specialist</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Graphic Designer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Data Analyst</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Content Writer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Mobile Developer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>HR Specialist</div>
    <!-- duplicate for seamless loop -->
    <div class="marquee-item"><div class="marquee-dot"></div>Frontend Developer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>UI/UX Designer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Data Scientist</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Backend Engineer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Product Manager</div>
    <div class="marquee-item"><div class="marquee-dot"></div>DevOps Engineer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Marketing Specialist</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Graphic Designer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Data Analyst</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Content Writer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>Mobile Developer</div>
    <div class="marquee-item"><div class="marquee-dot"></div>HR Specialist</div>
  </div>
</div>

<!-- FOOTER -->
<footer class="footer" id="global-footer">

  <!-- CTA Banner -->
  <div class="footer-cta">
    <div class="footer-cta-left">
      <h3>Belum juga dapat pekerjaan? 🤝</h3>
      <p>Tim konsultan karir kami siap membantumu — mulai dari review CV, persiapan interview, hingga mencarikan lowongan yang paling sesuai dengan profilmu.</p>
    </div>
    <div class="footer-cta-right">
      <button class="btn-cta-white" onclick="showPage('career-help')">Hubungi Kami</button>
      <button class="btn-cta-outline" onclick="showPage('signup')">Daftar Gratis</button>
    </div>
  </div>

  <!-- Main Footer -->
  <div class="footer-main">

    <!-- Brand Column -->
    <div class="footer-brand">
      <span class="footer-logo">Workaholic<span>.</span></span>
      <p class="footer-desc">Platform pencarian kerja terpercaya di Indonesia. Menghubungkan talenta terbaik dengan perusahaan impian sejak 2024.</p>


      <div class="footer-address">
        <strong>Kantor Pusat</strong>
        SMK Telkom Purwokerto<br>
        Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, Kec. Purwokerto Sel.<br>
        Banyumas, Jawa Tengah 53141<br>
        Indonesia
      </div>
    </div>

    <!-- Cari Kerja -->
    <div>
      <div class="footer-col-title">Cari Kerja</div>
      <ul class="footer-links">
        <li><a onclick="showPage('home')">Semua Lowongan</a></li>
        <li><a onclick="showPage('home')">Teknologi</a></li>
        <li><a onclick="showPage('home')">Desain</a></li>
        <li><a onclick="showPage('home')">Keuangan</a></li>
        <li><a onclick="showPage('home')">Marketing</a></li>
        <li><a onclick="showPage('home')">Pendidikan</a></li>
        <li><a onclick="showPage('home')">Kesehatan</a></li>
      </ul>
    </div>

    <!-- Perusahaan -->
    <div>
      <div class="footer-col-title">Perusahaan</div>
      <ul class="footer-links">
        <li><a onclick="showPage('companies')">Daftar Perusahaan</a></li>
        <li><a onclick="showPage('home')">Cari Lowongan</a></li>
        <li><a onclick="showPage('login')">Masuk / Daftar</a></li>
      </ul>

      <div style="height:20px"></div>
      <div class="footer-col-title">Workaholic</div>
      <ul class="footer-links">
        <li><a onclick="showPage('about')">Tentang Kami</a></li>
      </ul>
    </div>

    <!-- Customer Service -->
    <div>
      <div class="footer-col-title">Butuh Bantuan?</div>
      <div class="footer-cs">
        <div class="footer-cs-title">Customer Service</div>


        <div class="cs-item">
          <div class="cs-icon">💬</div>
          <div>
            <div class="cs-label">WhatsApp</div>
            <div class="cs-val">+62 812-3456-7890</div>
          </div>
        </div>

        <div class="cs-item">
          <div class="cs-icon">📧</div>
          <div>
            <div class="cs-label">Email</div>
            <div class="cs-val">cs@workaholic.id</div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bottom Bar -->
  <div class="footer-bottom">
    <div class="footer-bottom-left">
      © 2024 Workaholic Indonesia. Hak cipta dilindungi.
    </div>

  </div>

</footer>

<!-- PROFILE PAGE -->
<div id="page-profile" class="page">
<div class="profile-wrap">
  <div class="profile-cover"></div>
  <div class="profile-header">
    <div class="profile-avatar-wrap">
      <div class="profile-avatar" id="profile-avatar-big">U</div>
      <div style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;justify-content:flex-end">
        <input type="file" id="profile-photo-input" accept="image/png,image/jpeg,image/webp" style="display:none" onchange="uploadProfilePhoto()">
        <button class="btn-edit-profile" onclick="document.getElementById('profile-photo-input').click()">Ganti Foto</button>
        <button class="btn-edit-profile" id="btn-toggle-edit" onclick="toggleEditForm()">✏️ Edit Profil</button>
      </div>
    </div>
    <div class="profile-name" id="profile-name-display">—</div>
    <div class="profile-headline" id="profile-headline-display" style="color:var(--ink-muted);font-style:italic">Belum ada headline</div>
    <div class="profile-meta-row">
      <span id="profile-lokasi-display" style="display:none">📍 <span></span></span>
      <span id="profile-hp-display" style="display:none">📱 <span></span></span>
    </div>
    <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--warm-border)">
      <div style="display:flex;justify-content:space-between;font-size:12px;color:var(--ink-muted);margin-bottom:4px">
        <span>Kelengkapan profil</span>
        <span id="completion-pct">0%</span>
      </div>
      <div class="completion-bar-wrap"><div class="completion-bar" id="completion-bar" style="width:0%"></div></div>
      <div style="font-size:11px;color:var(--ink-muted);margin-top:4px" id="completion-tip"></div>
    </div>
  </div>

  <!-- EDIT FORM -->
  <div class="edit-form-wrap" id="edit-form-wrap">
    <div class="edit-form-title">Edit Profil</div>
    <div class="edit-two-col">
      <div class="edit-group"><label class="edit-label">Nama Lengkap *</label><input class="edit-input" type="text" id="ep-nama" placeholder="Nama lengkap kamu"></div>
      <div class="edit-group"><label class="edit-label">Headline / Jabatan</label><input class="edit-input" type="text" id="ep-headline" placeholder="contoh: Frontend Developer | Fresh Graduate"></div>
    </div>
    <div class="edit-two-col">
      <div class="edit-group"><label class="edit-label">Nomor HP</label><input class="edit-input" type="number" id="ep-hp" placeholder="08xx-xxxx-xxxx"></div>
      <div class="edit-group"><label class="edit-label">Lokasi / Kota</label><input class="edit-input" type="text" id="ep-lokasi" placeholder="contoh: Semarang, Jawa Tengah"></div>
    </div>
    <div class="edit-group">
      <label class="edit-label">Tentang Saya (About Me)</label>
      <textarea class="edit-textarea" id="ep-tentang" placeholder="Ceritakan tentang dirimu..." style="min-height:120px"></textarea>
    </div>
    <div class="edit-group">
      <label class="edit-label">Skills / Keahlian</label>
      <input class="edit-input" type="text" id="ep-skills" placeholder="contoh: JavaScript, React, Figma, SQL">
      <div class="edit-hint">Pisahkan dengan koma</div>
    </div>
    <div class="edit-group">
      <label class="edit-label">Pengalaman Kerja</label>
      <textarea class="edit-textarea" id="ep-pengalaman" placeholder="contoh:&#10;Frontend Dev Intern — PT ABC (2023–2024)&#10;Mengerjakan fitur dashboard..."></textarea>
    </div>
    <div class="edit-group">
      <label class="edit-label">Pendidikan</label>
      <textarea class="edit-textarea" id="ep-pendidikan" placeholder="contoh:&#10;SMK Negeri 1 Semarang — RPL (2022–2025)"></textarea>
    </div>
    <div class="edit-two-col">
      <div class="edit-group"><label class="edit-label">LinkedIn</label><input class="edit-input" type="url" id="ep-linkedin" placeholder="https://linkedin.com/in/namakamu"></div>
      <div class="edit-group"><label class="edit-label">Portfolio / Website</label><input class="edit-input" type="url" id="ep-portfolio" placeholder="https://portfoliokamu.com"></div>
    </div>
    <div class="edit-footer">
      <button class="btn-cancel-edit" onclick="toggleEditForm()">Batal</button>
      <button class="btn-save-profile" id="btn-save-prof" onclick="saveProfile()">Simpan Profil</button>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="profile-body">
    <div>
      <div class="profile-section">
        <div class="profile-section-title">Tentang Saya</div>
        <div id="prof-tentang-display" class="profile-empty">Belum ada deskripsi. Klik Edit Profil untuk menambahkan.</div>
      </div>
      <div class="profile-section">
        <div class="profile-section-title">Skills & Keahlian</div>
        <div id="prof-skills-display" class="profile-empty">Belum ada skill. Tambahkan keahlianmu!</div>
      </div>
      <div class="profile-section">
        <div class="profile-section-title">Pengalaman Kerja</div>
        <div id="prof-pengalaman-display" class="profile-empty">Belum ada pengalaman kerja.</div>
      </div>
      <div class="profile-section">
        <div class="profile-section-title">Pendidikan</div>
        <div id="prof-pendidikan-display" class="profile-empty">Belum ada info pendidikan.</div>
      </div>
    </div>
    <div>
      <div class="profile-section">
        <div class="profile-section-title" style="font-size:15px">Informasi Kontak</div>
        <div id="prof-kontak-display"><div class="profile-empty">Belum ada info kontak.</div></div>
      </div>
      <div class="profile-section" style="background:var(--ink);border-color:rgba(255,255,255,0.08)">
        <div style="font-size:13px;font-weight:500;color:white;margin-bottom:12px">📋 Status Lamaran</div>
        <div style="font-size:12px;color:rgba(255,255,255,0.5);line-height:1.7">Fitur riwayat lamaran akan segera hadir!</div>
        <button onclick="showPage('home')" style="margin-top:14px;width:100%;padding:9px;background:var(--accent);color:white;border:none;border-radius:8px;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:500;cursor:pointer">Cari Lowongan</button>
      </div>
    </div>
  </div>
</div>
</div>

<script>
var profileData = {};
var editFormOpen = false;

function openProfile() {
  if (loggedInType === 'company') { showPage('company-dashboard'); loadCompanyDashboard(); return; }
  if (!loggedInUser) {
    showToast('Login dulu untuk melihat profil!');
    showPage('login');
    return;
  }
  showPage('profile');
  loadProfile();
}

function loadProfile() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'get_profile.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      try {
        var res = JSON.parse(xhr.responseText);
        if (res.status === 'ok') {
          profileData = res.data;
          renderProfile(res.data);
        }
      } catch(e) { console.log('Profile load error:', e); }
    }
  };
  xhr.send();
}

function renderProfile(d) {
  var nama = d.nama || loggedInUser || '—';
  var initials = nama.split(' ').slice(0,2).map(function(w){return w[0];}).join('').toUpperCase();

  setAvatarElement(document.getElementById('profile-avatar-big'), nama, d.foto_profile || '');
  setAvatarElement(document.getElementById('nav-avatar'), nama, d.foto_profile || '');
  document.getElementById('profile-name-display').textContent = nama;

  var hl = document.getElementById('profile-headline-display');
  if (d.headline) { hl.textContent = d.headline; hl.style.fontStyle='normal'; hl.style.color='var(--ink-soft)'; }
  else { hl.textContent = 'Belum ada headline'; hl.style.fontStyle='italic'; hl.style.color='var(--ink-muted)'; }

  var lokasiEl = document.getElementById('profile-lokasi-display');
  if (d.lokasi) { lokasiEl.style.display='flex'; lokasiEl.querySelector('span').textContent=d.lokasi; }
  else { lokasiEl.style.display='none'; }

  var hpEl = document.getElementById('profile-hp-display');
  if (d.no_hp) { hpEl.style.display='flex'; hpEl.querySelector('span').textContent=d.no_hp; }
  else { hpEl.style.display='none'; }

  var tentangEl = document.getElementById('prof-tentang-display');
  if (d.tentang) { tentangEl.className='profile-text'; tentangEl.textContent=d.tentang; }
  else { tentangEl.className='profile-empty'; tentangEl.textContent='Belum ada deskripsi. Klik Edit Profil untuk menambahkan.'; }

  var skillsEl = document.getElementById('prof-skills-display');
  if (d.skills) {
    var tags = d.skills.split(',').map(function(s){return s.trim();}).filter(Boolean);
    skillsEl.className='';
    skillsEl.innerHTML = tags.map(function(s){return '<span class="skill-tag">'+s+'</span>';}).join('');
  } else { skillsEl.className='profile-empty'; skillsEl.textContent='Belum ada skill.'; }

  var pengEl = document.getElementById('prof-pengalaman-display');
  if (d.pengalaman_kerja) { pengEl.className='profile-text'; pengEl.style.whiteSpace='pre-line'; pengEl.textContent=d.pengalaman_kerja; }
  else { pengEl.className='profile-empty'; pengEl.textContent='Belum ada pengalaman kerja.'; pengEl.style.whiteSpace='normal'; }

  var pendEl = document.getElementById('prof-pendidikan-display');
  if (d.pendidikan_info) { pendEl.className='profile-text'; pendEl.style.whiteSpace='pre-line'; pendEl.textContent=d.pendidikan_info; }
  else { pendEl.className='profile-empty'; pendEl.textContent='Belum ada info pendidikan.'; pendEl.style.whiteSpace='normal'; }

  var kontakEl = document.getElementById('prof-kontak-display');
  var kontakItems = [];
  if (d.no_hp)     kontakItems.push({icon:'📱',label:'Nomor HP',val:d.no_hp});
  if (d.lokasi)    kontakItems.push({icon:'📍',label:'Lokasi',val:d.lokasi});
  if (d.linkedin)  kontakItems.push({icon:'💼',label:'LinkedIn',val:d.linkedin});
  if (d.portfolio) kontakItems.push({icon:'🌐',label:'Portfolio',val:d.portfolio});
  if (kontakItems.length) {
    kontakEl.innerHTML = kontakItems.map(function(k){
      return '<div class="profile-info-item"><div class="profile-info-icon">'+k.icon+'</div>'
        +'<div><div class="profile-info-label">'+k.label+'</div><div class="profile-info-val">'+k.val+'</div></div></div>';
    }).join('');
  } else { kontakEl.innerHTML='<div class="profile-empty">Belum ada info kontak.</div>'; }

  var fields = ['nama','headline','lokasi','tentang','skills','pengalaman_kerja','pendidikan_info','no_hp','linkedin'];
  var filled = fields.filter(function(f){return d[f]&&d[f].trim()!=='';}).length;
  var pct = Math.round((filled/fields.length)*100);
  document.getElementById('completion-bar').style.width = pct+'%';
  document.getElementById('completion-pct').textContent = pct+'%';
  var tips=[];
  if(!d.headline) tips.push('headline');
  if(!d.tentang) tips.push('tentang diri');
  if(!d.skills) tips.push('skills');
  if(!d.pendidikan_info) tips.push('pendidikan');
  document.getElementById('completion-tip').textContent = tips.length
    ? 'Tambahkan: '+tips.slice(0,3).join(', ')+' untuk profil lebih lengkap.'
    : '🎉 Profil kamu sudah sangat lengkap!';

  document.getElementById('ep-nama').value       = d.nama||'';
  document.getElementById('ep-headline').value   = d.headline||'';
  document.getElementById('ep-hp').value         = d.no_hp||'';
  document.getElementById('ep-lokasi').value     = d.lokasi||'';
  document.getElementById('ep-tentang').value    = d.tentang||'';
  document.getElementById('ep-skills').value     = d.skills||'';
  document.getElementById('ep-pengalaman').value = d.pengalaman_kerja||'';
  document.getElementById('ep-pendidikan').value = d.pendidikan_info||'';
  document.getElementById('ep-linkedin').value   = d.linkedin||'';
  document.getElementById('ep-portfolio').value  = d.portfolio||'';
}

function toggleEditForm() {
  editFormOpen = !editFormOpen;
  var form = document.getElementById('edit-form-wrap');
  var btn  = document.getElementById('btn-toggle-edit');
  if (editFormOpen) {
    form.classList.add('open');
    btn.textContent='✕ Tutup Form';
    btn.classList.add('active');
    form.scrollIntoView({behavior:'smooth',block:'start'});
  } else {
    form.classList.remove('open');
    btn.textContent='✏️ Edit Profil';
    btn.classList.remove('active');
  }
}

function saveProfile() {
  var nama = document.getElementById('ep-nama').value.trim();
  if (!nama) { showToast('Nama tidak boleh kosong!'); return; }
  var btn = document.getElementById('btn-save-prof');
  btn.textContent='Menyimpan...'; btn.disabled=true;
  var fd = new FormData();
  fd.append('nama',        nama);
  fd.append('headline',   document.getElementById('ep-headline').value);
  fd.append('no_hp',      document.getElementById('ep-hp').value);
  fd.append('lokasi',     document.getElementById('ep-lokasi').value);
  fd.append('tentang',    document.getElementById('ep-tentang').value);
  fd.append('skills',     document.getElementById('ep-skills').value);
  fd.append('pengalaman', document.getElementById('ep-pengalaman').value);
  fd.append('pendidikan', document.getElementById('ep-pendidikan').value);
  fd.append('linkedin',   document.getElementById('ep-linkedin').value);
  fd.append('portfolio',  document.getElementById('ep-portfolio').value);
  var xhr = new XMLHttpRequest();
  xhr.open('POST','update_profile.php',true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState===4) {
      btn.textContent='Simpan Profil'; btn.disabled=false;
      try {
        var res = JSON.parse(xhr.responseText);
        if (res.status==='ok') {
          showToast('✅ Profil berhasil disimpan!');
          loggedInUser = res.nama;
          document.getElementById('nav-username').textContent = res.nama;
          var initials = res.nama.split(' ').slice(0,2).map(function(w){return w[0];}).join('').toUpperCase();
          document.getElementById('nav-avatar').textContent = initials;
          loadProfile();
          toggleEditForm();
        } else { showToast(res.pesan||'Gagal menyimpan!'); }
      } catch(e) { showToast('Server error!'); }
    }
  };
  xhr.send(fd);
}


function submitCareerFeedback() {
  var name = document.getElementById('fb-name').value.trim();
  var role = document.getElementById('fb-role').value.trim();
  var type = document.getElementById('fb-type').value;
  var rating = document.getElementById('fb-rating').value;
  var message = document.getElementById('fb-message').value.trim();
  if (!name || !message) { showToast('Nama dan isi testimoni wajib diisi!'); return; }
  var fd = new FormData();
  fd.append('nama', name); fd.append('role', role); fd.append('tipe', type); fd.append('rating', rating); fd.append('pesan', message);
  fetch('submit_testimonial.php', { method: 'POST', body: fd })
    .then(function(res){ return res.json(); })
    .then(function(data){
      if (data.status === 'ok') {
        showToast(data.pesan);
        var list = document.getElementById('career-testimonial-list');
        if (list && type === 'Testimoni') {
          var initials = name.split(' ').slice(0,2).map(function(w){return w.charAt(0);}).join('').toUpperCase() || 'U';
          list.insertAdjacentHTML('afterbegin', '<div class="career-testimonial-card"><div class="career-testimonial-top"><div class="career-testimonial-avatar">' + escapeHtml(initials) + '</div><div><div class="career-testimonial-name">' + escapeHtml(name) + '</div><div class="career-testimonial-role">' + escapeHtml(role || 'Pengguna Workaholic') + '</div></div></div><div class="career-testimonial-text">' + escapeHtml(message) + '</div><div class="career-testimonial-badge">Testimoni baru</div></div>');
        }
        document.getElementById('fb-name').value = ''; document.getElementById('fb-role').value = ''; document.getElementById('fb-message').value = '';
        document.getElementById('fb-rating').value = '5'; document.getElementById('fb-type').value = 'Testimoni';
      } else { showToast(data.pesan || 'Gagal mengirim testimoni!'); }
    })
    .catch(function(){ showToast('Gagal terhubung ke server!'); });
}
function uploadProfilePhoto() {
  var input = document.getElementById('profile-photo-input');
  if (!input || !input.files || !input.files[0]) return;
  var fd = new FormData();
  fd.append('foto', input.files[0]);
  fetch('upload_profile_photo.php', { method:'POST', body:fd })
    .then(function(res){ return res.json(); })
    .then(function(data){
      if (data.status === 'ok') {
        showToast(data.pesan);
        setAvatarElement(document.getElementById('profile-avatar-big'), loggedInUser, data.foto);
        setAvatarElement(document.getElementById('nav-avatar'), loggedInUser, data.foto);
        loadProfile();
      } else if (data.status === 'login') { showPage('login'); showToast(data.pesan); }
      else showToast(data.pesan);
      input.value = '';
    })
    .catch(function(){ showToast('Gagal upload foto!'); input.value = ''; });
}

function uploadCompanyLogo() {
  var input = document.getElementById('company-logo-input');
  if (!input || !input.files || !input.files[0]) return;
  var fd = new FormData();
  fd.append('logo', input.files[0]);
  fetch('upload_company_logo.php', { method:'POST', body:fd })
    .then(function(res){ return res.json(); })
    .then(function(data){
      if (data.status === 'ok') {
        showToast(data.pesan);
        setAvatarElement(document.getElementById('cd-logo-preview'), loggedInUser, data.logo);
        setAvatarElement(document.getElementById('nav-avatar'), loggedInUser, data.logo);
        loadCompanyDashboard();
        loadCompanies();
        loadJobs();
      } else if (data.status === 'login') { showPage('company-login'); showToast(data.pesan); }
      else showToast(data.pesan);
      input.value = '';
    })
    .catch(function(){ showToast('Gagal upload logo!'); input.value = ''; });
}
</script>

</body>
</html>
