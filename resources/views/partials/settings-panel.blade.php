<div class="settings-panel" id="settingsPanel">
  <div class="settings-header">
    <div class="settings-header-icon"><i class="fas fa-cog"></i></div>
    <div class="settings-title">Customize Interface</div>
    <button class="modal-close" onclick="toggleSettings()"><i class="fas fa-times"></i></button>
  </div>
  <div class="settings-body">
    <!-- THEME -->
    <div>
      <div class="setting-section-title">Color Mode</div>
      <div class="setting-item">
        <div class="setting-item-info">
          <div class="setting-item-label">Dark Mode</div>
          <div class="setting-item-desc">Switch to dark theme for low-light environments</div>
        </div>
        <button class="toggle" id="darkToggle" onclick="toggleDark()"></button>
      </div>
    </div>

    <!-- HEADER COLOR -->
    <div>
      <div class="setting-section-title">Header Background Color</div>
      <div class="color-options" id="headerColors">
        <div class="color-opt selected" data-color="#1a3a5c" style="background:#1a3a5c" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#1a3a2c" style="background:#1a3a2c" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#3a1a1a" style="background:#3a1a1a" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#2a1a4a" style="background:#2a1a4a" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#1a3a50" style="background:#1a3a50" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#28354a" style="background:#28354a" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#1a2a1a" style="background:#1a2a1a" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#4a2a1a" style="background:#4a2a1a" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#222" style="background:#222" onclick="setHeaderColor(this)"></div>
        <div class="color-opt" data-color="#b01010" style="background:#b01010" onclick="setHeaderColor(this)"></div>
      </div>
    </div>

    <!-- SIDEBAR COLOR -->
    <div>
      <div class="setting-section-title">Sidebar Background Color</div>
      <div class="color-options" id="sidebarColors">
        <div class="color-opt selected" data-color="#132d47" style="background:#132d47" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#0f2820" style="background:#0f2820" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#2d1010" style="background:#2d1010" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#1f1035" style="background:#1f1035" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#0d2a38" style="background:#0d2a38" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#1c2535" style="background:#1c2535" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#0f1c0f" style="background:#0f1c0f" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#2d1a0a" style="background:#2d1a0a" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#141414" style="background:#141414" onclick="setSidebarColor(this)"></div>
        <div class="color-opt" data-color="#880a0a" style="background:#880a0a" onclick="setSidebarColor(this)"></div>
      </div>
    </div>

    <!-- ACCENT COLOR -->
    <div>
      <div class="setting-section-title">Accent Color</div>
      <div class="color-options" id="accentColors">
        <div class="color-opt selected" data-color="#2d7dd2" style="background:#2d7dd2" onclick="setAccentColor(this)"></div>
        <div class="color-opt" data-color="#27ae60" style="background:#27ae60" onclick="setAccentColor(this)"></div>
        <div class="color-opt" data-color="#e74c3c" style="background:#e74c3c" onclick="setAccentColor(this)"></div>
        <div class="color-opt" data-color="#f39c12" style="background:#f39c12" onclick="setAccentColor(this)"></div>
        <div class="color-opt" data-color="#7c5cbf" style="background:#7c5cbf" onclick="setAccentColor(this)"></div>
        <div class="color-opt" data-color="#1a9090" style="background:#1a9090" onclick="setAccentColor(this)"></div>
        <div class="color-opt" data-color="#c0392b" style="background:#c0392b" onclick="setAccentColor(this)"></div>
        <div class="color-opt" data-color="#e67e22" style="background:#e67e22" onclick="setAccentColor(this)"></div>
      </div>
    </div>

    <!-- HOVER ANIMATION -->
    <div>
      <div class="setting-section-title">Hover Animation Style</div>
      <div class="hover-preview-row">
        <div class="hover-preview-card selected" id="hoverOpt-lift" onclick="setHoverEffect('lift')">
          <div style="font-size:20px;margin-bottom:4px">↑</div>Lift
        </div>
        <div class="hover-preview-card" id="hoverOpt-glow" onclick="setHoverEffect('glow')">
          <div style="font-size:20px;margin-bottom:4px">✦</div>Glow
        </div>
        <div class="hover-preview-card" id="hoverOpt-scale" onclick="setHoverEffect('scale')">
          <div style="font-size:20px;margin-bottom:4px">⤢</div>Scale
        </div>
        <div class="hover-preview-card" id="hoverOpt-slide" onclick="setHoverEffect('slide')">
          <div style="font-size:20px;margin-bottom:4px">→</div>Slide
        </div>
      </div>
    </div>

    <!-- TRANSITION SPEED -->
    <div>
      <div class="setting-section-title">Transition Speed</div>
      <div class="anim-options">
        <div class="anim-opt" onclick="setTransitionSpeed('fast',this)">Fast</div>
        <div class="anim-opt selected" onclick="setTransitionSpeed('normal',this)">Normal</div>
        <div class="anim-opt" onclick="setTransitionSpeed('slow',this)">Slow</div>
        <div class="anim-opt" onclick="setTransitionSpeed('none',this)">None</div>
      </div>
    </div>

    <!-- SIDEBAR WIDTH -->
    <div>
      <div class="setting-section-title">Sidebar Width</div>
      <div class="anim-options">
        <div class="anim-opt" onclick="setSidebarWidth('220px',this)">Compact</div>
        <div class="anim-opt selected" onclick="setSidebarWidth('260px',this)">Default</div>
        <div class="anim-opt" onclick="setSidebarWidth('300px',this)">Wide</div>
      </div>
    </div>

    <div>
      <div class="setting-section-title">Other Options</div>
      <div style="display:flex;flex-direction:column;gap:10px">
        <div class="setting-item">
          <div class="setting-item-info">
            <div class="setting-item-label">Compact Mode</div>
            <div class="setting-item-desc">Reduce padding and spacing</div>
          </div>
          <button class="toggle" id="compactToggle" onclick="toggleCompact(this)"></button>
        </div>
        <div class="setting-item">
          <div class="setting-item-info">
            <div class="setting-item-label">Show Animations</div>
            <div class="setting-item-desc">Enable page transition animations</div>
          </div>
          <button class="toggle on" id="animToggle" onclick="this.classList.toggle('on')"></button>
        </div>
      </div>
    </div>

    <button class="btn btn-outline" style="width:100%" onclick="resetSettings()">
      <i class="fas fa-undo"></i> Reset to Defaults
    </button>
  </div>
</div>
