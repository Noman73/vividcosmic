<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @php
        if (auth()->user()->image==null) {
            $image="https://designshack.net/wp-content/uploads/placeholder-image.png";
        }else{
          $image=asset('storage/fuser/'.auth()->user()->image);
        }
      @endphp
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{$image}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->username}}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{URL::to('user/dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('user/profile')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('user/user_update')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('user/password_reset')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Password Change</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                My Team
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/user/tree/'.auth()->user()->id)}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>My Tree</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Statement
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/user/referrals')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Refarral Bonus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('user/generation_table')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Generation Bonus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Central Bonus</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Salary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Reward</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Tour</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Royalthy</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Register
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('user/user')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('user/referrals')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Your Refarrals</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Widthdraw
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/user/withdraw')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Widthdraw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/user/withdraw_list')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Transaction History</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('user/mobile_recharge')}}" class="nav-link">
              <i class="nav-icon fas fa-retweet"></i>
              <p>
                 Mobile Recharge
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Transfer
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/user/etransfer')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>E-Self D Transfer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/user/others_transfer')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>E-Others D Transfer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('share.transfer') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Share Balance Transfer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('founder.balance.transfer') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Founder Balance Transfer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/user/etransfer_list')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>E-Self D History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/user/others_transfer_list')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>E-Others D History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('list.share.transfer') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Share Balance History</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('list.founder.transfer') }}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Founder Balance History</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p>
                Purchase
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('/user/invoice')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Purchase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/user/invoice_list')}}" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Purchase List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('user/stockiest_list')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Stockiest
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                 Trust Fund
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{URL::to('user/orphan_list')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 Orphan Fund
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>