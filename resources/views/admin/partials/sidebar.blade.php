<div class="sidebar" data-color="blue">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="/admin" class="simple-text logo-mini">
            ST
        </a>
        <a href="/admin" class="simple-text logo-normal">
            ShowTrack
        </a>
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-simple btn-icon btn-neutral btn-round">
                <i class="now-ui-icons text_align-center visible-on-sidebar-regular"></i>
                <i class="now-ui-icons design_bullet-list-67 visible-on-sidebar-mini"></i>
            </button>
        </div>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="https://i.pinimg.com/originals/81/63/94/816394a06b8c3a129155a4dd182fe79b.jpg" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="" class="collapsed">
              <span>
                {{\Illuminate\Support\Facades\Auth::user()->name}}
              </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="nav">
            <li class="active">
                <a href="/admin">
                    <i class="now-ui-icons objects_spaceship"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="/admin/users">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Users</p>
                </a>
            </li>
            <li>
                <a href="/admin/comment">
                    <i class="now-ui-icons text_align-center"></i>
                    <p>Comments</p>
                </a>
            </li>
            <li>
                <a href="/admin/post">
                    <i class="now-ui-icons education_agenda-bookmark"></i>
                    <p>Posts</p>
                </a>
            </li>
        </ul>
    </div>
</div>
