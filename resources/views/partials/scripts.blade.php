<script>
// ===== STATE =====
let sidebarCollapsed = false;
let notifOpen = false;
let settingsOpen = false;
const root = document.documentElement;

// ===== SIDEBAR =====
function toggleSidebar() {
  const isMobile = window.innerWidth <= 768;
  const sidebar = document.getElementById('sidebar');
  const mainArea = document.getElementById('mainArea');
  const overlay = document.getElementById('mobileOverlay');
  if (isMobile) {
    sidebar.classList.toggle('mobile-open');
    overlay.classList.toggle('show');
  } else {
    sidebarCollapsed = !sidebarCollapsed;
    sidebar.classList.toggle('collapsed', sidebarCollapsed);
    mainArea.classList.toggle('sidebar-collapsed', sidebarCollapsed);
  }
}
function closeMobileSidebar() {
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('mobileOverlay');
  if(sidebar) sidebar.classList.remove('mobile-open');
  if(overlay) overlay.classList.remove('show');
}

// ===== NOTIFICATIONS =====
function toggleNotif() {
  notifOpen = !notifOpen;
  document.getElementById('notifPanel').classList.toggle('open', notifOpen);
  if (settingsOpen) { settingsOpen = false; document.getElementById('settingsPanel').classList.remove('open'); }
}
function markAllRead() {
  document.querySelectorAll('.notif-item.unread').forEach(i => i.classList.remove('unread'));
  document.querySelectorAll('.unread-dot').forEach(d => d.style.display='none');
  const notifCount = document.getElementById('notifCount');
  if(notifCount) notifCount.textContent = '0 New';
  showToast('All notifications marked as read','success');
}

// ===== SETTINGS =====
function toggleSettings() {
  settingsOpen = !settingsOpen;
  document.getElementById('settingsPanel').classList.toggle('open', settingsOpen);
  if (notifOpen) { notifOpen = false; document.getElementById('notifPanel').classList.remove('open'); }
}

// ===== DARK MODE =====
function toggleDark() {
  const isDark = root.getAttribute('data-theme') === 'dark';
  root.setAttribute('data-theme', isDark ? 'light' : 'dark');
  const toggle = document.getElementById('darkToggle');
  if (toggle) toggle.classList.toggle('on', !isDark);
  const btn = document.getElementById('themeBtn');
  if (btn) btn.innerHTML = isDark ? '<i class="fas fa-moon"></i>' : '<i class="fas fa-sun"></i>';
}

// ===== COLOR SETTINGS =====
function setHeaderColor(el) {
  document.querySelectorAll('#headerColors .color-opt').forEach(c => c.classList.remove('selected'));
  el.classList.add('selected');
  const color = el.dataset.color;
  root.style.setProperty('--header-bg', color);
  const mainHeader = document.getElementById('mainHeader');
  if(mainHeader) mainHeader.style.background = color;
  showToast('Header color updated', 'success');
}
function setSidebarColor(el) {
  document.querySelectorAll('#sidebarColors .color-opt').forEach(c => c.classList.remove('selected'));
  el.classList.add('selected');
  const color = el.dataset.color;
  root.style.setProperty('--sidebar-bg', color);
  showToast('Sidebar color updated', 'success');
}
function setAccentColor(el) {
  document.querySelectorAll('#accentColors .color-opt').forEach(c => c.classList.remove('selected'));
  el.classList.add('selected');
  const color = el.dataset.color;
  root.style.setProperty('--accent', color);
  root.style.setProperty('--sidebar-active', color);
  showToast('Accent color updated', 'success');
}

// ===== HOVER EFFECTS =====
let currentHoverEffect = 'lift';
function setHoverEffect(effect) {
  currentHoverEffect = effect;
  document.querySelectorAll('[id^=hoverOpt-]').forEach(el => el.classList.remove('selected'));
  const opt = document.getElementById('hoverOpt-' + effect);
  if(opt) opt.classList.add('selected');
  
  // Apply dynamic styles
  const style = document.getElementById('dynamicHoverStyle') || (() => { const s = document.createElement('style'); s.id='dynamicHoverStyle'; document.head.appendChild(s); return s; })();
  const effects = {
    lift: `.stat-card:hover,.book-card:hover,.quick-action:hover{transform:translateY(-6px)!important;} .nav-item:hover{transform:translateX(3px)!important;}`,
    glow: `.stat-card:hover,.book-card:hover,.quick-action:hover{transform:none!important;box-shadow:0 0 0 3px var(--accent),var(--shadow-hover)!important;} .nav-item:hover{transform:none!important;box-shadow:0 0 10px var(--accent)!important;}`,
    scale: `.stat-card:hover,.book-card:hover,.quick-action:hover{transform:scale(1.04)!important;} .nav-item:hover{transform:scale(1.03)!important;}`,
    slide: `.stat-card:hover,.book-card:hover,.quick-action:hover{transform:translateX(5px)!important;} .nav-item:hover{transform:translateX(6px)!important;}`
  };
  style.textContent = effects[effect] || '';
  showToast('Hover effect: ' + effect.charAt(0).toUpperCase()+effect.slice(1), 'info');
}

// ===== TRANSITION SPEED =====
function setTransitionSpeed(speed, el) {
  document.querySelectorAll('.anim-opt').forEach(a => { if(a.onclick && a.onclick.toString().includes('setTransitionSpeed')) a.classList.remove('selected'); });
  el.classList.add('selected');
  const speeds = { fast:'0.15s', normal:'0.28s', slow:'0.55s', none:'0s' };
  const dur = speeds[speed] || '0.28s';
  root.style.setProperty('--transition', `all ${dur} cubic-bezier(0.4,0,0.2,1)`);
  root.style.setProperty('--transition-bounce', `all ${speed==='none'?'0s':'calc('+dur+' + 0.1s)'} cubic-bezier(0.34,1.56,0.64,1)`);
  showToast('Transition speed: ' + speed, 'info');
}

