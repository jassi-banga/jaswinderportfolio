<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jaswinder Kaur – Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Mono:wght@300;400;500&family=Lora:ital,wght@0,400;1,400&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg: #0a0a0f;
      --surface: #12121a;
      --card: #1a1a26;
      --border: #2a2a40;
      --accent: #7b61ff;
      --accent2: #ff6b6b;
      --accent3: #00d9b4;
      --text: #e8e8f0;
      --muted: #8888aa;
      --tag-bg: #1e1e30;
    }

    html { scroll-behavior: smooth; }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'DM Mono', monospace;
      font-size: 14px;
      line-height: 1.7;
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* NOISE OVERLAY */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 9999;
      opacity: 0.35;
    }

    /* HERO */
    .hero {
      position: relative;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 80px 5vw 60px;
      overflow: hidden;
    }

    .hero-grid-bg {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(123,97,255,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(123,97,255,0.04) 1px, transparent 1px);
      background-size: 60px 60px;
    }

    .hero-glow {
      position: absolute;
      width: 600px;
      height: 600px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(123,97,255,0.15) 0%, transparent 70%);
      top: -100px;
      right: -100px;
      pointer-events: none;
    }

    .hero-glow2 {
      position: absolute;
      width: 400px;
      height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(0,217,180,0.1) 0%, transparent 70%);
      bottom: 0;
      left: 10%;
      pointer-events: none;
    }

    .hero-content { position: relative; z-index: 1; max-width: 900px; }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--tag-bg);
      border: 1px solid var(--border);
      border-radius: 100px;
      padding: 6px 16px;
      font-size: 11px;
      color: var(--accent3);
      letter-spacing: 0.1em;
      text-transform: uppercase;
      margin-bottom: 32px;
      animation: fadeUp 0.6s ease both;
    }

    .hero-badge::before {
      content: '';
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--accent3);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.4; transform: scale(1.4); }
    }

    .hero h1 {
      font-family: 'Syne', sans-serif;
      font-size: clamp(52px, 9vw, 110px);
      font-weight: 800;
      line-height: 0.95;
      letter-spacing: -0.03em;
      animation: fadeUp 0.6s 0.1s ease both;
    }

    .hero h1 .line1 { display: block; color: var(--text); }
    .hero h1 .line2 {
      display: block;
      background: linear-gradient(135deg, var(--accent), var(--accent2));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-sub {
      font-family: 'Lora', serif;
      font-style: italic;
      color: var(--muted);
      font-size: 18px;
      margin-top: 24px;
      animation: fadeUp 0.6s 0.2s ease both;
    }

    .hero-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 32px;
      animation: fadeUp 0.6s 0.3s ease both;
    }

    .tag {
      background: var(--tag-bg);
      border: 1px solid var(--border);
      border-radius: 6px;
      padding: 5px 12px;
      font-size: 11px;
      color: var(--muted);
      letter-spacing: 0.05em;
    }

    .tag.accent { border-color: var(--accent); color: var(--accent); }
    .tag.accent2 { border-color: var(--accent2); color: var(--accent2); }
    .tag.accent3 { border-color: var(--accent3); color: var(--accent3); }

    .scroll-hint {
      position: absolute;
      bottom: 40px;
      left: 5vw;
      display: flex;
      align-items: center;
      gap: 12px;
      color: var(--muted);
      font-size: 11px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      animation: fadeUp 0.6s 0.6s ease both;
    }

    .scroll-hint::after {
      content: '';
      display: block;
      width: 40px;
      height: 1px;
      background: var(--muted);
      animation: expandLine 1.5s 1s ease both;
    }

    @keyframes expandLine {
      from { width: 0; }
      to { width: 40px; }
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* NAV */
    nav {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(10,10,15,0.85);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--border);
      padding: 0 5vw;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 60px;
    }

    .nav-logo {
      font-family: 'Syne', sans-serif;
      font-weight: 700;
      font-size: 16px;
      color: var(--text);
      text-decoration: none;
    }

    .nav-logo span { color: var(--accent); }

    .nav-links {
      display: flex;
      gap: 32px;
      list-style: none;
    }

    .nav-links a {
      color: var(--muted);
      text-decoration: none;
      font-size: 12px;
      letter-spacing: 0.05em;
      transition: color 0.2s;
    }

    .nav-links a:hover { color: var(--text); }

    /* SECTION */
    section {
      padding: 100px 5vw;
      max-width: 1400px;
      margin: 0 auto;
    }

    .section-label {
      display: flex;
      align-items: center;
      gap: 16px;
      color: var(--accent);
      font-size: 11px;
      letter-spacing: 0.15em;
      text-transform: uppercase;
      margin-bottom: 16px;
    }

    .section-label::before {
      content: '';
      display: block;
      width: 30px;
      height: 1px;
      background: var(--accent);
    }

    .section-title {
      font-family: 'Syne', sans-serif;
      font-size: clamp(32px, 4vw, 52px);
      font-weight: 800;
      letter-spacing: -0.02em;
      margin-bottom: 60px;
      line-height: 1.1;
    }

    /* PROJECTS GRID */
    .projects-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
      gap: 24px;
    }

    .project-card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 16px;
      overflow: hidden;
      transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
      position: relative;
      cursor: pointer;
    }

    .project-card:hover {
      transform: translateY(-6px);
      border-color: var(--accent);
      box-shadow: 0 20px 60px rgba(123,97,255,0.15);
    }

    .card-top {
      padding: 28px;
      border-bottom: 1px solid var(--border);
    }

    .card-platform {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 10px;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      padding: 4px 10px;
      border-radius: 100px;
      margin-bottom: 16px;
    }

    .platform-wp { background: rgba(33,117,155,0.15); color: #21759b; border: 1px solid rgba(33,117,155,0.3); }
    .platform-shopify { background: rgba(149,191,71,0.15); color: #95bf47; border: 1px solid rgba(149,191,71,0.3); }
    .platform-woo { background: rgba(150,88,138,0.15); color: #96588a; border: 1px solid rgba(150,88,138,0.3); }

    .card-title {
      font-family: 'Syne', sans-serif;
      font-size: 22px;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 6px;
    }

    .card-url {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: var(--accent);
      font-size: 11px;
      text-decoration: none;
      letter-spacing: 0.03em;
      transition: color 0.2s;
    }

    .card-url:hover { color: var(--accent2); }

    .card-url svg { width: 10px; height: 10px; }

    .card-body { padding: 24px 28px; }

    .card-desc {
      color: var(--muted);
      font-size: 13px;
      line-height: 1.7;
      margin-bottom: 20px;
    }

    .responsibilities-label {
      font-size: 10px;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--accent3);
      margin-bottom: 12px;
    }

    .responsibilities {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .responsibilities li {
      display: flex;
      gap: 10px;
      font-size: 12px;
      color: var(--muted);
      line-height: 1.5;
    }

    .responsibilities li::before {
      content: '→';
      color: var(--accent);
      flex-shrink: 0;
      margin-top: 1px;
    }

    /* EXPERIENCE TIMELINE */
    .timeline {
      position: relative;
      padding-left: 32px;
    }

    .timeline::before {
      content: '';
      position: absolute;
      left: 0;
      top: 8px;
      bottom: 8px;
      width: 1px;
      background: linear-gradient(to bottom, var(--accent), var(--accent2), transparent);
    }

    .timeline-item {
      position: relative;
      margin-bottom: 48px;
    }

    .timeline-item::before {
      content: '';
      position: absolute;
      left: -36px;
      top: 8px;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--accent);
      border: 2px solid var(--bg);
      box-shadow: 0 0 12px var(--accent);
    }

    .timeline-period {
      font-size: 11px;
      color: var(--accent3);
      letter-spacing: 0.08em;
      margin-bottom: 6px;
    }

    .timeline-role {
      font-family: 'Syne', sans-serif;
      font-size: 18px;
      font-weight: 700;
      color: var(--text);
      margin-bottom: 4px;
    }

    .timeline-company {
      font-size: 13px;
      color: var(--muted);
      margin-bottom: 16px;
    }

    .timeline-points {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .timeline-points li {
      font-size: 12px;
      color: var(--muted);
      display: flex;
      gap: 10px;
      line-height: 1.6;
    }

    .timeline-points li::before {
      content: '–';
      color: var(--border);
      flex-shrink: 0;
    }

    /* CONTACT */
    .contact-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 16px;
    }

    .contact-item {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 20px 24px;
      transition: border-color 0.2s;
    }

    .contact-item:hover { border-color: var(--accent); }

    .contact-label {
      font-size: 10px;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--muted);
      margin-bottom: 8px;
    }

    .contact-value {
      font-size: 13px;
      color: var(--text);
      word-break: break-all;
    }

    .contact-value a { color: var(--accent); text-decoration: none; }
    .contact-value a:hover { color: var(--accent2); }

    /* FOOTER */
    footer {
      border-top: 1px solid var(--border);
      padding: 32px 5vw;
      text-align: center;
      color: var(--muted);
      font-size: 11px;
      letter-spacing: 0.05em;
    }

    /* REVIEW BADGE */
    .review-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(123,97,255,0.08);
      border: 1px solid rgba(123,97,255,0.25);
      border-radius: 8px;
      padding: 8px 14px;
      font-size: 11px;
      color: var(--accent);
      text-decoration: none;
      margin-top: 16px;
      transition: background 0.2s;
    }

    .review-badge:hover { background: rgba(123,97,255,0.16); }

    @media (max-width: 640px) {
      .projects-grid { grid-template-columns: 1fr; }
      .hero h1 { font-size: 48px; }
      nav { padding: 0 20px; }
      .nav-links { display: none; }
      section { padding: 60px 20px; }
    }
  </style>
