

<?php if ($ShowNav=== 'true'): ?>
      <header class="header">
          <nav class="container-flui2d">
              <div class="row">
                  <div class="col-lg-9 col-md-8 col-5">
                      <button id="right-menu-button"><i class="fas fa-bars"></i></button>
                      <div id="right-menu">
                          <ul id="list-option" class="list-inline">
                              <li class="list-inline-item"><a id="profile-icon"><img src="<?= ($BASE) ?>/ui/images/icons/user-icon.png" alt="profile-icon"/></a></li>
                              <li class="list-inline-item header-items"><a href="/wkpis/kpi"><img src="<?= ($BASE) ?>/ui/images/icons/website-1.svg" alt=""/><span>مؤشرات الأداء</span></a></li>
                              <li class="list-inline-item header-items"><a href="/projections/show/group"><img src="<?= ($BASE) ?>/ui/images/icons/analytics-1.svg" alt=""/><span>الاستنباط</span></a></li>
                              <li class="list-inline-item header-items"><a href="/report/list"><img src="<?= ($BASE) ?>/ui/images/icons/magnifier-1.svg" alt=""/><span>نماذج البحث و الأسترجاع</span></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-2 col-md-4 col-7">
                      <div class="logo-box"><a ><img id="list-option" src="<?= ($BASE) ?>/ui/images/logo.png" alt=""/></a></div>
                  </div>
              </div>
          </nav>
          <div id="profile-menu">
              <div class="arrow"></div>
              <ul class="list-inline">
                  <li><a href="/user/edit/account"><img src="<?= ($BASE) ?>/ui/images/icons/user.svg" alt=""/>بيانات المستخدم</a></li>
                  <li><a href="/user/change/password"><img src="<?= ($BASE) ?>/ui/images/icons/lock.svg" alt=""/>تغيير كلمه المرور</a></li>
                  <?php if ($SESSION['user'][0]['priv_admin']=='Y'): ?>
                      
                          <li><a href="/admin/list/users"><img src="<?= ($BASE) ?>/ui/images/icons/lock.svg" alt=""/>المستخدمين</a></li>
                      
                  <?php endif; ?>
                  <li><a href="/logout"><img src="<?= ($BASE) ?>/ui/images/icons/logout.svg" alt=""/>تسجيل خروج</a></li>
              </ul>
          </div>
      </header>

    <?php endif; ?>
