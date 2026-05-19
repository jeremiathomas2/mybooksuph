<style>
/* ===== CSS VARIABLES ===== */
:root {
  --header-bg: #1a3a5c;
  --header-text: #ffffff;
  --sidebar-bg: #132d47;
  --sidebar-text: #c8ddf0;
  --sidebar-active: #2d7dd2;
  --sidebar-hover: rgba(45,125,210,0.18);
  --accent: #2d7dd2;
  --accent-light: #e8f2fc;
  --accent-2: #f4a832;
  --success: #27ae60;
  --danger: #e74c3c;
  --warning: #f39c12;
  --info: #3498db;

  --bg: #f0f4f9;
  --card-bg: #ffffff;
  --border: #dde6f0;
  --text-primary: #1a2a3a;
  --text-secondary: #5a7090;
  --text-muted: #8aa0b8;
  --shadow: 0 2px 12px rgba(26,58,92,0.08);
  --shadow-hover: 0 8px 32px rgba(26,58,92,0.16);
  --radius: 12px;
  --radius-sm: 8px;
  --sidebar-width: 260px;
  --header-height: 64px;

  --hover-anim: cubic-bezier(0.34,1.56,0.64,1);
  --transition: all 0.28s cubic-bezier(0.4,0,0.2,1);
  --transition-bounce: all 0.38s cubic-bezier(0.34,1.56,0.64,1);
}

[data-theme="dark"] {
  --bg: #0f1923;
  --card-bg: #182333;
  --border: #253545;
  --text-primary: #e8f0f8;
  --text-secondary: #8aa8c8;
  --text-muted: #506070;
  --shadow: 0 2px 12px rgba(0,0,0,0.32);
  --shadow-hover: 0 8px 32px rgba(0,0,0,0.48);
  --accent-light: rgba(45,125,210,0.15);
}

/* ===== RESET ===== */
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body {
  font-family: 'Nunito Sans', sans-serif;
  font-size: 14px;
  background: var(--bg);
  color: var(--text-primary);
  min-height: 100vh;
  transition: background 0.3s, color 0.3s;
  overflow-x: hidden;
}
a { text-decoration: none; color: inherit; }
ul { list-style: none; }
button { cursor: pointer; font-family: inherit; }
input, select, textarea { font-family: inherit; }

/* ===== SCROLLBAR ===== */
::-webkit-scrollbar { width: 6px; height: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--border); border-radius: 10px; }
::-webkit-scrollbar-thumb:hover { background: var(--accent); }

/* ===== LAYOUT ===== */
.app-layout { display: flex; min-height: 100vh; }

/* ===== SIDEBAR ===== */
.sidebar {
  width: var(--sidebar-width);
  background: var(--sidebar-bg);
  color: var(--sidebar-text);
  display: flex;
  flex-direction: column;
  position: fixed;
  top: 0; left: 0; bottom: 0;
  z-index: 100;
  transition: width 0.32s cubic-bezier(0.4,0,0.2,1), transform 0.32s cubic-bezier(0.4,0,0.2,1);
  overflow: hidden;
  box-shadow: 2px 0 20px rgba(0,0,0,0.18);
}
.sidebar.collapsed { width: 68px; }
.sidebar.mobile-hidden { transform: translateX(-100%); }

.sidebar-brand {
  height: var(--header-height);
  display: flex;
  align-items: center;
  padding: 0 18px;
  gap: 12px;
  border-bottom: 1px solid rgba(255,255,255,0.07);
  flex-shrink: 0;
  background: rgba(0,0,0,0.12);
}
.sidebar-brand .brand-icon {
  width: 36px; height: 36px;
  background: var(--accent);
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 17px; color: #fff;
  flex-shrink: 0;
  transition: var(--transition-bounce);
}
.sidebar-brand:hover .brand-icon { transform: rotate(-8deg) scale(1.08); }
.sidebar-brand .brand-text {
  display: flex; flex-direction: column;
  overflow: hidden;
  transition: opacity 0.22s, width 0.32s;
}
.sidebar.collapsed .brand-text { opacity: 0; width: 0; }
.brand-text .brand-name {
  font-weight: 800; font-size: 13.5px;
  color: #fff; line-height: 1.2;
  white-space: nowrap;
}
.brand-text .brand-sub {
  font-size: 10.5px; color: rgba(255,255,255,0.5);
  white-space: nowrap;
}

.sidebar-nav { flex: 1; overflow-y: auto; padding: 12px 0; }
.nav-section-label {
  padding: 14px 20px 6px;
  font-size: 10px; font-weight: 800;
  letter-spacing: 1.4px;
  color: rgba(255,255,255,0.28);
  text-transform: uppercase;
  transition: opacity 0.22s;
  white-space: nowrap;
}
.sidebar.collapsed .nav-section-label { opacity: 0; }