</head>
<body>

<nav>
  <a href="#" class="nav-logo">JK<span>.</span></a>
  <ul class="nav-links">
    <li><a href="#projects">Projects</a></li>
    <li><a href="#experience">Experience</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
</nav>

<!-- HERO -->
<div class="hero">
  <div class="hero-grid-bg"></div>
  <div class="hero-glow"></div>
  <div class="hero-glow2"></div>
  <div class="hero-content">
    <div class="hero-badge">Available for opportunities</div>
    <h1>
      <span class="line1">Jaswinder</span>
      <span class="line2">Kaur</span>
    </h1>
    <p class="hero-sub">Sr. Software Engineer &amp; Team Lead — Mohali, India</p>
    <div class="hero-tags">
      <span class="tag accent">WordPress</span>
      <span class="tag accent2">Shopify</span>
      <span class="tag accent3">WooCommerce</span>
      <span class="tag">PHP</span>
      <span class="tag">JavaScript</span>
      <span class="tag">HTML / CSS</span>
      <span class="tag">Team Lead</span>
      <span class="tag">10+ Years</span>
    </div>
  </div>
  <div class="scroll-hint">Scroll to explore</div>
</div>

<!-- PROJECTS -->
<section id="projects">
  <div class="section-label">Selected Work</div>
  <h2 class="section-title">Past Projects</h2>

  <div class="projects-grid">

    <!-- RoyalNY -->
    <div class="project-card">
      <div class="card-top">
        <div class="card-platform platform-woo">⚡ WordPress / WooCommerce</div>
        <div class="card-title">RoyalNY</div>
        <a class="card-url" href="https://www.royalny.com" target="_blank" rel="noopener">
          <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 10L10 2M4 2h6v6"/></svg>
          www.royalny.com
        </a>
      </div>
      <div class="card-body">
        <p class="card-desc">E-commerce platform built on WordPress &amp; WooCommerce, focused on performance, stability, and a polished product browsing experience.</p>
        <div class="responsibilities-label">Key Responsibilities</div>
        <ul class="responsibilities">
          <li>Worked as a Senior Developer to fix critical bugs and improve overall code quality</li>
          <li>Implemented performance patches and optimisations for better stability</li>
          <li>Developed and managed a custom product filter system on the shop page for improved UX</li>
        </ul>
      </div>
    </div>

    <!-- CaseMogul -->
    <div class="project-card">
      <div class="card-top">
        <div class="card-platform platform-shopify">🛍️ Shopify</div>
        <div class="card-title">CaseMogul</div>
        <a class="card-url" href="https://www.casemogul.com" target="_blank" rel="noopener">
          <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 10L10 2M4 2h6v6"/></svg>
          www.casemogul.com
        </a>
      </div>
      <div class="card-body">
        <p class="card-desc">End-to-end Shopify storefront with fully customised Homepage, Product Listing, and Product Detail pages designed for admin ease and responsive UX.</p>
        <div class="responsibilities-label">Key Responsibilities</div>
        <ul class="responsibilities">
          <li>Led the project end-to-end with the development team</li>
          <li>Designed and developed Homepage, Product Listing, and Product Detail pages</li>
          <li>Built fully customisable sections for easy admin content management</li>
          <li>Ensured responsive design and optimised user experience across devices</li>
        </ul>
        <a class="review-badge" href="https://clutch.co/profile/brainvireinfotech?sort_by=date_desc#review-2260705" target="_blank" rel="noopener">
          ⭐ View Client Review on Clutch
        </a>
      </div>
    </div>

    <!-- MadeOutdoor -->
    <div class="project-card">
      <div class="card-top">
        <div class="card-platform platform-shopify">🛍️ Shopify</div>
        <div class="card-title">MadeOutdoor</div>
        <a class="card-url" href="https://madeoutdoor.com/" target="_blank" rel="noopener">
          <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 10L10 2M4 2h6v6"/></svg>
          madeoutdoor.com
        </a>
      </div>
      <div class="card-body">
        <p class="card-desc">Advanced Shopify store featuring deep product customisation — fabric, color, zip, pockets, and more — powered by a custom Shopify app.</p>
        <div class="responsibilities-label">Key Responsibilities</div>
        <ul class="responsibilities">
          <li>Managed complete project development and delivery</li>
          <li>Developed advanced product customisation features (fabric, color, zip, pockets, etc.)</li>
          <li>Built a custom Shopify app to store and retrieve user-selected product options</li>
          <li>Enhanced UX with dynamic, flexible product configurations</li>
        </ul>
      </div>
    </div>

    <!-- PoshMom -->
    <div class="project-card">
      <div class="card-top">
        <div class="card-platform platform-wp">🔧 WordPress</div>
        <div class="card-title">PoshMom</div>
        <a class="card-url" href="https://poshmom.com" target="_blank" rel="noopener">
          <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 10L10 2M4 2h6v6"/></svg>
          poshmom.com
        </a>
      </div>
      <div class="card-body">
        <p class="card-desc">WordPress platform with live video streaming and chat functionality, leveraging Advanced Custom Fields and WP Stream for rich dynamic content.</p>
        <div class="responsibilities-label">Key Responsibilities</div>
        <ul class="responsibilities">
          <li>Managed project development using Advanced Custom Fields (ACF)</li>
          <li>Implemented and configured custom field structures for dynamic content</li>
          <li>Integrated and customised WP Stream plugin for live video streaming and chat functionality</li>
        </ul>
      </div>
    </div>

  </div>