// ===== SIDEBAR WIDTH =====
function setSidebarWidth(width, el) {
  root.style.setProperty('--sidebar-width', width);
  const mainArea = document.getElementById('mainArea');
  if (!sidebarCollapsed && mainArea) mainArea.style.marginLeft = width;
  showToast('Sidebar width updated', 'info');
}

// ===== COMPACT MODE =====
function toggleCompact(toggle) {
  toggle.classList.toggle('on');
  const isCompact = toggle.classList.contains('on');
  const style = document.getElementById('compactStyle') || (() => { const s = document.createElement('style'); s.id='compactStyle'; document.head.appendChild(s); return s; })();
  style.textContent = isCompact ? `.page-content{padding:12px!important} .card-body{padding:12px!important} .nav-item{padding:7px 18px!important} .stat-card{padding:12px!important}` : '';
  showToast(isCompact ? 'Compact mode on' : 'Compact mode off', 'info');
}

// ===== RESET SETTINGS =====
function resetSettings() {
  root.style.setProperty('--header-bg', '#1a3a5c');
  root.style.setProperty('--sidebar-bg', '#132d47');
  root.style.setProperty('--accent', '#2d7dd2');
  root.style.setProperty('--sidebar-active', '#2d7dd2');
  root.style.setProperty('--sidebar-width', '260px');
  root.style.setProperty('--transition', 'all 0.28s cubic-bezier(0.4,0,0.2,1)');
  root.style.setProperty('--transition-bounce', 'all 0.38s cubic-bezier(0.34,1.56,0.64,1)');
  root.setAttribute('data-theme', 'light');
  const dyn = document.getElementById('dynamicHoverStyle'); if(dyn) dyn.textContent='';
  const comp = document.getElementById('compactStyle'); if(comp) comp.textContent='';
  const darkToggle = document.getElementById('darkToggle'); if(darkToggle) darkToggle.classList.remove('on');
  const compactToggle = document.getElementById('compactToggle'); if(compactToggle) compactToggle.classList.remove('on');
  const themeBtn = document.getElementById('themeBtn'); if(themeBtn) themeBtn.innerHTML = '<i class="fas fa-moon"></i>';
  document.querySelectorAll('.color-opt').forEach(c=>c.classList.remove('selected'));
  const hCol = document.querySelector('#headerColors .color-opt'); if(hCol) hCol.classList.add('selected');
  const sCol = document.querySelector('#sidebarColors .color-opt'); if(sCol) sCol.classList.add('selected');
  const aCol = document.querySelector('#accentColors .color-opt'); if(aCol) aCol.classList.add('selected');
  const hLift = document.getElementById('hoverOpt-lift'); if(hLift) hLift.classList.add('selected');
  ['hoverOpt-glow','hoverOpt-scale','hoverOpt-slide'].forEach(id=>{
    const el = document.getElementById(id);
    if(el) el.classList.remove('selected');
  });
  showToast('Settings reset to defaults', 'success');
}

// ===== TABS =====
function setActiveTab(btn) {
  btn.closest('.tabs').querySelectorAll('.tab-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
}

// ===== MODAL =====
function openModal(id) { 
  const modal = document.getElementById(id);
  if(modal) modal.classList.add('open'); 
}
function closeModal(id) { 
  const modal = document.getElementById(id);
  if(modal) modal.classList.remove('open'); 
}
document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', (e) => { if(e.target===overlay) overlay.classList.remove('open'); });
});
function saveOrder() {
  closeModal('orderModal');
  showToast('Order placed successfully!', 'success');
}
function saveBook() {
  closeModal('bookModal');
  showToast('Book added to catalog!', 'success');
}

// ===== TOAST =====
function showToast(msg, type = '') {
  const icons = { success:'fa-check-circle', danger:'fa-times-circle', warning:'fa-exclamation-triangle', info:'fa-info-circle' };
  const toast = document.createElement('div');
  toast.className = 'toast' + (type ? ' '+type : '');
  toast.innerHTML = `<i class="fas ${icons[type]||'fa-info-circle'}"></i>${msg}`;
  const container = document.getElementById('toastContainer');
  if(container) {
    container.appendChild(toast);
    setTimeout(() => {
      toast.style.animation = 'none';
      toast.style.transition = 'all 0.3s';
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(60px)';
      setTimeout(() => toast.remove(), 300);
    }, 3200);
  }
}

// ===== FILTER CHIPS =====
document.addEventListener('click', function(e) {
  if (e.target.classList.contains('filter-chip')) {
    const group = e.target.closest('.filter-chips');
    if (group) {
      group.querySelectorAll('.filter-chip').forEach(c => c.classList.remove('active'));
      e.target.classList.add('active');
    }
  }
});

// ===== KEYBOARD SHORTCUT =====
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') {
    document.querySelectorAll('.modal-overlay.open').forEach(m=>m.classList.remove('open'));
    if(settingsOpen) toggleSettings();
    if(notifOpen) toggleNotif();
  }
});

// ===== CHART ANIMATION =====
window.addEventListener('load', () => {
  document.querySelectorAll('.chart-bar').forEach((bar, i) => {
    const h = bar.style.height;
    bar.style.height = '0%';
    setTimeout(() => { bar.style.transition = 'height 0.5s cubic-bezier(0.34,1.56,0.64,1)'; bar.style.height = h; }, 100 + i * 60);
  });
});
</script>