.nav-item {
  display: flex; align-items: center;
  padding: 10px 18px;
  gap: 13px;
  border-radius: 10px;
  margin: 2px 10px;
  color: var(--sidebar-text);
  cursor: pointer;
  position: relative;
  transition: var(--transition);
  white-space: nowrap;
}
.nav-item:hover {
  background: var(--sidebar-hover);
  color: #fff;
  transform: translateX(3px);
}
.nav-item.active {
  background: var(--sidebar-active);
  color: #fff;
  box-shadow: 0 4px 16px rgba(45,125,210,0.4);
}
.nav-item.active::before {
  content: '';
  position: absolute; left: -10px; top: 50%; transform: translateY(-50%);
  width: 4px; height: 60%; border-radius: 0 4px 4px 0;
  background: #fff;
}
.nav-item .nav-icon {
  width: 20px; min-width: 20px;
  font-size: 15px; text-align: center;
}
.nav-item .nav-label {
  font-size: 13.5px; font-weight: 600;
  transition: opacity 0.22s;
  flex: 1;
}
.sidebar.collapsed .nav-label,
.sidebar.collapsed .nav-badge { opacity: 0; width: 0; overflow: hidden; }
.nav-badge {
  background: var(--accent-2);
  color: #fff; font-size: 10px; font-weight: 800;
  padding: 2px 7px; border-radius: 20px;
  transition: opacity 0.22s;
}
.nav-item .nav-arrow {
  font-size: 10px; color: rgba(255,255,255,0.35);
  transition: transform 0.22s;
}
.nav-item.expanded .nav-arrow { transform: rotate(90deg); }
.sidebar.collapsed .nav-arrow { opacity: 0; }

.nav-submenu {
  overflow: hidden;
  max-height: 0;
  transition: max-height 0.32s cubic-bezier(0.4,0,0.2,1);
}
.nav-submenu.open { max-height: 300px; }
.nav-submenu .nav-item {
  padding: 8px 18px 8px 52px;
  font-size: 13px;
}

.sidebar-footer {
  padding: 12px;
  border-top: 1px solid rgba(255,255,255,0.07);
  flex-shrink: 0;
}
.sidebar-user {
  display: flex; align-items: center; gap: 10px;
  padding: 10px;
  border-radius: 10px;
  cursor: pointer;
  transition: var(--transition);
}
.sidebar-user:hover { background: rgba(255,255,255,0.07); }
.user-avatar {
  width: 36px; height: 36px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--accent), var(--accent-2));
  display: flex; align-items: center; justify-content: center;
  font-size: 14px; font-weight: 800; color: #fff;
  flex-shrink: 0;
}
.user-info { overflow: hidden; transition: opacity 0.22s; }
.sidebar.collapsed .user-info { opacity: 0; width: 0; }
.user-name { font-size: 13px; font-weight: 700; color: #fff; white-space: nowrap; }
.user-role { font-size: 11px; color: rgba(255,255,255,0.4); white-space: nowrap; }

/* ===== MAIN AREA ===== */
.main-area {
  flex: 1;
  margin-left: var(--sidebar-width);
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  transition: margin-left 0.32s cubic-bezier(0.4,0,0.2,1);
}
.main-area.sidebar-collapsed { margin-left: 68px; }

/* ===== HEADER ===== */
.header {
  background: var(--header-bg);
  color: var(--header-text);
  height: var(--header-height);
  display: flex; align-items: center;
  padding: 0 24px;
  gap: 16px;
  position: sticky; top: 0;
  z-index: 90;
  box-shadow: 0 2px 16px rgba(0,0,0,0.18);
  transition: background 0.3s;
}
.header-toggle {
  width: 36px; height: 36px;
  border: none; background: rgba(255,255,255,0.1);
  color: #fff; border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  font-size: 16px;
  transition: var(--transition-bounce);
  flex-shrink: 0;
}
.header-toggle:hover { background: rgba(255,255,255,0.2); transform: scale(1.08); }

.header-breadcrumb {
  display: flex; align-items: center; gap: 8px;
  font-size: 13px;
}
.header-breadcrumb .bc-item { color: rgba(255,255,255,0.55); }
.header-breadcrumb .bc-sep { color: rgba(255,255,255,0.3); font-size: 11px; }
.header-breadcrumb .bc-current { color: #fff; font-weight: 700; }

.header-spacer { flex: 1; }

.header-search {
  position: relative;
  display: flex; align-items: center;
}
.header-search input {
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.15);
  color: #fff;
  padding: 7px 14px 7px 36px;
  border-radius: 20px;
  font-size: 13px;
  width: 200px;
  transition: var(--transition);
  outline: none;
}
.header-search input::placeholder { color: rgba(255,255,255,0.4); }
.header-search input:focus {
  width: 260px;
  background: rgba(255,255,255,0.15);
  border-color: rgba(255,255,255,0.35);
}
.header-search .search-icon {
  position: absolute; left: 12px;
  color: rgba(255,255,255,0.5); font-size: 13px;
}

.header-actions { display: flex; gap: 8px; align-items: center; }
.header-btn {
  width: 36px; height: 36px;
  border: none; background: rgba(255,255,255,0.1);
  color: #fff; border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  font-size: 15px;
  position: relative;
  transition: var(--transition-bounce);
}
.header-btn:hover { background: rgba(255,255,255,0.2); transform: scale(1.1); }
.header-btn .notif-dot {
  position: absolute; top: 6px; right: 6px;
  width: 8px; height: 8px;
  background: var(--accent-2);
  border-radius: 50%;
  border: 2px solid var(--header-bg);
  animation: pulse 2s infinite;
}
@keyframes pulse {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.4); opacity: 0.7; }
}