</section>

<!-- EXPERIENCE -->
<section id="experience">
  <div class="section-label">Career</div>
  <h2 class="section-title">Experience</h2>

  <div class="timeline">

    <div class="timeline-item">
      <div class="timeline-period">January 2019 – April 2023</div>
      <div class="timeline-role">Sr. Software Engineer / Team Lead</div>
      <div class="timeline-company">Paradise Techsoft Solutions Pvt Ltd — Mohali, Punjab, India</div>
      <ul class="timeline-points">
        <li>Joined as a Web Developer and promoted to Team Lead based on performance and leadership skills</li>
        <li>Led a team of developers, managing task allocation, sprint planning, and delivery timelines</li>
        <li>Handled client communication, requirement gathering, and regular project updates</li>
        <li>Managed project follow-ups ensuring deadlines, quality standards, and client expectations were met</li>
        <li>Mentored junior developers and ensured adherence to coding standards and best practices</li>
      </ul>
    </div>

    <div class="timeline-item">
      <div class="timeline-period">August 2017 – January 2018</div>
      <div class="timeline-role">Web Developer</div>
      <div class="timeline-company">Jeronone Technologies — Mohali, Punjab, India</div>
      <ul class="timeline-points">
        <li>Developed and maintained web applications with a focus on the Shopify platform</li>
        <li>Built and customised Shopify apps to extend store functionality</li>
        <li>Worked with Shopify Storefront API to create dynamic and personalised shopping experiences</li>
        <li>Integrated third-party services and APIs to enhance eCommerce features</li>
      </ul>
    </div>

    <div class="timeline-item">
      <div class="timeline-period">March 2016 – April 2017</div>
      <div class="timeline-role">Web Developer</div>
      <div class="timeline-company">Creative3Studio — Panchkula, India</div>
      <ul class="timeline-points">
        <li>Handled end-to-end development responsibilities across multiple projects in a startup environment</li>
        <li>Developed custom WordPress themes and plugins based on client requirements</li>
        <li>Built and customised Shopify stores including theme modifications and feature enhancements</li>
        <li>Implemented custom functionalities using PHP, JavaScript, HTML, and CSS</li>
      </ul>
    </div>

    <div class="timeline-item">
      <div class="timeline-period">October 2014 – October 2015</div>
      <div class="timeline-role">Web Developer (Fresher)</div>
      <div class="timeline-company">Outsourcing Technologies — Panchkula, India</div>
      <ul class="timeline-points">
        <li>Gained hands-on experience in real-world projects with WordPress and Shopify</li>
        <li>Assisted in building and modifying themes and functionalities based on client requirements</li>
        <li>Participated in team discussions to provide solutions for complex technical tasks</li>
        <li>Contributed to testing, debugging, and ensuring smooth project delivery</li>
      </ul>
    </div>

  </div>
</section>

<!-- CONTACT -->
<section id="contact">
  <div class="section-label">Get in touch</div>
  <h2 class="section-title">Contact</h2>
  <div class="contact-grid">
    <div class="contact-item">
      <div class="contact-label">Phone</div>
      <div class="contact-value"><a href="tel:+918289027572">+91 8289027572</a></div>
    </div>
    <div class="contact-item">
      <div class="contact-label">Email</div>
      <div class="contact-value"><a href="mailto:jkdevtester@gmail.com">jkdevtester@gmail.com</a></div>
    </div>
    <div class="contact-item">
      <div class="contact-label">Location</div>
      <div class="contact-value">941 Saini Vihar Phase 3, Baltana, Mohali, India</div>
    </div>
  </div>
</section>

<footer>
  © 2025 Jaswinder Kaur — Built with ♥ &nbsp;·&nbsp; Sr. Software Engineer &amp; Team Lead
</footer>

</body>
</html>