/* ===== PAGE CONTENT ===== */
.page-content { flex: 1; padding: 24px; overflow-x: hidden; }

/* ===== PAGE HEADER ===== */
.page-header {
  display: flex; align-items: flex-start;
  justify-content: space-between;
  margin-bottom: 24px;
  flex-wrap: wrap; gap: 12px;
}
.page-title { font-size: 22px; font-weight: 800; color: var(--text-primary); line-height: 1.2; }
.page-subtitle { font-size: 13px; color: var(--text-secondary); margin-top: 3px; }
.page-actions { display: flex; gap: 10px; flex-wrap: wrap; }

/* ===== BUTTONS ===== */
.btn {
  display: inline-flex; align-items: center; gap: 7px;
  padding: 9px 18px;
  border: none; border-radius: var(--radius-sm);
  font-size: 13.5px; font-weight: 700;
  cursor: pointer;
  transition: var(--transition-bounce);
  white-space: nowrap;
}
.btn:hover { transform: translateY(-2px); box-shadow: var(--shadow-hover); }
.btn:active { transform: translateY(0); }
.btn-primary { background: var(--accent); color: #fff; }
.btn-primary:hover { background: #2068b8; }
.btn-success { background: var(--success); color: #fff; }
.btn-danger { background: var(--danger); color: #fff; }
.btn-warning { background: var(--warning); color: #fff; }
.btn-outline {
  background: transparent;
  border: 2px solid var(--border);
  color: var(--text-secondary);
}
.btn-outline:hover { border-color: var(--accent); color: var(--accent); }
.btn-sm { padding: 6px 12px; font-size: 12px; }
.btn-icon { width: 34px; height: 34px; padding: 0; justify-content: center; }

/* ===== STAT CARDS ===== */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
  gap: 16px;
  margin-bottom: 24px;
}
.stat-card {
  background: var(--card-bg);
  border-radius: var(--radius);
  padding: 20px;
  display: flex; align-items: center; gap: 16px;
  box-shadow: var(--shadow);
  border: 1px solid var(--border);
  transition: var(--transition-bounce);
  cursor: default;
  position: relative;
  overflow: hidden;
}
.stat-card::after {
  content: '';
  position: absolute; top: 0; right: 0;
  width: 80px; height: 80px;
  border-radius: 50%;
  transform: translate(30px, -30px);
  opacity: 0.07;
  transition: var(--transition);
}
.stat-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-hover); }
.stat-card:hover::after { transform: translate(20px, -20px) scale(1.3); opacity: 0.12; }
.stat-icon {
  width: 52px; height: 52px;
  border-radius: 14px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px; flex-shrink: 0;
  transition: var(--transition-bounce);
}
.stat-card:hover .stat-icon { transform: scale(1.12) rotate(-5deg); }
.stat-icon.blue { background: #e8f2fc; color: var(--accent); }
.stat-icon.green { background: #e8f8ef; color: var(--success); }
.stat-icon.amber { background: #fef4e4; color: var(--warning); }
.stat-icon.red { background: #fdecea; color: var(--danger); }
.stat-icon.purple { background: #f0ebff; color: #7c5cbf; }
.stat-icon.teal { background: #e4f6f6; color: #1a9090; }
.stat-card::after { background: currentColor; }
.stat-info { flex: 1; min-width: 0; }
.stat-value { font-size: 26px; font-weight: 900; color: var(--text-primary); line-height: 1; }
.stat-label { font-size: 12.5px; color: var(--text-secondary); margin-top: 4px; font-weight: 600; }
.stat-change {
  font-size: 11.5px; font-weight: 700;
  display: flex; align-items: center; gap: 3px;
  margin-top: 6px;
}
.stat-change.up { color: var(--success); }
.stat-change.down { color: var(--danger); }

/* ===== CARDS ===== */
.card {
  background: var(--card-bg);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  border: 1px solid var(--border);
  overflow: hidden;
  transition: var(--transition);
}
.card-header {
  padding: 16px 20px;
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
  gap: 12px; flex-wrap: wrap;
}
.card-title { font-size: 15px; font-weight: 800; color: var(--text-primary); }
.card-subtitle { font-size: 12px; color: var(--text-muted); margin-top: 2px; }
.card-body { padding: 20px; }
.card-footer {
  padding: 12px 20px;
  border-top: 1px solid var(--border);
  background: rgba(0,0,0,0.02);
  display: flex; align-items: center; justify-content: space-between;
}

/* ===== TABLE ===== */
.table-wrap { 
  overflow-x: auto; 
  margin: 0 -20px; 
  padding: 0 20px;
  -webkit-overflow-scrolling: touch;
}
@media (max-width: 768px) {
  .table-wrap {
    margin: 0 -16px;
    padding: 0 16px;
  }
}
table {
  width: 100%; border-collapse: collapse;
  font-size: 13.5px;
  min-width: 600px; /* Ensure table doesn't squish too much */
}
thead th {
  padding: 11px 14px;
  text-align: left;
  font-size: 11px; font-weight: 800;
  color: var(--text-muted);
  text-transform: uppercase; letter-spacing: 0.7px;
  border-bottom: 2px solid var(--border);
  background: var(--bg);
  white-space: nowrap;
}
tbody tr {
  border-bottom: 1px solid var(--border);
  transition: background 0.18s;
}
tbody tr:hover { background: var(--accent-light); }
tbody tr:last-child { border-bottom: none; }
tbody td {
  padding: 12px 14px;
  color: var(--text-primary);
  vertical-align: middle;
}
.td-muted { color: var(--text-muted); font-size: 12.5px; }

/* ===== BADGES ===== */
.badge {
  display: inline-flex; align-items: center; gap: 5px;
  padding: 3px 10px; border-radius: 20px;
  font-size: 11.5px; font-weight: 700;
}
.badge-dot { width: 6px; height: 6px; border-radius: 50%; }
.badge-pending { background: #fff3e0; color: #e65100; }
.badge-pending .badge-dot { background: #e65100; }
.badge-paid { background: #e8f5e9; color: #2e7d32; }
.badge-paid .badge-dot { background: #2e7d32; }
.badge-packed { background: #e3f2fd; color: #1565c0; }
.badge-packed .badge-dot { background: #1565c0; }
.badge-dispatched { background: #f3e5f5; color: #6a1b9a; }
.badge-dispatched .badge-dot { background: #6a1b9a; }
.badge-delivered { background: #e8f5e9; color: #1b5e20; }
.badge-delivered .badge-dot { background: #1b5e20; }
.badge-transit { background: #fff8e1; color: #f57f17; }
.badge-transit .badge-dot { background: #f57f17; }
.badge-info { background: var(--accent-light); color: var(--accent); }
.badge-danger { background: #fdecea; color: var(--danger); }
.badge-success { background: #e8f5e9; color: var(--success); }
.badge-warning { background: #fef3e2; color: var(--warning); }

/* ===== GRID LAYOUTS ===== */
.grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
.grid-3 { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; }
.grid-auto { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px,1fr)); gap: 16px; }

/* ===== BOOK CARDS ===== */
.book-card {
  background: var(--card-bg);
  border-radius: var(--radius);
  border: 1px solid var(--border);
  overflow: hidden;
  transition: var(--transition-bounce);
  cursor: pointer;
  box-shadow: var(--shadow);
}
.book-card:hover {
  transform: translateY(-6px) scale(1.01);
  box-shadow: var(--shadow-hover);
}
.book-cover {
  height: 160px;
  display: flex; align-items: center; justify-content: center;
  font-size: 48px;
  position: relative;
  overflow: hidden;
}
.book-cover::before {
  content: '';
  position: absolute; inset: 0;
  opacity: 0.15;
}
.book-cover-blue { background: linear-gradient(135deg, #1a3a5c, #2d7dd2); }
.book-cover-green { background: linear-gradient(135deg, #1a4a2a, #27ae60); }
.book-cover-amber { background: linear-gradient(135deg, #5a3a00, #f4a832); }
.book-cover-purple { background: linear-gradient(135deg, #2a1a4a, #7c5cbf); }
.book-cover-teal { background: linear-gradient(135deg, #0a3030, #1a9090); }
.book-cover-red { background: linear-gradient(135deg, #4a0a0a, #e74c3c); }
.book-card-body { padding: 14px; }
.book-category {
  font-size: 10.5px; font-weight: 800;
  text-transform: uppercase; letter-spacing: 0.8px;
  color: var(--accent); margin-bottom: 5px;
}
.book-title { font-size: 14px; font-weight: 800; color: var(--text-primary); margin-bottom: 6px; line-height: 1.3; }
.book-meta { display: flex; align-items: center; justify-content: space-between; }
.book-price { font-size: 16px; font-weight: 900; color: var(--accent); }
.book-stock {
  font-size: 11.5px; color: var(--text-muted);
  font-weight: 600;
}
.book-stock.low { color: var(--danger); }
.book-actions {
  display: flex; gap: 8px;
  padding: 0 14px 14px;
}

/* ===== PROGRESS BAR ===== */
.progress-bar-wrap {
  background: var(--border); border-radius: 10px; height: 8px; overflow: hidden;
}
.progress-bar {
  height: 100%; border-radius: 10px;
  background: var(--accent);
  transition: width 0.6s cubic-bezier(0.4,0,0.2,1);
}
.progress-bar.green { background: var(--success); }
.progress-bar.amber { background: var(--warning); }
.progress-bar.red { background: var(--danger); }

/* ===== FORMS ===== */
.form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.form-group { display: flex; flex-direction: column; gap: 6px; }
.form-group.full { grid-column: 1/-1; }
.form-label { font-size: 12.5px; font-weight: 700; color: var(--text-secondary); }
.form-control {
  padding: 9px 13px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  font-size: 13.5px;
  background: var(--card-bg);
  color: var(--text-primary);
  outline: none;
  transition: var(--transition);
}
.form-control:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(45,125,210,0.12); }
.form-control::placeholder { color: var(--text-muted); }
select.form-control { cursor: pointer; }
textarea.form-control { resize: vertical; min-height: 90px; }

/* ===== TABS ===== */
.tabs { display: flex; gap: 4px; border-bottom: 2px solid var(--border); margin-bottom: 20px; flex-wrap: wrap; }
.tab-btn {
  padding: 10px 18px;
  border: none; background: none;
  font-size: 13.5px; font-weight: 700;
  color: var(--text-muted);
  cursor: pointer;
  border-bottom: 2px solid transparent;
  margin-bottom: -2px;
  transition: var(--transition);
  border-radius: 6px 6px 0 0;
  display: flex; align-items: center; gap: 7px;
}
.tab-btn:hover { color: var(--accent); background: var(--accent-light); }
.tab-btn.active {
  color: var(--accent);
  border-bottom-color: var(--accent);
}

/* ===== TIMELINE ===== */
.timeline { display: flex; flex-direction: column; gap: 0; }
.timeline-item {
  display: flex; gap: 16px;
  padding-bottom: 20px;
  position: relative;
}
.timeline-item:last-child { padding-bottom: 0; }
.timeline-marker {
  display: flex; flex-direction: column; align-items: center;
  flex-shrink: 0;
}
.timeline-dot {
  width: 34px; height: 34px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 14px; font-weight: 800;
  flex-shrink: 0;
}
.timeline-line {
  width: 2px; flex: 1; background: var(--border);
  margin-top: 4px;
}
.timeline-content { flex: 1; padding-top: 5px; }
.timeline-title { font-size: 13.5px; font-weight: 700; color: var(--text-primary); }
.timeline-meta { font-size: 12px; color: var(--text-muted); margin-top: 2px; }

/* ===== NOTIFICATION PANEL ===== */
.notif-panel {
  position: fixed; top: var(--header-height); right: -380px;
  width: 360px; bottom: 0;
  background: var(--card-bg);
  border-left: 1px solid var(--border);
  z-index: 200;
  box-shadow: -4px 0 24px rgba(0,0,0,0.12);
  transition: right 0.32s cubic-bezier(0.4,0,0.2,1);
  display: flex; flex-direction: column;
}
.notif-panel.open { right: 0; }
.notif-header {
  padding: 16px 20px;
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; justify-content: space-between;
}
.notif-title { font-size: 15px; font-weight: 800; }
.notif-items { flex: 1; overflow-y: auto; }
.notif-item {
  display: flex; gap: 12px; padding: 14px 20px;
  border-bottom: 1px solid var(--border);
  transition: background 0.18s;
  cursor: pointer;
}
.notif-item:hover { background: var(--accent-light); }
.notif-item.unread { background: rgba(45,125,210,0.04); }
.notif-item-icon {
  width: 38px; height: 38px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 15px; flex-shrink: 0;
}
.notif-item-content { flex: 1; }
.notif-item-title { font-size: 13px; font-weight: 700; color: var(--text-primary); }
.notif-item-body { font-size: 12px; color: var(--text-secondary); margin-top: 2px; }
.notif-item-time { font-size: 11px; color: var(--text-muted); margin-top: 4px; }
.unread-dot {
  width: 8px; height: 8px; border-radius: 50%;
  background: var(--accent); flex-shrink: 0; margin-top: 4px;
}

/* ===== SETTINGS PANEL ===== */
.settings-panel {
  position: fixed; top: 0; right: -420px;
  width: 400px; bottom: 0;
  background: var(--card-bg);
  border-left: 1px solid var(--border);
  z-index: 300;
  box-shadow: -4px 0 30px rgba(0,0,0,0.18);
  transition: right 0.35s cubic-bezier(0.4,0,0.2,1);
  display: flex; flex-direction: column;
  overflow: hidden;
}
.settings-panel.open { right: 0; }
.settings-header {
  padding: 18px 20px;
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; gap: 12px;
}
.settings-header-icon {
  width: 36px; height: 36px;
  background: var(--accent-light);
  border-radius: 9px;
  display: flex; align-items: center; justify-content: center;
  color: var(--accent); font-size: 16px;
}
.settings-title { font-size: 16px; font-weight: 800; flex: 1; }
.settings-body { flex: 1; overflow-y: auto; padding: 20px; display: flex; flex-direction: column; gap: 24px; }

.setting-section-title {
  font-size: 10.5px; font-weight: 800;
  text-transform: uppercase; letter-spacing: 1.2px;
  color: var(--text-muted); margin-bottom: 12px;
}
.setting-item {
  display: flex; align-items: center; justify-content: space-between;
  padding: 12px 14px;
  border-radius: var(--radius-sm);
  border: 1px solid var(--border);
  transition: var(--transition);
}
.setting-item:hover { border-color: var(--accent); }
.setting-item-info { flex: 1; }
.setting-item-label { font-size: 13.5px; font-weight: 700; color: var(--text-primary); }
.setting-item-desc { font-size: 11.5px; color: var(--text-muted); margin-top: 2px; }

/* COLOR PICKERS */
.color-options { display: flex; gap: 8px; flex-wrap: wrap; }
.color-opt {
  width: 32px; height: 32px; border-radius: 8px;
  cursor: pointer; border: 3px solid transparent;
  transition: var(--transition-bounce);
}
.color-opt:hover { transform: scale(1.15); }
.color-opt.selected { border-color: var(--text-primary); transform: scale(1.1); }

/* TOGGLE */
.toggle {
  width: 44px; height: 24px;
  background: var(--border);
  border-radius: 12px;
  position: relative;
  cursor: pointer;
  transition: background 0.25s;
  border: none;
  flex-shrink: 0;
}
.toggle.on { background: var(--accent); }
.toggle::after {
  content: '';
  width: 18px; height: 18px;
  background: #fff; border-radius: 50%;
  position: absolute; top: 3px; left: 3px;
  transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1);
  box-shadow: 0 1px 4px rgba(0,0,0,0.2);
}
.toggle.on::after { transform: translateX(20px); }

/* ANIMATION SELECTOR */
.anim-options { display: flex; gap: 8px; flex-wrap: wrap; }
.anim-opt {
  padding: 6px 14px;
  border: 2px solid var(--border);
  border-radius: 20px;
  font-size: 12px; font-weight: 700;
  cursor: pointer;
  transition: var(--transition);
  color: var(--text-secondary);
}
.anim-opt:hover { border-color: var(--accent); color: var(--accent); }
.anim-opt.selected { background: var(--accent); border-color: var(--accent); color: #fff; }

/* ===== HOVER EFFECT PREVIEWS ===== */
.hover-preview-row { display: flex; gap: 10px; flex-wrap: wrap; }
.hover-preview-card {
  flex: 1; min-width: 90px;
  padding: 12px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  text-align: center;
  cursor: pointer;
  font-size: 12px; font-weight: 700;
  color: var(--text-secondary);
  transition: var(--transition);
}
.hover-preview-card.selected { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }

/* ===== MODAL OVERLAY ===== */
.modal-overlay {
  position: fixed; inset: 0;
  background: rgba(0,0,0,0.45);
  z-index: 400;
  display: flex; align-items: center; justify-content: center;
  padding: 20px;
  opacity: 0; pointer-events: none;
  transition: opacity 0.22s;
  backdrop-filter: blur(2px);
}
.modal-overlay.open { opacity: 1; pointer-events: all; }
.modal {
  background: var(--card-bg);
  border-radius: 16px;
  width: 100%; max-width: 560px;
  box-shadow: 0 24px 80px rgba(0,0,0,0.3);
  transform: scale(0.92) translateY(20px);
  transition: transform 0.28s cubic-bezier(0.34,1.56,0.64,1);
  overflow: hidden;
}
.modal-overlay.open .modal { transform: scale(1) translateY(0); }
.modal-header {
  padding: 20px 24px;
  border-bottom: 1px solid var(--border);
  display: flex; align-items: center; gap: 12px;
}
.modal-header-icon {
  width: 40px; height: 40px; border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px;
}
.modal-title { font-size: 17px; font-weight: 800; flex: 1; }
.modal-close {
  width: 32px; height: 32px;
  border: none; background: var(--border);
  border-radius: 8px;
  color: var(--text-secondary);
  display: flex; align-items: center; justify-content: center;
  cursor: pointer; font-size: 16px;
  transition: var(--transition-bounce);
}
.modal-close:hover { background: var(--danger); color: #fff; transform: rotate(90deg); }
.modal-body { padding: 24px; max-height: 70vh; overflow-y: auto; }
.modal-footer {
  padding: 16px 24px;
  border-top: 1px solid var(--border);
  display: flex; justify-content: flex-end; gap: 10px;
  background: rgba(0,0,0,0.02);
}

/* ===== VIEWS ===== */
.view { display: none; }
.view.active { display: block; animation: fadeInUp 0.35s cubic-bezier(0.34,1.56,0.64,1); }
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(18px); }
  to { opacity: 1; transform: translateY(0); }
}

/* ===== CHART BARS ===== */
.chart-bars {
  display: flex; align-items: flex-end; gap: 10px;
  height: 160px;
}
.chart-bar-wrap { flex: 1; display: flex; flex-direction: column; align-items: center; gap: 6px; }
.chart-bar {
  width: 100%; border-radius: 6px 6px 0 0;
  background: var(--accent);
  transition: height 0.6s cubic-bezier(0.34,1.56,0.64,1), opacity 0.3s;
  cursor: pointer;
  min-height: 4px;
}
.chart-bar:hover { opacity: 0.8; }
.chart-bar.secondary { background: var(--accent-2); }
.chart-bar-label { font-size: 11px; color: var(--text-muted); font-weight: 700; }
.chart-legend {
  display: flex; gap: 16px; margin-top: 12px; flex-wrap: wrap;
}
.legend-item { display: flex; align-items: center; gap: 6px; font-size: 12px; color: var(--text-secondary); font-weight: 600; }
.legend-dot { width: 10px; height: 10px; border-radius: 50%; }

/* ===== DONUT CHART ===== */
.donut-wrap { position: relative; width: 140px; height: 140px; flex-shrink: 0; }
.donut-wrap svg { width: 100%; height: 100%; }
.donut-center {
  position: absolute; inset: 0;
  display: flex; flex-direction: column;
  align-items: center; justify-content: center;
}
.donut-val { font-size: 22px; font-weight: 900; color: var(--text-primary); }
.donut-sub { font-size: 10px; color: var(--text-muted); font-weight: 700; }

/* ===== DELIVERY TRACK ===== */
.delivery-track {
  display: flex; align-items: center; gap: 0;
  margin: 20px 0;
  position: relative;
}
.delivery-step {
  display: flex; flex-direction: column; align-items: center;
  flex: 1; gap: 8px;
}
.delivery-step-dot {
  width: 36px; height: 36px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 14px; font-weight: 800;
  border: 3px solid var(--border);
  background: var(--card-bg);
  z-index: 2;
  transition: var(--transition-bounce);
}
.delivery-step.done .delivery-step-dot {
  background: var(--success); border-color: var(--success); color: #fff;
}
.delivery-step.active .delivery-step-dot {
  background: var(--accent); border-color: var(--accent); color: #fff;
  animation: pulse 1.5s infinite;
}
.delivery-step-label { font-size: 11px; font-weight: 700; color: var(--text-muted); text-align: center; }
.delivery-step.done .delivery-step-label { color: var(--success); }
.delivery-step.active .delivery-step-label { color: var(--accent); }
.delivery-line {
  flex: 1; height: 3px;
  background: var(--border);
  margin-top: -22px;
  position: relative; z-index: 1;
  transition: background 0.4s;
}
.delivery-line.done { background: var(--success); }

/* ===== MOBILE OVERLAY ===== */
.mobile-overlay {
  display: none;
  position: fixed; inset: 0;
  background: rgba(0,0,0,0.5);
  z-index: 99;
  backdrop-filter: blur(3px);
}
.mobile-overlay.show { display: block; }

/* ===== TOAST ===== */
.toast-container {
  position: fixed; bottom: 24px; right: 24px;
  display: flex; flex-direction: column; gap: 10px;
  z-index: 500;
}
.toast {
  background: var(--text-primary);
  color: var(--card-bg);
  padding: 12px 18px;
  border-radius: 10px;
  font-size: 13.5px; font-weight: 600;
  display: flex; align-items: center; gap: 10px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.25);
  animation: slideInRight 0.32s cubic-bezier(0.34,1.56,0.64,1);
  min-width: 240px;
}
@keyframes slideInRight {
  from { transform: translateX(60px); opacity: 0; }
  to { transform: translateX(0); opacity: 1; }
}
.toast.success { background: var(--success); }
.toast.danger { background: var(--danger); }
.toast.warning { background: var(--warning); }
.toast.info { background: var(--info); }
.toast i { font-size: 16px; flex-shrink: 0; }

/* ===== AVATAR GROUP ===== */
.avatar-group { display: flex; }
.avatar-sm {
  width: 28px; height: 28px; border-radius: 50%;
  border: 2px solid var(--card-bg);
  margin-left: -8px;
  display: flex; align-items: center; justify-content: center;
  font-size: 11px; font-weight: 800; color: #fff;
  flex-shrink: 0;
}
.avatar-group .avatar-sm:first-child { margin-left: 0; }

/* ===== EMPTY STATE ===== */
.empty-state {
  padding: 48px 24px;
  text-align: center;
  color: var(--text-muted);
}
.empty-state-icon { font-size: 48px; margin-bottom: 16px; opacity: 0.4; }
.empty-state-title { font-size: 16px; font-weight: 800; margin-bottom: 8px; color: var(--text-secondary); }
.empty-state-desc { font-size: 13.5px; }

/* ===== SEARCH BAR ===== */
.search-input-wrap { position: relative; }
.search-input-wrap .search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--text-muted); font-size: 13px; }
.search-input {
  padding: 9px 13px 9px 36px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  font-size: 13.5px;
  background: var(--card-bg);
  color: var(--text-primary);
  outline: none;
  width: 220px;
  transition: var(--transition);
}
.search-input:focus { border-color: var(--accent); width: 270px; }

/* ===== FILTER CHIPS ===== */
.filter-chips { display: flex; gap: 8px; flex-wrap: wrap; }
.filter-chip {
  padding: 5px 13px;
  border-radius: 20px;
  font-size: 12px; font-weight: 700;
  border: 2px solid var(--border);
  cursor: pointer;
  color: var(--text-secondary);
  transition: var(--transition-bounce);
  background: var(--card-bg);
}
.filter-chip:hover { border-color: var(--accent); color: var(--accent); }
.filter-chip.active { background: var(--accent); border-color: var(--accent); color: #fff; }

/* ===== PAGINATION ===== */
.pagination { display: flex; gap: 6px; align-items: center; justify-content: center; flex-wrap: wrap; }
.page-btn {
  width: 34px; height: 34px;
  border: 2px solid var(--border);
  border-radius: 8px;
  background: var(--card-bg);
  color: var(--text-secondary);
  font-size: 13px; font-weight: 700;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer;
  transition: var(--transition-bounce);
}
.page-btn:hover { border-color: var(--accent); color: var(--accent); transform: scale(1.08); }
.page-btn.active { background: var(--accent); border-color: var(--accent); color: #fff; }

/* ===== QUICK ACTIONS ===== */
.quick-actions { display: grid; grid-template-columns: repeat(4,1fr); gap: 12px; }
.quick-action {
  background: var(--card-bg);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 16px;
  text-align: center;
  cursor: pointer;
  transition: var(--transition-bounce);
}
.quick-action:hover { transform: translateY(-4px); box-shadow: var(--shadow-hover); border-color: var(--accent); }
.quick-action-icon {
  width: 44px; height: 44px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px; margin: 0 auto 10px;
}
.quick-action-label { font-size: 12px; font-weight: 700; color: var(--text-secondary); }

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
  .grid-2 { grid-template-columns: 1fr; }
  .grid-3 { grid-template-columns: 1fr 1fr; }
  .quick-actions { grid-template-columns: repeat(3,1fr); }
  .header-breadcrumb { display: none; }
}
@media (max-width: 768px) {
  :root { --sidebar-width: 260px; }
  .sidebar { transform: translateX(-100%); }
  .sidebar.mobile-open { transform: translateX(0); }
  .main-area { margin-left: 0 !important; }
  .header-search { display: none; }
  .header { padding: 0 16px; gap: 10px; }
  .header-actions { gap: 4px; }
  .header-btn { width: 32px; height: 32px; font-size: 14px; }
  .grid-3 { grid-template-columns: 1fr; }
  .form-grid { grid-template-columns: 1fr; }
  .stats-grid { grid-template-columns: repeat(2,1fr); }
  .quick-actions { grid-template-columns: repeat(2,1fr); }
  .delivery-step-label { font-size: 9.5px; }
  .delivery-track { overflow-x: auto; padding-bottom: 10px; justify-content: flex-start; }
  .delivery-step { min-width: 80px; }
  .notif-panel { width: 100%; right: -100%; top: 0; height: 100%; }
  .settings-panel { width: 100%; right: -100%; }
  .page-content { padding: 16px; }
  .page-header { flex-direction: column; align-items: stretch; }
  .page-actions { width: 100%; justify-content: flex-start; }
  .btn { width: 100%; justify-content: center; }
  .card-header { flex-direction: column; align-items: stretch; gap: 10px; }
  .search-input { width: 100% !important; }
}
@media (max-width: 480px) {
  .stats-grid { grid-template-columns: 1fr; }
  .quick-actions { grid-template-columns: 1fr; }
  .donut-wrap { width: 120px; height: 120px; margin: 0 auto; }
  .chart-bars { gap: 5px; }
  .chart-bar-label { font-size: 9px; }
  .modal { border-radius: 0; height: 100%; max-height: 100%; }
  .modal-body { padding: 16px; }
}
/* ===== USER PROFILE DROPDOWN ===== */
.user-profile-dropdown {
    position: relative;
}
.profile-dropdown-content {
    position: absolute;
    top: 100%;
    right: 0;
    width: 200px;
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: var(--radius-sm);
    box-shadow: var(--shadow-hover);
    margin-top: 10px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: var(--transition);
    z-index: 1000;
}
.user-profile-dropdown:hover .profile-dropdown-content {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}
.dropdown-header {
    padding: 15px;
    border-bottom: 1px solid var(--border);
    display: flex;
    flex-direction: column;
}
.dropdown-header strong {
    color: var(--text-primary);
    font-size: 14px;
}
.dropdown-header span {
    color: var(--text-muted);
    font-size: 12px;
}
.profile-dropdown-content a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 15px;
    color: var(--text-secondary);
    font-size: 13px;
    transition: background 0.2s;
}
.profile-dropdown-content a:hover {
    background: var(--accent-light);
    color: var(--accent);
}
.profile-dropdown-content hr {
    border: 0;
    border-top: 1px solid var(--border);
    margin: 5px 0;
}
.logout-link {
    color: var(--danger) !important;
}
.logout-link:hover {
    background: #fff5f5 !important;
}
</style>
